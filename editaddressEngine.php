<?php
	session_start();
	require 'connection.php';
	require 'functions.php';
	$id=$line1=$line2=$poscode=$city=$district=$state=$country="";

	if($_REQUEST['editaddressid']){
		$id = test_input($_REQUEST['editaddressid']);
		$line1 = test_input($_REQUEST['editline1']);
		$line2 = test_input($_REQUEST['editline2']);
		$poscode = test_input($_REQUEST['editposcode']);
		$city = test_input($_REQUEST['editcity']);
		$district = test_input($_REQUEST['editdistrict']);
		$state = test_input($_REQUEST['editstate']);
		$country = test_input($_REQUEST['editcountry']);

		$result = mysql_query("UPDATE address SET line1='".$line1."', line2='".$line2."',
					poscode='".$poscode."', city='".$city."', district='".$district."',
					 state='".$state."', country='".$country."' WHERE Id='".$id."'  ") or die(mysql_errno());
	}

	mysql_close($connection);
?>