<?php
    include './conection.php';
    session_start();

    $id = isset($_SESSION['id']) ? $_SESSION['id']:false;

    $query = ($id != false) ? mysqli_query($coon, "delete from CPU where(cod_cpu = '$id')"):false;

    if($query){
        $_SESSION['delite'] = true;
        unset($_SESSION['id']);
        header('Location: ../admin.php');
        exit();
    }else{
        echo 'error';
    }

?>