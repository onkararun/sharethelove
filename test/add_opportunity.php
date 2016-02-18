<?php
	session_start();
	
	if(isset($_SESSION['userid'])){
		$userid=$_SESSION['userid'];
		$username =$_SESSION['username'];
		$sessionID=$_SESSION['ID'];		
	}else{
		session_destroy();
		header('Location: index.php');
	}
	
	include('connect_base.php');
	include('functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Add an opportunity</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
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
addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); }
	$(document).ready(function(){
		$("input.mobile").mask("99-99-999999");
	   $("#signupForm").validate();
	});
	$(function() {
		$( "#fromdate" ).datepicker({
			dateFormat: 'dd/mm/yy',
			defaultDate: "+0d",
			changeMonth: true,
			numberOfMonths: 1,
			changeYear: true,
			onClose: function( selectedDate ) {
				$( "#todate" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#todate" ).datepicker({
			dateFormat: 'dd/mm/yy',
			defaultDate: "+0d",
			changeMonth: true,
			numberOfMonths: 1,
			changeYear: true,
			onClose: function( selectedDate ) {
				$( "#fromdate" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
	});
	
function selectState(txt){
	var state=txt;
	$cname = $("select[name='district']");
	// if(state=='Delhi'){
	// 		$("select[name='district'] option").remove();
	// 		$("<option value='Delhi'>Delhi</option>").appendTo($cname);
	// }
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
<!-- header -->	
	<!--<div class="header" id="move-top">-->
<div class="header container" id="header">
	<div class="header-left">
		<div id="logo"></div>
		<a href="index.php"><img src="images/Sharethelove.co.in.png" /></a>
	</div>
	<div class="header-right">
	<nav id="inner">
		<ul>
			<li><a href="../blog">BLOG</a></li>
			<li><a href="#"><img src="images/settings-button.png" /></a>
				<ul>
					<li><a href="#" >ACCOUNT SETTINGS</a></li>
					<li><a href="#" >SUPPORT US</a></li>
					<li><a href="#" >ABOUT</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>			
			</li>
		</ul>
	</nav>
	</div>
</div>	
<!-- welcome -->
<div id="searchResult" class="container">
		<div class="welcome-head text-center">
			<h2>
			   <img src="images/add-project---photograph.png" />
			</h2><!-- change name -->
		</div>
		<div id="oppadd" class='mainsearchresult'>
<?php
if(isset($_POST['addlisting'])){
	$addedBy=$userid;
	$project_name=mysql_real_escape_string(trim($_POST['prjName']));
	$state=$_POST['state'];
	$district=$_POST['district'];
	$city=mysql_real_escape_string(trim($_POST['city']));
	$cause=mysql_real_escape_string(trim($_POST['prjCause']));
	$fromDate=$_POST['fromdate'];
	$toDate=$_POST['todate'];
	$vacancies=mysql_real_escape_string(trim($_POST['vacancies']));
	$about=mysql_real_escape_string(trim($_POST['about']));
	$role=mysql_real_escape_string(trim($_POST['role']));
	
	if($_POST['meal']){
		$meal='Y';
	}else{
		$meal='N';
	}
	
	if($_POST['stay']){
		$stay='Y';
	}else{
		$stay='N';
	}
	
	if($_POST['transport']){
		$transport='Y';
	}else{
		$transport='N';
	}
	$email=mysql_real_escape_string(trim($_POST['email']));
	$phone=mysql_real_escape_string(trim($_POST['phone']));
	$mobile=mysql_real_escape_string(trim($_POST['mobile']));
	$addedOn=date('Y-m-d H:i:s');
	$addIP=$_SERVER['REMOTE_ADDR'];
	$rep1=mysql_real_escape_string(trim($_POST['rep1']));
	$rep2=mysql_real_escape_string(trim($_POST['rep2']));
	$rep3=mysql_real_escape_string(trim($_POST['rep3']));
	$rep4=mysql_real_escape_string(trim($_POST['rep4']));
	$rep5=mysql_real_escape_string(trim($_POST['rep5']));

	$queryData="select * from state where StCode = '$state'";
	$resData=mysql_query($queryData , $db);
	$row=mysql_fetch_array($resData);
	$state=$row["StateName"]; 

	$ALQ="insert into listings (addedBy, project_name, state, district, city, cause, fromDate, toDate, vacancies, about, role, meal, stay, transport, email, phone, mobile, addedOn, addIP, img1, img2, img3, img4, img5, descimg1, descimg2, descimg3, descimg4, descimg5, rep1, rep2, rep3, rep4, rep5, repdesc1, repdesc2, repdesc3, repdesc4, repdesc5 ) values ('$addedBy', '$project_name', '$state', '$district', '$city', '$cause', '$fromDate', '$toDate', '$vacancies', '$about', '$role', '$meal', '$stay', '$transport', '$email', '$phone', '$mobile', '$addedOn', '$addIP', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ','$rep1', '$rep2', '$rep3', '$rep4', '$rep5', ' ', ' ', ' ', ' ', ' ');";
	if(mysql_query($ALQ, $db)){
		echo "<p>Opportunity added successfully.</p>";
	}else{
		echo "<p>Failed to add opportunity.<br />". mysql_error($db) . "<br />$ALQ</p>";
	}
	$addID=mysql_insert_id($db);
	
	$structure="userfiles/$userid/list$addID/";
	mkdir($structure, 0777, true);
	chmod($structure, 0777);
	$Tstructure="userfiles/$userid/list$addID/thumbs/";
	mkdir($Tstructure, 0777, true);
	chmod($Tstructure, 0777);
	
	$fileinput=$_POST['fileinput'];
	$thumbsize='100';
	$imgsize='400';
   if(isset($_FILES['fileinput'])){
   	$error=array();
   	$errUQ='';
   	$i=1;
   	//echo "will upload files<br>";
   	foreach($_FILES["fileinput"]["tmp_name"] as $key=>$tmp_name)
   	{
			$file_name=$_FILES["fileinput"]["name"][$key];
			$file_size =$_FILES["fileinput"]["size"][$key];
			$file_tmp=$_FILES["fileinput"]["tmp_name"][$key];

			if(!file_exists("$structure".$file_name))
			{
				if(move_uploaded_file($file_tmp=$_FILES["fileinput"]["tmp_name"][$key],"$structure".$file_name)){
					$field="img".$i;
					$query1="update listings set $field='$file_name' where listingID='$addID';";
		         mysql_query($query1, $db);
		         //echo $query1. ":". mysql_error($db)."<br>";
		         $errUQ=$errUQ."File <b>$file_name</b> successfully uploaded.<br />";
		         myimageresize($structure, $Tstructure, $file_name, $thumbsize,'thumb');
		         myimageresize($structure, $structure, $file_name, $imgsize,'');
		         $i++;
				}else{
					$errUQ=$errUQ."Failed to upload file <b>$file_name</b>.<br />";
				}
			}
		}
		echo $errUQ;
   }	

	echo "<p><a href='add_opportunity.php'>Add more listings</a></p><p><a href='home.php'>Go back to home page</a></p>";
	echo "<script>setTimeout(window.location='home.php', 1000000);</script>";
	
}else{
?>
		<form method="post" id="signupForm" action="add_opportunity.php" enctype="multipart/form-data">
			<table id="addopportunity" class="table_head tablemargin">
				<tr>
					<td>Project Name</td><td colspan="3"><input type="text" class="required full" name="prjName" id="prjName" placeholder="Name of Project" /></td>
				<tr>
				<tr>
					<td>State</td>
					<td>
					<select name="state" id="state" class="small" onchange="selectState(this.value);"><option value="" default>--</option>
					<option value="Himachal Pradesh">Himachal Pradesh</option></select>
					</td>
					<td colspan="2">District <select name="district" id="district"><option value="">Select</option></select></td>
				<tr>
				<tr>
					<td>City</td><td><input name="city" id="city" type="text" class="required small"  /></td>
					<td colspan="2"></td
				<tr>
				<tr>
					<td>Cause</td><td colspan="2"><input type="text" class="required full"  placeholder="Cause" name="prjCause" id="prjCause" /></td>
					<td>&nbsp;&nbsp;&nbsp;No of Vacancies</td>
				<tr>
				<tr>
					<td>Dates</td><td><input type="text" id="fromdate" name="fromdate" placeholder="from"  class="small" readonly /></td>
					<td><input type="text" id="todate" name="todate" placeholder="to"  class="small" readonly /></td>
					<td><input type="number" placeholder="no of vacancies" name="vacancies" id="vacancies" class="required number" min="1" max="1000" class="small" /></td>
				</td>
				<tr>
				<tr>
					<td>About the Project</td><td colspan="3"><textarea name="about" id="about" class="required full"  placeholder="About the Project"></textarea></td>
				<tr>
				<tr>
					<td>About the Role</td><td colspan="3"><textarea name="role" id="role" class="required full" placeholder="Description of the role"></textarea></td>
				<tr>
				<tr>
					<td>Support</td><td colspan="3"><input name="meal" id="meal" type="checkbox">Meals</input>&nbsp;&nbsp;
					<input name="stay" id="stay" type="checkbox">Stay</input>&nbsp;&nbsp;
					<input name="transport" id="transport" type="checkbox">Transport</input></td>
				<tr>
				<tr>
					<td>Contact Details</td>
					<td><input type="email" name="email" id="email" class="email required" placeholder="email ID"  /></td>
					<td><input type="tel" name="phone" id="phone" placeholder="Phone number starting with 0" class="phone"  /></td>
					<td><input type="tel" name="mobile" id="mobile" placeholder="Mobile number starting with 0" class="phone"  /></td>
				<tr>
				<tr>
					<td></td>
					<td colspan="3">
					<div>
						<fieldset>
						<legend>Add Images(max 5)</legend>
							<div id="gallery"></div>
						</fieldset>
						<input type="file" id="fileinput" name="fileinput[]" multiple="multiple" accept="image/*" />
					</div>
					<script src="js/gallery.js"></script></td>
				</tr>
				<!-- <tr>
					<td></td>
					<td colspan="3">
					<div>
						<fieldset>
						<legend>Add Reports(max 5)*</legend>
							<input type="url" name="rep1" id="rep1" placeholder="Link to report" class="full" /><br />
							<input type="url" name="rep2" id="rep2" placeholder="Link to report" class="full" /><br />
							<input type="url" name="rep3" id="rep3" placeholder="Link to report" class="full" /><br />
							<input type="url" name="rep4" id="rep4" placeholder="Link to report" class="full" /><br />
							<input type="url" name="rep5" id="rep5" placeholder="Link to report" class="full" /><br />
						</fieldset>
						<p>*Enter url of report(s). Reports will be shown as link.</p>
					</div>
					</td>
				</tr> --><!-- Remove link reports area --> 
				<tr>
					<td></td>
					<td><input type="reset" value="Reset Fields" /></td>
					<td colspan="2" align="right"><input type="submit" name="addlisting" id="addlisting" value="Add Project" /></td><!-- change value by add project -->
				<tr>
			</table>
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
<!--footer end-->
</body>
</html>