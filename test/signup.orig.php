<!DOCTYPE html>
<html>
<head>
<title>sharethelove.co.in | Sign up</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery-1.6.2.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.imgareaselect.pack.js"></script>
<script>
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
	$( "#DOB" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
});

var loadFile = function(event) {
	var reader = new FileReader();
		reader.onload = function(){
			var imgTgt = 'Diimg';
			var output = document.getElementById(imgTgt);
			output.src = reader.result;
		};
	reader.readAsDataURL(event.target.files[0]);
	
	var selection = $('#Diimg').imgAreaSelect({
		handles: true,
		instance:true,
		aspectRatio:'1:1',
		maxHeight:200,
		maxWidth:200,
		minHeight:50,
		minWidth:50,
		movable:true
	});	
	var width = selection.getSelection().width;
	var height = selection.getSelection().height;
	var x = selection.getSelection().x1;
	var y = selection.getSelection().y1;
	
	("#profilewidth").val=width;
	("#profileheight").val=height;
	("#profilex").val=x;
	("#profiley").val=y;
};  

function selectState(txt){
	var state=txt;
	$cname = $("select[name='district']");
	if(state=='Delhi'){
			$("select[name='district'] option").remove();
			$("<option value='Delhi'>Delhi</option>").appendTo($cname);
	}
	if(state=='Himachal Pradesh'){
			$("select[name='district'] option").remove();
			$("<option value='Kangra'>Kangra</option>").appendTo($cname);
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
	<!--<div class="header" id="move-top">-->
	<div class="header">
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
	</div>		
<!-- welcome -->
<div class="welcome">
<?php
if($errUQ==="Existing"){
	?>
	<div class="container signup">
		<div class="welcome-head text-center">
			<h2>Sorry!! There is another user registered with email ID. Please try with a new email ID.</h2>
		</div>
	</div>	
	<?php
}else{
?>
<form method="post" action="home.php" enctype="multipart/form-data">
	<div class="container signup">
		<div class="welcome-head text-center">
			<h2>Sign Up Details</h2>
		</div>
		<div class="posts-left">
			<table class="table_head">
				<tr>
					<td><div id="gallery" class="spfile"><img id='Diimg' /></div><br />
					<input type="file" id="fileinput" name="fileinput" accept="image/*" onchange="loadFile(event);" /></td>
					<input type="hidden" id="profilex" name="profilex" />
					<input type="hidden" id="profiley" name="profiley" />
					<input type="hidden" id="profilewidth" name="profilewidth" />
					<input type="hidden" id="profileheight" name="profileheight" />
				<tr>
				<tr>
					<td><p>Are you an:</p></td>
				<tr>
				<tr>
					<td><input type="radio" name="typeofaccount" value="I" >Individual</input></td>
				<tr>
				<tr>
					<td><input type="radio" name="typeofaccount" value="O">Organization</input></td>
				<tr>
			</table>
		</div>
		<div class="posts-right">
			<table class="table_head">
				<tr>
					<td>Name*</td><td><input type="text" name="name" id="name" value='<?php echo $uname; ?>' /></td>
				<tr>
				<tr>
					<td>State*</td><td><select name="state" id="state" onchange="selectState(this.value);"><option value="" default>--</option>
					<option value="Himachal Pradesh">Himachal Pradesh</option><option value="Delhi">Delhi</option></select></td>
				<tr>
				<tr>
					<td>District*</td><td><select name="district" id="district"></select></td>
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
					<td>Blog/Website</td><td><input type="url" name="burl" id="burl" /></td>
				<tr>
			</table>
		</div>
	</div>
		<div class="container signup">
		<center>
			<textarea name="bio" id="bio" placeholder="Bio(Max 100 words)"></textarea><br />
			<input type="submit" name="btnSignUp" id="btnSignUp" value="Finish Signing Up" />
		</center>
		</div>
</form>
<?php
}
?>
</div>
<!-- //welcome -->

<!--/index-team-->

<!-- footer -->
<div class="footer">
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
</div>

<!-- //footer -->
</body>
</html>