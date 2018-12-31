<?php
	session_start();
	require 'connection.php';
	require 'functions.php';
	$expname=$expdes=$expid="";

	if($_REQUEST['editexpid']){
		$expid = test_input($_REQUEST['editexpid']);
		$expname = test_input($_REQUEST['editexpname']);
		$expdes = test_input($_REQUEST['editexpdes']);

		$result = mysql_query("UPDATE expertise SET Name='".$expname."', Descript='".$expdes."' WHERE Id='".$expid."' ") or die(mysql_error());

	mysql_close($connection);
	}
?>