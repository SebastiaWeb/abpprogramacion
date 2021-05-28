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

//    Consulta a mysql
   $mysql = "SELECT nombre,apellidos,email,pass FROM clientes;";

//    Se hace hace la consulta 
   $response = mysqli_query($coon, $mysql);

   if($response){

    //  Recorremos los datos obtenidos de mysql
        foreach($response as $row){

        //  verificamos la contrasena pasandole el password y hash de la base de datos
        // No funciona la verificacion ver si en la tabla cliente, la columna password debe de tener de lonsgitud 255
            $verify = password_verify($pass, $row['pass']);

            if($email == $row['email'] && $verify){
                $_SESSION['login'] = true;
                $_SESSION['user'] = $row['nombre'].' '.$row['apellidos'];

            // Para utilizar la cookie se utiliza
            //  setcookie(name, valor, time() + tiempo, "/" <-  para poder utilizar la cookie en el directorio riaz)
                setcookie("login", $_SESSION['login'], time() + 86400, "/"); 
                setcookie("user", $_SESSION['user'], time() + 86400, "/");
            
            //  Si la seccion correcto nos redirigimos a la pagina principal
                header("Location: ../index.php");

            }else{
                echo 'Error al iniciar sesion';
                echo "Error: " . $mysql . "<br>" . mysqli_error($coon);
                // header("Location: ../login.php");
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
    // unset($_SESSION['login']);

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
    $passw = password_hash($password, PASSWORD_BCRYPT, ['cost=>4']);


//  Mandamos todos los datos a la base de datos    
    $mysql = "INSERT INTO `clientes` (`dni`, `phone`, `street`, `pass`, `email`, `nombre`, `apellidos`) 
                VALUES  ('$dni', '$phone', '$street', '$passw', '$email', '$name', '$apellidos');"; 

    $response = mysqli_query($coon, $mysql);

    if($response){

    //  Si no esta bien redirigimos a la pagina del login
        header("Location: ../login.php");

    }else{
        echo 'peticon mala ';
        echo "Error: " . $mysql . "<br>" . mysqli_error($coon);
    }

    session_destroy();
}

// --------------------------------------------
// Cerrar session

if(isset($_COOKIE['logout'])){
    setcookie("login", '', time() - 86400, "/"); 
    setcookie("user", '', time() - 86400, "/");
    setcookie("logout", '', time() - 86400, "/");
    header('Location: ../index.php');
}

?>