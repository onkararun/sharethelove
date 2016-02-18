<?php 
session_start();
include('connect_base.php');
include('functions.php');
?>
<!Doctype Html>
<html>
    <head>
      <link type="text/css" rel="Stylesheet" href="css/aboutus.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>About us panel </title>
      <!-- js -->
        <script src="../js/jquery-1.6.2.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.js"></script>
        <script type="text/javascript" src="../js/jquery.validate.js"></script>
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
            //var xxx = offset.left + 780 + 'px';
            $(this).toggleClass('active');
            $(this).next('#login-content').css({
            
            });
            $(this).next('#login-content').slideToggle();
            
            if ($(this).hasClass('active')){
              $(this).find('span').html('&#x25B2;');
              $('.welcome').fadeTo( "slow", 0.33 );
              $('.news').fadeTo( "slow", 0.33 );
              $('.footer').fadeTo( "slow", 0.33 );
            }
            else{
              $(this).find('span').html('&#x25BC;');
              $('.welcome').fadeTo( "fast", 1 );
             $('.news').fadeTo( "fast", 1 );
            $('.footer').fadeTo( "fast", 1 );
            }
          })
        });
      </script>
    </head>
    <body>
    <?php
      include('../header.php'); 
    ?>
	     <!-- <header class="top">
          <div class="pull-left">
            <div class="pull-left-txt">
                <ul>
       	            <li><a href="#">sharethelove.co.in</a></li>
                </ul>	
            </div>
          </div>
              <div class="pull-right">
                <div class="main-menu">
                  <ul>
                      <li><a href="#">ABOUT</a></li>
                      <li><a href="../blog">BLOG</a></li>
                  </ul>
                </div>
                <div class="pull-right-loginbtn">
                  <a id="login-trigger" href="#"><img src="images/login.png"></a>
                  <div id="login-content">
                       <fieldset>
                       <form id="loginform" name="loginform" method="post" action="../home.php">
                            <input id="Loginemail" type="email" name="Loginemail" placeholder="Your email id" />
                            <input id="lpass" type="password" name="lpass" placeholder="Password" />
                            <input type="submit" name="btnlogin" id="btnlogin" value="Log in" /><br />
                            <label><input type="checkbox" name="chkKeepLoged" id="chkKeepLoged" />&nbsp;Keep me logged-in</label><br />
                            <a href="forget_password.php">Forgot Password</a>
                       </form>
                       </fieldset>
                  </div>
                </div>
              </div>
        </header> -->
            <section class="main">
               <section class="top1">
   	              <div class="content-left">
   	 	              <div class="title-1">
   	 	                 <img src="images/ab1.png">
   	 	              </div>
   	 	                  <div class="content-box">
   	 	 	                     <p class="tx">Sharethelove.co.in is great tool for posting about and looking for the kind of volunteering opportunities that interest you. This is a free service to connect people around the country to great causes close to your heart. We are hoping to create a network of likeminded people so that amazing things can come out of these collaborations!</p>
   	 	                  </div>
   	 	                      <div class="title2">
   	 	    	                     <img src="images/ab2.png">
   	 	                      </div>
   	 	                          <div class="content-box1">
   	 	     	                      <div class="heading">
   	 	     		                         <p>CONCEPT <BR>MANIL AGARWAL</p>
   	 	     	                      </div>
   	 	     	                          <div class="para">
   	 	     	 	                              <P class="tx1">"Sharethelove.co.in is great tool for posting about and looking for the kind of volunteering opportunities that interest you. This is a free service to connect people around the country to great causes close to your heart!"</P>
   	 	     	                          </div>
   	 	     	                            <div class="img-ft">
                                          <div class='inner-wrapper'><span>GET IN TOUCH</span> <a href="https://www.facebook.com/agarwal.manil/" target="_blank"><img src="../images/fb.png" /></a> <a href="https://www.instagram.com/manil_agarwal/" target="_blank"><img src="../images/insta.png" /></a> <a href=" https://twitter.com/manil_agarwal" target="_blank"><img src="../images/twitter.png" /></a>
   	 	     	                              </div>
                                        </div>
   	 	     	                    </div>
   	 	     	                    <div class="content-box1">
   	 	     	 	                     <div class="head">
   	 	     	 		                         <p>CAPITAL<BR>MANU GUPTA<BR>SAPNA AGARWAL<BR>MANIL AGARWAL</p>
                                    </div>
   	 	     	 	                         <div class="img-ft">
                                          <div class='inner-wrapper'><span>GET IN TOUCH</span> <a href=" https://www.facebook.com/manu.gupta86?fref=ts" target="_blank"><img src="../images/fb.png" /></a>
                                          </div>
                                       </div>
   	 	     	                    </div>
                                <div class="content-box1">
   	 	     	 	                      <div class="head">
   	 	     	 		                       <p>TECH<BR>GAI TECHNOLOGIES</p>
                                  </div>
                                    <div class="img-ft">
                                           <div class='inner-wrapper'><span>GET IN TOUCH</span> <a href="" target="_blank"><img src="../images/fb.png" /></a> <a href="" target="_blank"><img src="../images/insta.png" /></a> <a href="" target="_blank"><img src="../images/twitter.png" /></a>
                                          </div>
                                          </div>
   	 	     	                </div>
       	 	     	 <div class="content-box1">
       	 	     	 	<div class="head">
       	 	     	 		<p>DESIGN<BR>MUDITA MATHUR</p>

       	 	     	 	</div>
       	 	     	 	 <div class="img-ft">
                      <div class='inner-wrapper'><span>GET IN TOUCH</span> <a href=" https://www.facebook.com/mudita.mathur.5?fref=ts" target="_blank"><img src="../images/fb.png" /></a> 
                      </div>
                   </div>
       	 	     	 </div>
       	 	     	 <div class="content-box1">
       	 	     	 	<div class="head">
       	 	     	 		<p>MARKETING<BR>RAJEEV ANIL VAISHNAV</p>

       	 	     	 	</div>
       	 	     	 	 <div class="img-ft">
                      <div class='inner-wrapper'><span>GET IN TOUCH</span> <a href="https://twitter.com/VaishnavRajeev" target="_blank"><img src="../images/twitter.png" /></a>
                      </div>
                   </div>
       	 	     	 </div>
         	 	     	 <!-- <div class="content-box1">
         	 	     	 	<div class="head">
         	 	     	 		<p>XYZ<BR>ABCD&nbspEFGHI</p>

         	 	     	 	</div>
         	 	     	 	 <div class="img-ft1">
         	 	     	 	 	<img src="images/ab4.png">
         	 	     	 	 </div>
         	 	     	 </div> -->
       	 	     </div>
       	 	</section>
       	 <section class="top2" >	     
       	 <div class="content-right">
       	 	<div class="title-right1">
       	 		<img src="images/ab5.png">
       	 	</div>
             <div class="main-para">
       	 	     <div class="para-right">
       	 	 	     <p class="test1">We are very grateful for any support given, so that we may be able to continue operating and bringing more awareness about volunteering to the forefront! </p>
       	 	     </div>
       	 	  <div class="form-img">
            <div class="share-add-txt"><p class="test1">Please feel free to send your donations to ;</p></div>
            <div class="share-address"> 
            <ul>
            <li>Name: DETOUR VENTURES</li>
            <li>BANK A/C: 50200016517482</li>
            <li>IFSC: HDFC0000305</li>
            <li>BRANCH: BOPAL, AHMEDABAD</li>
            </ul>
            </div>
   	 	    <!-- <center>
              <table class="fm-img">
                  <tr>
                      <td>AMOUNT</td>
                      <td><input type="text"></input></td>
                  </tr>
                  <tr>
                      <td>PAYMENT TYPE</td>
                      <td><input type="text"></input></td>
                  </tr> 
              </table>
          </center>	 -->
          <!-- <center>
              <div class="innerimg">
   	 	 	  	     <a href="#"><img src="images/ab8.png"></a>
   	 	 	  	     <a href="#"><img src="images/ab9.png"></a>
   	 	 	  	     <a href="#"><img src="images/ab10.png"></a>
   	 	 	  	     <a href="#"><img src="images/ab11.png"></a>
   	 	 	          <a href="#"><img src="images/ab7.png"></a>
              </div>
          </center> -->
        </div>
        </div>
      </div>
   	 	 	 <div class="title-right3">
   	 	 	 	<img src="images/AB16.png">
   	 	 	 </div>
             <div class="main-para">
   	 	 	  <div class="cnt">
   	 	 	  	    <p>For any inquiries,questions or clarification,<Br>please contact us at:</p>
   	 	 	  	      <div class="inner-cnt">
   	 	 	  		      <h2>support@sharethelove.com </h2>
   	 	 	  	      </div>
   	 	 	  </div>
   	 	 	     <!-- <div class="frm">
               <center>
                  <p class="head-right">LEAVE A MESAGE</p>
                <table class="frm-inner">
                    <tr>
                          <td>Name </td>
                          <td><input type="text"></td>
                    </tr>
                    <tr>
                          <td>E-Mail </td>
                          <td><input type="text"></td>
                    </tr>
                    <tr>
                          <td>Message </td>
                          <td><textarea row="6" cols="16"></textarea><br></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="button" value="Send">Send!</button></td>
                    </tr> 
                </table>
              </center>
           </div> -->
   	 	 	     <!-- <div class="img-f">
   	 	 	    	 <img src="images/ab4.png"/>
   	 	 	     </div>  -->
        </div>	
   	 </div>
   </section> 
  </section> 
</section>
<?php  
  include('../footer.php');
?>
 <!-- <footer>
       <div class="ft-main">
         <div class="ft-left">
            <p class="txt"> &copy; Detour Ventures <br>All rights reserved</p>
         </div> 
         <div class="footer-right">
          <ul class="footer-nav">
            <li><a href="../home.php">Home</a>|</li>
            <li><a href="About us/about us.html">About</a>|</li>
            <li><a href="../legal_information/legal_information.html">Legal Information</a>|</li>
            <li><a href="../PP/PP.html">Privacy Policy</a>|</li>
            <li><a href="../T&C/T&C.html">T&C</a></li>   
          </ul>
        </div>
       </div>
   </footer> -->
</body>
</html>