<?php
include 'inc/includes.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'inc/head.php' ?>

    <?php
    //Array con todos los titulados
    $empleos = $db->getAllEmpleos();

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
                    <h3 class="my-0 ml-5 mt-3 mr-md-auto font-weight-normal">Empleos</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Logotipo</th>
                                    <th>Empresa</th>
                                    <th>Descripcion</th>
                                    <th>Fecha Publicación</th>
                                </tr>
                            </thead>
                            <tbody class="table-striped">
                                <?php

                                foreach ($empleos as $empleo) {

                                ?>

                                    <tr id="<?php echo $empleo->getIdempleo(); ?>">
                                        <td><img class="img-fluid foto-imagen" src="../archivos_subidos/<?php echo $db->getEmpresa($empleo->getIdempresa())->getLogo(); ?>" alt=""></td>
                                        <td><?php echo $db->getEmpresa($empleo->getIdempresa())->getNombre(); ?></td>
                                        <td><?php echo $empleo->getDescripcion(); ?></td>
                                        <td><?php echo $empleo->getFecha_publicacion(); ?></td>


                                    </tr>

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