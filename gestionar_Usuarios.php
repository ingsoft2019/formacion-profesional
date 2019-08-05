<?php

    require('./assets/clases/class_conexion.php');
    $mysql = new Conexion();
    $query=$mysql->ejecutarInstruccion("
    SELECT a.idPersona as UserId, a.no_identidad as Identidad, concat(a.nombres,' ',a.apellidos) as Nombre, GROUP_CONCAT(d.descripcion) AS TiposUsuario
    FROM tbl_personas a 
    left join tbl_estudiantes b
    on a.idPersona=b.idEstudiante 
    left join tbl_personas_has_tbl_tipousuario c 
    on a.idPersona = c.tbl_personas_idPersona 
    left join tbl_tipousuario d
    on c.tbl_tipousuario_idtipousuario=d.idtipousuario
    WHERE d.idtipousuario <> 1
    GROUP BY a.idPersona
    ORDER BY a.nombres
        ");
    $TiposUsuarios=$mysql->ejecutarInstruccion(" SELECT * FROM tbl_tipousuario  WHERE idtipousuario NOT IN (1,4)");


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
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <!-- Theme Styles -->
    <link href="assets/css/alpha.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/gestionar_Usuarios.css" rel="stylesheet" type="text/css">
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


            <!--<form class="row">
                <div class="col l6 m6 s12">
                    <div class="row valign-wrapper barra_buscar">
                        <div class="col l1">
                            <i class="material-icons">search</i>
                        </div>
                        <div class="col l10">
                            <input id="txt_buscar" type="search" required>
                        </div>
                        <div class="col l1">
                            <i class="material-icons">close</i>
                        </div>
                    </div>
                </div>
            </form>-->



            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">
                        <table class="bordered highlight users_table_list">
                            <thead>
                                <tr>
                                    <th class="" data-field="id">Id.</th>
                                    <th class="" data-field="name">Nombre</th>
                                    <th class=" hide-on-small-only" data-field="user_type">Tipo de Usuario</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while($datos = mysqli_fetch_array($query))
                                    {
                                 ?>
                                <tr class="user_row" id="<?php echo $datos['UserId']?>">
                                    <td><?php echo $datos['Identidad']?></td>
                                    <td><?php echo $datos['Nombre']?></td>
                                    <td class="hide-on-small-only lbl_tipo_usuario"><?php echo $datos['TiposUsuario']?></td>
                                    <td><i class="material-icons info_button" data-id="<?php echo $datos['UserId']?>">info</i></td>
                                    <td><i class="material-icons remove_button" data-id="<?php echo $datos['UserId']?>">delete</i></td>
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

        <!-- Modal Structure -->
        <div id="user_modal_information" class="modal modal_user_information">
            <div class="modal-content">
                <div class="profile_color_div"></div>
                <div class="row">
                    <div class="col s12">
                        <div class="">
                            <div class="card-image">
                                <img src="assets/images/profile-image.png" class="responsive-img profile_foto_border"
                                    alt="">
                            </div>
                            <div class="card-title">
                                <h5 class="black-text NombreC" style="font-weight:300;margin-bottom:30px;"></h5>
                            </div>
                            <div class="card-content">
                            <div class="row info_list valign-wrapper">
                                    <i class="material-icons col s2 m2 l2">format_list_numbered</i>
                                    <span class="col s10 m10 l10 Cuenta"></span>
                                </div>
                                <div class="row info_list valign-wrapper">
                                    <i class="material-icons col s2 m2 l2">fingerprint</i>
                                    <span class="col s10 m10 l10 Identidad"></span>
                                </div>
                                <div class="row info_list valign-wrapper">
                                    <i class="material-icons col s2 m2 l2">import_contacts</i>
                                    <span class="col s10 m10 l10 Carrera"></span>
                                </div>
                                <div class="row info_list valign-wrapper">
                                    <i class="material-icons col s2 m2 l2">email</i>
                                    <span class="col s10 m10 l10 Correo"></span>
                                </div>
                                <div class="row info_list valign-wrapper">
                                    <i class="material-icons col s2 m2 l2">local_phone</i>
                                    <span class="col s10 m10 l10 Celular"></span>
                                </div>
                                <!-- <div class="row info_list valign-wrapper">
                                    <i class="material-icons col s2 m2 l2">lock</i>
                                    <span class="col s10 m10 l10 TipoUsuario"></span>
                                </div> -->
                                <div class="row info_list valign-wrapper tipo">
                                    <i class="material-icons col s2 m2 l2">work</i>
                                    <span class="col s10 m10 l10">
                                        <select multiple class="col s12 m5" id="slc_funcion_orientador">
                                            <?php 
                                                while($datos = mysqli_fetch_array($TiposUsuarios))
                                                {
                                            ?>
                                           <option name="tipo" value="<?php echo $datos['idtipousuario']?>"><?php echo $datos['descripcion']?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </span>

                                </div>
                            </div>
                            <br>
                            <div class="card-action right-align">
                                <div class="row">
                                    <a class="btn-flat amber-text  darken-3 cancelar_cambios" id="btn_cancelar_cambios"
                                        data-id="124">Cerrar</a>
                                    <a class="btn-flat blue-text guardar_cambios" id="btn_guardar_cambios" onclick="" 
                                        data-id="124">Guardar</a>
                                </div>
                                <!-- <div class="row"> 
                                    <a class="btn-flat red-text eliminar_usuario" id="btn_eliminarUsuario"
                                        data-id="124">Eliminar</a>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Trigger -->
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large red pulse modal-trigger" id="btn_nuevoUsuario" href="#mdl_nuevoUsuario">
                <i class="large material-icons">person_add</i>
            </a>
        </div>

        <!-- Modal Structure -->
        <div id="mdl_nuevoUsuario" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Crear nuevo Usuario</h4>
                <form class="col s12" method="POST" id="form_g">
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <input id="identidad" name="identidad" placeholder="0801-1990-89432" type="text" class="validate masked"
                                data-inputmask="'mask': '9999-9999-99999'">
                            <label for="identidad" class="active">No. Identidad</label>
                        </div>

                        <div class="input-field col s12 m6 l6">
                            <input id="telefono" name="telefono" placeholder="3240-9878" type="text" class="validate masked"
                                data-inputmask="'mask': '(504) 9{4}-9{4}'">
                            <label for="telefono">Celular</label>
                        </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <input id="nombres" name="nombres" placeholder="Pedro Jose" type="text" class="validate masked"
                                    data-inputmask="'mask': 'a{+}'">
                                <label for="nombres">Nombres</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <input id="apellidos" name="apellidos" placeholder="Castellanos Andino" type="text" class="validate masked"
                                    data-inputmask="'mask': 'a{+}'">
                                <label for="apellidos">Apellidos</label>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="input-field col s7 m3 l6">
                                <input id="email" name="email" type="text" placeholder="casteljose" class="validate masked"
                                    data-inputmask="'mask': '/{+}'">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field col s5 m3 l6">
                                <label>@unah.edu.hn</label>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="input-field col s5 m3 l6">
                                <input id="password" name="password" type="text" placeholder="********" readonly="readonly">
                                <label for="password">Password</label>
                            </div>
                            <div class="modal_user_information">
                                <button  class="modal-action waves-effect waves-blue btn-flat" id="btn_generarPass">Generar</button>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="input-field col s12 m6 l6">
                                <select id="cargo" name="cargo">
                                    <option value="" disabled selected>Seleccionar cargo</option>
                                    <option value="2">Entrevistador</option>
                                    <option value="3">Psicólogo</option>
                                    <option value="4">Entrevistador y Psicólogo</option>
                                </select>
                                <label>Funciones</label>
                            </div>
                        <div class="input-field col s12 m6 l6">
                            <select id="genero" name="genero">
                                <option value="" disabled selected>Seleccionar género</option>
                                <option value="1">Femenino</option>
                                <option value="2">Masculino</option>
                            </select>
                            <label>Género</label>
                            </div>
                        </div>
                    
                        <div class="modal_user_information">
                            <button  class="modal-action waves-effect waves-blue btn-flat" id="btn_crearUsuario">Crear</button>
                            <button  class="modal-action waves-effect waves-red btn-flat" id="btn_cancelarNuevo">Cancelar</button>
                        </div>
                </form>


        


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
    <script src="assets/js/gestionar_Usuarios.js"></script>

</body>

</html>