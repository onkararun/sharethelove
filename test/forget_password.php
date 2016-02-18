<!DOCTYPE html>
<html>
<head>
<title>sharethelove.co.in | Password Reset</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery-1.6.2.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<!-- //js -->
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html" />
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
</head>
	
<body>
<!-- header -->	
	<!--<div class="header" id="move-top">-->
<div class="header container" id="header">
	<div class="header-left">
		<div id="logo"></div>
		<a href="index.php"><img src="images/Sharethelove.co.in.png" /></a>
	</div>
	<div class="header-right">
	<nav>
		<ul>
			<li><a href="About us/about us.html" >ABOUT</a></li>
			<li><a href="../blog" >BLOG</a></li>
			<li><a id="login-trigger" href="#"><img src="images/login_button.png" /></a>
			<div id="login-content">
				<fieldset>
				<form id="loginform" name="loginform" method="post" action="home.php">
					<input id="Loginemail" type="email" name="Loginemail" placeholder="Your email id" />
					<input id="lpass" type="password" name="lpass" placeholder="Password" />
					<input type="submit" name="btnlogin" id="btnlogin" value="Log in" /><br />
					<label><input type="checkbox" name="chkKeepLoged" id="chkKeepLoged" />&nbsp;Keep me logged-in</label><br />
					<a href="forget_password.php">Forgot Password</a>
				</form>
				</fieldset>
			</div>           
			</li>
		</ul>
	</nav>
	</div>
</div>
	<!-- <div class="header">
		<div class="container">
			<div class="header-left">
				<h2><a href="index.php">sharethelove.co.in</a></h2>
			</div>
			<div class="header-right">
			<nav>
				<ul>
					<li>&nbsp;</li>					
				</ul>
			</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>	 -->	
<!-- welcome -->
<div class="welcome welcome-wrapper">
<div class="container signup">
<?php
include('connect_base.php');
if(isset($_POST['submit']) && !empty($_POST['submit'])){
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
        //your site secret key
        $secret = '6LfBuBATAAAAAA2OrTF-66F6QS3iNjd42O06PTMr';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success){
            //contact form submission code
            $email = !empty($_POST['email'])?$_POST['email']:'';
            
            $succMsg = 'Your contact request have submitted successfully.';
            
            $CHUQ="select count(*) from tbl_sign_up where emailid='$email';";
            $CHUR=mysql_query($CHUQ, $db);
            $CHUD=mysql_fetch_array($CHUR);
            //echo "<br>Count is $CHUD[0]<br>";
            if($CHUD[0] <= 0){
            	echo "<p>No such user found. Please re-try.</p>\r\n";
            }else{

	            session_start();
	            $resVar= session_id();
	            $mdVar=md5($resVar);
	            $IP=$_SERVER['REMOTE_ADDR'];
	            $cuDate=date('Y-m-d H:i:s');
	            //echo "$resVar <br /> ".md5($resVar) . "<br />";
	            
	            $RESQ="insert into passwordreset (email, sessionID, MD5, IP, reqDate, used) values ('$email', '$resVar', '$mdVar', '$IP', '$cuDate', 'N');";
	            mysql_query($RESQ, $db);
	            
	            $subject = 'Reset password';
	            $htmlContent = "<p>A reset password request has been initiated on your account. Please click the link below to reset your password.<br />\r\n";
	            $htmlContent .= "In case, you are unable to open the link, copy the link and paste in your browser's address bar.</p>\r\n";
	            $htmlContent .= "<p><a href='http://www.sharethelove.co.in/forget_password.php?action=reset&user=".$email."&token=".$resVar."&sec=".$mdVar."'>";
	            $htmlContent .= "http://www.sharethelove.co.in/forget_password.php?action=reset&user=".$email."&token=".$resVar."&sec=".$mdVar."</a></p>";
	
	            $headers = "MIME-Version: 1.0" . "\r\n";
	            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	            $headers .= "From: sharethelove.co.in <no-reply@sharethelove.co.in>\r\n";
	
	            //send email
	            @mail($email,$subject,$htmlContent,$headers);
	            //echo "<br>$htmlContent<br>";

					echo "<p>A password reset mail is sent on your email id <i>$email</i>. Please check your email and follow the instructions.</p>\r\n"; 
					echo "<p><a href='index.php'>Go back...</a></p>\r\n";           
	            echo "<script>setTimeout(window.location='index.php', 10000);</script>";
	            session_destroy();

            }

        }else{
            $errMsg = 'Robot verification failed, please try again.';
        }
    }else{
        $errMsg = 'Please click on the reCAPTCHA box.';
    }
}elseif(isset($_GET['action']) && ($_GET['action']==='reset')){
	//echo "will reset password";
	$Remail=$_GET['user'];
	$Rtoken=$_GET['token'];
	$Rsec=$_GET['sec'];
	
	$RSql="select * from passwordreset where email='$Remail' and sessionID='$Rtoken' and MD5='$Rsec' and used='N';";
	$Rdat=mysql_query($RSql, $db);
	$Rval=mysql_num_rows($Rdat);
	
	if($Rval<=0){
		echo "<p>Invalid arguments, arguments mismatch. ERROR!!!</p>\r\n<p>Password reset failed. Please re-try.</p>\r\n";	
	}else{
?>
		<form id="pForm" name="pForm" method="post" action="forget_password.php">
		<input type="hidden" name="pEmail" value="<?php echo $Remail; ?>" />
		<input type="hidden" name="Rtoken" value="<?php echo $Rtoken; ?>" />
		<input type="hidden" name="Rsec" value="<?php echo $Rsec; ?>" />
			<table>
			<tr>
				<td>Password</td><td><input type="password" class="required" name="upass" id="upass" /></td>
			</tr>
			<tr>
				<td>Confirm Password&nbsp;&nbsp;</td><td><input type="password" class="required" name="cupass" id="cupass" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btnReset" id="btnReset" value="Reset" /></td>
			</tr>
			</table>
		</form>
<?php		
	}	
}elseif(isset($_POST['btnReset']) && ($_POST['btnReset']==='Reset')){
	$pEmail=$_POST['pEmail'];
	$upass=$_POST['upass'];
	$Rtoken=$_POST['Rtoken'];
	$Rsec=$_POST['Rsec'];	
	$resIP=$_SERVER['REMOTE_ADDR'];
	
	$UPQ="update tbl_sign_up set password=password('$upass') where emailid='$pEmail';";
	mysql_query($UPQ);
	echo "<p>Password successfully udpated. Please re-login to check.</p>\r\n";
	
	$UPq="update passwordreset set used='Y', resIP='$resIP' where email='$pEmail' and sessionID='$Rtoken' and MD5='$Rsec' and used='N';";
	//echo "<br>$UPq<br>";
	mysql_query($UPq);
	echo "<p><a href='index.php'>Go Back ...</a></p>";
}else{
    $errMsg = '';
    $succMsg = '';
?>
<form method="post" action="forget_password.php">
	
		<div class="welcome-head text-center">
			<h2>Reset Password</h2>
		</div>
		<p>&nbsp;</p><p>&nbsp;</p>
		<center>
		<table>
			<tr><td><p class="email">Email* &nbsp;&nbsp;<input type="email" name="email" id="email" /></p></td></tr>
			<tr><td><div class="g-recaptcha" data-sitekey="6LfBuBATAAAAAJPDPEud-UhWwff-0EISJfgUeXd-"></div></td></tr>
			<tr><td><p><input type="submit" name="submit" value="SUBMIT" /></p></td></tr>
		</table>
		</center>
		<p>&nbsp;</p>
		<p>* Please enter the email ID registered with us. A password reset link will be sent to you on this email.</p>
	
</form>
<?php
}
?>
</div>
</div>
<!-- //welcome -->

<!--/index-team-->

<!-- footer -->
<div class="footer container">
	<div class="footer-left">
		<p>&copy; Detour Ventures. All rights reserved</p>
	</div>
	<div class="footer-right">
		<ul class="footer-nav">
			<li><a href="index.php">Home</a>|</li>
			<li><a href="About us/about us.php">About</a>|</li>
			<li><a href="legal_information/legal_information.php">Legal Information</a>|</li>
			<li><a href="PP/PP.php">Privacy Policy</a>|</li>
			<li><a href="T&C/T&C.php">T&C</a></li>		
		</ul>
	</div>
</div>
<!-- <div class="footer">
	<div class="container">
	<div class="footer-bottom-at">
		<div class="col-md-6 footer-grid">
		&copy; 2015 sharethelove. All rights reserved
		</div>
		<div class="col-md-6 footer-grid-in">
		<ul class="footer-nav">
			<li><a href="index.php">Home</a>|</li>
			<li><a href="#">About</a>|</li>
			<li><a href="#">Contribute/Advertise</a>|</li>
			<li><a href="#">Disclaimer</a>|</li>
			<li><a href="#">Contact</a></li>	
		</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
	</div>
</div> -->

<!-- //footer -->
</body>
</html>