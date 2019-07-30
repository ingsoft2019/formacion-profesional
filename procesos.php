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
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets\images\icon.png" />
    <link href="assets\plugins\flatpickr\css\flatpickr.css" rel="stylesheet">

    <link href="assets/css/procesos.css" rel="stylesheet" type="text/css">

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
                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content ev_grupal_section">
                            <div class="row ev_grupal_section">
                                <div class="row">
                                    <div class="col s3 m1 amber darken-1 phase_icon valign-wrapper">
                                        <i class="material-icons white-text center" style="width: 100%;">people</i>
                                    </div>
                                    <div class="col s9 m11">
                                        <h4>Evaluación Grupal</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m4">
                                        <h5>Inscripciones</h5>
                                        <p class="instuctions">
                                            Defina el período inicial y final en que el proceso de inscripciones
                                            estará
                                            habilitado para los estudiantes.
                                        </p>
                                        <br>
                                        <form class="">
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">date_range</i>
                                                    <input id="txt_fecha" type="text" class="div_date_time_picker"
                                                        placeholder="Seleccione el día">
                                                    <label for="txt_fecha" class="active">Fecha inicial</label>
                                                </div>
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">date_range</i>
                                                    <input id="txt_fecha" type="text" class="div_date_time_picker"
                                                        placeholder="Seleccione el día">
                                                    <label for="txt_fecha" class="active">Fecha final</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col s12 m8 espacio_secciones">
                                        <h5>Secciones</h5>
                                        <p class="instuctions">
                                            Derfina las secciones disponibles para la aplicación de la evaluación
                                            grupal.
                                        </p><br>
                                        <table class="bordered highlight sections_table_list">
                                            <thead>
                                                <tr>
                                                    <th class="th_sections_table" data-field="id">Id.</th>
                                                    <th class="th_sections_table" data-field="fecha">Fecha</th>
                                                    <th class="th_sections_table" data-field="h_inicial">Hora Inicial
                                                    </th>
                                                    <th class="th_sections_table" data-field="h_final">Hora Final</th>
                                                    <th class="th_sections_table" data-field="lugar">Lugar</th>
                                                    <th class="th_sections_table" data-field="cupos">Cupos</th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_sections_list">
                                                <tr class="section_row" id="123">
                                                    <td>1234</td>
                                                    <td>
                                                        <input data-id="123" type="text" class="section_date_picker"
                                                            placeholder="Seleccione el día">
                                                    </td>
                                                    <td>
                                                        <input data-id="123" type="text" class="section_timepicker"
                                                            placeholder="Hora Inicial">
                                                    </td>
                                                    <td>
                                                        <input data-id="123" type="text" class="section_timepicker"
                                                            placeholder="Hora final">
                                                    </td>
                                                    <td>
                                                        <input data-id="123" type="text" class="section_place"
                                                            placeholder="Lugar">
                                                    </td>
                                                    <td>
                                                        <input data-id="123" type="number" class="section_quota"
                                                            placeholder="Cupos">
                                                    </td>
                                                    <td><i class="material-icons remove_button"
                                                            data-id="123">remove_circle_outline</i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                        <a class="waves-effect waves-light btn yellow darken-2"
                                            id="btn_agregar_seccion"><i class="material-icons left">add</i>Agregar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content ev_linea_section">
                            <div class="row ev_grupal_section">
                                <div class="row">
                                    <div class="col s3 m1 lime accent-4 phase_icon valign-wrapper">
                                        <i class="material-icons white-text center" style="width: 100%;">dvr</i>
                                    </div>
                                    <div class="col s9 m11">
                                        <h4>Test en Línea</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--CONTENIDO DE LA TARJETA-->
                                    <div class="row">
                                        <div class="col s12 m4">
                                            <h5>Disponibilidad</h5>
                                            <p class="instuctions">
                                                Defina el período inicial y final en que el estudiante tendrá acceso
                                                para visualizar los enlaces que redirigen a los test en línea.
                                            </p>
                                            <br>
                                            <form class="">
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <i class="material-icons prefix">date_range</i>
                                                        <input id="txt_fecha" type="text" class="div_date_time_picker"
                                                            placeholder="Seleccione el día">
                                                        <label for="txt_fecha" class="active">Fecha inicial</label>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <i class="material-icons prefix">date_range</i>
                                                        <input id="txt_fecha" type="text" class="div_date_time_picker"
                                                            placeholder="Seleccione el día">
                                                        <label for="txt_fecha" class="active">Fecha final</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col s12 m8 espacio_secciones">
                                            <h5>Enlaces y clave</h5>
                                            <p class="instuctions">
                                                Ingrese las direcciones que serán mostradas a los estudiantes para
                                                ingresar a los test en línea.
                                            </p><br>
                                            <div class="row">
                                                <div class="col s12">
                                                    <div class="input-field col s12">
                                                        <input id="txt_url_thorpe" type="text" class="validate"
                                                            placeholder="">
                                                        <label for="txt_url_thorpe">URL Test de intereses
                                                            vocacionales</label>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <input id="txt_url_holland" type="text" class="validate"
                                                            placeholder="">
                                                        <label for="txt_url_holland">URL Test de personalidad</label>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <input id="txt_clave_acceso" type="text" class="validate"
                                                            placeholder="">
                                                        <label for="txt_clave_acceso">Clave de acceso.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="card">
                                <div class="card-content ev_linea_section">
                                    <div class="row ev_grupal_section">
                                        <div class="row">
                                            <div class="col s3 m1 teal accent-4 phase_icon valign-wrapper">
                                                <i class="material-icons white-text center"
                                                    style="width: 100%;">forum</i>
                                            </div>
                                            <div class="col s9 m11">
                                                <h4>Entrevista Pedagógica</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!--CONTENIDO DE LA TARJETA-->
                                            <div class="row">
                                                <h5>Disponibilidad</h5>
                                                <p class="instuctions">
                                                    Defina el período inicial y final en el que se llevarán a cabo las
                                                    entrevistas del proceso.
                                                </p>
                                                <div class="col s12 m4">
                                                    <br>
                                                    <form class="">
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <i class="material-icons prefix">date_range</i>
                                                                <input id="txt_fecha" type="text"
                                                                    class="div_date_time_picker"
                                                                    placeholder="Seleccione el día">
                                                                <label for="txt_fecha" class="active">Fecha
                                                                    inicial</label>
                                                            </div>
                                                            <div class="input-field col s12">
                                                                <i class="material-icons prefix">date_range</i>
                                                                <input id="txt_fecha" type="text"
                                                                    class="div_date_time_picker"
                                                                    placeholder="Seleccione el día">
                                                                <label for="txt_fecha" class="active">Fecha
                                                                    final</label>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="card">
                                <div class="card-content ev_linea_section">
                                    <div class="row ev_grupal_section">
                                        <div class="row">
                                            <div class="col s3 m1 red darken-1 phase_icon valign-wrapper">
                                                <i class="material-icons white-text center"
                                                    style="width: 100%;">event</i>
                                            </div>
                                            <div class="col s9 m11">
                                                <h4>Devolución de Resultados</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!--CONTENIDO DE LA TARJETA-->
                                            <div class="row">
                                                <h5>Disponibilidad</h5>
                                                <p class="instuctions">
                                                    Defina el período inicial y final en el que se llevará a cabo la
                                                    devolución de resultados a cada estudiante.
                                                </p>
                                                <div class="col s12 m4">
                                                    <br>
                                                    <form class="">
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <i class="material-icons prefix">date_range</i>
                                                                <input id="txt_fecha" type="text"
                                                                    class="div_date_time_picker"
                                                                    placeholder="Seleccione el día">
                                                                <label for="txt_fecha" class="active">Fecha
                                                                    inicial</label>
                                                            </div>
                                                            <div class="input-field col s12">
                                                                <i class="material-icons prefix">date_range</i>
                                                                <input id="txt_fecha" type="text"
                                                                    class="div_date_time_picker"
                                                                    placeholder="Seleccione el día">
                                                                <label for="txt_fecha" class="active">Fecha
                                                                    final</label>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 right-align" id="div_btn_guardar_cancelar">
                            <!--hidden="true"-->
                            <a class="waves-effect waves-light btn yellow darken-2 m-b-xs" id="btn_cancelar">Cancelar</a>
                                &nbsp;&nbsp;&nbsp;
                            <a class="waves-effect waves-light btn blue m-b-xs" id="btn_guardar_cambios">Guardar</a>
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

    <script src="assets/js/controlador_procesos.js"></script>

</body>

</html>