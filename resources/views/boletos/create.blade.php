<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container h-100 my-5">
                    <div class="row h-100 justify-content-center align-items-center">
                        <div class="col-lg-12">
                            <h3 class="text-center mb-0">Nuevo Registro</h3>
                            <div class="mb-3">
                                <a href="{{ route('boletos.index') }}"
                                    class="btn btn-success btn-sm fs-6"
                                    title="Regresar al Panel">
                                    <i class="fa-solid fa-arrow-left me-1"></i>
                                    Regresar
                                </a>
                            </div>
                            <form action="{{ route('boletos.store') }}" method="post">
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
                                                <option value="Femenino" {{ old('sexo') == 'Femenino' ? 'selected' : '' }}>
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
                                    <button type="submit" class="btn btn-primary fs-6"
                                        title="Guardar Información">
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
    </div>
</x-app-layout>
