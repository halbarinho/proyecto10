<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\PostRequest;
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
        //
        $posts = Post::all();
        // $categories = json_encode(Category::all()->toArray());

        return view('posts.index', ['posts' => $posts]);
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
            // return redirect()->back()
            //     ->withErrors($validator);
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

            // $post = Post::create(
            //     [
            //         'title' => $request->input('title'),
            //         'slug' => $request->input('slug'),
            //         'body' => $request->input('body'),
            //         // 'img_url' => $request->input('img_url'),
            //         'img_url' => $path_img ?? null,
            //         'active' => (bool) true,
            //         // 'category_id' => $request->input('category_id'),
            //         'category_id' => $request->input('category_id'),
            //         'user_id' => (int) $request->input('user_id'),
            //     ]
            // );


            /*
            ESTE ES EL QUE ME FUNCION ANTES DE VALIDATE
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
*/

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
            return(['message Error' => $request]);
            // return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to create post. Please try again."])->withInput();
        }

        return(['message' => $request]);







        // dd($request);
        // try {
        //     $data = $request->all();
        //     dd($data);

        //     $boolean = true;

        //     $newPath = "";

        //     if ($request->hasFile('img_url')) {

        //         $path = Storage::putFile('public/images', $data['img_url']);
        //         $newPath = str_replace('public/', '', $path);

        //     }

        //     $post = Post::create([
        //         // 'title' => $data['title'],
        //         // //'slug' => $data['slug'],
        //         // 'slug' => 'slug',
        //         // 'body' => $data['body'],
        //         // //'img_url' => $newPath,
        //         // 'img_url' => $newPath,
        //         // 'active' => true,
        //         // 'category_id' => $data['category'],

        //         'title' => 'avion',
        //         //'slug' => $data['slug'],
        //         'slug' => 'slug',
        //         'body' => 'jopetas',
        //         //'img_url' => $newPath,
        //         // 'img_url' => '',
        //         'active' => (bool) $boolean,
        //         'category_id' => 3,

        //     ]);
        // } catch (QueryException $e) {
        //     return redirect()->back()->withErrors(['error' => $e->getMessage() . "/n Failed to create post. Please try again."])->withInput();
        // }


        $categories = Category::all();
        $posts = Post::all();

        //return redirect()->route('post.index', ['categories' => $categories, 'posts' => $posts]);
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
            $id = $postId;
            $nextPostId = null;
            $prevPostId = null;

            if (Post::find(++$id)) {
                $nextPostId = $id;
                $id = $postId;
            }

            if (Post::find(--$id)) {
                $prevPostId = $id;
            }

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
        // return redirect()->route('post.edit', ['post' => $postId]);
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

            // return redirect()->back()->with(['success' => 'Registro Actualizado con Exito']);

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
        // return view('posts.index', ['posts' => $posts]);

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
