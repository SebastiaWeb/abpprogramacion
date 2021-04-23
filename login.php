<?php include './php/nav.php';?>
<?php include './php/bootstrap.php';

session_start();

//MAdamos la variable login a el archivo verify para poder modificar su valor si se inicia session correctamente
$_SESSION['login'] = false;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <div class="container bg-dark">
        <form class="form-login text-light" action="./php/verify.php" method="POST">

        <!-- INPUT EMAIL -->
        <div class="mb-3">
            <label for="emaillgn" class="form-label">Email address</label>
            <input name="emaillgn" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <!-- INPUT PASSWORD -->
        <div class="mb-3">
            <label for="passwordlgn" class="form-label">Password</label>
            <input name="passwordlgn" required type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <!-- BUTTON RECORD DATA -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Recordar usuario</label>
        </div>

        <!-- SUBMIT BUTTON -->
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>