<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'inc/head.php' ?>
    

   
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div id="index" class="container-fluid bg-secondary">
        <header class="navbar navbar-dark bg-dark">
            <h1 class="text-light"><a href="index.php">NuevoEmpleo</a></h1>
        </header>
        
        <div class="container">
            
            <div class="d-flex justify-content-center h-100">
                
                <div class="card m-4 p4">
                    <div class="card-header">
                        <h3>Administrador</h3>
                    </div>
                    <div class="card-body">
                        <form id="formLogin">
                            
                                <div id="alert" class="alert alert-danger fade hide" role="alert">
                                    
                                </div>
                            
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="email" class="form-control" placeholder="email" id="email">
                                
                                
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="contraseña" name="contrasena">
                                
                                
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" value="Entrar" class="btn float-right login_btn bg-primary"/>
                               
                            </div>
                            
                            
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <?php include 'inc/scripts.php' ?> 
<script src="js/login.js"></script>
</body>
</html>