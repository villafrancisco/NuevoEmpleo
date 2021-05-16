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
$destino = "titulados/" . $_POST['idusuario'];
$prefijo = substr(md5(uniqid(rand())), 0, 6);
//Comprobamos que existan los campos para de email el nombre y los apellidos
if (isset($_POST["email"]) && isset($_POST["nombre"]) && isset($_POST['apellidos'])) {
    if (!comprobarEmail($_POST['email'])) {
        $data['status'] = 'error';
        $data['email'] = 'error';
    }
    if (!ctype_alpha($_POST['nombre'])) {
        $data['status'] = 'error';
        $data['nombre'] = 'error';
    }
    if (!ctype_alpha($_POST['apellidos'])) {
        $data['status'] = 'error';
        $data["apellidos"] = 'error';
    }
    if (!isset($_POST['foto'])) {
        $usuarioactualizar->setFoto($destino . '/' . $prefijo . '_' . $_FILES["foto"]['name']);
    }
    if (!isset($_POST['curriculum'])) {
        $usuarioactualizar->setCurriculum($destino . '/' . $prefijo . '_' . $_FILES["curriculum"]['name']);
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
    $usuarioactualizar->setApellidos($_POST["apellidos"]);
    $usuarioactualizar->setEmail($_POST["email"]);
    $usuarioactualizar->setDireccion($_POST["direccion"]);
    $usuarioactualizar->setDNI($_POST["dni"]);
    $usuarioactualizar->setTelefono($_POST["telefono"]);

    $usuarioactualizar->setIdtitulo($_POST["titulacion"]);


    if ($db->updateUsuario($usuarioactualizar)) {
        //subir archivos
        $directorio = '../archivos_subidos/titulados/' . $_POST['idusuario'];
        if (!is_dir($directorio)) {
            mkdir($directorio, 0777);

            //subo los archivos
        }
        if (isset($_FILES['foto'])) {
            move_uploaded_file($_FILES['foto']['tmp_name'], $directorio . '/' . $prefijo . '_' . $_FILES['foto']['name']);
        }
        if (isset($_FILES['curriculum'])) {
            move_uploaded_file($_FILES['curriculum']['tmp_name'], $directorio . '/' . $prefijo . '_' . $_FILES['curriculum']['name']);
        }
        $data['status'] = 'ok';
    } else {
        $data['status'] = 'error';
    };

    echo json_encode($data);
}
