<div class="col-lg-12">
    <form action="{{ route('administradores.update', $administrador->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row py-3">
            <div class="col-12 py-2 px-4">
                <div class="box-divform">
                    <label class="span-form-input" for="nameedit">Nombre</label>
                    <input type="text"
                        class="form-control3 shadow-none @error('nameedit') is-invalid @enderror"
                        id="nameedit" name="nameedit"
                        value="{{ old('nameedit', $administrador->nombre) }}"
                        placeholder="p. ej. Julio Cesar">
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
                        placeholder="p. ej. correo@correo.com">
                    @error('emailedit')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 py-2 px-4">
                <div class="box-divform ">
                    <label class="span-form-input" for="roledit">Rol</label>
                    <select class="form-control3 shadow-none @error('roledit') is-invalid @enderror"
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
                    <input type="passwordedit"
                        class="form-control3 shadow-none @error('passwordedit') is-invalid @enderror"
                        id="passwordedit" name="passwordedit"
                        value="{{ old('passwordedit', $administrador->password) }}"
                        placeholder="p. ej. *******">
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
                        value="{{ old('password_confirmationedit', $administrador->password_confirmation) }}"
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
        </div>
    </form>
</div>