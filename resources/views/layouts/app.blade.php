<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('imagenes/boletoPDF/seminario.png') }}" type="image/x-icon" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/0afe05777e.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('build/assets/css/style.css') }}">

    {{-- Enlaces Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css" rel="stylesheet">

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{-- Data Table --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        {{-- MENU NAVEGACION --}}
        @livewire('navigation-menu')

        <!-- CONTENIDO PRINCIPAL -->
        <main>
            {{-- @yield('contenido-principal') --}}
            @if (session('alert'))
                <div id="alert-message" class="alert alert-warning mt-3" style="text-align: center; font-size: 24px;">
                    {{ session('alert') }}
                </div>
            @endif
            {{ $slot }}
        </main>
    </div>

    {{-- Footer --}}
    <footer class="container-fluid fondo_gris3 col-12 fs-16  pt-40">
        @include('footer')
    </footer>

    @stack('modals')

    @livewireScripts

    <!-- Modal mostrar PDF -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">PDF</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="pdfEmbed" src="" style="width:100%; height:74vh;" frameborder="0"></iframe>
                </div>
                {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
            </div>
        </div>
    </div>

    <script>
        function openPDFModal(pdfUrl) {
            //Establecemos la ruta del PDF en el elemento embed dentro del modal
            document.getElementById('pdfEmbed').src = pdfUrl;
            var myModal = new bootstrap.Modal(document.getElementById('pdfModal'));
            myModal.show();
        }
    </script>
    {{-- END Modal mostrar PDF --}}

    <script>
        // Espera a que el documento esté completamente cargado
        document.addEventListener('DOMContentLoaded', function() {
            // Selecciona el elemento del mensaje
            var alertMessage = document.getElementById('alert-message');
    
            // Si el elemento está presente
            if (alertMessage) {
                // Después de 5000 milisegundos (5 segundos), oculta el mensaje
                setTimeout(function() {
                    alertMessage.style.display = 'none';
                }, 5000);
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
