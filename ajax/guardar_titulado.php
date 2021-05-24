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

function comprobarEmail($email)
{

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

$db = new DB();



if (isset($_SESSION["idusuario"])) {
    $titulado = $db->getUsuario($_SESSION["idusuario"]);
    if ($titulado->getTipousuario() == 'titulado') {
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
                $titulado->setFoto($destino . '/' . $prefijo . '_' . $_FILES["foto"]['name']);
            }
            if (!isset($_POST['curriculum'])) {
                $titulado->setCurriculum($destino . '/' . $prefijo . '_' . $_FILES["curriculum"]['name']);
            }
            if ($db->existeEmail($_POST["email"])) {
                if ($_POST["email"] == $titulado->getEmail()) {
                    $titulado->setEmail($_POST["email"]);
                } else {
                    //el email ya esta ej uso
                    $data['status'] = 'error';
                    $data['email'] = 'error';
                    echo json_encode($data);
                    return false;
                }
            } else {
                $titulado->setEmail($_POST["email"]);
            }
            $titulado->setNombre($_POST["nombre"]);
            $titulado->setApellidos($_POST["apellidos"]);
            $titulado->setEmail($_POST["email"]);
            $titulado->setDireccion($_POST["direccion"]);
            $titulado->setDNI($_POST["dni"]);
            $titulado->setTelefono($_POST["telefono"]);
            $titulado->setIdtitulo($_POST["titulacion"]);
            if ($db->updateUsuario($titulado)) {
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
    }
}
