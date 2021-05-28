<?php 
    include 'bootstrap.php';
    include 'icon.php';
    session_start();

    // Guardara el nombre de la pagina
    $title = 'TECNOLOGIA INFORMATICA';

//  Verificamos si existen las cookies 
    $session = (isset($_COOKIE['login'])) ? $_COOKIE['login']:false;
    $user = (isset($_COOKIE['user'])) ? $_COOKIE['user']:false;

    $logout = (isset($_COOKIE['login'])) ? true:false;
    if($logout){
        setcookie("logout", $logout, time() + 86400, "/");
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TECNOLOGIA INFORMATICA</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/b2f5365d34.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
</head>

<body>

    <!-- If para validar si se inicio session o no -->
    <?php  if(!$session){    ?>
    <!-- Si no ha iniciado -->

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="/" class="navbar-brand"><?php echo $title;?></a>

                <form class="d-flex">

                    <!-- Nombre del usuario -->
                    <a href="../login.php" class="btn btn-outline-secondary me-2 text-white" type="submit">Login</a>

                    <!-- Cerrar Session -->
                    <a href="../registrar.php" class="btn btn-outline-success " type="submit">Registrar</a>
                </form>

            </div>
        </nav>
    </header>
    <?php }else{?>
    <!-- Si ya iniciado -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="/" class="navbar-brand"><?php echo $title;?></a>

            <form class="d-flex">

                <!-- Cart Shop -->
                <a class="btn btn-outline-secondary me-2 text-white" id="btn-num" type="submit" onclick="toCart()"><?php echo $icons['cart'];?></a>

                <!-- Nombre del usuario -->
                <a class="btn btn-outline-secondary me-2 text-white" type="submit"><?php echo $user;?></a>

                <!-- Cerrar Session -->
                <a href="php/verify.php" class="btn btn-outline-success" type="submit">Cerrar Session</a>
            </form>

        </div>
    </nav>

    <?php }?>

</body>