<?php
require 'connection.php';
date_default_timezone_set('Asia/Kuala_Lumpur');
// Find out who is online /////////
$tm = new DateTime();
$tm->sub(new DateInterval('PT15M'));
$date = $tm->format('Y-m-d H:i:s');
$id = $_SESSION['login_id'];
echo $id;
//// Let us update the table and set the status to OFF 
////for the users who have not interacted with 
////pages in last 10 minutes ( set by $gap variable above ) ///
$result = mysql_query("SELECT Last_Log FROM alulogin WHERE RegNo='".$id."' ");
$row = mysql_fetch_assoc($result);
$chktm = $row['Last_Log'];
if($chktm<$date){//for alumni
	echo "<meta http-equiv=\"refresh\"content=\"2;URL=logout.php\"/>"; // Redirecting To Other Page
}else{
	$result = mysql_query("UPDATE alulogin SET Last_Log=NOW(), status='ON' WHERE RegNo='".$id."'  ");
}

/// Now let us collect the userids from table who are online ////////
?>