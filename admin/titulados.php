<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'inc/head.php' ?>
    <?php include 'inc/authorize.php' ?>
    <?php
    //Array con todos los titulados
    $titulados = $db->getAllUsuariosTipo('titulado');
    if (isset($_GET['id'])) {
        $titulado = $db->getUsuario($_GET['id']);
        if ($titulado) {
            $titulado->setListaTitulos($titulado);
            $titulos = $db->getAllTitulos();
        }
    }
    ?>
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
        <?php if (!isset($_GET['id']) || !$titulado) {
        ?>
            <main class="main mh open-main">

                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Email</th>

                            <th scope="col">DNI</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Familia Profesional</th>

                            <th scope="col">Fecha Registro</th>
                            <th scope="col">Ver/Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($titulados as $titulado) {
                            $titulado->setListaTitulos($db->getTitulacionUsuario($titulado));
                            foreach($titulado->getListaTitulos() as $titulo){
                                echo $titulo->getNombre();
                            };
                            exit();
                            
                           
                        ?>
                            
                            <form name="form<?php echo $titulado->getIdtitulado(); ?>" name="form<?php echo $titulado->getIdtitulado(); ?>" action="ajax/guardar_titulado" method="post" class="disable-autocomplete" autocomplete="off">
                                <tr id="<?php echo $titulado->getIdtitulado(); ?>">
                                    <th scope="row"><?php echo $titulado->getIdtitulado(); ?></th>
                                    <td><?php echo $titulado->getNombre(); ?></td>
                                    <td><?php echo $titulado->getApellidos(); ?></td>
                                    <td><?php echo $titulado->getEmail(); ?></td>

                                    <td><?php echo $titulado->getDni(); ?></td>
                                    <td><?php echo $titulado->getTelefono(); ?></td>
                                    <td>
                                        <?php
                                        // var_dump($titulo=$titulado->getListaTitulos()[0]->getNombre());
                                        // echo $titulo->getNombre();
                                        ?>
                                    </td>


                                    <td><?php echo $titulado->getFecha_registro(); ?></td>
                                    <td class="accion">
                                        <a href="titulados.php?id=<?php echo $titulado->getIdusuario(); ?>" class="ver"><i class="fas fa-eye fa-2x"></i></i></a>

                                    </td>
                                </tr>
                            </form>
                        <?php
                        }


                        ?>
                    </tbody>
                </table>

            </main>
        <?php
        } else {
        ?>
            <main class="main mh open-main detalle">

                <form id="detalle-titulado" class="table" action="#" method="POST">
                    <div class="detalle-titulado">
                    <div class="detalle-titulado__item">
                            <label>Id:</label>
                            <p><?php echo $titulado->getIdTitulado(); ?></p>
                        </div>
                        <div class="detalle-titulado__item">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" value="<?php echo $titulado->getNombre(); ?>">
                        </div>
                        <div class="detalle-titulado__item">
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" name="apellidos" value="<?php echo $titulado->getApellidos(); ?>">
                        </div>
                        <div class="detalle-titulado__item">
                            <label for="email">Email: </label>
                            <input type="text" name="email" value="<?php echo $titulado->getEmail(); ?>"></input>
                        </div>
                        <div class="detalle-titulado__item">
                            <label for="direccion">Dirección: </label>
                            <input type="text" name="direccion" value="<?php echo $titulado->getDireccion(); ?>">
                        </div>
                        <div class="detalle-titulado__item">
                            <label for="dni">DNI:</label>
                            <input type="text" name="dni" value="<?php echo $titulado->getDni(); ?>">
                        </div>
                        <div class="detalle-titulado__item">
                            <label for="telefono">Telefono:</label>
                            <input type="text" name="telefono" value="<?php echo $titulado->getTelefono(); ?>">
                        </div>

                    </div>
                    <div class="detalle-titulado">
                        <div class="detalle-titulado__item">
                            <label for="curriculum">Curriculum:</label>
                            <input type="text" name="curriculum" value="<?php echo $titulado->getCurriculum(); ?>">
                        </div>
                        <div class="detalle-titulado__item">
                            <label for="foto">Foto: </label>
                            <input type="text" name="foto" value="<?php echo $titulado->getFoto(); ?>">
                        </div>
                        <div class="detalle-titulado__item">
                            <label for="fecha_registro">Fecha registro:</label>
                            <input type="text" name="fecha_registro" value="<?php echo $titulado->getFecha_registro(); ?>">
                        </div>

                        <?php foreach ($titulostitulado as $titulotitulado) {
                        ?>
                            <div class="detalle-titulado__item">
                                <label for="titulacion">Titulacion: </label>
                                <select name="titulacion">
                                    <?php
                                    foreach ($titulos as $titulo) {
                                    ?>
                                        <option value="<?php echo $titulo->getIdtitulo(); ?>" selected="<?php $titulo->getIdtitulo == $titulotitulado->getIdtitulo ? true : false ?>"><?php echo $titulo->getNombre(); ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </form>
                <table class="table">
                    <h2>Listado de inscripciones en Ofertas de Empleo</h2>
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Email</th>

                            <th scope="col">DNI</th>
                            <th scope="col">Teléfono</th>


                            <th scope="col">Fecha Registro</th>
                            <th scope="col">Ver/Guardar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($titulados as $titulado) {
                        ?>
                            <form name="form<?php echo $titulado->getIdtitulado(); ?>" name="form<?php echo $titulado->getIdtitulado(); ?>" action="ajax/guardar_titulado" method="post" class="disable-autocomplete" autocomplete="off">
                                <tr id="<?php echo $titulado->getIdtitulado(); ?>">
                                    <th scope="row"><?php echo $titulado->getIdtitulado(); ?></th>
                                    <td><input type="text" name="nombre" value="<?php echo $titulado->getNombre(); ?>"><input type="hidden" name="idusuario" value="<?php echo $titulado->getIdusuario(); ?>"></td>
                                    <td><input type="text" name="apellidos" value="<?php echo $titulado->getApellidos(); ?>"></td>
                                    <td><input type="text" name="email" value="<?php echo $titulado->getEmail(); ?>"></td>

                                    <td><input type="text" name="dni" value="<?php echo $titulado->getDni(); ?>"></td>
                                    <td><input type="text" name="telefono" value="<?php echo $titulado->getTelefono(); ?>"></td>


                                    <td><input type="text" name="fecha_registro" value="<?php echo $titulado->getFecha_registro(); ?>"></td>
                                    <td class="accion">
                                        <a href="titulados.php?id=<?php echo $titulado->getIdusuario(); ?>" class="ver"><i class="fas fa-eye fa-2x"></i></i></a>
                                        <a href="<?php echo $titulado->getIdtitulado(); ?>" class="save"><i class="fas fa-save fa-2x"></i></a>
                                    </td>
                                </tr>
                            </form>
                        <?php
                        }


                        ?>
                    </tbody>
                </table>


            </main>
        <?php
        }
        ?>
        <footer class="footer open-main">footer</footer>
    </div>
    <?php include 'inc/scripts.php' ?>
    <script src="js/sidenav.js"></script>
</body>

</html>