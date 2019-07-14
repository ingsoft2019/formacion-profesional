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
                          <div class="col s12 m6 l4 offset-l4 offset-m3">
                              <div class="card white darken-1">
                                  <div class="card-content ">
                                      <span class="card-title">Registro Terminado</span>
                                       <div class="row">
                                           <form class="col s12" method="POST" action="envio_registro.php">
                                           <?php
                                                require('clases/class_conexion.php');
                                                $mysql = new Conexion();
                                                if(!empty($_POST['carrera'])&&!empty($_POST['genero'])){
                                                    $carr=$_POST['carrera'];
                                                    $genero=$_POST['genero'];
                                                }
                                                $nombre=$_POST['nombres'];
                                                $apellidos=$_POST['apellidos'];
                                                $idp=$_POST['identidad'];
                                                $cuenta=$_POST['cuenta'];
                                                $numero=$_POST['telefono'];
                                                $email=$_POST['email'];
                                                $pass=$_POST['password2'];
                                                
                                                if (empty($_POST['nombres']) || empty($_POST['apellidos']) || empty($_POST['identidad']) || empty($_POST['cuenta']) || empty($_POST['telefono'])|| empty($_POST['carrera']) || empty($_POST['email']) || empty($_POST['password'])|| empty($_POST['password2'])){
                                                    echo "<h5>No pueden haber campos vacios</h5>"."<br>";
                                                    echo"<img src= 'assets/images/nega-check.png'>"."<br>";
                                                    echo "<a href='registro.php'class='waves-effect waves-light btn teal'>Volver a Registro</a>"."<br>";
                                                    echo "<a href='index.php' class='waves-effect waves-light btn teal'>Inicio</a>";
                                                    
                                                }else{
                                                    if($_POST['password']!=$_POST['password2']){
                                                        echo "<h5>Las contraseñas no concuerdan<h5>"."<br>";
                                                        echo"<img src= 'assets/images/nega-check.pgn'>";
                                                        echo "<a href='registro.php' class='waves-effect waves-light btn teal'>Volver a Registro</a>"."<br>";
                                                        echo "<a href='index.php' class='waves-effect waves-light btn teal'>Inicio</a>";
                                                    }else{
                                                        try{
                                                        $query=$mysql->ejecutarInstruccion("SELECT idcarrera from tbl_carreras where nombreCarrera ='$carr'");
                                                        $query1=$mysql->ejecutarInstruccion("SELECT idpersona from tbl_personas ORDER BY idPersona DESC LIMIT 1;");
                                                        $idc= mysqli_fetch_array($query);
                                                        $uid=mysqli_fetch_array($query1);
                                                        $id=(string)((int)$uid['idpersona']+1);
                                                        $idcc=(string)$idc['idcarrera'];
                                                        $idp = str_replace("-", "", $idp);
                                                        $numero = str_replace("-", "", $numero);
                                                        $numero = str_replace(" ", "", $numero);
                                                        $numero = substr($numero, 5);
                                                        $mysql->ejecutarInstruccion("INSERT INTO tbl_personas(idPersona,idGenero,nombres,apellidos,correo,contrasena,celular,no_identidad ) VALUES ('$id','$genero','$nombre','$apellidos','$email','$pass','$numero','$idp')");
                                                        $mysql->ejecutarInstruccion("INSERT INTO tbl_estudiantes(idEstudiante,no_cuenta,idCarrera)VALUES('$id','$cuenta','$idcc')");
                                                        echo "<h1>Registro con exito</h1>"."<br>";
                                                        echo"<img src= 'assets/images/check.png'>"."<br>";
                                                        echo "<a href='index.php' class='waves-effect waves-light btn teal'>Inicio</a>";
                                                        }catch(Exception $e){
                                                            echo $e->getMessage();
                                                        }
                                                    }
                                                }
                                            ?>
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