<?php
	session_start();
	require 'connection.php';
	require 'functions.php';
	$workname=$workdesign=$workstart=$workend=$workemail=$workcontact=$workid="";


	if($_REQUEST['editworkid']){
		$workid = test_input($_REQUEST['editworkid']);
		$workname = test_input($_REQUEST['editworkname']);
		$workdesign = test_input($_REQUEST['editworkdesign']);
		$workstart = test_input($_REQUEST['editworkstart']);
		$workend = test_input($_REQUEST['editworkend']);
		$workemail = test_input($_REQUEST['editworkemail']);
		$workcontact = test_input($_REQUEST['editworkcontact']);

		$result = mysql_query("UPDATE workinginfo SET Name='".$workname."', Designation='".$workdesign."', Start='".$workstart."', End='".$workend."',Email='".$workemail."', ContactNo='".$workcontact."' WHERE Id = '".$workid."' ") or die(mysql_error());

	mysql_close($connection);
	}

?>