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
    <div class="">
        <div class="">
            <div class="">
                <div class="pag-1" style="height: 50%">
                    <div style="">                        
                        <img src="data:image/png;base64,{{ $logoBase64 }}" style="margin: 0 42%; width:100px; display:block;">

                        <h1 style="text-align:center; font-size:16px; margin-bottom:0; font-weight:bold;">BOLETO PARA LA
                            VI CARRERA DEL SEMINARIO</h1>
                        <h2 style="text-align:center; font-size:10px; margin-top:0;">Seminario Diocesano de Guadalajara
                        </h2>
                        <h3 style="text-align:center; font-size:14px; font-weight:bold; margin-top:30;">Estimado(a)
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
                    <div style="margin-top: 40px">
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
                    <div style="margin-top:50px;">
                        <img src="data:image/png;base64,{{ $cartaBase64 }}" style="width:100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>