<?php
	$dbhost = "localhost"; //Host
	$dbuser = "root"; //Database user
	$dbpass = "123456"; //Database password
	$dbname = "miniproject"; //Database name
	$conn = mysqli_connect("$dbhost", "$dbuser","", "$dbname"); //Connection
	mysqli_set_charset($conn,"utf8"); //UTF-8 for Turkish letters
	if (!$conn) {
		echo "error";
	}
	
	  
?>