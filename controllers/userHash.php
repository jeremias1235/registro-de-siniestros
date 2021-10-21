


<?php
   include_once ('../conexion.php');
   
   	$conn = conexion();

   	$opciones = [
    'cost' => 11,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
	];

    $pass = password_hash("1234", PASSWORD_BCRYPT, $opciones);

	$sql = "INSERT INTO usuarios (usuario, pass)
	VALUES ('user1', '".$pass."')";

	if (mysqli_query($conn, $sql)) {
	  echo json_encode(["msg"=>"Siniestro registrado","status"=>true]);
	} else {
	  echo json_encode(["msg"=>mysqli_error($conn),"status"=>false]);
	}
	
	



 ?>