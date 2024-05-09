<x-app-layout>
    <link rel="stylesheet" href="build/assets/css/estilosDashboard.css">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row mt-5">
                        @if (auth()->user()->rol == 'master')
                            <div class="col-lg-3">
                                <div class="individual container1">
                                    <div class="iconContainer icon1">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                    Usuarios 
                                    <div class=" ms-3 fs-5">{{$numUsuarios}}</div>                                    
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-3">
                            <div class="individual container2">
                                <div class="iconContainer icon2">
                                    <i class="fa-solid fa-person-running fs-2"></i>
                                </div>
                                Boletos
                                <div class="ms-3 fs-5">{{$numBoletos}}</div>

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="individual container3">
                                <div class="iconContainer me-3 icon3">
                                    <i class="fa-solid fa-dollar-sign fs-3"></i>
                                </div>
                                Total
                                <div class="ms-3 fs-5">$ {{$totalRecaudado}}</div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="individual container4">
                                <div class="iconContainer me-2 icon4">                                
                                    <i class="fa-solid fa-calendar-day fs-3"></i>
                                </div>
                                Carrera
                                <div class="ms-2 fs-6">{{$fechaLimite->fin_registro}}</div>
                            </div>
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
                                    <tr class="">
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
