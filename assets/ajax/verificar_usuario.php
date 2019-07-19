<?php
function verificarUsuario($conexion, $correo,$contrasena){
				$sql = sprintf(
						"SELECT * FROM tbl_personas
						WHERE  correo = '%s' AND contrasena = '%s'",
						$correo,
						$contrasena
					);
				//echo ($sql);
				$resultado = $conexion->ejecutarInstruccion($sql);

				$cantidadRegistros = $conexion->cantidadRegistros($resultado);
				$respuesta=array();
				if ($cantidadRegistros==1){//para ver si estudiante o admin o trabajador buscar en las demas tablas el id persona y crear un id TipoUsuario 0=estudiante, administrador = 1, entrevistador =2, y psicologo=3 
					$fila = $conexion->obtenerFila($resultado);
					$_SESSION["idPersona"] = $fila["idPersona"];
					$_SESSION["correo"] = $fila["correo"];
					$_SESSION["nombre"] = $fila["nombres"];
					$_SESSION["apellido"] = $fila["apellidos"];
					$respuesta["status"]=1;//si tiene acceso o no a la plataforma, si existe o no su registro.
					$respuesta["mensaje"]="Si tiene acceso" ;
				}else{
					$respuesta["status"]=0;
					$respuesta["mensaje"]="No tiene acceso, su correo y contrasena no estan registrados" ;
				}

				echo json_encode($respuesta);
		}
?>