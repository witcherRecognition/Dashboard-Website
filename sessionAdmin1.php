<?php
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$connection = mysql_connect("localhost", "root", "");
	// Selecting Database
	$db = mysql_select_db("alumni", $connection);
	// Storing Session
	$user_check = $_SESSION['login_admin'];
	//$GLOBALS['name'] = $user_check;
	$ses_sql=mysql_query("SELECT Name,Id FROM admin WHERE Name='".$user_check."'", $connection);
	$row = mysql_fetch_assoc($ses_sql);
	$_SESSION['login_id'] = $row['Id'];
	$login_id = $_SESSION['login_id'];
	$login_session =$row['Name'];
	if(!isset($login_session)){
		mysql_close($connection);
		header('location: Login.php');
		exit();
	}
	mysql_close($connection);
?>