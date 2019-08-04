<?php
	include ('../clases/class_conexion.php');
	$conexion = new Conexion();
/*	
FORMATO DE DATOS 
---------------secciones------------------
dia0=Agosto 20, 2019&Hora_Inicial0=02:00 PM&Hora_final0=03:00 PM&Lugar0=n&Cupos0=7&idSeccion0=201973162745976


&dia1=Mie 21, Ago 2019&Hora_Inicial1=03:00 PM&Hora_final1=03:00 PM&Lugar1=k&Cupos1=17&idSeccion1=20197316284974&
cantidadProcesosGuardar=1

---------------procesos-------------------
&fecha_inicio_incripcion=2019-08-21fecha_fin_incripcion=2019-08-28


&fecha_inicio_test=2019-08-07&fecha_fin_test=2019-08-21&
url_test_vocacional=https://app.schoology.com/assignment/2155340585/info&
url_test_personalidad=https://www.geeksforgeeks.org/php-converting-string-to-date-and-datetime/&
clave_acceso=NOWJCWE98


&fecha_inicio_entrev=2019-08-21&fecha_fin_entrev=2019-08-13&

fecha_inicio_devoluc=2019-08-14&fecha_fin_devoluc=2019-08-27*/
	$numero_procesos_nuevos = $_GET['cantidadProcesosGuardar'];

	$fecha_inicio_incripcion = $_GET['fecha_inicio_incripcion'];
	$fecha_fin_incripcion = $_GET['fecha_fin_incripcion'];

	$fecha_inicio_test = $_GET['fecha_inicio_test'];
	$fecha_fin_test = $_GET['fecha_fin_test'];
	$url_test_vocacional = $_GET['url_test_vocacional'];
	$url_test_personalidad = $_GET['url_test_personalidad'];
	$clave_acceso = $_GET['fecha_inicio_incripcion'];

	$fecha_inicio_entrev = $_GET['fecha_inicio_entrev'];
	$fecha_fin_entrev = $_GET['fecha_fin_entrev'];

	$fecha_inicio_devoluc = $_GET['fecha_inicio_devoluc'];
	$fecha_fin_devoluc = $_GET['fecha_fin_devoluc'];


/*_____________________obtener ultimo id proceso_________________________*/
     
    $resultado= $conexion->ejecutarInstruccion(
    						"select idprocesos from tbl_procesos ".
 							"order by idprocesos desc ".
 							"limit 1"
    						);
    $id = $conexion->obtenerFila($resultado);
    $idUltimoproceso=$id[0];
    $idUltimoproceso++;
/*_____________________Guardar______________________________________
$fecha_inicio_incripcion = $_GET['fecha_inicio_incripcion'];
$fecha_fin_incripcion = $_GET['fecha_fin_incripcion'];

$fecha_inicio_test = $_GET['fecha_inicio_test'];
$fecha_fin_test = $_GET['fecha_fin_test'];
$url_test_vocacional = $_GET['url_test_vocacional'];
$url_test_personalidad = $_GET['url_test_personalidad'];
$clave_acceso = $_GET['fecha_inicio_incripcion'];

$fecha_inicio_entrev = $_GET['fecha_inicio_entrev'];
$fecha_fin_entrev = $_GET['fecha_fin_entrev'];

$fecha_inicio_devoluc = $_GET['fecha_inicio_devoluc'];
$fecha_fin_devoluc = $_GET['fecha_fin_devoluc'];_______________________*/
/*________________________Guardar las etapas_________________________*/
	$slq = "INSERT  INTO `db_formacion`.`tbl_procesos` ".
			"(`idprocesos`, ".
			"`fechainicio`, ".
			"`fechafinal`, ".
			"`fechainiciotestlinea`, ".
			"`fechafinaltestlinea`, ".
			"`urltestlinea1`, ".
			"`urltestline2`, ".
			"`clavetest`, ".
			"`fechainicioentrevista`, ".
			"`fechafinentrevista`, ".
			"`fechainiciodevuelveresultado`, ".
			"`fechafindevuelveresultado`) ".
			"VALUES ".
			"('$idUltimoproceso' , '$fecha_inicio_incripcion' , '$fecha_fin_incripcion' , '$fecha_inicio_test' , '$fecha_fin_test' , '$url_test_vocacional' , ".
			"'$url_test_personalidad' , '$clave_acceso' , '$fecha_inicio_entrev' , '$fecha_fin_entrev' , '$fecha_inicio_devoluc', '$fecha_fin_devoluc') ";
/*
					FORMATO DE DATOS 
					---------------secciones------------------
					dia0=Agosto 20, 2019&Hora_Inicial0=02:00 PM&Hora_final0=03:00 PM&Lugar0=n&Cupos0=7&idSeccion0=201973162745976


					&dia1=Mie 21, Ago 2019&Hora_Inicial1=03:00 PM&Hora_final1=03:00 PM&Lugar1=k&Cupos1=17&idSeccion1=20197316284974&
					cantidadProcesosGuardar=1
*/
	$conexion->ejecutarInstruccion($slq);
	$datos_new_process="";
	for ($i=0; $i <= $numero_procesos_nuevos ; $i++) { 
		$datos_new_process.="( '".$_GET['idSeccion'.$i]."' , '".
							transformar_hora($_GET['Hora_Inicial'.$i])."', '".
							transformar_hora($_GET['Hora_final'.$i])."', ".
							$_GET['Cupos'.$i].", '".
							$_GET['Lugar'.$i]."', ".
							$idUltimoproceso.", '". 
							$_GET['dia'.$i]."')";
		if (!($i == $numero_procesos_nuevos)) {
			$datos_new_process.=",";
		}
	}

	$sql1="INSERT INTO `db_formacion`.`tbl_secciones` ".
			"(`idsecciones`, ".
			"`horainicial`, ".
			"`horafinal`, ".
			"`cupos`, ".
			"`lugar`, ".
			"`idprocesos`, ".
			"`dia`) ".
			"VALUES ".
			$datos_new_process;
	
	function transformar_hora($hora){
		$date = strtotime($hora); 
		return date('h:i', $date);
	}
$conexion->ejecutarInstruccion($sql1);
?>

