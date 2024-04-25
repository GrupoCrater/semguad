<x-app-layout>
    <style>
        td{
            height: 80px;
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container my-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end mb-3">
                                <a class="btn btn-sm btn-success" href={{ route('boletos.create') }}>Nuevo Registro</a>

                            </div>
                            <table id="tabla-boletos" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">ID</th> --}}
                                        <th scope="col">Folio</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido Paterno</th>
                                        <th scope="col">Apellido Materno</th>
                                        <th scope="col">Edad</th>
                                        {{-- <th scope="col">Sexo</th> --}}
                                        {{-- <th scope="col">Telefono</th> --}}
                                        {{-- <th scope="col">Correo</th> --}}
                                        <th scope="col">Ciudad</th>
                                        {{-- <th scope="col">Estado</th> --}}
                                        <th scope="col">Club</th>
                                        <th scope="col">Talla</th>
                                        <th scope="col">Prueba</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($boletos as $boleto)
                                        <tr>
                                            {{-- <td scope="row">{{ $boleto->id }}</td> //este --}}
                                            <th scope="row">{{ $boleto->folio }}</th>
                                            <td>{{ $boleto->nombre }}</td>
                                            <td>{{ $boleto->apellido_paterno }}</td>
                                            <td>{{ $boleto->apellido_materno }}</td>
                                            <td>{{ $boleto->edad }}</td>
                                            {{-- <td>{{ $boleto->sexo }}</td> //este --}}
                                            {{-- <td>{{ $boleto->telefono }}</td> //este --}}
                                            {{-- <td>{{ $boleto->correo }}</td> //este --}}
                                            <td>{{ $boleto->ciudad }}</td>
                                            {{-- <td>{{ $boleto->estado }}</td> //este --}}
                                            <td>{{ $boleto->club }}</td>
                                            <td>{{ $boleto->talla }}</td>
                                            <td>{{ $boleto->prueba }}</td>
                                            <td>
                                                <div class="d-flex align-items-center" style="height:100%">
                                                    <a href="{{ route('boletos.show', $boleto->id) }}"
                                                        class="btn btn-primary btn-sm">Ver</a>
                                                    <form id="eliminar"
                                                        action="{{ route('boletos.destroy', $boleto->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
        document.getElementById('eliminar').addEventListener('submit', function(event) {
            event.preventDefault();
            Swal.fire({
                title: "¿Estas seguro de querer eliminar el registro?",
                text: "Esta acción no podrá revertirse",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                this.submit()
            });
        });
    </script>

    @if (Session::has('destroy'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Registro eliminado con exito",
                showConfirmButton: false,
                timer: 1500
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
                title: "Registro creado con exito",
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
                }
            });
        });
    </script>
</x-app-layout>
