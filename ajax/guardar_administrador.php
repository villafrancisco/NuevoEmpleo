<?php
//Archivo para login con ajax
require_once "../config/app.php";
require_once '../includes/conexion.php';
require_once '../includes/DB.php';
require_once '../modelos/Usuario.php';
require_once '../modelos/Administrador.php';
require_once '../modelos/Titulado.php';

/**
 * comprobarEmail
 *
 * @param  mixed $email
 * @return void
 */
function comprobarEmail($email)
{
    $prueba = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

//Comprobamos que existan los campos para de email el nombre y los apellidos
if (isset($_POST["email"]) && isset($_POST["nombre"]) && isset($_POST['apellidos'])) {


    if (!comprobarEmail($_POST['email'])) {
        $data['status'] = 'error';
        return false;
    }
    if (!ctype_alpha($_POST['nombre'])) {
        $data['status'] = 'error';
        return false;
    }
    if (!ctype_alpha($_POST['apellidos'])) {
        $data['status'] = 'error';
        return false;
    }
    //Guardamos todos los datos
    //tenemos que comprobar que el email nuevo no se encuentra ocupado
    //updateAdministrador
    $db = new DB();
    $usuariologueado = $db->getUsuario($_POST['idusuario']);
    $listaAdministradores = $db->getAllUsuariosTipo("administrador");
    foreach ($listaAdministradores as $administrador) {
        if ($usuariologueado->getEmail() == $_POST['email']) {
            //acutalizo el usuario
            $data['status'] = 'ok';
            $usuariologueado->setNombre($_POST['nombre']);
            $usuariologueado->setApellidos($_POST['apellidos']);
            $db->updateUsuario($usuariologueado);
        } else {
            //compruebo el nuevo email
            if ($administrador->getEmail() == $usuariologueado->getEmail()) {
                //el email ya existe en el sistema
                $data['status'] = 'error';
            } else {
                $usuariologueado->setNombre($_POST['nombre']);
                $usuariologueado->setApellidos($_POST['apellidos']);
                $usuariologueado->setEmail($_POST['email']);
                $data['status'] = 'ok';
                $db->updateUsuario($usuariologueado);
            }
        }
    }
    echo json_encode($data);
}
