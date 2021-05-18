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

$db = new DB();

if(isset($_POST["descripcion"]) && isset($_POST["familia"])){
    $usuarioactualizar = $db->getUsuario($_SESSION['idusuario']);
    $row['idempresa']=$usuarioactualizar->getIdempresa();
    $row['idfamilia']=$_POST["familia"];
    $row['descripcion']=$_POST["descripcion"];

    $empleo=new Empleo($row);
    
    if($db->createEmpleo($empleo)){
       $data['status'] = 'ok';
       $data['result'] = $db->getEmpleosUsuario($usuarioactualizar);

    }

    echo json_encode($data);
    
    
    
}


    
 
    
    

