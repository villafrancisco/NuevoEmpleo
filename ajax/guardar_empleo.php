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
        if (isset($_POST['idempleo']) && empty($_POST['idempleo'])) {
            //crear empleo
            $empleo = new Empleo();
            $empleo->setIdempresa($empresa->getIdempresa());
            $empleo->setIdfamilia($_POST['familia']);
            $empleo->setDescripcion($_POST['descripcion']);

            if ($db->createEmpleo($empleo)) {
                $data['status'] = 'ok';
            } else {
                $data['status'] = 'error';
            }
        } elseif (isset($_POST['idempleo']) && !empty($_POST['idempleo'])) {
            //actualizar empleo
            $empleo = $db->getEmpleo($_POST['idempleo']);
            $empleo->setIdfamilia($_POST['familia']);
            $empleo->setDescripcion($_POST['descripcion']);
            if ($db->updateEmpleo($empleo)) {
                $data['status'] = 'ok';
            } else {
                $data['status'] = 'error';
            }
        }
        echo json_encode($data);
    }
}
