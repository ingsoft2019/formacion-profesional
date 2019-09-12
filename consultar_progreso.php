<?php 
    session_start();
    if (!isset($_SESSION["idPersona"])){
        header("Location: log-in.php?redirigido=1");
    }
    require('./assets/clases/class_conexion.php');
    $mysql = new Conexion();
    $sql = sprintf("
    SELECT * FROM tbl_control_de_procesos 
    LEFT JOIN tbl_procesos 
    ON tbl_control_de_procesos.idprocesos = tbl_procesos.idprocesos
    where tbl_control_de_procesos.idEstudiante = '%s'
    ORDER by tbl_procesos.fechafindevuelveresultado DESC
    ",$_SESSION["idPersona"]);
    $query=$mysql->ejecutarInstruccion($sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <!-- Title -->
    <title>VOAE | Orientación Profesional</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8" />

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css" />
    <link href="assets/css/materialize_Icons.css" rel="stylesheet">



    <!-- Theme Styles -->
    <link href="assets/css/alpha.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/gestionar_Usuarios.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
    <link href="assets/plugins/Circle Progress/circleProgressBar.css" rel="stylesheet">
    <link href="assets/css/consultar_progreso.css" rel="stylesheet">
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

            <div class="row">

                <?php 
                while($datos = mysqli_fetch_array($query))
                {
            ?>
                <div class="col s12 m12" style="padding: 0px;">
                    <div class="card">
                        <div class="card-content">
                            <div class="row valign-wrapper">
                                <div class="col s3 m1 amber darken-1 phase_icon valign-wrapper" style="height:4rem;">
                                    <i class="material-icons white-text center"
                                        style="width: 100%;font-size:3rem;">donut_large</i>
                                </div>
                                <div class="col s9 m11 valign-wrapper">
                                    <h4>Proceso No. <?php echo $datos['idprocesos']?></h4>
                                </div>
                            </div>
                            <div class="chip">
                                Inicio: <?php 
                                    setlocale(LC_TIME, 'es_ES.UTF-8');
                                    $string = $datos['fechainicio'];
                                    $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                    echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                ?>
                            </div>
                            <div class="chip">
                                Fin: <?php 
                                    setlocale(LC_TIME, 'es_ES.UTF-8');
                                    $string = $datos['fechafindevuelveresultado'];
                                    $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                    echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                ?>
                            </div>
                            <div class="row valign-wrapper">
                                <div class="col s12 m7 l8" style="padding: 0px;">
                                    <ul class="collapsible" data-collapsible="accordion">
                                        <li>
                                            <div class="collapsible-header">
                                                <i
                                                    class="material-icons <?php echo $datos['etapa1'] ? "green-text":"red-text"; ?>">
                                                    <?php echo $datos['etapa1'] ? "check_circle":"cancel"; ?>
                                                </i>
                                                Evaluación grupal presencial
                                            </div>
                                            <div class="collapsible-body" style="padding:15px;">
                                                <div class="chip">
                                                    Inicio: <?php 
                                                            setlocale(LC_TIME, 'es_ES.UTF-8');
                                                            $string = $datos['fechainicio'];
                                                            $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                                            echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                                        ?>
                                                </div>
                                                <div class="chip">
                                                    Fin: <?php 
                                                            setlocale(LC_TIME, 'es_ES.UTF-8');
                                                            $string = $datos['fechafinal'];
                                                            $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                                            echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                                        ?>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header">
                                                <i
                                                    class="material-icons <?php echo $datos['etapa2'] ? "green-text":"red-text"; ?>">
                                                    <?php echo $datos['etapa2'] ? "check_circle":"cancel"; ?>
                                                </i>
                                                Exámenes en línea
                                            </div>
                                            <div class="collapsible-body" style="padding:15px;">
                                                <div class="chip">
                                                    Inicio: <?php 
                                                            setlocale(LC_TIME, 'es_ES.UTF-8');
                                                            $string = $datos['fechainiciotestlinea'];
                                                            $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                                            echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                                        ?>
                                                </div>
                                                <div class="chip">
                                                    Fin: <?php 
                                                            setlocale(LC_TIME, 'es_ES.UTF-8');
                                                            $string = $datos['fechafinaltestlinea'];
                                                            $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                                            echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                                        ?>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header">
                                                <i
                                                    class="material-icons <?php echo $datos['etapa3'] ? "green-text":"red-text"; ?>">
                                                    <?php echo $datos['etapa3'] ? "check_circle":"cancel"; ?>
                                                </i>
                                                Entrevista pedagógica
                                            </div>
                                            <div class="collapsible-body" style="padding:15px;">
                                                <div class="chip">
                                                    Inicio: <?php 
                                                            setlocale(LC_TIME, 'es_ES.UTF-8');
                                                            $string = $datos['fechainicioentrevista'];
                                                            $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                                            echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                                        ?>
                                                </div>
                                                <div class="chip">
                                                    Fin: <?php 
                                                            setlocale(LC_TIME, 'es_ES.UTF-8');
                                                            $string = $datos['fechafinentrevista'];
                                                            $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                                            echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                                        ?>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header">
                                                <i
                                                    class="material-icons <?php echo $datos['etapa4'] ? "green-text":"red-text"; ?>">
                                                    <?php echo $datos['etapa4'] ? "check_circle":"cancel"; ?>
                                                </i>
                                                Devolución de resultados
                                            </div>
                                            <div class="collapsible-body" style="padding:15px;">
                                                <div class="chip">
                                                    Inicio: <?php 
                                                            setlocale(LC_TIME, 'es_ES.UTF-8');
                                                            $string = $datos['fechainiciodevuelveresultado'];
                                                            $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                                            echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                                        ?>
                                                </div>
                                                <div class="chip">
                                                    Fin: <?php 
                                                            setlocale(LC_TIME, 'es_ES.UTF-8');
                                                            $string = $datos['fechafindevuelveresultado'];
                                                            $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                                            echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                                        ?>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>   
                                </div>
                                <div class="col s12 m5 l4">
                                    <div class="c100 p<?php echo $datos['porcentaje']?> big center">
                                        <span><?php echo $datos['porcentaje']?>%</span>
                                        <div class="slice">
                                            <div class="bar"></div>
                                            <div class="fill"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>





                        </div>
                    </div>
                </div>
                <?php
                }
            ?>
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
    <script src="assets/js/controlador_consultar_resultados.js"></script>

</body>

</html>