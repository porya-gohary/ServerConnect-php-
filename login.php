<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	require_once('dbConnect.php');
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
	
	$result = mysqli_query($cnn,$sql);
	
	$row = mysqli_fetch_array($result);
	
	if(isset($row)){
		$record['username']= $row['username'];
		$record['email']= $row['email'];
		$record['imageUrl']= $row['image'];
	}else{
		$record['username']="";
		$record['email']="";
		$record['imageUrl']="";
						
	}
	
	echo json_encode($record);
		
	
}
?>
