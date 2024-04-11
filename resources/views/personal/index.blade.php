@extends('layouts.principal')

@section('title', 'Todos los registros')

@section('contenido-principal')
    <div class="container mt-5">
        <div class="row">
            @foreach ($personal as $person)
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $person->nombre }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $person->apellido_parterno }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $person->apellido_materno }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $person->fecha_nacimiento }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $person->telefono }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $person->domicilio }}</p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm">
                                    <a href="{{ route('personal.edit', $person->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                </div>
                                <div class="col-sm">
                                    <form action="{{ route('personal.destroy', $person->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
