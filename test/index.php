<?php
session_start();
include('connect_base.php');
include('functions.php');

if(isset($_POST['setRep'])){
	$listingID=mysql_real_escape_string(trim($_POST['setRep']));
	$reportReason=mysql_real_escape_string(trim($_POST['reportReason']));
	$reportText=mysql_real_escape_string(trim($_POST['reportText']));
	$repIP = $_SERVER['REMOTE_ADDR'];
	reportListing($listingID, $reportReason, $reportText, $repIP);
	header('Location: index.php');
}

if(isset($_SESSION['userid'])){
	header('Location: home.php');	
}
elseif(isset($_COOKIE['dfkajd83dsak'])){
	$sessionID=$_COOKIE['dfkajd83dsak'];
	if(isset($_COOKIE['jdjfae43dlag02'])){
		$userID=$_COOKIE['jdjfae43dlag02'];
		
		$LoQuE="select * from loginDetails where sessionID='$sessionID' and loggedIn='Y' and KeepLoggedIn='Y' limit 1;";
		$LoQuR=mysql_query($LoQuR, $db);
		$LoQuD=mysql_fetch_array($LoQuR);
		
		$user=md5($LoQuD[0]);
		
		if($user===$userID){
			$_SESSION['userid']=$LoQuD[0];
			$_SESSION['ID']= $LoQuD[1];
			header('Location: home.php');
		}
	}
}
if(isset($_GET['m'])){
	echo $_GET['m'];
}

$val=$_GET['val'];
if($val==='authfail'){
	echo "<script>alert('Authentication failed! Please re-try.')</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>sharethelove.co.in | Home</title>
<link rel="shortcut icon" href="images/LOGO-1-SMALL" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html" />
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="keywords" content="" />

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/lightbox.min.css" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<!-- //js -->
<!-- google-analytics script-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-73731062-1', 'auto');
  ga('send', 'pageview');
 
</script>
<!--  -->
<script>
$(document).ready(function(){
	$('#login-trigger').click(function(){
		var offset = $('#header').offset();
		var xxx = offset.left + 780 + "px";
		$(this).toggleClass('active');
		$(this).next('#login-content').css({
			'left': xxx
		});
		$(this).next('#login-content').slideToggle();
		
		
		
		
		if ($(this).hasClass('active')){
			$(this).find('span').html('&#x25B2;');
			$('.welcome').fadeTo( "slow", 0.33 );
			$('.news').fadeTo( "slow", 0.33 );
			$('.footer').fadeTo( "slow", 0.33 );
		}else{
			$(this).find('span').html('&#x25BC;');
			$('.welcome').fadeTo( "fast", 1 );
			$('.news').fadeTo( "fast", 1 );
			$('.footer').fadeTo( "fast", 1 );
		}
	});

	$(document).mouseup(function(){
	    $('#login-content').slideUp();	
	 });
	$('#login-content').mouseup(function(){
	    return false;	
	 });
	$('#login-trigger').mouseup(function(){
	    return false;	
	 });
		
    
});
  
$(function() {
	$( "#sfdate" ).datepicker({
		defaultDate: "+0d",
		changeMonth: true,
		numberOfMonths: 1,
		changeYear: true,
		onClose: function( selectedDate ) {
			$( "#stdate" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( "#stdate" ).datepicker({
		defaultDate: "+0d",
		changeMonth: true,
		numberOfMonths: 1,
		changeYear: true,
		onClose: function( selectedDate ) {
			$( "#sfdate" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
});	  
  
$(document).ready(function(){
	$("#signupForm").validate({
		rules: {
			upass: "required",
			cupass: {
				equalTo: "#upass"
			}
		}		
	});
});

function doClosePf(){
	$("#hoverD").hide();
	$(".contentDiv").empty();
	$('#showProfile').hide();
}

function doClose() {
	$("#reportBox").hide();
	$("#hoverD").hide();
}

function doOk() {
	$('#reportForm').submit();
	$("#reportBox").hide();
	$("#hoverD").hide();
}

function warning(txt) {
	if(confirm('Do you really want to report this posting?')){
		$('#reportForm').append('<input type="hidden" name="setRep" value="' + txt + '" />');
		//$('#searchCFrm').submit();
		
		$("#hoverD").show();
		$("#reportBox").show();
		//$("#reportBox").center();
	}else {
  		return false;
	}
}

function loadProfile(txt3){
	$("#hoverD").show();
	//$("showProfile").show();
	
	var link='profile.php?action=show&user=' + txt3;
	$(".contentDiv").load( link, function() {
		$("#showProfile").show();
	});
}
</script>
	
<body>
<!-- header -->	
<div class="header container" id="header">
	<div class="header-left">
		<div id="logo"></div>
		<a href="index.php"><img src="images/Sharethelove.co.in.png" /></a>
	</div>
	<div class="header-right">
	<nav>
		<ul>
			<li><a href="About us/about us.php" >ABOUT</a></li>
			<li><a href="../blog" target="_blank">BLOG</a></li>
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
		
<!-- welcome -->
<div id="home" class="container">
	<div class="admin-text-left">
		<div class="homewelcomecontent">
		<h1><img src="images/connect-collaborate-redefine.png" /></h1>
		<p>sharethelove.co.in is a platform to find volunteering opportunities for a cause close to your heart, at 
			a location near you or both!</p>
		<p>Connect with people and institutions, take up a volunteering role and allow your experiences to redefine the 
			way you look at life and leave a positive mark on our society!</p>
		<h3><img src="images/Happy-Volunteering.png" /></h3>
		</div>
	</div>
	<div class="admin-text-right">
	<div class="homerightcontent">
		<p>To see all the latest projects or to add a project, please...</p>
		<h1 class="signpuhead">SIGN UP</h1>
		<form id="signupForm" name="sign_up" method="post" action="signup.php">
		<table>
		<tr>
			<td>Name</td><td><input type="text" class="required" name="uname" id="uname" /></td>
		</tr>
		<tr>
			<td>Email</td><td><input type="email" class="required email" name="uemail" id="uemail" /></td>
		</tr>
		<tr>
			<td>Username</td><td><input type="text" class="required" name="uhandle" id="uhandle" /></td>
		</tr>
		<tr>
			<td>Password</td><td><input type="password" class="required" name="upass" id="upass" /></td>
		</tr>
		<tr>
			<td>Confirm Password&nbsp;&nbsp;</td><td><input type="password" class="required" name="cupass" id="cupass" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="btnconfirm" id="btnconfirm" class="signupbtn" value="go!" /></td>
		</tr>
		</table>
		</form>
	</div>
	</div>
</div>

<div class="search container">
<center>
	<form id="search" name="search" method="GET" action="index.php">
		<input type="text" name="sstring" id="sstring" class="searchboxfull" placeholder="SEARCH, use keywords such as environment, Delhi, tree plantation" />
		<input type="text" name="sloc" id="sloc" class="searchboxsmall" placeholder="Location +" /><input type="text" name="scause" id="scause" class="searchboxsmall" placeholder="Cause +" /><input type="text" name="sfdate" id="sfdate" class="searchboxsmall" placeholder="From Date +" /><input type="text" name="stdate" id="stdate" class="searchboxsmall" placeholder="To Date +" /><br />
		<input type="submit" name="btnsearch" id="btnsearch" value="enter" />
	</form>
</center>
</div>
<?php
if(isset($_GET['sstring']) && (trim($_GET['sstring'])!=='')){
	$sstring=mysql_real_escape_string(trim($_GET['sstring']));
	$sloc=mysql_real_escape_string(trim($_GET['sloc']));
	$scause=mysql_real_escape_string(trim($_GET['scause']));
	$sfdate=mysql_real_escape_string(trim($_GET['sfdate']));
	$stdate=mysql_real_escape_string(trim($_GET['stdate']));
	$SQ="select listings.listingID, listings.addedBy, listings.project_name, listings.state, listings.district, listings.city, listings.cause, listings.fromDate, listings.toDate, listings.vacancies, listings.about, listings.role, listings.meal, listings.stay, listings.transport, listings.email, listings.phone, listings.mobile, listings.addedOn, listings.addIP, listings.img1, listings.img2, listings.img3, listings.img4, listings.img5, listings.descimg1, listings.descimg2, listings.descimg3, listings.descimg4, listings.descimg5, listings.rep1, listings.rep2, listings.rep3, listings.rep4, listings.rep5, listings.repdesc1, listings.repdesc2, listings.repdesc3, listings.repdesc4, listings.repdesc5, tbl_sign_up.username from listings join tbl_sign_up where listings.addedBy=tbl_sign_up.userid and (project_name like '%$sstring"."%' or about like '%$sstring"."%' or role like '%$sstring"."%')";
	if($sloc==''){
	}else{
		$SQ .= " and (listings.state like '%".$sloc."%' or listings.district like '%".$sloc."%' or listings.city like '%".$sloc."%') ";
	}
	if($scause==''){
	}else{
		$SQ .= " and (listings.cause like '%".$scause."%') ";
	}
	if(($sfdate!='') && ($stdate!='')){
		$SQ .= " and listings.fromDate >= '$sfdate' and listings.toDate <= '$stdate' ";
	}elseif($sfdate!=''){
		$SQ .= " and listings.fromDate == '$sfdate' ";
	}elseif($stdate!=''){
		$SQ .= " and listings.toDate == '$stdate' ";
	}
	$SQ .= " order by listingID desc;";
	$SR=mysql_query($SQ, $db);
?>
<div class="container" id="searchResult">
	<form id="searchCFrm" method="post">
	<div class="resultstbltop"><img src='images/Search-results.png' /></div>
<?php
//echo "<br>$SQ<br>";
    $count = 1;
	while($row=mysql_fetch_array($SR)){
		$currentID=$row[0];
		$path="userfiles/$row[1]/list".$row[0]."/";
		$Tpath="userfiles/$row[1]/list".$row[0]."/thumbs/";
		$timetodisplay = DateTime::createFromFormat('Y-m-d H:i:s', $row[18])->format('d-M-Y');
		echo "<div class='resultstbl' id='$currentID'>\r";
		echo "<h4>Project: $row[2]\r";
		echo "<div class='searchcontrols'>$timetodisplay &nbsp;<a href='#$currentID' onClick='return warning($currentID);'>Report</a></div></h4>\r";
		echo "<div class='clearfix'> </div>\r";
		echo "<div class='mainsearchresult'>\r";
		echo "<div class='lefttbl'>Posted By: <a href='#$currentID' onclick='msg();'>$row[40]</a></div>
		<div class='righttbl'>No of Vacancies: $row[9]</div>\r";
		echo "<div class='clearfix'> </div>\r";
		echo "<div class='lefttbl'>Location: $row[5]($row[3])</div><div class='righttbl'>Cause: $row[6]</div>\r";
		echo "<div class='clearfix'> </div>\r";
		echo "<div class='lefttbl'>Start Date: $row[7]</div><div class='righttbl'>End Date: $row[8]</div>\r";
		echo "<div class='clearfix'> </div>\r";
		echo "<div class='gal'>\r";
		if(trim($row[20])!=''){
			//echo "<img class='simg' src='$Tpath$row[20]' />";
			echo "<a class='example-image-link' href='$path$row[20]' data-lightbox='$count' ><img class='example-image simg' src='$path$row[20]' alt=''/></a>";
		}
		if(trim($row[21])!=''){
			//echo "<img class='simg' src='$Tpath$row[21]' />";
			echo "<a class='example-image-link' href='$path$row[21]' data-lightbox='$count' ><img class='example-image simg' src='$path$row[21]' alt=''/></a>";
		}
		if(trim($row[22])!=''){
			//echo "<img class='simg' src='$Tpath$row[22]' />";
			echo "<a class='example-image-link' href='$path$row[22]' data-lightbox='$count' ><img class='example-image simg' src='$path$row[22]' alt=''/></a>";
		}
		if(trim($row[23])!=''){
			//echo "<img class='simg' src='$Tpath$row[23]' />";
			echo "<a class='example-image-link' href='$path$row[23]' data-lightbox='$count' ><img class='example-image simg' src='$path$row[23]' alt=''/></a>";
		}
		if(trim($row[24])!=''){
			//echo "<img class='simg' src='$Tpath$row[24]' />";
			echo "<a class='example-image-link' href='$path$row[24]' data-lightbox='$count' ><img class='example-image simg' src='$path$row[24]' alt=''/></a>";
		}
		echo "</div>\r";
		echo "<div class='clearfix'> </div>";
		echo "<div class='subsearchresult'>\r";
		echo "<div class='lefttbl'><p><b>About the Project: </b></p><p>$row[10]</p></div>\r";
		echo "<div class='righttbl'><p><b>About the Role: </b></p><p>$row[11]</p></div>\r";
		echo "<div class='clearfix'> </div>";
		echo "<div class='lefttbl'><p><b>Contact Details: </b></p>\r";
		if(trim($row[15])!==''){
			echo "<p>Email : <a href='mailto:$row[15]'>$row[15]</a></p>\r";
		}
		if(trim($row[16])!==''){
			echo "<p>Phone : <a href='tel:$row[16]'>$row[16]</a></p>\r";
		}
		if(trim($row[17])!==''){
			echo "<p>Mobile : <a href='tel:$row[17]'>$row[17]</a></p>\r";
		}
		echo "</div>\r";
		echo "<div class='righttbl'><p><b>Provisions: </b></p>";
		if(trim($row[12])=='Y'){
			echo "<p>Meal</p>\r";
		}
		if(trim($row[13])=='Y'){
			echo "<p>Stay</p>\r";
		}
		if(trim($row[14])=='Y'){
			echo "<p>Transport</p>\r";	
		}				
		echo "</div>\r";

		echo "<div class='clearfix'> </div>\r<div>\r<p>More links...<br />";
		if(trim($row[30])!=''){
			echo " <a href='$row[30]'>$row[30]</a>";
		}
		if(trim($row[31])!=''){
			echo " <a href='$row[31]'>$row[31]</a>";
		}
		if(trim($row[32])!=''){
			echo " <a href='$row[32]'>$row[32]</a>";
		}
		if(trim($row[33])!=''){
			echo " <a href='$row[33]'>$row[33]</a>";
		}
		if(trim($row[34])!=''){
			echo " <a href='$row[34]'>$row[34]</a>";
		}
		echo "</p></div><div class='clearfix'> </div>";
		echo "</div>\r";
		echo "<a class='moreshow' href='#$currentID' onclick='msg()'><span>Expand&nbsp;+</span></a>\r";/* add onclick function */
		echo "</div>\r";
		echo "</div>\r";
		$count++;

	}
?>
	<script src="js/lightbox-plus-jquery.min.js"></script>
	<script>

	function msg(){
		alert("To see full details request you to please login or sign up");
	}
 //    $(document).ready(function(){
	//   	$('.moreshow').click(function(){
	// 		$(this).prev('.subsearchresult').slideToggle();
	// 		$(this).toggleClass('active');
					
	// 		if ($(this).hasClass('active')){
	// 			$(this).find('span').html('Minimize&nbsp;-');
	// 		}else{
	// 			$(this).find('span').html('Expand&nbsp;&+');
	// 		}
	// 	});
	// }); /* Close Extend Functionality */
	/*
	$('.simg').click(function() {
		//alert($(this).attr('src'));
	});
	$(function() {
	    //$('.gal a').lightBox();
	});*/		
	</script>
	</form>
</div>
<?php
}
?>
<!-- //welcome -->

<!--/index-team-->

<!-- news -->
<div class="support container" >
	<h3><a href="About us/about us.php"><img src="images/support-us.png" /></a></h3>
	<div class="socialmedia"><h3><img src="images/follow-us.png" /> <a href="https://www.facebook.com/sharethelovecoin-1507486976240873/" target="_blank"><img src="images/fb.png" /></a> <a href="https://www.instagram.com/sharethelove.co.in/" target="_blank"><img src="images/insta.png" /></a> <a href="https://twitter.com/SharetheloveIn" target="_blank"><img src="images/twitter.png" /></a></h3></div>
	<div class="clearfix"></div>
</div>


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

<div id="reportBox">
<p class="headbar"><a href="#" onClick="doClose();">x</a></p>
<form id="reportForm" method="post">
<p>Please select a reason to report:</p>
<select name="reportReason" id="reportReason">
<option value="Objectionable material">Objectionable material</option>
<option value="False information">False information</option>
<option value="Does not exist">Does not exist</option>
<option value="Other">Other</option>
</select>
<textarea name="reportText" id="reportText"></textarea>
<p class="headbar"><a href="#" onClick="doOk();">Report</a></p>
</form>
</div>

<div id="hoverD"></div>

<div id="showProfile">
<p class="headbar"><a href="#" onClick="doClosePf();">x</a></p>
<div class="contentDiv"></div>
</div>
<!--<script src="js/lightbox-plus-jquery.min.js"></script>
<!-- //footer -->
</body>
</html>