<?php
include 'inc/includes.php';

if (!isset($_GET['idtitulado']) || empty($_GET['idtitulado'])) {
    header('Location:administrador.php');
}
$titulado = $db->getTitulado($_GET['idtitulado']);
$inscripciones = $db->getInscripcionesTitulado($titulado);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'inc/head.php' ?>


</head>

<body>
    <?php include 'inc/header.php' ?>
    <div class="container">

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="administrador.php">
                                    <span data-feather="home"></span>
                                    <i class="fas fa-user"></i>Administradores<span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="empresas.php">
                                    <span data-feather="file"></span>
                                    <i class="fas fa-building"></i>Empresas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="titulados.php">
                                    <span data-feather="shopping-cart"></span>
                                    <i class="fas fa-graduation-cap"></i>Titulados
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="empleos.php">
                                    <span data-feather="users"></span>
                                    <i class="fas fa-briefcase"></i>Empleos
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <h3 class="my-0 ml-5 mt-3 mr-md-auto font-weight-normal">Inscripciones realizadas por <?php echo $titulado->getNombre() . " " . $titulado->getApellidos(); ?></h3>
                    <input type="hidden" id="idtitulado" value="<?php echo $titulado->getIdtitulado(); ?>">
                    <?php
                    //TODO
                    if (empty($inscripciones)) {
                        echo '<p class="text-center">No se ha inscrito en ninguna oferta</p>';
                    } else {
                    ?>
                        <table id="tabla_inscripciones" class="table table-hover table-responsive">

                        </table>
                    <?php
                    }
                    ?>

                </main>
            </div>
        </div>
        <?php include 'inc/scripts.php' ?>
        <script src="js/inscripciones.js"></script>
</body>

</html>