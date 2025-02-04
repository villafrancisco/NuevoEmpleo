<?php
include 'inc/includes.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'inc/head.php' ?>

    <?php
    
    $titulados = $db->getAllTipoUsuario('titulado');

    ?>
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
                    <h3 class="my-0 ml-5 mt-3 mr-md-auto font-weight-normal">Titulados</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Ver Inscripciones</th>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Email</th>
                                    <th>DNI</th>
                                    <th>Teléfono</th>
                                    <th scope="col">Fecha Registro</th>
                                    <th>Curriculum</th>

                                </tr>
                            </thead>
                            <tbody class="table-striped">
                                <?php

                                foreach ($titulados as $titulado) {

                                ?>
                                    <form name="form<?php echo $titulado->getIdtitulado(); ?>" name="form<?php echo $titulado->getIdtitulado(); ?>" action="ajax/guardar_titulado" method="post" class="disable-autocomplete" autocomplete="off">
                                        <tr id="<?php echo $titulado->getIdtitulado(); ?>">
                                            <th><a href="inscripciones.php?idtitulado=<?php echo $titulado->getIdtitulado(); ?>">Ver Inscripciones</a></th>
                                            <th><img class="img-fluid foto-imagen" src="../archivos_subidos/<?php echo $titulado->getFoto(); ?>" alt=""></th>
                                            <td><?php echo $titulado->getNombre(); ?></td>
                                            <td><?php echo $titulado->getApellidos(); ?></td>
                                            <td><?php echo $titulado->getEmail(); ?></td>

                                            <td><?php echo $titulado->getDni(); ?></td>
                                            <td><?php echo $titulado->getTelefono(); ?></td>

                                            <td><?php echo $titulado->getFecha_registro(); ?></td>
                                            <td><a href="../archivos_subidos/<?php echo $titulado->getCurriculum(); ?>"><img class="img-fluid foto-cv" src="../assets/images/iconopdf.png" alt="curriculum"></a></td>

                                        </tr>
                                    </form>
                                <?php
                                }


                                ?>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
        <?php include 'inc/scripts.php' ?>
</body>

</html>