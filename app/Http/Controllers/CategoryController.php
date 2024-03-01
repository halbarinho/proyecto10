<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();

        return view('category.index', ['categories' => $categories]);
    }


    public function showCategoriesForPost()
    {

        $categories = Category::all();

        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {



            // $data = $request->validated();
            $data = $request->all();

            $class = Category::create([
                'name' => $request->input('category_name'),
                'description' => $request->input('description'),

            ]);


        } catch (QueryException $e) {
            return (['message Error' => $e]);
        }

        $categories = Category::all();
        // return (['message' => $request]);
        //return redirect()->route('category.index', ['categories' => $categories]);
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
