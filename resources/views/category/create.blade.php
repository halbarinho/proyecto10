@extends('layout.templateCRUD')

@section('title', 'Registrar Nuevo Clase')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
@vite(['resources/css/app.css'])



@section('content')

    <main>
        <div class="container py-4">
            {{-- INCLUYO MENSAJES DE ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2>Registrar Nueva Categoria</h2>
            <form action="{{ route('category.store') }}" method="post">
                @csrf

                <div class="mb-3 row">
                    <label for="category_name" class="mb-3 block text-base font-medium text-[#07074D]">Nombre de la
                        Clase</label>
                    <div class="sm-5">
                        <input type="text" name="category_name"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="" placeholder="Nombre" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">Nombre de la
                        Clase</label>
                    <div class="sm-5">
                        <input type="text" name="description"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="" placeholder="Descripcion" required>
                    </div>
                </div>

                <a href="{{ url('welcome') }}"
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base
                    font-semibold text-white outline-none">Regresar</a>


                <input type="submit" name="submit" id="submit"
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                    value="Registrar">
            </form>
        </div>
    </main>
@endsection
