<?php
	session_start();
	require 'connection.php';
	require 'functions.php';
	$compname=$compprof=$position=$jobdes=$categ=$locat=$desprof=$desexp=$creatdate=$expdate=$contper=$design=$offno=$email=$id="";

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
    	$id = test_input($_REQUEST['id']);

    	$checkid = $_SESSION['login_id'];

    	$result = mysql_query("UPDATE `aluvacancies` 
    		SET `CompanyName`='".$compname."',`CompanyProfile`='".$compprof."',`Position`='".$position."' ,`JobDescription`='".$jobdes."' ,`Category`='".$categ."',`Location`='".$locat."',`DesiredProfile`='".$desprof."' ,`DesiredExp`='".$desexp."' ,`CreatedDate`='".$creatdate."' ,`ExpiryDate`='".$expdate."' ,`ContactPerson`='".$contper."' ,`Designation`='".$design."' ,`OfficeNo`='".$offno."',`Email`='".$email."' WHERE `Id`='".$id."' AND `LookId`='".$checkid."'  ");


    }
	
	mysql_close($connection)
?>