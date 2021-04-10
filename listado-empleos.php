<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'inc/head.php' ?>
</head>

<?php 
$db=new DB();
if(isset($_GET["familia"])){
    $array_empleos=$db->getEmpleosFamilia($_GET["familia"]);
    $familia=$db->getFamilia($_GET['familia']);
}
?>
<body>
    <div class="container-fluid bg-secondary">
        <header class="navbar navbar-dark bg-dark">
            <?php include 'inc/cabecera.php' ?>
        </header>
        <div class="listado-categorias container">
            <div class="row">
                <h4 class="text-center text-light col-sm-12">Ofertas de empleo de <?php echo $familia->getFamilia() ?></h4>
            <?php 
            if(isset($array_empleos) && isset($familia)){
                if(count($array_empleos)!=0){
                    foreach ($array_empleos as $empleo) {
                    //conseguir titulos requeridos
                    $titulos=$db->getTitulosEmpleo($empleo->getIdempleo());
                    $titulosaceptados='';
                    echo '<div class="col-sm-6 mb-3">';
                    echo '  <div class="card h-100">';
                    
                    echo '      <div class="card-body">';
                    echo '          <h5 class="card-title">Empresa: '.$db->getEmpresa($empleo->getIdempresa())->getNombre().' </h5>';
                    
                    echo '          <p class="card-text">Descripción de la oferta: '.$empleo->getDescripcion().'</p>';
                    echo '          <p class="card-text">Título requerido: </p>';
                    
                    foreach($titulos as $titulo){
                    echo            '<p class="card-text">'.$titulo->getNombre().'</p>';
                    }
                    echo '          <a href="#" class="btn btn-primary">Inscribirse</a>';
                    echo '      </div>';
                    echo '  </div>';
                    echo '</div>';
                    }
                }else{
                echo 'No hay ninguna oferta en la categoria de '.$familia->getFamilia();
                }
            } ?>
            
            </div>
        </div>
    </div>
    <?php include 'inc/scripts.php' ?>
</body>
</html>