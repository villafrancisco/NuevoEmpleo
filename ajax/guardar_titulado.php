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
require_once '../modelos/Empleo.php';


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
        return false;
    }
    if (!ctype_alpha($_POST['nombre'])) {
        return false;
    }
    if (!ctype_alpha($_POST['apellidos'])) {
        return false;
    }
    $tit=$_POST['titulaciones'];
    
    $db = new DB();
    $usuarioactualizar = $db->getUsuario($_POST['idusuario']);
    $usuarioactualizar->setNombre($_POST["nombre"]);
    $usuarioactualizar->setApellidos($_POST["apellidos"]);
    $usuarioactualizar->setEmail($_POST["email"]);
    $usuarioactualizar->setDireccion($_POST["direccion"]);
    $usuarioactualizar->setDNI($_POST["dni"]);
    $usuarioactualizar->setTelefono($_POST["telefono"]);
    $usuarioactualizar->setCurriculum($_POST["curriculum"]);
    $usuarioactualizar->setFoto($_POST["foto"]);
    $usuarioactualizar->setListaTitulos($_POST["titulaciones"]);//pasar un array de titulos
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

