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
                <form id="formLogin" action="#" method="GET">
                    <div id="alert">
                    </div>
                    <div class="form-login_item">
                        <i class="fas fa-user fa-lg"></i>
                        <input type="text" name="email" class="form-control redondeadonorelieve" placeholder="email" id="email">
                    </div>
                    <div class="form-login_item">
                        <i class="fas fa-key fa-lg"></i>
                        <input type="password" class="form-control redondeadonorelieve" placeholder="contraseña" name="contrasena">
                    </div>
                    <div class="form-login_item">
                        <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
                    </div>
                    <div class="form-login_item">
                        <input type="submit" value="Entrar" class="btn"/>
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