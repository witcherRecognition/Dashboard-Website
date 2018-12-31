<?php
	session_start();
	require "connection.php";
	require "functions.php";
	$name=$faculty=$program=$yop=$check="";

	if($_REQUEST['name']){
		$name = test_input($_REQUEST['name']);
		$faculty = test_input($_REQUEST['faculty']);
		$program = test_input($_REQUEST['program']);
		$yop = test_input($_REQUEST['yop']);
		$check = $_SESSION['login_id'];
		$null = null;
		$one = 1;

		$result = mysql_query("INSERT INTO educational VALUES ('".null."','".$name."','".$faculty."','".$program."','".$yop."','".$check."') ") or die(mysql_error());

		/*$result_b = mysql_query("SELECT * FROM address WHERE poscode = 1 ") or die(mysql_error());
		$get_b = mysql_fetch_array($result_b);
		$hold_b = $get_b['Id'];

		$result_a = mysql_query("INSERT INTO address 
		VALUES ('".$null."','".$one."','".$one."','".$one."','".$one."','".$one."','".$one."','".$one."') ");
		*/
	}

		mysql_close($connection);
		
		
	
?>