<?php
    require('./assets/clases/class_conexion.php');
//***********************
    session_start();
    if (!isset($_SESSION["idPersona"])){
        header("Location: log-in.php?redirigido=1");
    }
//***************************
    $mysql = new Conexion();
    $id=$_SESSION["idPersona"];
    $query=$mysql->ejecutarInstruccion("select e.idestudiante as UserId,no_identidad, concat(nombres,' ',apellidos) as nombre, idprocesos from tbl_horarios_orientador_x_tbl_estudiantes as he
    inner join tbl_horarios_orientador as h on h.idhorariosorientador = he.idhorariosorientador
    inner join tbl_estudiantes as e on e.idestudiante = he.idestudiante
    inner join tbl_personas as p on p.idpersona = e.idestudiante
    where h.idorientador = '$id' 
    order by idprocesos");
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
    <link href="assets/css/subir_resultados.css" rel="stylesheet">
    <link href="assets/css/alpha.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
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
            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">
                        <table class="bordered highlight users_table_list responsive-table">
                            <thead>
                                <tr>
                                    <th class="" data-field="id">Id.</th>
                                    <th class="" data-field="name">Nombre</th>
                                    <th class="" data-field="id">Proceso</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=0;
                                    while($datos = mysqli_fetch_array($query))
                                    {
                                 ?>
                                <tr class="user_row">
                                    
                                        <td>
                                            <?php echo $datos['no_identidad']?>
                                        </td>
                                        <td>
                                            <?php echo $datos['nombre']?>
                                        </td>
                                        <td>
                                            <?php echo $datos['idprocesos']?>
                                        </td>
                                        <td class="center-align">
                                            <form class="row"  action ="peticiones_subir_resultados.php" method="POST" id="<?php echo 'form_g'.$i; ?>" enctype="multipart/form-data">
                                                <input type="text" name="id" id="id" value="<?php echo $datos['UserId']?>" style="display:none">
                                                <input type="text" name="proceso" id="proceso" value="<?php echo $datos['idprocesos']?>" style="display:none">
                                                <div class="row" id="<?php echo 'up-load'.$i; ?>">
                                                    <div class="file-field input-field">
                                                        <div class="btn btn_custom_padding blue" >
                                                            <span>
                                                                <i class="material-icons">file_upload</i>
                                                            </span>
                                                            <input type="file" id="archivo" name="archivo" require>
                                                        </div>
                                                        <div class="file-path-wrapper">
                                                            <input class="file-path validate" type="text" require>
                                                        </div>
                                                    </div>
                                                    <div class="file-field input-field">
                                                        <button class=" btn btn_custom_padding blue"  id="btn_upload">
                                                            <i class="material-icons text-white">cloud_upload</i>
                                                        </button>
                                                    </div>
                                                </div> 
                                            </form>
                                        </td>

                                        <td class="center-align">
                                            <div id="<?php echo 'show-clear'.$i; ?>">
                                                <a class="waves-effect waves-light btn blue m-b-xs btn_custom_padding modal-trigger" id="btn_view" onclick="mostrarPdf(<?php echo $datos['UserId']?>,<?php echo $datos['idprocesos']?>);" data-toggle="modal" data-target="exampleModal">
                                                    <i class="material-icons text-white">launch</i>
                                                </a>
                                            
                                                <a class="waves-effect waves-light btn red m-b-xs btn_custom_padding" id="btn_clear" onclick="eliminarPdf(<?php echo $datos['UserId']?>,<?php echo $datos['idprocesos']?>);">
                                                    <i class="material-icons text-white">clear</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                $i++;
                                }
                               ?>
                            </tbody>
                        </table>
                        <input type="text" name="interaciones" id="interaciones" value="<?php echo $i; ?>" style="display:none">
                        <!-- Modal Structure -->
                        <div id="exampleModal" class="modal modal-fixed-footer">
                            <div class="modal-content">
                                <div class="modal-head">
                                    <div class="row">
                                        <div class="input-field col s12 m6 l6">
                                            <h4>Resultado</h4>
                                        </div>
                                        <div class="input-field col s12 m6 l6">
                                            <a class="modal-action waves-blue btn-flat" id="btn_cerrar">Cerrar</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div id="url-modal"></div>
                                </div>
                            </div>
                        </div>
                        <!--Fin Modal -->
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
    <script src="assets/js/controlador_subir_resultados.js"></script>

</body>

</html>