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
require_once '../modelos/Inscripcion.php';

$db = new DB();

if (isset($_SESSION["idusuario"])) {
    $titulado = $db->getUsuario($_SESSION["idusuario"]);
    if ($titulado->getRegistro_completo() != true) {
        //registro incompleto
        $data['registro_incompleto'] = true;
        echo json_encode($data);
        exit();
    }



    if ($titulado->getTipousuario() == 'titulado') {
        $inscripcion = new Inscripcion();
        $inscripcion->setIdempleo($_POST['idempleo']);
        $inscripcion->setIdtitulado($titulado->getIdtitulado());
        if ($db->createInscripcion($inscripcion)) {
            $data['status'] = 'ok';
        } else {
            $data['status'] = 'error';
        }
        echo json_encode($data);
    }
}
