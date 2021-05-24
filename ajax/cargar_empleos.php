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
        $empleos = $db->getEmpleosEmpresa($empresa);
        $data = [];
        $i = 0;
        foreach ($empleos as $empleo) {
            $data[$i]['idempleo'] = $empleo->getIdempleo();
            $data[$i]['descripcion'] = $empleo->getDescripcion();
            $data[$i]['familia'] = $db->getFamilia($empleo->getIdfamilia())->getNombre();
            $data[$i]['fecha_publicacion'] = $empleo->getFecha_publicacion();
            $i++;
        }
        echo json_encode($data);
    }
}
