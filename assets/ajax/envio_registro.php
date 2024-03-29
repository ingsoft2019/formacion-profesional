<?php
    require('../clases/class_conexion.php');
    $mysql = new Conexion();
    

    if (empty($_POST['nombres']) || empty($_POST['apellidos'])){
        echo "Tiene que ingresar Nombre y Apellido"."\n";
        echo "No se permiten campos vacios";
    }elseif (empty($_POST['identidad']) || empty($_POST['cuenta'])){ 
        echo "Tiene que ingresar los datos de Identidad y Nro de Cuenta"."\n";
        echo "No se permiten campos vacios";
    }elseif(empty($_POST['telefono']) || empty($_POST['email'])){
        echo "Tiene que ingresar sus datos de Teléfono y Correo Electronico"."\n";
        echo "No se permiten campos vacios";
    }elseif( empty($_POST['carrera'])||empty($_POST['genero']) ){
        echo "Tiene que ingresar la Carrera y el Genero al que pertenese"."\n";
        echo "No se permiten campos vacios";
    }elseif(empty($_POST['password'])|| empty($_POST['password2'])){
        echo "Tiene que llenar ambos campos de Contraseña"."\n";
        echo "No se permiten campos vacios";
    }elseif(!evaluarPass($_POST['password2'])){
        echo "La contraseña que ingreso no es valida."."\n";
        echo "La contraseña debe llevar: al menos una Mayuscula (A-Z),"."\n";
        echo "al menos un Numero (0-9) y tener más de 8 caracteres.";
    }elseif($_POST['password']!=$_POST['password2']){
        echo "Las contraseñas no coinciden"."\n";
        echo "Asegurese de ingresar la misma contraseña";
    }else{
        $email=$_POST['email']."@unah.hn";
        $idp=$_POST['identidad'];
        $idp = str_replace("-", "", $idp);

        $query0=$mysql->ejecutarInstruccion(
            "SELECT COUNT(idpersona) as cantidad
            FROM tbl_personas 
            WHERE correo = '$email' OR no_identidad = '$idp'");
        
        $result0 = mysqli_fetch_array($query0);

        $cuenta=$_POST['cuenta'];
        $query1=$mysql->ejecutarInstruccion(
            "SELECT COUNT(no_cuenta) as cantidad
            FROM tbl_estudiantes 
            WHERE no_cuenta = '$cuenta'");
        
        $result1 = mysqli_fetch_array($query1);

        if($result0['cantidad'] > 0 || $result1['cantidad'] > 0){
            echo "Alguien ya se registró con esos datos, cámbielos o contacte al administrador.";
        } else{
            $carr=$_POST['carrera'];
            $genero=$_POST['genero'];
            $nombre=$_POST['nombres'];
            $apellidos=$_POST['apellidos'];
            $numero=$_POST['telefono'];
            $pass=$_POST['password2'];
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
            $mysql->ejecutarInstruccion("SET FOREIGN_KEY_CHECKS=0;");
            $mysql->ejecutarInstruccion("INSERT INTO tbl_personas(idPersona,idGenero,nombres,apellidos,correo,contrasena,celular,no_identidad,fotoPerfil,estadocuenta ) VALUES ('$id','$genero','$nombre','$apellidos','$email',MD5('$pass'),'$numero','$idp','$foto','$estado_cuenta')");
            $mysql->ejecutarInstruccion("INSERT INTO tbl_estudiantes(idEstudiante,no_cuenta,idCarrera)VALUES('$id','$cuenta','$carr')");
            $mysql->ejecutarInstruccion("INSERT INTO tbl_personas_has_tbl_tipousuario(tbl_personas_idPersona, tbl_tipousuario_idtipousuario) VALUES ('$id','4')");
            
            echo "¡Su registro ha sido exitoso!";
        }

        
    }

    function  evaluarPass($pass){
        $tam=0; //evalua el tamaño de la contraseña
        $mayus=0; // evalua que tenga al menos una mayuscula
        $num=0; //evalua que tenga al menos un numero
       
        for( $i=0;$i<strlen($pass);$i++){
            if(ctype_upper($pass[$i])){
                $mayus++;
            }
            if(is_numeric($pass[$i])){
                $num++;
            }
        }
        $tam=strlen($pass);

        if($tam>=8 && $mayus>0 && $num>0){
            $veredicto=true;
        }else{
            $veredicto=false;
        }
              
        return $veredicto;
    }
    
?>