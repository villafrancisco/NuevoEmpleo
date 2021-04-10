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
    <div class="container-fluid bg-secondary">
        <header class="navbar navbar-dark bg-dark">
            <?php include 'inc/cabecera.php' ?>
        </header>
        <div class="listado-categorias container">
            <h4 class="text-center text-light">Ofertas de empleo</h4>
            <div class="row row-cols-2  row-cols-sm-2 row-cols-md-4 ">
            
            <?php foreach ($array_familias as $familia) {
              echo '<div class="col mb-4">';
              echo '<div class="card h-100">';
              echo '<a href="listado-empleos.php?familia='.$familia->getIdfamilia().'">';
              echo '<img src="imagenes/'.$familia->getNombre_imagen().'"              class="card-img-top" alt="...">';
              echo '<div class="card-body">';
              echo '<h6 class="text-center card-title">'.$familia->getFamilia().'</h6>';
              echo '</a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';

            } ?>
            </div>
 
             
        </div>
    </div>
    <?php include 'inc/scripts.php' ?>
</body>
</html>