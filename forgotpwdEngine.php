<?php
	session_start();
	require "connection.php";
	require "functions.php";
	require 'PHPMailer/PHPMailerAutoload.php';
	$email=$answer=$token="";
	$x=0;

	if ($_REQUEST['forgotpwdemail']) {
			// To protect MySQL injection for Security purpose
			$email = test_input($_REQUEST['forgotpwdemail']);
			$answer = test_input($_REQUEST['forgotpwdans']); 

			//Generate a random string.
			$token = openssl_random_pseudo_bytes(5);
			//Convert the binary data into hexadecimal representation.
			$pwd = bin2hex($token);

			// SQL query to fetch information of registerd users and finds user match.
			$result = mysql_query("SELECT `RegNo` FROM `aludetail` 
				WHERE `Email`='".$email."' ") or die(mysql_error($connection));
			$alurow = mysql_fetch_assoc($result);
			$aluid = $alurow['RegNo'];

			$result = mysql_query("SELECT `RegNo` FROM `questionbase` 
				WHERE `SecAns`='".$answer."' ") or die(mysql_error($connection));
			$quesrow = mysql_fetch_assoc($result);
			$quesid = $quesrow['RegNo'];

			$result = mysql_query("UPDATE `alulogin` SET `Pwd`='".$pwd."' 
				WHERE `RegNo`='".$aluid."' AND `RegNo`='".$quesid."' ") or die(mysql_error($connection));

			$result = mysql_query("SELECT `UserName` FROM alulogin 
				WHERE `RegNo`='".$aluid."' AND `RegNo`='".$quesid."' ") or die(mysql_error($connection));
			$row = mysql_fetch_assoc($result);
			$username = $row['UserName'];

			$num = mysql_num_rows($result);

			if($num==1){
				$x++;
			}

			if ($x == 1) {
				$mail = new PHPMailer; 
				$mail->SMTPDebug = 3;
				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPSecure = 'tls';
				$mail->Port = 587;
				$mail->SMTPAuth = true;
				$mail->Username = 'tupistudes@gmail.com';
				$mail->Password = 'siputsedutlanarismuiz931';
				$mail->From = "tupistudes@gmail.com";
				$mail->FromName = "M.I.A BOT";
				//email orang ngan username dari customertable
				$mail->addAddress("".$email."", "".$username."");
				$mail->addReplyTo("tupistudes@gmail.com", "M.I.A BOT");

				$mail->WordWrap = 70;
				$mail->isHTML(true);
				$mail->Subject = 'Auto Generate Password';
			    $mail->Body    = "".$pwd." Here Is you New Password.. Please Make Sure to Remember Your Password..  ";
			         
			    if(!$mail->send()) {
			       echo 'Message could not be sent.';
			       echo 'Mailer Error: ' . $mail->ErrorInfo;
			    }
			    	
			}
			mysql_close($connection); // Closing Connection
	}

?>