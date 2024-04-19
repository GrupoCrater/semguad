@extends('layouts.principal')

@section('title', 'Todos los registros')

@section('contenido-principal')
    <div class="container mt-5">
        <div class="row">
            @foreach ($boletos as $boleto)
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $boleto->folio }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $boleto->nombre }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $boleto->apellido_paterno }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $boleto->apellido_materno }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $boleto->edad }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $boleto->sexo }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $boleto->estado }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $boleto->ciudad }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $boleto->telefono }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $boleto->correo }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $boleto->club }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $boleto->talla }}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $boleto->prueba }}</p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm">
                                    <a href="{{ route('boletos.edit', $boleto->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                </div>
                                <div class="col-sm">
                                    <form id="eliminar" action="{{ route('boletos.destroy', $boleto->id) }}"
                                        method="post">
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

    <script>
        // $('#eliminar').on('submit', function(e){
        //     e.preventDefault();
        // })

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
                // if (result.isConfirmed) {
                //     Swal.fire({
                //         title: "Eliminado",
                //         text: "El registro ha sido eliminado con exito",
                //         icon: "success"
                //     });
                // }
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
    @elseif (Session::has('storeWhitPdf'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Registro creado con exito",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @elseif (Session::has('storeWhitoutPdf'))
        <script>
            Swal.fire({
                title: "Registro creado con exito",
                text: "Aunque ocurrio un problema generando el pdf del boleto",
                icon: "info"
            });
        </script>
    @elseif (Session::has('update'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Registro actualizado con exito",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
@endsection
