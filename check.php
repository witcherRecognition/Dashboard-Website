<?php
if(isset($_POST['username']))
{
$usernames = array('john','michael','terry', 'steve', 'donald');

$username = $_POST['username'];

if(in_array($username, $usernames))
	{
	echo '<font color="red">The nickname <STRONG>'.$username.'</STRONG> is already in use.</font>';
	}
	else
	{
	echo 'OK';
	}
}

if(isset($_POST['email'])){
		$emails = array('abc123@gmail.com','rashid123@gmail.com');
		$email = $_POST['email'];
		if(in_array($email, $emails)){
			echo '<font color="red">The email <STRONG>'.$email.'</STRONG> is already in use.</font>';
		}else{
			echo "OK";
		}
}

/* 
// This is a sample code in case you wish to check the username from a mysql db table

if(isSet($_POST['username']))
{
$username = $_POST['username'];

$dbHost = 'db_host_here'; // usually localhost
$dbUsername = 'db_username_here';
$dbPassword = 'db_password_here';
$dbDatabase = 'db_name_here';

$db = mysql_connect($dbHost, $dbUsername, $dbPassword) or die ("Unable to connect to Database Server.");
mysql_select_db ($dbDatabase, $db) or die ("Could not select database.");

$sql_check = mysql_query("select id from members where username='".$username."'") or die(mysql_error());

if(mysql_num_rows($sql_check))
{
echo '<font color="red">The nickname <STRONG>'.$username.'</STRONG> is already in use.</font>';
}
else
{
echo 'OK';
}

}
*/
?>