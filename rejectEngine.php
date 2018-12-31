<?php
	session_start();
	echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";
	require 'connection.php';
	require 'functions.php';
	require 'PHPMailer/PHPMailerAutoload.php';
	$rejectid = array();

	if($_REQUEST['sendid']){
		$rejectid = json_decode($_REQUEST['sendid']);
		for ($i=0; $i <count($rejectid) ; $i++) {
			$result = mysql_query("SELECT * FROM `tmpemail` WHERE `Id` = '".$rejectid[$i]."' ");
			if($row = mysql_fetch_assoc($result)) {
				
				$random_token = $row['tmpRegNo'];
				$date = $row['tmpJoinDate'];
				$email = $row['tmpEmail'];
				$username = $row['tmpUserName'];
				$pwd = $row['tmpPwd'];
				$ques = $row['tmpQues'];
				$ans = $row['tmpAns'];

				$result = mysql_query("DELETE FROM `tmpemail` WHERE `Id` = '".$rejectid[$i]."' ");

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
				$mail->FromName = "C.P.M BOT";
				//email orang ngan username dari customertable
				$mail->addAddress("".$email."", "".$username."");
				$mail->addReplyTo("tupistudes@gmail.com", "MIABOT");

				$mail->WordWrap = 70;
				$mail->isHTML(true);
				$mail->Subject = 'Auto Generate Password';
		   	 	$mail->Body    = "Your registration have been rejected there is a problem with your input please try again to registration ";
		         
		   	 	if(!$mail->send()) {
		       		echo 'Message could not be sent.';
		       		echo 'Mailer Error: ' . $mail->ErrorInfo;
		       		exit;
		        }
			}

		}	

	}
?>