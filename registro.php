<?php

    require('clases/class_conexion.php');
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
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        

        	
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
    <body class="signup-page loaded">
        <div class="mn-content valign-wrapper">
            <main class="mn-inner container ">
                <div class="valign">
                      <div class="row">
                          <div class="col s12 m8 l8 offset-l2 offset-m2">
                              <div class="card white darken-1">
                                  <div class="card-content ">
                                      <span class="card-title">Registro</span>
                                       <div class="row">
                                           <form class="col s12" method="POST" action="envio_registro.php">
                                               <div class="input-field col s12">
                                                   <input name="nombres" type="text" class="">
                                                   <label for="nombres">Nombres</label>
                                               </div>
                                               <div class="input-field col s12">
                                                    <input name="apellidos" type="text" class="">
                                                    <label for="apellidos">Apellidos</label>
                                                </div>
                                                <div class="input-field col s12">
                                                <select name="genero">
                                                    <option value="" disabled selected>Seleccione una opción</option>
                                                    <option value="1">Femenino</option>
                                                    <option value="2">Masculino</option>
                                                </select>
                                                <label>Género</label>
                                                </div>
                                                <div class="input-field col s12">
                                                        <input name="id" type="text" id="numero-identidad">
                                                        <label for="id">No. Identidad</label>
                                                </div>
                                                <div class="input-field col s12">
                                                        <input name="cuenta" type="text" id="numero-cuenta">
                                                        <label for="cuenta">No. Cuenta</label>
                                                </div>
                                                <div class="input-field col s12">
                                                        <input name="numero" type="text" class="">
                                                        <label for="numero">Celular o Teléfono</label>
                                                </div>
                                                <div class="browser-default col s12">
                                                    <label>Carrera Universitaria</label>
                                                    <select name="carrera" class="">
                                                        <option value="" disabled selected>Seleccione una opcion</option>
                                                        <?php 
                                                            while($datos = mysqli_fetch_array($query))
                                                            {
                                                        ?>
                                                        <option value="<?php echo $datos['nombreCarrera']?>"><?php echo $datos['nombreCarrera']?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                               <div class="input-field col s12">
                                                   <input name="email" type="email" class="">
                                                   <label for="email">Correo</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input name="password" type="password" class="">
                                                   <label for="password">Contraseña</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input name="password2" type="password" class="">
                                                   <label for="password2">Confirmar Contraseña</label>
                                               </div>
                                               <div class="col s12 right-align m-t-sm">
                                                   <button  class="waves-effect waves-light btn teal">Registrar</button>
                                               </div>
                                               <div class="col s12 right-align m-t-sm">
                                                   <a href="index.php"  class="waves-effect waves-light btn teal">Inicio</a>
                                               </div>
                                           </form>
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

        <!-- Select2 -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

        <script src="assets/js/registro.js"></script>
        
    </body>
</html>