<?php 
    $key = false;
    $cod = $_POST['cod'];
    $modelo = $_POST['modelo'];
    $memPrincipal = $_POST['memPrincipal'];

    if($cod == null && $modelo == null && $memPrincipal == null){
        $key = true;
        header('Location: ../admin.php?alert='.$key);
        exit();
    }

    include './conection.php';

    try {
            
        // Obtenemos el nombre de la imagen
        $nameimg = $_FILES['imagen']['name'];
        // Obtenemos el archivo 
        $archimg = $_FILES['imagen']['tmp_name'];
        $typeimg = $_FILES['imagen']['type'];
        $tamanio = $_FILES['imagen']['size'];
                
            if($nameimg != null && $archimg != null){
                //la ruta de donde estara ubicada la imagen
                $ruta = '/img/cpu';

                $ruta = $ruta.'/'.$nameimg;
                var_dump($archimg);

                $imgContenido = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
                // $imgContenido = fopen($_FILES['imagen']['tmp_name'], 'r');
                // $binarioImg = fread($imgContenido, $tamanio);

                //Lo montamos en la carpeta
                // move_uploaded_file($archimg, $ruta);
                // $binarioImg = mysqli_escape_string($coon, $binarioImg);
                $query = mysqli_query($coon,"INSERT INTO CPU VALUES('$cod', '$modelo', '$memPrincipal', '$imgContenido', '$typeimg')");
                var_dump($query);
                if($query){
                    header('Location: ../admin.php?add=true');
                    exit();
                }else{
                    echo 'No pudo ser realizada';
                    $key = true;
                    header('Location: ../admin.php?error=true&alert='.$key);
                    exit();
                }
                echo ' ';
            }else{
                 
            }


    } catch (\Throwable $th) {
        
    }
    
?>