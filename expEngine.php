<?php
	session_start();
	require "connection.php";
	require "functions.php";
	$expname=$expdes=$check="";


	if($_REQUEST['expertisename']){
		$expname = test_input($_REQUEST['expertisename']);
		$expdes = test_input($_REQUEST['expertisedes']);
		$check = $_SESSION['login_id'];

		$result = mysql_query("INSERT INTO expertise VALUES ('".null."','".$expname."','".$expdes."','".$check."') ") or die(mysql_error());

	mysql_close($connection);
	}
?>