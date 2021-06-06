<?php include 'inc/includes.php'; ?>
<?php
session_start();
$db = new DB();
if (isset($_SESSION["idusuario"])) {
    $titulado = $db->getUsuario($_SESSION["idusuario"]);
    $titulaciones = $db->getAlltitulos();
    if ($titulado->getTipousuario() != 'titulado') {
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
    <?php include 'inc/header.php' ?>
    <main class="container">
        <form enctype="multipart/form-data" action="ajax/guardar_titulado">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombre">Nombre: <span class="required">*</span></label>
                    <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $titulado->getNombre(); ?>">
                    <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $titulado->getIdusuario(); ?>">


                </div>
                <div class="form-group col-md-6">
                    <label for="apellidos">Apellidos: <span class="required">*</span></label>
                    <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $titulado->getApellidos(); ?>">

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email: <span class="required">*</span></label>
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $titulado->getEmail(); ?>"></input>

                </div>
                <div class="form-group col-md-6">
                    <label for="telefono">Telefono: <span class="required">*</span></label>
                    <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $titulado->getTelefono(); ?>">

                </div>
            </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="direccion">Dirección: <span class="required">*</span></label>
                    <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $titulado->getDireccion(); ?>">

                </div>
                <div class="form-group col-md-6">
                    <label for="dni">DNI: <span class="required">*</span></label>
                    <input type="text" class="form-control" name="dni" id="dni" value="<?php echo $titulado->getDni(); ?>">

                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="titulacion">Titulación <span class="required">*</span></label>
                    <select id="titulacion" class="form-control">
                        <option value="0" selected>Elige una titulación</option>
                        <?php
                        foreach ($titulaciones as $titulacion) {
                            if ($titulacion->getIdtitulo() == $titulado->getIdtitulo()) {
                                echo '<option value="' . $titulacion->getIdtitulo() . '" selected >' . $titulacion->getNombre() . '</option>';
                            } else {
                                echo '<option value="' . $titulacion->getIdtitulo() . '" >' . $titulacion->getNombre() . '</option>';
                            }
                        }
                        ?>


                    </select>





                </div>


            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="fotoinput" aria-describedby="inputGroupFileAddon01" name="foto" accept="image/*" fotocargada="<?php echo ($titulado->getFoto() != "") ? "true" :  "false" ?>">
                        <label class="custom-file-label" for="foto">Elige una foto <span class="required">* Solo archivos de imagen</span></label>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div id="drop-zone-foto" class="drop-zone">
                        <i class="fas fa-file-upload"></i>
                        <p class="drop-zone__text">Arrastra el archivo o click para subir la foto, solo archivos de imágen
                        <div class="imagen-foto" id="imagen-foto">
                            <?php if ($titulado->getFoto() != "") {
                                echo '<img class="img-fluid" src="archivos_subidos/' . $titulado->getFoto() . '" />';
                            }
                            ?>

                        </div>
                        </p>
                    </div>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="curriculuminput" accept=".pdf" aria-describedby="inputGroupFileAddon01" fotocargada="<?php echo ($titulado->getCurriculum() != "") ? "true" :  "false" ?>">
                        <label class="custom-file-label" for="curriculum">Elige curriculum <span class="required">* (Solo PDF)</span></label>
                    </div>

                </div>
                <div class="form-group col-md-6">
                    <div class="imagen-foto" id="imagen-cv">
                        <?php if ($titulado->getCurriculum() != "") {
                            echo '<a target="_blank" href="archivos_subidos/' . $titulado->getCurriculum() . '">';
                            echo '<img class="img-fluid  img-icon-pdf" src="assets/images/iconopdf.png" />';
                            echo '</a>';
                            echo '<p>' . explode("/", $titulado->getCurriculum())[2] . '</p>';
                        }
                        ?>
                    </div>

                </div>
            </div>
            <button id="guardar_titulado" name="guardar_titulado" type="submit" class="btn btn-primary">Guardar</button>



        </form>
        <h1 class="display-4 text-center">Inscripciones en Ofertas</h1>

        <?php
        //TODO
        if (empty($db->getInscripcionesTitulado($titulado))) {
            echo '<p class="text-center">No te has inscrito en ninguna oferta</p>';
        } else {
        ?>
            <table id="tabla_inscripciones" class="table table-hover">

            </table>
        <?php
        }
        ?>

    </main>

    <?php include "inc/footer.php" ?>
    <?php include 'inc/scripts.php' ?>
    <script src="js/titulado.js"></script>

</body>

</html>