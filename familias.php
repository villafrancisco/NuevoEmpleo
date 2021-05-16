<?php
include 'inc/includes.php';
session_start();

$db = new DB();
$listaFamilias = $db->getAllFamilias();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'inc/head.php' ?>
</head>



<body>
    <?php include 'inc/header.php' ?>
    <main class="container">
        <div class="empleos-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Busca tu Profesión</h1>

        </div>
        <section>

            <div class="row">

                <?php foreach ($listaFamilias as $familia) { ?>

                    <div class="col-sm-3 mb-3">

                        <a href="index.php?familia=<?php echo $familia->getIdfamilia(); ?>">
                            <div class="card card-familia">
                                <img class="card-img-top" src="assets/images/<?php echo $familia->getNombre_imagen() ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h6 class="card-title text-center"> <?php echo $familia->getFamilia(); ?></h6>
                                </div>
                            </div>
                        </a>
                    </div>




                <?php
                } ?>


            </div>

        </section>
    </main>
    <?php include "inc/footer.php" ?>
    <?php include 'inc/scripts.php' ?>

</body>

</html>