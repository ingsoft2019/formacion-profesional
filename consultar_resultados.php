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
    <link href="assets/css/consultar_resultados.css" rel="stylesheet">
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
                                    <th class="" data-field="id">Id. Proceso</th>
                                    <th class="" data-field="name">Comenzó</th>
                                    <th class="" data-field="name">Finalizó</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                   // while($datos = mysqli_fetch_array($query))
                                  //  {
                                 ?>
                                <tr class="user_row" id="<?php //echo ?>">
                                    <td>
                                        <?php //echo ?> 1
                                    </td>
                                    <td>
                                        <?php //AQUI DEBE IR LA FECHA DEL COMIENZO DE INSCRIPCIONES DEL PROCESO?> 
                                    </td>
                                    <td>
                                        <?php //AQUI DEBE IR LA FECHA EN QUE FINALIZA LA DEV. DE RESULTADOS DEL PROCESO ?>
                                    </td>
                                    <td class="right-align">
                                        <a class="waves-effect waves-light btn blue m-b-xs btn_custom_padding">
                                            <i class="material-icons text-white">launch</i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                               // }
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
    <script src="assets/js/controlador_consultar_resultados.js"></script>

</body>

</html>