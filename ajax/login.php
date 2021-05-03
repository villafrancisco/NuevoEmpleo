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
    $listaUsuarios = $db->getAllUsuarios();
    foreach ($listaUsuarios as $usuario) {


        if (password_verify($contrasena, $usuario->getContrasena()) && $usuario->getEmail() == $email && $usuario->getNameTipo() == "administrador" && $tipo == 'administrador') {
            //Contraseña correcta
            //Loguear como administrador
            $usuarioadministrador = $usuario;
        } else if (password_verify($contrasena, $usuario->getContrasena()) && $usuario->getEmail() == $email && $usuario->getNameTipo() == "empresa" && $tipo == 'empresa') {
            //contraseña correcta
            //Loguear como titulado o empresa
            $usuarioempresa = $usuario;
        } else if (password_verify($contrasena, $usuario->getContrasena()) && $usuario->getEmail() == $email && $usuario->getNameTipo() == "titulado" && $tipo == 'titulado') {
            //contraseña correcta
            //Loguear como titulado o empresa
            $usuariotitulado = $usuario;
        }
    }
    //TODO una funcion para administradores y otra para el resto
    if (isset($usuarioadministrador)) {
        session_start();
        $_SESSION["usuario"] = $usuarioadministrador;
        return true;
    } else if (isset($usuarioempresa)) {
        session_start();
        $_SESSION["usuario"] = $usuarioempresa;
        return true;
    } else if (isset($usuariotitulado)) {
        session_start();
        $_SESSION["usuario"] = $usuariotitulado;
        return true;
    } else {
        //preguntar si existe el email introducido como usuario
        $emailexiste = false;
        foreach ($listaUsuarios as $usuario) {
            if ($usuario->getEmail() == $email) {
                $emailexiste = true; //existe el email 
                return false;
            }
        }
        if (!$emailexiste) {

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
                $_SESSION['usuario'] = $nuevousuario;
                return true;
            } else {
                return false;
            }
        }
    }
}
