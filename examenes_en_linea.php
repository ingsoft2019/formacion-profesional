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
    <link href="assets/css/examenes_en_linea.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets\images\icon.png" />

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
        <!--
        <main class="mn-inner">



            <div class="card" id="Card-row">
                <div class="card-content  row">
                    <div class="row">
                        <div class="col s3 m1 red darken-1 phase_icon valign-wrapper">
                            <i class="material-icons white-text center" style="width: 100%;">event</i>
                        </div>
                        <div class="col s9 m11">
                            <h4>Proceso No. 1</h4>
                            <br>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <div class="row valign-wrapper">
                                    <div class="col s2 hide-on-small-only">
                                        <img src="assets/images/test_holland.png" alt="" class="circle responsive-img">
                                       
                                    </div>
                                    <div class="col s12 m10">
                                        <h5>Test de Holland</h5>
                                        <h6>Personalidad</h6>
                                        <a href="">https://www.google.com/intl/es/forms/about/</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col s12 m12 l6">
                                <div class="row valign-wrapper">
                                    <div class="col s2 hide-on-small-only">
                                        <img src="assets/images/test_lee.png" alt="" class="circle responsive-img">
                                        
                                    </div>
                                    <div class="col s12 m10">
                                        <h5>Test Lee-Thorpe</h5>
                                        <h6>Intereses Vocacionales</h6>
                                        <a href="">https://www.google.com/intl/es/forms/about/</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <br>
                                <h5>Clave de Acceso: clave:01</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </main>
        -->
<div id="examenes_inscritos"> </div>


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
    <script src="assets/js/mostrar_examenes.js"></script>

</body>

</html>