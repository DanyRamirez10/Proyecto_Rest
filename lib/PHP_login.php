<?php
    @session_start();
    error_reporting(0);
    include_once '../conexion/conectar.php';
    include_once 'functions.php';
    include_once 'config.php';

    if(empty($_POST['email'])){
        $errors[] = "Ingrese el Correo";
    }elseif(empty($_POST['password'])){
        $errors[] = "Ingrese la contraseña";
    }else{
        $llave= $template['clave_publica'];
        $email= $_POST['email'];
        $password= encrypt($_POST['password'],$llave);
        $sql = "SELECT *FROM usuario WHERE emaUsu='$email'"  ;
        $consulta= $conector->query($sql);
        $correo_consulta=$consulta->num_rows;
        if($correo_consulta<1){
            $errors[]= "El Correo no es valido";
        }else{
            $sql = "SELECT *FROM usuario WHERE emaUsu='$email' AND pasUsu = '$password'"  ;
            $consulta= $conector->query($sql);
            $pass_consulta=$consulta->num_rows;            
            if($pass_consulta<1){
                $_SESSION['intentos'] = $_SESSION['intentos'] + 1;
                $int_rest = 3- $_SESSION['intentos'];
                if($int_rest < 0){
                    $aql_est = "UPDATE usuario set estUsu = 0 where emaUsu = '$email'";
                    $bloqueo = $conector -> query($sql_est);
                }if($bloqueo){
                    $erros[] = "Usuario bloqueado por el sistema";
                }else{
                    $erros[] = "No se puede bloquear al usuario";
                }
                unset($_SESSION['intentos']);
                else{
                $errors[] = "La contraseña non es valida le quedan ".$int_rest." intentos";
                }

            }else{
                while($fila = $consulta->fetch_array())
                {
                    $id_user = $fila['codUsu'];
                    $nom_user = $fila['nomUsu'];
                    $est_user = $fila['estUsu'];
                    $pri_user = $fila['priUsu'];
                }
                if($est_user == 1){
                       $reg = date("Y-m-d H:i:s");
                       $sql_insert = "INSERT INTO usuario_login (codUsu,regUL)
                       VALUES ('".$id_user."','".$reg."')"; 
                       $insert = $conector->query($sql_insert);
                       if($insert){
                            $_SESSION['codUsu']=$id_user; 
                            $_SESSION['priUsu']=$id_user; 
                            $messages[] = $nom_user;                           
                            if($pri_user==1){ 
                               //Redirigir a una carpeta de nombre mod_admin
                                $url = "mod_admin/";
                                redireccionar($url);
                                $messages[] = "Admin";
                            }else{
                               //Redirigir a una carpeta de nombre mod_empleado  
                               //redirigir("mod_empleado/");   
                            }
                       }else{
                        $errors[]='Sistema fallando';                       
                       }
                }else{
                    $errors[]= "Usuario Bloqueado, contactarse con soporte tecnico";
                }
                
            }
        }   
    if(isset($errors)){
        echo '<div class="alert alert-danger" role="alert">';
        echo '<b>Error</b>! ';
              foreach($errors as $error){
                    echo $error;
              } 
        echo '</div>';
    }

    if(isset($messages)){
        echo '<div class="alert alert-success" role="alert">';
        echo '<b>bienvenido</b>! ';
              foreach($messages as $sms){
                    echo $sms;
              } 
        echo '</div>';
    }


?>
