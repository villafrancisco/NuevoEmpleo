<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'inc/head.php' ?>
</head>
<?php 
if(isset($_GET["tipo"]) && ($_GET["tipo"]=="empresa" || $_GET["tipo"]=="titulado")){
    $tipo=$_GET["tipo"];
}
?>
<body>
    <div id="login" class="container">
        <header class="login-header">
            <?php include 'inc/header.php' ?>
        </header>
        
        <section class="mh login">
            <?php 
            if(isset($tipo)){
            ?>
                <div class="form-login">
                        <h2>Login - <?php echo $tipo ?></h2>
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
            <?php 
            }else{
                header("Location: index.php");
            } ?>
        </section>
        <footer>
            <small>Página realizada por Fr@ncisc@ Vill@</small>
        </footer>
    </div>

    <?php include 'inc/scripts.php' ?> 
<script src="js/login.js"></script>
</body>
</html>