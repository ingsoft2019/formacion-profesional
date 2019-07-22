<?php
session_start();
include ('../clases/class_conexion.php');
$conexion = new Conexion();
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
		    $prueba = $_GET["contrasena"];
		    $nueva_contrasena="";
		    if ( ! empty($prueba)) {
                $nueva_contrasena=$_GET["contrasena"];
            }
            else{
                $nueva_contrasena=$_SESSION["contrasena"];
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
			$sql2 = sprintf("UPDATE tbl_estudiantes SET no_cuenta = %s, idCarrera = %s  WHERE idEstudiante = %s",
							$_GET["cuenta"],$_GET["idCarrera"],$_SESSION["idPersona"]);
		    $conexion->ejecutarInstruccion($sql1);
		    $conexion->ejecutarInstruccion($sql2);            
        	echo "se actualizo exitosamente ".$sql1.$sql2;
		break;		

	
	default:
		# code...
		break;
}
	

            $conexion->cerrarConexion();


            

?>