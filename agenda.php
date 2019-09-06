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
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
    <link href="assets\plugins\flatpickr\css\flatpickr.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets\images\icon.png" />

    <link href="assets/css/agenda.css" rel="stylesheet" type="text/css" />

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
                <div class="col s3 m1 teal accent-4 phase_icon valign-wrapper">
                    <i class="material-icons white-text center" style="width: 100%;">collections_bookmark</i>
                </div>
                <div class="col s9 m11">
                    <h4>Agenda</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="row" style="margin:0px;">
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">loop</i>
                            <select id="slc_proceso">
                                <option value="0" disabled selected>Seleccione un Proceso</option>
                                
                            </select>
                            <label for="slc_proceso">Proceso</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">collections_bookmark</i>
                            <select id="slc_evento">
                                <option value="0" disabled selected>Seleccione el tipo de evento</option>
                                <option value="2">Entrevista</option>
                                <option value="3">Dev. Resultados</option>
                            </select>
                            <label>Evento</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">face</i>
                            <select id="slc_orientador">
                                <option value="" disabled selected>Seleccione un orientador</option>
                            </select>
                            <label>Orientador</label>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class=" col s12 m5 l4" style="padding:0px;">
                    <div classs="row" style="padding:0px;">
                        <div class="col s12" style="padding:0px;">
                            <div class="div_date_picker" id="calendario_orientador">
                                
                            </div>
                            <br>
                        </div>

                    </div>
                </div>

                <div class=" col s12 m7 l8">
                    <div class="row">
                        <form id="frm_horas" class="col s12" style="padding:0px;">
                            <div class="row" id="horas_orientador">
                                <div class="col s12 m6 l4 radio_container">
                                    <input name="rb_hora" type="radio" id="test" />
                                    <label for="test" id="Ltest"></label>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="input-field" align="right">
                        <a id="btn_agendar" class="waves-effect waves-light btn blue darken-3">Agendar</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content  row">
                        <i class="material-icons btn_eliminar">clear</i>
                    <div class="col s12 m6 l2">
                        <h6 class="vertical_align">
                            <i class="material-icons">loop</i>
                            <span data-id="spn_proceso">Sin datos</span>
                        </h6>
                    </div>
                    <div class="col s12 m6 l2">
                        <h6 class="vertical_align">
                            <i class="material-icons">collections_bookmark</i>
                            <span data-id="spn_evento">Sin datos</span>
                        </h6>
                    </div>
                    <div class="col s12 m6 l2">
                        <h6 class="vertical_align">
                            <i class="material-icons">face</i>
                            <span data-id="spn_orientador">Sin datos</span>
                        </h6>
                    </div>
                    <div class="col s12 m6 l2">
                        <h6 class="vertical_align">
                            <i class="material-icons">event</i>
                            <span data-id="spn_date">Sin datos</span>
                        </h6>
                    </div>
                    <div class="col s12 m6 l2">
                        <h6 class="vertical_align">
                            <i class="material-icons">schedule</i>
                            <span data-id="spn_time">Sin datos</span>
                        </h6>
                    </div>
                    <div class="col s12 m6 l2">
                        <h6 class="vertical_align">
                            <i class="material-icons">location_on</i>
                            <span data-id="spn_time">Edificio de Registro</span>
                        </h6>
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
    <script src="assets/plugins/materialize/js/materialize.js"></script>
    <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
    <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="assets/js/pages/form_elements.js"></script>
    <script src="assets\plugins\prettify\prettify.js"></script>
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="assets/js/ContenidoFijo.js"></script>
    <script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    <script src="assets/js/pages/form-input-mask.js"></script>
    <script src="assets\plugins\flatpickr\js\flatpickr.js"></script>
    <script src="assets/js/controlador_agenda.js"></script>

</body>

</html>