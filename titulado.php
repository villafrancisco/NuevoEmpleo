<?php include 'inc/includes.php'; ?>
<?php
session_start();
$db = new DB();
if (isset($_SESSION["idusuario"])) {
    $usuariologueado = $db->getUsuario($_SESSION["idusuario"]);
    if ($usuariologueado->getNameTipo() == 'titulado') {
        $titulado = $db->getUsuario($usuariologueado->getIdusuario());
        $titulos = $db->getAlltitulos();
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
    <?php include 'inc/head.php'; ?>

</head>


<body>
    <div id="titulado" class="container">
        <header class="index-header">
            <?php include 'inc/header.php' ?>
        </header>
        <main class="main mh open-main" id="detalle-titulado">

            <form class="" action="#" method="POST">
                <div class="detalle-titulado">
                    <label for="nombre">Nombre: <span class="required">*</span></label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $titulado->getNombre(); ?>">
                    <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $titulado->getIdusuario(); ?>">
                </div>
                <div class="detalle-titulado">
                    <label for="apellidos">Apellidos: <span class="required">*</span></label>
                    <input type="text" name="apellidos" id="apellidos" value="<?php echo $titulado->getApellidos(); ?>">
                </div>
                <div class="detalle-titulado">
                    <label for="email">Email: <span class="required">*</span></label>
                    <input type="text" name="email" id="email" value="<?php echo $titulado->getEmail(); ?>"></input>
                </div>
                <div class="detalle-titulado">
                    <label for="direccion">Dirección: </label>
                    <input type="text" name="direccion" id="direccion" value="<?php echo $titulado->getDireccion(); ?>">
                </div>
                <div class="detalle-titulado">
                    <label for="dni">DNI: </label>
                    <input type="text" name="dni" id="dni" value="<?php echo $titulado->getDni(); ?>">
                </div>
                <div class="detalle-titulado">
                    <label for="telefono">Telefono: </label>
                    <input type="text" name="telefono" id="telefono" value="<?php echo $titulado->getTelefono(); ?>">
                </div>
                <div class="detalle-titulado">
                    <label for="curriculum">Curriculum: <span class="required">*</span></label>
                    <input type="text" name="curriculum" id="curriculum" value="<?php echo $titulado->getCurriculum(); ?>">
                </div>
                <div class="detalle-titulado">
                    <label for="foto">Foto: </label>
                    <input type="text" name="foto" id="foto" value="<?php echo $titulado->getFoto(); ?>">
                </div>


                <div class="detalle-titulado select">
                    <label>Titulacion: <span class="required">*</span></label>
                    
                    <button id="agregar_titulacion" class="btn">Añadir titulación</button>
                </div>

                <div class="detalle-titulado">
                    <button id="guardar_titulado" type="submit" class="btn"><i class="fas fa-save fa-2x"></i></button>
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