<?php 


require_once "../config/app.php";
require_once '../includes/conexion.php';
require_once '../includes/DB.php';

require_once '../modelos/Usuario.php';
require_once '../modelos/Administrador.php';
require_once '../modelos/Empresa.php';
require_once '../modelos/Familia.php';
require_once '../modelos/Empleo.php';
require_once '../modelos/Titulo.php';


function comprobarEmail($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        
        return true;
        
    }else{
        
       return false;
    }
}
function comprobarContrasena($contrasena){
   
    if(strlen($contrasena)>5){
       
        return true;
    }else{
        return false;
    }
}

if(isset($_POST["email"]) && isset($_POST["contrasena"])){
    $email=$_POST["email"];
    $contrasena=$_POST["contrasena"];
    $tipo='';
    
    if(comprobarEmail($email) && comprobarContrasena($contrasena)){
        
        if(isset($_POST["tipo"])){
            
            if($_POST["tipo"]=="empresa"){
                $tipo=2;
                login($email,$contrasena,$tipo);
            }elseif($_POST["tipo"]=="titulado"){
                $tipo=3;
                login($email,$contrasena,$tipo);
            }
        }else{
            //Login administrador
            $tipo=1;
            if(login($email,$contrasena,$tipo)){
              echo 1;
            }else{
               echo 0;
            }
        }
                
    } else{
        //return false;
    }
}
//Devuelve false si el email existe y no coincide la contraseña
function login($email,$contrasena,$tipo){
    $db=new DB();
    $usuario=$db->getUsuario($email,$contrasena,$tipo);
    
    if($usuario){
        //existe el usuario y la contraseña, creo la session
        session_start();
       $_SESSION["usuario"]=$usuario;
       return true;
    }else{
        //preguntar si existe el email en la tabla usuarios
        if($db->getEmailUsuario($email)){
            //existe el email
            return false;
        }else{
            //no existe el email
            //Creo el usuario y la sesion
            if($db->crearNuevoUsuario($email,$contrasena,$tipo)){
                session_start();
                $_SESSION["usuario"]=$db->getUsuario($email,$contrasena,$tipo);
                return true;
            }
            return false;
        }

        
        
    }

}



?>