<?php include 'inc/includes.php'; ?>
<?php
session_start();
    $db = new DB();
    if (isset($_SESSION["idusuario"])) {
        $usuariologueado = $db->getUsuario($_SESSION["idusuario"]);
        if ($usuariologueado->getNameTipo() == 'titulado') {
            $titulado = $db->getUsuario($usuariologueado->getIdusuario());
            $titulos =$db->getAlltitulos();
        } else {
            header('Location:index.php');
        }
    } else {
        header('Location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'inc/head.php';?>
    
</head>


<body>
    <div id="titulado" class="container">
        <header class="index-header">
            <?php include 'inc/header.php' ?>
        </header>
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


                <?php

                if (is_array($titulado->getListaTitulos()) || is_object($titulado->getListaTitulos())) {

                    foreach ($titulado->getListaTitulos() as $titulo) {

                ?>
                        <div class="detalle-titulado select">
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
        <footer>
            <small>Página realizada por Fr@ncisc@ Vill@</small>

        </footer>
    </div>
    <?php include 'inc/scripts.php' ?>

</body>

</html>