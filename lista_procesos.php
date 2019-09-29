<?php

    require('./assets/clases/class_conexion.php');
    $mysql = new Conexion();
    $query=$mysql->ejecutarInstruccion("
    SELECT * FROM tbl_procesos WHERE 1
    ORDER BY fechainicio DESC
    ");
    


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
    <link href="assets/css/lista_procesos.css" rel="stylesheet">
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
                while($datos = mysqli_fetch_array($query)){
                ?>
                <div class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <div class="row center-align">
                                <h5>Proceso No.
                                    <?php echo $datos['idprocesos']?></h5>
                                <span
                                    class="<?php if($datos['estado']=='Activo'){ echo 'green-text';}else{echo 'red-text';} ?>">
                                    <?php echo $datos['estado']?>
                                </span>
                            </div>
                            <div class="row info_cuadro">
                                <div class="col s12 m6 l3">
                                    <div class="row valign-wrapper">
                                        <div class="col s3 amber darken-1  valign-wrapper" style="height:3rem;">
                                            <i class="material-icons white-text center"
                                                style="width: 100%;font-size:2rem;">people</i>
                                        </div>
                                        <div class="col s9 valign-wrapper">
                                            <h5>Período Inscripciones</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <ul class="collection">
                                            <li class="collection-item avatar">
                                                <i class="material-icons circle">event</i>
                                                <span class="title">Inicio</span>
                                                <p>
                                                    <?php 
                                                setlocale(LC_TIME, 'es_ES.UTF-8');
                                                $string = $datos['fechainicio'];
                                                $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                                echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                            ?>
                                                </p>
                                                <span class="title">Finalización</span>
                                                <p>
                                                    <?php 
                                                setlocale(LC_TIME, 'es_ES.UTF-8');
                                                $string = $datos['fechafinal'];
                                                $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                                echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                            ?>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col s12 m6 l3">
                                    <div class="row valign-wrapper">
                                        <div class="col s3 lime accent-4  valign-wrapper" style="height:3rem;">
                                            <i class="material-icons white-text center"
                                                style="width: 100%;font-size:2rem;">dvr</i>
                                        </div>
                                        <div class="col s9 valign-wrapper">
                                            <h5>Evaluaciones en Línea</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <ul class="collection">
                                            <li class="collection-item avatar">
                                                <i class="material-icons circle">event</i>
                                                <span class="title">Inicio</span>
                                                <p>
                                                    <?php 
                                                setlocale(LC_TIME, 'es_ES.UTF-8');
                                                $string = $datos['fechainiciotestlinea'];
                                                $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                                echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                            ?>
                                                </p>
                                                <span class="title">Finalización</span>
                                                <p>
                                                    <?php 
                                                setlocale(LC_TIME, 'es_ES.UTF-8');
                                                $string = $datos['fechafinaltestlinea'];
                                                $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                                echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                            ?>
                                                </p>
                                            </li>
                                            <li class="collection-item avatar">
                                                <i class="material-icons circle">insert_link</i>
                                                <span class="title">Tests en Línea</span>
                                                <p>
                                                    <a href="<?php echo $datos['urltestlinea1']?>" target="blank">
                                                        Test Intereses
                                                    </a>
                                                    <br>
                                                    <a href="<?php echo $datos['urltestline2']?>" target="blank">
                                                        Test Personalidad
                                                    </a>
                                                    <br>
                                                    <?php echo $datos['clavetest']?>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col s12 m6 l3">
                                    <div class="row valign-wrapper">
                                        <div class="col s3 teal accent-4  valign-wrapper" style="height:3rem;">
                                            <i class="material-icons white-text center"
                                                style="width: 100%;font-size:2rem;">forum</i>
                                        </div>
                                        <div class="col s9 valign-wrapper">
                                            <h5>Período Entrevistas</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <ul class="collection">
                                            <li class="collection-item avatar">
                                                <i class="material-icons circle">event</i>
                                                <span class="title">Inicio</span>
                                                <p>
                                                    <?php 
                                                setlocale(LC_TIME, 'es_ES.UTF-8');
                                                $string = $datos['fechainicioentrevista'];
                                                $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                                echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                            ?>
                                                </p>
                                                <span class="title">Finalización</span>
                                                <p>
                                                    <?php 
                                                setlocale(LC_TIME, 'es_ES.UTF-8');
                                                $string = $datos['fechafinentrevista'];
                                                $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                                echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                            ?>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col s12 m6 l3">
                                    <div class="row valign-wrapper">
                                        <div class="col s3 red darken-1  valign-wrapper" style="height:3rem;">
                                            <i class="material-icons white-text center"
                                                style="width: 100%;font-size:2rem;">event</i>
                                        </div>
                                        <div class="col s9 valign-wrapper">
                                            <h5>Período Dev. de Resultados</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <ul class="collection">
                                            <li class="collection-item avatar">
                                                <i class="material-icons circle">event</i>
                                                <span class="title">Inicio</span>
                                                <p>
                                                    <?php 
                                                setlocale(LC_TIME, 'es_ES.UTF-8');
                                                $string = $datos['fechainiciodevuelveresultado'];
                                                $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                                echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                            ?>
                                                </p>
                                                <span class="title">Finalización</span>
                                                <p>
                                                    <?php 
                                                setlocale(LC_TIME, 'es_ES.UTF-8');
                                                $string = $datos['fechafindevuelveresultado'];
                                                $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                                echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                            ?>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>




                            <div class="row right-align ">
                                <a class="waves-effect waves-light btn btn_delete_process red <?php if($datos['estado']=='Inactivo'){ echo 'disabled';} ?>"
                                    data-id=<?php echo $datos['idprocesos']?>>
                                    <i class="material-icons left">clear</i>
                                    Eliminar
                                </a>
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

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large red pulse" id="btn_nuevoProceso" href="procesos.php">
                <i class="large material-icons">add_box</i>
            </a>
        </div>

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
    <script src="assets/js/controlador_listar_procesos.js"></script>

</body>

</html>