@extends('layout.template-dashboard')

@section('title', 'Contact Form')

@section('content')

    <div
        class="grid sm:grid-cols-2 gap-16 items-center p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-[#333] font-[sans-serif]">


        {{-- Zona izquierda --}}
        <div>
            <p>Si necesitas mas informacion sobre el funcionamiento de la web, tienes dudas
                o quieres que te resolvamos alguna cuestion especifica, ponte en contacto con nosotros.
            </p>
        </div>


        {{-- Form Derecha --}}

        <form action="{{ route('contact.send') }}" method="POST" class="ml-auo space-y-4">
            @csrf
            <label for="name">Nombre y Apellidos</label>
            @error('name')
                <div class="text-red-600 uppercase text-sm">{{ $message }}</div>
            @enderror
            <input type="text" name="name" id="name"
                class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#007bff] " placeholder="Nombre y apellidos">
            <label for="mail">Email</label>
            @error('mail')
                <div class="text-red-600 uppercase text-sm">{{ $message }}</div>
            @enderror
            <input type="mail" name="mail" id="mail"
                class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#007bff]" placeholder="Email">
            <label for="asunto">Asunto</label>
            @error('asunto')
                <div class="text-red-600 uppercase text-sm">{{ $message }}</div>
            @enderror
            <input type="text" name="asunto" id="asunto"
                class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#007bff]" placeholder="Asunto">
            @error('mensaje')
                <div class="text-red-600 uppercase text-sm">{{ $message }}</div>
            @enderror
            <textarea name="mensaje" placeholder="mensaje" rows="6"
                class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#007bff]"></textarea>
            <input type="submit" value="submit"
                class="text-white bg-[#007bff] hover:bg-blue-600 font-semibold rounded-md text-sm px-4 py-2.5 w-full">
        </form>

    </div>

@endsection
