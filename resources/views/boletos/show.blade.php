<x-app-layout>
    <style>
        p {
            font-size: 20px
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container my-5">
                    <div class="row">
                        <div class="col-10 col-md-8 col-lg-6 mx-auto">
                            <h3 class="text-center">Vista detallada</h3>
                            <div class="mt-5">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('boletos.edit', $boleto->id) }}"
                                        class="btn btn-primary btn-sm mr">Editar</a>
                                </div>
                                <p><span class="fw-bold">Folio:</span> {{ $boleto->folio }}</p>
                                <p><span class="fw-bold">Nombre:</span> {{ $boleto->nombre }}</p>
                                <p><span class="fw-bold">Apellido Paterno:</span> {{ $boleto->apellido_paterno }}</p>
                                <p><span class="fw-bold">Apellido Materno:</span> {{ $boleto->apellido_materno }}</p>
                                <p><span class="fw-bold">Edad:</span> {{ $boleto->edad }}</p>
                                <p><span class="fw-bold">Sexo:</span> {{ $boleto->sexo }}</p>
                                <p><span class="fw-bold">Telefono:</span> {{ $boleto->telefono }}</p>
                                <p><span class="fw-bold">Correo:</span> {{ $boleto->correo }}</p>
                                <p><span class="fw-bold">Ciudad:</span> {{ $boleto->ciudad }}</p>
                                <p><span class="fw-bold">Estado:</span> {{ $boleto->estado }}</p>
                                <p><span class="fw-bold">Club:</span> {{ $boleto->club }}</p>
                                <p><span class="fw-bold">Talla:</span> {{ $boleto->talla }}</p>
                                <p><span class="fw-bold">Prueba:</span> {{ $boleto->prueba }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Session::has('update'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Registro actualizado con exito",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
</x-app-layout>
