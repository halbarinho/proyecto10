<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();

        if ($user->hasRole('admin')) {
            // Si el usuario tiene el rol de administrador, redirigir a una ruta específica
            return redirect()->route('admin.posts');
        } elseif ($user->hasRole('docente')) {
            // Si el usuario tiene el rol de docente, redirigir a otra ruta específica
            $posts = Post::all();
            return view('docente.postsShow', ['posts' => $posts]);
        } else {
            // Si el usuario tiene otro tipo de rol o no tiene rol, mostrar los posts en la ruta por defecto
            $posts = Post::all();

            return view('posts.index', ['posts' => $posts]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|unique:posts|min:3',
                'slug' => 'nullable',
                'body' => 'required|string|min:15',
                'img_url' => 'nullable',
                'active' => 'required',
                'category_id' => 'required|integer',
                'user_id' => 'required|integer',
            ],
            [
                'unique' => __('El :attribute ya existe, prueba con otro.'),
                'required' => __('El :attribute es obligatorio.'),
                'min' => __('El :attribute no cumple la longitud mínima.'),
            ]
        );


        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()], 422);
        }



        try {



            if ($request->hasFile('img_url')) {
                //almaceno
                $img_path = Storage::putFile('public/images', $request->file('img_url'));
                //cambio el path
                $new_path = str_replace('public/', '', $img_path);
            } else {
                //AÑADO IMAGEN POR DEFECTO
                $new_path = '\images\defaultCollege.png';
            }


            //ESTO LO AÑADO PARA VALIDATE
            $post = Post::create(
                [
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'body' => $request->body,
                    // 'img_url' => $request->input('img_url'),
                    'img_url' => $new_path,
                    'active' => (bool) true,
                    // 'category_id' => $request->input('category_id'),
                    'category_id' => $request->category_id,
                    'user_id' => (int) $request->user_id,
                ]
            );




        } catch (QueryException $e) {
            return (['message Error' => $request]);

        }

        return (['message' => $request]);


        $categories = Category::all();
        $posts = Post::all();

        return view('post.index', ['categories' => $categories, 'posts' => $posts]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $postId)
    {
        try {
            $selectedPost = Post::findOrFail($postId);

            //Busco si existen post previo/siguiente
            $nextPostId = null;
            $prevPostId = null;

            // Buscar el ID del post siguiente
            $nextPostId = Post::where('id', '>', $postId)->min('id');

            // Buscar el ID del post anterior
            $prevPostId = Post::where('id', '<', $postId)->max('id');


            return view('posts.show', ['post' => $selectedPost, 'nextPostId' => $nextPostId, 'prevPostId' => $prevPostId]);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $postId)
    {
        $selectedPost = Post::findOrFail($postId);
        $categories = Category::all();

        return view('posts.edit', ['post' => $selectedPost, 'categories' => $categories]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {


        $validator = Validator::make(
            $request->all(),
            [
                // 'title' => 'required|string|unique:posts|min:3',
                'title' => [
                    'required',
                    'string',
                    'min:3',
                    Rule::unique('posts')->ignore($id),
                ],
                // 'slug' => 'nullable',
                'body' => 'required|string|min:15',
                'img_url' => 'nullable',
                'active' => 'required',
                'category_id' => 'required|integer',
                'user_id' => 'required|integer',
            ],
            [
                'unique' => __('El :attribute ya existe, prueba con otro.'),
                'required' => __('El :attribute es obligatorio.'),
                'min' => __('El :attribute no cumple la longitud mínima.'),
            ]
        );


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }



        try {

            $selectedPost = Post::findOrFail($id);

            if ($request->hasFile('img_url')) {
                //almaceno
                $img_path = Storage::putFile('public/images', $request->file('img_url'));
                //cambio el path
                $new_path = str_replace('public/', '', $img_path);
            } else {
                //AÑADO IMAGEN POR DEFECTO
                $new_path = '\images\defaultCollege.png';
            }

            $selectedPost->update([
                'title' => $request->title,
                'slug' => 'sluggy',
                'body' => $request->body,
                'img_url' => $new_path ?? null,
                'active' => (bool) true,
                'category_id' => $request->category_id,
                'user_id' => auth()->user()->id,
            ]);


            return redirect()->route('post.index')->with(['success' => 'Registro Actualizado con Exito']);


        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Fallo buscando user id."])->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to update post. Please try again."])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $post_id)
    {

        $selectedPost = Post::findOrFail($post_id);

        //ELIMINAR LA IMAGEN ASOCIADA
        if ($selectedPost->img_url) {

            $img = $selectedPost->img_url;

            Storage::delete($img);
        }

        $selectedPost->delete();

        $posts = Post::all();

        return redirect()->route('post.index', ['posts' => $posts]);

    }

    /**
     * Metodo para ver todos los post no acceso a edicion
     */
    public function showPosts()
    {
        //La utilizo para ver los post NO para la edicion
        $posts = Post::all();

        return view('posts.showPosts', ['posts' => $posts]);
    }
}
