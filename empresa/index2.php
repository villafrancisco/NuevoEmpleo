<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'inc/head.php' ?>
</head>
<body>





<div id="index" class="container-fluid bg-secondary">
      <!-- Navegación cabecera página    -->
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
         <!-- Navegacion lateral  -->
       
   <!-- Navegacion lateral  -->

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
  </div> 

  <?php include 'inc/scripts.php' ?>  
  <script>
      $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        
    });
});
  </script>
</body>
</html>