<?php
	include('connect_base.php');
	session_start();
	if(isset($_SESSION['userid'])){
		$userid=$_SESSION['userid'];
		$username =$_SESSION['username'];
		$sessionID=$_SESSION['ID'];	
		$opp=$_GET['opp'];
		if(!isset($_GET['opp']) || ($opp=='')){
			header('Location: view_listings.php');
		}else{
			$LiQ="select count(*) from listings where listingID='$opp' and addedBy='$userid';";
			$LiR=mysql_query($LiQ);
			$LiD=mysql_fetch_array($LiR);
			if($LiD[0]>'0'){
				$LSTQ="select * from listings where listingID='$opp' and addedBy='$userid';";
				$LSTR=mysql_query($LSTQ);
				$LSTD=mysql_fetch_array($LSTR);
				$structure="userfiles/$LSTD[1]/list$LSTD[0]/";					
			}else{
				header('Location: view_listings.php');
			}
		}
		/*
		if(isset($_POST['setDel'])){
			$listingID=mysql_real_escape_string(trim($_POST['listingID']));
			$imagefile=mysql_real_escape_string(trim($_POST['setDel']));
			$ListFileQ="select img$imagefile from listings where listingID='$listingID';";
			$ListFileR=mysql_query($ListFileQ, $db);
			$ListFileD=mysql_fetch_array($ListFileR);
			$LDQ="update listings set img$imagefile='' where listingID='$listingID';";
			if(mysql_query($LDQ, $db)){
				$path="./userfiles/$loggedUser/list$listingID/".$ListFileD[0];
				//echo "Deleting $path<br />";
				exec("rm -rf $path");
			}
			header("Location: edit_opportunity.php?opp=$listingID");
		}	*/	
		
	}else{
		session_destroy();
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Opportunity</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
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
			defaultDate: "+0d",
			changeMonth: true,
			numberOfMonths: 1,
			changeYear: true,
			onClose: function( selectedDate ) {
				$( "#todate" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#todate" ).datepicker({
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
/*
function deleteImg(txt) {
	if(confirm('Are you sure delete this image?')){
		$('#signupForm').append('<input type="hidden" name="setDel" value="' + txt + '" />').submit();
	}else {
  		return false;
	}
}
*/
function showctrl(txt1){
	//alert ("showing " + txt1);
	var ctrl2Show = 's' + txt1;
	var chrl2Chk = 'repImg' + txt1;
	if($('#' + chrl2Chk).is(":checked")){
		$('#' + ctrl2Show).show();
	}else{
		$('#' + ctrl2Show).hide();
	}
}

var loadFile = function(event, txt2) {
		var reader = new FileReader();
			reader.onload = function(){
				var imgTgt = 'Diimg' + txt2;
				var output = document.getElementById(imgTgt);
				output.src = reader.result;
			};
		reader.readAsDataURL(event.target.files[0]);
};

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
	<!-- <div class="header">
		<div class="container">
			<div class="header-left">
				<h2><a href="index.php">sharethelove.co.in</a></h2>
			</div>
			<div class="header-right">
			<nav>
				<ul>
					<li><a href="home.php">home</a></li>					
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div> -->	
	<div class="header">
		<div class="container">
			<div class="header-left header-logo">
				<h2><a href="index.php"><img src="images/Sharethelove.co.in.png" class="edtsharelogo"/></a></h2>
			</div>
			<div class="header-right header-txt">
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
<!-- welcome -->
<div class="welcome">
	<div class="container signup">
		<div class="welcome-head text-center">
			<h2>Edit Project</h2>
		</div>
		<div class="single-page">
<?php
if(isset($_POST['updatelisting'])){
	$addedBy=$userid;
	$addID=mysql_real_escape_string(trim($_POST['listingID']));
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
	$structure="userfiles/$userid/list$addID/";
	
	$ALQ="update listings set project_name='$project_name', state='$state', district='$district', city='$city', cause='$cause', fromDate='$fromDate', toDate='$toDate', vacancies='$vacancies', about='$about', role='$role', meal='$meal', stay='$stay', transport='$transport', email='$email', phone='$phone', mobile='$mobile', rep1='$rep1', rep2='$rep2', rep3='$rep3', rep4='$rep4', rep5='$rep5' where listingID='$addID';";
	if(mysql_query($ALQ, $db)){
		echo "<p>Listing edited successfully.</p>";
		$xxi=1;
		for($xxi=1; $xxi<=5; $xxi++){
			$imgID="img". $xxi;
			$del="delImg" . $xxi;
			$rep="repImg" . $xxi;
			$imgFile="Tiimg" . $xxi;
	
			if($_POST[$del]){
				echo "will delete $imgFile<br />";
				$LDQ="update listings set $imgID='' where listingID='$addID';";
				if(mysql_query($LDQ, $db)){
					$path="./userfiles/$userid/list$addID/".mysql_real_escape_string(trim($_POST[$imgFile]));
					echo "Deleting $path<br />";
					exec("rm -rf $path");
				}
			}elseif($_POST[$rep]){
				echo "will replace $imgFile<br />";
				$fileinput=$_POST[$imgID];
				$file_name=$_FILES[$imgID]["name"];
				$file_size =$_FILES[$imgID]["size"];
				$file_tmp=$_FILES[$imgID]["tmp_name"];
				if($file_name!=''){
					if(!file_exists("$structure".$file_name)){
						if(move_uploaded_file($file_tmp=$_FILES[$imgID]["tmp_name"],"$structure".$file_name)){
							$query1="update listings set $imgID='$file_name' where listingID='$addID';";
				         mysql_query($query1, $db);
				         //echo $query1. ":". mysql_error($db)."<br>";
				         $errUQ=$errUQ."File <b>$file_name</b> successfully uploaded.<br />";
							$path="./userfiles/$userid/list$addID/".mysql_real_escape_string(trim($_POST[$imgFile]));
							//echo "Deleting $path<br />";
							exec("rm -rf $path");
						}else{
							$errUQ=$errUQ."Failed to upload file <b>$file_name</b>.<br />";
						}
					}
				}
			}else{
				$fileinput=$_POST[$imgID];
				$file_name=$_FILES[$imgID]["name"];
				$file_size =$_FILES[$imgID]["size"];
				$file_tmp=$_FILES[$imgID]["tmp_name"];
				if($file_name!=''){
					if(!file_exists("$structure".$file_name)){
						if(move_uploaded_file($file_tmp=$_FILES[$imgID]["tmp_name"],"$structure".$file_name)){
							$query1="update listings set $imgID='$file_name' where listingID='$addID';";
				         mysql_query($query1, $db);
				         //echo $query1. ":". mysql_error($db)."<br>";
				         $errUQ=$errUQ."File <b>$file_name</b> successfully uploaded.<br />";
						}else{
							$errUQ=$errUQ."Failed to upload file <b>$file_name</b>.<br />";
						}
					}
				}
			}
		}		
		
	}else{
		echo "<p>Failed to edit this listing.<br />". mysql_error($db) . "<br />$ALQ</p>";
	}

	echo "<p>Listing successfully updated. Soon you will be redirected to your listings.</p><p>Or, click <a href='home.php'>here</a> to go back to home page.</p>";
	echo "<script>setTimeout(window.location='view_listings.php', 10000);</script>";
}else{
?>
		<form method="post" id="signupForm" action="edit_opportunity.php?opp=<?php echo $opp; ?>" enctype="multipart/form-data">
		<input type="hidden" name="listingID" value="<?php echo $LSTD[0]; ?>" />
			<table class="table_head">
				<tr>
					<td width="150px">Project Name</td><td colspan="3"><input type="text" class="required" name="prjName" id="prjName" value="<?php echo $LSTD[2] ; ?>" class="searchboxfull" /></td>
				<tr>
				<tr>
					<td>State</td>
					<td>
					<select name="state" id="state" onchange="selectState(this.value);">
					<option value="" default>--</option>
					<option value="Himachal Pradesh">Himachal Pradesh</option>
					<option value="<?php echo $LSTD[3] ; ?>" selected="selected"><?php echo $LSTD[3] ; ?></option></select></td>
					<td>District</td><td><select name="district" id="district"><option value="<?php echo $LSTD[4] ; ?>" selected="selected"><?php echo $LSTD[4] ; ?></option></select></td>
				<tr>
				<tr>
					<td>City</td><td colspan="3"><input name="city" id="city" type="text" value="<?php echo $LSTD[5] ; ?>" class="required"  /></td>
				<tr>
				<tr>
					<td>Cause</td><td colspan="3"><input type="text" class="required"  value="<?php echo $LSTD[6] ; ?>" name="prjCause" id="prjCause" class="searchboxfull" /></td>
				<tr>
				<tr>
					<td>Dates</td><td  colspan="3"><input type="text" id="fromdate" name="fromdate" value="<?php echo $LSTD[7] ; ?>"  class="searchboxsmall" readonly />&nbsp;
					<input type="text" id="todate" name="todate" value="<?php echo $LSTD[8] ; ?>"  class="searchboxsmall" readonly />&nbsp;&nbsp;&nbsp;&nbsp;
					No of Vacancies&nbsp;
					<input type="number" value="<?php echo $LSTD[9] ; ?>" name="vacancies" id="vacancies" class="required number" min="1" max="1000" class="searchboxsmall" />
				</td>
				<tr>
				<tr>
					<td>About the Project</td><td colspan="3"><textarea name="about" id="about" class="required" class="searchboxfull"><?php echo $LSTD[10] ; ?></textarea></td>
				<tr>
				<tr>
					<td>About the Role</td><td colspan="3"><textarea name="role" id="role" class="required" class="searchboxfull"><?php echo $LSTD[11] ; ?></textarea></td>
				<tr>
				<tr>
					<td>Support</td><td colspan="3" class="article"><input name="meal" id="meal" type="checkbox" <?php if($LSTD[12]=='Y'){echo 'checked="checked"';} ?> ><label>Meals</label></input>&nbsp;&nbsp;
					<input name="stay" id="stay" type="checkbox" <?php if($LSTD[13]=='Y'){echo 'checked="checked"';} ?> ><label>Stay</label></input>&nbsp;&nbsp;
					<input name="transport" id="transport" type="checkbox" <?php if($LSTD[14]=='Y'){echo 'checked="checked"';} ?> ><label>Transport</label></input></td>
				<tr>
				<tr>
					<td>Contact Details</td><td colspan="3"><input type="email" name="email" id="email" class="email" value="<?php echo $LSTD[15] ; ?>"  />&nbsp;&nbsp;
					<input type="tel" name="phone" id="phone" value="<?php echo $LSTD[16] ; ?>" class="phone"  />
					<input type="tel" name="mobile" id="mobile" value="<?php echo $LSTD[17] ; ?>" class="phone"  /></td>
				<tr>
				<tr>
					<td colspan="4">
					<div>
						<fieldset>
						<legend>Images</legend>
							<div id="gallery">
								<table>
								<?php
									$xxi=1;
									for($xx=20; $xx<25; $xx++){
										if(trim($LSTD[$xx])!=''){
											echo '<tr><td><b>Image '.$xxi.'</b><br /><img class="simg" id="Diimg'. $xxi. '" src="'.$structure.$LSTD[$xx].'" /><input type="hidden" name="Tiimg'. $xxi. '" value="'.$LSTD[$xx].'" /></td><td class="article">';
											echo '<input type="checkbox" name="delImg'.$xxi.'" id="delImg'.$xxi.'"><label>Delete</label></input>';
											echo '<input type="checkbox" name="repImg'.$xxi.'" id="repImg'.$xxi.'" onClick='."'showctrl($xxi);'".'><label>Replace</lable></input><br />';
											echo "\r<span class='nodisplay' id ='s$xxi'><input type='file' name='img$xxi' id ='img$xxi' accept='image/*' onchange='loadFile(event, $xxi)' /></span>";
											echo "</td></tr>\r";
										}else{
											echo "<tr><td><b>Image $xxi</b><br />";
											echo "\r<div class='thumbnail' name='Dimg$xxi' id ='Dimg$xxi'><img id='Diimg$xxi' /></div>";
											echo "\r<input type='file' name='img$xxi' id ='img$xxi' accept='image/*' onchange='loadFile(event, $xxi)' />";
											echo " Upload image</td></tr>\r";
										}
										$xxi++;
									}
								?>
								</table>				
							</div>
						</fieldset>
					</div>
					</td>
				</tr>
				<tr><td colspan="4">&nbsp;</td></tr>
				<!-- <tr>
					<td colspan="4">
					<div>
						<fieldset>
						<legend>Reports*</legend>
							<input type="url" name="rep1" id="rep1" value="<?php echo $LSTD[30] ; ?>" class="searchboxfull" /><br />
							<input type="url" name="rep2" id="rep2" value="<?php echo $LSTD[31] ; ?>" class="searchboxfull" /><br />
							<input type="url" name="rep3" id="rep3" value="<?php echo $LSTD[32] ; ?>" class="searchboxfull" /><br />
							<input type="url" name="rep4" id="rep4" value="<?php echo $LSTD[33] ; ?>" class="searchboxfull" /><br />
							<input type="url" name="rep5" id="rep5" value="<?php echo $LSTD[34] ; ?>" class="searchboxfull" /><br />
						</fieldset>
						<p>*Enter url of report(s). Reports will be shown as link.</p>
					</div>
					</td>
				</tr> -->
				<tr>
					<td colspan="4" align="right"><input type="submit" name="updatelisting" id="updatelisting" value="Update Listing" /></td>
				<tr>
			</table>
			</form>
<?php
}
?>
		</div>
	</div>
</div>
<!-- //welcome -->

<!--/index-team-->

<!-- footer -->
<!-- <div class="footer">
	<div class="container">
	<div class="footer-bottom-at">
		<div class="col-md-6 footer-grid">
		<p>&copy; Detour Ventures. All rights reserved</p>
		</div>
		<div class="col-md-6 footer-grid-in">
		<ul class="footer-nav">
			<li><a href="index.php">Home</a>|</li>
			<li><a href="About us/about us.php">About</a>|</li>
			<li><a href="legal_information/legal_information.php">Legal Information</a>|</li>
			<li><a href="PP/PP.php">Privacy Policy</a>|</li>
			<li><a href="T&C/T&C.php">T&C</a></li>		
		</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
	</div>
</div> -->
<div class="footer container edtprjt-footer">
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

<!-- //footer -->
</body>
</html>