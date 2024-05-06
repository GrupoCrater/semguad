<x-app-layout>
    <link rel="stylesheet" href="build/assets/css/estilosDashboard.css">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row mt-5">
                        <div class="col-lg-3">
                            <a class="individual container1" href="{{route('administradores.index')}}">
                                <div class="iconContainer icon1">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                </div>
                                Administradores
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a class="individual container2" href="{{route('boletos.index')}}">
                                <div class="iconContainer icon2">
                                    <i class="fa-solid fa-person-running"></i>
                                </div>
                                Boletos
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a class="individual container3" href="#">
                                <div class="iconContainer icon3">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                Opcion 3
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a class="individual container4">
                                <div class="iconContainer icon4">
                                    <i class="fa-solid fa-people-roof"></i>
                                </div>
                                Opcion 4
                            </a>
                        </div>
                    </div>
                    <div class="row my-5">
                        <h2 class="text-center">Ultimos boletos registrados</h2>
                        <table id="tabla-boletos" class="table table-striped table-hover mt-3">
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
