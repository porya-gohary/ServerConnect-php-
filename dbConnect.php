<?php

	define('HOST','localhost');
	define('USER','porya');
	define('PASS','YOUR PASSWORD');
	define('DB','ServerConnect');
	
	
	$cnn = mysqli_connect(HOST,USER,PASS,DB) or die('Unable To Connect To DataBase');
	
	
	
?>
