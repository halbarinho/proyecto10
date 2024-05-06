@extends('layout.template-dashboard')

@section('css')
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.tailwindcss.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    {{-- Datatables --}}
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#alertasTable').DataTable({
                "order": [
                    [3, "desc"]
                ],
                columnDefs: [{
                    targets: [0, 4],
                    sortable: false,
                    searchable: false
                }],
                language: {
                    "decimal": "",
                    "emptyTable": "No hay datos",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered": "(Filtro de _MAX_ total registros)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron coincidencias",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Próximo",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": Activar orden de columna ascendente",
                        "sortDescending": ": Activar orden de columna desendente"
                    }
                },
                layout: {
                    topStart: null
                }
            });
        });
    </script>

@endsection

@section('title', 'Enviar Alerta')

@vite(['resources/css/app.css'])
@vite(['resources/js/app.js'])



@section('content')

    <main>
        <div class="container py-4 mx-auto">
            {{-- INCLUYO MENSAJES DE ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-sm text-red-600">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @elseif (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <section class="p-3 antialiased bg-gray-50 dark:bg-gray-900 sm:p-5">
                <div class="max-w-screen-xl px-4 mx-auto lg:px-12">
                    <div
                        class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                        <h1 class="text-3xl uppercase">Alertas</h1>
                    </div>
                    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                        <div
                            class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                            <div class="w-1/2 md:w-full">

                                @if ($alertas->isEmpty())
                                    <h3 class="text-red-600">No hay registros de Alertas</h3>
                                @else
                                    <form action="{{ route('alerta.deleteAlertas') }}" onsubmit="handleSubmit(event)"
                                        method="POST" id="form">
                                        @csrf
                                        @include('alerta.modal.deleteMultiple-modal')
                                        <div
                                            class="flex flex-col items-stretch justify-end flex-shrink-0 w-full mb-4 space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">

                                            <button
                                                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                                                type="submit" id="submitBtn"
                                                onclick="showDeleteMultipleModal();event.preventDefault();">Eliminar
                                                Seleccionadas
                                            </button>
                                        </div>
                                        <table id="alertasTable" class="table w-full mx-auto text-left">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                    </th>
                                                    <th
                                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                        Titulo Alerta</th>

                                                    <th
                                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                        Alumno</th>
                                                    <th
                                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                        Solucionada</th>
                                                    <th
                                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="">
                                                @foreach ($alertas as $alerta)
                                                    <tr class="my-4">
                                                        <td
                                                            class="px-6 py-3 leading-4 whitespace-no-wrap border-b border-gray-200">
                                                            <input type="checkbox" name="alertasList[]"
                                                                value="{{ $alerta->id }}">
                                                        </td>
                                                        <td
                                                            class="px-6 py-3 leading-4 whitespace-no-wrap border-b border-gray-200">
                                                            Alerta Numero: {{ $alerta->id }} en
                                                            {{ $alerta->Classroom->class_name }}
                                                        </td>

                                                        @if (is_null($alerta->estudiante_id))
                                                            <td
                                                                class="px-6 py-4 leading-4 whitespace-no-wrap border-b border-gray-200">
                                                                Anónimo</td>
                                                        @else
                                                            <td
                                                                class="px-6 py-4 leading-4 whitespace-no-wrap border-b border-gray-200">
                                                                {{ $alerta->estudiante->user->name }}
                                                                {{ $alerta->estudiante->user->last_name_1 }}</td>
                                                        @endif

                                                        @if ($alerta->active)
                                                            <td class="text-right">
                                                                <span
                                                                    class=" px-2 py-0.5 ml-auto text-xs text-center font-medium tracking-wide text-green-600 bg-green-200 rounded-full">
                                                                    Solucionada</span>
                                                            </td>
                                                        @else
                                                            <td class="text-right">
                                                                <span
                                                                    class=" px-2 py-0.5 ml-auto text-xs text-center font-medium tracking-wide text-red-600 bg-red-200 rounded-full">
                                                                    Pendiente
                                                                </span>
                                                            </td>
                                                        @endif

                                                        <td class="leading-4 text-right">
                                                            <a class="px-5 py-2 font-bold text-white bg-green-500 border border-green-700 rounded-md hover:bg-green-700"
                                                                href="{{ route('alerta.show', $alerta->id) }}">Acceder</a>

                                                            <button id="delete-btn"
                                                                class="px-5 py-2 text-white rounded-md cursor-pointer bg-rose-500 hover:bg-rose-700"
                                                                onclick="showDialog({{ $alerta->id }}); event.preventDefault();">
                                                                Eliminar
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @include('alerta.modal.delete-modal')
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif

        </div>
    </main>
    <script>
        function showDialog(id) {
            let dialog = document.getElementById('dialog-' + id);
            dialog.classList.remove('hidden');
            setTimeout(() => {
                dialog.classList.remove('opacity-0');
            }, 20);
        }

        function hideDialog(id) {
            let dialog = document.getElementById('dialog-' + id);
            dialog.classList.add('opacity-0');
            setTimeout(() => {
                dialog.classList.add('hidden');
            }, 500);
        }

        function deleteAlerta(id) {

            fetch(`/alerta/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => {
                    // if (!response.ok) {
                    //     throw new Error('Network response was not ok');
                    // }
                    // Recarga la página
                    location.reload(); // O cualquier otra acción necesaria
                })
                .catch(error => {
                    console.error('Ha habido un error al intentar eliminar la alerta:', error);
                });
        }


        function handleSubmit(event) {


            let selectedAlertas = document.querySelectorAll('input[name="alertasList[]"]:checked');

            let selectedIds = Array.from(selectedAlertas).map(selectedAlertas => selectedAlertas.value);

            if (selectedIds.length < 1) {
                location.reload();
            } else {
                showDeleteMultipleModal();
            }

        }


        function showDeleteMultipleModal() {
            let deleteMultipleModal = document.getElementById('deleteMultipleModal');
            deleteMultipleModal.classList.remove('hidden');
            setTimeout(() => {
                deleteMultipleModal.classList.remove('opacity-0');
            }, 20);
        }

        function hideDeleteMultipleModal() {
            let deleteMultipleModal = document.getElementById('deleteMultipleModal');
            deleteMultipleModal.classList.add('opacity-0');
            setTimeout(() => {
                deleteMultipleModal.classList.add('hidden');
            }, 500);
        }

        function submitDeleteMultipleForm() {
            let form = document.getElementById('form');
            form.submit();
        }
    </script>

@endsection
