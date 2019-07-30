<?php
session_start();
include ('../clases/class_conexion.php');
$conexion = new Conexion();
$respuesta = array();
$resultado["codigo_resultado"]=1;
$resultado["mensaje"]="Información Actualiza.";

switch ($_GET["CODIGO_FUNCION"]) {
	case 1:
			$sql = sprintf("select * from tbl_personas inner join ".
				   "tbl_estudiantes on idPersona = idEstudiante ".
				   "where idEstudiante = %s", $_SESSION["idPersona"]);
			$resultado = $conexion->ejecutarInstruccion($sql);
            $resultadoUsuarios = array();
            while($fila = $conexion->obtenerFila($resultado)){
                $resultadoUsuarios[] = $fila;
            }
        	echo json_encode($resultadoUsuarios);
		break;
	case 2:
			$sql = "select * from tbl_carreras";
			$resultado = $conexion->ejecutarInstruccion($sql);
            $resultadoUsuarios = array();
            while($fila = $conexion->obtenerFila($resultado)){
                $resultadoUsuarios[] = $fila;
            }
        	echo json_encode($resultadoUsuarios);
		break;	
	case 3:
			$nuevoCelular1 =str_replace("-", "", $_GET["celular"]);	
			$nuevoCelular =str_replace("(504) ", "",$nuevoCelular1 );  
		    $nuevaIdentidad =str_replace("-", "", $_GET["no_identidad"]);
			$nueva_contrasena = $_GET["contrasena"];
			$contrasena_actual = $_GET["contrasena_actual"];
			$cuenta = $_GET["cuenta"];
			$correo = $_GET["correo"];


			
			if(!empty($nueva_contrasena) && MD5($contrasena_actual) != $_SESSION["contrasena"]){
				$resultado["codigo_resultado"]=0;
				$resultado["mensaje"]="La contraseña actual es incorrecta.";
				echo json_encode($resultado);
				break;
			}

			if(empty($nueva_contrasena)){
				$nueva_contrasena = $_SESSION["contrasena"];
			}else{
				$nueva_contrasena = Md5($nueva_contrasena);
			}

			
			
			$sql = sprintf(
				"SELECT * FROM tbl_personas
				WHERE  no_identidad = '%s' AND idPersona <> %s",
				$nuevaIdentidad,
				$_SESSION["idPersona"]
			);			
			$resultadoQuery = $conexion->ejecutarInstruccion($sql);
			$cantidadRegistros = $conexion->cantidadRegistros($resultadoQuery);
			if ($cantidadRegistros==1){
				$resultado["codigo_resultado"]=0;
				$resultado["mensaje"]="Ocurrió un error. El no. de identidad ingresado ya está siendo utilizado por otro usuario. Debe visitar las oficinas de VOAE.";
				echo json_encode($resultado);
				break;
			}


			$sql = sprintf(
				"SELECT * FROM tbl_personas
				WHERE  correo = '%s' AND idPersona <> %s",
				$correo,
				$_SESSION["idPersona"]
			);			
			$resultadoQuery = $conexion->ejecutarInstruccion($sql);
			$cantidadRegistros = $conexion->cantidadRegistros($resultadoQuery);
			if ($cantidadRegistros==1){
				$resultado["codigo_resultado"]=0;
				$resultado["mensaje"]="Ocurrió un error. El correo ingresado ya está siendo utilizado por otro usuario. Debe visitar las oficinas de VOAE.";
				echo json_encode($resultado);
				break;
			}



			$sql = sprintf(
				"SELECT * FROM tbl_estudiantes
				WHERE  no_cuenta = '%s' AND idEstudiante <> %s",
				$cuenta,
				$_SESSION["idPersona"]
			);			
			$resultadoQuery = $conexion->ejecutarInstruccion($sql);
			$cantidadRegistros = $conexion->cantidadRegistros($resultadoQuery);
			if ($cantidadRegistros==1){
				$resultado["codigo_resultado"]=0;
				$resultado["mensaje"]="Ocurrió un error. El no. de cuenta ingresado ya está siendo utilizado por otro usuario. Debe visitar las oficinas de VOAE.";
				echo json_encode($resultado);
				break;
			}


			
		    
			$sql1 = sprintf("UPDATE tbl_personas SET ". 
							"nombres = '%s', ".
					        "apellidos = '%s', ".
					        "correo = '%s', ".
					        "contrasena= '%s', ".
					        "celular = %s, ".
					        "no_identidad = '%s' ".
					        "WHERE idPersona = %s ",
					    	$_GET["nombres"],$_GET["apellidos"],
					    	$_GET["correo"],$nueva_contrasena,
					    	$nuevoCelular,$nuevaIdentidad,
					    	$_SESSION["idPersona"]
						);
						
			$_SESSION["contrasena"] = $nueva_contrasena;
			$_SESSION["nombre"] = $_GET["nombres"];
			$resultado["nombreActualizado"]=$_GET["nombres"];

			$pruebaIdCarrera = $_GET["idcarrera"];
			$sql2="";
			if ( ! empty($pruebaIdCarrera)) {
                $sql2 = sprintf("UPDATE tbl_estudiantes SET no_cuenta = %s, idCarrera = %s  WHERE idEstudiante = %s",
							$_GET["cuenta"],$_GET["idCarrera"],$_SESSION["idPersona"]);            }
            else{
                $sql2 = sprintf("UPDATE tbl_estudiantes SET no_cuenta = %s WHERE idEstudiante = %s",
							$_GET["cuenta"],$_SESSION["idPersona"]);
            }
		    $conexion->ejecutarInstruccion($sql1);
		    $conexion->ejecutarInstruccion($sql2);            
			//echo "se actualizo exitosamente ".$sql1.$sql2;
			echo json_encode($resultado);
		break;		

	
	default:
		# code...
		break;
}
	

            $conexion->cerrarConexion();


            

?>