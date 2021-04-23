<?php include './php/conection.php'; ?>

<?php include './php/nav.php'; ?>

<!-- Banner -->

<div class="menu-contain">
    <div class="banner-img">
    <h2 class="banner-txt">DESCUENTOS</h2>
    </div>
</div>

<!-- Buscar - Filtro -->

<div class="main-icons">
    <span class="main-lupa"><i class="fas fa-search"></i></span>
    <span class="main-dars">Filtrar <i class="fas fa-bars"></i></span>
</div>

<?php include './php/product.php'; ?>

<?php require './php/footer.php';?>

<?php session_destroy();?>