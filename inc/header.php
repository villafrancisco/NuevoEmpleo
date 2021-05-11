<img class="logo" id="logo" src="assets/images/logo.PNG" alt="logo">
<h1><a href="index.php"><?php echo EMPRESA ?></a></h1>

<div class="options">
    
    <label class="switch">
        <input type="checkbox" id="checkbox" />
        <span class="slider round"></span>
    </label>
    <?php if (isset($_SESSION["idusuario"])) {
     echo '<a href="logout.php"><i class="fas fa-sign-out-alt fa-2x"></i></a>';
    }
    ?>
   
</div>



