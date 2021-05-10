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
function comprobarEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
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
function comprobarContrasena($contrasena)
{
    if (strlen($contrasena) > 5) {
        return true;
    } else {
        return false;
    }
}
//Comprobamos que existan los campos para de email y contraseña
if (isset($_POST["email"]) && isset($_POST["contrasena"])) {
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $tipo = '';

    if (comprobarEmail($email) && comprobarContrasena($contrasena)) {
        //Si existe el campo tipo hacemos el login como empresa o como titulado
        if (isset($_POST["tipo"])) {
            $tipo = $_POST['tipo'];
        } else {
            //Login como administrador
            $tipo = 'administrador';
        }
        if (login($email, $contrasena, $tipo)) {
            //Si el login es correcto
            $data['status'] = 'ok';
            $data['tipousuario'] = $tipo;
        } else {
            $data['status'] = 'error';
        }
    } else { //La comprobacion de usuario y contraseña son incorrectas
        $data['status'] = 'error';
    }
    echo json_encode($data);
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
function login($email, $contrasena, $tipo)
{
    $db = new DB();
    if ($db->login($email, $contrasena, $tipo)) {
        session_start();
        $_SESSION['idusuario'] = $db->login($email, $contrasena, $tipo);
        return true;
    }
    if (!$db->existeEmail($email)) {

        //No existe ni el email ni la contraseña
        if ($tipo == "administrador") { //Solo para los sean administradores
            //Metodo para insertar en la base de datos que solo debe estar en desarrollo

            //Cambiar para poder insertar administradores
            // $usuario = new Administrador([
            //     'email'           => $email,
            //     'contrasena'    =>  $contrasena,
            //     'idtipo'        =>  '1'
            // ]);
            // $nuevousuario = $db->crearNuevoUsuario($usuario);
            return false;
        } else if ($tipo == 'empresa') {
            $usuario = new Empresa([
                'email'           => $email,
                'contrasena'    =>  $contrasena,
                'idtipo'        =>  '2'
            ]);
            $nuevousuario = $db->crearNuevoUsuario($usuario);
        } else if ($tipo == 'titulado') {
            $usuario = new Titulado([
                'email'           => $email,
                'contrasena'    =>  $contrasena,
                'idtipo'        =>  '3'
            ]);
            $nuevousuario = $db->crearNuevoUsuario($usuario);
        }
        if (isset($nuevousuario)) {
            session_start();
            $_SESSION['idusuario'] = $nuevousuario->getIdusuario();
            return true;
        } else {
            return false;
        }
    }
}
