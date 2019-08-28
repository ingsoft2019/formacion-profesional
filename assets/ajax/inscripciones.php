<?php
session_start();
include ('../clases/class_conexion.php');
$conexion = new Conexion();
$respuesta=[];
//$_POST["id"]=1;
if ($_POST["id"]) {
	$sql = 'select tbl_secciones.*, 
                (SELECT COUNT(*) 
                FROM tbl_secciones_has_tbl_estudiantes 
                WHERE tbl_secciones_has_tbl_estudiantes.tbl_secciones_idsecciones = '.$_POST['id'].'
                and tbl_secciones_has_tbl_estudiantes.tbl_estudiantes_idEstudiante = '.$_POST['idEstudiante'].') as Matriculado
            from tbl_secciones
            where tbl_secciones.idprocesos = '. $_POST["id"];
	$resultado=$conexion->ejecutarInstruccion($sql);
	while($datos = mysqli_fetch_array($resultado)){
           $respuesta[] = array("idsecciones"=>$datos["idsecciones"],"lugar"=>$datos["lugar"],"horainicial"=>$datos["horainicial"],"horafinal"=>$datos["horafinal"],"cupos"=>$datos["cupos"],"dia"=>$datos["dia"],"idprocesos"=>$datos["idprocesos"],"matriculado"=>$datos["Matriculado"]);
    }
    echo json_encode($respuesta);
}

	
$conexion->cerrarConexion();
?>