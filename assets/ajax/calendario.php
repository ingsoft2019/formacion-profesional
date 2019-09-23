<?php
include ('../clases/class_conexion.php');
session_start();
$conexion = new Conexion();
$sql = "
    SELECT a.idhorariosorientador as id, a.fecha, a.tipoevento, a.h_inicial, a.h_final, a.idprocesos, c.idPersona, c.nombres, c.apellidos, c.celular, c.no_identidad, d.fechainicio, d.fechafindevuelveresultado, e.idcontrolprocesos, e.etapa3, e.etapa4, e.porcentaje
    FROM tbl_Horarios_Orientador AS a
    INNER JOIN tbl_Horarios_Orientador_X_tbl_estudiantes AS b
    ON a.idhorariosorientador = b.idhorariosorientador
    INNER JOIN tbl_personas AS c
    ON b.idEstudiante = c.idPersona
    INNER JOIN tbl_procesos AS d
    ON d.idprocesos = a.idprocesos
    INNER JOIN tbl_control_de_procesos AS e
    ON d.idprocesos = e.idprocesos    
    WHERE e.idEstudiante = b.idEstudiante    
    AND a.idorientador = " . $_POST["id-orientador"];

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