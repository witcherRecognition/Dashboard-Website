<?php
	session_start();
	require 'connection.php';
	$id = $_SESSION['login_id'];
	$result = mysql_query("UPDATE moderator SET Last_Login=NOW(), status='OFF' WHERE Id='".$id."' ");
	mysql_close($connection);
	if(session_destroy()) // Destroying All Sessions
	{
	header("Location: Login.php"); // Redirecting To Home Page
	exit();
	}
?>