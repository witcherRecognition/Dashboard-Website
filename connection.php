<?php

	$connection = mysql_connect("localhost","root","") or die("Could not connect to MySql".mysql_error());
		
	$select = mysql_select_db("alumni") or die("Unable to select database");
?>
