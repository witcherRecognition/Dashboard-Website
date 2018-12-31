<?php
	session_start();
	require 'connection.php';
	require 'functions.php';
	$id=$fname=$lname=$ic=$gender=$marital=$phn=$email="";

	if($_REQUEST['editid']){
		$id = test_input($_REQUEST['editid']);
		$fname = test_input($_REQUEST['editfname']);
		$lname = test_input($_REQUEST['editlname']);
		$ic = test_input($_REQUEST['editic']);
		$gender = test_input($_REQUEST['editgender']);
		$marital = test_input($_REQUEST['editmarital']);
		$phn = test_input($_REQUEST['editphn']);
		$email = test_input($_REQUEST['editemail']);

		$result = mysql_query("UPDATE aludetail 
			SET fName='".$fname."', lName='".$lname."', Gender='".$gender."', 
				Ic='".$ic."', Marital='".$marital."', PhnNo='".$phn."', 
				Email='".$email."' WHERE RegNo='".$id."'  ");
	}

	mysql_close($connection);

?>