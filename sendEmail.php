<?php
session_start();
require_once('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login Profile</title>
	<link rel="stylesheet" href="css/themes/south-street/jquery-ui.css">
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="js/styling.js"></script>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<script src="js/jquery.awesome-cursor.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/modalform.css">
	<script src="js/modalLogin.js"></script>
	<script src="js/modalcontact.js"></script>
</head>
<body>
	<a href="alumniPage.php"><button class="button-home">User Home</button></a>
	
	<form action="ContactEngine.php" method="post">
	      <label class="name">
	        <input type="text" name="name" placeholder="Name:" class="" required/>
	      </label>
	     
	      <label class="email">
	        <input id="email" name="email" type="email" placeholder="Email Address" class="" required>
	      </label>
	      <div class="">
	              <div class="">
	                  <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="10" cols="50" required></textarea>
	              </div>
	          </div>
	        <button class="" type="reset" name="reset">RESET</button>
	        <button class="" type="submit" name="submit">SEND</button>
	</form>   

</body>
</html>