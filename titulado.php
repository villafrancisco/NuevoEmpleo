<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'inc/head.php';
    $db = new DB();
    if (isset($_SESSION["usuario"])) {
        $usuariologueado = unserialize($_SESSION["usuario"]);
        if ($usuariologueado->getIdtipo() != '3') {
            header('Location:../index.php');
        }
    }
    ?>
</head>


<body>
    <div id="empleos" class="container">
        <header class="index-header">
            <?php include 'inc/header.php' ?>
        </header>
        <main class="main mh open-main" id="detalle-titulado">

            <form class="" action="#" method="POST">
                <div class="detalle-titulado">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $usuariologueado->getNombre(); ?>">
                </div>
                <div class="detalle-titulado">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" name="apellidos" value="<?php echo $usuariologueado->getApellidos(); ?>">
                </div>
                <div class="detalle-titulado">
                    <label for="email">Email: </label>
                    <input type="text" name="email" value="<?php echo $usuariologueado->getEmail(); ?>"></input>
                </div>
                <div class="detalle-titulado">
                    <label for="direccion">Dirección: </label>
                    <input type="text" name="direccion" value="<?php echo $usuariologueado->getDireccion(); ?>">
                </div>
                <div class="detalle-titulado">
                    <label for="dni">DNI:</label>
                    <input type="text" name="dni" value="<?php echo $usuariologueado->getDni(); ?>">
                </div>
                <div class="detalle-titulado">
                    <label for="telefono">Telefono:</label>
                    <input type="text" name="telefono" value="<?php echo $usuariologueado->getTelefono(); ?>">
                </div>
                <div class="detalle-titulado">
                    <label for="curriculum">Curriculum:</label>
                    <input type="text" name="curriculum" value="<?php echo $usuariologueado->getCurriculum(); ?>">
                </div>
                <div class="detalle-titulado">
                    <label for="foto">Foto: </label>
                    <input type="text" name="foto" value="<?php echo $usuariologueado->getFoto(); ?>">
                </div>
                <div class="detalle-titulado">
                    <label for="fecha_registro">Fecha registro:</label>
                    <input type="text" name="fecha_registro" value="<?php echo $usuariologueado->getFecha_registro(); ?>">
                </div>

                <?php

                if (is_array($usuariologueado->getListaTitulos()) || is_object($usuariologueado->getListaTitulos())) {

                    foreach ($usuariologueado->getListaTitulos() as $titulo) {

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
                    foreach ($usuariologueado->getLista_empleos_inscrito() as $empleo) {
                    ?>
                        <form name="form<?php echo $usuariologueado->getIdtitulado(); ?>" name="form<?php echo $usuariologueado->getIdtitulado(); ?>" action="ajax/guardar_titulado" method="post" class="disable-autocomplete" autocomplete="off">
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
        <footer>
            <small>Página realizada por Fr@ncisc@ Vill@</small>

        </footer>
    </div>
    <?php include 'inc/scripts.php' ?>

</body>

</html>