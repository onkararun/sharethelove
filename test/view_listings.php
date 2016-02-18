<?php
	include('connect_base.php');
	session_start();
	ob_start();
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
		$loggedUser=$_SESSION['userid'];
		$LQ="select * from listings where addedBy='$loggedUser' order by listingID desc;";
		$RLQ=mysql_query($LQ, $db);
	}else{
		session_destroy();
		header('Location: index.php');
		ob_end_flush();
	}
	if(isset($_POST['setDel'])){
		$listingID=mysql_real_escape_string(trim($_POST['setDel']));
		$LDQ="delete from listings where listingID='$listingID';";
		if(mysql_query($LDQ, $db)){
			$path="./userfiles/$loggedUser/list$listingID/";
			//echo "Deleting $path<br />";
			exec("rm -rf $path");
		}
		header('Location: view_listings.php');
		ob_end_flush();
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>sharethelove.co.in | My Listings</title>
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
<!-- for-mobile-apps -->
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
<script type="application/x-javascript"> 
     $(document).ready(function(){
		$('.popup').click(function(){ 
		      $('.search-box-container').toggle();
		      });
		});/* search box toggle */

	function warning(txt) {
		if(confirm('Are you sure delete this posting?')){
			$('#Opplisting').append('<input type="hidden" name="setDel" value="' + txt + '" />').submit();
		}else {
	  		return false;
		}
	}
</script>
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
<div id="profile" class="container">
		<div class="profilecontent">
			<div class="profileheader"><img src="images/my-projects---photograph.png" alt="my profile and listings" /></div>
			<div class="topcurvemenu view-listing">
				<ul>
				
					<li><a href="home.php"><img src="images/home-icon.png" alt="home" /><br/>HOME</a></li>
					<li><a href="profile.php?action=edit"><img src="images/edit_profile.png" alt="edit profile" /><br/>EDIT PROFILE</a></li>
					<li><a href="add_opportunity.php"><img src="images/add_listing.png" alt="add listing" /><br/>ADD PROJECT</a></li>
					<li><a href="view_listings.php"><img src="images/view_profie.png" alt="view profile" /><br/>MY PROJECTS</a></li>
					<li>
					<a href="#" class="popup"><img src="images/search.png" alt="search" /><br/>
					SEARCH</a>
					<div class="search-box-container view-listing-search">
					  <center>
						<form id="search" name="search" method="GET" action="view_listings.php">
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
						<div class="pfilepic">Profile Picture</div>
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
			<input type="hidden" name="delll" value="0" />
			<div class="myprojects"><img src='images/my-projects---photograph.png' /></div>
			<?php 
			//$row = mysql_fetch_array($RLQ);
			$count = mysql_num_rows($RLQ);
			if($count == 0) {
			?>
			<div class="myprjt-txt">Get started! Add your first project now by clicking on (ADD PROJECT icon) above</div>
			<?php } else {
			    $j = 1;
				while($row=mysql_fetch_array($RLQ)){
					$currentID=$row[0];
					$path="userfiles/$row[1]/list".$row[0]."/";
					$timetodisplay = DateTime::createFromFormat('Y-m-d H:i:s', $row[18])->format('d-M-y');
					echo "<div class='resultstbl' id='$currentID'>\r";
					echo "<h4>Project: $row[2]\r";
					echo "<div class='searchcontrols'>$timetodisplay &nbsp;<a href='#' onClick='return warning($currentID);'>Delete</a>&nbsp; &nbsp;<a href='edit_opportunity.php?opp=$currentID'>Edit</a></div>\r</h4>\r";
					echo "<div class='clearfix'> </div>\r";
					echo "<div class='mainsearchresult'>\r";					
					echo "<div class='lefttbl'>Location: $row[5]($row[3])</div><div class='righttbl'>Cause: $row[6]</div>\r";
					echo "<div class='lefttbl'>Start Date: $row[7]</div><div class='righttbl'>End Date: $row[8]</div>\r";
					echo "<div class='clearfix'> </div>\r";
					echo "<div>\r";
					if(trim($row[20])!=''){
						echo "<a class='example-image-link' href='$path$row[20]' data-lightbox='$j' ><img class='simg' src='$path$row[20]' alt=''/></a>";
					}
					if(trim($row[21])!=''){
						echo "<a class='example-image-link' href='$path$row[21]' data-lightbox='$j' ><img class='simg' src='$path$row[21]' alt=''/></a>";
					}
					if(trim($row[22])!=''){
						echo "<a class='example-image-link' href='$path$row[22]' data-lightbox='$j' ><img class='simg' src='$path$row[22]' alt=''/></a>";
					}
					if(trim($row[23])!=''){
						echo "<a class='example-image-link' href='$path$row[23]' data-lightbox='$j' ><img class='simg' src='$path$row[23]' alt=''/></a>";
					}
					if(trim($row[24])!=''){
						echo "<a class='example-image-link' href='$path$row[24]' data-lightbox='$j' ><img class='simg' src='$path$row[24]' alt=''/></a>";
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
					$j++;
				}
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
			</script>
			</form>
</div>
<?php } ?>
<!-- //welcome -->

<!--/index-team-->
<div class="support container" >
	<h3><a href="#"><img src="images/support-us.png" /></a></h3>
	<div class="socialmedia"><h3><img src="images/follow-us.png" /> <a href="https://www.facebook.com/sharethelovecoin-1507486976240873/"><img src="images/fb.png" /></a> <a href="https://www.instagram.com/sharethelove.co.in/"><img src="images/insta.png" /></a> <a href="https://twitter.com/SharetheloveIn/"><img src="images/twitter.png" /></a></h3></div>
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

<!-- //footer -->
</body>
</html>