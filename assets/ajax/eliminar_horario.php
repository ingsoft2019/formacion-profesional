<?php
include ('../clases/class_conexion.php');
$conexion = new Conexion();
$codigohorario= $_POST["codigohorario"];
$sql0="SELECT idhorariosorientador FROM tbl_horarios_orientador WHERE codigohorario = '$codigohorario';";
$resultado= $conexion->ejecutarInstruccion($sql0);
$idhorariosorientador = $conexion->obtenerFila($resultado);

$id=(int)$idhorariosorientador["idhorariosorientador"];


$sql="DELETE FROM tbl_horarios_orientador WHERE idhorariosorientador = '$id';";
$result=$conexion->ejecutarInstruccion($sql);
if(!$result){
    $resultado2=$conexion->ejecutarInstruccion("SELECT * FROM tbl_horarios_orientador_x_tbl_estudiantes WHERE idhorariosorientador = '$id';");
    if ($conexion->cantidadRegistros($resultado2)>0) {
        echo json_encode("Error, existen citas en este horario, no se puede eliminar.");
    }else{
        echo json_encode("Error de sistema. espere un momento");
    }
}else{
    echo json_encode("Borrado exitoso.");
}
$conexion->cerrarConexion();
?>