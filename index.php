<?php include 'inc/includes.php';
session_start();
$db = new DB();
if (isset($_GET["familia"]) && !empty($_GET['familia'])) {
    $familia = $db->getFamilia($_GET["familia"]);
    $listaEmpleos = $db->getEmpleosFamilia($familia);
} else {
    $listaEmpleos = $db->getAllEmpleos();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'inc/head.php' ?>
</head>

<?php

?>


<body>
    <?php include 'inc/header.php' ?>
    <main class="container">
        <div class="empleos-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <?php
            if (isset($familia)  && $familia != false) {
            ?>
                <h1 class="display-4">Ofertas de <?php echo $familia->getFamilia() ?></h1>
                <?php
                if (!$listaEmpleos) {
                    echo '<p class="lead">No hay ninguna oferta de empleo para esta categoria</p>';
                    echo '</div>';
                } else { ?>
                    <p class="lead">Infórmate de todas las ofertas de empleo disponibles, para la familia de <?php echo $familia->getFamilia(); ?>, poder aplicar necesitas estar registrado.</p>
        </div>
        <section>
            <?php
                    foreach ($listaEmpleos as $empleo) { ?>
                <?php
                        $familia = $db->getFamilia($empleo->getIdfamilia());
                        $empresa = $db->getEmpresa($empleo->getIdempresa());
                ?>
                <div class="row-cols-1">
                    <div class="card-deck mb-3 text-center">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal"><?php echo $empresa->getNombre() ?></h4>
                            </div>
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-1">
                                        <img class="d-none d-md-block img-fluid" src="assets/images/no-imagen.svg">
                                    </div>
                                    <div class="col-md-8 text-left">
                                        <h5 class="card-title pricing-card-title"><?php echo $familia->getFamilia(); ?> </h5>
                                        <p class="card-text"><?php echo $empleo->getDescripcion(); ?> </p>

                                        <button type="button" class="btn btn-lg btn-block btn-outline-primary">Inscríbite</button>
                                    </div>
                                    <div class="col-md-3">
                                        <img class="d-none d-md-block img-fluid" src="assets/images/<?php echo $familia->getNombre_imagen(); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <?php
                                echo $empleo->getFecha_publicacion();


                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                    } //fin del for each
            ?>
        </section><?php

                }
            } else { ?>
    <h1 class="display-4">Ofertas de Empleo</h1>
    <?php
                if (!$listaEmpleos) {
                    echo '<p class="lead">En estos momentos no hay disponible ninguna oferta de empleo</p>';
                    echo '</div>';
                } else { ?>
        <p class="lead">Infórmate de todas las ofertas de empleo disponibles, para poder aplicar necesitas estar registrado.</p>
        </div>
        <section>
            <?php
                    foreach ($listaEmpleos as $empleo) { ?>
                <?php
                        $familia = $db->getFamilia($empleo->getIdfamilia());
                        $empresa = $db->getEmpresa($empleo->getIdempresa());
                        if (empty($empresa->getLogo())) {
                            $empresa->setLogo('no-imagen.svg');
                        }
                ?>
                <div class="row-cols-1">
                    <div class="card-deck mb-3 text-center">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal"><?php echo $empresa->getNombre() ?></h4>
                            </div>
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-1">
                                        <img class="d-none d-md-block img-fluid" src="archivos_subidos/<?php echo $empresa->getLogo() ?>">
                                    </div>
                                    <div class="col-md-8 text-left">
                                        <h5 class="card-title pricing-card-title"><?php echo $familia->getFamilia(); ?> </h5>
                                        <p class="card-text"><?php echo $empleo->getDescripcion(); ?> </p>


                                        <?php
                                        if (isset($_SESSION["idusuario"])) {
                                            $titulado = $db->getUsuario($_SESSION["idusuario"]);
                                            if ($titulado->getTipousuario() == 'titulado') {
                                        ?>
                                                <button type="button" class="disabled btn btn-lg btn-block btn-primary" class="guardar_inscripcion" idempleo="<?php echo $empleo->getIdempleo() ?>">Inscríbite</button>
                                            <?php
                                            } else { ?>
                                                <button type="button" class="disabled btn btn-lg btn-block btn-outline-primary">Necesitas estar registrado</button>
                                            <?php
                                            }
                                        } else { ?>
                                            <button type="button" class="disabled btn btn-lg btn-block btn-outline-primary">Necesitas estar registrado para inscribirte</button>

                                        <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="col-md-3">
                                        <a href="index.php?familia=<?php echo $familia->getIdfamilia(); ?>"><img class="d-none d-md-block img-fluid" src="assets/images/<?php echo $familia->getNombre_imagen(); ?>">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <?php
                                echo $empleo->getFecha_publicacion();


                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                    } //fin del for each
            ?>
        </section>
<?php
                }
            } ?>


    </main>
    <?php include "inc/footer.php" ?>


    <?php include 'inc/scripts.php' ?>
</body>

</html>