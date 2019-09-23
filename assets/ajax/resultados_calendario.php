<?php
include ('../clases/class_conexion.php');
session_start();
$conexion = new Conexion();
$sql = "
    SELECT * FROM tbl_resultados  
    WHERE idprocesos = " . $_POST["idProceso"]."
    AND idEstudiante = " . $_POST["idEstudiante"];

    //f.urlPdf
 //INNER JOIN tbl_resultados AS f
 //ON d.idprocesos = f.idprocesos
 //AND b.idEstudiante = f.idEstudiante
$resultado = $conexion->ejecutarInstruccion($sql);
$respuesta = array();

while($fila = mysqli_fetch_assoc($resultado)){
    $respuesta[] = $fila;
}
echo json_encode($respuesta);

//echo $sql;
?>