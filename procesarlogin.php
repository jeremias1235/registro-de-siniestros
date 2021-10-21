<?php 

// incluyo el archivo de coneccion
include_once ('conexion.php');

// asigno la funcion a una variable
$conn = conexion();

$usuario = $_POST['usuario'];
$pass = $_POST['contrasena'];
		
$sql = "SELECT pass FROM usuarios where usuario = '$usuario'";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
   $passHash = mysqli_fetch_assoc($result);
   
    if (password_verify($pass, $passHash['pass'])) {
         session_start();
         $_SESSION['user']=$usuario;
         header('Location: panel.php');
    } else {
        header('Location: login.php');
    }
    
   
}else{
    header('Location: login.php');
}



?>
