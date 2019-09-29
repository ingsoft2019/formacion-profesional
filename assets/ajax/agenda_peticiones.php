<?php
session_start();
include ('../clases/class_conexion.php');
include ('../clases/class_email.php');
$conexion = new Conexion();

switch ($_GET["CODIGO_FUNCION"]) {
    case 1:
        date_default_timezone_set( "America/Tegucigalpa" );
        $fechaActual = date("Y-m-d H:m:s");
        $sql = "SELECT idprocesos, CONCAT('Proceso No.', idprocesos) AS proceso FROM tbl_procesos WHERE estado='activo' AND '". $fechaActual ."' BETWEEN fechainicio AND fechafindevuelveresultado;";
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

        $sql = "SELECT COUNT(*) AS cantidad 
        FROM tbl_horarios_orientador_x_tbl_estudiantes AS a
        INNER JOIN tbl_horarios_orientador AS b
        ON a.idhorariosorientador = b.idhorariosorientador
        WHERE idEstudiante = '". $_SESSION["idPersona"] ."' AND b.tipoevento = ". $_GET["evento"] ." AND b.idprocesos = ". $_GET["idprocesos"] ."
        GROUP BY a.idhorariosorientador";
        $resultado = $conexion->ejecutarInstruccion($sql);
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

        $sql = "SELECT concat(nombres,' ',apellidos) AS persona, correo
        FROM tbl_personas
        WHERE idPersona=" . $_SESSION["idPersona"];

        $resultado = $conexion->ejecutarInstruccion($sql);
        $persona = $conexion->obtenerFila($resultado);

        $sql = "SELECT A.fecha, A.h_inicial, concat(B.nombres,' ',B.apellidos) AS orientador
        FROM tbl_horarios_orientador AS A
        INNER JOIN tbl_personas AS B
        ON A.idorientador = B.idPersona
        WHERE idhorariosorientador=" . $_GET["idhorariosorientador"];

        $resultado = $conexion->ejecutarInstruccion($sql);
        $cita = $conexion->obtenerFila($resultado);

        $mensaje = "
            <div style='border: 3px solid indigo; padding: 10px;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;'>
                <div>
                    <img style='width: 34%;height: auto;' src='https://curc.unah.edu.hn/assets/CURC/paginas/voae/VOAE2.png'>
                    <img style='float: right;width: 30%;height: auto;' src='https://www.unah.edu.hn/themes/portalunah/assets/images/logo-unah.png'>
                </div>
                <h4 style='text-align:center; font-size: 30px;color: #1565C0;'>Cita agendada</h4>
                <p style='font-size: 25px;text-align:center;padding:0 10%;'>Usted ha agendado una cita para el día <strong> " . $cita["fecha"] . "</strong> a las <strong>" . $cita["h_inicial"] . "</strong> con el(la) orientador(a) <strong>" . $cita["orientador"] . "</strong>.</p>
                <p>Para obtener más detalles ingrese a la plataforma de <a target='_blank' href='http://localhost/formacion-profesional'>Orientación Profesional</a></p>
            </div>
        ";

        $correo = new Email($persona["correo"], $persona["persona"], "Notificación: Cita agendada", $mensaje);

        echo $correo->enviarCorreo();

        break;
    case 6:
        $idestudiante=$_SESSION["idPersona"];
        $sql="SELECT h.idhorariosorientador AS horariosorientador,fecha, h_inicial,h_final,IF(tipoevento=2,'Entrevista','Entrega de Resultados') as tipoevento,nombres,idprocesos FROM tbl_horarios_orientador_x_tbl_estudiantes AS he
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
            echo json_encode("");
        }
        break;
    case 7:
        $idhorariosorientador=$_GET["idhorariosorientador"];
        $sql="DELETE FROM tbl_horarios_orientador_x_tbl_estudiantes WHERE idhorariosorientador = '$idhorariosorientador'";
        $resultado = $conexion->ejecutarInstruccion($sql);
        echo json_encode($resultado);

    case 8:
        date_default_timezone_set( "America/Tegucigalpa" );
        $fechaActual = date("Y-m-d H:m:s");
        $sql = "SELECT idprocesos, CONCAT('Proceso No.', idprocesos) AS proceso 
                FROM tbl_procesos 
                WHERE estado='activo' 
                AND '". $fechaActual ."' BETWEEN fechainicioentrevista AND fechafinentrevista
                AND '". $fechaActual ."' BETWEEN fechainicio AND fechafindevuelveresultado;";
        $resultado = $conexion->ejecutarInstruccion($sql);
        $cantidadResultados = $conexion->cantidadRegistros($resultado);

        if ($cantidadResultados == 0) {
            $sql = "SELECT idprocesos, CONCAT('Proceso No.', idprocesos) AS proceso 
                FROM tbl_procesos 
                WHERE estado='activo' 
                AND '". $fechaActual ."' BETWEEN fechainiciodevuelveresultado AND fechafindevuelveresultado
                AND '". $fechaActual ."' BETWEEN fechainicio AND fechafindevuelveresultado;";
            $resultado = $conexion->ejecutarInstruccion($sql);
            $cantidadResultados = $conexion->cantidadRegistros($resultado);

            if ($cantidadResultados == 0) {
                echo json_encode(-1);
            } else {
                echo json_encode(3);
            }
        } else {
            echo json_encode(2);
        }
        break;
    default:

        break;
}
$conexion->cerrarConexion();
?>