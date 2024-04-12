@extends('layout.template-dashboard')

@section('title', 'Enviar Denuncia')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
@vite(['resources/css/app.css'])
@vite(['resources/js/app.js'])

@section('content')

    <main>
        <div class="container py-4 mx-auto">
            {{-- INCLUYO MENSAJES DE ERROR --}}
            @if ($errors->any())
                <div class="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-sm text-red-600">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @elseif (session('success'))
                <div class="">
                    {{ session('success') }}
                </div>
            @endif

            <div class="max-w-screen-xl px-4 mx-auto lg:px-12">
                <div
                    class="flex flex-col items-center justify-between p-4 mx-auto space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <h1 class="mx-auto text-3xl uppercase">Que te preocupa</h1>
                </div>

                <div class="w-full mx-auto md:w-1/2">
                    <form action="{{ route('alerta.store') }}" method="POST"
                        class="flex flex-col items-center justify-center" id="mainForm">
                        @csrf
                        <div class="w-full mb-3">
                            {{-- <label for="alerta-text" class="mb-3 block text-base font-medium text-[#07074D]">Cuentame que
                                pasa</label> --}}
                            <div class="flex flex-col w-full sm-5">
                                <textarea name="content" cols="50" rows="10"
                                    class="items-center rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                    placeholder="Escribe aqui"></textarea>


                                <div class="flex justify-end mx-1 my-1">

                                    <div class="flex justify-end px-4 ">
                                        <button type="button" onclick="showDialog()"
                                            class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg min-w-20 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Enviar</button>
                                    </div>

                                    <div class="flex justify-end px-4 ">
                                        <button onclick="goBack(); event.preventDefault();"
                                            class="px-4 py-2 text-sm font-medium text-white bg-red-800 rounded-lg min-w-20 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Cancelar</button>
                                    </div>

                                </div>

                            </div>


                        </div>


                    </form>
                    @include('alerta.modal.confirm-modal')
                </div>
            </div>



    </main>
    <script>
        function showDialog() {
            let dialog = document.getElementById('dialog-confirm');
            dialog.classList.remove('hidden');
            setTimeout(() => {
                dialog.classList.remove('opacity-0');
            }, 20);
        }

        function hideDialog() {
            let dialog = document.getElementById('dialog-confirm');
            dialog.classList.add('opacity-0');
            setTimeout(() => {
                dialog.classList.add('hidden');
            }, 500);
        }


        function submitForm() {

            let modalForm = document.getElementById('modalForm');
            let mainForm = document.getElementById('mainForm');

            Array.from(modalForm.elements).forEach(function(element) {
                mainForm.appendChild(element.cloneNode(true));
            });

            mainForm.submit();
            // document.getElementById('mainForm').submit();
        }


        function goBack() {

            window.history.back();

        }
    </script>

@endsection
