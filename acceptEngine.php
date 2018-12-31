<?php
	session_start();
	echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";
	require 'connection.php';
	require 'functions.php';
	require 'PHPMailer/PHPMailerAutoload.php';
	$acceptid = array();
	$random_token=$date=$email=$username=$pwd=$ques=$ans="";

	if($_REQUEST['sendid']){
		$acceptid = json_decode($_REQUEST['sendid']);
		for ($i=0; $i <count($acceptid) ; $i++) {
			$result = mysql_query("SELECT * FROM `tmpemail` WHERE `Id` = '".$acceptid[$i]."' ");
			if($row = mysql_fetch_assoc($result)) {
				
				$random_token = $row['tmpRegNo'];
				$date = $row['tmpJoinDate'];
				$email = $row['tmpEmail'];
				$username = $row['tmpUserName'];
				$pwd = $row['tmpPwd'];
				$ques = $row['tmpQues'];
				$ans = $row['tmpAns'];

				$result = mysql_query("INSERT INTO `aludetail` (`RegNo`,`JoinDate`,`Email`) 
					VALUES ('".$random_token."','".$date."','".$email."') ") or die(mysql_error($connection));

				$result = mysql_query("INSERT INTO `alulogin` (`RegNo`,`UserName`,`Pwd`) 
					VALUES ('".$random_token."','".$username."','".$pwd."') ") or die(mysql_error($connection));

				$result = mysql_query("INSERT INTO `address` (`Id`,`lookId`) 
					VALUES ('".null."', '".$random_token."') ") or die(mysql_error($connection));

				$result = mysql_query("INSERT INTO `questionbase` 
					VALUES ('".$random_token."', '".$ques."', '".$ans."') ") or die(mysql_error($connection));

				$result = mysql_query("DELETE FROM `tmpemail` WHERE `Id` = '".$acceptid[$i]."' ");

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
				$mail->FromName = "Alumni UiTM Cawangan Kelantan";
				//email orang ngan username dari customertable
				$mail->addAddress("".$email."", "".$username."");
				$mail->addReplyTo("tupistudes@gmail.com", "Alumni Uitm Cawangan Kelantan");

				$mail->WordWrap = 70;
				$mail->isHTML(true);
				$mail->Subject = 'Auto Generate Password';
		   	 	$mail->Body    = "You Have Successfully Register ".$pwd." Here Is you Password.. You Can Change Your Password Once login ";
		         
		   	 	if(!$mail->send()) {
		       		echo 'Message could not be sent.';
		       		echo 'Mailer Error: ' . $mail->ErrorInfo;
		       		exit;
		        }
			}

		}	

	}

	mysql_close($connection);
?>