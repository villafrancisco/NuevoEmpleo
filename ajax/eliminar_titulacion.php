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
$usuarioactualizar = $db->getUsuario($_SESSION['idusuario']);
$db->deleteTitulacionUsuario($usuarioactualizar, $_POST['idtitulacion']);
