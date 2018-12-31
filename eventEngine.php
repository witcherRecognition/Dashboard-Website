<?php
	session_start();
	require 'connection.php';
	require 'functions.php';

	$eventname=$eventdate=$eventtime=$venue=$eventdes=$eventover="";

    if($_REQUEST['eventname']){
    	$eventname = test_input($_REQUEST['eventname']);
    	$eventdate = test_input($_REQUEST['eventdate']);
    	$eventtime = test_input($_REQUEST['eventtime']);
    	$venue= test_input($_REQUEST['venue']);
    	$eventdes = test_input($_REQUEST['eventdes']);
    	$eventover = test_input($_REQUEST['eventover']);

    	$checkid = $_SESSION['login_id'];
    	$result = mysql_query("INSERT INTO `event` 
    		VALUES ('".null."','".$eventname."','".$eventdate."','".$eventtime."','".$venue."','".$eventdes."','".$eventover."','".$checkid."') ") or die(mysql_error());


    }
	
	mysql_close($connection);
?>