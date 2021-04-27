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
  <!-- <div id="admin" class="container">
        <header class="index-header">
            <?php include 'inc/header.php' ?>
        </header>
        <section class="mh">

        </section>
        <footer>
            <small>Página realizada por Fr@ncisc@ Vill@</small>
        </footer>
  </div> -->
  <div class="grid-container">
        
        <header class="header index-header">
            <?php include 'inc/header.php' ?>
        </header>

        <aside class="sidenav">aside
        </aside>

        <main class="main">main</main>
        <footer class="footer">footer</footer>
    </div>
  <?php include 'inc/scripts.php' ?>  
  <script src="js/sidenav.js"></script>
</body>
</html>