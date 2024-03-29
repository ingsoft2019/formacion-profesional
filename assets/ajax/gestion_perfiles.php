<?php
require('../clases/class_conexion.php');
$conexion = new Conexion();
$respuesta = array();

if (isset($_POST["id"])) {
	if (isset($_GET["accion"])) {
		switch ($_GET["accion"]){
			case "update":
				$id = $_POST["id"];
				$string_Funciones = $_POST["funcion"]; 
				$array_Funciones = explode (",", $string_Funciones); 
				$resultadEliminar=$query=$conexion->ejecutarInstruccion("DELETE FROM tbl_personas_has_tbl_tipousuario where tbl_personas_idPersona = ".$_POST["id"]);
				//sleep(300);
				for ($i = 0; $i < count($array_Funciones); $i++) {
					$conexion->ejecutarInstruccion("INSERT INTO tbl_personas_has_tbl_tipousuario(tbl_personas_idPersona, tbl_tipousuario_idtipousuario) VALUES ('$id','$array_Funciones[$i]')");
				}

				$respuesta["funcion"] = $array_Funciones;
				$respuesta["id"] = $_POST["id"];
				echo json_encode($respuesta);
				break;
			case "delete":
				$resultadoUsuarios=$query=$conexion->ejecutarInstruccion("UPDATE tbl_personas SET estadocuenta = 0 WHERE idpersona = ".$_POST["id"]);
				break;
			default:
				break;
		}		
    } else if (isset($_GET["tipos"])) {
        $query = $conexion->ejecutarInstruccion("SELECT tbl_tipousuario_idtipousuario as tipos FROM tbl_personas_has_tbl_tipousuario where tbl_personas_idPersona=".$_POST["id"]);
        
        while($datos = mysqli_fetch_array($query)){
            $respuesta[] = $datos;
        }
        echo json_encode($respuesta);
	}else{
		$query=$conexion->ejecutarInstruccion("SELECT a.idPersona as ID , a.no_identidad as Identidad,a.nombres as Nombre,' ',a.apellidos as Apellidos,x.nombreCarrera as Carrera,a.correo as Correo,a.celular as Celular, d.descripcion as TipoUsuario,b.no_cuenta as Cuenta 
			FROM tbl_personas a 
			left join tbl_estudiantes b on a.idPersona=b.idEstudiante 
			left join tbl_carreras x on b.idEstudiante=x.idCarrera 
			left join tbl_personas_has_tbl_tipousuario c on a.idPersona = c.tbl_personas_idPersona 
			left join tbl_tipousuario d on c.tbl_tipousuario_idtipousuario=d.idtipousuario 
			where a.idPersona=".$_POST["id"]." ORDER BY ID ASC");
     
            $datos =$conexion->obtenerFila($query);
            $resultadoUsuarios= array("ID"=>$datos["ID"],"Identidad"=>$datos["Identidad"],"Nombre"=>$datos["Nombre"],"Apellidos"=>$datos["Apellidos"],"Carrera"=>$datos["Carrera"],"Correo"=>$datos["Correo"],"Celular"=>$datos["Celular"],"TipoUsuario"=>$datos["TipoUsuario"],"Cuenta"=>$datos["Cuenta"]);
            echo json_encode($resultadoUsuarios);
	}
	 
}
$conexion->cerrarConexion();
?>