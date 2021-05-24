<?php
include 'inc/includes.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    include 'inc/head.php';
    //Array con todos los administradores
    $administradores = $db->getAllTipoUsuario("administrador");
    ?>
</head>

<body>
    <?php include 'inc/header.php' ?>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span data-feather="home"></span>
                                Administrador <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file"></span>
                                Empresas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span>
                                Titulados
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Empleos
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <h3 class="my-0 ml-5 mt-3 mr-md-auto font-weight-normal">Administrador</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">

                    </table>
                </div>
            </main>
        </div>
    </div>


    <?php include 'inc/scripts.php' ?>

</body>

</html>