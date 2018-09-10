<?php
if($_SERVER['REQUEST_METHODE']=='POST'){
	require_once('dbConnect.php');
	date_default_timezone_set("Asia/Tehran");
	
	$content = $_FILES['image']['tmp_name'];
	
	$username = $_POST['username'];
	$new_password= $_POST['new_password'];
	
	
	
	$target_path = "uploads/";
	$response = array();
	$server_ip = "YOUR IP"
	
	
	$target_path = $target_path . basename($_FILES['image']['name']);
	
	$file_upload_url = 'http://' . $server_ip . ':2020' . '/' . 'ServerConnect' . '/' $target_path;
	
	$sql = "UPDATE user SET password = '$new_password' , image = '$target_path' WHERE username = '$username'";
	
	try{
		if(move_uploaded_file($_FILES['image']['tmp_name'],$target_path)&& mysql_query($cnn,$sql)){
			$response['password']=$password;
			$response['imageUrl']=$target_path;
			
		}else{
			$response="Error";
		}
		
	}catch (Exception $e){
		$response="Error";
	}
	echo json_encode($response);
}

?>
