    <?php 
        include './conection.php';
        
        session_start();

        $id = $_SESSION['id'];

        $result = mysqli_query($coon,"SELECT * FROM CPU");
        $modelo;
        $memPrincipal;
        if($result){
            foreach($result as $row){
                if($row['cod_cpu'] == $id){
                    $modelo = $row['modelo'];
                    $memPrincipal = $row['mem_principal'];
                }
            }

            if(isset($_POST['edit'])){
                $modelo = $_POST['modelo'];
                $memPrincipal = $_POST['memPrincipal'];
                $id = $_SESSION['id'];

                $update = mysqli_query($coon, "update CPU set modelo = '$modelo', mem_principal = '$memPrincipal' where CPU.cod_cpu = '$id'");

                if($update){
                    header('Location: ../admin.php');
                }else {
                    echo 'incorrecto';
                }
            }
        }

 
    ?>
    <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </head>
    
    <div class="update container-xl position-absolute">
            <form class="main-admin__add col" enctype='multipart/form-data' method="POST">
                    <h3>EDITAR PRODUCTO</h3>
                    <p>
                        <label for="imagen">Imagen:</label>
                        <input type="file" name="imagen" class="form-control">
                    </p>
                    <p>
                        <span for="cod">Codigo:</span>
                        <input type="text" name="cod" class="form-control" placeholder="Codigo" value="<?php echo $id;?>" disabled="disabled">
                    </p>
                    <p>
                        <label for="modelo" id="addon-wrapping">Modelo: </label>
                        <input type="text" name="modelo" class="form-control" placeholder="Modelo" value="<?php echo $modelo;?>">
                    </p>
                    <p>
                        <label for="memPrincipal" id="addon-wrapping">Memoria Principal: </label>
                        <input type="text" name="memPrincipal" class="form-control" placeholder="Memoria Principal" value="<?php echo $memPrincipal;?>">
                    </p>
                    <input type="submit" name="edit" class="btn btn-success col-5 mt-4" value="Editar"></input>
                </form>
        </div>

    <script src="./js/jquery.js"></script>
    <script src="./js/index.js"></script>