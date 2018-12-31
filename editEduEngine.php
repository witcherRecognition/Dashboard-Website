<?php
	session_start();
	require 'connection.php';
	require 'functions.php';
	$name=$faculty=$program=$yop=$check=$id="";

	if($_REQUEST['editid']){
			$name = test_input($_REQUEST['editname']);
			$id = test_input($_REQUEST['editid']);
			$faculty = test_input($_REQUEST['editfaculty']);
			$program = test_input($_REQUEST['editprogram']);
			$yop = test_input($_REQUEST['edityop']);

			$result = mysql_query("UPDATE educational 
SET InsName='".$name."', Faculty='".$faculty."', ProgName='".$program."', YOP='".$yop."' 
				WHERE Id = '".$id."' ");
	}

	mysql_close($connection);
?>