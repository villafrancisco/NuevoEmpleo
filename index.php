<?php include 'inc/includes.php';
session_start();
$db = new DB();
if (isset($_GET["familia"]) && !empty($_GET['familia'])) {
    $familia = $db->getFamilia($_GET["familia"]);
    $listaEmpleos = $db->getEmpleosFamilia($familia);
} else {
    $listaEmpleos = $db->getAllEmpleos();
}
$permisoInscribirse = false;
if (isset($_SESSION['idusuario'])) {
    $titulado = $db->getUsuario($_SESSION["idusuario"]);
    if ($titulado->getTipousuario() == 'titulado') {
        $inscripcionesTitulado = $db->getInscripcionesTitulado($titulado);

        if ($titulado->getTipousuario() == 'titulado') {
            $permisoInscribirse = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'inc/head.php' ?>
</head>


<body class="d-flex flex-column min-vh-100">
    <?php include 'inc/header.php' ?>
    <main class=" container">
        <div class="empleos-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <?php
            if (isset($familia)  && $familia != false) {
                echo '<h1 class="display-4">Ofertas de ' . $familia->getNombre() . '</h1>';
                if (!$listaEmpleos) {
                    echo '<p class="lead">No hay ninguna oferta de empleo para esta categoria</p>';
                } else {
                    echo '<p class="lead">Infórmate de todas las ofertas de empleo disponibles, para la familia de ' . $familia->getNombre() . ', para poder aplicar necesitas estar registrado.</p>';
                }
            } else {
                echo '<h1 class="display-4">Ofertas de Empleo</h1>';
                if (!$listaEmpleos) {
                    echo '<p class="lead">En estos momentos no hay disponible ninguna oferta de empleo</p>';
                } else {
                    echo '<p class="lead">Infórmate de todas las ofertas de empleo disponibles, para poder aplicar necesitas estar registrado.</p>';
                }
            } ?>
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
                                    <div class="col-md-3">
                                        <img class="d-none d-md-block img-fluid" src="archivos_subidos/<?php echo $empresa->getLogo() ?>">
                                    </div>
                                    <div class="col-md-9 text-left">
                                        <h5 class="card-title pricing-card-title"><?php echo $familia->getNombre(); ?> </h5>
                                        <p class="card-text"><?php echo $empleo->getDescripcion(); ?> </p>


                                        <?php

                                        if ($permisoInscribirse) { ?>
                                            <!-- tengo que mirar si el usuario ya está inscrito -->
                                            <?php

                                            $inscrito = false;

                                            foreach ($inscripcionesTitulado as $inscripcion) {

                                                if ($inscripcion->getIdempleo() == $empleo->getIdempleo()) {
                                                    $inscrito = true;
                                                }
                                            }
                                            if (!$inscrito) { ?>
                                                <button type="button" class="disabled btn btn-lg btn-block btn-primary guardar_inscripcion" idempleo="<?php echo $empleo->getIdempleo() ?>">Inscríbite</button>
                                            <?php
                                            } else { ?>
                                                <button type="button" class="disabled btn btn-lg btn-block btn-outline-primary" idempleo="<?php echo $empleo->getIdempleo() ?>">Ya estás inscrito</button>
                                            <?php
                                            } ?>
                                        <?php
                                        } else { ?>
                                            <a href="login.php?tipo=titulado" class="btn btn-lg btn-block btn-primary" idempleo="<?php echo $empleo->getIdempleo() ?>">Inscríbite</a>
                                        <?php
                                        }
                                        ?>

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
            <?php } ?>
        </section>
    </main>
    <?php include "inc/footer.php" ?>


    <?php include 'inc/scripts.php' ?>
</body>

</html>