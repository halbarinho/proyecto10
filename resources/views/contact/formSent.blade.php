@extends('layout.template-dashboard')

@section('title', 'Mensaje Enviado')

@section('content')

    {{-- <script>
        setTimeout(function() {
            window.location.href = "{{ route('dashboard') }}"; // Cambia 'dashboard' por la ruta deseada
        }, 3000);
    </script> --}}

    <div
        class="grid sm:grid-cols-2 gap-16 items-center p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-[#333] font-[sans-serif]">

        <div class="mx-auto text-center">
            <h1 class="text-red-600 text-4xl my-1">Mensaje Enviado</h1>
            <p class="text-gray-600  text-xl my-1">En breve nos pondremos en contacto contigo</p>
            <p class="text-gray-600 text-xl my-1">Un salud, hasta pronto.</p>
        </div>
        <div>
            <img src="{{ asset('storage\images\mensajeEnviado.png') }}" alt="">
        </div>


    </div>

@endsection
