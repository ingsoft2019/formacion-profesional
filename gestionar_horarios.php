<!DOCTYPE html>
<html lang="es">

<head>

    <!-- Title -->
    <title>VOAE | Orientación Profesional</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <!-- Theme Styles -->
    <link href="assets/css/alpha.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
    <link href="assets\plugins\air_datepicker\css\datepicker.css" rel="stylesheet">
    <link href="assets\plugins\timepicker\css\timepicker.css" rel="stylesheet">
    <link href="assets\plugins\flatpickr\css\flatpickr.css" rel="stylesheet">

    <link href="assets/css/gestionar_horarios.css" rel="stylesheet" type="text/css">

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

            <div class="row">
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <form class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">date_range</i>
                                            <input id="txt_fecha" type="text" class="div_datepicker"
                                                placeholder="Seleccione el día(s)">
                                            <label for="txt_fecha">Fecha(s)</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">access_time</i>
                                            <input id="txt_hinicial" type="text" class="div_timepicker"
                                                placeholder="Hora inicial">
                                            <label for="txt_hinicial">Desde</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">access_time</i>
                                            <input id="txt_hfinal" type="text" class="div_timepicker"
                                                placeholder="Hora final">
                                            <label for="txt_hfinal">Hasta</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </main>
        <!--FIN APARTADO-->

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large red pulse" id="btn_nuevoFecha">
                <i class="large material-icons">add_to_photos</i>
            </a>
        </div>


        <div id="div-piePagina"></div>


    </div>
    <div class="left-sidebar-hover"></div>

    <!-- Javascripts -->
    <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="assets/plugins/materialize/js/materialize.js"></script>
    <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
    <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="assets/js/pages/form_elements.js"></script>
    <script src="assets\plugins\prettify\prettify.js"></script>
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="assets/js/ContenidoFijo.js"></script>
    <script src="assets\plugins\air_datepicker\js\datepicker.js"></script>
    <script src="assets\plugins\air_datepicker\js\i18n\datepicker.es.js"></script>
    <script src="assets\plugins\timepicker\js\timepicker.min.js"></script>
    <script src="assets\plugins\flatpickr\js\flatpickr.js"></script>



    <script src="assets/js/gestionar_horarios.js"></script>

</body>

</html>