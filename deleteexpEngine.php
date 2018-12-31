<?php
	session_start();
	require 'connection.php';
	require 'functions.php';
	$deleteexpid="";

	if($_REQUEST['deleteid']){
		$deleteexpid = test_input($_REQUEST['deleteid']);

		$result = mysql_query("DELETE FROM expertise WHERE Id='".$deleteexpid."' ");
	}


	mysql_close($connection);
?>