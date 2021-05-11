<?php include 'inc/includes.php'; ?>
<?php
    session_start();
    $db = new DB();
    if (isset($_SESSION["idusuario"])) {
        $usuariologueado = $db->getUsuario($_SESSION["idusuario"]);
        if ($usuariologueado->getNameTipo() == 'administrador') {
            header('Location:admin/dashboard.php');
        }
    }
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'inc/head.php' ?>
    
</head>

<body>
    <div id="admin" class="container">
        <header class="index-header">
            <?php include 'inc/header.php' ?>
        </header>

        <section class="mh login">
            <div class="form-login">

                <h2>LOGIN - ADMINISTRADOR</h2>
                <form id="formLogin" action="ajax/login.php" method="POST">
                    <div class="form-login_item ">
                        <div id="alert" class="msj-alert">
                        </div>


                    </div>
                    <div class="form-login_item">
                        <i class="fas fa-user fa-lg"></i>
                        <input type="text" name="email" class="form-control" placeholder="email" id="email">
                    </div>
                    <div class="form-login_item">
                        <div id="loader" class="loader hide"></div>
                    </div>
                    <div class="form-login_item">
                        <i class="fas fa-key fa-lg"></i>
                        <input type="password" class="form-control" placeholder="contraseña" name="contrasena">
                    </div>

                    <div class="form-login_item">

                        <input type="submit" value="Entrar" class="btn" />
                    </div>
                </form>
            </div>
        </section>
        <footer>
            <small>Página realizada por Fr@ncisc@ Vill@</small>
        </footer>
    </div>
    <?php include 'inc/scripts.php' ?>
    <script src="js/login.js"></script>
</body>

</html>