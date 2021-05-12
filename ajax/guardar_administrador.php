<?php
session_start();

require_once "../config/app.php";
require_once '../includes/conexion.php';
require_once '../includes/DB.php';
require_once '../modelos/Usuario.php';
require_once '../modelos/Administrador.php';
require_once '../modelos/Titulado.php';
require_once '../modelos/Empresa.php';
require_once '../modelos/Titulo.php';

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
    $usuarioactualizar = $db->getUsuario($_POST['idusuario']);
    $usuarioactualizar->setNombre($_POST["nombre"]);
    $usuarioactualizar->setApellidos($_POST["apellidos"]);
    if ($db->existeEmail($_POST["email"])) {
        if ($_POST["email"] == $usuarioactualizar->getEmail()) {
            $usuarioactualizar->setEmail($_POST["email"]);
        } else {
            $data['status'] = 'error';
            return false;
        }
    } else {
        $usuarioactualizar->setEmail($_POST["email"]);
    }

    if ($db->updateUsuario($usuarioactualizar)) {
        $data['status'] = 'ok';
    } else {
        $data['status'] = 'error';
    };

    echo json_encode($data);
}
