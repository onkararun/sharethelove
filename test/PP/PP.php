<?php 
session_start();
include('connect_base.php');
include('functions.php');
?>
<!Doctype html>
<html>
<head>
   <title>PP</title>	
   <link type="text/css" rel="stylesheet" href="css/PP.css"/>
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
   </header>  -->
   <div class="container"> 
   <section class="middle">
	   <div class="content">
		   <div class="content-wrapper">
			   <div class="stlove-logo">
			       <img src="images/p1.png">
			   </div>
			   <div class="our-commitment">
			       <p class="updated">Last Updated: 11 January, 2016</p>
			       <div or-comitmt-logo>
			          <img src="images/p2.png">
			       </div>
			       <p class="p1">Your privacy is important to us. Our ongoing commitment to the protection of your privacy is essential to maintaining the relationship of trust that exists between sharethelove.<br>co.in, Inc. ("sharethelove.co.in" "we" or "us"), the nonprofits or other volunteer organizations seeking volunteers (each, an "Agency"), and our users. This privacy policy (the "Privacy Policy") is intended to help you understand how we collect, use, and disclose your information.</p>
               </div>
               <div class="user-consent">
               	    <div class="usr-const-logo">
               	        <img src="images/p3.png">
               	    </div>
               	    <p>By submitting Information through our services, you expressly consent to the processing of your Information according to this Privacy Policy. Your Information may be processed by us in the country where it was collected as well as other countries (including India) where laws regarding processing of Information may be less stringent than laws in your country.</p>
               </div>
               <div class="information-collect">
                   <div class="infrtion-cllect-logo">
                        <img src="images/p5.png">
                   </div>
                   <p>You may have accessed sharethelove.co.in by visiting http://www.sharethelove.co.in., by using our mobile application, or through the site of one of our third-party partners with whom we have teamed to provide volunteering services (collectively, the "Services"), such as a sharethelove.co.in co-branding partner or a corporate partner (collectively, "Partners"). This notice applies to all information you submit to sharethelove.co.in through the Services. Please note that we cannot be responsible for the information you submit directly to third parties, including our Partners, who may have their own posted policies regarding the collection, use, and disclosure of your information. We urge you to review the policies of our Partners through whom you may access our services.</p><br>
                   <p>The types of information, including without limitation personal information, ("Information") we may collect from users through the Services are:</p>
                   <ul>
	                   <li><img src="images/p6.png">First and Last Name</li>
		               <li><img src="images/p6.png">Email address and password</li>
	                   <li><img src="images/p6.png">Telephone number</li>
	                   <li><img src="images/p6.png">Address, City and State (optional)</li>
	                   <li><img src="images/p6.png">Country and Postal Code</li>
	                   <li><img src="images/p6.png">Comments and feedback about volunteer experiences (optional)</li>
	                   <li><img src="images/p6.png">Connection history</li>
	                   <li><img src="images/p6.png">Geo-location information</li>
	                   <li><img src="images/p6.png">Information about your interests and skills (optional)</li>
	                   <li><img src="images/p6.png">Customized email preferences (optional)</li>
	                   <li><img src="images/p6.png">Resume (optional)</li>
	                   <li><img src="images/p6.png">Other categories of information required or requested by an Agency to register for a particular volunteer opportunity.<br>
	                   For Agencies who use the Services to host volunteer opportunities we may collect:</li>
	                   <li><img src="images/p6.png">Administrator Information - First and Last Name; Email; Telephone Number; Postal Code; Username and Password. Address and City (optional); State; Country</li>
	                   <li><img src="images/p6.png">Agency Information - Agency Name; Contact Information (Contact Title, First and Last Name, Telephone Number, Address, City, State, Country, Postal Code, Email); Description of Services; Mission Statement; Tax ID/PAN, school ID, and/or proof of non-profit status, as applicable; Affiliations; Volunteer Type Category. Web site Address; Fax (optional).</li>
	                   <li><img src="images/p6.png">Volunteer Opportunity Information - Opportunity Title; Contact Email; Description; Volunteer Type; Location Information (either Street Location or "Virtual" Designation). Required Skills and Other Requirements; Date; Time; Commitment Information; Volunteer Age; Group Size (optional); photo (optional).</li>
                   </ul>
               </div>
               <div class="use-information">
               	   <div class="useinformation-logo">
               	   	   <img src="images/p7.png">
               	   </div>
               	   <p>We do not sell, rent, or trade our user Information (whether volunteer, administrator, or nonprofit users) to outside parties. We use the Information we collect about you to provide and improve the Services, facilitate the volunteering process, respond to your requests, and to provide information to you about sharethelove.co.in and related industry topics.</p><br>
               	   <p>Please be aware that, to the extent required to provide our services, we share your Information with volunteer users, Agencies, our third-party service providers, or our Partners, as applicable. We may use our email lists for sending out Sharethelove.co.in outbound communications. We also reserve the right to use your Information to send you transactional e-mails, and you cannot opt out of receiving transactional e-mails without deleting your account (by email us at support@sharethelove.co.in.).</p><br>
               	   <p>Please note that any feedback or comments provided by you on the Web site may be generally accessibly by any visitor to the Web site. Therefore, please take care when posting feedback or comments to the site, as you will forfeit the privacy of that information.</p><br>
               	   <p>If you are a volunteer user, we may also use your Information in the following ways:</p><br>
               	   <p>If you indicate to us that you are interested in creating a personalized account, the information we gather from you will be used to provide you with the Services and permit you to: access the account, customize your profile with skills and interests, customize outbound email services, review your connection history and/or post a resume that can be sent as an attachment to inquiries you make using the Sharethelove.co.in service.</p><br>
               	   <p>If you indicate to us that you are interested in a particular volunteer opportunity and provide us with your Information using the Services, we will forward your Information to the Agency that listed that opportunity so that the Agency can contact you regarding your potential involvement, and, if the particular Agency (including an Agency that is a Partner) has a regional or national office or is closely affiliated with or a member of a related Agency (each, an "Affiliate"), then we may also share your Information with the applicable Affiliate. Each such Agency, however, has its own policies regarding collection and use of personal information and we are not responsible for their use of your Information. For more about an Agency's policy, please contact them directly using the contact information posted for that Agency on our Web site.</p><br>
               	   <p>To the extent that you have provided any Information to us through our Services regarding volunteer opportunities associated with one of our Partners or have accessed the Services through a Partner, we may share your Information and connection history with the applicable Partner. Each of our Partners has its own policies regarding the collection and use of personal information, and Sharethelove.co.in is not responsible for their use of your Information. Furthermore, our Partners may collect additional information from you, independent of Sharethelove.co.in., in connection with the volunteer services.</p><br>
               	   <p>If you are an Agency, we may also use your Information in the following ways:</p><br>
               	   <p>If you submit Information to us as an Agency, then, subject to the terms and conditions as a nonprofit member of Sharethelove.co.in, your Information will be accessible by anyone who accesses Sharethelove.co.in. In addition, we may share your Information, including your CIN/ PAN number, with selected Partners in order to verify your Agency's identity and tax status.</p><br>
               	   <p>Agencies who receive email addresses from potential volunteer signups are strongly encouraged to adopt privacy standards similar to those of Sharethelove.co.in (but in each case, you must comply with all applicable privacy laws and regulations). Inappropriate use of personal information received from Sharethelove.co.in may jeopardize nonprofit membership with Sharethelove.co.in. Sharethelove.co.in reserves the right to determine, in its discretion, what constitutes inappropriate use of this information and to terminate Agency access to the Services for such misuse.</p><br>
               </div>
               <div class="third-party">
               	  <div class="third-party-logo">
               	  	   <img src="images/p8.png">
               	  </div>
               	     <p>Occasionally, we or our Partners, use third-party service providers to help provide or improve the services we offer you. Sometimes these providers have access to the Information we collect about you as a part of providing, maintaining, and improving the Services.</p><br> 
               	     <p>We share aggregate information about our users with certain third parties. This information shows user activity at a group level, rather than on an individual basis.</p><br> 
               	     <p>In the unlikely event that Sharethelove.co.in undergoes a sale or transfer of all or substantially all of its assets, the acquiring entity may use your Information subject to this Privacy Policy. In addition, in the further unlikely event that Sharethelove.co.in is adjudicated bankrupt or insolvent (a) there will be no further use or disclosure of your personally identifiable Information by Sharethelove.co.in and (b) reasonable efforts will be taken to ensure your personally identifiable Information on Sharethelove.co.in's servers will be destroyed. In addition, there will be no use or disclosure of your personally identifiable Information by any entity that acquires assets of Sharethelove.co.in pursuant to such bankruptcy or insolvency proceedings.</p><br> 
               	     <p>Due to factors beyond our control, however, we cannot fully ensure that your Information will not be disclosed to third parties. For example, we may be legally obligated to disclose Information to the government or third parties under certain circumstances, or third parties may circumvent our security measures to unlawfully intercept or access your Personal Information.</p><br> 
               </div>
               <div class="children-privacy">
               	    <div class="children-privacy-logo">
               	    	<img src="images/p9.png">
               	    </div>
               	    <p>We welcome Volunteers of all ages, including children over the age of thirteen. However, we strongly encourage our volunteers aged less than eighteen years to use our Services only with parental consent and supervision.</p>
               </div>
               <div class="cookies-analytics">
               	    <div class="cookies-analytics-logo">
               	    	<img src="images/p10.png">
               	    </div>
               	    <p>Cookies are tiny data files that web sites commonly write to your hard drive when you visit them so that they can remember you when you visit. A cookie file contains information that can identify you anonymously and maintain your account's privacy. Our Service uses cookies to maintain a user's identity between sessions so that the site can be personalized based on user preferences or a user's history. We may use information collected using third party cookies (for example, Google AdSense and DoubleClick) and Web beacons on our Services to deliver Sharethelove.co.in advertising displayed to you on third party sites. We also use cookie information to know when you return to our Site after visiting these third party sites. We also use analytics services (Such as Google Analytics, Optimizely, ClickTale, New Relic, and others) to help analyze how users use the Services. These analytics services use cookies to collect and store information such as how often users visit the Services, what pages they visit, and what other sites they used prior to coming to the Services. We also use the information from these analytics services to improve our Services and to provide reporting to our Partners regarding site activity and utilization. Please see the following links for more information about Google Analytics, DoubleClick, and Google AdSense:http://www.google.com/policies/technologies/ads/ and http://www.google.com/policies/privacy/.</p><br>
               	    <p>You can set your web browser to prompt you before you accept a cookie, accept cookies automatically or reject all cookies. However, if you choose not to accept cookies from this web site, then you may not be able to access and use all or part of this web site or benefit from the information and services which it offers.</p>
               </div>
               <div class="web-beacons">
                    <div class="web-beacons-logo">
                        <img src="images/p11.png">
                    </div>
               	    <p>
               	    	Pages on the Services and emails that Sharethelove.co.in sends to you may contain small image files called web beacons. Web beacons are used as a mechanism to help us track your visits to our site and whether or not you open our emails. In addition, we use several third-party services that embed web beacons on our site for similar tracking purposes. These third-party services are used to provide additional features to users, such as the ability to share content on our site with your social network.
               	    </p>
               </div>
               <div class="links">
                    <div class="links-logo">
                    	<img src="images/p12.png">
                    </div>
               	    <p>The Services contains links to other third-party sites. Sharethelove.co.in is not responsible for the privacy practices or the content of such third-party sites.</p>
               </div>
               <div class="review-information">
               	    <div class="review-information-logo">
               	    	<img src="images/p13.png">
               	    </div>
               	    <p>If you are a nonprofit member or volunteer with a personal Sharethelove.co.in account (either through our mobile application, http://www.sharethelove.co.in./, or a Partner's Web site) you may review and make changes to all of your Information that we collect and maintain online by simply inputting your username and password where indicated on the applicable Service.</p><br>
               	    <p>If you are a volunteer with a personal Sharethelove.co.in account, once you login in, you may make any changes or correct factual errors in your account by changing the information on your login page. This option is available to better safeguard your Information, subject to downtime for standard maintenance and support. You do not need to contact us to access your record or to make any changes. If you have problems changing your Information, please contact Community Services at support@sharethelove.co.in.</p><br>
               	    <p>If you are an Agency administrator, you may make any changes or correct factual errors in your administrator, organization and opportunity information. We use this procedure to better safeguard your Information. You do not need to contact us to access your record or to make any changes. If you have problems changing your Agency's Information, please contact Community Services at support@sharethelove.co.in.</p><br>
               	    <p>If you are a nonprofit member or volunteer with an account and would like to have your Information deleted from the site, you may contact Community Services at support@sharethelove.co.in.</p>
               </div>
               <div class="newsletter-communication">
               	    <div class="newsletter-communication-logo">
               	         <img src="images/p14.png">	
               	    </div>
               	    <p>Subscriptions to Sharethelove.co.in newsletters and Opportunity Alerts are optional and Sharethelove.co.in allows Agencies, volunteers, subscribers or other users to unsubscribe from these newsletters and alerts at any time. In each newsletter we provide instructions regarding how to opt-out from receiving future newsletter mailings. You can change your alert settings by visiting the Opportunity Alert section of the Services. You can also email us atsupport@sharethelove.co.in. to remove your name from our newsletter subscription data base and ensure that you will cease receiving future newsletters from us.</p><br>
               	    <p>We may also use our email lists for sending out other non-promotional Sharethelove.co.in outbound communications such as product enhancements, tool upgrades, or service availability. Registered members are required to receive these communications.</p><br>
               	    <p>When you visit our Services, we and others give you the following choices about use of mechanisms for tracking, including tracking of your online activities over time and across different websites and online services by third parties. Many Web browsers are set to accept cookies by default. If you prefer, you can usually choose to set your browser to remove cookies and to reject cookies from Sharethelove.co.in and other parties. If you choose to remove cookies or reject cookies, this could affect certain features of our Services. You can choose to opt-out of use of cookies by certain third-party analytics providers and advertising networks to deliver ads tailored to your profile and preferences. Many such third parties are a part of the DND Registry. If you delete your cookies, use a different browser, or buy a new computer, you will need to renew your opt-out choice. While we and others give you choices described in this Privacy Policy, there are many ways Web browser signals and other similar mechanisms can indicate your choice to disable tracking, and we may not be aware of or honor every mechanism.</p>
               </div>
               <div class="commitment-security">
               	     <div class="commitment-security-logo">
               	     	<img src="images/p15.png">
               	     </div>
               	     <p>To prevent unauthorized access, maintain data accuracy, and ensure the correct use of Information, we have put in place reasonable physical, electronic, and managerial procedures in an effort to safeguard and secure the Information we collect online. If you have any questions about our data security or data retention practices, please email us at support@sharethelove.co.in and we will work to provide you with the answers you require.</p>
               </div>
               <div class="change-policy">
               	     <div class="change-policy-logo">
               	     	<img src="images/p16.png">
               	     </div>
               	     <p>This Privacy Policy is subject to occasional revision. If we make any changes to this Privacy Policy, we will change the "Last Updated" date above.</p>
               </div>
               <div class="contact-us">
               	    <div class="contact-us-logo">
               	     	<img src="images/p17.png">
               	    </div>
               	    <p>We appreciate your questions or comments about this privacy statement, the practices of the Services, or your dealings with Sharethelove.co.in. We also want to work carefully with you to resolve any disputes or issues you might have. Please send email to support@sharethelove.co.in.org</p>
               	    <p>Effective Date: 15 January 2016</p>
               </div>
		   </div>
	   </div>
   </section>
   </div>
   <?php  
     include('../footer.php');
   ?>
   <!-- <footer>
       <div class="ft-main">
         <div class="ft-left">
            <p class="footer"> &copy; Detour Ventures <br>All rights reserved</p>
         </div> 
         <div class="footer-right">
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