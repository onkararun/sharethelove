<?php
session_start();
include('connect_base.php');
include('functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>sharethelove.co.in | Sign up</title>
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
<script src="js/jquery.imgareaselect.pack.js"></script>
<!--  -->
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
function getdistrict(val) {
	$.ajax({
	type: "POST",
	url: "get_district.php",
	data:'state_id='+val,
	success: function(data){
		$("#district-list").html(data);
	}
	});
}
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
	})
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

$(function() {
 	$( "#DOB" ).datepicker({
	changeMonth: true,
	changeYear: true,
	yearRange: "-200:+0",
	showOn: "both", 
	numberOfMonths: 1,
	onClose: function( selectedDate ) {
	}
	});
	$( "#DOB" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
});

var loadFile = function(event) {
	var reader = new FileReader();
		reader.onload = function(){
			var imgTgt = 'Diimg';
			var imgTgt1 ='diiiimg';
			var output = document.getElementById(imgTgt);
			var output1 = document.getElementById(imgTgt1);
			output.src = reader.result;
			output1.src = reader.result;
		};
	reader.readAsDataURL(event.target.files[0]);
	
	$("#hoverD").show();
	//$(".contentDiv").empty();
	$('#showProfilePic').show();
/*	
	var selection = $('#diiiimg').imgAreaSelect({
		handles: true,
		instance:true,
		aspectRatio:'1:1',
		maxHeight:200,
		maxWidth:200,
		minHeight:50,
		minWidth:50,
		movable:true,
		onSelectChange: preview
	});	
*/
};  

$(function () {
	$('#diiiimg').imgAreaSelect({ aspectRatio: '1:1', handles: true,
		fadeSpeed: 200, movable: true, maxHeight: 200, maxWidth:200, minHeight:100, minHeight:100, onSelectChange: preview });
        
	var width = selection.getSelection().width;
	var height = selection.getSelection().height;
	var x = selection.getSelection().x1;
	var y = selection.getSelection().y1;
	
	("#profilewidth").val=width;
	("#profileheight").val=height;
	("#profilex").val=x;
	("#profiley").val=y;
});

function preview(img, selection) {
    if (!selection.width || !selection.height)
        return;
    
    var scaleX = selection.width/200;
    var scaleY = selection.height/200;
    var scale=1;
    if($('#diiiimg').width > $('#diiiimg').height){
    	scale=selection.height/200;
    }else{
    	scale=selection.width/200;
    }
    /*var scaleX = $('#diiiimg').width / selection.width;
    var scaleY = $('#diiiimg').height / selection.height;*/
    
    $('#gallery img').css({/*
    	  width: Math.round(scaleX * ($('#diiiimg').width)),
        height: Math.round(scaleY * ($('#diiiimg').height)),/*
        marginLeft: -Math.round(scaleX * selection.x1),
        marginTop: -Math.round(scaleY * selection.y1),/*
        width: selection.width,`
        height: selection.height,
        maxWidth: Math.round(500 * scale),
        maxHeight: Math.round(500 * scale),*/
        marginLeft: -Math.round(selection.x1 * scaleX),
        marginTop: -Math.round(selection.y1 * scaleY)

    });
    /*
    $('#x1').val(selection.x1);
    $('#y1').val(selection.y1);
    $('#x2').val(selection.x2);
    $('#y2').val(selection.y2);
    $('#w').val(selection.width);
    $('#h').val(selection.height);
    $('#sx').val(scaleX);
    $('#sy').val(scaleY);*/
}

// function selectState(txt){
// 	var state=txt;
// 	$cname = $("select[name='district']");
// 	if(state=='Delhi'){
// 			$("select[name='district'] option").remove();
// 			$("<option value='Delhi'>Delhi</option>").appendTo($cname);
// 	}
// 	if(state=='Himachal Pradesh'){
// 			$("select[name='district'] option").remove();
// 			$("<option value='Kangra'>Kangra</option>").appendTo($cname);
// 	}

// }

function doClosePf(){
	$(".imgareaselect-selection").parent().hide();
	$(".imgareaselect-outer").hide();
	$("#hoverD").hide();
	//$(".contentDiv").empty();
	$('#showProfilePic').hide();
}
function remprofilepic(){
		$( "#gallery" ).empty();
		var max_img_size=2097152;
		var input = document.getElementById("fileinput");
		var fsize=findSize();
		if(fsize>2047){
			alert("The profile image size must be less than 2 MB");
		}
	}

	function findSize() {
	    if ( $.browser.msie ) {
	       var a = document.getElementById('fileinput').value;
	           $('#fileinput').attr('src',a);
	           var imgbytes = document.getElementById('fileinput').size;
	           var imgkbytes = Math.round(parseInt(imgbytes)/1024);
	           return (imgkbytes);
	    }else {
	           var fileInput = $("#fileinput")[0];
	           var imgbytes = fileInput.files[0].fileSize; // Size returned in bytes.
	           var imgkbytes = Math.round(parseInt(imgbytes)/1024);
	           return (imgkbytes);
	     }
	}
</script>
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
<?php
	include('connect_base.php');
	$uname=mysql_real_escape_string(trim($_POST['uname']));
	$uemail=mysql_real_escape_string(trim($_POST['uemail']));
	$uhandle=mysql_real_escape_string(trim($_POST['uhandle']));
	$upass=mysql_real_escape_string(trim($_POST['upass']));
	$chkUQ="select count(*) from tbl_sign_up where emailid='$uemail';";
	$resUQ=mysql_query($chkUQ, $db);
	$dataUQ=mysql_fetch_array($resUQ);
	if($dataUQ[0]>'0'){
		$errUQ="Existing";
	}
	
?>
<!-- header -->	
<div class="header container" id="header">
	<div class="header-left">
		<div id="logo"></div>
		<a href="index.php"><img src="images/Sharethelove.co.in.png" /></a>
	</div>
	<div class="header-right">
	<nav>
		<ul>
			<li><a href="index.php" >HOME</a></li>
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
<div id="home" class="container contain-wrapper">
<?php
if($errUQ==="Existing"){
	?>
		<div class="welcome-head text-center">
		<h2>Sorry!! There is another user registered with email ID. Please try with a new email ID.</h2>
		<div class="homerightcontent">
		<form id="signupForm" name="sign_up" method="post" action="signup.php">
		<center>
		<table>
		<tr><td colspan="2"><h1 class="signpuhead">SIGN UP</h1></td></tr>
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
		</center>
		</form>
		</div>
		</div>
	<?php
}else{
?>
<form id="signupForm" name="sign_up" method="post" action="home.php" enctype="multipart/form-data">
		<div class="welcome-head text-center">
			<h2>Sign Up Details</h2>
		</div>
	  <div class="form-wrapper wrapper-det">
		<div class="posts-left">
			<table class="table_head">
				<tr>
					<td>
					<div class="pfilepic-sgup">Profile Picture</div>
					<div id="gallery" class="pfile"><img id='Diimg' style="overflow:hidden;" /></div><br />
					<input type="file" id="fileinput" name="fileinput" accept="image/*" onchange='remprofilepic();' />
					<script src="js/gallery.js"></script>
					</td>
					<input type="hidden" id="profilex" name="profilex" />
					<input type="hidden" id="profiley" name="profiley" />
					<input type="hidden" id="profilewidth" name="profilewidth" />
					<input type="hidden" id="profileheight" name="profileheight" />
				<tr>
				<tr>
					<td><p>Are you an:</p></td>
				<tr>
				<tr>
					<td><div class="form-type-radio"><input type="radio" name="typeofaccount" value="I" ><label>Individual</label></input></td></div>
				<tr>
				<tr>
					<td><div class="form-type-radio"><input type="radio" name="typeofaccount" value="O"><label>Organization</label></input></div></td>
				<tr>
			</table>
		</div>
		<div class="posts-right">
			<table class="table_head">
				<tr>
					<td>Name*</td><td><input type="text" name="name" id="name" value='<?php echo $uname; ?>' /></td>
				<tr>
				<tr>
					<td>State*</td>
					<td>
						<select onChange="getdistrict(this.value);"  name="state" id="state" class="form-control" >
					        <option value="">Select</option>
					          <?php $query =mysql_query("SELECT * FROM state");
					            while($row=mysql_fetch_array($query))
					          { ?>
					            <option value="<?php echo $row['StCode'];?>"><?php echo $row['StateName'];?></option>
					          <?php
					            }
					          ?>
					    </select>
				    </td>
				<tr>
				<tr>
					<td>District*</td><td><select name="district" id="district-list"><option value="">Select</option></select></td>
				<tr>
				<tr>
					<td>City*</td><td><input name="city" id="city" type="text" /></td>
				<tr>
				<tr>
					<td>Date of Birth/Inception&nbsp;&nbsp;*</td><td><input type="text" id="DOB" name="DOB" readonly /></td>
				<tr>
				<tr>
					<td>Email*</td><td><input type="email" name="email" id="email" value='<?php echo $uemail; ?>' /></td>
				<tr>
				<tr>
					<td>Username*</td><td><input type="text" name="username" id="username" value='<?php echo $uhandle; ?>' />
					<input type="hidden" id="password" name="password" value='<?php echo $upass; ?>'/></td>
				<tr>
				<tr>
					<td>Blog/Website</td><td><input type="text" name="burl" id="burl" /></td>
				<tr>
			</table>
		</div>
	
		<!-- <div class="container signup"> -->
		<center>
			<div class="textarea-wrapper"><textarea name="bio" id="bio" placeholder="Bio(Max 100 words)"></textarea></div><br />
			<input type="submit" name="btnSignUp" id="btnSignUp" value="Finish Signing Up" />
		</center>
		<!-- </div> -->

		<div class="privacy_policy"> By pressing Signup button I agree the <a href="T&C/T&C.php" style="text-decoration: underline;">Term&Conditions</a> and <a href="PP/PP.php" style="text-decoration: underline;">Privacy policy</a></div>
	</div>
</form>
<?php
}
?>
<div id="hoverD"></div>

<div id="showProfilePic">
<p class="headbar"><a href="#" onClick="doClosePf();">x</a></p>
<div class="contentDiv">
<!--
      <table>
        <tr>
          <td><b>X<sub>1</sub>:</b></td>
 		      <td><input type="text" id="x1" value="-" /></td>
 		      <td><b>Width:</b></td>
   		    <td><input type="text" value="-" id="w" /></td>
        </tr>
        <tr>
          <td><b>Y<sub>1</sub>:</b></td>
          <td><input type="text" id="y1" value="-" /></td>
          <td><b>Height:</b></td>
          <td><input type="text" id="h" value="-" /></td>
        </tr>
        <tr>
          <td><b>X<sub>2</sub>:</b></td>
          <td><input type="text" id="x2" value="-" /></td>
          <td><b>Y<sub>2</sub>:</b></td>
          <td><input type="text" id="y2" value="-" /></td>
        </tr>
        <tr>
          <td>scaleX</td>
          <td><input type="text" id="sx" value="-" /></td>
          <td>scaleY</td>
          <td><input type="text" id="xy" value="-" /></td>
        </tr>
      </table>
-->
<img id="diiiimg" src='' /></div>
</div>
</div>
<!-- //welcome -->

<!--/index-team-->

<div class="support container" >
	<h3><a href="#"><img src="images/support-us.png" /></a></h3>
	<div class="socialmedia"><h3><img src="images/follow-us.png" /> <a href="https://www.facebook.com/sharethelovecoin-1507486976240873/" target="_blank"><img src="images/fb.png" /></a> <a href="https://www.instagram.com/sharethelove.co.in/" target="_blank"><img src="images/insta.png" /></a> <a href="https://twitter.com/SharetheloveIn/" target="_blank"><img src="images/twitter.png" /></a></h3></div>
	<div class="clearfix"></div>
</div>

<!-- footer -->
<div class="footer container">
	<div class="footer-left">
		<p>&copy; 2015 sharethelove. All rights reserved</p>
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

<!-- //footer -->
</body>
</html>