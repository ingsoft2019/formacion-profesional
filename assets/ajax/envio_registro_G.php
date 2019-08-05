<?php
require('../clases/class_conexion.php');
    $mysql = new Conexion();

    $email=$_POST['email']."@unah.edu.hn";
    $idp=$_POST['identidad'];
    $idp = str_replace("-", "", $idp);

    $query0=$mysql->ejecutarInstruccion(
        "SELECT COUNT(idpersona) as cantidad
        FROM tbl_personas 
        WHERE correo = '$email' OR no_identidad = '$idp'");
    
    $result0 = mysqli_fetch_array($query0);

    

    if($result0['cantidad'] > 0){
        echo "Alguien ya esta registrado con ese correo.";
    } else{
        
        $genero=$_POST['genero'];
        $nombre=$_POST['nombres'];
        $apellidos=$_POST['apellidos'];
        $numero=$_POST['telefono'];
        $cargo=$_POST['cargo'];
        $pass=$_POST['password'];
        $foto="";

        if($genero == 1){
            $foto="assets/images/profile-image-1.png";
        }elseif($genero == 2){
            $foto="assets/images/profile-image-2.png";
        }
        $query2=$mysql->ejecutarInstruccion("SELECT idpersona from tbl_personas ORDER BY idPersona DESC LIMIT 1;");
        $uid=mysqli_fetch_array($query2);
        $id=(string)((int)$uid['idpersona']+1);
        $numero = str_replace("-", "", $numero);
        $numero = str_replace(" ", "", $numero);
        $numero = substr($numero, 5);
        $estado_cuenta = 1;
        if($cargo<4){
            $mysql->ejecutarInstruccion("SET FOREIGN_KEY_CHECKS=0;");
            $mysql->ejecutarInstruccion("INSERT INTO tbl_personas(idPersona,idGenero,nombres,apellidos,correo,contrasena,celular,no_identidad,fotoPerfil,estadocuenta ) VALUES ('$id','$genero','$nombre','$apellidos','$email',MD5('$pass'),'$numero','$idp','$foto','$estado_cuenta')");
            $mysql->ejecutarInstruccion("INSERT INTO tbl_personas_has_tbl_tipousuario(tbl_personas_idPersona, tbl_tipousuario_idtipousuario) VALUES ('$id','$cargo')");
        }else{
            $mysql->ejecutarInstruccion("SET FOREIGN_KEY_CHECKS=0;");
            $mysql->ejecutarInstruccion("INSERT INTO tbl_personas(idPersona,idGenero,nombres,apellidos,correo,contrasena,celular,no_identidad,fotoPerfil,estadocuenta ) VALUES ('$id','$genero','$nombre','$apellidos','$email',MD5('$pass'),'$numero','$idp','$foto','$estado_cuenta')");
            $mysql->ejecutarInstruccion("INSERT INTO tbl_personas_has_tbl_tipousuario(tbl_personas_idPersona, tbl_tipousuario_idtipousuario) VALUES ('$id','2')");
            $mysql->ejecutarInstruccion("INSERT INTO tbl_personas_has_tbl_tipousuario(tbl_personas_idPersona, tbl_tipousuario_idtipousuario) VALUES ('$id','3')");
        }
        echo "¡Registro exitoso!";
    }



?>