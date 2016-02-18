<?php
	include('connect_base.php');
	session_start();
	$sessID= session_id();
	$userid= $_SESSION['userid'];
	$signIP = $_SERVER['REMOTE_ADDR'];
	$LQ="update loginDetails set loggedIn='N', KeepLoggedIn='N' where sessionID='$sessID' and userID='$userid' and loginIP='$signIP';";
	mysql_query($LQ, $db);
	session_destroy();
	header('Location: index.php');	
	//echo "<script> location.href='http://sharethelove.co.in/index.php' </script>";
?>