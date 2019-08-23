<?php
session_start();
include ('../clases/class_conexion.php');
$conexion = new Conexion();
$respuesta=[];
//$_POST["id"]=1;
if ($_POST["id"]) {
	$sql = 'select * from tbl_secciones where idprocesos='. $_POST["id"];
	$resultado=$conexion->ejecutarInstruccion($sql);
	while($datos = mysqli_fetch_array($resultado)){
           $respuesta[] = array("idsecciones"=>$datos["idsecciones"],"lugar"=>$datos["lugar"],"horainicial"=>$datos["horainicial"],"horafinal"=>$datos["horafinal"],"cupos"=>$datos["cupos"],"dia"=>$datos["dia"],"idprocesos"=>$datos["idprocesos"]);
    }
    echo json_encode($respuesta);
}

	
$conexion->cerrarConexion();
?>