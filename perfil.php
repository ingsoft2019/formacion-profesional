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
    <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="assets/css/alpha.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body class="loaded">
    <div class="mn-content">

        <div id="div-menu"></div>

        <!--EN ESTE APARTADO VA TODO EL CONTENIDO QUE SE DESEA MOSTRAR EN LA SECCION PRINCIPAL-->
        <main class="mn-inner">
            <div class="row">
                <div class="col s12 m12 l6">
                    <div class="sidebar-profile">
                        <div class="profile-photo">
                            <img src="assets/images/profile-image.png" class="circle responsive-img" alt="">
                        </div>
                    </div>
                    <div class="sidebar-profile-info">
          
                            <h5 align="center">David Doe</h5>
                       
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Información Personal</span><br>
                            <div class="row">
                                <form class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 m6 l6">
                                            <input id="last_name" type="text" class="validate">
                                            <label for="last_name">Nombres</label>
                                        </div>
                                        <div class="input-field col s12 m6 l6">
                                            <input id="last_name" type="text" class="validate">
                                            <label for="last_name">Apellidos</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m6 l6">
                                            <input id="last_name" type="text" class="validate">
                                            <label for="last_name">No. Identidad</label>
                                        </div>
                                        <div class="input-field col s12 m6 l6">
                                            <input id="last_name" type="text" class="validate">
                                            <label for="last_name">Celular</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label for="birthdate">Birthdate</label>
                                            <input id="birthdate" type="text" class="datepicker">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="email" type="email" class="validate">
                                            <label for="email">Correo</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m6 l6">
                                            <input id="password" type="password" class="validate" disabled>
                                            <label for="password">Contraseña</label>
                                        </div>
                                        <div class="input-field col s12 m6 l6" align="right">
                                            <a class="waves-effect waves-light btn blue m-b-xs">Cambiar</a>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col s12 m12 l6">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Información Académica</span><br>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="last_name" type="text" class="validate">
                                    <label for="last_name">No. Cuenta</label>
                                </div>
                                <div class="input-field col s12">
                                    <select>
                                        <option value="" disabled selected>Seleccione una opción</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                    </select>
                                    <label>Carrera Universitaria</label>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Recibir notificaciones por correo</span><br>
                            <div class="row">
                                <div class="col s12">
                                    <!-- Switch -->
                                    <div class="switch m-b-md">
                                        <label>
                                            No
                                            <input type="checkbox">
                                            <span class="lever"></span>
                                            Sí
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content" align="right">
                            <a class="waves-effect waves-light btn yellow darken-2 m-b-xs">Cancelar</a>
                            <a class="waves-effect waves-light btn blue m-b-xs">Guardar</a>
                        </div>
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
    <script src="assets/js/menuPiePagina.js"></script>

</body>


</html>