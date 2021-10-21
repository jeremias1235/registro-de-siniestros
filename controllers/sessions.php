<?php

function destroySession(){
  	session_start();
  	session_destroy();
  	echo json_encode(["status"=>true]);
  }

  destroySession();