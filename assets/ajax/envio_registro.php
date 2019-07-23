<?php
    require('../clases/class_conexion.php');
    $mysql = new Conexion();
    $carr=$_POST['carrera'];
    $genero=$_POST['genero'];
    $nombre=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $idp=$_POST['identidad'];
    $cuenta=$_POST['cuenta'];
    $numero=$_POST['telefono'];
    $email=$_POST['email']."@unah.hn";
    $pass=$_POST['password2'];
    $foto="";

    if($genero == 1){
        $foto="assets/images/profile-image-1.png";
    }elseif($genero == 2){
        $foto="assets/images/profile-image-2.png";
    }

    if(!evaluarPass($pass)){
        echo "La contraseña que ingreso no es valida."."\n";
        echo "La contraseña debe llevar: al menos una Mayuscula (A-Z),"."\n";
        echo "al menos un Numero (0-9) y tener más de 8 caracteres.";
    }elseif (empty($_POST['nombres']) || empty($_POST['apellidos'])){
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
    }elseif($_POST['password']!=$_POST['password2']){
        echo "Las contraseñas no coinciden"."\n";
        echo "Asegurese de ingresar la misma contraseña";
    }else{
        $query1=$mysql->ejecutarInstruccion("SELECT idpersona from tbl_personas ORDER BY idPersona DESC LIMIT 1;");
        $uid=mysqli_fetch_array($query1);
        $id=(string)((int)$uid['idpersona']+1);
        $idp = str_replace("-", "", $idp);
        $numero = str_replace("-", "", $numero);
        $numero = str_replace(" ", "", $numero);
        $numero = substr($numero, 5);
        $mysql->ejecutarInstruccion("INSERT INTO tbl_personas(idPersona,idGenero,nombres,apellidos,correo,contrasena,celular,no_identidad,fotoPerfil ) VALUES ('$id','$genero','$nombre','$apellidos','$email',MD5('$pass'),'$numero','$idp','$foto')");
        $mysql->ejecutarInstruccion("INSERT INTO tbl_estudiantes(idEstudiante,no_cuenta,idCarrera)VALUES('$id','$cuenta','$carr')");
        
        echo "¡Su registro ha sido exitoso!";
        
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