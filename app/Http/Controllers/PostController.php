<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

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



        try {


            //$data = $request->validated();
            // $data = $request->all();


            //Retrieving only los datos necesarios
            //FUNCIONANDO
            // $data = $request->safe()->only(['activity_name', 'activity_description']);





            $post = Post::create(
                [
                    'title' => $request->input('title'),
                    'slug' => 'slug',
                    'body' => $request->input('body'),
                    // 'img_url' => $request->input('img_url'),
                    'img_url' => null,
                    'active' => (bool) true,
                    // 'category_id' => $request->input('category_id'),
                    'category_id' => 1,
                    'user_id' => (int) 1,
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
    public function show(Post $post)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //  $data = $request->validated();

        try {

            $selectedPost = Post::findOrFail($id);

            $selectedPost->update($request->all());
            // $selectedPost->update([
            //     'title' => 'tititli',
            // ]);

            return redirect()->back()->with(['success' => 'Registro Actualizado con Exito']);

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
}
