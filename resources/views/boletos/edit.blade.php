<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container h-100 my-5">
                    <div class="row h-100 justify-content-center align-items-center">
                        <div class="col-10 col-md-8 col-lg-6">
                            <h3>Actualizar Regristro</h3>
                            <form action="{{ route('boletos.update', $boleto->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="folio">Folio del boleto</label>
                                    <input type="text" class="form-control @error('folio') is-invalid @enderror"
                                        id="folio" name="folio" value="{{ $boleto->folio }}" readonly>

                                    @error('folio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                        id="nombre" name="nombre" value="{{ old('nombre', $boleto->nombre) }}">

                                    @error('nombre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="body">Apellido Paterno</label>
                                    <input type="text"
                                        class="form-control @error('apellido_paterno') is-invalid @enderror"
                                        id="apellido_paterno" name="apellido_paterno"
                                        value="{{ old('apellido_paterno', $boleto->apellido_paterno) }}">

                                    @error('apellido_paterno')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="body">Apellido Materno</label>
                                    <input type="text"
                                        class="form-control @error('apellido_materno') is-invalid @enderror"
                                        id="apellido_materno" name="apellido_materno"
                                        value="{{ old('apellido_materno', $boleto->apellido_materno) }}">
                                    @error('apellido_materno')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="edad">Edad</label>
                                    <input type="number" class="form-control @error('edad') is-invalid @enderror"
                                        id="edad" name="edad" value="{{ old('edad', $boleto->edad) }}">
                                    @error('edad')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sexo">Sexo</label>
                                    <select class="form-control @error('sexo') is-invalid @enderror" name="sexo"
                                        id="sexo">
                                        <option value="">- Seleccione un género -</option>
                                        <option value="Femenino"
                                            {{ old('sexo', $boleto->sexo) == 'Femenino' ? 'selected' : '' }}>
                                            Femenino</option>
                                        <option value="Masculino"
                                            {{ old('sexo', $boleto->sexo) == 'Masculino' ? 'selected' : '' }}>
                                            Masculino
                                        </option>
                                    </select>
                                    @error('sexo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <input type="text" class="form-control @error('estado') is-invalid @enderror"
                                        id="estado" name="estado" value="{{ old('estado', $boleto->estado) }}">
                                    @error('estado')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="ciudad">Ciudad</label>
                                    <input type="text" class="form-control @error('ciudad') is-invalid @enderror"
                                        id="ciudad" name="ciudad" value="{{ old('ciudad', $boleto->ciudad) }}">
                                    @error('ciudad')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="body">Telefono</label>
                                    <input type="text" class="form-control @error('telefono') is-invalid @enderror"
                                        id="telefono" name="telefono"
                                        value="{{ old('telefono', $boleto->telefono) }}">
                                    @error('telefono')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="correo">Correo Electronico</label>
                                    <input type="text" class="form-control @error('correo') is-invalid @enderror"
                                        id="correo" name="correo" value="{{ old('correo', $boleto->correo) }}">
                                    @error('correo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="club">Club Deportivo</label>
                                    <input type="text" class="form-control @error('club') is-invalid @enderror"
                                        id="club" name="club" value="{{ old('club', $boleto->club) }}">
                                    @error('club')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="talla">Talla</label>
                                    <select class="form-control @error('talla') is-invalid @enderror" name="talla"
                                        id="talla">
                                        <option value="">- Seleccione una talla -</option>
                                        <option value="Niño: Chica"
                                            {{ old('talla', $boleto->talla) == 'Niño: Chica' ? 'selected' : '' }}>Niño:
                                            Chica
                                        </option>
                                        <option value="Niño: Mediana"
                                            {{ old('talla', $boleto->talla) == 'Niño: Mediana' ? 'selected' : '' }}>
                                            Niño:
                                            Mediana</option>
                                        <option value="Niño: Grande"
                                            {{ old('talla', $boleto->talla) == 'Niño: Grande' ? 'selected' : '' }}>
                                            Niño:
                                            Grande</option>

                                        <option value="Adulto: Extra-chica"
                                            {{ old('talla', $boleto->talla) == 'Adulto: Extra-chica' ? 'selected' : '' }}>
                                            Adulto: Extra
                                            Chica</option>
                                        <option value="Adulto: Chica"
                                            {{ old('talla', $boleto->talla) == 'Adulto: Chica' ? 'selected' : '' }}>
                                            Adulto:
                                            Chica </option>
                                        <option value="Adulto: Mediana"
                                            {{ old('talla', $boleto->talla) == 'Adulto: Mediana' ? 'selected' : '' }}>
                                            Adulto: Mediana</option>
                                        <option value="Adulto: Grande"
                                            {{ old('talla', $boleto->talla) == 'Adulto: Grande' ? 'selected' : '' }}>
                                            Adulto: Grande</option>
                                        <option value="Adulto: Extra-grande"
                                            {{ old('talla', $boleto->talla) == 'Adulto: Extra-grande' ? 'selected' : '' }}>
                                            Adulto:
                                            Extra Grande
                                        </option>
                                        <option value="Adulto: XXL"
                                            {{ old('talla', $boleto->talla) == 'Adulto: XXL' ? 'selected' : '' }}>
                                            Adulto: XXL
                                        </option>
                                    </select>
                                    @error('talla')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="prueba">Prueba</label>
                                    <select class="form-control @error('prueba') is-invalid @enderror" name="prueba"
                                        id="prueba">
                                        <option value="">- Seleccione una prueba -</option>
                                        <option value="Junior A: 600m"
                                            {{ old('prueba', $boleto->prueba) == 'Junior A: 600m' ? 'selected' : '' }}>
                                            Junior A: 600 m
                                            (6-11 años)</option>
                                        <option value="Junior B: 1km"
                                            {{ old('prueba', $boleto->prueba) == 'Junior B: 1km' ? 'selected' : '' }}>
                                            Junior B: 1 Km
                                            (12-13 años)</option>
                                        <option value="Junior C: 2km"
                                            {{ old('prueba', $boleto->prueba) == 'Junior C: 2km' ? 'selected' : '' }}>
                                            Junior C: 2 Km
                                            (14-15 años)</option>
                                        <option value="Junior D: 2km"
                                            {{ old('prueba', $boleto->prueba) == 'Junior D: 2km' ? 'selected' : '' }}>
                                            Junior D: 2 Km
                                            (16-17 años)</option>
                                        <option value="Especial"
                                            {{ old('prueba', $boleto->prueba) == 'Especial' ? 'selected' : '' }}>
                                            Especial (Personas Ciegas)</option>
                                        <option value="Caminata: 2km"
                                            {{ old('prueba', $boleto->prueba) == 'Caminata: 2km' ? 'selected' : '' }}>
                                            Caminata 2 Km
                                            (16-17 años)</option>
                                        <option value="5 km"
                                            {{ old('prueba', $boleto->prueba) == '5 km' ? 'selected' : '' }}>5
                                            Kilómetros</option>
                                        <option value="10 km"
                                            {{ old('prueba', $boleto->prueba) == '10 km' ? 'selected' : '' }}>10
                                            Kilómetros</option>
                                    </select>
                                    @error('prueba')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br>
                                <button type="submit" class="btn mt-3 btn-primary">Actualizar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
