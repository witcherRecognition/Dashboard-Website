<?php
	session_start();
	require 'connection.php';
	require 'functions.php';

	$id="";

	if($_REQUEST['deleteeventid']){
    	$id = test_input($_REQUEST['deleteeventid']);
    	$checkid = $_SESSION['login_id'];
    	$result = mysql_query("DELETE FROM `event` WHERE `Id`='".$id."' AND `LookId`='".$checkid."' ");


    }
	
	mysql_close($connection)
?>