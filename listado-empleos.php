<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'inc/head.php' ?>
</head>

<?php
$db = new DB();
if (isset($_GET["familia"]) && !empty($_GET['familia'])) {
    $familia = $db->getFamilia($_GET['familia']);
} else {
    $listaEmpleos = $db->getAllEmpleos();
}
?>
<!-- TODO HACER PAGINA  -->

<body>
    <div id="listado" class="container">
        <header class="index-header">
            <?php include 'inc/header.php' ?>
        </header>
        <section class="mh listado-empleos">
            <div class="row">
                <?php if (isset($familia) && $familia != false) {
                    $listaEmpleos = $db->getEmpleosFamilia($familia->getIdfamilia());
                ?>
                    <h4 class="text-center text-light col-sm-12">Ofertas de empleo de <?php echo $familia->getFamilia() ?></h4>
                    <?php
                    if (!$listaEmpleos) {
                        echo 'vacio';
                    }
                    foreach ($listaEmpleos as $empleo) {
                        echo '<p>' . $empleo->getDescripcion() . '</p>';
                    }

                    ?>


                <?php
                } else {
                ?>
                    <h4 class="text-center text-light col-sm-12">Listado de todas las ofertas de empleo</h4>
                <?php
                }
                ?>
            </div>
        </section>
        <footer>
            <small>Página realizada por Fr@ncisc@ Vill@</small>
        </footer>
    </div>
    <?php include 'inc/scripts.php' ?>
</body>

</html>