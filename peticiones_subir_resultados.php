<?php
session_start();
require('assets/clases/class_conexion.php');

$orientador=$_SESSION["idPersona"];
$conexion = new Conexion();

if(isset($_GET["CODIGO_FUNCION"])){
  switch ($_GET["CODIGO_FUNCION"]) {
    case 1:
      $resultado=$conexion->ejecutarInstruccion("SELECT * FROM tbl_resultados WHERE idorientador = '$orientador'");
      $resultadoProceso = array();
      while($fila = $conexion->obtenerFila($resultado)){
          $resultadoProceso[] = $fila;
      }
      echo json_encode($resultadoProceso);
      break;
    case 2:
      $estudiante=$_GET["idestudiante"];
      $proceso=$_GET["idproceso"];
      $resultado=$conexion->ejecutarInstruccion("SELECT urlpdf FROM tbl_resultados WHERE idestudiante = '$estudiante' AND idprocesos = '$proceso'");
      $resultadoProceso = $conexion->obtenerFila($resultado);
      if (unlink($resultadoProceso["urlpdf"])) {
        $resultado1=$conexion->ejecutarInstruccion("DELETE FROM tbl_resultados WHERE idestudiante = '$estudiante' and idprocesos = '$proceso'");
        if ($resultado1>0) {
          echo json_encode("Borrado exitoso.");
        }else {
          echo json_encode("Error, al borrar el registro.");
        }
      }else {
        echo json_encode("Error, en el servidor.");
      }
      break;
    case 3:
      $estudiante=$_GET["idestudiante"];
      $proceso=$_GET["idproceso"];
      $resultado=$conexion->ejecutarInstruccion("SELECT urlpdf FROM tbl_resultados WHERE idestudiante = '$estudiante' AND idprocesos = '$proceso'");
      $resultadoProceso = $conexion->obtenerFila($resultado);
      echo json_encode($resultadoProceso["urlpdf"]);
      break;
  }
}else if(isset($_FILES["archivo"])){
  if($_FILES["archivo"]["type"]=="application/pdf"){
    $proceso=$_POST["proceso"];
    $estudiante=$_POST["id"];
    $existe=$conexion->ejecutarInstruccion("SELECT * FROM tbl_resultados WHERE idestudiante = '$estudiante' AND idprocesos = '$proceso';");
    if($conexion->cantidadRegistros($existe)==0){
      $clave= date(DATE_ATOM);
      $clave=str_replace("-","",$clave);
      $clave=str_replace(":","",$clave);
      $clave=str_replace("+","",$clave);
      $carpeta="resultados/";
      opendir($carpeta);
      $destino=$carpeta.$estudiante."_".$proceso."_".$clave.".pdf";
      copy($_FILES["archivo"]["tmp_name"],$destino);
      $query="SELECT idresultados +1 as id from tbl_resultados ORDER BY idresultados DESC LIMIT 1;";
      $id=$conexion->ejecutarInstruccion($query);
      $id=$conexion->obtenerFila($id);
      $id=$id["id"];
      
      $conexion->ejecutarInstruccion("INSERT INTO tbl_resultados (idResultados,urlPdf,FechaModificacion,idprocesos,idEstudiante,idorientador) 
      VALUES('$id','$destino',now(),'$proceso','$estudiante','$orientador');");
      
    }
  }
  echo "<script> window.location='subir_resultados.php'; </script>";
}
?>