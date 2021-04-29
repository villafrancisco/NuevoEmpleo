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
        <div class="table-responsive-lg">
            <table class="table ">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        
                        <th scope="col">Editar/Guardar</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr id="<?php echo $administrador->getIdadmin(); ?>">
                    <th scope="row"><?php echo $administrador->getIdadmin(); ?></th>
                    <td><input readonly type="text" value="<?php echo $administrador->getNombre(); ?>"></td>
                    <td><input readonly type="text" value="<?php echo $administrador->getApellidos(); ?>"></td>
                    <td><input  readonly type="text" value="<?php echo $administrador->getEmail(); ?>"></td>
                    
                    <td class="accion"><a href="<?php echo $administrador->getIdadmin(); ?>" class="edit" ><i class="fas fa-edit fa-2x"></i></a><a href="<?php echo $administrador->getIdadmin(); ?>" class="save"><i class="fas fa-save fa-2x"></i></a></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        </main>
        <footer class="footer open-main">footer</footer>
    </div>
  <?php include 'inc/scripts.php' ?>  
  <script src="js/sidenav.js"></script>
</body>
</html>