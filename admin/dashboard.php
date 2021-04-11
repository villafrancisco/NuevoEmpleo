<!DOCTYPE html>
<html lang="en">
<head>


    <?php include 'inc/head.php' ?>
    <?php 
    session_start();


    if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]->getIdTipo()==1){
        $db=new DB();
        $administrador=$db->getAdministrador($_SESSION["usuario"]->getIdusuario());
    }else{
        header('Location:../index.php');
    }

    ?>

    
</head>
<body>


<div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-dark border-right" id="sidebar-wrapper">
  <div class="sidebar-heading"><h3><i class="fas fa-user"></i>Administrador</h3> </div>
  <div class="list-group list-group-flush">
    <a href="#" class="list-group-item list-group-item-action bg-dark"><i class="fas fa-clipboard"></i>Administradores</a>
    <a href="#" class="list-group-item list-group-item-action bg-dark"><i class="fas fa-clipboard"></i>Empresas</a>
    <a href="#" class="list-group-item list-group-item-action bg-dark"><i class="fas fa-user-cog"></i>Titulados</a>
    
  </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
    <button class="btn btn-primary" id="menu-toggle">Menu</button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        
        <li class="nav-item">
          <a class="nav-link" id="link" href="#">
            <?php echo $administrador->getNombre(); ?>
            <i class="fas fa-cog"></i>

          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="link" href="#">
            <i class="fas fa-sign-out-alt"></i>
            Salir</a>
        </li>
        
      </ul>
    </div>
  </nav>

  <div class="container-fluid">
    <h1 class="mt-4">Simple Sidebar</h1>
    <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
    <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>
  </div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->




<!-- <div id="index" class="container-fluid bg-secondary">
      Navegación cabecera página   
    <nav class="navbar  fixed-top">
        <button id="sidebarCollapse" class="btn navbar-btn">
            <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand" href="">
        <h3 id="logo"></h3>
        </a>
        <div>
            <a class="nav-link" id="link" href="#">
            <i class="fas fa-sign-out-alt"></i>
            Salir</a>
        </div>
    </nav>
    <div class="wrapper fixed-left">
         Navegacion lateral 
       
   Navegacion lateral 

<nav id="sidebar">
        
            
        <div class="sidebar-header">
            <h3><i class="fas fa-user"></i>Empresa</h3>
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href=""><i class="fas fa-clipboard"></i>Datos personales</a>
            </li>
            <li>
                <a href=""><i class="fas fa-user-cog"></i>Ofertas publicadas</a>
            </li>
        </ul>
    </nav>


        
        
        
        <div id="content">
            contenido
        </div>
  </div> -->

  <?php include 'inc/scripts.php' ?>  
  <!-- <script>
      $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        
    });
});
  </script> -->
</body>
</html>