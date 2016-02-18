<?php
	include('connect_base.php');
	session_start();
	ob_start();
	if((isset($_GET['user'])) || (isset($_GET['action'])) || (isset($_SESSION['userid']))){
		$showControl=mysql_real_escape_string(trim($_GET['action']));
	}
	else{
		session_destroy();
		header('Location: index.php');
		ob_end_flush();		
		//echo "<script> location.href='http://sharethelove.co.in/index.php' </script>";
	}

   
	if(isset($_POST['btnProfileUp'])){
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
		$url=mysql_real_escape_string(trim($_POST['burl']));
		$signDate=date('Y-m-d H:i:s');
		$signIP = $_SERVER['REMOTE_ADDR'];

		$QUID="select userid from tbl_sign_up where emailid='$emailid';";
		$RUID=mysql_query($QUID, $db);
		$DUID=mysql_fetch_array($RUID);
		$userid=$DUID[0];

        $queryData="select * from state where StCode = '$state'";
	    $resData=mysql_query($queryData , $db);
	    $row=mysql_fetch_array($resData);
	    $state=$row["StateName"]; 
         
        $queryDt="select * from district where DistCode = '$district'";
        $resDt=mysql_query($queryDt , $db);
        $rowDt=mysql_fetch_array($resDt);
        $district=$rowDt["DistrictName"];
		
  //       if($password=='') {
		// $querysignup = "select password from tbl_sign_up where emailid='$emailid';";
		// $ressignup = mysql_query($querysignup, $db);
		// $rowsignup = mysql_fetch_array($ressignup);
		// $password = $rowsignup[0];
		// $querypwd="update tbl_sign_up set name='$name', username='$username', password='$password', state='$state', district='$district', city='$city', dob='$dob', usertype='$usertype', bio='$bio', url='$url', signDate='$signDate' where userid='$userid';";
		// mysql_query($querypwd, $db);
		// }
		// else{
		// $query="update tbl_sign_up set name='$name', username='$username', password=password('$password'), state='$state', district='$district', city='$city', dob='$dob', usertype='$usertype', bio='$bio', url='$url', signDate='$signDate' where userid='$userid';";
		// mysql_query($query, $db);
		// }

		  if($password!=''){
		  	$query="update tbl_sign_up set name='$name', username='$username', password=password('$password'), state='$state', district='$district', city='$city', dob='$dob', usertype='$usertype', bio='$bio', url='$url', signDate='$signDate' where userid='$userid';";
		    mysql_query($query, $db);
		  }
		  else{
		  	$querytwo="update tbl_sign_up set name='$name', username='$username', state='$state', district='$district', city='$city', dob='$dob', usertype='$usertype', bio='$bio', url='$url', signDate='$signDate' where userid='$userid';";
		    mysql_query($querytwo, $db);
		  }
		
		//echo "<p>$query</p>\r";

		$structure="userfiles/$userid/";
		mkdir($structure, 0777, true);
		chmod($structure, 0777);
		$nowtime = time();
		$profilepic=$username.$nowtime;
	   if(isset($_FILES['fileinput'])){
	      $errors= array();
	      $file_name = $_FILES['fileinput']['name'];
	      if(trim($file_name)===''){
	      }else{
		      $file_size =$_FILES['fileinput']['size'];
		      $file_tmp =$_FILES['fileinput']['tmp_name'];
		      $file_ext=strtolower(end(explode('.',$_FILES['fileinput']['name'])));
		      $profilepic=$profilepic.".".$file_ext;
		      if(move_uploaded_file($file_tmp,"$structure".$profilepic)){
		         //echo "Success<br />";
		         $query1="update tbl_sign_up set profilepic='$profilepic' where userid='$userid';";
		         mysql_query($query1, $db);
		         $errUQ="Success";
		      }
		      else{
		         //echo "File upload failed: $structure/$profilepic<br />";
		         $errUQ="FileFail";
		      }
			}
	   }

		header('Location: home.php');
		ob_end_flush();
	   //echo "<script> location.href='http://sharethelove.co.in/home.php' </script>";

	}
	elseif(isset($_POST['btnProfileDelete'])){
		$userid=$_SESSION['userid'];
		$UDQ="delete from tbl_sign_up where  userid='$userid'";
		//echo $UDQ; die;
	    mysql_query($UDQ, $db); 

		$count=mysql_affected_rows();
		if($count > 0)
		{
			$status="ture";
		}
		else
		{
			$status = "false";
		}
		header('Location: logout.php?m='.$status);
		ob_end_flush();
		//echo "<script> location.href='http://sharethelove.co.in/logout.php?m='".$status."</script>";
	} 
	elseif(isset($_SESSION['userid'])){
		$loggedUser=$_SESSION['userid'];
		$UDQ="select * from tbl_sign_up where userid='$loggedUser';";
		$resUDQ=mysql_query($UDQ, $db);
		$dUDQ=mysql_fetch_array($resUDQ);
		
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
		$structure="userfiles/$loggedUser/";
	}
	elseif(isset($_GET['user'])){
		$profile=mysql_real_escape_string(trim($_GET['user']));	
		$UDQ="select * from tbl_sign_up where username='$profile';"; 
		$resUDQ=mysql_query($UDQ, $db);
		$dUDQ=mysql_fetch_array($resUDQ);
		
		$username =$dUDQ['username'];
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
		$structure="userfiles/$dUDQ[0]/";
	}
	else{
		session_destroy();
		header('Location: index.php');
		ob_end_flush();
		//echo "<script> location.href='http://sharethelove.co.in/index.php' </script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>sharethelove.co.in | Profile</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery-1.6.2.min.js"></script>
<script src="js/jquery-ui.js"></script>
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
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html" />
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } 
	$(function() {
		$( "#DOB" ).datepicker({
			dateFormat: 'dd/mm/yy',
			defaultDate: "+0d",
			changeMonth: true,
			numberOfMonths: 1,
			changeYear: true,
			yearRange: "-200:+0"
		});
	});
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
	function getdistrict(val) {
		$.ajax({
		type: "POST",
		url: "get_district.php",
		data:'state_id='+val,
		success: function(data){
			$("#district-list").html(data);
		}
		});
    }/* Add function for getting states */
    
	// function selectState(txt){
	// 	var state=txt;
	// 	$cname = $("select[name='district']");
	// 	if(state=='Delhi'){
	// 			$('#city').val(" ");
	// 			$("select[name='district'] option").remove();
	// 			$("<option value='Delhi'>Delhi</option>").appendTo($cname);
	// 	}
	// 	if(state=='Himachal Pradesh'){
	// 			$('#city').val(" ");
	// 			$("select[name='district'] option").remove();
	// 			$("<option value='Kangra'>Kangra</option>").appendTo($cname);
	// 	}
	
	// }
</script>
<!-- //for-mobile-apps -->
<script>
function msg() {
	confirm('Are you really want to suspend your account?')
}

</script>
</head>
	
<body>

<?php
if($showControl=='edit'){
?>
<!-- header -->	
	<!--<div class="header" id="move-top">-->
	<div class="header">
		<div class="container">
			<div class="header-left">
				<h2><a href="index.php"><img src="images/Sharethelove.co.in.png" class="sharelogo"/></a></h2>
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
<!-- welcome -->
<div class="welcome">
<form method="post" action="profile.php" enctype="multipart/form-data">
	<div class="container signup">
		<div class="welcome-head text-center">
			<h2>Edit Profile</h2>
		</div>
	</div>
	<div class="form-wrapper">
		<div class="posts-left">
			<table class="table_head">
				<tr>
					<td>
					<div class="pfilepic-sgup">Profile Picture</div>
					<div id="gallery" class="pfile"><img id="profilepic" src="<?php echo $structure.$profilepic; ?>" /></div><br />
					<input type="file" id="fileinput" name="fileinput" accept="image/*" onchange='remprofilepic();' />
					<script src="js/gallery.js"></script></td>
				</tr>
				<tr>
					<td><p>Are you an:</p></td>   
				</tr>
				<tr>
					<td><?php if($usertype=='I'){?><div class="form-type-radio"><input type="radio" name="typeofaccount" value="I" checked="checked" ><label>Individual</label></input></div>
					<?php }else{ ?><div class="form-type-radio"><input type="radio" name="typeofaccount" value="I" ><label>Individual</label></input></div><?php } ?></td>
				</tr>
				<tr>
					<td><?php if($usertype=='O'){?><div class="form-type-radio"><input type="radio" name="typeofaccount" value="O" checked="checked" ><label>Organization</label></input></div>
					<?php }else{ ?><div class="form-type-radio"><input type="radio" name="typeofaccount" value="O" ><label>Organization</label></input></div><?php } ?></td>
				</tr>
			</table>
		</div>
		<div class="posts-right">
			<table class="table<?php echo $row['StCode'];?>_head">
				<tr>
					<td>Name</td><td><input type="text" name="name" id="name" value="<?php echo $name; ?>" /></td>
				</tr>
				<tr>
					<td>State</td>
					<td>
						<select onChange="getdistrict(this.value);"  name="state" id="state" class="form-control" >
							<option value="">Select</option>
					          <?php $query = mysql_query("SELECT * FROM state");
					            while($row = mysql_fetch_array($query))
					            { ?>
					            <option value="<?php echo $row['StCode'] ;?>" <?php if($row['StateName'] == $state){ ?> selected="selected"<?php } ?>/><?php echo $row['StateName'] ;?></option>
					          <?php
					            }
					          ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>District</td>
					<td>
						<select name="district" id="district-list">
						   <?php $query = mysql_query("SELECT * FROM state where StateName ='$state'");
					           $rowstate = mysql_fetch_array($query);
							  // print_r($rowstate); 
							   $queryDist = 'select * from district where StCode =' .$rowstate['StCode'];
							   //echo $queryDist ; die;
							   $resDist = mysql_query($queryDist);
							   while($rowDist=mysql_fetch_array($resDist)) {
							   ?>
						       <option value="<?php echo $rowDist['DistCode'];?>"<?php if($rowDist['DistrictName'] == $district) { ?>selected="selected"<?php } ?>/><?php echo $rowDist['DistrictName']; ?></option>
                               <?php 
                               } 
                               ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>City</td><td><input name="city" id="city" type="text" value="<?php echo $city; ?>" /></td>
				</tr>
				<tr>
					<td>Date of Birth/Inception&nbsp;&nbsp;</td><td><input type="text" id="DOB" name="DOB" value="<?php echo $dob; ?>" readonly /></td>
				</tr>
				<tr>
					<td>Email</td><td><input type="email" name="email" id="email" value="<?php echo $emailid; ?>" readonly /></td>
				</tr>
				<tr>
					<td>Username</td><td><input type="text" name="username" id="username" value="<?php echo $username; ?>" /></td>
				</tr>
				<tr>
					<td>Change Password</td><td><input type="password" name="password" id="password" value="" /></td>
				</tr>
				<tr>
					<td>Blog/Website</td><td><input type="text" name="burl" id="burl" value="<?php echo $url; ?>" /></td>
				</tr>
			</table>
		</div>
	
		<!-- <div class="container signup"> -->
		<center>
			<div class="textarea-wrapper"><textarea name="bio" id="bio"><?php echo $bio; ?></textarea></div><br />
			<input type="submit" name="btnProfileUp" id="btnProfileUp" value="Update Profile" />
			<input type="submit" name="btnProfileDelete" id="btnProfileDelete" value="Suspend Account" onclick='msg() ;'/>
		</center>
		<!-- </div> -->
	</div>
</form>
</div>

<!-- //welcome -->

<!--/index-team-->

<!-- footer -->
<!-- <div class="footer">
	<div class="container">
	<div class="footer-bottom-at">
		<div class="col-md-6 footer-grid">
		&copy; Detour Ventures. All rights reserved
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
<div class="footer container profile-footer">
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
</div><!-- Footer Changed by new -->

<!-- //footer -->
<?php
}
elseif($showControl=='show'){
	$profile=mysql_real_escape_string(trim($_GET['user']));	
		$UDQ="select * from tbl_sign_up where username='$profile'"; 
		$resUDQ=mysql_query($UDQ, $db);
		$dUDQ=mysql_fetch_array($resUDQ);
		
		$username =$dUDQ['username'];
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
		$structure="userfiles/$dUDQ[0]/";
		// show user data on popup; error solve
	// $dob = DateTime::createFromFormat('d/m/Y', $dUDQ['dob'])->format('d/m/Y');
?>
	<div class="signup">
		<div class="welcome-head text-center">
			<h2><?php echo $username; ?></h2>
		</div>
		<div class="posts-left">
			<table class="table_head">
				<tr>
					<td>
					<div class="pfilepic-sgup">Profile Picture</div>
					<div id="gallery" class="pfile"><img id="profilepic" src="<?php echo $structure.$profilepic; ?>" /></div>
					</td>
				</tr>
				<tr>
					<td><p><?php echo $name; ?></p></td>
				</tr>

			</table>
		</div>
		<div class="posts-right">
			<table class="table_head">
				<tr>
					<td><p>Location </p></td><td><p><?php echo $city . ", ". $district . "($state)"; ?></p></td>
				</tr>
				<tr>
					<td><p>Account Type: </p></td><td><p><?php if($usertype=='I'){?>Individual
					<?php }elseif($usertype=='O'){?>Organization
					<?php }?></p></td>
				</tr>
				<tr>
					<td><p>Date of <?php 
						if($usertype=='I'){
							echo "Birth";
						}elseif($usertype=='O'){
							echo "Inception";
						}						
						?>&nbsp;&nbsp;</p></td><td><p><?php echo $dob; ?></p></td>
				</tr>
				<tr>
					<td><p>Email</p></td><td><p><?php echo $emailid; ?></p></td>
				</tr>
				<tr>
					<td><p>Username</p></td><td><p><?php echo $username; ?></p></td>
				</tr>
				<tr>
					<td><p>Blog/Website&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td><p><?php echo $url; ?></p></td>
				</tr>
			</table>
		</div>
		<div class='clearfix'> </div>
		<div>
		
		<h4>About <?php echo $username; ?></h4>
		<p>
		<?php echo $bio; ?>
		</p>
		</div>
	</div>
<?php
}elseif($showControl=='listing'){
}
?>

</body>
</html>