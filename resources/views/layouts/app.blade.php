<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('imagenes/boletoPDF/seminario.png') }}" type="image/x-icon"/>
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
    <link rel="stylesheet" href="{{asset('build/assets/css/style.css')}}">

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
            {{ $slot }}
        </main>
    </div>

    {{-- Footer --}}
    <footer class="container-fluid fondo_gris3 col-12 fs-16  pt-40">
        <div class="container">
            <div class="row  pb-0">
                <div class="col-md-4 foot-sp centrar"> <!-- <h3 style=" color: #fff !important;" class="ti-bn2">CREATER una división de:</h3>-->
                    <!-- <a  target="_blank" title="logo"><img style="max-width: 190px; margin-top: -5px;" src="img/logo/logo-bco.png" alt="logo_Crater" ></a> -->
                    <p class="color_blanco mb-0 fs-14 pt-20">
                        Calle Santo Domingo 1120 <br>
    
                        Colonina Chapalita <br> Guadalajara, Jal. 44500 MX
                    </p>
    
    
    
                </div>
                <div class="col-md-4 footer-centro text-center">
                    <div id="social-test">
                        <ul class="social">
                            <li onclick="window.open('https://www.facebook.com/SeminarioGuadalajara/');"><i class="fa fa-facebook" aria-hidden="true"></i></li>
                            <li onclick="window.open('https://www.instagram.com/seminario.guadalajara/');"><i class="fa fa-instagram" aria-hidden="true"></i></li>
                            <li onclick="window.open('https://www.tiktok.com/@seminario.guadalajara?_t=8k3L6CFvX7e&_r=1');">
                                <i class="fa-brands fa-tiktok"></i>
                            </li>
                            <li onclick="window.open('https://www.youtube.com/user/seminariodeguadalaja');"><i class="fa fa-youtube-play" aria-hidden="true"></i></li>
                            <li onclick="window.open('https://x.com/seminariogdl?s=21');">
                                <i class="fa-brands fa-x-twitter"></i>
                            </li>
                        </ul>
                    </div>
                </div>
    
                <div class="col-md-4 col-sm-12 aladerecha2 centrar pt-30">
                    <div class="center">
                        <p class="color_blanco fs-14 pt-20">
                            <span onclick="window.open('tel:33  3121 5654');" class="pointer">
                                <i class="fas fa-phone fa-rotate-90"></i> 33 3121 5654 <br>
                            </span>
    
                            <br>
                            <span onclick="window.open('mailto:semguad@semguad.org.mx');" class="pointer">
                                <i class="far fa-envelope"></i> semguad@semguad.org.mx
                            </span>
                        </p>
                    </div>
    
                </div>
    
                <div class="mx-auto text-center">
                    <?php $anioActual = date('Y'); ?>
                    <p class="color_blanco2 pt-10 text-center mb-0 fs-12"> Copyright® <?php echo $anioActual;?> Derechos Reservados</p>
                    <a class="bn-a color_blanco2 fs-12" href="AvisoPrivacidad.pdf" target="_blank" title="Politicas">Aviso de Privacidad</a>
    
                </div>
            </div>
        </div>
    
    <div class="row fondo_gris3" style="margin-right: 0px; margin-left: 0px;">
    
        <div class="centrar  col-12 col-md-6"> </div>
        <div class="color_negro col-12 col-md-6" style="text-align: right; "><a href="http://grupocrater.com/" title="Grupo Crater" target="_blank" style=" font-size: .60em;" class="color_blanco2 alink d-flex justify-content-end" title="Inicio"> Desarrollo &ensp; <img src="{{asset('imagenes/crater.ico')}}" alt="logo" style="width: 20px;"></a>
        </div>
    </div>

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
            function openPDFModal(pdfUrl){
                //Establecemos la ruta del PDF en el elemento embed dentro del modal
                document.getElementById('pdfEmbed').src = pdfUrl;
                var myModal = new bootstrap.Modal(document.getElementById('pdfModal'));
                myModal.show();
            }
        </script>
        {{-- END Modal mostrar PDF --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
