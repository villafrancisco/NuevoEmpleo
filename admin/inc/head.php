<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/fontawesome/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="../assets/images/logo.ico" type="image/x-icon" />
    
    <?php
     require_once "../config/app.php";
     require_once '../includes/conexion.php';
     require_once '../includes/DB.php';
     require_once '../modelos/Usuario.php';
     require_once '../modelos/Administrador.php';
     require_once '../modelos/Empresa.php';
     require_once '../modelos/Familia.php';
     require_once '../modelos/Empleo.php';
     require_once '../modelos/Titulo.php';
     ?> 
    <title><?php echo EMPRESA ?></title>