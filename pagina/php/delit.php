<?php
    include './conection.php';

    $id = $_GET['id'];

    $query = mysqli_query($coon, "delete from CPU where(cod_cpu = '$id')");

    if($query){
        header('Location: ../admin.php?delite=true');
        exit();
    }else{
        echo 'error';
    }

?>