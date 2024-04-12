@extends('layout.template-adminDashboard')

@section('title', 'Actualizar Categoría')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
@vite(['resources/css/app.css'])



@section('content')

    <div class="mr-4 ml-14 mt-14">
        <div class="container py-4">
            {{-- INCLUYO MENSAJES DE ERROR --}}
            @if (session('error'))
                <div>
                    <ul>
                        <li class="text-xs text-redPersonal">{{ session('error') }}</li>
                    </ul>
                </div>
            @endif

            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Editar la Categoría: {{ $category->name }}
            </h3>
            <form action="{{ route('category.update', ['category' => $category->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">Nombre de la
                        Categoría</label>
                    <div class="sm-5">
                        <input type="text" name="name"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ $category->name }}" placeholder="Nombre" required>
                        @if ($errors->has('name'))
                            <div class="text-xs text-redPersonal">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">Descripción de la
                        Categoría</label>
                    <div class="sm-5">
                        <input type="text" name="description"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ $category->description }}" placeholder="Descripcion" required>
                        @if ($errors->has('description'))
                            <div class="text-xs text-redPersonal">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                </div>

                <a href="{{ route('category.index') }}"
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base
                    font-semibold text-white outline-none">Regresar</a>


                <input type="submit" name="submit" id="submit"
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                    value="Actualizar">
            </form>
        </div>
    </div>
@endsection
