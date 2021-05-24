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
require_once '../modelos/Familia.php';
require_once '../modelos/Titulo.php';
require_once '../modelos/Empleo.php';

$db = new DB();

if (isset($_SESSION["idusuario"])) {
    $empresa = $db->getUsuario($_SESSION["idusuario"]);
    if ($empresa->getTipousuario() == 'empresa') {
        if ($db->deleteEmpleo($db->getEmpleo($_POST['idempleo']))) {
            $data['status'] = 'ok';
        } else {
            $data['status'] = 'error';
        }
        echo json_encode($data);
    }
}
