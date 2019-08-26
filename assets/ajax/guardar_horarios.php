<?php
session_start();
include ('../clases/class_conexion.php');
$conexion = new Conexion();
$horarios = json_decode($_POST["JsonHorarios"]);
$complementoSql = " ";
////////////////
$query=$conexion->ejecutarInstruccion(
                    "select `idhorariosorientador` as id from `tbl_horarios_orientador`order by ".
                    " `idhorariosorientador` desc ".
                    "limit 1");
            
    $respuesta = mysqli_fetch_array($query);
    $ultimoID= $respuesta["id"]+1;
////////////////

$tamanio = count($horarios);
for ($i=0; $i < $tamanio ; $i++) { 
    $complementoSql.= "(".$ultimoID.",".
                        "'".$horarios[$i]->fecha."',".
                        "'".$horarios[$i]->h_inicial."',".
                        "'".$horarios[$i]->h_final."',".
                        $horarios[$i]->idTipoEvento.",".
                        $horarios[$i]->id_horario.",".
                        $_SESSION["idPersona"].",".
                        $horarios[$i]->idProceso.")";
    if ($i != $tamanio-1) {
        $complementoSql.=",";
    }
    $ultimoID=$ultimoID+1;
}
//echo $complementoSql; 
$sql="INSERT INTO `db_formacion`.`tbl_horarios_orientador` ".
        "(`idhorariosorientador`, ".
        "`fecha`, ".
        "`h_inicial`, ".
        "`h_final`, ".
        "`tipoevento`, ".
        "`codigohorario`, ".
        "`idorientador`, ".
        "`idprocesos`) ".
        "VALUES ".$complementoSql;
$conexion->ejecutarInstruccion($sql);
//echo $sql;
//echo "ESTE ES EL ULTIMO ID: ". $ultimoID;
//echo $horarios[0]->id_horario; // es correcto
//echo json_encode($horarios); // mera depuracion

$conexion->cerrarConexion();
?>