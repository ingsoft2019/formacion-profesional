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
    case 5:
        $sql = "INSERT INTO `db_formacion`.`tbl_horarios_orientador_x_tbl_estudiantes` ".
                "(`idhorariosorientador`, ".
                "`idEstudiante`) ".
                "VALUES ( ".
                $_GET["idhorariosorientador"].", ".
                $_SESSION["idPersona"].")";
        
        $conexion->ejecutarInstruccion($sql);
        break;
    case 6:
        $idestudiante=$_SESSION["idPersona"];
        $sql="SELECT h.idhorariosorientador AS horariosorientador,fecha, h_inicial,h_final,IF(tipoevento=2,'Entrevista','Entreg de Resultados') as tipoevento,nombres,idprocesos FROM tbl_horarios_orientador_x_tbl_estudiantes AS he
        INNER JOIN tbl_horarios_orientador AS h ON he.idhorariosorientador = h.idhorariosorientador
        INNER JOIN tbl_personas AS p ON p.idpersona = h.idorientador
        WHERE idestudiante='$idestudiante';";
        $resultado = $conexion->ejecutarInstruccion($sql);
        $resultadoProceso = array();
        if($conexion->cantidadRegistros($resultado)>0){
            while($fila = $conexion->obtenerFila($resultado)){
                $resultadoProceso[] = $fila;
            }
            echo json_encode($resultadoProceso);
        }else{
            echo json_encode("Sin datos");
        }
        break;
    case 7:
        $idhorariosorientador=$_GET["idhorariosorientador"];
        $sql="DELETE FROM tbl_horarios_orientador_x_tbl_estudiantes WHERE idhorariosorientador = '$idhorariosorientador'";
        $resultado = $conexion->ejecutarInstruccion($sql);
        echo json_encode($resultado);
    default:

        break;
}
$conexion->cerrarConexion();
?>