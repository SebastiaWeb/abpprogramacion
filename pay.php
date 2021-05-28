<?php

include './php/conection.php';
include './php/nav.php';
include './php/icon.php';

setcookie("productos", $_SESSION['productos'], time() + 86400, "/");

class Pago
{

    public $total;
    private $tarjeta;
    private $fecha;
    private $cv;

    function __construct($total)
    {
        $this->total = $total;
    }

    function datos($tarjeta, $fecha, $cv)
    {
        $this->tarjeta = $tarjeta;
        $this->fecha = $fecha;
        $this->cv = $cv;
    }

    function getTarjeta()
    {
        return $this->tarjeta;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function getCv()
    {
        return $this->cv;
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar pago</title>
    <link rel="stylesheet" href="./css/style-other.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>

    <div class="container bg-dark mt-5 mb-5 p-5 shadow rounded">

        <h3 class="text-light">Finalizar compra</h3>
        <br>
        <form class="p-5" action="" method="POST" id="card-form">

            <span class="input-group-text mb-2" id="basic-addon1">Metodos de pagos</span>


            <script
            src="https://checkout.epayco.co/checkout.js"
            class="epayco-button"
            data-epayco-key="491d6a0b6e992cf924edd8d3d088aff1"
            data-epayco-amount="<?php echo $_COOKIE['total'];?>"
            data-epayco-name="<?php echo $_SESSION['productos'];?>"
            data-epayco-description="<?php echo $_SESSION['productos'];?>"
            data-epayco-currency="cop"
            data-epayco-country="co"
            data-epayco-test="true"
            data-epayco-external="false"
            data-epayco-response="http://localhost/cart.php?succes=true"
            data-epayco-confirmation="http://localhost/cart.php?succes=false">
        </script>
            <br><button class="btn btn-danger mt-3">Cancelar</button>
        </form>

    </div>

    <form>
        
    </form>


    <?php include './php/footer.php'; ?>
</body>

</html>