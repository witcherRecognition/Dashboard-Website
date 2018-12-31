<?php
	session_start();
	require 'connection.php';
	require 'functions.php';
	$id="";

	if($_REQUEST['deleteid']){
    	$id = test_input($_REQUEST['deleteid']);
    	$checkid = $_SESSION['login_id'];
    	$result = mysql_query("DELETE FROM `aluvacancies` WHERE `Id`='".$id."' AND `LookId`='".$checkid."' ");


    }
	
	mysql_close($connection)

?>