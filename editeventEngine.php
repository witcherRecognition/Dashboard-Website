<?php
	session_start();
	require 'connection.php';
	require 'functions.php';

	$editeventid=$eventname=$eventdate=$eventtime=$venue=$eventdes=$eventover="";

    if($_REQUEST['editeventname']){
    	$eventname = test_input($_REQUEST['editeventname']);
    	$eventdate = test_input($_REQUEST['editeventdate']);
    	$eventtime = test_input($_REQUEST['editeventtime']);
    	$venue= test_input($_REQUEST['editvenue']);
    	$eventdes = test_input($_REQUEST['editeventdes']);
    	$eventover = test_input($_REQUEST['editeventover']);
    	$editeventid = test_input($_REQUEST['editeventid']);

    	$checkid = $_SESSION['login_id'];
    	$result = mysql_query("UPDATE `event` 
    		SET `EvName`='".$eventname."',`EvDate`='".$eventdate."',`EvTime`='".$eventtime."',`Venue`='".$venue."',`EvDesc`='".$eventdes."',`Over`='".$eventover."' WHERE `Id` = '".$editeventid."' AND `LookId`='".$checkid."' ") or die(mysql_error());


    }
	
	mysql_close($connection);
?>