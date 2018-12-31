<?php
	session_start();
	echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";
	require "connection.php";
	require "functions.php";
	require 'PHPMailer/PHPMailerAutoload.php';
	
	$username=$email=$ques=$ans="";

	if($_REQUEST['createname']){
		$username = test_input($_REQUEST['createname']);
		$email = test_input($_REQUEST['createemail']);
		$ques = test_input($_REQUEST['createques']);
		$ans = test_input($_REQUEST['createans']);
		$date = date("Y-m-d");
		//generate random token
		$random_token = NewGuid();
		//Generate a random string.
		$token = openssl_random_pseudo_bytes(5);
		//Convert the binary data into hexadecimal representation.
		$pwd = bin2hex($token);

		$result = mysql_query("INSERT INTO `tmpemail` 
			VALUES ('".null."','".$random_token."','".$date."','".$email."','".$username."','".$pwd."','".$ques."','".$ans."') ");
		
	}
	mysql_close($connection);
?>