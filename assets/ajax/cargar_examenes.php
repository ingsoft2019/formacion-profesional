<?php 
include ('../clases/class_conexion.php');
$conexion = new Conexion();
session_start();
date_default_timezone_set( "America/Tegucigalpa" );
$fechaActual = date("Y-m-d H:m:s");

$sql=   "SELECT `tbl_procesos`.`idprocesos`, ".
            "`tbl_procesos`.`urltestlinea1`, ".
            "`tbl_procesos`.`urltestline2`, ".
            "`tbl_procesos`.`clavetest` ".
        "FROM `db_formacion`.`tbl_procesos` ".
        "WHERE idprocesos IN ( ".
            "SELECT `tbl_secciones`.`idprocesos` ".
            "FROM `db_formacion`.`tbl_secciones` ".
            "WHERE idsecciones IN ( ".
                "SELECT `tbl_secciones_has_tbl_estudiantes`.`tbl_secciones_idsecciones` ".
                "FROM `db_formacion`.`tbl_secciones_has_tbl_estudiantes` ".
                "WHERE tbl_estudiantes_idEstudiante =".$_SESSION["idPersona"] .
        ")) AND '".$fechaActual."' BETWEEN `fechainiciotestlinea` AND `fechafinaltestlinea`";

        $resultado = $conexion->ejecutarInstruccion($sql);
            $proceso = array();
            while($fila = $conexion->obtenerFila($resultado)){
                $proceso[] = $fila;
            }
            echo json_encode($proceso);
            //echo $sql;
 
?>


