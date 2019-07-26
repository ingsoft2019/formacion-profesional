<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>VOAE | Iniciar sesión</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        	
        <!-- Theme Styles -->
        <!--link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/-->
        <link href="assets/css/registro.css" rel="stylesheet">
        <link href="assets/css/login.css" rel="stylesheet">
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
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
        <div class="mn-content valign-wrapper">
            <main class="mn-inner container">
                <div class="valign">
                      <div class="row">
                          <div class="col s12 m8 l6 offset-l3 offset m9">
                            <br><br><br><br><br>
                              <div class="card white darken-1">
                                  <div class="card-content ">
                                      <span class="card-title">Iniciar sesión</span>
                                       <div class="row">
                                           <div class="col s12">
                                               <div class="input-field col s12">
                                                   <input id="inputEmail" type="email" class="validate" placeholder="">
                                                   <label for="email">Correo Institucional</label>
                                               </div>

                                               <div class="input-field col s12">
                                                   <input id="inputPassword" type="password" class="validate" placeholder="">
                                                   <label for="password">Contraseña</label>
                                               </div>
                                                <div>
                                                   <div class="col s12 left-align m-t-sm">
                                                   <button id="btn-registrar" onclick="location.href='registro.php'" class="waves-effect waves-light btn teal" role=button>Ir Registro</button>                                            
                                                   <button id="btn-login" class="waves-effect waves-light btn teal" role=button>Entrar</button>
                                               
                                                  
                                               </div>
                                             
                                               
                                               <div class=" col s12" id="resultado"></div>

                                              
                                           </div>

                                      </div>
                                  </div>
                              </div>
                          </div>
                    </div>
                </div>
            </main>
        </div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
        <script src="assets\plugins\prettify\prettify.js"></script>
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/js/controlador-login.js"></script>
        <!--<script src="assets/js/alpha.min.js"></script -->
        
    </body>
</html>