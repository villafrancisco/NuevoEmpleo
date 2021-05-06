<?php
$db = new DB();
if (isset($_SESSION["usuario"])){
    $usuariologueado=unserialize($_SESSION["usuario"]);
    if($usuariologueado->getIdtipo()=='1'){
        $administrador = $db->getUsuario($usuariologueado->getIdusuario());
    }
} else {
    header('Location:../index.php');
}

 

    

