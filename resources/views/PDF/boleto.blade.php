<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleto</title>
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos CSS adicionales si es necesario */
        body {
            font-family: Arial, sans-serif;
            font-size: 15px;
            padding-left: 40px;
            padding-right: 40px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="pag-1">
                    <div style="display:flex; justify-content:center;">
                        {{-- <img src="https://carrera.semguad.org.mx/includes/assets/img/seminario.png" alt="Logo Seminario Mayor"> --}}
                        {{-- <img src="{{asset('imagenes/boletoPDF/seminario.png')}}"> --}}
                        {{-- <img src="{{public_path('app/public/seminario.png')}}">--}}
                        {{-- <img src="{{storage_path('seminario.png')}}">
                        <img src="{{storage_path('app/public/seminario.png')}}">
                        <img src="{{public_path('app/public/seminario.png')}}"> --}}
                        {{-- <img src="{{ url('seminario.png') }}">
                        <img src="{{asset('seminario.png')}}">
                        <img src="{{public_path('seminario.png')}}"> --}}
                        {{-- <img src="{{ url('./imagenes/boletoPDF/seminario.png') }}"> --}}
                        {{-- <img src="imagenes/boletoPDF/seminario.png"> --}}
                        {{-- <img src="{{public_path('seminario.png')}}"> --}}
                        {{-- <img src="../public/seminario.png"> --}}
                        <img src="data:image/png;base64,{{ $logoBase64 }}">



                        <h1 style="text-align:center; font-size:16px; margin-bottom:0; font-weight:bold;">BOLETO PARA LA
                            VI CARRERA DEL SEMINARIO</h1>
                        <h2 style="text-align:center; font-size:10px; margin-top:0;">Seminario Diocesano de Guadalajara
                        </h2>
                        <h3 style="text-align:center; font-size:14px; font-weight:bold; margin-top:10;">Estimado(a)
                            {{ $boleto['nombre'] }} {{ $boleto['apellido_paterno'] }}
                            {{ $boleto['apellido_materno'] }}</h3>
                    </div>
                    <div>
                        <p>Nos alegra mucho que seas parte de la VI Carrera del Seminario de Guadalajara.</p>
                        <p>Est es la informción que necesitarás para recoger tu kit de corredor:</p>

                        <ul>
                            <li style="margin-bottom:3px;">Prueba inscrita: {{ $boleto['prueba'] }}</li>
                            <li style="margin-bottom:3px;">Categoría asignada: {{ $boleto['prueba'] }}</li>
                            <li style="margin-bottom:3px;">Talla de camisa: {{ $boleto['talla'] }}</li>
                            <li style="margin-bottom:3px;">Precio del boleto: {{ $precio }}</li>
                        </ul>

                        <p style="line-height:1.3; text-align:justify;">Para poder recoger tu kit tienes que ir al
                            Seminario Diocesano Menor de Guadalajara el día
                            Sabado 08 de unio de 9:00 a:m a 8:00 p:m, donde se te asignará el número de corredor y, con
                            el que tambien participarás en una rifa de un viaje para 2 personas a Santo Snatiago. Para
                            más información consulta las bases en <a
                                href="http://carrera.semguad.org.mx">http://carrera.semguad.org.mx</a></p>
                        <p style="margin-top:3px; text-align:justify;">Puedes pagar tu boleto a través de una
                            transferencia bancaria al siguiente número de cuenta.
                        </p>

                        <p style="font-weight:bold; margin-bottom:0;">N° de cuenta BBVA: 0480265934</p>
                        <p style="font-weight:bold; margin-top:0;">N° de cuenta CLABE: 012320004802659349</p>

                        <p style="text-align:justify;">Hecha la transferencia, comparte tu ticket de transferencia al
                            WhatsApp: 33 2955 0844 una vez
                            que hayas pagado</p>

                        <p style="font-weight:bold; text-align:justify;">IMPORTANTE: Tienes que hacer el pago en un
                            plazo máximo de 8 dias hecha la inscripción, ya
                            que el registro se elimina de la base de datos si no se realiza el pago a tiempo.</p>

                        <p style="font-weight:bold; text-align:justify;">Te recordamos, además, que el día de la carrera
                            es el Domingo 09 de Junio de 2024</p>
                    </div>
                    <div>
                        <p style="font-weight:bold; text-align:center; font-size:17px;">VI CARRERA DEL SEMINARIO DE
                            GUADALAJARA</p>
                        <p style="font-weight:bold; text-align:center; font-size:13px; margin-bottom:0;">Corre y anuncia
                            el Evangelio</p>
                        <p style="font-weight:bold; text-align:center; font-size:11px; margin-top:0px;">Fecha | Hora</p>
                        <p style="font-weight:bold; text-align:center; font-size:11px; ">VI Carrera del Seminario ©
                            Seminario Diocesano de Guadalajara./p>
                    </div>
                </div>
                <div class="pag-2">
                    <div style="display:flex; justify-content:center; align-items:center">
                        {{-- <img src="https://carrera.semguad.org.mx/includes/php/control/reportes/carta.jpg" alt="carta"> --}}
                        <img src="{{ asset('imagenes/boletoPDF/carta.jpg') }}">

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    // Redirigir a la página de inicio después de 2 segundos
    setTimeout(function() {
        window.location.href = "{{ route('boletos.index') }}";
    }, 2000);
</script>
