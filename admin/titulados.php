<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'inc/head.php' ?>
    <?php 
    // session_start();
    // if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]->getIdTipo()==1){
    //     $db=new DB();
    //     $administrador=$db->getAdministrador($_SESSION["usuario"]->getIdusuario());
    // }else{
    //     header('Location:../index.php');
    // }
    // ?>
</head>
<body>
  
  <div class="container">
  
        <header class="header open-main index-header">
            <?php include 'inc/header.php' ?>
        </header>
        <aside class="sidenav open">
            <i class="fas fa-times fa-2x "></i>
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-user"></i>Administrador</a></li>
                <li><a href="empresas.php"><i class="fas fa-building"></i>Empresas</a></li>
                <li><a href="titulados.php" class="active"><i class="fas fa-graduation-cap"></i>Titulados</a></li>
                <li><a href="empleos.php"><i class="fas fa-briefcase"></i>Empleos</a></li>

            </ul>
        </aside>

        <main class="main mh open-main">
        <table class="table">
            <thead>
                <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>DNI</th>
                <th>Fecha registro</th>
                <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>
                        <a href="#"><i class="fas fa-pen"></i></a>
                        <a href="#"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <tr>
                <th>1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                </tr>
                <tr>
                <th>1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
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