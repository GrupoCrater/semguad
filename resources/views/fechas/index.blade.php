<x-app-layout>
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
                                    <h2 class="mb-0">Fechas y Precios</h2>
                                    </a>
                                </div>

                                <a class="btn btn-sm btn-success fs-6" data-bs-toggle="modal"
                                    data-bs-target="#nuevasFechasModal" title="Crear nuevas fechas de registro">
                                    <i class="fa-solid fa-plus"></i>
                                    Nueva
                                </a>
                            </div>
                            <table id="tabla-fechas" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Inicio Registro</th>
                                        <th class="text-center" scope="col">Fin Registro</th>
                                        <th class="text-center" scope="col">Fin Pronto Pago</th>
                                        <th class="text-center" scope="col">Costo Pronto Pago</th>
                                        <th class="text-center" scope="col">Costo Pago Normal</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($fechas as $fecha)
                                        <tr class="cursor-pointer"
                                            onclick="window.location='{{ route('fechas.edit', $fecha->id) }}'">
                                            <td class="align-middle">{{ $fecha->inicio_registro }}</td>
                                            <td class="align-middle">{{ $fecha->fin_registro }}</td>
                                            <td class="align-middle">{{ $fecha->limite_pronto_pago }}</td>
                                            <td class="align-middle text-center">{{ $fecha->costo_pronto_pago }}</td>
                                            <td class="align-middle text-center">{{ $fecha->costo_normal }}</td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center"
                                                    style="height:100%">
                                                    <a href="#"
                                                        onclick="event.stopPropagation(); openEditarModal('{{ $fecha->id }}')"
                                                        class="btn btn-primary btn-sm me-1"
                                                        style="display:block; width:35px;" title="Ver">
                                                        <i class="fa-solid fa-pen-to-square"></i>

                                                    </a>
                                                    <form onclick="event.stopPropagation();"
                                                        id="eliminar-{{ $fecha->id }}"
                                                        action="{{ route('fechas.destroy', $fecha->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="confirmarEliminacion('{{ $fecha->id }}')"
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
                $('#nuevasFechasModal').modal('show');
            });
        </script>
    @endif

    <div class="modal fade" id="nuevasFechasModal" tabindex="-1" aria-labelledby="NuevasFechasModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevas Fechas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <form id="nuevasFechasFormModal" action="{{ route('fechas.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="p-2 col-lg-4">
                                    <div class="box-divform">
                                        <label class="span-form-input" for="inicio_registro">Fecha Inicio de
                                            Registros</label>
                                        <input type="date"
                                            class="form-control3 shadow-none @error('inicio_registro') is-invalid @enderror"
                                            id="inicio_registro" name="inicio_registro"
                                            value="{{ old('inicio_registro') }}">
                                        @error('inicio_registro')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="p-2 col-lg-4">
                                    <div class="box-divform">
                                        <label class="span-form-input" for="fin_registro">Fecha Fin de Registros</label>
                                        <input type="date"
                                            class="form-control3 shadow-none @error('fin_registro') is-invalid @enderror"
                                            id="fin_registro" name="fin_registro" value="{{ old('fin_registro') }}">
                                        @error('fin_registro')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class= "p-2 col-lg-4">
                                    <div class="box-divform">
                                        <label class="span-form-input" for="limite_pronto_pago">Fecha Limite de Pronto
                                            Pago</label>
                                        <input type="date"
                                            class="form-control3 shadow-none @error('limite_pronto_pago') is-invalid @enderror"
                                            id="limite_pronto_pago" name="limite_pronto_pago"
                                            value="{{ old('limite_pronto_pago') }}">
                                        @error('limite_pronto_pago')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="p-2 col-lg-6">
                                    <div class="box-divform ">
                                        <label class="span-form-input" for="costo_pronto_pago">Precio de boleto con
                                            pronto pago</label>
                                        <input type="number"
                                            class="form-control3 shadow-none @error('costo_pronto_pago') is-invalid @enderror"
                                            id="costo_pronto_pago" name="costo_pronto_pago"
                                            value="{{ old('costo_pronto_pago') }}" placeholder="p. ej. $350">
                                        @error('costo_pronto_pago')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="p-2 col-lg-6">
                                    <div class="box-divform ">
                                        <label class="span-form-input" for="costo_normal">Precio normal del
                                            boleto</label>
                                        <input type="number"
                                            class="form-control3 shadow-none @error('costo_normal') is-invalid @enderror"
                                            id="costo_normal" name="costo_normal" value="{{ old('costo_normal') }}"
                                            placeholder="p. ej. $400">
                                        @error('costo_normal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary fs-6" title="Guardar Información">
                                        <i class="fa-solid fa-floppy-disk me-1"></i>
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- End Modal Nuevo Registro --}}

{{-- Modal EDITAR --}}
    <script>
        function openEditarModal(fechaId) {
            // console.log(userId);
            // let user = document.getElementById('userId')
            // user.val = userId
            $.ajax({
                url: '/fechas/' + fechaId + '/edit', //Ruta de la peticion AJAX 
                type: 'GET',
                success: function(response) {
                    $('#inicio_registroEdit').val(response.inicio_registro);
                    $('#fin_registroEdit').val(response.fin_registro);
                    $('#limite_pronto_pagoEdit').val(response.limite_pronto_pago);
                    $('#costo_pronto_pagoEdit').val(response.costo_pronto_pago);
                    $('#costo_normalEdit').val(response.costo_normal);

                    $('#EditarFechasModal').modal('show');

                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            })

        }
    </script>

    <div class="modal fade" id="EditarFechasModal" tabindex="-1"
        aria-labelledby="EditarFechasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Fechas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <form action="{{ route('fechas.update', ['id' => $fecha->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="p-2 col-lg-4">
                                    <div class="box-divform">
                                        <label class="span-form-input" for="inicio_registroEdit">Fecha Inicio de
                                            Registros</label>
                                            <input hidden id="userId" name="userId">

                                        <input type="date"
                                            class="form-control3 shadow-none @error('inicio_registroEdit') is-invalid @enderror"
                                            id="inicio_registroEdit" name="inicio_registroEdit"
                                            value="{{ old('inicio_registroEdit', $fecha->inicio_registro) }}">
                                        @error('inicio_registroEdit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="p-2 col-lg-4">
                                    <div class="box-divform">
                                        <label class="span-form-input" for="fin_registroEdit">Fecha Fin de
                                            Registros</label>
                                        <input type="date"
                                            class="form-control3 shadow-none @error('fin_registroEdit') is-invalid @enderror"
                                            id="fin_registroEdit" name="fin_registroEdit"
                                            value="{{ old('fin_registroEdit', $fecha->fin_registro) }}">
                                        @error('fin_registro')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class= "p-2 col-lg-4">
                                    <div class="box-divform">
                                        <label class="span-form-input" for="limite_pronto_pagoEdit">Fecha Limite de
                                            Pronto
                                            Pago</label>
                                        <input type="date"
                                            class="form-control3 shadow-none @error('limite_pronto_pagoEdit') is-invalid @enderror"
                                            id="limite_pronto_pagoEdit" name="limite_pronto_pagoEdit"
                                            value="{{ old('limite_pronto_pagoEdit', $fecha->limite_pronto_pago) }}">
                                        @error('limite_pronto_pagoEdit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="p-2 col-lg-6">
                                    <div class="box-divform ">
                                        <label class="span-form-input" for="costo_pronto_pagoEdit">Precio de boleto
                                            con
                                            pronto pago</label>
                                        <input type="number"
                                            class="form-control3 shadow-none @error('costo_pronto_pagoEdit') is-invalid @enderror"
                                            id="costo_pronto_pagoEdit" name="costo_pronto_pagoEdit"
                                            value="{{ old('costo_pronto_pagoEdit', $fecha->costo_pronto_pago) }}"
                                            placeholder="p. ej. $350">
                                        @error('costo_pronto_pagoEdit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="p-2 col-lg-6">
                                    <div class="box-divform ">
                                        <label class="span-form-input" for="costo_normalEdit">Precio normal del
                                            boleto</label>
                                        <input type="number"
                                            class="form-control3 shadow-none @error('costo_normalEdit') is-invalid @enderror"
                                            id="costo_normalEdit" name="costo_normalEdit"
                                            value="{{ old('costo_normalEdit', $fecha->costo_normal) }}"
                                            placeholder="p. ej. $400">
                                        @error('costo_normalEdit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary fs-6" title="Guardar Información">
                                        <i class="fa-solid fa-floppy-disk me-1"></i>
                                        Guardar
                                    </button>
                                    <input hidden id="userId" name="userId">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- End Modal EDITAR --}}

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

</x-app-layout>
