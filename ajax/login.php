<?php 
//Archivo para login con ajax
require_once "../config/app.php";
require_once '../includes/conexion.php';
require_once '../includes/DB.php';
require_once '../modelos/Usuario.php';
require_once '../modelos/Administrador.php';
require_once '../modelos/Empresa.php';
require_once '../modelos/Titulado.php';
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
            if($_POST["tipo"]=="empresa"){//login empresa
                $tipo=2;
            }elseif($_POST["tipo"]=="titulado"){//login titulado
                $tipo=3;
            }
        }else{
            //Login como administrador
            $tipo=1;
        }
        if(login($email,$contrasena,$tipo)){
            //Si el login es correcto
          
          if($tipo==1){
            echo 1;
          }else if($tipo==2){
            echo 2;
          }else{
              echo 3;
          }
        }else{
          echo 0;
        }
        
    }else{//La comprobacion de usuario y contraseña son incorrectas
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
            if($db->existeEmail($email)){
                //existe el email pero la contraseña no coincide
                return false;
            }else{//No existe ni el email ni la contraseña
                 if($tipo!=1){//Solo para los que no sean administradores
                    //Creo el usuario y la sesion
                    if($_SESSION["usuario"]=$db->crearNuevoUsuario($email,$contrasena,$tipo)){
                        session_start();
                        return true;
                    }else{
                        return false;
                    }
                 }
                 else{//Aqui entra si es administrador pero no existe usuario ni contraseña
                    //Metodo para insertar en la base de datos que solo debe estar en desarrollo
                    //$db->crearNuevoUsuario($email,$contrasena,$tipo);
                    return false;
                }
            }
    }
}
