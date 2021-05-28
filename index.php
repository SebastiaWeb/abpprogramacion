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
    <span class="main-lupa">

        <div class="input-group mb-3">
            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
            <a class="text-decoration-none input-group-text"><i class="fas fa-search"></i></a>
        </div>

    </span>
    <span class="main-dars dropdown"> Filtrar
        <button class="btn btn-secondary dropdown-toggle" type="button" id="category" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="category">
            <li><a class="dropdown-item" href="./php/other.php?category=CPU">CPU</a></li>
            <li><a class="dropdown-item" href="./php/other.php?category=IMPRESORA">IMPRESORA</a></li>
            <li><a class="dropdown-item" href="./php/other.php?category=MONITOR">MONITOR</a></li>
        </ul>


    </span>
</div>


<?php include './php/product.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
</script>

<script src="../js/jquery.js"></script>
<script src="../js/index.js"></script>

<?php require './php/footer.php'; ?>

<?php session_destroy(); ?>