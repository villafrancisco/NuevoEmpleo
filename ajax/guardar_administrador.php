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
    $administrador = $db->getUsuario($_SESSION["idusuario"]);
    if ($administrador->getTipousuario() == 'administrador') {

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


            $administrador->setNombre($_POST["nombre"]);
            $administrador->setApellidos($_POST["apellidos"]);
            if ($db->existeEmail($_POST["email"])) {
                if ($_POST["email"] == $administrador->getEmail()) {
                    $administrador->setEmail($_POST["email"]);
                } else {
                    $data['status'] = 'error';
                    echo json_encode($data);
                    return false;
                }
            } else {
                $administrador->setEmail($_POST["email"]);
            }

            if ($db->updateUsuario($administrador)) {
                $data['status'] = 'ok';
            } else {
                $data['status'] = 'error';
            };

            echo json_encode($data);
        }
    }
}
