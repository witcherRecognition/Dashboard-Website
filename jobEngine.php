<?php
	session_start();
	require 'connection.php';
	require 'functions.php';
    $compname=$compprof=$position=$jobdes=$categ=$locat=$desprof=$desexp=$creatdate=$expdate=$contper=$design=$offno=$email="";

    if($_REQUEST['compname']){
    	$compname = test_input($_REQUEST['compname']);
    	$compprof = test_input($_REQUEST['compprof']);
    	$position = test_input($_REQUEST['position']);
    	$jobdes= test_input($_REQUEST['jobdes']);
    	$categ = test_input($_REQUEST['categ']);
    	$locat = test_input($_REQUEST['locat']);
    	$desprof = test_input($_REQUEST['desprof']);
    	$desexp = test_input($_REQUEST['desexp']);
    	$creatdate = test_input($_REQUEST['creatdate']);
    	$expdate = test_input($_REQUEST['expdate']);
    	$contper = test_input($_REQUEST['contper']);
    	$design = test_input($_REQUEST['design']);
    	$offno = test_input($_REQUEST['offno']);
    	$email = test_input($_REQUEST['email']);

    	$checkid = $_SESSION['login_id'];
    	$result = mysql_query("INSERT INTO `aluvacancies` 
    		VALUES ('".null."','".$compname."','".$compprof."','".$position."','".$jobdes."','".$categ."','".$locat."','".$desprof."','".$desexp."','".$creatdate."','".$expdate."','".$contper."','".$design."','".$offno."','".$email."','".$checkid."') ") or die(mysql_error());


    }
	
	mysql_close($connection);
?>