<?php

    require('./assets/clases/class_conexion.php');
    $mysql = new Conexion();
    $query = $mysql->ejecutarInstruccion("SET lc_time_names = 'es_MX'");
    $query=$mysql->ejecutarInstruccion("
    select *, DATE_FORMAT(fechainicio, '%d de %M de %Y') as FI, DATE_FORMAT(fechafinal, '%d de %M de %Y') as FF from tbl_procesos
    ");

    session_start();
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
    <link rel="icon" type="image/png" href="assets\images\icon.png" />
    <link href="assets/css/inscripciones.css" rel="stylesheet">

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

                <ul class="collapsible popout procesos" data-collapsible="accordion">
                    <?php 
                        while($datos = mysqli_fetch_array($query))
                        {
                    ?>
                    <li <?php echo 'onclick="getSecciones('.$datos["idprocesos"].',this)"' ?> > <!--ID PROCESO-->
                        <div class="collapsible-header">
                        <i class="material-icons">event_note</i>
                            Proceso de orientación Profesional No. <?php echo $datos["idprocesos"]; ?><br>
                            <div class="chip">Comienza <?php echo $datos["FI"]; ?></div>
                            <div class="chip">Finaliza <?php echo $datos["FF"]; ?></div>
                        </div>
                        <div class="collapsible-body">
                           <div class="row ">
                            <!--  secciones -->
                            </div>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>


            <input type="hidden" id="idPersona" value="<?php echo $_SESSION["idPersona"] ?>">


            <div class="row">
                <ul class="collapsible popout" data-collapsible="accordion" id="div_secciones_matriculadas">
                    <li> 
                        <div class="collapsible-header active">
                            <i class="material-icons">format_list_numbered</i>
                            Resúmen de Inscripciones Realizadas
                        </div>
                        <div class="collapsible-body">
                            <div class="row">
                                <div class="col s12 m4 l3" id="20197612544739"><!--ID SECCION-->
                                    <div class="card">
                                        <div class="card-content">
                                            <ul class="collection">
                                                <li class="collection-item valign-wrapper">
                                                    <i class="material-icons">event_note</i>&emsp;
                                                    Proceso <br>&emsp;
                                                    20197612544789
                                                </li>
                                                <li class="collection-item valign-wrapper">
                                                    <i class="material-icons">fingerprint</i>&emsp;
                                                    Sección  <br>&emsp;
                                                    20197612544739
                                                </li>
                                                <li class="collection-item valign-wrapper">
                                                    <i class="material-icons">today</i>&emsp;
                                                    Agosto 7, 2019
                                                </li>
                                                <li class="collection-item valign-wrapper">
                                                    <i class="material-icons">schedule</i>&emsp;
                                                    9:30 AM - 1:00 PM
                                                </li>
                                                <li class="collection-item valign-wrapper">
                                                    <i class="material-icons">room</i>&emsp;
                                                    Aula Voae 209
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-action right-align">
                                            <a class="waves-effect waves-light red btn btn_eliminar_inscripcion" data-section="20197612544739" data-process="20197612544789">Eliminar</a><!--ID SECCION-->
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </li>
                </ul>
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
    <script src="assets/js/controlador_inscripciones.js"></script>
    <script type="text/javascript">
     function inscribirse(idSeccion, idPersona) {
        console.log(idSeccion, idPersona)

        $.ajax({
            url: 'assets/ajax/inscribirEstudiante.php',
            method: 'POST',
            data: `idPersona=${idPersona}&idSeccion=${idSeccion}`,
            success: function(data) {
                console.log(data);
                swal({
                    title: "Completo",
                    text: "Sección matriculada",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#2196F3",
                    confirmButtonText: "Aceptar",
                    // cancelButtonText: "Cancelar",
                    closeOnConfirm: false,
                    // closeOnCancel: true
                // }, function(isConfirm) {
                //     // const section = $('#' + ID_Seccion);
                //     section.hide("slow", function() { $(this).remove(); })
                //     if (isConfirm) {
                //         swal("Completo", "Inscripción eliminada.", "success");
                //     }
                });
            }
        })


    }  
    function getSecciones(id,e){

        var element=$(e)[0].childNodes[5].childNodes[1];
        $.ajax({
            url: 'assets/ajax/inscripciones.php',
            method: 'post',
            dataType:'json',
            data: 'id='+id,
            success: function(data){
                var text="";
                for (var i = 0; i<data.length; i++) {
                    text+= '<div class="col s12 m4 l3">'+
                                   '<div class="card">'+
                                        '<div class="card-content">'+
                                        '<ul class="collection">'+
                                        '<li class="collection-item valign-wrapper">'+
                                        '<i class="material-icons">fingerprint</i>&emsp;'+data[i]["idsecciones"]+
                                        '        </li>'+
                                        '        <li class="collection-item valign-wrapper">'+
                                        '            <i class="material-icons">today</i>&emsp;'+data[i]["dia"]+
                                        '        </li>'+
                                        '        <li class="collection-item valign-wrapper">'+
                                        '            <i class="material-icons">schedule</i>&emsp;'+data[i]["horainicial"]+ "-" + data[i]["horafinal"]+
                                        '        </li>'+
                                        '        <li class="collection-item valign-wrapper">'+
                                        '            <i class="material-icons">room</i>&emsp;'+data[i]["lugar"]+
                                        '        </li>'+
                                        '        <li class="collection-item valign-wrapper">'+
                                        '            <i class="material-icons">accessibility</i>&emsp;'+data[i]["cupos"]+ " cupos"+
                                        '        </li>'+
                                        '    </ul>'+
                                        '</div>'+
                                        '<div class="card-action right-align">'+
                                        '<a class="waves-effect waves-light blue btn btn_inscribirse" onclick="inscribirse(' + data[i]["idsecciones"]+','+ $('#idPersona').val() + ')">Inscribirse</a>'+
                                        '</div>'+
                                    '</div>'+
                               '</div>';
                }
                element.innerHTML=text;
            }
        });


    }
    </script>
</body>

</html>