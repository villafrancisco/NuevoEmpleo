<?php include 'inc/includes.php'; ?>
<?php
session_start();
$db = new DB();
if (isset($_SESSION["idusuario"]) && isset($_GET['idempleo']) && !empty($_GET['idempleo'])) {
    $empresa = $db->getUsuario($_SESSION["idusuario"]);
    $empleo = $db->getEmpleo($_GET['idempleo']);
    $inscritos = $db->getInscritosEmpleo($empleo);
    $inscripciones = $db->getAllInscripciones();


    if ($empresa->getTipousuario() != 'empresa') {
        header('Location:empresa.php');
    }
} else {
    header('Location:empresa.php');
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
            <a href="empresa.php" class="text-decoration-none">
                <div class="card text-center">
                    <div class="card-header">
                        <?php echo $empresa->getNombre(); ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $empleo->getDescripcion(); ?></h5>
                    </div>

                </div>
            </a>

        </div>




        <?php
        if (!empty($inscritos)) { ?>

            <table id="tabla_inscritos" class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Curriculum</th>
                        <th scope="col">Fecha Inscripcion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($inscritos as $titulado) {
                        foreach ($inscripciones as $inscripcion) {
                            if ($inscripcion->getIdempleo() == $empleo->getIdempleo() && $inscripcion->getIdtitulado() == $titulado->getIdtitulado()) {
                                $fecha_inscripcion = $inscripcion->getFecha_inscripcion();
                            }
                        }
                    ?>
                        <tr>
                            <td><img class="img-fluid img-thumbnail foto-imagen" src="archivos_subidos/<?php echo $titulado->getFoto(); ?>"></td>
                            <td><?php echo $titulado->getNombre(); ?></td>
                            <td><?php echo $titulado->getApellidos(); ?></td>
                            <td><?php echo $titulado->getEmail(); ?></td>

                            <td><?php echo $titulado->getTelefono(); ?></td>
                            <td><a target="_blank" href="archivos_subidos/<?php echo $titulado->getCurriculum(); ?>"><img class="img-fluid img-icon-pdf" src="assets/images/iconopdf.png"></a></td>
                            <td><?php echo $fecha_inscripcion; ?></td>


                        </tr>
                        </form>
                    <?php
                    }


                    ?>
                </tbody>


            </table>
        <?php } else {
            echo '<p class="text-center">No hay ningún inscrito para esta oferta</p>';
        } ?>
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
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
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

            </div>
        </div>
    </div>

    <?php include "inc/footer.php" ?>
    <?php include 'inc/scripts.php' ?>


</body>

</html>