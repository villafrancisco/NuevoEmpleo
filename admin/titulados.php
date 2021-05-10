<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'inc/head.php' ?>
    <?php include 'inc/authorize.php' ?>
    <?php
    //Array con todos los titulados
    $titulados = $db->getAllUsuariosTipo('titulado');
    if (isset($_GET['id'])) {
        $titulado = $db->getUsuario($_GET['id']);
        if ($titulado) {
            $titulos = $db->getAllTitulos();
        }
    }
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
                <li><a href="dashboard.php"><i class="fas fa-user"></i>Administrador</a></li>
                <li><a href="empresas.php"><i class="fas fa-building"></i>Empresas</a></li>
                <li><a href="titulados.php" class="active"><i class="fas fa-graduation-cap"></i>Titulados</a></li>
                <li><a href="empleos.php"><i class="fas fa-briefcase"></i>Empleos</a></li>

            </ul>
        </aside>
        <?php if (!isset($_GET['id']) || !$titulado) {
        ?>
            <main class="main mh open-main">

                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Email</th>

                            <th scope="col">DNI</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Familia Profesional</th>

                            <th scope="col">Fecha Registro</th>
                            <th scope="col">Ver/Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($titulados as $titulado) {

                        ?>
                            <form name="form<?php echo $titulado->getIdtitulado(); ?>" name="form<?php echo $titulado->getIdtitulado(); ?>" action="ajax/guardar_titulado" method="post" class="disable-autocomplete" autocomplete="off">
                                <tr id="<?php echo $titulado->getIdtitulado(); ?>">
                                    <th scope="row"><?php echo $titulado->getIdtitulado(); ?></th>
                                    <td><?php echo $titulado->getNombre(); ?></td>
                                    <td><?php echo $titulado->getApellidos(); ?></td>
                                    <td><?php echo $titulado->getEmail(); ?></td>

                                    <td><?php echo $titulado->getDni(); ?></td>
                                    <td><?php echo $titulado->getTelefono(); ?></td>
                                    <td>
                                        <?php
                                        foreach ($titulado->getFamiliasTitulado() as $idfamilia) {
                                            echo '<p>' . $db->getFamilia($idfamilia)->getFamilia() . '</p>';
                                        }

                                        ?>

                                    </td>
                                    <td><?php echo $titulado->getFecha_registro(); ?></td>
                                    <td class="accion">
                                        <a href="titulados.php?id=<?php echo $titulado->getIdusuario(); ?>" class="ver"><i class="fas fa-eye fa-2x"></i></i></a>

                                    </td>
                                </tr>
                            </form>
                        <?php
                        }


                        ?>
                    </tbody>
                </table>

            </main>
        <?php
        } else {
        ?>
            <main class="main mh open-main" id="detalle-titulado">

                <form class="" action="#" method="POST">
                    <div class="detalle-titulado">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" value="<?php echo $titulado->getNombre(); ?>">
                    </div>
                    <div class="detalle-titulado">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" name="apellidos" value="<?php echo $titulado->getApellidos(); ?>">
                    </div>
                    <div class="detalle-titulado">
                        <label for="email">Email: </label>
                        <input type="text" name="email" value="<?php echo $titulado->getEmail(); ?>"></input>
                    </div>
                    <div class="detalle-titulado">
                        <label for="direccion">Dirección: </label>
                        <input type="text" name="direccion" value="<?php echo $titulado->getDireccion(); ?>">
                    </div>
                    <div class="detalle-titulado">
                        <label for="dni">DNI:</label>
                        <input type="text" name="dni" value="<?php echo $titulado->getDni(); ?>">
                    </div>
                    <div class="detalle-titulado">
                        <label for="telefono">Telefono:</label>
                        <input type="text" name="telefono" value="<?php echo $titulado->getTelefono(); ?>">
                    </div>
                    <div class="detalle-titulado">
                        <label for="curriculum">Curriculum:</label>
                        <input type="text" name="curriculum" value="<?php echo $titulado->getCurriculum(); ?>">
                    </div>
                    <div class="detalle-titulado">
                        <label for="foto">Foto: </label>
                        <input type="text" name="foto" value="<?php echo $titulado->getFoto(); ?>">
                    </div>
                    <div class="detalle-titulado">
                        <label for="fecha_registro">Fecha registro:</label>
                        <input type="text" name="fecha_registro" value="<?php echo $titulado->getFecha_registro(); ?>">
                    </div>

                    <?php

                    if (is_array($titulado->getListaTitulos()) || is_object($titulado->getListaTitulos())) {

                        foreach ($titulado->getListaTitulos() as $titulo) {

                    ?>
                            <div class="detalle-titulado">
                                <label for="titulacion">Titulacion: </label>
                                <select name="titulacion">
                                    <?php
                                    foreach ($titulos as $t) {

                                    ?>
                                        <option value="<?php echo $t->getIdtitulo(); ?>" <?php echo ($titulo->getIdtitulo() == $t->getIdtitulo()) ? 'selected' : 'false' ?>><?php echo $t->getNombre(); ?></option>
                                    <?php
                                    } //fin del foreach
                                    ?>
                                </select>
                            </div>
                    <?php
                        } //fin del for each
                    } //fin del if
                    ?>


                    <div class="detalle-titulado">
                        <input type="submit" name="guardar" value="Guardar">
                    </div>

                </form>
                <table class="table">

                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Empresa</th>
                            <th scope="col">Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($titulado->getLista_empleos_inscrito() as $empleo) {
                        ?>
                            <form name="form<?php echo $titulado->getIdtitulado(); ?>" name="form<?php echo $titulado->getIdtitulado(); ?>" action="ajax/guardar_titulado" method="post" class="disable-autocomplete" autocomplete="off">
                                <tr id="<?php echo $empleo->getIdEmpleo(); ?>">

                                    <td><?php echo $empleo->getIdEmpleo(); ?></td>
                                    <td><?php echo $empleo->getDescripcion(); ?></td>

                                </tr>
                            </form>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </main>
        <?php
        }
        ?>
        <footer class="footer open-main">footer</footer>
    </div>
    <?php include 'inc/scripts.php' ?>
    <script src="js/sidenav.js"></script>
</body>

</html>