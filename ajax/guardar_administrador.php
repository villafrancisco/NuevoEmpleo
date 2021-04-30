<?php 
//Archivo para login con ajax
require_once "../config/app.php";
require_once '../includes/conexion.php';
require_once '../includes/DB.php';
require_once '../modelos/Usuario.php';
require_once '../modelos/Administrador.php';

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
    
//Comprobamos que existan los campos para de email el nombre y los apellidos
if(isset($_POST["email"]) && isset($_POST["nombre"]) && isset($_POST['apellidos'])){
    
    if(!comprobarEmail($_POST['email'])){
        return false;
    }
    if(!ctype_alpha($_POST['nombre'])){
        return false;
    }
    if(!ctype_alpha($_POST['apellidos'])){
        return false;
    }
    //Guardamos todos los datos
    //tenemos que comprobar que el email nuevo no se encuentra ocupado
    //updateAdministrador
    $db=new DB();
    $usuario=$db->getAdministrador($_POST['email']);
    var_dump($usuario);
    if(!$usuario){
        echo 'entra';
        //no ha encontrado un usuario con ese email, asi que se actualiza
         //$db->updateAdministrador($_POST);
    }
   
   
        
    
    
}

?>