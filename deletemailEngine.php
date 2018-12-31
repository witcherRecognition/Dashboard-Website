<?php
	session_start();
	require 'connection.php';
	require 'functions.php';
	$id="";

	if($_REQUEST['deletemailid']){
    	$id = test_input($_REQUEST['deletemailid']);
    	$checkid = $_SESSION['login_id'];
    	$result = mysql_query("DELETE FROM `mail` WHERE `Id`='".$id."' ");


    }
	
	mysql_close($connection)
?>