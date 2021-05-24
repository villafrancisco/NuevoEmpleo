<?php
session_start();
$db = new DB();
if (isset($_SESSION["idusuario"])) {
    $usuariologueado = $db->getUsuario($_SESSION["idusuario"]);
    if ($usuariologueado->getTipousuario() == 'administrador') {
        $administrador = $usuariologueado;
    } else {
        header('Location:../index.php');
        
    }
} else {
    header('Location:../index.php');
    
}
