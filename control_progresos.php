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
    <link href="assets/css/gestionar_Usuarios.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets\images\icon.png" />
    <link href="assets/css/control_progreso.css" rel="stylesheet" type="text/css" />

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
                            <div class="row center-align">
                                <h5>Juana Maria <br>
                                    Amador Pérez</h5>
                                <h6>20151023698</h6>
                                <h6>Ingeniería en Sistemas</h6>
                            </div>
                            <div class="row" style="margin-bottom:5px;">
                                <div class="col s12">
                                    <div class="row valign-wrapper" style="margin-bottom:5px;">
                                        <h6 class="col s10">
                                            Porcentaje Completado <br>
                                            <strong>Proceso No. 7</strong>
                                        </h6>
                                        <h6 class="col s2 right-align">
                                            <span id="porcentaje_user12">50</span>%
                                        </h6>
                                    </div>
                                    <div class="progress ">
                                        <div class="determinate" style="width: 50%" id="bar_user12"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row center-align activator">
                                <i class="material-icons center" style="cursor:pointer;">more_horiz</i>
                            </div>
                        </div>
                        <div class="card-reveal">
                            <div class="row">
                                <span class="card-title grey-text text-darken-4">
                                    <i class="material-icons right">close</i>
                                </span>                                
                                <div class="col s12">
                                <br>
                                    <form class="frm_etapas" action="#">
                                        <p class="p-v-xs">
                                            <input type="checkbox" class="filled-in" id="e1_12" checked="checked"
                                                data-process="7" data-user="12" />
                                            <label for="e1_12">
                                                Evaluación Grupal
                                            </label>
                                        </p>
                                        <p class="p-v-xs">
                                            <input type="checkbox" class="filled-in" id="e2_12" checked="checked"
                                                data-process="7" data-user="12" />
                                            <label for="e2_12">
                                                Evaluación en Línea
                                            </label>
                                        </p>
                                        <p class="p-v-xs">
                                            <input type="checkbox" class="filled-in" id="e3_12" data-process="7"
                                                data-user="12" />
                                            <label for="e3_12">
                                                Entrevista Pedagógica
                                            </label>
                                        </p>
                                        <p class="p-v-xs">
                                            <input type="checkbox" class="filled-in" id="e4_12" data-process="7"
                                                data-user="12" />
                                            <label for="e4_12">
                                                Devolución de Resultados
                                            </label>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>







    </div>


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
    <script src="assets\plugins\prettify\prettify.js"></script>
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="assets/js/ContenidoFijo.js"></script>
    <script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    <script src="assets/js/pages/form-input-mask.js"></script>
    <script src="assets/js/controlador_control_progreso.js"></script>

</body>

</html>