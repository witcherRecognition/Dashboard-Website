<?php
	session_start();
	require 'connection.php';
	require 'functions.php';
	$deleteid="";

	if($_REQUEST['deleteid']){
		$deleteid = test_input($_REQUEST['deleteid']);

		$result = mysql_query("DELETE FROM educational WHERE Id='".$deleteid."' ");
	}

	mysql_close($connection);
?>