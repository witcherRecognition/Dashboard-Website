<?php

define('INCLUDE_CHECK',true);

require "connection.php";
require "functions.php";
session_start(); // Starting Session
date_default_timezone_set('Asia/Kuala_Lumpur');

$error=''; // Variable To Store Error Message
	$username = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// To protect MySQL injection for Security purpose
			$username=test_input($_POST['username']);
			$password=test_input($_POST['password']);
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysql_query("SELECT * FROM alulogin WHERE UserName='".$username."' AND Pwd='".$password."' ") or die(mysql_error());
			$rows = mysql_num_rows($query);

			if ($rows == 1) {
			$date = (new \DateTime())->format('Y-m-d H:i:s');
			$result = mysql_query("UPDATE alulogin SET status='ON', Last_Log='".$date."' WHERE UserName='".$username."' AND Pwd='".$password."' ");
			$_SESSION['login_alumni']=$username; // Initializing Session
			header("location: alumniPage.php"); // Redirecting To Other Page
			exit();
			}else {
				$adquery = mysql_query("SELECT * FROM moderator WHERE Name='".$username."' AND Pwd='".$password."' ") or die(mysql_error());
				$check = mysql_num_rows($adquery);

				if($check == 1){
				$date = (new \DateTime())->format('Y-m-d H:i:s');	
				$result = mysql_query("UPDATE moderator SET status='ON', Last_Login='".$date."'  WHERE Name='".$username."' AND Pwd='".$password."' ");	
				$_SESSION['login_moderator'] = $username;
				header("location: moderator.php");
				exit();
				}else{
					$ad1query = mysql_query("SELECT * FROM admin WHERE Name='".$username."' ");
					$checkname = mysql_num_rows($ad1query);
					$row = mysql_fetch_array($ad1query);
					$id = $row['Id'];
					$nameadmin = $row['Name'];
					$ad1query = mysql_query("SELECT * FROM pwd WHERE Pwd='".$password."' AND Id ='".$id."'  ");
					$checkpwd = mysql_num_rows($ad1query);

					if($checkname==1 && $checkpwd==1){
						$_SESSION['login_admin'] = $username;
						header("location: adminlevel1.php");
						exit();
					}else{
						$error = "Username or Password is invalid";
					}
				}	
			}			
			mysql_close($connection); // Closing Connection
	}
?>