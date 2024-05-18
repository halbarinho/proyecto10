@extends('layout.template-adminDashboard')

@section('css')

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

@endsection

@section('title', 'Registrar Nuevo Clase')

@vite('resources/js/app.js')

@vite('resources\js\selectStageLevel.js');
@section('content')


    <div class="mr-4 overflow-auto ml-14 mt-14">
        <div class="flex justify-between w-full ">
            {{-- INCLUYO MENSAJES DE ERROR --}}

            @if (session('error'))
                <div>
                    <ul>
                        <li class="text-xs text-redPersonal">{{ session('error') }}</li>
                    </ul>
                </div>
            @endif
        </div>


        <div class="my-6">
            <div
                class="grid xs:grid-cols-1 md:grid-cols-2 items-center gap-16 p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-[#333] font-[sans-serif]">



                <div>

                    <h2 class="mt-3 text-2xl font-semibold text-center">Registrar Nueva Clase</h2>

                    <div class="mx-auto mt-5 text-center">

                        <p class="mt-2 text-center text-gray-600">Introduce los datos para la nueva clase.</p>
                    </div>
                    </br>

                </div>


                <div>
                    <form action="{{ route('classroom.store') }}" method="post">
                        @csrf

                        <div class="mb-3 row">
                            <label for="class_name" class="mb-3 block text-base font-medium text-[#07074D]">Nombre de la
                                Clase</label>
                            <div class="sm-5">
                                <input type="text" name="class_name"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                    value="{{ old('class_name') }}" placeholder="Nombre" required>
                            </div>
                            @if ($errors->has('class_name'))
                                <div class="text-xs text-redPersonal">{{ $errors->first('class_name') }}</div>
                            @endif
                        </div>


                        <div class="mb-3 row">
                            <label for="user_id" class="mb-3 block text-base font-medium text-[#07074D]">Tutor</label>
                            <div class="sm-5">
                                <select name="user_id" id="user_id"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                    <option value="">Seleccione Tutor</option>
                                    @if ($docentes->isEmpty())
                                        <option value="">No Existen Docentes</option>
                                    @else
                                        <option value="">No Asignar</option>
                                        @foreach ($docentes as $docente)
                                            <option value="{{ $docente->user_id }}">
                                                {{ $docente->User->name }} {{ $docente->User->last_name_1 }}
                                                {{ $docente->User->last_name_2 }}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                            @if ($errors->has('user_id'))
                                <div class="text-xs text-redPersonal">{{ $errors->first('user_id') }}</div>
                            @endif
                        </div>

                        <div id="selectStageLevel">
                            <selectStageLevel></selectStageLevel>
                            @if ($errors->has('stage_id'))
                                <div class="text-xs text-redPersonal">{{ $errors->first('stage_id') }}</div>
                            @endif
                            @if ($errors->has('level_id'))
                                <div class="text-xs text-redPersonal">{{ $errors->first('level_id') }}</div>
                            @endif
                        </div>


                        <div class="grid grid-cols-2 gap-2">
                            <a href="{{ route('admin.classroom') }}" class="">
                                <button type='button'
                                    class="text-white bg-rose-500 hover:bg-rose-700 cursor-pointer font-bold rounded-md px-4 py-2.5 w-full">Cancelar</button>
                            </a>


                            <input type="submit" name="submit" id="submit"
                                class="text-white bg-yellowPersonalLight hover:bg-yellowPersonal font-bold rounded-md px-4 py-2.5 w-full"
                                value="Registrar">

                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>

@endsection
