<?php

    require('clases/class_conexion.php');
    $mysql = new Conexion();
    $query=$mysql->ejecutarInstruccion("SELECT idCarrera,nombreCarrera FROM tbl_carreras ORDER BY idCarrera ASC");
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
        <link href="styles.css" rel="stylesheet">
        
        
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
                          <div class="col s12 m6 l4 offset-l4 offset-m3">
                              <div class="card white darken-1">
                                  <div class="card-content ">
                                      <span class="card-title">Registro</span>
                                       <div class="row">
                                           <form class="col s12" method="POST" action="envio_registro.php">
                                               <div class="input-field col s12">
                                                   <input name="nombres" type="text" class="validate">
                                                   <label for="nombres">Nombres</label>
                                               </div>
                                               <div class="input-field col s12">
                                                    <input name="apellidos" type="text" class="validate">
                                                    <label for="apellidos">Apellidos</label>
                                                </div>
                                                <div class="input-field col s12">
                                                <select name="genero">
                                                    <option value="" disabled selected>Seleccione una opción</option>
                                                    <option value="1">Femenino</option>
                                                    <option value="2">Masculino</option>
                                                </select>
                                                <label>Grenero</label>
                                                </div>
                                                <div class="input-field col s12">
                                                        <input name="id" type="text" class="validate">
                                                        <label for="id">No. Identidad</label>
                                                </div>
                                                <div class="input-field col s12">
                                                        <input name="cuenta" type="text" class="validate">
                                                        <label for="cuenta">No. Cuenta</label>
                                                </div>
                                                <div class="input-field col s12">
                                                        <input name="numero" type="text" class="validate">
                                                        <label for="numero">Celular o Telefono</label>
                                                </div>
                                                <div class="input-field col s12">
                                                        <select name="carrera">
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
                                                        <label>Carrera Universitaria</label>
                                                </div>
                                               <div class="input-field col s12">
                                                   <input name="email" type="email" class="validate">
                                                   <label for="email">Correo</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input name="password" type="password" class="validate">
                                                   <label for="password">Contraseña</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input name="password2" type="password" class="validate">
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
        <script src="assets/js/alpha.min.js"></script>
        
    </body>
</html>