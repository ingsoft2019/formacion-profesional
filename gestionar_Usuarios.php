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


            <form class="row">
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
            </form>









            <div class="row">
                <div class="col s12 m3">
                    <div class="card">
                        <div class="card-image">
                            <img src="assets/images/profile-image.png" class="responsive-img" alt="">
                        </div>
                        <div class="card-title">
                            <span>Diego Juan <br> Perez Chanfaina</span>
                        </div>
                        <div class="card-content">
                            <div class="row info_list valign-wrapper">
                                <i class="material-icons col s2 m2 l2">format_list_numbered</i>
                                <span class="col s10 m10 l10">20151034449</span>
                            </div>
                            <div class="row info_list valign-wrapper">
                                <i class="material-icons col s2 m2 l2">fingerprint</i>
                                <span class="col s10 m10 l10">0801199804666</span>
                            </div>
                            <div class="row info_list valign-wrapper">
                                <i class="material-icons col s2 m2 l2">import_contacts</i>
                                <span class="col s10 m10 l10">Ingeniería en Sistemas</span>
                            </div>
                            <div class="row info_list valign-wrapper">
                                <i class="material-icons col s2 m2 l2">email</i>
                                <span class="col s10 m10 l10">juanito@unah.hn</span>
                            </div>
                            <div class="row info_list valign-wrapper">
                                <i class="material-icons col s2 m2 l2">local_phone</i>
                                <span class="col s10 m10 l10">32549875</span>
                            </div>
                            <div class="row info_list valign-wrapper">
                                <i class="material-icons col s2 m2 l2">lock</i>
                                <span class="col s10 m10 l10">Estudiante</span>
                            </div>
                        </div>
                        <div class="card-action right-align">
                            <a class="btn-flat red-text" id="btn_eliminarUsuario">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Modal Structure -->
            <div id="mdl_nuevoUsuario" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <h4>Crear nuevo Usuario</h4>






                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <input id="txt_identidad" placeholder="0801-1990-89432" type="text"
                                    class="validate masked" data-inputmask="'mask': '9999-9999-99999'">
                                <label for="txt_identidad" class="active">No. Identidad</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <label for="txt_fechaNac">Fecha de Nacimiento</label>
                                <input id="txt_fechaNac" placeholder="13/03/1990" type="text" class="masked"
                                    data-inputmask="'alias': 'date'">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <input id="last_name" placeholder="Pedro Jose" type="text" class="validate masked"
                                    data-inputmask="'mask': 'a{+}'">
                                <label for="last_name">Nombres</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <input id="last_name" placeholder="Castellanos Andino" type="text"
                                    class="validate masked" data-inputmask="'mask': 'a{+}'">
                                <label for="last_name">Apellidos</label>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="input-field col s12 m6 l6">
                                <input id="last_name" placeholder="3240-9878" type="text" class="validate masked"
                                    data-inputmask="'mask': '(+504)9{4}-9{4}'">
                                <label for="last_name">Celular</label>
                            </div>
                            <div class="input-field col s7 m3 l3">
                                <input id="email" type="text" placeholder="casteljose" class="validate masked"
                                    data-inputmask="'mask': '/{+}'">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field col s5 m3 l3">
                                <label>@unah.edu.hn</label>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="input-field col s12 m6 l6">
                                <select multiple>
                                    <option value="" disabled selected>Seleccionar cargo</option>
                                    <option value="1">Entrevistador</option>
                                    <option value="2">Psicólogo</option>
                                </select>
                                <label>Funciones</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <select>
                                    <option value="" disabled selected>Seleccionar género</option>
                                    <option value="1">Femenino</option>
                                    <option value="2">Masculino</option>
                                </select>
                                <label>Género</label>
                            </div>
                        </div>


                    </form>


                </div>
                <div class="modal-footer">
                    <a class="modal-action modal-close waves-effect waves-blue btn-flat" id="btn_crearUsuario">Crear</a>
                    <a class="modal-action modal-close waves-effect waves-red btn-flat"
                        id="btn_cancelarNuevo">Cancelar</a>
                </div>
            </div>



        </main>
        <!--FIN APARTADO-->



        <!-- Modal Trigger -->
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large red pulse modal-trigger" id="btn_nuevoUsuario" href="#mdl_nuevoUsuario">
                <i class="large material-icons">person_add</i>
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
    <script src="assets/js/gestionar_Usuarios.js"></script>

</body>

</html>