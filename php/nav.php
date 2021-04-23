<?php 
    include 'bootstrap.php';
    session_start();

    // Guardara el nombre de la pagina
    $title = 'TECNOLOGIA INFORMATICA';

    // if(isset($_SESSION['singup'])){
    //     unset($_SESSION['singup']);
    // }

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
    <meta name="viewport" content="width=device-width, initial-scale=no">
    <title>TECNOLOGIA INFORMATICA</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/b2f5365d34.js" crossorigin="anonymous"></script>
   
</head>
<body>

    <!-- If para validar si se inicio session o no -->
    <?php  if(!$session){    ?> <!-- Si no ha iniciado -->

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="/" class="navbar-brand"><?php echo $title;?></a>

                <form class="d-flex">
                
                <!-- Nombre del usuario -->
                <a href="../login.php" class="btn btn-outline-secondary me-2" type="submit">Login</a>

                <!-- Cerrar Session -->
                <a href="../registrar.php" class="btn btn-outline-success" type="submit">Registrar</a>
                </form>

            </div>
        </nav>
    </header>
    <?php }else{?> <!-- Si ya iniciado -->

        <!-- <li><a href="../login.php">Login</a></li>
        <li><a href="../registrar.php">Registrar</a></li> -->


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="/" class="navbar-brand"><?php echo $title;?></a>

            <form class="d-flex">
            
            <!-- Nombre del usuario -->
            <a class="btn btn-outline-secondary me-2" type="submit"><?php echo $user;?></a>

            <!-- Cerrar Session -->
            <a href="php/verify.php" class="btn btn-outline-success" type="submit">Cerrar Session</a>
            </form>

        </div>
    </nav>

    <?php }?>

    <script src="../js/jquery.js"></script>
    <script src="../js/index.js"></script>
</body>
