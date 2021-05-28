<?php

include_once './php/nav.php';

include './php/conection.php';

if (!isset($_COOKIE['login'])) {
    header('Location: ./index.php');
}


$cookies = [];

if (isset($_COOKIE['product_id'])) {

    $cookie = $_COOKIE['product_id'];

    $cookies = explode('-', $cookie);

    $id_categoria = "";
    $params = "";
    $category = "";
    $i = 0;
    $subtotal = 0.0;
    
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compra</title>
</head>

<body>


    <div class="container-xl">
        <table class="container-xl table table-dark mt-5">

            <thead>
                <tr>
                    <th colspan="3" scope="col" id="cant-product">Mi Carrito(0)</th>
                    <th scope="col">Precio</th>
                    <th colspan="1" class="w-25" scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>

            <tbody>
                <?php

                if ($cookies != null && !isset($_GET['succes'])) {
                    $o = 0;
                    $productosname = "";
                    foreach ($cookies as $cook) {
                        $id_categoria = explode('_', $cook);
                        $productosname = $id_categoria[0]."-";
                        
                        if ($id_categoria[0] == "CPU") {
                            $category = 'cpus';
                            $params = 'ram';
                        }
                        if ($id_categoria[0] == "IMPRESORA") {
                            $category = 'impresoras';
                            $params = 'velocidad_max';
                        }
                        if ($id_categoria[0] == "MONITOR") {
                            $category = 'monitores ';
                            $params = 'definicion_max';
                        }
                        $result = mysqli_query($coon, "select p.codigo, p.nombre, p.modelo, p.marca, p.color, p.precio, p.stock, c.$params, c.producto_id, p.descripcion, p.typeimg, p.foto, p.categoria
                                FROM productos_informaticos p 
                                INNER JOIN $category c ON c.producto_id = p.codigo;");


                        if ($result) {

                            foreach ($result as $row) {

                ?>
                                <tr id="<?php echo $row['codigo']; ?>">
                                    <th colspan="3" scope="row" class="p-4">
                                        <?php echo $row['nombre']; ?><br /><br />
                                        <img src="data:<?php echo $row['typeimg']; ?>;base64,<?php echo base64_encode($row['foto']) ?>" class="p-2">
                                        Modelo: <?php echo $row['modelo']; ?>
                                        <br />
                                    </th>
                                    <td colspan="1" class="p-3">$<?php echo $row['precio']; ?></td>
                                    <td colspan="1" class="w-25" class="pt-4">
                                        <input class="w-50 cant" type="number" id="cant-<?php echo $i; ?>" min="1" value="1" oninput="total('total-<?php echo $i; ?>', <?php echo $row['precio']; ?>, 'cant-<?php echo $i; ?>')">
                                    </td>
                                    <td id="total-<?php echo $i; ?>" class="total p-3">$<?php echo $row['precio']; ?></td>
                                </tr>
                    <?php $i++;
                            }
                        }
                    }
                } else { ?>

                    <tr>
                        <th colspan="3" scope="row" class="p-4 ">
                            <p>No hay productos agregados a tu carrito de comprar</p>
                        </th>
                        <td colspan="1" class="p-3"></td>

                        <td class="total p-3"></td>
                        <td class="total p-3"></td>
                    </tr>

                <?php } ?>
            </tbody>

        </table>

            
        <table class="container-fluid table table-dark">
            <thead>
                <tr>
                    <!-- <th scope="col" colspan="2" class="container-fluid"></th> -->
                    <th scope="col" colspan="3" class="text-end container-fluid fs-5">Subtotal </th>
                    <th scope="col" colspan="2" class="text-end fs-6 fw-normal" id="subtotal">$0 </th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <!-- <th scope="col" colspan="2" class="container-fluid"></th> -->
                    <th scope="col" colspan="3" class="text-end container-fluid fs-5">Envio </th>
                    <th scope="col" colspan="2" class="text-end fs-6 fw-normal" id="envio">
                        <?php
                        $envioX = ($cookies != null) ? '$5000' : '$0';
                        echo $envioX;
                        ?>
                    </th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <!-- <th scope="col" colspan="2" class="container-fluid"></th> -->
                    <th scope="col" colspan="3" class="text-end container-fluid fs-5">Total </th>
                    <th scope="col" colspan="2" class="text-end fs-6 fw-normal" id="total">$0</th>
                </tr>
            </thead>
        </table>
        <?php if ($cookies != null && !isset($_GET['succes'])){$_SESSION['productos'] = $productosname;}  ?>
        <button class="container-fluid btn btn-primary mx-auto mb-4 p-2" id="btn-finish">Finalizar</button>
    </div>


    <script src="./js/jquery.js"></script>
    <script src="./js/cart.js"></script>
</body>

</html>