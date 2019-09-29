<?php
session_start();
require('assets/clases/class_conexion.php');
include ('../clases/class_email.php');


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

      


      $sql = "SELECT concat(nombres,' ',apellidos) AS persona, correo
      FROM tbl_personas
      WHERE idPersona=" . $_SESSION["idPersona"];

      $resultado = $conexion->ejecutarInstruccion($sql);
      $persona = $conexion->obtenerFila($resultado);

      $mensaje = "
          <div style='border: 3px solid indigo; padding: 10px;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;'>
              <div>
                  <img style='width: 34%;height: auto;' src='https://curc.unah.edu.hn/assets/CURC/paginas/voae/VOAE2.png'>
                  <img style='float: right;width: 30%;height: auto;' src='https://www.unah.edu.hn/themes/portalunah/assets/images/logo-unah.png'>
              </div>
              <h4 style='text-align:center; font-size: 30px;color: #1565C0;'>Publicación de resultados</h4>
              <p style='font-size: 25px;text-align:center;padding:0 10%;'>Se han subido los resultados de su proceso de orientación profesional, ingrese a la plataforma de <a target='_blank' href='http://localhost/formacion-profesional'>Orientación Profesional</a> para descargarlos</p>
          </div>
      ";

      $correo = new Email($persona["correo"], $persona["persona"], "Notificación: Publicación de resultados", $mensaje);

      echo $correo->enviarCorreo();

      
    }
  }
  echo "<script> window.location='subir_resultados.php'; </script>";
}
?>