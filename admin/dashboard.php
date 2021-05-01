<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'inc/head.php' ?>
    <?php include 'inc/authorize.php' ?>
    <?php
    $administradores = $db->getAdministradores();
    ?>
</head>

<body>

    <div class="container">

        <header class="header open-main index-header">
            <?php include 'inc/header.php' ?>
        </header>
        <aside class="sidenav open">
            <i class="fas fa-times fa-2x "></i>
            <ul>
                <li><a href="dashboard.php" class="active"><i class="fas fa-user"></i>Administrador</a></li>
                <li><a href="empresas.php"><i class="fas fa-building"></i>Empresas</a></li>
                <li><a href="titulados.php"><i class="fas fa-graduation-cap"></i>Titulados</a></li>
                <li><a href="empleos.php"><i class="fas fa-briefcase"></i>Empleos</a></li>

            </ul>
        </aside>

        <main class="main mh open-main">
            <div class="table-responsive-lg">
                <table class="table ">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Email</th>

                            <th scope="col">Guardar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($administradores as $admin) {
                        ?>
                            <form name="form<?php echo $admin->getIdadmin(); ?>" name="form<?php echo $admin->getIdadmin(); ?>" action="ajax/guardar_administrador" method="post" class="disable-autocomplete" autocomplete="off">
                                <tr id="<?php echo $admin->getIdadmin(); ?>">
                                    <th scope="row"><?php echo $admin->getIdadmin(); ?></th>
                                    <td><input type="text" name="nombre" value="<?php echo $admin->getNombre(); ?>"><input type="hidden" name="idusuario" value="<?php echo $admin->getIdusuario(); ?>"></td>
                                    <td><input type="text" name="apellidos" value="<?php echo $admin->getApellidos(); ?>"></td>
                                    <td><input type="text" name="email" value="<?php echo $admin->getEmail(); ?>"></td>

                                    <td class="accion">
                                        <?php
                                        if ($admin->getIdadmin() == $administrador->getIdadmin()) {
                                        ?>

                                            <a href="<?php echo $admin->getIdadmin(); ?>" class="save"><i class="fas fa-save fa-2x"></i></a>
                                        <?php
                                        }
                                        ?>

                                    </td>
                                </tr>
                            </form>
                        <?php
                        }


                        ?>
                    </tbody>
                </table>
            </div>
        </main>
        <footer class="footer open-main">footer</footer>
    </div>
    <?php include 'inc/scripts.php' ?>
    <script src="js/sidenav.js"></script>
</body>

</html>