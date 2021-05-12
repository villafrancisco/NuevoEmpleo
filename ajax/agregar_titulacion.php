<?php
session_start();

require_once "../config/app.php";
require_once '../includes/conexion.php';
require_once '../includes/DB.php';
require_once '../modelos/Usuario.php';
require_once '../modelos/Administrador.php';
require_once '../modelos/Titulado.php';
require_once '../modelos/Empresa.php';
require_once '../modelos/Empleo.php';
require_once '../modelos/Titulo.php';

$db = new DB();
$titulos = $db->getAlltitulos();
$respuesta = '<div>' .
    '<i class="fas fa-trash-alt"></i>' .
    '<select class="select-titulacion" id="select11" name="titulacion">' .
    '<option value="0" selected>Elige una titulación</option>';
foreach ($titulos as $t) {
    $respuesta .= '<option value="' . $t->getIdtitulo() . '">' . $t->getNombre() . '</option>';
}
$respuesta .= '</select>' .
    '</div>';
echo json_encode($respuesta);
