<?php
session_start();
ob_start();
include('connect_base.php');
include('functions.php');

if(isset($_POST['setDel'])){
	$listingID=mysql_real_escape_string(trim($_POST['setDel']));
	deleteListing($listingID);
	header('Location: home.php');
	ob_end_flush();
	//echo "<script> location.href='http://sharethelove.co.in/home.php' </script>";
}

if(isset($_POST['setRep'])){
	$listingID=mysql_real_escape_string(trim($_POST['setRep']));
	$reportReason=mysql_real_escape_string(trim($_POST['reportReason']));
	$reportText=mysql_real_escape_string(trim($_POST['reportText']));
	$repIP = $_SERVER['REMOTE_ADDR'];
	reportListing($listingID, $reportReason, $reportText, $repIP);
	header('Location: home.php');
	ob_end_flush();
	//echo "<script> location.href='http://sharethelove.co.in/home.php' </script>";
}

if((!isset($_POST['btnlogin'])) && (!isset($_POST['btnSignUp']))){
	if(isset($_SESSION['userid'])){
		$userid=$_SESSION['userid'];
		$UDQ="select * from tbl_sign_up where userid='$userid';";
		$resUDQ=mysql_query($UDQ, $db);
		$dUDQ=mysql_fetch_array($resUDQ);
		
		$username =$dUDQ['username'];
		$password =$dUDQ['password'];
		$state =$dUDQ['state'];
		$district =$dUDQ['district'];
		$city =$dUDQ['city'];
		$dob =$dUDQ['dob'];
		//$dob = DateTime::createFromFormat('m/d/Y', $dUDQ['dob'])->format('d-M-Y');
		$profilepic =$dUDQ['profilepic'];
		$usertype =$dUDQ['usertype'];
		$bio =$dUDQ['bio'];
		$emailid =$dUDQ['emailid'];
		$name =$dUDQ['name'];
		$url= $dUDQ['url'];
		$structure="userfiles/$userid/";
		$pageTitle="ShareTheLove | Home : ".$username;	
	}else{
		session_destroy();
		header('Location: index.php?val=authfail');
		ob_end_flush();
		//echo "<script> location.href='http://sharethelove.co.in/index.php?val=authfail' </script>";
	}
}

if(isset($_POST['btnlogin'])){
	$Loginemail=mysql_real_escape_string(trim($_POST['Loginemail']));
	$lpass=mysql_real_escape_string(trim($_POST['lpass']));
	$chkKeepLoged=mysql_real_escape_string(trim($_POST['chkKeepLoged']));
	if($chkKeepLoged){
		$keeplogged='Y';
	}
	else{
		$keeplogged='N';
	}
	$UDQ="select * from tbl_sign_up where emailid='$Loginemail' and password=password('$lpass');";
	$resUDQ=mysql_query($UDQ, $db);
	$dUDQ=mysql_fetch_array($resUDQ);
	$dataUDQ=mysql_num_rows($resUDQ);
	if($dataUDQ>0){
		$userid =$dUDQ['userid'];
		$username =$dUDQ['username'];
		$password =$dUDQ['password'];
		$state =$dUDQ['state'];
		$district =$dUDQ['district'];
		$city =$dUDQ['city'];
		$dob =$dUDQ['dob'];

		$profilepic =$dUDQ['profilepic'];
		$usertype =$dUDQ['usertype'];
		$bio =$dUDQ['bio'];
		$emailid =$dUDQ['emailid'];
		$name =$dUDQ['name'];
		$url= $dUDQ['url'];
		$structure="userfiles/$userid/";

		$_SESSION['userid']= $userid;
		$_SESSION['username']= $username;
		$_SESSION['ID']= session_id();
		$sessID= session_id();
		$signIP = $_SERVER['REMOTE_ADDR'];
		$signDate=date('Y-m-d H:i:s');
		   
		$pageTitle="ShareTheLove | Login : ".$username;
		   
		$CookID = md5($userid);
	   
		setcookie ("dfkajd83dsak", $sessID , time()+(60*60*24*3000), "/" , "" , 0 , true );
		setcookie ("jdjfae43dlag02", $CookID , time()+(60*60*24*3000), "/" , "" , 0 , true );
		
		/*setcookie ("dfkajd83dsak", $sessID , time()+(60*60*24*3000), "/" , ".sharethelove.com" , 0 , true );
		setcookie ("jdjfae43dlag02", $CookID , time()+(60*60*24*3000), "/" , ".sharethelove.com" , 0 , true );*/
		
	   
	    $SSQ="select count(*) from loginDetails where sessionID='$sessID' and loggedIn='Y';";
		$resSSQ=mysql_query($SSQ, $db);
		$dSSQ=mysql_fetch_array($resSSQ);
		$dataSSQ=$dSSQ[0];//mysql_num_rows($resSSQ);
		if($dataSSQ>'0'){
		}
		else{
			$LQ="insert into loginDetails values('$userid', '$sessID', '$signDate', '$signIP', 'Y', '$keeplogged');";
		   mysql_query($LQ, $db);
		}
		header('Location: home.php');
		ob_end_flush();
		//echo "<script> location.href='http://sharethelove.co.in/home.php' </script>";	
	   //echo "<br>$dataSSQ :: $LQ :: $SSQ<br>";
	}
	else{
		session_destroy();
		header('Location: index.php');
		ob_end_flush();
		//echo "<script> location.href='http://sharethelove.co.in/index.php' </script>";	
	}
}

if(isset($_POST['btnSignUp'])){
	$usertype=mysql_real_escape_string(trim($_POST['typeofaccount']));
	$name=mysql_real_escape_string(trim($_POST['name']));
	$state=mysql_real_escape_string(trim($_POST['state']));
	$district=mysql_real_escape_string(trim($_POST['district']));
	$city=mysql_real_escape_string(trim($_POST['city']));
	$dob=mysql_real_escape_string(trim($_POST['DOB']));
	$emailid=mysql_real_escape_string(trim($_POST['email']));
	$username=mysql_real_escape_string(trim($_POST['username']));
	$password=mysql_real_escape_string(trim($_POST['password']));
	$bio=mysql_real_escape_string(trim($_POST['bio']));
	$url= mysql_real_escape_string(trim($_POST['burl']));
	$signDate=date('Y-m-d H:i:s');
	$signIP = $_SERVER['REMOTE_ADDR'];
	
	$PW=mysql_real_escape_string(trim($_POST['profilewidth']));
	$PH=mysql_real_escape_string(trim($_POST['profileheight']));
	$PX=mysql_real_escape_string(trim($_POST['profilex']));
	$PY=mysql_real_escape_string(trim($_POST['profiley']));	
	
	$queryData="select * from state where StCode = '$state'";
    $resData=mysql_query($queryData , $db);
    $row=mysql_fetch_array($resData);
    $state=$row["StateName"];  

	$pageTitle="ShareTheLove | User sign up : ".$username;

	$query="insert into tbl_sign_up (name, username, password, state, district, city, dob, profilepic, usertype, bio, emailid, signDate, signIP) values('$name', '$username', password('$password'), '$state', '$district', '$city', '$dob', '', '$usertype', '$bio', '$emailid', '$signDate', '$signIP');";	
	//echo "$query<br>". mysql_error($db) . "<br>";
	mysql_query($query, $db);

	$userid = mysql_insert_id($db);
    $structure="userfiles/$userid/";
	mkdir($structure, 0777, true);
	chmod($structure, 0777);
	$nowtime = time();
	$profilepic=$username.$nowtime;

    if(isset($_FILES['fileinput'])){
   	  //echo "will upload files<br>";
      $errors= array();
      $file_name = $_FILES['fileinput']['name'];
      $file_size = $_FILES['fileinput']['size'];
      $file_tmp = $_FILES['fileinput']['tmp_name'];
      $file_ext = strtolower(end(explode('.',$_FILES['fileinput']['name'])));
      $profilepic = $profilepic.".".$file_ext;
      if(move_uploaded_file($file_tmp,"$structure".$profilepic)){
         //echo "Success<br />";
         $query1="update tbl_sign_up set profilepic='$profilepic' where userid='$userid';";
         mysql_query($query1, $db);
         $errUQ="Success";
         //cropiiimage($structure, $profilepic, $PW, $PH, $PX, $PY);
      }
      else{
         //echo "File upload failed: $structure/$profilepic<br />";
         $errUQ="FileFail";
      }
    }

     	$to      = $emailid; // Send email to our user
        $subject = 'Signup | Verification'; // Give the email a subject 
        $message = '
 
        Thanks for signing up!
        Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
        ------------------------
        Username: '.$username.'
        Password: '.$password.'
        ------------------------
 
        Please click this link to activate your account:
        http://sharethelove.co.in/verify.php?email='.$emailid.''; // Our message above including the link
          
        $headers = 'From:noreply@sharethelove.co.in' . "\r\n"; // Set from headers
        mail($to, $subject, $message, $headers); // Send our email
	
	   
    $_SESSION['userid']= $userid;
    $_SESSION['username']= $username;
    $_SESSION['ID']= session_id();
    $sessID= session_id();

	
    $LQ="insert into loginDetails values('$userid', '$sessID', '$signDate', '$signIP', 'Y');";
    mysql_query($LQ, $db);
   
    //$m="Your account has been created and Your verification email has been sent on your E-mail account";
   
    //header('Location: index.php?m='.$m);
    //ob_end_flush();
}

?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $pageTitle; ?></title>
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
		$('.popup').click(function(){ 
		      $('.search-box-container').toggle();
		      });
		});/* search box toggle */
    
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
	
	function warningD(txt4) {
		if(confirm('Are you sure delete this posting?')){
			$('#Opplisting').append('<input type="hidden" name="setDel" value="' + txt4 + '" />').submit();
		}else {
	  		return false;
		}
	}
	
	function loadProfile(txt3){
		$("#hoverD").show();
		//$("showProfile").show();
		
		var link ='profile.php?action=show&user=' + txt3;
		$(".contentDiv").load( link, function() {
			$("#showProfile").show();
		});
	}
	
	function doClosePf(){
		$("#hoverD").hide();
		$('#showProfile').hide();
	}
	
</script>
</head>
	
<body>
<!-- header -->	
	<!--<div class="header" id="move-top">
	<div class="header">
		<div class="container">
			<div class="header-left">
				<h2><a href="index.php">sharethelove.co.in</a></h2>
			</div>
			<div class="header-right">
			<nav>
				<ul>
					<li><a href="home.php">Home</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
-->
<div class="header container" id="header">
	<div class="header-left">
		<div id="logo"></div>
		<a href="index.php"><img src="images/Sharethelove.co.in.png" /></a>
	</div>
	<div class="header-right">
	<nav id="inner">
		<ul>
			<li><a href="../blog" target="_blank">BLOG</a></li>
			<li><a href="#"><img src="images/settings-button.png" /></a>
				<ul>
					<li><a href="profile.php?action=edit" >ACCOUNT SETTINGS</a></li>
					<li><a href="About us/about us.php">SUPPORT US</a></li>
					<li><a href="About us/about us.php" >ABOUT</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>			
			</li>
		</ul>
	</nav>
	</div>
</div>
<!-- welcome -->
<div id="profile" class="container">
<?php
	if($errUQ==='FileFail'){
		echo '<div class="welcome-head text-center">';
		echo "<p><b>Sorry!!</b> There is some issue with uploading the profile picture. Please upload a profile picture later.</p>";
		echo '</div>';
	}
?>
		<div class="profilecontent">
			<div class="profileheader profilehomelogo"><!-- <img src="images/home.png" alt="home" /> --></div>
			<div class="topcurvemenu">
				<ul>
				
					<li><a href="home.php"><img src="images/home-icon.png" alt="home" /><br/>HOME</a></li>
					<li><a href="profile.php?action=edit"><img src="images/edit_profile.png" alt="edit profile" /><br/>EDIT PROFILE</a></li> 
					<!-- <li><a href="home.php"><img src="images/home-icon.png" alt="home" /><br/>HOME</a></li> -->
					<li><a href="add_opportunity.php"><img src="images/add_listing.png" alt="add listing" /><br/>ADD PROJECT</a></li>
					<li><a href="view_listings.php"><img src="images/view_profie.png" alt="view profile" /><br/>MY PROJECTS</a></li>
					<li>
					<a href="#" class="popup"><img src="images/search.png" alt="search" /><br/>
					SEARCH</a>
					<div class="search-box-container">
					  <center>
						<form id="search" name="search" method="GET" action="home.php">
							<input type="text" name="sstring" id="sstring" class="search-box-small" placeholder="SEARCH, use keywords" />
							<input type="text" name="sloc" id="sloc" class="search-box-small" placeholder="Location +" />
							<input type="text" name="scause" id="scause" class="search-box-small" placeholder="Cause +" />
							<input type="text" name="sfdate" id="sfdate" class="search-box-small" placeholder="From Date +" />
							<input type="text" name="stdate" id="stdate" class="search-box-small" placeholder="To Date +" /><br />
							<input type="submit" name="btnsearch" id="btnsearch" value="GO!" />
						</form>
					  </center>
			        </div><!-- add search popup div-->
					</li>
				</ul>
			</div>
			
			<div class="topcurve">&nbsp;</div>
			<div class="profileinnercontent">
			<div class="posts-left">
				<table class="table_head">
					<tr>
						<td>
						    <div class="pfilepic">
						      Profile Picture	
						    </div>
							<div class="pfile"><img src='<?php echo "$structure$profilepic"; ?>' /></div>
							<?php  ?>
						</td>
					<tr>
					<tr>
						<td align="center"><b><?php echo $username; ?></b></td>
					<tr>
				</table>
			</div>
			<div class="posts-right">
				<p>NAME <span><?php echo $name; ?></span></p>
				<p>LOCATION <span><?php echo "$state";?></span></p>
				<p>DATE OF <?php 
							if($usertype=='I'){
								echo "BIRTH";
							}elseif($usertype=='O'){
								echo "INCEPTION";
							}
						?>&nbsp;<span><?php echo $dob; ?></span></p>
				<p>EMAIL <span><?php echo $emailid; ?></span></p>
				<p>CITY <span><?php echo "$city";?></span></p>
				<p>BLOG/WEBSITE  <span><?php echo $url; ?></span></p>
			</div>
            <div class="blog-info">
				<p><?php echo $bio; ?></p>
			</div>
			</div>
		</div>
		<!--
		<div class="admin-text-right">
			<div>
				<center><a class="tall-more" href="profile.php?action=edit">Edit Profile</a>
				<a class="tall-more" href="change_password.php">Change Password</a>
				<a class="tall-more" href="add_opportunity.php">Add an Opportunity</a>
				<a class="tall-more" href="view_listings.php">View my Listings</a></center>
				<center>
				<form id="search" name="search" method="get" action="home.php">
					<input type="text" name="sstring" id="sstring" placeholder="SEARCH, use keywords such as environment, Delhi, tree plantation" /><br />
					<input type="text" name="sloc" id="sloc" placeholder="Location +" /><br />
					<input type="text" name="scause" id="scause" placeholder="Cause +" /><br />
					<input type="text" name="sfdate" id="sfdate" placeholder="From Date +" /><br />
					<input type="text" name="stdate" id="stdate" placeholder="To Date +" /><br />
					<input type="submit" name="btnsearch" id="btnsearch" value="Search" />
				</form>
				</center>
			</div>
		</div>-->

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
    $count = 10;
	while($row=mysql_fetch_array($SR)){
		$currentID=$row[0];
		$path="userfiles/$row[1]/list".$row[0]."/";
		$Tpath="userfiles/$row[1]/list".$row[0]."/thumbs/";
		$timetodisplay = DateTime::createFromFormat('Y-m-d H:i:s', $row[18])->format('d-M-y');
		echo "<div class='resultstbl' id='$currentID'>\r";
		echo "<h4>Project: $row[2]\r";
		echo "<div class='searchcontrols'>$timetodisplay &nbsp;<a href='#$currentID' onClick='return warning($currentID);'>Report</a></div></h4>\r";
		echo "<div class='clearfix'> </div>\r";
		echo "<div class='mainsearchresult'>\r";
		echo "<div class='lefttbl'>Posted By: <a href='#$currentID' onclick='loadProfile(".'"'.$row[40].'"'.");'>$row[40]</a></div>
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
		echo "<a class='moreshow' href='#$currentID'><span>Expand&nbsp;+</span></a>\r";/* add onclick function */
		echo "</div>\r";
		echo "</div>\r";
		$count++;

	}
?>
	<script src="js/lightbox-plus-jquery.min.js"></script>
	<script>
    $(document).ready(function(){
	  	$('.moreshow').click(function(){
			$(this).prev('.subsearchresult').slideToggle();
			$(this).toggleClass('active');
					
			if ($(this).hasClass('active')){
				$(this).find('span').html('Minimize&nbsp;-');
			}else{
				$(this).find('span').html('Expand&nbsp;&+');
			}
		});

	});
	
		
	
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
} else {
?>
<div class="container" id="searchResult">
		<form id='Opplisting' method='post'>
		<div class="resultstbltop">
		<?php
		if(isset($_GET['btnsearch']) && isset($_GET['sstring']) && (trim($_GET['sstring'])!=='')){
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
			$SQ .= " order by listingID desc ;";
			echo "<img src='images/Search-results.png' />";
		}else{	
			$SQ="select listings.listingID, listings.addedBy, listings.project_name, listings.state, listings.district, listings.city, listings.cause, listings.fromDate, listings.toDate, listings.vacancies, listings.about, listings.role, listings.meal, listings.stay, listings.transport, listings.email, listings.phone, listings.mobile, listings.addedOn, listings.addIP, listings.img1, listings.img2, listings.img3, listings.img4, listings.img5, listings.descimg1, listings.descimg2, listings.descimg3, listings.descimg4, listings.descimg5, listings.rep1, listings.rep2, listings.rep3, listings.rep4, listings.rep5, listings.repdesc1, listings.repdesc2, listings.repdesc3, listings.repdesc4, listings.repdesc5, tbl_sign_up.username from listings join tbl_sign_up where listings.addedBy=tbl_sign_up.userid order by listings.listingID desc limit 20;";
			echo "<img src='images/RecentActivities_text.png' />";
		}
		echo "\r\n</div>";
		$SR=mysql_query($SQ, $db);
		$count = 1;
		while($row=mysql_fetch_array($SR)){
			$currentID=$row[0];
			$path="userfiles/$row[1]/list".$row[0]."/";
			$Tpath="userfiles/$row[1]/list".$row[0]."/thumbs/";
			$timetodisplay = DateTime::createFromFormat('Y-m-d H:i:s', $row[18])->format('d-M-y');
			echo "<div class='resultstbl' id='$currentID'>\r";
			echo "<h4>Project: $row[2]\r";
			if($userid==$row[1]){
				$commands="<a href='#' onClick='return warningD($currentID);'>Delete</a>&nbsp; &nbsp;<a href='edit_opportunity.php?opp=$currentID'>Edit</a>";
			}else{
				$commands="<a href='#$currentID' onClick='return warning($currentID);'>Report</a>";
			}
			
			echo "<div class='searchcontrols'>$timetodisplay &nbsp;$commands</div></h4>\r";

		echo "<div class='clearfix'> </div>\r";
		echo "<div class='mainsearchresult'>\r";
		echo "<div class='lefttbl'>Posted By: <a href='#$currentID' onclick='loadProfile(".'"'.$row[40].'"'.");'>$row[40]</a></div>
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
		echo "<a class='moreshow' href='#$currentID'><span>Expand&nbsp;+</span></a>\r";
		echo "</div>\r";
		echo "</div>\r";
		$count++;
		}
		?>
		<script src="js/lightbox-plus-jquery.min.js"></script>
		<script>
			$(document).ready(function(){
			  	$('.moreshow').click(function(){
					$(this).prev('.subsearchresult').slideToggle();
					//alert($(this).offset().top);
					$(this).toggleClass('active');/*
					var sCTr=$(this).offset().top;
					window.scroll(0, sCTr);
					alert('scrolled to '+sCTr);
					window.scrollTop($(this).offset().top);	*/			
					if ($(this).hasClass('active')){
						$(this).find('span').html('Minimize&nbsp;-');
					}else{
						$(this).find('span').html('Expand&nbsp;+');
					}
				});
			});
			$('.simg').click(function() {
				//alert($(this).attr('src'));
			});
		</script>
		</form>
</div>
<?php } ?>
<!-- //welcome -->

<!--/index-team-->
<div class="support container" >
	<h3><a href="About us/about us.php"><img src="images/support-us.png" /></a></h3>
	<div class="socialmedia"><h3><img src="images/follow-us.png" /> <a href="https://www.facebook.com/sharethelovecoin-1507486976240873/" target="_blank"><img src="images/fb.png" /></a> <a href="https://www.instagram.com/sharethelove.co.in/" target="_blank"><img src="images/insta.png" /></a> <a href="https://twitter.com/SharetheloveIn/" target="_blank"><img src="images/twitter.png" /></a></h3></div>
	<div class="clearfix"></div>
</div>
<!-- footer -->
<div class="footer container">
	<div class="footer-left">
		<p>&copy; Detour Ventures. All rights reserved</p>
	</div>
	<div class="footer-right">
		<ul class="footer-nav">
			<li><a href="home.php">Home</a>|</li>
			<li><a href="About us/about us.php">About</a>|</li>
			<li><a href="legal_information/legal_information.php">Legal Information</a>|</li>
			<li><a href="PP/PP.php">Privacy Policy</a>|</li>
			<li><a href="T&C/T&C.php">T&C</a></li>	
		</ul>
	</div>
</div>
<!--footer end-->
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
<!-- //footer -->
</body>
</html>
