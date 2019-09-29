<?php
session_start();
include ('../clases/class_conexion.php');
$conexion = new Conexion();
$respuesta=[];
//$_POST["idSeccion"]=4;
//$_POST["idPersona"]=29;
$sql = "SELECT * FROM tbl_secciones_has_tbl_estudiantes WHERE tbl_secciones_idsecciones=" . $_POST["idSeccion"] . " AND tbl_estudiantes_idEstudiante = " . $_POST["idPersona"];
$resultado = $conexion->ejecutarInstruccion($sql);
if(mysqli_num_rows($resultado)>=0){
    $sql = "SELECT cupos FROM tbl_secciones WHERE idsecciones=" . $_POST["idSeccion"];
        $resultado = $conexion->ejecutarInstruccion($sql);
        $row = mysqli_fetch_array($resultado);
        $cupos=(int)$row["cupos"]-1;
        if ($cupos>=0){
            $sql = "INSERT INTO `tbl_secciones_has_tbl_estudiantes`(`tbl_secciones_idsecciones`, `tbl_estudiantes_idEstudiante`) VALUES(" . $_POST["idSeccion"] . ",". $_POST["idPersona"] .")";
            $resultado=$conexion->ejecutarInstruccion($sql);
            $seccion=$_POST["idSeccion"];
            $id_estudiante=$_POST["idPersona"];
            $sql = "UPDATE `tbl_secciones` 
                    SET `cupos`=$cupos
                    WHERE idsecciones=$seccion";
            $resultado=$conexion->ejecutarInstruccion($sql);
            $sql_proceso="select a.idprocesos as id from tbl_secciones a  where a.idsecciones=$seccion";
            $resultado=$conexion->ejecutarInstruccion($sql_proceso);
            $id_proceso = mysqli_fetch_array($resultado);
            $id_proceso=$id_proceso["id"];
            $sql_cont_proceso="INSERT INTO `tbl_control_de_procesos`
                               (`porcentaje`, `etapa1`, `etapa2`, `etapa3`, `etapa4`, `idEstudiante`, `idprocesos`) 
                               VALUES (0,0,0,0,0,$id_estudiante,$id_proceso)";
            $conexion->ejecutarInstruccion($sql_cont_proceso);                 
            echo "correcto";
        }else{
            echo "lleno";
        }
    /*INSERT INTO `tbl_control_de_procesos`
(`idcontrolprocesos`, `porcentaje`, `etapa1`, `etapa2`, `etapa3`, `etapa4`, `idEstudiante`, `idprocesos`) 
VALUES ()
where */

}else{
    echo "existe";
}


// echo $_POST["idSeccion"];
// while($datos = mysqli_fetch_array($resultado)){
//        $respuesta[] = $datos;
// }

	
$conexion->cerrarConexion();
?>