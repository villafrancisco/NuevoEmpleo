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
require_once '../modelos/Inscripcion.php';

$db = new DB();

if (isset($_SESSION["idusuario"])) {
    $titulado = $db->getUsuario($_SESSION["idusuario"]);
    if ($titulado->getTipousuario() == 'titulado') {
        $inscripciones = $db->getInscripcionesTitulado($titulado);
        $data = [];
        $i = 0;
        foreach ($inscripciones as $inscripcion) {
            $data[$i]['idinscripcion'] = $inscripcion->getIdinscripcion();
            $data[$i]['descripcion'] = $db->getEmpleo($inscripcion->getIdempleo())->getDescripcion();
            $data[$i]['fecha_publicacion'] = $db->getEmpleo($inscripcion->getIdempleo())->getFecha_publicacion();
            $data[$i]['fecha_inscripcion'] = $inscripcion->getFecha_inscripcion();
            $data[$i]['nombre_empresa'] = $db->getEmpresa($db->getEmpleo($inscripcion->getIdempleo())->getIdempresa())->getNombre();
            $data[$i]['logo'] = $db->getEmpresa($db->getEmpleo($inscripcion->getIdempleo())->getIdempresa())->getLogo();
            $i++;

            //Tengo que devolver idinscripcion, descripcion del empleo, fecha publicacion, fecha inscripcion, y empresa
        }
        echo json_encode($data);
    }
}
if (isset($_POST['idtitulado'])) {
    $titulado = $db->getTitulado($_POST["idtitulado"]);
    $inscripciones = $db->getInscripcionesTitulado($titulado);
    $data = [];
    $i = 0;
    foreach ($inscripciones as $inscripcion) {
        $data[$i]['idinscripcion'] = $inscripcion->getIdinscripcion();
        $data[$i]['descripcion'] = $db->getEmpleo($inscripcion->getIdempleo())->getDescripcion();
        $data[$i]['fecha_publicacion'] = $db->getEmpleo($inscripcion->getIdempleo())->getFecha_publicacion();
        $data[$i]['fecha_inscripcion'] = $inscripcion->getFecha_inscripcion();
        $data[$i]['nombre_empresa'] = $db->getEmpresa($db->getEmpleo($inscripcion->getIdempleo())->getIdempresa())->getNombre();
        $data[$i]['logo'] = $db->getEmpresa($db->getEmpleo($inscripcion->getIdempleo())->getIdempresa())->getLogo();
        $i++;

        //Tengo que devolver idinscripcion, descripcion del empleo, fecha publicacion, fecha inscripcion, y empresa
    }
    echo json_encode($data);
}
