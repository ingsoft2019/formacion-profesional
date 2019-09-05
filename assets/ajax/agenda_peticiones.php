<?php
session_start();
include ('../clases/class_conexion.php');
$conexion = new Conexion();

switch ($_GET["CODIGO_FUNCION"]) {
    case 1:
        $sql = "SELECT idprocesos, CONCAT('Proceso No.', idprocesos) AS proceso FROM tbl_procesos WHERE estado='activo';";
        $resultado = $conexion->ejecutarInstruccion($sql);
        $resultadoProceso = array();
        while($fila = $conexion->obtenerFila($resultado)){
            $resultadoProceso[] = $fila;
        }
        echo json_encode($resultadoProceso);
        break;
    case 2:
        $idproceso=$_GET["idproceso"];
        $tipoevento=$_GET["tipoevento"];
        $sql = "SELECT idorientador,concat(nombres,' ',apellidos) AS orientador FROM tbl_horarios_orientador
        INNER JOIN tbl_personas ON idpersona=idorientador
        WHERE idprocesos='$idproceso' AND tipoevento='$tipoevento'
        GROUP BY idorientador;";
        $resultado = $conexion->ejecutarInstruccion($sql);
        $resultadoProceso = array();
        while($fila = $conexion->obtenerFila($resultado)){
            $resultadoProceso[] = $fila;
        }
        echo json_encode($resultadoProceso);
        break;
    case 3:
        $idproceso=$_GET["idproceso"];
        $tipoevento=$_GET["tipoevento"];
        $orientador=$_GET["orientador"];
        $sql = "SELECT idhorariosorientador,fecha FROM tbl_horarios_orientador
        WHERE idprocesos='$idproceso' AND tipoevento='$tipoevento' AND idorientador='$orientador';";
        $resultado = $conexion->ejecutarInstruccion($sql);
        $resultadoProceso = array();
        while($fila = $conexion->obtenerFila($resultado)){
            $resultadoProceso[] = $fila;
        }
        echo json_encode($resultadoProceso);
        break;
    case 4:
        $idhorariosorientador=$_GET["idhorariosorientador"];
        $sql = "SELECT h_inicial,h_final FROM tbl_horarios_orientador
        WHERE idhorariosorientador = '$idhorariosorientador'
        group BY idhorariosorientador";
        $resultado = $conexion->ejecutarInstruccion($sql);
        $resultadoProceso = array();
        while($fila = $conexion->obtenerFila($resultado)){
            $resultadoProceso[] = $fila;
        }
        echo json_encode($resultadoProceso);
        break;
    default:

        break;
}
$conexion->cerrarConexion();
?>