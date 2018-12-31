<?php
	session_start();
	require "connection.php";
	require "functions.php";
	$npwd="";


	if($_REQUEST['newpwd']){
		$npwd = test_input($_REQUEST['newpwd']);
		$check = $_SESSION['login_id'];

$result = mysql_query("UPDATE alulogin SET Pwd='".$npwd."' WHERE RegNo='".$check."' ") or die(mysql_error());

	mysql_close($connection);
	}
?>