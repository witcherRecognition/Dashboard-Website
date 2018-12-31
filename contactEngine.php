<?php
	session_start();
	require 'connection.php';
	require 'functions.php';
	require 'PHPMailer/PHPMailerAutoload.php';
	$id=$name=$email=$subject=$msg='';

	if($_REQUEST['contactid']){
		$id = test_input($_REQUEST['contactid']);
		$name = test_input($_REQUEST['contactname']);
		$email = test_input($_REQUEST['contactemail']);
		$subject = test_input($_REQUEST['contactsubject']);
		$msg = test_input($_REQUEST['contactmsg']);

		$result = mysql_query("SELECT AuditName FROM audit WHERE AuditEmail='".$email."' ");
		$row = mysql_fetch_assoc($result);
		$aName = $row['AuditName'];
		$result = mysql_query("INSERT INTO mail 
			VALUES ('".null."','".$name."','".$aName."','".$subject."','".$msg."',NOW(),'YES','NO','".$id."') ");
	}

	mysql_error($connection);
?>