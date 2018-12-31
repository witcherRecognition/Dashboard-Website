<?php
	session_start();
	require 'connection.php';
	require 'functions.php';
	$id="";

	if($_REQUEST['readmailid']){
    	$id = test_input($_REQUEST['readmailid']);
    	$checkid = $_SESSION['login_id'];
    	$result = mysql_query("UPDATE `mail` SET `ReceivedStatus`='YES' WHERE `Id`='".$id."' ");


    }
	
	mysql_close($connection)
	
?>