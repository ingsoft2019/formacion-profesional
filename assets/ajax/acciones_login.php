	<?php
	session_start();//crear una sesion
	switch ($_GET["accion"]) {
		case 'login': 
			include_once("../clases/class_conexion.php");
			include_once("verificar_usuario.php");
			$conexion = new Conexion();
			verificarUsuario($conexion,$_GET["inputEmail"],sha1($_GET["inputPassword"]));
			break;
	default:
			
			break;
	}
	
?>