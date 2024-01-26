<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\DniNieValidationRule;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
        $rules = [
            'dni' => [
                'required',
                // 'regex:/^((([XYZ])[0-9]{7}[A-Z])|([0-9]{8}[A-Z]))$/',
                new DniNieValidationRule,
            ],
            'name' => [
                'required',
                'max:50',
                'regex:/^[A-Za-zñáéíóú]+(?: [A-Za-zñáéíóú]+)?(?: [A-Za-zñáéíóú]+)?$/',

            ],
            'last_name_1' => [
                'required',
                'max:100',
                'regex:/^[A-Za-zñáéíóú]+(?: [A-Za-zñáéíóú]+)?(?: [A-Za-zñáéíóú]+)?$/',
            ],
            'last_name_2' => [
                'required',
                'max:100',
                'regex:/^[A-Za-zñáéíóú]+(?: [A-Za-zñáéíóú]+)?(?: [A-Za-zñáéíóú]+)?$/',
            ],
            'gender' => [
                'required',
            ],
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
                'min:6',
                'max:50',
                'confirmed',
            ]
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Handle validation errors
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
