<?php
function verificarUsuario($conexion, $correo,$contrasena){
				$sql = sprintf("SELECT * FROM tbl_personas LEFT JOIN tbl_personas_has_tbl_tipousuario on idPersona = tbl_personas_idPersona WHERE  correo = '%s' AND contrasena = MD5('%s')", $correo, $contrasena);
				//echo ($sql);
				$resultado = $conexion->ejecutarInstruccion($sql);
				$cantidadRegistros = $conexion->cantidadRegistros($resultado);
				$respuesta=array();
				if ($cantidadRegistros==1){//para ver si estudiante o admin o trabajador buscar en las demas tablas el id persona y crear un id TipoUsuario 0=estudiante, administrador = 1, entrevistador =2, y psicologo=3 
					$fila = $conexion->obtenerFila($resultado);
					$_SESSION["idPersona"] = $fila["idPersona"];
					$_SESSION["correo"] = $fila["correo"];
					$_SESSION["nombre"] = $fila["nombres"];
					$_SESSION["contrasena"] = $fila["contrasena"];
					$_SESSION["fotoPerfil"] = $fila["fotoPerfil"];
					$_SESSION["idTipoUsuario"] = $fila["tbl_tipousuario_idtipousuario"];
					$_SESSION["genero"] = $fila["idGenero"];
					$respuesta["status"]=1;//si tiene acceso o no a la plataforma, si existe o no su registro.
					$respuesta["mensaje"]="Si tiene acceso, sera redireccionado" ;
					if($fila["estadocuenta"]==0){
						$respuesta["status"]=0;//si tiene acceso o no a la plataforma, si existe o no su registro.
						$respuesta["mensaje"]="Su usuario ha sido eliminado, presentarse a las oficinas de VOAE" ;
					}
				}else if($cantidadRegistros==2) {
					$resultado = $conexion->ejecutarInstruccion("SELECT * FROM tbl_personas 
					LEFT JOIN tbl_personas_has_tbl_tipousuario on idPersona = tbl_personas_idPersona 
					WHERE  correo = '$correo' AND contrasena = MD5('$contrasena')
					group by idpersona");
					$fila = $conexion->obtenerFila($resultado);
					$_SESSION["idPersona"] = $fila["idPersona"];
					$_SESSION["correo"] = $fila["correo"];
					$_SESSION["nombre"] = $fila["nombres"];
					$_SESSION["contrasena"] = $fila["contrasena"];
					$_SESSION["fotoPerfil"] = $fila["fotoPerfil"];
					$_SESSION["genero"] = $fila["idGenero"];
					$_SESSION["idTipoUsuario"] = 2;
					$_SESSION["idTipoUsuario2"] = 3;
					$respuesta["status"]=1;//si tiene acceso o no a la plataforma, si existe o no su registro.
					$respuesta["mensaje"]="Si tiene acceso, sera redireccionado" ;
					if($fila["estadocuenta"]==0){
						$respuesta["status"]=0;//si tiene acceso o no a la plataforma, si existe o no su registro.
						$respuesta["mensaje"]="Su usuario ha sido eliminado, presentarse a las oficinas de VOAE para rectificar su estado." ;
					}
				}else{
					$respuesta["status"]=0;
					$respuesta["mensaje"]="No tiene acceso; por favor verifique que su correo y contraseña sean correctos" ;
				}

				

				echo json_encode($respuesta);
		}
?>