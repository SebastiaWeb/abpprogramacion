<?php

include './conexion.php';

class Usuario {

    public $cedula = "";
    public $nombre = "";
    public $apellidos = "";
    public $telefono = "";
    public $dirreccion = "";
    public $genero = "";


    function __construct($cedula, $nombre, $apellidos, $telefono, $dirreccion, $genero)
    {
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->dirreccion = $dirreccion;
        $this->genero = $genero;
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getDirreccion() {
        return $this->dirreccion;
    }

    public function getGenero() {
        return $this->genero;
    }


}


//Si esxite save
if (isset($_GET['save'])) {

    $key = $_GET['save'];

//  Si su valor es true, significa que se va a guardar datos
    if ($key) {
        if (isset($_GET['objeto'])) {

            // Obtenemos el valor
            $objeto = $_GET['objeto'];

            // Metodo que nos va obtener los valores 
            $usuario = jsonObtenerDatos($objeto);

            guardar($usuario,$coon);
        }
    }
}

if (isset($_GET['search'])) {
    if($_GET['search']){

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            buscar($id, $coon);

        }

    }
}

function jsonObtenerDatos($objeto){

    // Verificamos que el tipo de datos se string 
    if (gettype($objeto) == 'string') {

        // Decodificamos el arreglo
        $json = json_decode($objeto);

        //Obtenemos sus valores
        $cedula = $json->cedula;
        $nombre = $json->nombre;
        $apellidos = $json->apellidos;
        $telefono = $json->telefono;
        $dirreccion = $json->dirrecion;
        $genero = $json->genero;

        return new Usuario($cedula, $nombre, $apellidos, $telefono, $dirreccion, $genero);
    }
}


function guardar($usuario, $coon){
    $sql = "INSERT INTO `usuario`(`cedula`, `nombre`, `apellidos`, `telefono`, `dirreccion`, `genero`) 
            VALUES ('$usuario->cedula', '$usuario->nombre', '$usuario->apellidos', '$usuario->telefono', '$usuario->dirreccion', '$usuario->genero')";
    $result = mysqli_query($coon, $sql);

    if($result){
        echo 'Correcto';
    }else{
        echo "Error: " . $sql . "\n" . mysqli_error($coon);
    }
}


function buscar($cedula, $coon){

    $sql = "SELECT * FROM usuario WHERE cedula = '$cedula'";

    $result = mysqli_query($coon, $sql);

    if($result){
        $json = null;
        foreach($result as $row){
            $json = json_encode($row);
            
        }
        $jsondecode = json_encode($json);
        echo $json;

    }else{
        echo "Error: " . $sql . "\n" . mysqli_error($coon);
    }

}