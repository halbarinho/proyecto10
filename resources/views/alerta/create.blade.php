@extends('layout.template-dashboard')

@section('js')
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

            // Añado los campos que están incluidos en el modal al resto del form
            let modalForm = document.getElementById('modalForm');
            let mainForm = document.getElementById('mainForm');

            Array.from(modalForm.elements).forEach(function(element) {
                mainForm.appendChild(element.cloneNode(true));
            });

            mainForm.submit();

        }


        function goBack() {

            window.history.back();

        }
    </script>
@endsection

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
                {{-- Evito que los mensajes de validacion del form se muestren por duplicado --}}
                @if (!$errors->has('content'))
                    <div class="">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-sm"><span
                                        class="p-1 text-sm text-white bg-red-300 rounded-md">{{ $error }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @elseif (session('success'))
                <div class="">
                    <span class="p-1 text-white rounded-md bg-greenPersonal">{{ session('success') }}</span>
                </div>
            @endif

            <div class="my-6">


                <div
                    class="grid xs:grid-cols-1 md:grid-cols-2 items-center gap-16 p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-[#333] font-[sans-serif]">

                    <div class="mt-5 text-center">

                        <div
                            class="mx-auto rounded-full max-w-36 max-h-36 bg-yellowPersonalLight hover:bg-yellowPersonal hover:rotate-2">
                            <svg id="Layer_1" style="enable-background:new 0 0 128 128;" version="1.1"
                                viewBox="0 0 128 128" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" class="w-32 h-32 mx-auto my-auto fill-white">
                                <g>
                                    <path
                                        d="M103.98,24.84c0.8,0,1.59-0.31,2.18-0.94l3.07-3.25c1.14-1.2,1.09-3.1-0.12-4.24c-1.2-1.14-3.1-1.09-4.24,0.12l-3.07,3.25   c-1.14,1.2-1.09,3.1,0.12,4.24C102.5,24.57,103.24,24.84,103.98,24.84z" />
                                    <path
                                        d="M102.16,50.18c1.73,4.74,3.03,9.52,3.88,14.21c0.26,1.45,1.52,2.47,2.95,2.47c0.18,0,0.36-0.02,0.54-0.05   c1.63-0.29,2.71-1.85,2.42-3.48c-0.74-4.09-1.81-8.23-3.17-12.36l13.59-4.95c1.56-0.57,2.36-2.29,1.79-3.85   c-0.57-1.56-2.29-2.36-3.85-1.79c0,0-16.29,5.93-16.35,5.95C102.4,46.9,101.6,48.62,102.16,50.18z" />
                                    <path
                                        d="M89.14,43.63c-3.63-1.69-7.7-1.87-11.47-0.5c-0.16,0.06-0.31,0.13-0.46,0.21c-0.16,0.03-0.32,0.07-0.48,0.13   c-1.5,0.55-4.09,2.21-4.58,7.22c-0.29,2.94,0.24,6.45,1.48,9.87c2.56,7.02,7.07,11.46,11.32,11.46c0.69,0,1.38-0.12,2.04-0.36   l0.94-0.34c3.77-1.37,6.77-4.12,8.46-7.76s1.87-7.7,0.5-11.47C95.53,48.33,92.77,45.32,89.14,43.63z" />
                                    <path
                                        d="M123.35,78.3l-19.48-6.74c-1.57-0.54-3.27,0.29-3.82,1.85c-0.54,1.57,0.29,3.27,1.85,3.82l5.17,1.79   c-0.51,9.03-3.45,15.32-8.03,16.99c-4.22,1.53-9.95-0.83-15.74-6.49c-6.43-6.28-12.15-15.74-16.11-26.62s-5.66-21.8-4.77-30.74   c0.79-8.05,3.67-13.55,7.88-15.09c7.4-2.69,18.7,6.52,26.87,21.89c0.78,1.46,2.6,2.02,4.06,1.24c1.46-0.78,2.02-2.59,1.24-4.06   c-9.9-18.63-23.65-28.56-34.22-24.72c-4.72,1.72-8.21,5.91-10.19,12.06L19.77,66.01c-3.8,4.21-4.9,9.91-2.96,15.23   c1.94,5.33,6.45,8.98,12.06,9.77L32,91.45V119c0,4.41,3.59,8,8,8h20c4.41,0,8-3.59,8-8v-14.61c0-1.66-1.34-3-3-3s-3,1.34-3,3V119   c0,1.1-0.9,2-2,2H40c-1.1,0-2-0.9-2-2V92.29l47.53,6.66c3.7,2.33,7.35,3.53,10.78,3.53c1.65,0,3.25-0.28,4.79-0.83   c6.66-2.42,10.87-9.85,11.84-20.6l8.45,2.93c0.33,0.11,0.66,0.17,0.98,0.17c1.24,0,2.41-0.78,2.83-2.02   C125.75,80.55,124.92,78.84,123.35,78.3z M38,86.23l-6-0.84V76c0-1.66,1.34-3,3-3s3,1.34,3,3V86.23z" />
                                </g>
                            </svg>
                        </div>

                        <h3 class="text-xl font-semibold">Hazte oir</h3>
                        <p class="mt-2 text-justify text-gray-600">Utiliza esta sección para comunicarnos cualquier problema
                            que puedas tener, cualquier situación que te genere inquietud, que te afecte a ti o de la que
                            tengas conocimiento. Puedes denunciar aquellas conductas o situaciones que afecten a tus
                            compañeros, siempre te escucharemos.
                            No te calles, nosotros te escuchamos.
                        </p>
                        <p class="mt-2 text-justify text-gray-600">Estamos para ayudarte.
                        </p>
                    </div>

                    <div class="mt-5 text-center">
                        <form action="{{ route('alerta.store') }}" method="POST"
                            class="flex flex-col items-center justify-center" id="mainForm">
                            @csrf
                            <div class="w-full mb-3">

                                <div class="flex flex-col w-full sm-5">
                                    <textarea name="content" cols="50" rows="10"
                                        class="items-center rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        placeholder="Escribe aqui">{{ old('content') }}</textarea>
                                    @error('content')
                                        <div class="my-2 text-sm text-red-600">{{ $message }}</div>
                                    @enderror

                                    <div class="grid grid-cols-2 gap-2 my-2">

                                        <button onclick="goBack(); event.preventDefault();"
                                            class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700">Cancelar</button>

                                        <button type="button" onclick="showDialog()"
                                            class="justify-end px-4 py-2 font-bold text-white rounded-md bg-blueLighterPersonal border-blueLighterPersonal hover:bg-blueLightPersonal">Enviar</button>

                                    </div>

                                </div>


                            </div>


                        </form>
                        @include('alerta.modal.confirm-modal')
                    </div>

                </div>

            </div>



    </main>


@endsection
