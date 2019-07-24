<?php

    require('./assets/clases/class_conexion.php');
    $mysql = new Conexion();
    $query=$mysql->ejecutarInstruccion("SELECT idCarrera,nombreCarrera FROM tbl_carreras ORDER BY nombreCarrera ASC");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        
        <!-- Title -->
        <title>VOAE | Registro de Estudiante</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        
        <link rel="stylesheet" href="assets/plugins/sweetalert/sweetalert.css">

        	
        <!-- Theme Styles -->
        <!--link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/-->
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/registro.css" rel="stylesheet">
        

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body>
    <div id="div_loader"></div>
        <div class="mn-content valign-wrapper">
            <main class="mn-inner">
                <div class="valign">
                      <div class="row">
                          <div class="col s12 m10 l10 offset-l1 offset-m1">
                              <div class="card white darken-1">
                                  <div class="card-content ">
                                      <span class="card-title">Registro</span>
                                       <div class="row">
                                           <form class="col s12" method="POST" id="form">
                                               <div class="input-field col s12 m6 l6">
                                                   <input id="nombres" name="nombres" type="text" class="masked" placeholder="Pedro José" 
                                                   data-inputmask="'mask': 'a{+}'" class="" id="nombres">
                                                   <label for="nombres">Nombres</label>
                                               </div>
                                               <div class="input-field col s12 m6 l6">
                                                    <input id="apellidos" name="apellidos" type="text" class="masked" placeholder="Castellanos Andino" data-inputmask="'mask': 'a{+}'" id="apellidos">
                                                    <label for="apellidos">Apellidos</label>
                                                </div>
                                                <div class="input-field col s12 m6 l6">
                                                        <input id="identidad" name="identidad" type="text" class="masked" id="numero-identidad" placeholder="0801-1990-89432" data-inputmask="'mask': '9999-9999-99999'">
                                                        <label for="identidad">No. Identidad</label>
                                                </div>
                                                <div class="input-field col s12 m6 l6">
                                                        <input id="cuenta" name="cuenta" type="text" class="masked" id="numero-cuenta" placeholder="20101009874" data-inputmask="'mask': '99999999999'">
                                                        <label for="cuenta">No. Cuenta</label>
                                                </div>
                                                <div class="input-field col s12 m6 l6">
                                                        <input id="telefono" name="telefono" type="text" class="masked" id="telefono" placeholder="9494-9494" data-inputmask="'mask': '(504) 9{4}-9{4}'">
                                                        <label for="telefono">Teléfono</label>
                                                </div>
                                                <div class="input-field col s7 m3 l3">
                                                    <input  id="email" name="email" type="text" placeholder="casteljose" class="masked"
                                                        data-inputmask="'mask': '/{+}'">
                                                    <label for="email">Email</label>
                                                </div>
                                                <div class="input-field col s5 m3 l3">
                                                    <label>@unah.hn</label>
                                                </div>
                                                <div class="input-field col s12 m6 l6">
                                                    <select id="genero" name="genero">
                                                        <option value="0" selected>Seleccione una opción</option>
                                                        <option value="1">Femenino</option>
                                                        <option value="2">Masculino</option>
                                                    </select>
                                                    <label>Género</label>
                                                </div>
                                                <div class="col s12 m6 l6">
                                                    <label>Carrera Universitaria</label>
                                                    <select id="carrera" name="carrera" class="">
                                                        <option value="0" selected>Seleccione una opcion</option>
                                                        <?php 
                                                            while($datos = mysqli_fetch_array($query))
                                                            {
                                                        ?>
                                                        <option value="<?php echo $datos['idCarrera']?>"><?php echo $datos['nombreCarrera']?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                               <div class="input-field col s12 m6 l6">
                                                   <input id="password" name="password" type="password" class="tooltipped" data-position="bottom" data-tooltip="Debe incluir al menos 8 caracteres mezclando mayúsculas, minúsculas, números y caracteres especiales como #?!@$%^&*-">
                                                   <label for="password">Contraseña</label>
                                               </div>
                                               <div class="input-field col s12 m6 l6">
                                                   <input id="password2" name="password2" type="password" class="">
                                                   <label for="password2">Confirmar Contraseña</label>
                                               </div>
                                               <div class="col s12 m12 l12 center-align m-t-sm">
                                                   <button  id="submit" class="waves-effect waves-light btn blue">Registrar</button>
                                               </div>
                                           </form>
                                           <div id="resp"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                    </div>
                </div>
            </main>
        </div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/js/alpha.js"></script>
        <script src="assets\plugins\prettify\prettify.js"></script>
        <script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
        <script src="assets/js/pages/form-input-mask.js"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>

        <script src="assets/js/controlador-registro.js"></script>
        
    </body>
</html>