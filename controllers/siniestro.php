<?php 
include_once ('../conexion.php');

  switch($_SERVER['REQUEST_METHOD']){
  	case "GET":
  		listSiniestro();
  	  break;
  	case "PUT":
  		destroySession();
  	  break;
  	 case "POST":
  	    $values =[
				"customer"=>$_POST["cliente"],
				"date"=>$_POST["date"],
				"hour"=>$_POST["hour"],
				"place"=>$_POST["place"],
				"damage"=>$_POST["damage"],
  	    ];
  	 	storeSiniestro($values);
  	  break;

  	  default:
  	  	break;

  }

   function storeSiniestro($data){

   	$conn = conexion();
   	$errors = validateValues($data);
   	if(count($errors) == 0){
   		$sql = "INSERT INTO siniestros (cliente, fecha, hora, lugar, danos)
	VALUES ('".$data['customer']."', '".$data['date']."', '".$data['hour']."', '".$data['place']."', '".$data['damage']."')";

	if (mysqli_query($conn, $sql)) {
	  echo json_encode(["msg"=>"Siniestro registrado","status"=>true]);
	} else {
	  echo json_encode(["msg"=>mysqli_error($conn),"status"=>false]);
	}


   	}else{
   		 echo json_encode(["msg"=>$errors,"status"=>false]);
   	}
	

  	
  }

  function validateValues($array){
  	$errors = [];
		foreach ($array as $key => $value) {
		if (empty($value)) {
			 array_push($errors,["message"=>$key.' '.'es requerido']);
			}
		}

		return $errors;
  }

  function listSiniestro(){
  	    $conn = conexion();
		$sql = "SELECT * FROM siniestros";
		$result = mysqli_query($conn, $sql);

		
		$row = mysqli_fetch_assoc($result);
		$data = [];
		while($row = mysqli_fetch_assoc($result)) {
		    array_push($data, $row);
		}
		 $json = json_encode($data);
         echo $json;
		
  }




 ?>