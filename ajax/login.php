<?php 
//Archivo para login con ajax
require_once "../config/app.php";
require_once '../includes/conexion.php';
require_once '../includes/DB.php';
require_once '../modelos/Usuario.php';
require_once '../modelos/Administrador.php';
require_once '../modelos/Empresa.php';
require_once '../modelos/Familia.php';
require_once '../modelos/Empleo.php';
require_once '../modelos/Titulo.php';


/**
 * comprobarEmail
 *
 * @param  mixed $email
 * @return void
 */
function comprobarEmail($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
       return false;
    }
}

/**
 * comprobarContrasena
 * 
 * la contraseña tiene que tener al menos 6 caracteres
 *
 * @param  mixed $contrasena
 * @return void
 */
function comprobarContrasena($contrasena){
    if(strlen($contrasena)>5){
        return true;
    }else{
        return false;
    }
}
//Comprobamos que existan los campos para de email y contraseña
if(isset($_POST["email"]) && isset($_POST["contrasena"])){
    $email=$_POST["email"];
    $contrasena=$_POST["contrasena"];
    $tipo='';
        
    if(comprobarEmail($email) && comprobarContrasena($contrasena)){
        //Si existe el campo tipo hacemos el login como empresa o como titulado
        if(isset($_POST["tipo"])){
            if($_POST["tipo"]=="empresa"){
                $tipo=2;
                login($email,$contrasena,$tipo);
            }elseif($_POST["tipo"]=="titulado"){
                $tipo=3;
                login($email,$contrasena,$tipo);
            }
        }else{
            //Login como administrador
            $tipo=1;
            if(login($email,$contrasena,$tipo)){
                //Si el login es correcto
              echo 1;
            }else{
                //Si el login es incorrecto
               echo 0;
            }
        }
    } else{
        echo 0;
    }
}

/**
 * login
 * 
 * Devuelve false si no ha podido loguearse
 *
 * @param  mixed $email
 * @param  mixed $contrasena
 * @param  mixed $tipo
 * @return boolean
 */
function login($email,$contrasena,$tipo){
    $db=new DB();
    $usuario=$db->getUsuario($email,$contrasena,$tipo);
    
    if($usuario){
        //existe el usuario y la contraseña, creo la session
        session_start();
       $_SESSION["usuario"]=$usuario;
       return true;
    }else{
            //preguntar si existe el email introducido como usuario
            if($db->getEmailUsuario($email)){
                //existe el email
                return false;
            }else{
                 if($tipo!=1){//Solo para los que no sean administradores
                    //no existe el email
                    //Creo el usuario y la sesion
                    if($db->crearNuevoUsuario($email,$contrasena,$tipo)){
                        session_start();
                        $_SESSION["usuario"]=$db->getUsuario($email,$contrasena,$tipo);
                        return true;
                    }
                    return false;
                 }
                 else{
                     return false;
                }
            }
    }
}

?>