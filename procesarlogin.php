<?php 

// incluyo el archivo de coneccion
include_once ('conexion.php');

// asigno la funcion a una variable
$conn = conexion();

$usuario = $_POST['usuario'];
$pass = $_POST['contrasena'];

$clave =  password_hash($pass, PASSWORD_DEFAULT);

$sql = "SELECT usuario, pass FROM usuarios where usuario = '$usuario' and pass = '$clave'";
$result=mysqli_query($conexion,$sql);

if(mysqli_num_rows($result) > 0){  /* realiza verificacion en tuplas, buscando coincidencia de los registros*/
    $_SESSION['user']=$usuario;
    header('Location: panel.php');
}else{
    header('Location: login.php');
}




?>
