<?php
include 'inc/includes.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    include 'inc/head.php';

    $administradores = $db->getAllTipoUsuario("administrador");
    ?>
</head>

<body>
    <?php include 'inc/header.php' ?>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="administrador.php">
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
                            <a class="nav-link" href="empleos.php">
                                <span data-feather="users"></span>
                                <i class="fas fa-briefcase"></i>Empleos
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <h3 class="my-0 ml-5 mt-3 mr-md-auto font-weight-normal">Administradores</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>

                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                                <th>Guardar</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                            <?php

                            foreach ($administradores as $admin) {
                                if ($admin->getIdadmin() == $administrador->getIdadmin()) {
                            ?>
                                    <form name="form<?php echo $admin->getIdadmin(); ?>" name="form<?php echo $admin->getIdadmin(); ?>" action="ajax/guardar_administrador" method="post" class="disable-autocomplete" autocomplete="off">
                                        <tr id="<?php echo $admin->getIdadmin(); ?>">
                                            <td><input type="text" class="form-control" name="nombre" value="<?php echo $admin->getNombre(); ?>"><input type="hidden" name="idusuario" value="<?php echo $admin->getIdusuario(); ?>"></td>
                                            <td><input type="text" class="form-control" name="apellidos" value="<?php echo $admin->getApellidos(); ?>"></td>
                                            <td><input type="text" class="form-control" name="email" value="<?php echo $admin->getEmail(); ?>"></td>

                                            <td class="accion">
                                                <a href="<?php echo $admin->getIdadmin(); ?>" class="save"><i class="fas fa-save fa-2x"></i></a>
                                            </td>
                                        </tr>

                                    </form>
                                <?php
                                } else {
                                ?>
                                    <tr id="<?php echo $admin->getIdadmin(); ?>">

                                        <td><?php echo $admin->getNombre(); ?></td>
                                        <td><?php echo $admin->getApellidos(); ?></td>
                                        <td><?php echo $admin->getEmail(); ?></td>
                                        <td class="accion"> </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </main>
        </div>
    </div>


    <?php include 'inc/scripts.php' ?>
    <script src="js/administrador.js"></script>

</body>

</html>