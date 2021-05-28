<?php
include 'conection.php';
include 'icon.php';

if (isset($_GET['category'])) {
    $category = $_GET['category'];

    if($category == "cpus"){
        $params = 'ram';
    }
    if($category == "impresoras"){
        $params = 'velocidad_max';
    }
    if($category == "monitores"){
        $params = 'definicion_max';
    }

    $result = mysqli_query($coon, "select p.codigo, p.nombre, p.modelo, p.marca, p.color, p.precio, p.stock, c.$params, c.producto_id, p.descripcion, p.typeimg, p.foto, p.categoria
                                FROM productos_informaticos p 
                                INNER JOIN $category c ON c.producto_id = p.codigo;");
} else {
    $result = mysqli_query($coon, "select p.codigo, p.nombre, p.modelo, p.marca, p.color, p.precio, p.stock, c.ram, c.producto_id, p.descripcion, p.typeimg, p.foto, p.categoria
        FROM productos_informaticos p 
        INNER JOIN cpus c ON c.producto_id = p.codigo;");
}
?>

<!-- CARD PRODUCT -->
<div class="product mb-5 mt-5">
    <?php foreach ($result as $row) {  ?> 

        <div class="card shadow-lg" style="width: 18rem;">
            <img src="data:<?php echo $row['typeimg']; ?>;base64,<?php echo base64_encode($row['foto']) ?>" class="p-2">
            <div class="card-body border border-top-dark">
                <h5 class="card-title"><?php echo $row['modelo']; ?></h5>
                <p class="card-text"><?php echo $row['descripcion']; ?></p>
                <a href="#" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#producadd" name="add" onclick="createCookie(<?php echo $row['producto_id'];?>,'<?php echo $row['categoria'];?>')"><?php echo $icons['cart-add']; ?></a>
            </div>
        </div>
    <?php } ?>
</div>

<!-- Modal cuando inicia session -->
<?php if (isset($_COOKIE['login'])) { ?>
    <div class="modal fade" id="producadd" tabindex="-1" aria-labelledby="producaddLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="producaddLabel">Has añadido un nuevo producto al carrito!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Seguir Mirando</button>
                    <button type="button" class="btn btn-primary" id="cart-to" onclick="toCart()">Ir al carrito</button>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>

    <div class="modal fade" id="producadd" tabindex="-1" aria-labelledby="producaddLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="producaddLabel">Alerta!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Para agregar prodcuto primero incia sesion con tu cuenta. <br />
                    Si no tiene puedes registrarte.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Seguir Mirando</button>
                    <a href="../login.php" type="button" class="btn btn-primary">Iniciar Sesion</a>
                    <a href="../registrar.php" type="button" class="btn btn-success">No tengo cuenta</a>
                </div>
            </div>
        </div>
    </div>

<?php } ?>