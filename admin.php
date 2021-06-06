<?php include 'inc/includes.php'; ?>
<?php
session_start();
$db = new DB();
if (isset($_SESSION["idusuario"])) {
    $usuariologueado = $db->getUsuario($_SESSION["idusuario"]);
    if ($usuariologueado->getTipousuario() == 'administrador') {
        header('Location:admin/administrador.php');
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'inc/head.php' ?>
    <link rel="stylesheet" href="css/login.css">
</head>

<body class="text-center">

    <form class="form-signin" id="formLogin" action="ajax/login.php" method="POST">
        <a href="index.php"><img class="mb-4" src="assets/images/logo.PNG" alt="logotipo" width="80px" title="logotipo NuevoEmpleo"></a>
        <h1 class="h3 mb-3 font-weight-normal">Login - Administrador</h1>

        <div id="alert" class="bg-danger rounded-top "></div>
        <label for="email" class="sr-only">Email</label>
        <input type="email" accesskey="e" id="email" title="email" name="email" class="form-control" placeholder="Email" required autofocus>
        <label for="contrasena" class="sr-only">Contraseña</label>
        <input type="password" accesskey="c" title="contrasena" id="contrasena" name="contrasena" class="form-control" placeholder="Contraseña" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" id="remember" value="remember-me"> Recuérdame
            </label>
        </div>
        <div id="loader" class="loader hide"></div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" title="Entrar" accesskey="e">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
    </form>
    <script src="js/login.js"></script>
    <script src="js/validation.js"></script>
</body>

</html>