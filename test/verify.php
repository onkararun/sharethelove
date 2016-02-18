<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
ob_start();
include('connect_base.php');
include('functions.php');

if (isset($_REQUEST['email'])) {
	$email = mysql_real_escape_string(trim($_REQUEST['email']));
	$is_valid_email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if($is_valid_email !== FALSE) {

	  $query = "select * from tbl_sign_up where emailid = '$email' AND verified = 0";
 	  $res = mysql_query($query);
	  $row = mysql_fetch_array($res);
      
      if (count($row)) {
	    $query = "update tbl_sign_up set verified = 1 WHERE emailid = '$email'";
	    mysql_query($query);
        $m = "Your account is activated";
      }
      else {
        $m = "Opps! you seem to have attempted with invalid email";
      }
    }
    else {
      $m = "Opps! your email is not valid";
    }
} 
else {
  $m = "Invalid verification, please check your mail for correct verification link.";
}

header('Location: index.php?m='.$m);
ob_end_flush();
