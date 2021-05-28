<?php 
    include './php/conection.php';

    // $result = mysqli_query($coon, 'select * from ADMINISTRADOR');
    
    $advertencia = $_GET['advertencia'];
    $advertencia = (boolean) $advertencia;

    $warning = $_GET['warning'];
    $warning = (boolean) $warning;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/stylelogin.css">
</head>
<body>
    <div class="container">
            <h2>ADMINISTRADOR</h2>
            <div class="formulario">
                <form action="admin.php" method="POST">
                    <p>
                        <label for="name">Users: </label>
                        <input type="text" name="user">
                        
                    </p>

                    <p>
                        <label for="pass">Password: </label>
                        <input type="text" name="pass">
                    </p>

                    <?php if($advertencia){ ?>
                            <span class="warning">Rellene todos los datos</span>
                    <?php } ?>

                    <?php if($warning){ ?>
                            <span class="warning">Datos incorrectos</span>
                    <?php }else{
                        session_start();
                    } ?>

                    <input type="submit" name="login" value="Login">
                    <?php ?>
                </form>
            </div>
    </div>
</body>
</html>