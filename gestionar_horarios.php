<?php

    require('./assets/clases/class_conexion.php');
    $conexion = new Conexion();
    $procesos = $conexion->ejecutarInstruccion("SELECT * , now() as actual FROM tbl_procesos 
    WHERE now() > fechainicio AND now() < fechainiciodevuelveresultado ORDER BY fechainicio");

    session_start();
    if (!isset($_SESSION["idPersona"])){
        header("Location: index.php");
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
    <link href="assets\plugins\air_datepicker\css\datepicker.css" rel="stylesheet">
    <link href="assets\plugins\timepicker\css\timepicker.css" rel="stylesheet">
    <link href="assets\plugins\flatpickr\css\flatpickr.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets\images\icon.png" />

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
            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">
                        <table class="bordered highlight users_table_list">
                            <thead>
                                <tr>
                                    <th class="center" data-field="id_proceso">Id. Proceso</th>
                                    <th class="center" data-field="f_inicio">Fecha Inicial</th>
                                    <th class="center" data-field="f_final">Fecha Final</th>
                                    <?php if($_SESSION["idTipoUsuario"]==2 && !isset($_SESSION["idTipoUsuario2"])){ ?>
                                        <th class="center" data-field="">Horarios <br> Entrevista</th>
                                    <?php } 
                                    if($_SESSION["idTipoUsuario"]==3 && !isset($_SESSION["idTipoUsuario2"])){ ?>
                                        <th class="center" data-field="">Horarios <br> Dev. Result.</th>
                                    <?php } 
                                    if(isset($_SESSION["idTipoUsuario2"])){ ?>
                                    <th class="center" data-field="">Horarios <br> Dev. Result.</th>
                                     <th class="center" data-field="">Horarios <br> Entrevista</th>
                                     
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                        while($datos = mysqli_fetch_array($procesos)){
                            $f_inicial = $datos['fechainicio'];                              
                            $f_final = $datos['fechafinal'];
                            setlocale(LC_TIME, 'es_CO.UTF-8');
                            $f_inicial = date("d-m-Y",strtotime($f_inicial));//strftime("%a %e %b %Y" , strtotime($f_inicial));    
                            $f_final = date("d-m-Y",strtotime($f_final));//strftime("%a %e %b %Y", strtotime($f_final));            
                    ?>
                                <tr class="user_row" id="<?php echo $datos['idprocesos']?>">
                                    <td class="center"><?php echo $datos['idprocesos']?></td>
                                    <td class="center"><?php echo $f_inicial?></td>
                                    <td class="center"><?php echo $f_final?></td>
                                    <?php if($_SESSION["idTipoUsuario"]==2 && !isset($_SESSION["idTipoUsuario2"])){ 
                                        if ($datos['actual'] < $datos['fechainicioentrevista']) {?>
                                        <td class="center">
                                            <a class="btn_entrevista waves-effect waves-light btn blue m-b-xs  modal_Trigger "
                                                id ="btn_entrevista" data-id="<?php echo $datos['idprocesos']?>">
                                                <i class="material-icons text-white" data-id="<?php echo $datos['idprocesos']?>">today</i>
                                            </a>
                                        </td>
                                        <?php }else{ ?>
                                            <td class="center">
                                                <a class="btn_entrevista waves-effect waves-light btn blue m-b-xs  modal_Trigger "
                                                    id ="btn_entrevista" data-id="<?php echo $datos['idprocesos']?> " style="visibility:hidden" >
                                                    <i class="material-icons text-white" data-id="<?php echo $datos['idprocesos']?>">today</i>
                                                </a>
                                            </td>
                                        <?php } 
                                    } ?>
                                    
                                    <?php if($_SESSION["idTipoUsuario"]==3 && !isset($_SESSION["idTipoUsuario2"])){ ?>
                                        <td class="center">
                                            <a class="btn_resultados waves-effect waves-light btn blue m-b-xs modal_Trigger "
                                                data-id="<?php echo $datos['idprocesos']?>">
                                                <i class="material-icons text-white" data-id="<?php echo $datos['idprocesos']?>">today</i>
                                            </a>
                                        </td>
                                    <?php } ?>
                                    <?php if(isset($_SESSION["idTipoUsuario2"])){ 
                                            if ($datos['actual'] < $datos['fechainicioentrevista']) {?>
                                        <td class="center">
                                            <a class="btn_resultados waves-effect waves-light btn blue m-b-xs modal_Trigger "
                                                data-id="<?php echo $datos['idprocesos']?>">
                                                <i class="material-icons text-white" data-id="<?php echo $datos['idprocesos']?>">today</i>
                                            </a>
                                        </td>
                                        <td class="center">
                                            <a class="btn_entrevista waves-effect waves-light btn blue m-b-xs  modal_Trigger "
                                            id ="btn_entrevista" data-id="<?php echo $datos['idprocesos']?>">
                                                <i class="material-icons text-white" data-id="<?php echo $datos['idprocesos']?>">today</i>
                                            </a>
                                        </td>
                                        <?php }else{ ?>
                                            <td class="center">
                                            <a class="btn_resultados waves-effect waves-light btn blue m-b-xs modal_Trigger "
                                                data-id="<?php echo $datos['idprocesos']?>">
                                                <i class="material-icons text-white" data-id="<?php echo $datos['idprocesos']?>">today</i>
                                            </a>
                                            </td>
                                            <td class="center">
                                                <a class="btn_entrevista waves-effect waves-light btn blue m-b-xs  modal_Trigger "
                                                    id ="btn_entrevista" data-id="<?php echo $datos['idprocesos']?> " style="visibility:hidden" >
                                                    <i class="material-icons text-white" data-id="<?php echo $datos['idprocesos']?>">today</i>
                                                </a>
                                            </td>
                                    <?php 
                                           } 
                                    }?>
                                </tr>
                                <?php
                        }
                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </main>
        <!--FIN APARTADO-->


        <div id="mdl_horarios" class="modal modal-fixed-footer bottom-sheet">
            <div class="modal-content">
            <input type="hidden" id="id-proceso">
                <div class="row">
                    <div class="col s3 m2 l1 amber darken-1 center">
                        <i class="material-icons white-text medium">access_time</i>
                    </div>
                    <div class="col s9 m10 l11">
                        <h5 id="mdl_title"></h5>
                        <h6 id="mdl_subtitle"></h6>
                    </div>
                </div>
                <div class="row" id="contenedor_tarjetas">

                </div>
                <div class="row">
                    <a id="btn_nueva_tarjeta" class="waves-effect waves-light orange btn"><i
                            class="material-icons left">add</i>Agregar</a>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn-flat blue-text guardar_cambios" id="btn_guardar_cambios">Guardar</a>
                <a class="btn-flat red-text cancelar_cambios" id="btn_cancelar_cambios">Cerrar</a>

            </div>
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