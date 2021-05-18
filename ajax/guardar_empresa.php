<?php
session_start();

require_once "../config/app.php";
require_once '../includes/conexion.php';
require_once '../includes/DB.php';
require_once '../modelos/Tipousuario.php';
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
$db = new DB();
$usuarioactualizar = $db->getUsuario($_POST['idusuario']);
$destino = "empresas/" . $_POST['idusuario'];
$prefijo = substr(md5(uniqid(rand())), 0, 6);
//Comprobamos que existan los campos para de email el nombre y los apellidos
if (isset($_POST["email"]) && isset($_POST["nombre"])) {
    if (!comprobarEmail($_POST['email'])) {
        $data['status'] = 'error';
        $data['email'] = 'error';
    }
    
    
    if (!isset($_POST['logo'])) {
        $usuarioactualizar->setLogo($destino . '/' . $prefijo . '_' . $_FILES["logo"]['name']);
    }

    if ($db->existeEmail($_POST["email"])) {
        if ($_POST["email"] == $usuarioactualizar->getEmail()) {
            $usuarioactualizar->setEmail($_POST["email"]);
        } else {
            //el email ya esta ej uso
            $data['status'] = 'error';
            $data['email'] = 'error';
            echo json_encode($data);
            return false;
        }
    } else {
        $usuarioactualizar->setEmail($_POST["email"]);
    }



    $usuarioactualizar->setNombre($_POST["nombre"]);
    
    $usuarioactualizar->setEmail($_POST["email"]);
    $usuarioactualizar->setDireccion($_POST["direccion"]);
    
    $usuarioactualizar->setTelefono($_POST["telefono"]);

    


    if ($db->updateUsuario($usuarioactualizar)) {
        //subir archivos
        $directorio = '../archivos_subidos/empresas/' . $_POST['idusuario'];
        if (!is_dir($directorio)) {
            mkdir($directorio, 0777,true);
            //subo los archivos
        }
        if (isset($_FILES['logo'])) {
            move_uploaded_file($_FILES['logo']['tmp_name'], $directorio . '/' . $prefijo . '_' . $_FILES['logo']['name']);
        }
        $data['status'] = 'ok';
    } else {
        $data['status'] = 'error';
    };

    echo json_encode($data);
}
