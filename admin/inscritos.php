<?php
include 'inc/includes.php';

if (!isset($_GET['idempleo']) || empty($_GET['idempleo'])) {
    header('Location:administrador.php');
}
$empleo = $db->getEmpleo($_GET['idempleo']);
$titulados_inscritos = $db->getInscritosEmpleo($empleo);
$inscripciones = $db->getAllInscripciones();

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
                                <a class="nav-link" href="titulados.php">
                                    <span data-feather="shopping-cart"></span>
                                    <i class="fas fa-graduation-cap"></i>Titulados
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="empleos.php">
                                    <span data-feather="users"></span>
                                    <i class="fas fa-briefcase"></i>Empleos
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <h3 class="my-0 ml-5 mt-3 mr-md-auto font-weight-normal">Inscritos en <?php echo $empleo->getDescripcion() ?></h3>

                    <?php
                    //TODO
                    if (empty($titulados_inscritos)) {
                        echo '<p class="text-center">No hay ningún inscrito en esta oferta de empleo</p>';
                    } else {
                    ?>
                        <table id="tabla_inscripciones" class="table table-hover table-responsive">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Curriculum</th>
                                    <th scope="col">Fecha inscripción</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($titulados_inscritos as $titulado) {
                                    foreach ($inscripciones as $inscripcion) {
                                        if ($inscripcion->getIdempleo() == $empleo->getIdempleo() && $inscripcion->getIdtitulado() == $titulado->getIdtitulado()) {
                                            $fecha_inscripcion = $inscripcion->getFecha_inscripcion();
                                        }
                                    }
                                ?>
                                    <tr>
                                        <td><img class="img-fluid img-thumbnail foto-imagen" src="../archivos_subidos/<?php echo $titulado->getFoto(); ?>"></td>
                                        <td><?php echo $titulado->getNombre(); ?></td>
                                        <td><?php echo $titulado->getApellidos(); ?></td>
                                        <td><?php echo $titulado->getEmail(); ?></td>

                                        <td><?php echo $titulado->getTelefono(); ?></td>
                                        <td><a target="_blank" href="../archivos_subidos/<?php echo $titulado->getCurriculum(); ?>"><img class="img-fluid foto-cv img-icon-pdf" src="../assets/images/iconopdf.png"></a></td>
                                        <td><?php echo $fecha_inscripcion; ?></td>


                                    </tr>
                                    </form>
                                <?php
                                }


                                ?>
                            </tbody>

                        </table>
                    <?php
                    }
                    ?>

                </main>
            </div>
        </div>
        <?php include 'inc/scripts.php' ?>

</body>

</html>