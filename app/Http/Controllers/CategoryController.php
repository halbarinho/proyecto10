<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::all();

        //Paso notifications
        $notifications = Notification::all();

        return view('category.index', ['categories' => $categories, 'notifications' => $notifications]);
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

        //Paso notifications
        $notifications = Notification::all();

        return view('category.create', ['notifications' => $notifications]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'name' => [
                    'required',
                    'unique:categories',
                    'string',
                    'min:3',
                    'max:25',
                ],
                'description' => 'string|max:250',
            ],
            [
                'unique' => __('El :attribute ya existe, prueba con otro.'),
                'required' => __('El :attribute es obligatorio.'),
                'string' => __('El :attribute debe ser una cadena.'),
                'min' => __('El :attribute no cumple la longitud mínima.'),
                'max' => __('El :attribute no cumple la longitud máxima.'),
            ]

        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }


        try {

            $data = $request->all();

            $class = Category::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),

            ]);


        } catch (QueryException $e) {
            return (['message Error' => $e]);
        }

        $categories = Category::all();

        //Paso notifications
        $notifications = Notification::all();

        return view('category.index', ['categories' => $categories, 'notifications' => $notifications]);
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
    public function edit(int $id)
    {
        try {
            $selectedCategory = Category::findOrFail($id);

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo al editar la categoría. Inténtalo de nuevo."])->withInput();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo al editar la categoría. Inténtalo de nuevo."])->withInput();
        }


        //Paso notifications
        $notifications = Notification::all();

        return view('category.edit', ['category' => $selectedCategory, 'notifications' => $notifications]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'name' => [
                    'required',
                    Rule::unique('categories')->ignore($category->id),
                    'string',
                    'min:3',
                    'max:25',
                ],
                'description' => 'string|max:250',
            ],
            [
                'unique' => __('El :attribute ya existe, prueba con otro.'),
                'required' => __('El :attribute es obligatorio.'),
                'string' => __('El :attribute debe ser una cadena.'),
                'min' => __('El :attribute no cumple la longitud mínima.'),
                'max' => __('El :attribute no cumple la longitud máxima.'),
            ]

        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        try {

            $selectedCategory = Category::findOrFail($category->id);

            $selectedCategory->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),

            ]);


        } catch (QueryException $e) {
            return (['message Error' => $e]);
        }

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {

            $selectedCategory = Category::findOrFail($id);

            $selectedCategory->delete();

            return redirect()->back();

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo eliminando la Categoría. Inténtalo de nuevo."])->withInput();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage() . " - Fallo eliminando la Categoría. Inténtalo de nuevo."])->withInput();
        }
    }
}
