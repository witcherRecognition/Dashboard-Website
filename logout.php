<?php
	session_start();
	require 'connection.php';
	$id = $_SESSION['login_id'];
	$result = mysql_query("UPDATE alulogin SET Last_Log=NOW(), status='OFF' WHERE RegNo='".$id."'  ");
	mysql_close($connection);
	if(session_destroy()) // Destroying All Sessions
	{
	header("Location: Login.php"); // Redirecting To Home Page
	exit();
	}
?>