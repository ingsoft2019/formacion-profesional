<?php
session_start();
include ('../clases/class_conexion.php');
$conexion = new Conexion();
$respuesta=[];

$sql = "SELECT * FROM tbl_secciones_has_tbl_estudiantes WHERE tbl_secciones_idsecciones=" . $_POST["idSeccion"] . " AND tbl_estudiantes_idEstudiante = " . $_POST["idPersona"];
$resultado = $conexion->ejecutarInstruccion($sql);

if(!mysqli_num_rows($resultado)){

    if(!isset($_POST['consulta'])){
        $sql = "SELECT cupos FROM tbl_secciones WHERE idsecciones=" . $_POST["idSeccion"];
        $resultado = $conexion->ejecutarInstruccion($sql);
    
        $row = mysqli_fetch_array($resultado);
    
        if( (int)$row["cupos"] - 1 <= 0){
            echo json_encode("lleno");
        } else{
            $sql = "INSERT INTO `tbl_secciones_has_tbl_estudiantes`(`tbl_secciones_idsecciones`, `tbl_estudiantes_idEstudiante`) VALUES(" . $_POST["idSeccion"] . ",". $_POST["idPersona"] .")";
            $resultado=$conexion->ejecutarInstruccion($sql);
            echo "correcto";
        }
    }
} else {
    echo "existe";
}

// echo $_POST["idSeccion"];
// while($datos = mysqli_fetch_array($resultado)){
//        $respuesta[] = $datos;
// }

	
$conexion->cerrarConexion();
?>