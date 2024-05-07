<x-app-layout>
    <style>
        td {
            height: 70px;
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-4 mb-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm fs-6"
                                    title="Regresar al Panel">
                                    <i class="fa-solid fa-arrow-left me-1"></i>
                                    Regresar
                                </a>
                                <div class="d-flex align-items-center">
                                    <h2 class="mb-0">Boletos registrados</h2>
                                    <a href="{{ route('fechas.index') }}"
                                    class="btn btn-primary btn-sm me-1"
                                    title="Ver fechas de registro y precios de boletos">
                                    Ver fechas y precios
                                </a>
                                </div>
                                
                                <a class="btn btn-sm btn-success fs-6" data-bs-toggle="modal"
                                    data-bs-target="#nuevoRegistroModal" title="Crear nuevo registro">
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
                                                    <a href="#" class="btn btn-secondary btn-sm me-1"
                                                        onclick="event.stopPropagation(); openPDFModal('{{ route('descargar.pdf', ['id' => $boleto->id, 'folio' => $boleto->folio]) }}')"
                                                        style="display:block; width:35px;" title="Ver PDF">
                                                        <i class="fa-solid fa-file-pdf"></i>
                                                    </a>
                                                    <form onclick="event.stopPropagation();"
                                                        id="eliminar-{{ $boleto->id }}"
                                                        action="{{ route('boletos.destroy', $boleto->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="confirmarEliminacion('{{ $boleto->id }}')"
                                                            style="width:35px;" title="Eliminar">
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

    {{-- Modal Nuevo Registro --}}
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#nuevoRegistroModal').modal('show');
            });
        </script>
    @endif

    <div class="modal fade" id="nuevoRegistroModal" tabindex="-1" aria-labelledby="NuevoRegistroModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Registro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <form id="registroFormModal" action="{{ route('boletos.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="p-2">
                                    <div class="box-divform col-lg-3">
                                        <label class="span-form-input" for="folio">Folio del boleto</label>
                                        <input type="text"
                                            class="form-control3 shadow-none @error('folio') is-invalid @enderror"
                                            id="folio" name="folio" value="{{ $nuevoFolio }}" readonly>

                                        @error('folio')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 p-2">
                                    <div class="box-divform px-2">
                                        <label class="span-form-input" for="nombre">Nombre</label>
                                        <input type="text"
                                            class="form-control3 shadow-none @error('nombre') is-invalid @enderror"
                                            id="nombre" name="nombre" value="{{ old('nombre') }}"
                                            placeholder="p. ej. Julio César">
                                        @error('nombre')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 p-2">
                                    <div class="box-divform  px-2">
                                        <label class="span-form-input" for="apellido_paterno">Apellido
                                            Paterno</label>
                                        <input type="text"
                                            class="form-control3 shadow-none @error('apellido_paterno') is-invalid @enderror"
                                            id="apellido_paterno" name="apellido_paterno"
                                            value="{{ old('apellido_paterno') }}" placeholder="p. ej. Navarro">
                                        @error('apellido_paterno')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 p-2">
                                    <div class="box-divform ">
                                        <label class="span-form-input" for="apellido_materno">Apellido
                                            Materno</label>
                                        <input type="text"
                                            class="form-control3 shadow-none @error('apellido_materno') is-invalid @enderror"
                                            id="apellido_materno" name="apellido_materno"
                                            value="{{ old('apellido_materno') }}" placeholder="p. ej. Vazquez">
                                        @error('apellido_materno')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="p-2 col-lg-4">
                                    <div class="box-divform ">
                                        <label class="span-form-input" for="edad">Edad</label>
                                        <input type="number"
                                            class="form-control3 shadow-none @error('edad') is-invalid @enderror"
                                            id="edad" name="edad" value="{{ old('edad') }}"
                                            placeholder="p. ej. 30">
                                        @error('edad')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="p-2 col-lg-4">
                                    <div class="box-divform ">
                                        <label class="span-form-input" for="sexo">Sexo</label>
                                        <select class="form-control3 shadow-none @error('sexo') is-invalid @enderror"
                                            name="sexo" id="sexo">
                                            <option value="">- Seleccione un género -</option>
                                            <option value="Femenino"
                                                {{ old('sexo') == 'Femenino' ? 'selected' : '' }}>
                                                Femenino</option>
                                            <option value="Masculino"
                                                {{ old('sexo') == 'Masculino' ? 'selected' : '' }}>
                                                Masculino</option>
                                        </select>
                                        @error('sexo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="p-2 col-lg-4">
                                    <div class="box-divform ">
                                        <label class="span-form-input" for="telefono">Telefono</label>
                                        <input type="text"
                                            class="form-control3 shadow-none @error('telefono') is-invalid @enderror"
                                            id="telefono" name="telefono" value="{{ old('telefono') }}"
                                            placeholder="p. ej. 3313764530">
                                        @error('telefono')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 p-2">
                                    <div class="box-divform ">
                                        <label class="span-form-input" for="correo">Correo Electronico</label>
                                        <input type="text"
                                            class="form-control3 shadow-none @error('correo') is-invalid @enderror"
                                            id="correo" name="correo" value="{{ old('correo') }}"
                                            placeholder="p. ej. correo@correo.com">
                                        @error('correo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 p-2">
                                    <div class="box-divform ">
                                        <label class="span-form-input" for="ciudad">Ciudad</label>
                                        <input type="text"
                                            class="form-control3 shadow-none @error('ciudad') is-invalid @enderror"
                                            id="ciudad" name="ciudad" value="{{ old('ciudad') }}"
                                            placeholder="p. ej. Guadalajara">
                                        @error('ciudad')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 p-2">
                                    <div class="box-divform ">
                                        <label class="span-form-input" for="estado">Estado</label>
                                        <input type="text"
                                            class="form-control3 shadow-none @error('estado') is-invalid @enderror"
                                            id="estado" name="estado" value="{{ old('estado') }}"
                                            placeholder="p. ej. Jalisco">
                                        @error('estado')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 p-2">
                                    <div class="box-divform">
                                        <label class="span-form-input" for="club">Club Deportivo</label>
                                        <input type="text"
                                            class="form-control3 shadow-none @error('club') is-invalid @enderror"
                                            id="club" name="club" value="{{ old('club') }}"
                                            placeholder="p. ej. Runners">
                                        @error('club')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 p-2">
                                    <div class="box-divform">
                                        <label class="span-form-input" for="talla">Talla</label>
                                        <select class="form-control3 shadow-none @error('talla') is-invalid @enderror"
                                            name="talla" id="talla">
                                            <option value="">- Seleccione una talla -</option>
                                            <option value="Niño: Chica"
                                                {{ old('talla') == 'Niño: Chica' ? 'selected' : '' }}>Niño: Chica
                                            </option>
                                            <option value="Niño: Mediana"
                                                {{ old('talla') == 'Niño: Mediana' ? 'selected' : '' }}>Niño: Mediana
                                            </option>
                                            <option value="Niño: Grande"
                                                {{ old('talla') == 'Niño: Grande' ? 'selected' : '' }}>Niño: Grande
                                            </option>

                                            <option value="Adulto: Extra-chica"
                                                {{ old('talla') == 'Adulto: Extra-chica' ? 'selected' : '' }}>Adulto:
                                                Extra
                                                Chica</option>
                                            <option value="Adulto: Chica"
                                                {{ old('talla') == 'Adulto: Chica' ? 'selected' : '' }}>Adulto: Chica
                                            </option>
                                            <option value="Adulto: Mediana"
                                                {{ old('talla') == 'Adulto: Mediana' ? 'selected' : '' }}>Adulto:
                                                Mediana
                                            </option>
                                            <option value="Adulto: Grande"
                                                {{ old('talla') == 'Adulto: Grande' ? 'selected' : '' }}>Adulto: Grande
                                            </option>
                                            <option value="Adulto: Extra-grande"
                                                {{ old('talla') == 'Adulto: Extra-grande' ? 'selected' : '' }}>Adulto:
                                                Extra Grande</option>
                                            <option value="Adulto: XXL"
                                                {{ old('talla') == 'Adulto: XXL' ? 'selected' : '' }}>Adulto: XXL
                                            </option>
                                        </select>
                                        @error('talla')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 p-2">
                                    <div class="box-divform">
                                        <label class="span-form-input" for="prueba">Prueba</label>
                                        <select
                                            class="form-control3 shadow-none @error('prueba') is-invalid @enderror"
                                            name="prueba" id="prueba">
                                            <option value="">- Seleccione una prueba -</option>
                                            <option value="Junior A: 600m"
                                                {{ old('prueba') == 'Junior A: 600m' ? 'selected' : '' }}>Junior A: 600
                                                m
                                                (6-11 años)</option>
                                            <option value="Junior B: 1km"
                                                {{ old('prueba') == 'Junior B: 1km' ? 'selected' : '' }}>Junior B: 1 Km
                                                (12-13 años)</option>
                                            <option value="Junior C: 2km"
                                                {{ old('prueba') == 'Junior C: 2km' ? 'selected' : '' }}>Junior C: 2 Km
                                                (14-15 años)</option>
                                            <option value="Junior D: 2km"
                                                {{ old('prueba') == 'Junior D: 2km' ? 'selected' : '' }}>Junior D: 2 Km
                                                (16-17 años)</option>
                                            <option value="Especial"
                                                {{ old('prueba') == 'Especial' ? 'selected' : '' }}>
                                                Especial (Personas Ciegas)</option>
                                            <option value="Caminata: 2km"
                                                {{ old('prueba') == 'Caminata: 2km' ? 'selected' : '' }}>Caminata 2 Km
                                                (16-17 años)</option>
                                            <option value="5 km" {{ old('prueba') == '5 km' ? 'selected' : '' }}>5
                                                Kilómetros</option>
                                            <option value="10 km" {{ old('prueba') == '10 km' ? 'selected' : '' }}>10
                                                Kilómetros</option>
                                        </select>
                                        @error('prueba')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary fs-6" title="Guardar Información">
                                    <i class="fa-solid fa-floppy-disk me-1"></i>
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
            </div>
        </div>
    </div>


    {{-- ALERTAS --}}
    <script>
        function confirmarEliminacion(id) {
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
                    document.getElementById('eliminar-' + id).submit();
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
    {{-- END Alertas --}}


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
    {{-- END Datatable --}}
</x-app-layout>
