
<?php 


require_once "../config/app.php";
require_once '../includes/conexion.php';
require_once '../includes/DB.php';
require_once '../modelos/Usuario.php';
require_once '../modelos/Empresa.php';
require_once '../modelos/Familia.php';
require_once '../modelos/Empleo.php';
require_once '../modelos/Titulo.php';



if(isset($_POST["email"]) && isset($_POST["contrasena"])){
    if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
        $email=$_POST["email"];
    }else{
        echo "email no valido";
    }
    if(isset($_POST["contrasena"])){
        $contrasena=$_POST["contrasena"];
    }
}
if($_POST["tipo"]=="empresa"){
    $tipo="empresas";
}elseif($_POST["tipo"]=="titulado"){
    $tipo="titulados";
}

$db=new DB();
$usuario=$db->login($email,$contrasena,$tipo);
if($usuario){
    echo $usuario->getEmail()."encontrado";
    
}else{
    echo "no econtrado";
}

?>