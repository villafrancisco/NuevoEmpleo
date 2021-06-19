<?php include 'inc/includes.php'; ?>
<?php
session_start();
$db = new DB();
if (isset($_SESSION["idusuario"])) {
    $empresa = $db->getUsuario($_SESSION["idusuario"]);
    $familias = $db->getAllFamilias();


    if ($empresa->getTipousuario() != 'empresa') {
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
        <div class="empleos-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h4 id="nombre_empresa"><?php echo $empresa->getNombre(); ?></h4>
        </div>
        <form enctype="multipart/form-data" action="ajax/guardar_empresa">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombre">Nombre: <span class="required">*</span></label>
                    <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $empresa->getNombre(); ?>" title="nombre">
                    <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $empresa->getIdusuario(); ?>">


                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email: <span class="required">*</span></label>
                    <input type="text" class="form-control" title="email" name="email" id="email" value="<?php echo $empresa->getEmail(); ?>"></input>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="direccion">Dirección: <span class="required">*</span></label>
                    <input type="text" class="form-control" name="direccion" title="direccion" id="direccion" value="<?php echo $empresa->getDireccion(); ?>">

                </div>
                <div class="form-group col-md-6">
                    <label for="telefono">Telefono: <span class="required">*</span></label>
                    <input type="text" class="form-control" name="telefono" title="telefono" id="telefono" value="<?php echo $empresa->getTelefono(); ?>">

                </div>
            </div>



            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="custom-file">
                        <input type="file" title="logo" class="custom-file-input" id="logoinput" aria-describedby="inputGroupFileAddon01" name="logo" accept="image/*" fotocargada="<?php echo ($empresa->getLogo() != "") ? "true" :  "false" ?>">
                        <label class="custom-file-label" for="logo">Elige un logo <span class="required">* Solo archivos de imagen</span></label>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div id="drop-zone-logo" class="drop-zone">
                        <i class="fas fa-file-upload"></i>
                        <p class="drop-zone__text">Arrastra el archivo o click para subir el logotipo, solo archivos de imágen

                        </p>
                    </div>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="imagen-foto" id="imagen-logo">
                        <?php if ($empresa->getLogo() != "") {
                            echo '<img class="img-fluid foto-perfil"  src="archivos_subidos/' . $empresa->getLogo() . '" />';
                        }
                        ?>

                    </div>
                </div>
            </div>

            <button id="guardar_empresa" name="guardar_empresa" type="submit" class="btn btn-primary" title="Guardar">Guardar</button>
        </form>
        <!-- Ofertas de empleo publicada por la empresa -->
        <h1 class="display-4 text-center">Ofertas de empleo publicadas</h1>

        <table id="tabla_empleos" class="table table-hover table-responsive">

        </table>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="modal-empleo" title="Publicar empleo">
            Publicar Nueva Oferta de Empleo
        </button>

    </main>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Publicar Oferta de Empleo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="form_guardar_empleo" action="ajax/guardar_empleo">
                        <div class="form-row">
                            <div class="form-group col-md-12">


                                <label for="descripcion">Descripcion de la oferta de empleo: <span class="required">*</span></label>
                                <textarea class="form-control" title="Descripcion" name="descripcion" id="descripcion" rows="3"></textarea>
                                <input type="hidden" id="idempleo" name="idempleo">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="Familia">Familia Profesional: <span class="required">*</span></label>
                                <select id="familia" class="form-control">
                                    <option value="0" selected>Elige una Familia Profesional</option>
                                    <?php
                                    foreach ($familias as $familia) {
                                        echo '<option value="' . $familia->getIdfamilia() . '" >' . $familia->getNombre() . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="guardar_empleo" name="guardar_empleo">Pubicar Oferta de Empleo</button>
                </div>
            </div>
        </div>
    </div>

    <?php include "inc/footer.php" ?>
    <?php include 'inc/scripts.php' ?>
    <script src="js/empresa.js"></script>

</body>

</html>