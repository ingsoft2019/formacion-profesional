<?php
session_start();
include ('../clases/class_conexion.php');
$conexion = new Conexion();
$respuesta=[];

$sql = "INSERT INTO `tbl_secciones_has_tbl_estudiantes`(`tbl_secciones_idsecciones`, `tbl_estudiantes_idEstudiante`) VALUES(" . $_POST["idSeccion"] . ",". $_POST["idPersona"] .")";
echo $_POST["idSeccion"];
$resultado=$conexion->ejecutarInstruccion($sql);
// while($datos = mysqli_fetch_array($resultado)){
//        $respuesta[] = $datos;
// }
echo json_encode($sql);

	
$conexion->cerrarConexion();
?>