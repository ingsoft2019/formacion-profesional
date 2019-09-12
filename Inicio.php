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
    <link href="assets/css/inicio.css" rel="stylesheet">
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
        <main class="mn-inner">




            <div class="parallax-container center valign-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col s12 white-text">
                            <h3 class="header center-align blue-text">
                                Bienvenid<?php  if($_SESSION["genero"]==1){
                                            echo 'a';
                                        }else{
                                            echo 'o';
                                        }  ?>
                                <?php  echo $_SESSION["nombre"];?>
                            </h3>
                            <p style="font-weight:300;">Proceso de Orientacion Profesional VOAE</p>


                            <?php 
                                if($_SESSION["idTipoUsuario"]==1){
                            ?>
                            <a class="waves-effect waves-light btn-large amber accent-3 black-text" href="procesos.php">
                                Procesos
                            </a>
                            <?php
                                }
                            ?>

                            <?php 
                                if($_SESSION["idTipoUsuario"]==4){
                            ?>
                            <a class="waves-effect waves-light btn-large amber accent-3 black-text"
                                href="inscripciones.php">
                                Inscribirse
                            </a>
                            <?php
                                }
                            ?>

                            <?php 
                                if($_SESSION["idTipoUsuario"]==2 || $_SESSION["idTipoUsuario"]==3){
                            ?>
                            <a class="waves-effect waves-light btn-large amber accent-3 black-text"
                                href="calendario.php">
                                Calendario
                            </a>
                            <?php
                                }
                            ?>

                        </div>
                    </div>
                </div>

                <div class="parallax">
                    <img src="assets/images/parallax_2.jpg">
                </div>

            </div>




            <div class="section white">
                <div class="row container">
                    <p class="grey-text text-darken-3 lighten-3 flow-text" style="text-align: justify;">
                        El Área de Orientación y Asesoría Académica (AOAA) de la VOAE tiene como objetivo brindar
                        atención a los estudiantes universitarios de forma integral en su dimensión psico-pedagógica y
                        social, que involucre aspectos interpersonales-afectivos, mediación de conflictos, orientación,
                        asesoría, rendimiento académico, inducción vocacional y laboral.<br><br>

                        Para cumplir parte de este objetivo realizamos el PROCESO DE ORIENTACIÓN PROFESIONAL, el que
                        está dirigido a estudiantes que ya están matriculados en la UNAH, para determinar en qué
                        carreras están aptos.
                    </p>

                </div>
            </div>


            <?php 
                if($_SESSION["idTipoUsuario"]==4){
            ?>

            <div class="parallax-container  center valign-wrapper" style="height:auto;">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <h3 class="scale-transition" style="font-weight:300;">
                                <br>
                                <mark>
                                    ¿Qué Procedimiento Debo Seguir?
                                </mark>
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l6">
                            <div class="card">
                                <div class="card-content">
                                    <div class="row center-align" style="padding:50px;">
                                        <img src="assets/images/number_1.png" class="responsive-img" alt="">
                                    </div>
                                    <div class="row center-align">
                                        <h5>Evaluación Grupal</h5>
                                    </div>
                                    <div class="row flow-text">
                                        <i class="material-icons blue-text text-darken-3 col s2 m1 l1">check</i>
                                        <p class="col s10 m11 l11 left-align">
                                            Debes inscribirte en un proceso de orientación activo.
                                        </p>

                                        <i class="material-icons blue-text text-darken-3 col s2 m1 l1">check</i>
                                        <p class="col s10 m11 l11 left-align">
                                            Asiste a la evaluación grupal presencial en el horario que seleccionaste.
                                        </p>
                                    </div>
                                    <div class="row flow-text">
                                        <a class="waves-effect waves-light btn-large amber accent-3 black-text"
                                            href="inscripciones.php">
                                            Inscribirse
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col s12 m12 l6">
                            <div class="card">
                                <div class="card-content">
                                    <div class="row center-align" style="padding:50px;">
                                        <img src="assets/images/number_2.png" class="responsive-img" alt="">
                                    </div>
                                    <div class="row center-align">
                                        <h5>Test en Línea</h5>
                                    </div>
                                    <div class="row flow-text">
                                        <i class="material-icons blue-text text-darken-3 col s2 m1 l1">check</i>
                                        <p class="col s10 m11 l11 left-align">
                                            Debes inscribirte en un proceso de orientación activo.
                                        </p>

                                        <i class="material-icons blue-text text-darken-3 col s2 m1 l1">check</i>
                                        <p class="col s10 m11 l11 left-align">
                                            Asiste a la evaluación grupal presencial en el horario que seleccionaste.
                                        </p>
                                    </div>
                                    <div class="row flow-text">
                                        <a class="waves-effect waves-light btn-large amber accent-3 black-text"
                                            href="examenes_en_linea.php">
                                            Tests
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col s12 m12 l6">
                            <div class="card">
                                <div class="card-content">
                                    <div class="row center-align" style="padding:50px;">
                                        <img src="assets/images/number_3.png" class="responsive-img" alt="">
                                    </div>
                                    <div class="row center-align">
                                        <h5>Entrevista Pedagógica</h5>
                                    </div>
                                    <div class="row flow-text">
                                        <i class="material-icons blue-text text-darken-3 col s2 m1 l1">check</i>
                                        <p class="col s10 m11 l11 left-align">
                                            Debes inscribirte en un proceso de orientación activo.
                                        </p>

                                        <i class="material-icons blue-text text-darken-3 col s2 m1 l1">check</i>
                                        <p class="col s10 m11 l11 left-align">
                                            Asiste a la evaluación grupal presencial en el horario que seleccionaste.
                                        </p>
                                    </div>
                                    <div class="row flow-text">
                                        <a class="waves-effect waves-light btn-large amber accent-3 black-text"
                                            href="agenda.php">
                                            Agendar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col s12 m12 l6">
                            <div class="card">
                                <div class="card-content">
                                    <div class="row center-align" style="padding:50px;">
                                        <img src="assets/images/number_4.png" class="responsive-img" alt="">
                                    </div>
                                    <div class="row center-align">
                                        <h5>Devolución de Resultados</h5>
                                    </div>
                                    <div class="row flow-text">
                                        <i class="material-icons blue-text text-darken-3 col s2 m1 l1">check</i>
                                        <p class="col s10 m11 l11 left-align">
                                            Debes inscribirte en un proceso de orientación activo.
                                        </p>

                                        <i class="material-icons blue-text text-darken-3 col s2 m1 l1">check</i>
                                        <p class="col s10 m11 l11 left-align">
                                            Asiste a la evaluación grupal presencial en el horario que seleccionaste.
                                        </p>
                                    </div>
                                    <div class="row flow-text">
                                        <a class="waves-effect waves-light btn-large amber accent-3 black-text"
                                            href="agenda.php">
                                            Agendar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="parallax"><img src="assets/images/parallax_1.jpg"></div>
                </div>
            <?php
                }
            ?>


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
    <script src="assets/js/pages/form-input-mask.js"></script>
    <script src="assets/js/pages/ui-parallax.js"></script>

</body>

</html>