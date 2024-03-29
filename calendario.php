<?php 
    session_start();
    if (!isset($_SESSION["idPersona"])){
        header("Location: log-in.php?redirigido=1");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <!-- Title -->
    <title>VOAE | Orientación Profesional</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css" />
    <link href="assets/css/materialize_Icons.css" rel="stylesheet">



    <!-- Theme Styles -->
    <link href="assets/css/alpha.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">




    <link href='assets/plugins/fullcalendar/core/main.css' rel='stylesheet' />
    <link href='assets/plugins/fullcalendar/daygrid/main.css' rel='stylesheet' />
    <link href='assets/plugins/fullcalendar/timegrid/main.css' rel='stylesheet' />
    <link href='assets/plugins/fullcalendar/list/main.css' rel='stylesheet' />

    <script src='assets/plugins/fullcalendar/core/main.js'></script>
    <script src='assets/plugins/fullcalendar/core/locales-all.js'></script>
    <script src='assets/plugins/fullcalendar/daygrid/main.js'></script>
    <script src='assets/plugins/fullcalendar/timegrid/main.js'></script>
    <script src='assets/plugins/fullcalendar/list/main.js'></script>






    <link href="assets/css/calendar.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" href="assets/images/icon.png" />


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body>

    <div id="div_loader"></div>

    <div class="mn-content">

        <div id="div-menu"></div>
        <!--EN ESTE APARTADO VA TODO EL CONTENIDO QUE SE DESEA MOSTRAR EN LA SECCION PRINCIPAL-->
        <main class="mn-inner">

            <input type="hidden" name="idPersona" id="idPersona" value="<?php echo $_SESSION["idPersona"]?>">
            <h5>Citas Programadas</h5>
            <div id="calendar"></div>






        </main>
        <!--FIN APARTADO-->



        <div id="div-piePagina"></div>


    </div>
    <div class="left-sidebar-hover"></div>

    <!-- Javascripts -->
    <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
    <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="assets/js/pages/form_elements.js"></script>
    <script src="assets/plugins/prettify/prettify.js"></script>
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="assets/js/ContenidoFijo.js"></script>
    <script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    <script src="assets/js/pages/form-input-mask.js"></script>


    <script src="assets/plugins/tooltip/popper.min.js"></script>
    <script src="assets/plugins/tooltip/tooltip.min.js"></script>


    <script src="assets/plugins/moment-with-locales.js"></script>

    <script src="assets/js/controlador_calendario.js"></script>

</body>

</html>