<?php 
    include './php/conection.php';


    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if($_GET['alert']){
        $user = 'admin';
        $pass = 'admin';
    }
    if($_GET['delite']){
        $user = 'admin';
        $pass = 'admin';
    }
    if($_GET['add']){
        $user = 'admin';
        $pass = 'admin';
    }
    if($_GET['edit']){
        $user = 'admin';
        $pass = 'admin';
    }

    $advertencia = 'true';
    $warning = 'false';
    $sql = "SELECT * FROM `CPU`";
    $product = mysqli_query($coon, $sql);
    $data = mysqli_query($coon, 'select * from CPU');

    if($user != null && $pass != null){

        $result = mysqli_query($coon, 'select * from ADMINISTRADOR');

        foreach($result as $login){
            if($login['users'] == $user && $login['pass'] == $pass){
                
            }else{
                $warning = 'false';
                header ('Location: ./login.php?warning='.$warning);
                exit();
            }
        }


    }else{
        $advertencia = 'false';
        header ('Location: ./login.php?advertencia='.$advertencia);
        exit();
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/styleadmin.css">
</head>
<body class="position-relative">
    <main class="main-admin container-xxl">
        <div class="row">
            <form class="main-admin__add col" enctype='multipart/form-data' action="./php/add.php" method="POST">
                <h3>AGREGAR PRODUCTO</h3>
                <p>
                    <label for="imagen">Imagen:</label>
                    <input type="file" name="imagen" class="form-control">
                </p>
                <p>
                    <span for="cod">Codigo:</span>
                    <input type="text" name="cod" class="form-control" placeholder="Codigo">
                </p>
                <p>
                    <label for="modelo" id="addon-wrapping">Modelo: </label>
                    <input type="text" name="modelo" class="form-control" placeholder="Modelo">
                </p>
                <p>
                    <label for="memPrincipal" id="addon-wrapping">Memoria Principal: </label>
                    <input type="text" name="memPrincipal" class="form-control" placeholder="Memoria Principal">
                </p>
                <?php 
                    $key = $_GET['alert'];
                    if($key){?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Rellena todos los campos.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                   <?php }?> 

                    <?php 
                    $error = $_GET['error'];
                    if($error){?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Hubo un error al cargar tus datos - RECUERDA NO PUEDES REPETIR EL CODIGO DEL PRODUCTO
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                   <?php }?> 

                   <?php 
                    $add = $_GET['add'];
                    if($add){?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            AGREGADO CORRECTAMENTE A LA BASE DE DATOS
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                   <?php }?> 
                
                <input type="submit" name="add" class="btn btn-success col-5 mt-4" value="Add"></input>
            </form>
            <section class="main-admin__show col-7">
                <table class="table table-dark table-hover" id="tabla-product">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Codigo</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Memoria Principal</th>
                            <th scope="col-2">UPDATE OR DELETE</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach($data as $row){?>
                        <tr>
                            <th scope="row">1</th>
                            <td><?php echo $row['cod_cpu'];?></td>
                            <td><?php echo $row['modelo'];?></td>
                            <td colspan="1"><?php echo $row['mem_principal'];?></td> 
                            <td colspan="2"><a class="btn btn-warning btnUpdate" href="./php/edit.php?id=<?php echo $row['cod_cpu'];?>">Update</a><a href="./php/delit.php?id=<?php echo $row['cod_cpu'];?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </section>
        </div>
        <form class="container col-6 mx-auto mt-5" action="./php/add.php" method="POST">
            
            
            
        </form>
    </main>

</body>
</html>