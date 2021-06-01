<header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <div class="logo">
            <img class="img-fluid" src="assets/images/logo.PNG" alt="logo">
        </div>
        <h5 class="my-0 mr-md-auto font-weight-normal"><?php echo EMPRESA ?></h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="index.php">Empleos</a>
            <a class="p-2 text-dark" href="familias.php">Categorias</a>

        </nav>

        <div class="d-flex d-sm-inline-flex justify-content-center align-items-center ">
            <div>
                <?php
                if (isset($_SESSION["idusuario"])) {

                ?>
                    <a href="<?php echo ($db->getUsuario($_SESSION['idusuario'])->getTipousuario() == 'administrador') ? "admin/administrador" : $db->getUsuario($_SESSION['idusuario'])->getTipousuario(); ?>.php" class="m-1"><i class="fas fa-user fa-lg"></i></a>
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

        </div>

    </div>
</header>