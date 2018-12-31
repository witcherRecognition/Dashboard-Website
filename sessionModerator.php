<?php
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$connection = mysql_connect("localhost", "root", "");
	// Selecting Database
	$db = mysql_select_db("alumni", $connection);
	// Storing Session
	$user_check = $_SESSION['login_moderator'];
	$ses_sql=mysql_query("SELECT Name,Id FROM moderator WHERE Name='".$user_check."'", $connection);
	$row = mysql_fetch_assoc($ses_sql);
	$login_session =$row['Name'];
	$_SESSION['login_id'] = $row['Id'];
	if(!isset($login_session)){
		mysql_close($connection);
		header('location: Login.php');
		exit();
	}
	mysql_close($connection);
?>