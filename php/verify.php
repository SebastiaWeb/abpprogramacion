<?php 

include 'conection.php';
session_start();


/*
Aqui se hara toda la logica de verificacion de cada pagina
*/

//Verificacion del Login
if(isset($_SESSION['login'])){

   $email = $_POST['emaillgn'];
   $pass = $_POST['passwordlgn'];

   $mysql = "SELECT name,apellidos,email,pass FROM CLIENTE;";

   $response = mysqli_query($coon, $mysql);

   if($response){

    //  Recorremos los datos obtenidos de mysql
        foreach($response as $row){

        //  verificamos la contrasena pasandole el password y hash de la base de datos
            $verify = password_verify($pass, $row['pass']);

            if($email == $row['email'] && $verify){
                $_SESSION['login'] = true;
                $_SESSION['user'] = $row['name'].' '.$row['apellidos'];

            // Para utilizar la cookie se utiliza
            //  setcookie(name, valor, time() + tiempo, "/" <-  para poder utilizar la cookie en el directorio riaz)
                setcookie("login", $_SESSION['login'], time() + 86400, "/"); 
                setcookie("user", $_SESSION['user'], time() + 86400, "/");
            
            //  Si la seccion correcto nos redirigimos a la pagina principal
                header("Location: ../index.php");

            }else{
                
            //  Si no, nos redirigimos a la pagina principal
                header("Location: ../index.php");
            }
        }

   }else{
        echo 'Consulta mal';
   }
}


//---------------------------------------------------------------------
//_____________________________________________________________________

//Verificacion del registro
if(isset($_SESSION['singup'])){

//  Obtenemos los datos del formulario de registro
    $dni = $_POST['dni'];
    $name = $_POST['name'];
    $apellidos = $_POST['apellidos'];
    $street = $_POST['street'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

//  Encriptamos la password
//  password_hash(password, PASSWORD_BCRYPT, cuentas veces va hacerlo ['cost=>4'])
    $password = password_hash($password, PASSWORD_BCRYPT, ['cost=>4']);


    // INSERT INTO `CLIENTE` (`dni`, `phone`, `street`, `fechaBuy`, `totalFactura`, `pass`, `email`, `name`, `apellidos`) 
    // VALUES ('1', '1', '1', NULL, NULL, '1', '1', '500', '1'); 

//  Mandamos todos los datos a la base de datos    
    $mysql = "INSERT INTO `CLIENTE` (`dni`, `phone`, `street`, `fechaBuy`, `totalFactura`, `pass`, `email`, `name`, `apellidos`) VALUES ('$dni', '$phone', '$street', NULL, NULL, '$password', '$email', '$name', '$apellidos');"; 

    $response = mysqli_query($coon, $mysql);

    if($response){

    //  Si no esta bien redirigimos a la pagina del login
        header("Location: ../login.php");

    }else{
        echo 'peticon mala ';
        echo "Error: " . $mysql . "<br>" . mysqli_error($conn);
    }
}

if(isset($_COOKIE['logout'])){
    setcookie("login", '', time() - 86400, "/"); 
    setcookie("user", '', time() - 86400, "/");
    setcookie("logout", '', time() - 86400, "/");
    header('Location: ../index.php');
}

?>