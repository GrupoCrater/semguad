@extends('layouts.principal')

@section('title', 'Crear registro')

@section('contenido-principal')
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Crear Nuevo Registro</h3>
                <form action="{{ route('boletos.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="folio">Folio del boleto</label>
                        <input type="text" class="form-control @error('folio') is-invalid @enderror" id="folio" name="folio" value="{{$nuevoFolio}}" readonly>          
                        
                        @error('folio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{old('nombre')}}">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellido_paterno">Apellido Paterno</label>
                        <input type="text" class="form-control @error('apellido_paterno') is-invalid @enderror" id="apellido_paterno" name="apellido_paterno" value="{{old('apellido_paterno')}}">
                        @error('apellido_paterno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellido_materno">Apellido Materno</label>
                        <input type="text" class="form-control @error('apellido_materno') is-invalid @enderror" id="apellido_materno" name="apellido_materno" value="{{old('apellido_materno')}}">
                        @error('apellido_materno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad</label>
                        <input type="number" class="form-control @error('edad') is-invalid @enderror" id="edad" name="edad" value="{{old('edad')}}">
                        @error('edad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <select class="form-control @error('sexo') is-invalid @enderror" name="sexo" id="sexo">
                            <option value="">- Seleccione un género -</option>
                            <option value="Femenino" {{old('sexo') == 'Femenino' ? 'selected' : ''}}>Femenino</option>
                            <option value="Masculino" {{old('sexo') == 'Masculino' ? 'selected' : ''}}>Masculino</option>
                        </select>
                        @error('sexo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado" value="{{old('estado')}}">
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control @error('ciudad') is-invalid @enderror" id="ciudad" name="ciudad" value="{{old('ciudad')}}">
                        @error('ciudad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{old('telefono')}}">
                        @error('telefono')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo Electronico</label>
                        <input type="text" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" value="{{old('correo')}}">
                        @error('correo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="club">Club Deportivo</label>
                        <input type="text" class="form-control @error('club') is-invalid @enderror" id="club" name="club" value="{{old('club')}}">
                        @error('club')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="talla">Talla</label>
                        <select class="form-control @error('talla') is-invalid @enderror" name="talla" id="talla">
                            <option value="">- Seleccione una talla -</option>
                            <option value="Niño: Chica" {{old('talla') == 'Niño: Chica' ? 'selected' : ''}}>Niño: Chica</option>
                            <option value="Niño: Mediana" {{old('talla') == 'Niño: Mediana' ? 'selected' : ''}}>Niño: Mediana</option>
                            <option value="Niño: Grande" {{old('talla') == 'Niño: Grande' ? 'selected' : ''}}>Niño: Grande</option>

                            <option value="Adulto: Extra-chica" {{old('talla') == 'Adulto: Extra-chica' ? 'selected' : ''}}>Adulto: Extra Chica</option>
                            <option value="Adulto: Chica" {{old('talla') == 'Adulto: Chica' ? 'selected' : ''}}>Adulto: Chica </option>
                            <option value="Adulto: Mediana" {{old('talla') == 'Adulto: Mediana' ? 'selected' : ''}}>Adulto: Mediana</option>
                            <option value="Adulto: Grande" {{old('talla') == 'Adulto: Grande' ? 'selected' : ''}}>Adulto: Grande</option>
                            <option value="Adulto: Extra-grande" {{old('talla') == 'Adulto: Extra-grande' ? 'selected' : ''}}>Adulto: Extra Grande</option>
                            <option value="Adulto: XXL" {{old('talla') == 'Adulto: XXL' ? 'selected' : ''}}>Adulto: XXL</option>
                        </select>
                        @error('talla')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="prueba">Prueba</label>
                        <select class="form-control @error('prueba') is-invalid @enderror" name="prueba" id="prueba">
                            <option value="">- Seleccione una prueba -</option>
                            <option value="Junior A: 600m" {{old('prueba') == 'Junior A: 600m' ? 'selected' : ''}}>Junior A: 600 m (6-11 años)</option>
                            <option value="Junior B: 1km" {{old('prueba') == 'Junior B: 1km' ? 'selected' : ''}}>Junior B: 1 Km (12-13 años)</option>
                            <option value="Junior C: 2km" {{old('prueba') == 'Junior C: 2km' ? 'selected' : ''}}>Junior C: 2 Km (14-15 años)</option>
                            <option value="Junior D: 2km" {{old('prueba') == 'Junior D: 2km' ? 'selected' : ''}}>Junior D: 2 Km (16-17 años)</option>
                            <option value="Especial" {{old('prueba') == 'Especial' ? 'selected' : ''}}>Especial (Personas Ciegas)</option>
                            <option value="Caminata: 2km" {{old('prueba') == 'Caminata: 2km' ? 'selected' : ''}}>Caminata 2 Km (16-17 años)</option>
                            <option value="5 km" {{old('prueba') == '5 km' ? 'selected' : ''}}>5 Kilómetros</option>
                            <option value="10 km" {{old('prueba') == '10 km' ? 'selected' : ''}}>10 Kilómetros</option>
                        </select>
                        @error('prueba')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Agregar Registro</button>
                </form>
            </div>
        </div>
    </div>    
@endsection
