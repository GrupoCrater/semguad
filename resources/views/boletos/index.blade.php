<x-app-layout>
    <style>
        td {
            height: 70px;
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container my-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end mb-3">
                                <a class="btn btn-sm btn-success fs-6" href={{ route('boletos.create') }}
                                    title="Crear nuevo registro">
                                    <i class="fa-solid fa-plus"></i>
                                    Nuevo
                                </a>

                            </div>
                            <table id="tabla-boletos" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">ID</th> --}}
                                        <th class="text-center" scope="col">Folio</th>
                                        <th class="text-center" scope="col">Nombre</th>
                                        <th class="text-center" scope="col">A. Paterno</th>
                                        <th class="text-center" scope="col">A. Materno</th>
                                        <th class="text-center" scope="col">Edad</th>
                                        {{-- <th scope="col">Sexo</th> --}}
                                        {{-- <th scope="col">Telefono</th> --}}
                                        {{-- <th scope="col">Correo</th> --}}
                                        <th class="text-center" scope="col">Ciudad</th>
                                        {{-- <th scope="col">Estado</th> --}}
                                        <th class="text-center" scope="col">Club</th>
                                        {{-- <th class="text-center" scope="col">Talla</th> --}}
                                        <th class="text-center" scope="col">Prueba</th>
                                        <th class="text-center" scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($boletos as $boleto)
                                        <tr class="cursor-pointer"
                                            onclick="window.location='{{ route('boletos.edit', $boleto->id) }}'">
                                            {{-- <td scope="row">{{ $boleto->id }}</td> //este --}}
                                            <th class="align-middle" scope="row">{{ $boleto->folio }}</th>
                                            <td class="align-middle">{{ $boleto->nombre }}</td>
                                            <td class="align-middle">{{ $boleto->apellido_paterno }}</td>
                                            <td class="align-middle">{{ $boleto->apellido_materno }}</td>
                                            <td class="align-middle text-center">{{ $boleto->edad }}</td>
                                            {{-- <td class="align-middle">{{ $boleto->sexo }}</td> //este --}}
                                            {{-- <td class="align-middle">{{ $boleto->telefono }}</td> //este --}}
                                            {{-- <td class="align-middle">{{ $boleto->correo }}</td> //este --}}
                                            <td class="align-middle text-center">{{ $boleto->ciudad }}</td>
                                            {{-- <td class="align-middle">{{ $boleto->estado }}</td> //este --}}
                                            <td class="align-middle text-center">{{ $boleto->club }}</td>
                                            {{-- <td class="align-middle">{{ $boleto->talla }}</td> --}}
                                            <td class="align-middle text-center">{{ $boleto->prueba }}</td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center"
                                                    style="height:100%">
                                                    <a href="{{ route('boletos.edit', $boleto->id) }}"
                                                        class="btn btn-primary btn-sm me-1"
                                                        style="display:block; width:35px;" title="Ver">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('descargar.pdf', ['id' => $boleto->id, 'folio' => $boleto->folio]) }}" class="btn btn-secondary btn-sm me-1"
                                                        onclick="event.stopPropagation();"
                                                        style="display:block; width:35px;" title="Descargar PDF" target="_blank">
                                                        <i class="fa-solid fa-file-pdf"></i>
                                                    </a>
                                                    <form onclick="event.stopPropagation();" id="eliminar"
                                                        action="{{ route('boletos.destroy', $boleto->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="confirmarEliminacion()" style="width:35px;"
                                                            title="Eliminar">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ALERTAS --}}
    <script>
        function confirmarEliminacion() {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Esta acción no podrá revertirse",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('eliminar').submit();
                }
            });
        };
    </script>

    @if (Session::has('destroy'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Registro eliminado con exito",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @elseif (Session::has('store'))
        {{-- Se genera un link invisble para descargarel pdf --}}
        <a id="pdfDownloadLink" href="{{ session('store') }}" style="display:none;" download></a>
        <script>
            // Se da clic de manera automatica al link para descargar alpdf
            document.getElementById('pdfDownloadLink').click();

            Swal.fire({
                position: "center",
                icon: "success",
                title: "Registro guardado con exito",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @elseif (Session::has('update'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Actualización exitosa",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    {{-- Inicializamos Data Tables --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Selecciona la tabla con el ID 'tabla-boletos'
            var table = document.getElementById("tabla-boletos");

            // Inicializa DataTables en la tabla
            var dataTable = new DataTable(table, {
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/2.0.5/i18n/es-MX.json'
                },
                order: [
                    [0, "desc"]
                ] //Damos orden descendente a nuestros datos
            });
        });
    </script>
</x-app-layout>
