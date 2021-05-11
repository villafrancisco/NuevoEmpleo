<?php
session_start();
$db = new DB();
if (isset($_SESSION["idusuario"])) {
    $usuariologueado = $db->getUsuario($_SESSION["idusuario"]);
    if ($usuariologueado->getNameTipo() == 'administrador') {
        $administrador = $db->getUsuario($usuariologueado->getIdusuario());
    } else {
        header('Location:../index.php');
        
    }
} else {
    header('Location:../index.php');
    
}
?>
