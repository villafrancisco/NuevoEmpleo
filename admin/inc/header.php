<nav class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
    <a class=" text-center navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#"><img src="../assets/images/logo.PNG" class="img-fluid logo"></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="my-0 ml-5 mr-md-auto font-weight-normal"><?php echo EMPRESA ?></h1>
    <ul class="navbar-nav px-3">
        <div>
            <?php
            if (isset($_SESSION["idusuario"])) {

            ?>
                <a href="<?php echo ($db->getUsuario($_SESSION['idusuario'])->getTipousuario() == 'administrador') ? "administrador" : $db->getUsuario($_SESSION['idusuario'])->getTipousuario(); ?>.php" class="m-1"><i class="fas fa-user fa-lg"></i></a>
                <a href="logout.php" class="m-1"><i class="fas fa-sign-out-alt fa-lg"></i></a>

            <?php
            } else { ?>
                <div class="dropdown dropleft">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Entrar
                    </button>
                    <div class="dropdown-menu " aria-labelledby="dropdownMenu2">
                        <a href="login.php?tipo=empresa" class="dropdown-item">Empresa</a>
                        <a href="login.php?tipo=titulado" class="dropdown-item">Titulado</a>

                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </ul>
</nav>