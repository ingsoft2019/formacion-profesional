<?php
include ('../clases/class_conexion.php');
$conexion = new Conexion();
$respuesta = array();
$resultado["codigo_resultado"]=1;
$resultado["mensaje"]="Información Actualiza.";
$_POST["id"]=1;
if (isset($_POST["id"])) {
	$query=$conexion->ejecutarInstruccion("SELECT a.idPersona as ID , a.no_identidad as Identidad,a.nombres as Nombre,' ',a.apellidos as Apellidos,x.nombreCarrera as Carrera,a.correo as Correo,a.celular as Celular, d.descripcion as TipoUsuario,b.no_cuenta as Cuenta FROM tbl_personas a left join tbl_estudiantes b on a.idPersona=b.idEstudiante left join tbl_carreras x on b.idEstudiante=x.idCarrera left join tbl_personas_has_tbl_tipousuario c on a.idPersona = c.tbl_personas_idPersona left join tbl_tipousuario d on c.tbl_tipousuario_idtipousuario=d.idtipousuario where a.idPersona=".$_POST["id"]." ORDER BY ID ASC");
            
            $datos =$conexion->obtenerFila($query);
                $resultadoUsuarios= array("ID"=>$datos["ID"],"Identidad"=>$datos["Identidad"]);
            
        	echo json_encode($resultadoUsuarios);
}
            $conexion->cerrarConexion();


            

?>