<?php 
session_start();
include('connect_base.php');
include('functions.php');
?>
<!Doctype html>
<html>
<head>
   <title>Legal Information</title>	
   <link type="text/css" rel="stylesheet" href="css/lginformation.css"/>
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
          <li><a href="../About us/about us.html">ABOUT</a></li>
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
   </header>   -->
     <section class="middle">
       <div class="content">
          <div class="content-wrapper">
             <div class="content-main">
               <div class="top-content">
                  <img src="images/tiles.png">
               </div>
               <div class="content-txt">
                 <p>Copyright &copy; 2015 sharethelove.co.in.All rights reserved</p>
                 <p>The contents of sharethelove.co.in are intented for private use only.The reproduction or reuse of any information contained on this site is expressly prohibited without the consent of sharethelove.co.in</p>
               </div>
               <div class="content-add">
                 <p>Please direct all legal inquiries to:</p>
                 <img src="images/address.png">
                 <p>www.sharethelove.com\legal\jsp</p>
                 <p>sharethelove.co.in, and the sharethelove.co.in logos are trademark of Detour Ventures.<br>All other trademarks are the property of their respective owners</p>
               </div>
             </div>
          </div>
       </div>
     </section>
     <?php
        include('../footer.php');
     ?>
     <!-- <footer>
       <div class="ft-main">
         <div class="ft-left">
            <p> &copy; Detour Ventures <br>All rights reserved</p>
         </div> 
         <div class="ft-right">
           <ul class="footer-nav">
             <li><a href="../index.php">Home</a>|</li>
             <li><a href="../About us/about us.html">About</a>|</li>
             <li><a href="../legal_information/legal_information.html">Legal Information</a>|</li>
             <li><a href="../PP/PP.html">Privacy Policy</a>|</li>
             <li><a href="../T&C/T&C.html">T&C</a></li>   
           </ul>
         </div>
       </div>
     </footer> -->
</body>
</html>