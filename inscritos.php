<?php include 'inc/includes.php'; ?>
<?php
session_start();
$db = new DB();
if (isset($_SESSION["idusuario"]) && isset($_GET['idempleo']) && !empty($_GET['idempleo'])) {
    $empresa = $db->getUsuario($_SESSION["idusuario"]);
    $empleo = $db->getEmpleo($_GET['idempleo']);
    $inscripciones = $db->getInscripciones($_GET['idempleo']);



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

        <!-- Ofertas de empleo publicada por la empresa -->
        <h1 class="display-4 text-center">Inscritos para la Oferta</h1>
        <p class="lead"><?php echo $empleo->getDescripcion(); ?></p>

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

                foreach ($inscripciones as $inscripcion) {
                    $titulado = $db->getUsuario($inscripcion->getIdtitulado());

                ?>
                    <tr>
                        <th scope="row"><?php echo $titulado->getFoto(); ?></th>
                        <td><?php echo $titulado->getNombre(); ?></td>
                        <td><?php echo $titulado->getApellidos(); ?></td>
                        <td><?php echo $titulado->getEmail(); ?></td>

                        <td><?php echo $titulado->getTelefono(); ?></td>
                        <td><?php echo $titulado->getCurriculum(); ?></td>
                        <td><?php echo $inscripcion->getFecha_inscripcion(); ?></td>

                    </tr>
                    </form>
                <?php
                }


                ?>
            </tbody>
        </table>

        </table>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="modal-empleo">
            Publicar empleo
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
                                        echo '<option value="' . $familia->getIdfamilia() . '" >' . $familia->getFamilia() . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="guardar_empleo" name="guardar_empleo">Guardar empleo</button>
                </div>
            </div>
        </div>
    </div>

    <?php include "inc/footer.php" ?>
    <?php include 'inc/scripts.php' ?>
    <script src="js/empresa.js"></script>

</body>

</html>