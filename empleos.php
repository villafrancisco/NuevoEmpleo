<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'inc/head.php' ?>
</head>

<?php 
$db=new DB();
$array_familias=$db->getFamilias();
?>
<body>
    <div id="empleos" class="container">
        <header class="index-header">
            <?php include 'inc/cabecera.php' ?>
        </header>
        <section class="empleos-section">
            
            
            
            <?php foreach ($array_familias as $familia) {
              echo '<div class="card">';  
              echo      '<a href="listado-empleos.php?familia='.$familia->getIdfamilia().'">';
              echo          '<img src="assets/images/'.$familia->getNombre_imagen().'"';
              echo          '<h6>'.$familia->getFamilia().'</h6>';
              echo      '</a>';
              echo  '</div>';

             

            } ?>
            
 
             
        </section>
        <footer>
            <small>Página realizada por Fr@ncisc@ Vill@</small>
            
        </footer>
    </div>
    <?php include 'inc/scripts.php' ?>
</body>
</html>