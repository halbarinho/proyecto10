<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
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
        $request->validate(
            [
                'name' => 'required|string',
                'mail' => 'required|email',
                'asunto' => 'required|min:5',
                'mensaje' => 'required|string|min:15',
            ],
            [
                'required' => __('Este campo es requerido'),
                'mail.email' => __('El email debe ser válido'),
                'min' => __('Este campo no alcanza el mínimo'),

            ]
        );

        Mail::to('halbarinho@hotmail.com')->send(new ContactFormMail($request));

        // return 'Email Send';
        return redirect()->route('contact.formSent');
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
