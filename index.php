<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'inc/head.php' ?>
</head>
<body>
    <div id="index" class="container-fluid bg-secondary">
        <header class="navbar navbar-dark bg-dark">
        <?php include 'inc/cabecera.php' ?>
        </header>
        
        <div class="intro container">
            <h4 class="text-center text-light">El portal de empleo para recien titulados de FP</h4>
            <div class="intro-opc"><a href="login.php?tipo=empresa"  class="btn btn-primary btn-lg btn-block">EMPRESAS</a></div>
            <div class="intro-opc"><a href="login.php?tipo=titulado"  class="btn btn-primary btn-lg btn-block">TITULADOS</a></div>
            <div class="intro-opc"><a href="empleos.php"  class="btn btn-primary btn-lg btn-block">VER OFERTAS DE EMPLEOS</a></div>
        </div>
    </div>

<?php include 'inc/scripts.php' ?>
</body>
</html>