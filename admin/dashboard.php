<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'inc/head.php' ?>
    <?php 
    // session_start();
    // if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]->getIdTipo()==1){
    //     $db=new DB();
    //     $administrador=$db->getAdministrador($_SESSION["usuario"]->getIdusuario());
    // }else{
    //     header('Location:../index.php');
    // }
    ?>
</head>
<body>
  
  <div class="container">
  
        <header class="header open-main index-header">
            <?php include 'inc/header.php' ?>
        </header>
        <aside class="sidenav open">
            <i class="fas fa-times fa-2x "></i>
            <ul>
                <li><a href="#"><i class="fas fa-user"></i>Administrador</a></li>
                <li><a href="#"><i class="fas fa-building"></i>Empresas</a></li>
                <li><a href="#"><i class="fas fa-graduation-cap"></i>Titulados</a></li>
                <li><a href="#"><i class="fas fa-briefcase"></i>Empleos</a></li>

            </ul>
        </aside>

        

        <main class="main mh open-main">main</main>
        <footer class="footer open-main">footer</footer>
    </div>
  <?php include 'inc/scripts.php' ?>  
  <script src="js/sidenav.js"></script>
</body>
</html>