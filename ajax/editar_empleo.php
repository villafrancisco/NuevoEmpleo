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
if ($empleo = $db->getEmpleo($_POST['idempleo'])) {
    $data["status"] = 'ok';
    $data["descripcion"] = $empleo->getDescripcion();
    $data["idfamilia"] = $empleo->getIdfamilia();
    $data["idempleo"] = $empleo->getIdempleo();
} else {
    $data["status"] = 'error';
}
echo json_encode($data);
