<?php
require 'LoginEngine.php'; // Includes Login Script

if(isset($_SESSION['login_alumni'])){
header("location: alumniPage.php");
exit();
}
if(isset($_SESSION['login_moderator'])){
header("location: moderator.php");
exit();
}
if(isset($_SESSION['login_admin'])){
header("location: adminlevel1.php");
exit();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta http-equiv="Content-Type" charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
	<link rel="stylesheet" href="css/themes/redmond/jquery-ui.css">
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="js/styling.js"></script>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<script src="js/jquery.awesome-cursor.min.js"></script>
	<script src="js/modalLogin.js"></script>
	<script src="js/modalregister.js"></script>
	<script src="js/modalresetpwd.js"></script>
	<link rel="stylesheet" type="text/css" href="css/modalform.css">
	

</head>

<body style="font-size: 70%;">
	<div class="container">
	<header>
		<h1>UITM ALUMNI</h1>
		<img class="header-style" src="images/Logo_Uitm_06.jpg" style="">
	</header>

	<section class="main">
		<form class="form-2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<h1>
			<span class="log-in" style="display: block;">Log in</span>
			<a href="#" id="forgot-pwd"><span class="sign-up">forgot password?<u>click here</u></span></a>
			</h1>
			<input type="text" name="username" placeholder="Username" required autofocus>
			<input type="password" name="password" placeholder="********" required>
			<span style="color: #FF0000;"><?php echo $error;?></span>
	   		<br><br>
			<button type="submit" name="submit" class="button-1">Login</button>
			<a href="#" id="create-user">Sign Up?</a>
		</form>
	</section>
	</div>
	<?php
		require 'connection.php';
		$cmpemail=array();
		$cmpemailpwd['email'] = array();
		$cmpemailpwd['id'] = array();
		$result = mysql_query("SELECT * FROM aludetail") or die(mysql_error($connection));
		while($row = mysql_fetch_array($result)){
			array_push($cmpemail, $row['Email']);
			array_push($cmpemailpwd['email'], $row['Email']);
			array_push($cmpemailpwd['id'], $row['RegNo']);
		}
	?>
		<div name="checkcreateemail" id="checkcreateemail" style="display: none;">
			<?php echo json_encode($cmpemail);?>
		</div>
		<div name="checkemail" id="checkemail" style="display: none;">
			<?php echo json_encode($cmpemailpwd)?>
		</div>
	<?php
		mysql_close($connection);
	?>

	<div id="createuser-dialog-form" title="Create new Alumni">
	  <p class="validateTips">All form fields are required.</p>
	  <form>
	    <fieldset>
	      <label for="createname">Username</label>
	      <input type="text" name="createname" id="createname" value="" class="text ui-widget-content ui-corner-all">
	      <label for="createemail">Email</label>
	      <input type="text" name="createemail" id="createemail" value="" class="text ui-widget-content ui-corner-all">
	      <label for="createques">Secret Question</label>
	      <select name="createques" id="createques">
	      	<option value="Who is your first love?">Who is your first love?</option>
	      	<option value="
What is the last name of the teacher who gave you your first failing grade?">
What is the last name of the teacher who gave you your first failing grade?
	      	</option>
	      	<option value="What was the name of your elementary / primary school?">
	      		What was the name of your elementary / primary school?
	      	</option>
	      	<option value="In what city or town does your nearest sibling live">In what city or town does your nearest sibling live</option>
	      	<option value="What was the last name of your third grade teacher?">
	      		What was the last name of your third grade teacher?
	      	</option>
	      </select>
	      <label for="createans">Secret Answer</label>
	      <input type="text" name="createans" id="createans" value="" class="text ui-widget-content ui-corner-all">

	 
	      <!-- Allow form submission with keyboard without duplicating the dialog button -->
	      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
	    </fieldset>
	  </form>
	</div>
	
	<?php
		require 'connection.php';
		$ques['secret'] = array();
		$ques['id'] = array();
		$result = mysql_query("SELECT * FROM questionbase ") or die(mysql_error($connection));
		
		while($row = mysql_fetch_array($result)){
			array_push($ques['secret'],$row['SecAns']);
			array_push($ques['id'],$row['RegNo']);
		}
	?>	
		<div name="checkquestion" id="checkquestion" style="display: none;">
			<?php echo json_encode($ques);?>
		</div>

	<?php
		mysql_close($connection);
	?>
	<div id="forgotpwd-dialog-form" title="Reset Password">
	  <p class="validateTips">Enter A valid email and secret answer.</p>
	  <p class="log"></p>
	  <form>
	    <fieldset>
	      <label for="forgotpwdemail">Email</label>
	      <input type="text" name="forgotpwdemail" id="forgotpwdemail" value="" class="text ui-widget-content ui-corner-all">
	      <label for="forgotpwdans">Your Secret Answer</label>
	      <input type="text" name="forgotpwdans" id="forgotpwdans" value="" class="text ui-widget-content ui-corner-all">

	 
	      <!-- Allow form submission with keyboard without duplicating the dialog button -->
	      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
	    </fieldset>
	  </form>
	</div>

</body>
</html>