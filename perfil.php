<?php 
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />


    <!-- Theme Styles -->
    <link href="assets/css/alpha.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/perfil.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/image-cropper/cropper.min.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body>

    <div class="mn-content">

        <div id="div-menu"></div>

        <!--EN ESTE APARTADO VA TODO EL CONTENIDO QUE SE DESEA MOSTRAR EN LA SECCION PRINCIPAL-->
        <main class="mn-inner">
            <div class="container-fluid">

                <div class="col s12 m12">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="row">
                                    <div class="col s12">
                                        <div class="sidebar-profile">
                                            <div class="profile-photo">
                                                <img src="assets/images/profile-image.png" class="circle" alt=""
                                                    id="img_editar_perfil">
                                                <!--<a class="btn-floating btn-large waves-effect waves-light grey darken-3"
                                                        id="btn_editar_foto"><i class="material-icons modal-trigger"
                                                            href="#mdl_editar_foto">photo_camera</i></a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col s12 m12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <form class="col s12" id="frm_perfil">
                                        <div class="row">
                                            <div class="input-field col s12 m6">
                                                <input id="txt_nombres" name="txt_nombres" type="text" class="masked"
                                                    data-inputmask="'mask': 'a{+}'">
                                                <label for="txt_nombres">Nombres</label>
                                            </div>
                                            <div class="input-field col s12 m6">
                                                <input id="txt_apellidos" name="txt_apellidos" type="text"
                                                    class="masked" data-inputmask="'mask': 'a{+}' ">
                                                <label for="txt_apellidos">Apellidos</label>
                                            </div>
                                            <div class="input-field col s12 m6">
                                                <input id="txt_identidad" name="txt_identidad" type="text"
                                                    class="masked" data-inputmask="'mask': '9999-9999-99999'">
                                                <label for="txt_identidad">No. Identidad</label>
                                            </div>
                                            <!--  <div class="row">
                                        <div class="input-field col s12 m4">
                                            <label for="txt_fechaNac">Fecha de Nacimiento</label>
                                            <input id="txt_fechaNac" type="text" class="datepicker">
                                        </div>
                                   	    </div>-->
                                            <div class="input-field col s12 m6">
                                                <input id="txt_celular" name="txt_celular" ype="text" class="masked"
                                                    data-inputmask="'mask': '(504) 9{4}-9{4}'">
                                                <label for="txt_celular">Celular</label>
                                            </div>
                                            <div class="input-field col s12 m6">
                                                <input id="txt_correo" name="txt_correo" type="text" class="masked"
                                                    data-inputmask="'mask': '/{+}@a{+}.a{+}'">
                                                <label for="txt_correo">Correo</label>
                                            </div>
                                            <div class="input-field col s12 m6">
                                                <input id="txt_cuenta" name="txt_cuenta" type="text" class="masked"
                                                    data-inputmask="'mask': '99999999999'">
                                                <label for="txt_cuenta">No. Cuenta</label>
                                            </div>
                                            <div class="input-field col s12 m6">
                                                <label for="slc-carrera">Carrera Universitaria</label>
                                                <select id="slc-carrera" name="slc-carrera">
                                                    <option value="0">Seleccione una opción</option>

                                                </select>

                                            </div>
                                            <div class="col s12 m6">
                                                <div class="input-field col s12 m9">
                                                    <input id="txt_contrasena" type="password" class="validate"
                                                        disabled>
                                                    <label for="txt_contrasena">Contraseña</label>
                                                </div>

                                                <div class="input-field col s12 m3" align="right">
                                                    <a id="btn_cambiar_contrasena"
                                                        class="waves-effect waves-light btn blue m-b-xs closeOnEsc">Cambiar</a>
                                                </div>
                                                <div id="div-cambiar-contrasena" hidden class="col s12"> 
                                                    <div class="input-field col s12">
                                                        <input id="txt_contrasena_actual" name="txt_contrasena_actual"
                                                            type="password" class="validate">
                                                        <label for="txt_contrasena_actual">Contraseña Actual</label>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <input id="txt_contrasena_nueva" name="txt_contrasena_nueva"
                                                            type="password" class="validate">
                                                        <label for="txt_contrasena_nueva">Nueva Contraseña</label>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <input id="txt_confirmar_nueva" type="password"
                                                            name="txt_confirmar_nueva" class="validate">
                                                        <label for="txt_confirmar_nueva">Confirmar Contraseña</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col s12 m12">

                                                <div class="col m4 s12" hidden="true" id="div_btn_guardar_cancelar">
                                                    <a class="waves-effect waves-light btn yellow darken-2 m-b-xs"
                                                        id="btn_cancelar">Cancelar</a>
                                                    <a class="waves-effect waves-light btn blue m-b-xs"
                                                        id="btn_guardar_cambios">Guardar</a>
                                                </div>
                                                <div id="pruebas">

                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>
    <!--FIN APARTADO-->

    <div id="mdl_editar_foto" class="modal modal-fixed-footer">
        <div class="modal-content">




            <div class="row">
                <div class="col s12 m6 l6">
                    <h5>Actualizar Foto de Perfil</h5>
                    <form action="#" class="p-v-xs">
                        <div class="file-field input-field">
                            <div class="btn blue" style="padding-left: 15px;padding-right: 15px;">
                                <span><i class="material-icons">file_upload</i></span>
                                <input type="file" id="fl_foto_perfil" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Selecciones una imagen">
                            </div>
                        </div>
                    </form>
                    <img src="assets/images/profile-image.png" class="responsive-img" alt="" id="img_cropper_foto">

                </div>
                <div class="col s12 m6 l6" align="center">
                    <div id="div_result_cropImage"></div>



                </div>
            </div>



        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-blue btn-flat">Actualizar</a>
        </div>
    </div>
    <br><br><br><br><br>
    <!--  <div id="div-piePagina"></div> -->


    </div>
    <div class="left-sidebar-hover"></div>

    <!-- Javascripts -->
    <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
    <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="assets/js/pages/form_elements.js"></script>
    <script src="assets/js/ContenidoFijo.js"></script>
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="assets/plugins/image-cropper/cropper.min.js"></script>
    <script src="assets/js/controlador-perfil.js"></script>
    <script src="assets\plugins\prettify\prettify.js"></script>
    <script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    <script src="assets/js/pages/form-input-mask.js"></script>

</body>