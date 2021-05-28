<?php 

if(isset($_GET['category'])){

    $category = $_GET['category'];

    echo $category;

    if($category == "CPU"){
        header('Location: ../index.php?category=cpus');
    }
    if($category == "IMPRESORA"){
        header('Location: ../index.php?category=impresoras');
    }
    if($category == "MONITOR"){
        header('Location: ../index.php?category=monitores');
    }

}

?>