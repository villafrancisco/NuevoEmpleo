<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'inc/head.php' ?>
    <?php include 'inc/authorize.php'?>
</head>
<body>
  
  <div class="container">
  
        <header class="header open-main index-header">
            <?php include 'inc/header.php' ?>
        </header>
        <aside class="sidenav open">
            <i class="fas fa-times fa-2x "></i>
            <ul>
                <li><a href="dashboard.php" class="active"><i class="fas fa-user"></i>Administrador</a></li>
                <li><a href="empresas.php"><i class="fas fa-building"></i>Empresas</a></li>
                <li><a href="titulados.php"><i class="fas fa-graduation-cap"></i>Titulados</a></li>
                <li><a href="empleos.php"><i class="fas fa-briefcase"></i>Empleos</a></li>

            </ul>
        </aside>

        <main class="main mh open-main">
        <table class="table">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Guardar</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                <th><?php echo $administrador->getIdadmin(); ?></th>
                <td><input type="text" value="<?php echo $administrador->getNombre(); ?>"></td>
                <td><input type="text" value="<?php echo $administrador->getApellidos(); ?>"></td>
                <td><input type="text" value="<?php echo $administrador->getEmail(); ?>"></td>
                <td><input type="password" value="password"></td>
                </tr>
                
            </tbody>
        </table>
        </main>
        <footer class="footer open-main">footer</footer>
    </div>
  <?php include 'inc/scripts.php' ?>  
  <script src="js/sidenav.js"></script>
</body>
</html>