@extends('layout.template-adminDashboard')

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
@endsection

@section('title', 'Actualizar Categoría')

@vite(['resources/css/app.css'])



@section('content')

    <div
        class="relative gap-16 items-center p-8 mx-auto max-w-4xl bg-white
        shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-[#333] font-[sans-serif] dark:bg-gray-700"">


        {{-- INCLUYO MENSAJES DE ERROR --}}
        @if (session('error'))
            <div>
                <ul>
                    <li class="text-xs"><span
                            class="p-1 text-sm text-white bg-red-300 rounded-md">{{ session('error') }}</span></li>
                </ul>
            </div>
        @endif

        {{-- header --}}
        <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Editar la Categoría: {{ $category->name }}
            </h3>
        </div>

        <!-- body -->
        <div class="p-4 space-y-4 md:p-5">
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
                <div class="flex justify-end gap-2">
                    <a href="{{ route('category.index') }}"
                        class="text-white bg-rose-500 hover:bg-rose-700 cursor-pointer font-bold rounded-md px-4 py-2.5">Cancelar</a>


                    <input type="submit" name="submit" id="submit"
                        class="text-white bg-yellowPersonalLight hover:bg-yellowPersonal font-bold rounded-md px-4 py-2.5"
                        value="Actualizar">
                </div>
            </form>
        </div>

    </div>
@endsection
