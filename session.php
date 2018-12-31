<?php
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$connection = mysql_connect("localhost", "root", "");
	// Selecting Database
	$db = mysql_select_db("alumni", $connection);
	// Storing Session
	$user_check = $_SESSION['login_alumni'];
	$ses_sql=mysql_query("SELECT UserName,RegNo FROM alulogin WHERE UserName='".$user_check."'", $connection);//User Name
	$row = mysql_fetch_assoc($ses_sql);
	$_SESSION['login_id'] = $row['RegNo'];
	$login_session =$row['UserName'];
	if(!isset($login_session)){
		mysql_close($connection);
		header('location: Login.php');
		exit();
	}
	mysql_close($connection);
?>