<?php
	session_start();
	require "connection.php";
	require "functions.php";
	$workname=$workdesign=$workstart=$workend=$workemail=$workcontact=$check="";


	if($_REQUEST['workname']){
		$workname = test_input($_REQUEST['workname']);
		$workdesign = test_input($_REQUEST['workdesign']);
		$workstart = test_input($_REQUEST['workstart']);
		$workend = test_input($_REQUEST['workend']);
		$workemail = test_input($_REQUEST['workemail']);
		$workcontact = test_input($_REQUEST['workcontact']);
		$check = $_SESSION['login_id'];

		$result = mysql_query("INSERT INTO workinginfo VALUES ('".null."','".$workname."','".$workdesign."','".$workstart."','".$workend."','".$workemail."','".$workcontact."','".$check."') ") or die(mysql_error());

	mysql_close($connection);
	}
?>