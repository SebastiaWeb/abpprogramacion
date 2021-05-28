<?php 
include './php/nav.php';
include './php/bootstrap.php';

// session_start();


$_SESSION['singup'] = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
</head>
<body>
    <div class="container bg-dark">
        <form class="text-light" action="./php/verify.php" method="POST">

        <!-- DNI -->
            <div class="mb-3"> 
                <label for="dni" class="form-label">Numero De Identificacion:</label>
                <input required name="dni" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Rellene el campo</div>
            </div>

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input required name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Rellene el campo</div>
            </div>

            <!-- Last-Name -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input required name="apellidos" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Rellene el campo</div>
            </div>

            <!-- Street -->
            <div class="mb-3">
                <label for="street" class="form-label">Dirrecion:</label>
                <input required name="street" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Rellene el campo</div>
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label for="phone" class="form-label">Telefono:</label>
                <input required name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Rellene el campo</div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Rellene el campo</div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input required name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>