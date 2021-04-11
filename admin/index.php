<?php 
require_once '../modelos/Usuario.php';

session_start();
session_destroy();

if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]->getIdTipo()==1){
    
}else{
    header('Location:../index.php');
}

?>