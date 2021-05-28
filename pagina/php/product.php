<?php
    include './conection.php';
    $result = mysqli_query($coon,"select * from CPU");
    foreach($result as $row){
        // echo $row['img'];
        // echo $row['img'];
    }
?>

<div class="product">
<?php foreach($result as $row){ ?>
    <div class="product-container">
      <img src="data:<?php echo $row['typeimg'];?>;base64,<?php echo base64_encode($row['img'])?>" class="img-responsive img-rounded product-img">
        
        <div class="product-description">
            <h4 class="product-title"><?php echo $row['modelo'];?></h4>
            <span class="product-precio">Memoria principal: <?php echo $row['mem_principal'];?></span>
        </div>
    </div>
    <?php }?>
</div>
