<?php

require 'db.class.php';

session_start();

if(!isset($_SESSION['id'])){
    header ("Location: login.php");
    exit();
}
else{

	//checking user exists in db for security purposes.
	
	$userID = $_SESSION['id'];
	
	$sql = "SELECT * FROM users WHERE id='{$userID}' LIMIT 1";
	
	$query = mysql_query($sql);
	
	$exists = mysql_num_rows($query);
	
	if($exists == 0){
	    header("Location: index.php");
	    exit();
	}else{
		$message = "Invalid Session!";
	}
}


?>
