<?php

    require('./assets/clases/class_conexion.php');
    $mysql = new Conexion();
    $query=$mysql->ejecutarInstruccion("
    SELECT * FROM tbl_procesos WHERE 1
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
    <link href="assets/css/subir_resultados.css" rel="stylesheet">
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


        <div class="fixed-action-btn">
            <a class="btn-floating btn-large red pulse" id="btn_nuevoProceso" href="procesos.php">
                <i class="large material-icons">add_box</i>
            </a>
        </div>


            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">
                        <table class="bordered highlight users_table_list responsive-table">
                            <thead>
                                <tr>
                                    <th class="" data-field="id">Id. Proceso</th>
                                    <th class="" data-field="name">Comienzo</th>
                                    <th class="" data-field="name">Final</th>
                                    <th class="" data-field="name">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while($datos = mysqli_fetch_array($query))
                                    {
                                 ?>
                                <tr class="user_row" id="<?php echo $datos['idprocesos']?>">
                                    <td>
                                        <?php echo $datos['idprocesos']?>
                                    </td>
                                    <td>
                                        <?php 
                                        setlocale(LC_TIME, 'es_ES.UTF-8');
                                        $string = $datos['fechainicio'];
                                        $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                        echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        setlocale(LC_TIME, 'es_ES.UTF-8');
                                        $string = $datos['fechafindevuelveresultado'];
                                        $date = DateTime::createFromFormat("Y-m-d H:i:s", $string);
                                        echo strftime("%A %d, %b %Y",$date->getTimestamp());
                                        ?>
                                    </td>
                                    <td class="<?php if($datos['estado']=='Activo'){ echo 'green-text';}else{echo 'red-text';} ?>">
                                        <?php echo $datos['estado']?>
                                    </td>
                                    

                                    <td class="center-align">
                                       <!--  <a class="waves-effect waves-light btn blue m-b-xs btn_custom_padding">
                                            <i class="material-icons text-white">create</i>
                                        </a>
                                     -->
                                        <a class="waves-effect waves-light btn red m-b-xs btn_custom_padding btn_delete_process"
                                        style="<?php if($datos['estado']=='Inactivo'){ echo 'display:none;';} ?>"
                                        data-id=<?php echo $datos['idprocesos']?> >
                                            <i class="material-icons text-white">clear</i>
                                        </a>
                                    </td>
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