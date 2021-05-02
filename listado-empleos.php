<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'inc/head.php' ?>
</head>

<?php
$db = new DB();
if (isset($_GET["familia"]) && !empty($_GET['familia'])) {
    $familia = $db->getFamilia($_GET['familia']);
    $listaEmpleos = $db->getEmpleosFamilia($familia->getIdFamilia());
} else {
    $listaEmpleos = $db->getAllEmpleos();
}
?>

<body>
    <div id="listado" class="container">
        <header class="index-header">
            <?php include 'inc/header.php' ?>
        </header>
        <section class="mh listado-empleos">
            <div class="row">
                <?php if (isset($familia)) {
                ?>
                    <h4 class="text-center text-light col-sm-12">Ofertas de empleo de <?php echo $familia->getFamilia() ?></h4>
                <?php
                } else {
                ?>
                    <h4 class="text-center text-light col-sm-12">Listado de todas las ofertas de empleo</h4>
                <?php

                }
                ?>

                <?php
                if (isset($array_empleos)) {
                    if (count($array_empleos) != 0) {
                        foreach ($array_empleos as $empleo) {
                            //conseguir titulos requeridos
                            $titulos = $db->getTitulosEmpleo($empleo->getIdempleo());
                            $titulosaceptados = '';
                            echo '<div class="col-sm-6 mb-3">';
                            echo '  <div class="card h-100">';

                            echo '      <div class="card-body">';
                            echo '          <h5 class="card-title">Empresa: ' . $db->getEmpresaUsuario($empleo->getIdempresa())->getNombre() . ' </h5>';

                            echo '          <p class="card-text">Descripción de la oferta: ' . $empleo->getDescripcion() . '</p>';
                            echo '          <p class="card-text">Título requerido: </p>';

                            foreach ($titulos as $titulo) {
                                echo            '<p class="card-text">' . $titulo->getNombre() . '</p>';
                            }
                            echo '          <a href="#" class="btn btn-primary">Inscribirse</a>';
                            echo '      </div>';
                            echo '  </div>';
                            echo '</div>';
                        }
                    } else {
                        if (isset($familia)) {
                            echo 'No hay ninguna oferta en la categoria de ' . $familia->getFamilia();
                        } else {
                            echo 'No hay ninguna oferta de empleo.';
                        }
                    }
                } ?>

            </div>
        </section>
        <footer>
            <small>Página realizada por Fr@ncisc@ Vill@</small>
        </footer>
    </div>
    <?php include 'inc/scripts.php' ?>
</body>

</html>