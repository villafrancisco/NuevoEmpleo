<?php 

session_start();

    if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]->getIdTipo()==1){
        $db=new DB();
        
        $administrador=$db->getAdministrador($_SESSION["usuario"]->getIdusuario());
    }else{
        header('Location:../index.php');
    }
