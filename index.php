<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'inc/head.php' ?>
</head>
<body>
    <div id="index" class="container" >
        <header class="index-header">
        <?php include 'inc/cabecera.php' ?>
        </header>
        
        <section class="index-section">
            <!-- <h4>El portal de empleo para recien titulados de FP</h4> -->
            <div class="index-section_item"><a href="login.php?tipo=empresa"><i class="fas fa-building"></i> EMPRESAS</a></div>
            <div class="index-section_item"><a href="login.php?tipo=titulado"><i class="fas fa-graduation-cap"></i> TITULADOS</a></div>
            <div class="index-section_item"><a href="empleos.php"><i class="fas fa-briefcase"></i> OFERTAS DE EMPLEOS</a></div>
        </section>
        <footer>
            <small>Página realizada por Fr@ncisc@ Vill@</small>
            
        </footer>
        <div class="imagenfondo"></div>
    </div>
    

<?php include 'inc/scripts.php' ?>
</body>
</html>