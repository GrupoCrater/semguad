<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-4 mb-5">
                    <div class="row ">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm fs-6"
                                    title="Regresar al Panel">
                                    <i class="fa-solid fa-arrow-left me-1"></i>
                                    Regresar
                                </a>
                                <div class="d-flex align-items-center">
                                    <h2 class="mb-0">Administradores registrados</h2>
                                </div>
                                <a class="btn btn-sm btn-success fs-6" data-bs-toggle="modal"
                                    data-bs-target="#nuevoAdministradorModal" title="Crear nuevo registro">
                                    <i class="fa-solid fa-plus"></i>
                                    Nuevo
                                </a>
                            </div>
                            <table id="tabla-administradores" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">ID</th> --}}
                                        <th class="text-center" scope="col">Id</th>
                                        <th class="text-center" scope="col">Nombre</th>
                                        <th class="text-center" scope="col">Correo</th>
                                        <th class="text-center" scope="col">Rol</th>
                                        <th class="text-center" scope="col">Fecha de Alta</th>
                                        <th class="text-center" scope="col">Boletos vendidos</th>
                                        <th class="text-center" scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($administradores as $administrador)
                                        <tr class="cursor-pointer"
                                            onclick="window.location='{{ route('administradores.edit', $administrador->id) }}'">
                                            <th class="align-middle text-center" scope="row">{{ $administrador->id }}
                                            </th>
                                            <td class="align-middle text-center">{{ $administrador->name }}</th>
                                            <td class="align-middle text-center">{{ $administrador->email }}</td>
                                            <td class="align-middle text-center">{{ $administrador->rol }}</td>
                                            <td class="align-middle text-center">{{ $administrador->created_at }}</td>
                                            <td class="align-middle text-center">{{ $administrador->boletos_count }}
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center justify-content-center"
                                                    style="height:100%">
                                                    {{-- Boton Ver/Editar --}}
                                                    {{-- <a href="{{ route('administradores.edit', $administrador->id) }}"
                                                        class="btn btn-primary btn-sm me-1"
                                                        style="display:block; width:35px;" title="Ver">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a> --}}
                                                    <a href="#" class="btn btn-primary btn-sm me-1"
                                                        onclick="event.stopPropagation(); openEditarModal('{{ $administrador->id }}')"
                                                        style="display:block; width:35px;" title="Editar">
                                                        {{-- <i class="fa-solid fa-eye"></i> --}}
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>

                                                    {{-- Boton Eliminar --}}
                                                    <form onclick="event.stopPropagation();"
                                                        id="eliminar-{{ $administrador->id }}"
                                                        action="{{ route('administradores.destroy', $administrador->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="confirmarEliminacion('{{ $administrador->id }}')"
                                                            style="width:35px;" title="Eliminar">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                    {{-- End Boton Eliminar --}}
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
                $('#nuevoAdministradorModal').modal('show');
            });
        </script>
    @endif

    <div class="modal fade" id="nuevoAdministradorModal" tabindex="-1" aria-labelledby="NuevoAdministradorModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <form action="{{ route('administradores.store') }}" method="POST">
                            @csrf
                            <div class="row py-3">
                                <div class="col-12 py-2 px-4">
                                    <div class="box-divform">
                                        <label class="span-form-input" for="name">Nombre</label>
                                        <input type="text"
                                            class="form-control3 shadow-none @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}"
                                            placeholder="p. ej. Julio Cesar">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 py-2 px-4">
                                    <div class="box-divform px-2">
                                        <label class="span-form-input" for="email">Correo</label>
                                        <input type="text"
                                            class="form-control3 shadow-none @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}"
                                            placeholder="p. ej. correo@correo.com">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 py-2 px-4">
                                    <div class="box-divform ">
                                        <label class="span-form-input" for="rol">Rol</label>
                                        <select class="form-control3 shadow-none @error('rol') is-invalid @enderror"
                                            name="rol" id="rol">
                                            <option value="">- Seleccione un rol -</option>
                                            <option value="master" {{ old('rol') == 'master' ? 'selected' : '' }}>
                                                Master</option>
                                            <option value="administrador"
                                                {{ old('rol') == 'administador' ? 'selected' : '' }}>
                                                Administrador</option>
                                        </select>
                                        @error('rol')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 py-2 px-4">
                                    <div class="box-divform  px-2">
                                        <label class="span-form-input" for="password">Contraseña</label>
                                        <input type="password"
                                            class="form-control3 shadow-none @error('password') is-invalid @enderror"
                                            id="password" name="password" value="{{ old('password') }}"
                                            placeholder="p. ej. *******">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 py-2 px-4">
                                    <div class="box-divform ">
                                        <label class="span-form-input" for="password_confirmation">Confirmar
                                            contraseña</label>
                                        <input type="password"
                                            class="form-control3 shadow-none @error('password') is-invalid @enderror"
                                            id="password_confirmation" name="password_confirmation"
                                            value="{{ old('password_confirmation') }}" placeholder="p. ej. *******">
                                        @error('password')
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
            </div>
        </div>
    </div>
{{-- End Modal Nuevo Registro --}}

{{-- Modal EDITAR --}}
    <script>
        function openEditarModal(userId) {
            // console.log(userId);
            // let user = document.getElementById('userId')
            // user.val = userId
            $.ajax({
                url: '/administradores/' + userId + '/edit', //Ruta de la peticion AJAX 
                type: 'GET',
                success: function(response) {
                    $('#nameedit').val(response.name);
                    $('#emailedit').val(response.email);
                    $('#roledit').val(response.rol);
                    $('#userId').val(response.id);
                    // $('#password_confirmationedit').val(response.password);

                    // ASIGNAR EL ID AL ACTION DEL FORM, LA RUTA DEBE SER DINAMICA

                    $('#EditarAdministradorModal').modal('show');

                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            })

        }
    </script>

    <div class="modal fade" id="EditarAdministradorModal" tabindex="-1"
        aria-labelledby="EditarAdministradorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Administrador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <form action="{{ route('administradores.update') }}" method="post">
                            @csrf
                            <div class="row py-3">
                                <div class="col-12 py-2 px-4">
                                    <div class="box-divform">
                                        <label class="span-form-input" for="nameedit">Nombre</label>
                                        <input type="text"
                                            class="form-control3 shadow-none @error('nameedit') is-invalid @enderror"
                                            id="nameedit" name="nameedit"
                                            value="{{ old('nameedit', $administrador->nombre) }}"
                                            placeholder="p. ej. Julio Cesar" required>
                                        @error('nameedit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 py-2 px-4">
                                    <div class="box-divform px-2">
                                        <label class="span-form-input" for="emailedit">Correo</label>
                                        <input type="text"
                                            class="form-control3 shadow-none @error('emailedit') is-invalid @enderror"
                                            id="emailedit" name="emailedit"
                                            value="{{ old('emailedit', $administrador->correo) }}"
                                            placeholder="p. ej. correo@correo.com" required>
                                        @error('emailedit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 py-2 px-4">
                                    <div class="box-divform ">
                                        <label class="span-form-input" for="roledit">Rol</label>
                                        <select
                                            class="form-control3 shadow-none @error('roledit') is-invalid @enderror"
                                            name="roledit" id="roledit">
                                            <option value="">- Seleccione un rol -</option>
                                            <option value="master"
                                                {{ old('roledit', $administrador->rol) == 'master' ? 'selected' : '' }}>
                                                Master</option>
                                            <option value="administrador"
                                                {{ old('roledit', $administrador->rol) == 'administador' ? 'selected' : '' }}>
                                                Administrador</option>
                                        </select>
                                        @error('roledit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 py-2 px-4">
                                    <div class="box-divform  px-2">
                                        <label class="span-form-input" for="passwordedit">Contraseña</label>
                                        <input type="password"
                                            class="form-control3 shadow-none @error('passwordedit') is-invalid @enderror"
                                            id="passwordedit" name="passwordedit" placeholder="p. ej. *******">
                                        @error('passwordedit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 py-2 px-4">
                                    <div class="box-divform ">
                                        <label class="span-form-input" for="password_confirmationedit">Confirmar
                                            contraseña</label>
                                        <input type="password"
                                            class="form-control3 shadow-none @error('password_confirmationedit') is-invalid @enderror"
                                            id="password_confirmationedit" name="password_confirmationedit"
                                            placeholder="p. ej. *******">
                                        @error('password_confirmationedit')
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
                title: "Seminarista eliminado con exito",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @elseif (Session::has('store'))
        {{-- Se genera un link invisble para descargarel pdf --}}
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
            var table = document.getElementById("tabla-administradores");

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
