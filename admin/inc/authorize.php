<?php
$db = new DB();
session_start();

if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->getIdTipo() == 1) {
    $db = new DB();

    $administrador = $db->getUsuario($_SESSION["usuario"]->getIdusuario());
} else {
    header('Location:../index.php');
}
