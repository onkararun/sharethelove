<?php 
session_start();
include('connect_base.php');
include('functions.php');
?>
<!Doctype html>
<html>
<head>
   <title>T&C</title>	
   <link type="text/css" rel="stylesheet" href="css/T&C.css"/>
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
			   <div class="term-service">
			       
			       <div class=" trm-srvice-logo">
			          <img class="center" src="images/share.png">
			       </div>
             <div class="inner-text">
               <p class="txt1">Last Updated: 11 January, 2016</p>
  			       <p class="txt1">sharethelove.co.in ("sharethelove.co.in," "we," or "us") provides the sharethelove.co.in site available at http://www.sharethelove.co.in ("Site") and associated mobile application ("App"). The Site and App offers the services, including but not limited to the sharethelove.co.in online volunteer matching service and various syndication services, and other information and services related thereto (collectively, the "Services") to our users, whether they be nonprofit organizations, volunteers, readers of our newsletters, alerts, and/or blog, registered sharethelove.co.in members, or other visitors to the Site. "You" means the individual person entering the Terms on his or her own behalf; or, if the Terms is being entered on behalf of an organization, such as an employer, "you" means the organization on whose behalf which this Agreement is entered, and in the latter case, the person entering this Agreement represents and warrants that he or she has the authority to do so on your behalf.</p>
                 <p class="txt1"> These sharethelove.co.in Terms of Service and Use set forth the legally binding terms of your access to and use of the Site, App, and Services (the "Terms").</p>
                 <p class="txt1"> Please read the Terms carefully. You understand and agree that these terms set forth the legally binding terms and conditions for your use of the Site, App, and Services, and the Site, App, and Services are made available and provided to you under these Terms. By visiting, using or accessing Site, App, and/or the Services, you agree to comply with and be bound by the Terms. If you do not agree with these Terms, you should leave the Site and discontinue use of the Site, App, and Services immediately. If you wish to register as a sharethelove.co.in member to make use of the Services reserved for members, you must read these Terms and indicate your acceptance during the registration process. Note, however, that these Terms apply to your access to and use of the Site, App, and Services regardless of whether you register an account as a sharethelove.co.in member. We reserve the right to terminate your use or access to the Services at any time for any reason, including, without limitation, if we learn that you have provided false or misleading information or have violated the Terms.
                  </p>
                </div>
               </div>
               <div class="sh-loveuseract">
               	    <div class="sh-useract-logo">
               	        <img src="images/2.png">
               	    </div>
                     <div class="inner-text">
                      <p>Registering. Depending on what Services you desire to receive, you may need to register and become a sharethelove.co.in member. You will find registration instructions on the Site.</p>
                      <p> Eligibility. By registering as a sharethelove.co.in member, you represent that: (a) all registration information you submit is truthful and accurate; (b) you will maintain the accuracy of such information; and (c) your use of the Services does not violate any applicable law or regulation. Your member profile may be deleted or suspended without warning if we have reason to believe that you do not meet eligibility requirements.</p>
                     <p> Email address and Password. If you sign up to become a sharethelove.co.in member either to post volunteer opportunities or to search volunteer opportunities, you will also be asked to choose an email address and password for your sharethelove.co.in profile. You are solely responsible for maintaining the confidentiality of your password and all use of your sharethelove.co.in email address, password, and profile. You agree not to use the sharethelove.co.in profile, email address, or password of another sharethelove.co.in member at any time unless expressly authorized by such sharethelove.co.in member. You agree to notify us immediately if you suspect any unauthorized use of your sharethelove.co.in profile or access to your password.</p>
                     <p> Fees. If you are posting volunteer opportunities on the Site, you acknowledge that we reserve the right to charge for the Services and to change the fees from time to time in our discretion, upon notice to you at the then-current e-mail address stored in your sharethelove.co.in profile. Upon using the Services to post volunteer opportunities, you will be responsible for the payment of any applicable fees, and shall pay such fees to us.</p>
                      <p>Term. This Agreement shall remain in full force and effect while you use the Site, App, and/or Services, or are a sharethelove.co.in member. You may terminate your sharethelove.co.in membership at any time, for any reason, by sending an email to support@sharethelove.co.in. We may terminate or suspend your membership for any reason in our sole discretion, effective immediately upon sending notice to you at the primary e-mail address you have stored in your Sharethelove.co.in profile.</p>
                      <p>Access to the Site, App, and Services is made available for your personal, internal, non-commercial use. You may not frame the Site or Services, or make available, or facilitate distribution of the Site, Services, App, or Content (as defined below) through any means or medium unless otherwise expressly approved in writing by Sharethelove.co.in.
                    </p>
                 </div>   
               </div>
                <div class="your-responsibility">
                   <div class="yr-responsiblty-logo">
                        <img src="images/1.png">
                   </div>
                     <div class="inner-text">
                   <p>You must not use the Site, App, or Services to: (a) violate any local, state, national or international law or regulation; (b) violate any third-party right, including any intellectual property or privacy right; (c) stalk, harass, threaten, or harm another individual; (d) collect or store personal data about other users without their express consent; (e) impersonate any person or entity, or otherwise misrepresent your affiliation with a person or entity (including a non-profit organization or Sharethelove.co.in); or (f) interfere with or disrupt the Services or servers or networks connected to the Services, or disobey any requirements, procedures, policies or regulations of networks connected to the Services, through the use of automated software or otherwise. You must not reproduce, duplicate, copy, sell, resell or exploit for any commercial purposes, any portion of the Content, Site, or Services, use of the Content, Site, App, or Services, or access to the Content, Site, App, or Services. You may not modify, make derivative works of, disassemble, reverse compile or reverse engineer any part of the Site, App, or Services or access the Site, App, or Services in order to build a similar or competitive service. You may not introduce software or automated agents to the Site, App, or Services so as to produce multiple accounts, generate automated searches, requests, and/or queries, or to strip, scrape, or mine data from the Site, App, or Services. Without our prior written consent, you may not (a) allow, enable, or otherwise support the transmission of mass unsolicited, commercial advertising or solicitations via e-mail (spam); (b) use any high volume, automated, or electronic means (including without limitation robots, spiders, scripts or other automatic device) to access the Services or monitor or copy our web pages or the content contained thereon; or (c) frame the Site, place pop-up windows over its pages, or otherwise affect the display of its pages. All information that you provide to us will be true, accurate and current.</p>
                </div>
               </div>
               <div class="modification-term">
               	   <div class="modificationtrm-logo">
               	   	   <img src="images/3.png">
               	   </div>
                    <div class="inner-text">
               	   <p> We may change the Terms or the sharethelove.co.in Privacy Policy, from time to time. We will notify you of any such changes via e-mail or by posting notice to the Site and/or App. You agree that such amended Terms will be effective 30 days after the notice is sent to you or posted on the Site and/or App, and your continued access to the Site or App or use of the Services after that time shall constitute your acceptance of the amended Agreement. You are responsible for providing us with your most current e-mail address. In the event that the last e-mail address you have provided us is not valid, or for any reason is not capable of delivering to you the notice described above, our dispatch of the e-mail containing such notice will nonetheless constitute effective notice of the changes described in the notice. These changes will be effective immediately for new users of our Site, App, or Services. If you object to any such changes, your sole and exclusive remedy shall be to terminate your membership by sending an email tosupport@sharethelove.co.in. In addition, certain areas of the Services may be subject to additional terms of use. By using such areas, or any part thereof, you agree to be bound by the additional terms of use applicable to such areas. In the event that any of the additional terms of use governing such areas conflict with these Terms, these Terms shall control. Any future release, update, or other addition to functionality of the Site, App, or Services shall be subject to these Terms.</p>
                 </div>
               </div>
               <div class="syndication-services">
               	  <div class="syndication-srvice-logo">
               	  	   <img src="images/4.png">
               	  </div>
                    <div class="inner-text">
               	     <p>Some of the Services offered via the Site and/or App involve the distribution or syndication of sharethelove.co.in Content via downloadable widgets (including without limitation the "Site Syndication" or "Search Lite" widget), client applications, RSS, or other technologies that allow the distribution or syndication of content authorized by sharethelove.co.in ("Syndication Services"). Some of the Syndication Services may be subject to separate or additional terms and conditions ("Additional Terms"). In the event that no Additional Terms apply to particular Syndication Services which you receive, the terms of this Section 4 apply to your use of the Syndication Services. sharethelove.co.in grants you a non-exclusive, non-transferable, revocable, limited, non-sublicenseable license to (i) access and use the Syndication Services, (ii) download and install any software provided by sharethelove.co.in to you that is required to use the Syndication Services as contemplated by sharethelove.co.in ("Code"), and (iii) view the Content that sharethelove.co.in delivers to you via the Syndication Services, in each of the foregoing cases, solely for your personal, internal, non-commercial use of viewing or making available for viewing Content on a website owned or controlled by you. All rights not expressly granted by sharethelove.co.in to you are reserved.</p><br> 
                       <p>You acknowledge that the Code and its structure, organization and source code may constitute valuable trade secrets of sharethelove.co.in and its suppliers. Except as expressly allowed under Section 5 or otherwise in writing by sharethelove.co.in, you must not (a) modify, adapt, alter, translate, or create derivative works from the Code or the Content; or (b) sublicense, distribute, sell, use for service bureau use, lease, rent, loan or otherwise transfer the Code or Content to any third party.</p>
                  </div>        
               </div>
               <div class="modification-service">
               	    <div class="modification-srvice-logo">
               	    	<img src="images/5.png">
               	    </div>
                       <div class="inner-text">
               	         <p>We reserve the right to modify or discontinue the Site, App, or Services with or without notice to you. We shall not be liable to you or any third party should we exercise our right to modify or discontinue the Site, App, or Services. If you object to any such changes, your sole recourse shall be to cease using the Site, App, and/or Services. Continued use of the Site, App, and/or Services following notice of any such changes shall indicate your acknowledgement of such changes and satisfaction with the Site, App, and/or Services as so modified.</p>
                     </div>
               </div>
               <div class="privacy">
               	    <div class="privacy-logo">
               	    	<img src="images/6.png">
               	    </div>
                       <div class="inner-text">
               	         <p>The collection, use, and disclosure of your personal information is described in our Privacy Policy available athttps://www.sharethelove.co.in/legal/privacy.jsp</p>
                     </div>     
               </div>
               <div class="third-prtycnt-monitoring">
                    <div class="thrd-party-logo">
                        <img src="images/7.png">
                    </div>
                       <div class="inner-text">
               	         <p>We are a distributor and publisher of content supplied by users of the Services and by other third parties ("Content"). Accordingly, we have no editorial control over such Content. Any services, offers, or other information expressed or made available by third parties as part of the Content, including information provided by other users of the Services, are those of the respective author(s) or distributor(s) of that information and not of us. We neither endorse nor are responsible for the accuracy or reliability of any Content, or opinion, advice, information, or statement made on the Services by anyone. We have the right, but not the obligation, to monitor and review the Content on the Services and your account to determine compliance with these Terms and any other operating rules established by us, to satisfy any law, regulation or authorized government request, or for other purposes. You understand and acknowledge that we do not monitor Content for accuracy or reliability.
               	        </p>
                     </div>   
               </div>
               <div class="contens">
                    <div class="contents-logo">
                    	<img src="images/8.png">
                    </div>
                      <div class="inner-text">
               	        <p>You are solely responsible for any information, comments, feedback, data, materials, photos or other content of any type or description that you provide or make available to us through or to the Site, App, or Services, including any data entry forms found through the Site ("Your Content"), and we act as a passive conduit for the distribution and publication of Your Content. However, we reserve the right to remove Your Content if we believe Your Content violates these Terms or may otherwise create liability for us. You represent and warrant that Your Content (a) does not infringe on any third party's copyright, patent, trademark, trade secret or other proprietary rights or rights of publicity or privacy; (b) does not violate any law, statute, ordinance or regulation, including without limitation the laws and regulations governing export control; (c) is not defamatory or trade libelous; (d) is not pornographic or obscene; (e) does not violate any laws regarding unfair competition, anti-discrimination or false advertising; and (f) does not contain viruses, trojan horses, worms, time bombs, cancelbots, spyware, or other similar harmful or deleterious programming routines. You hereby grant to us a worldwide, perpetual, irrevocable and royalty-free license, sublicensable through multiple tiers of sublicensees, to use, reproduce, modify, distribute, display, perform, and create derivative works from Your Content in any media or through any means now known or not currently known for the purposes of providing and maintaining the Services. You acknowledge that some of Your Content will be publicly available for other users of the Site, App, or Services to view, such as feedback and comments. You acknowledge and agree that you are solely responsible for Your Content.</p>
                       <p> Without limiting the foregoing, if you believe that your work has been copied and posted on the Site, App, or Services in a way that constitutes copyright infringement, please provide our Designated Copyright Agent with the following information: (i) an electronic or physical signature of the person authorized to act on behalf of the owner of the copyright interest; (ii) a description of the copyrighted work that you claim has been infringed and an identification of the material on the Site, App, or Services that you claim is infringing; (iii) a description of where the material that you claim is infringing is located on the Site, App, or Services; (iv) your address, telephone number, and email address; (v) a written statement by you that you have a good faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law; (vi) a statement by you, made under penalty of perjury, that the above information in your notice is accurate and that you are the copyright owner or authorized to act on the copyright owner's behalf. In connection with our Site, App, and Services, we have adopted and implemented a policy respecting copyright law that provides for the removal of any infringing materials and for the termination, in appropriate circumstances, of users of our Services who are repeat infringers of intellectual property rights. sharethelove.co.in’s Agent for notice of claims of copyright infringement can be reached as follows: Copyright Agent, sharethelove.co.in, _________________________________; Attn: Copyright Agent; and email:copyrightagent@sharethelove.co.in. Please note that, pursuant to the Indian Laws, any misrepresentation of material fact in a written notification automatically subjects the complaining party to liability for any damages, costs, and legal fees incurred by us in connection with the written notification and allegation of copyright infringement.
                      </p>
                   </div>   
               </div>
               <div class="intellectual-property">
               	    <div class="intellectual-property-logo">
               	    	<img src="images/9.png">
               	    </div>
                         <div class="inner-text">
               	            <p>You acknowledge that sharethelove.co.in and its suppliers owns all right, title and interest in and to the Services, including without limitation, the Site, App, and Content (excluding Your Content), and all underlying software and technology, including without limitation all Intellectual Property Rights. The provision of the Site, App, and Services does not transfer to you or any third party any rights, title, or interest in or to such Intellectual Property Rights. sharethelove.co.in and its suppliers reserve all rights not granted in these Terms. If you provide sharethelove.co.in with any feedback or suggestions regarding the Site, App, or Services ("Feedback"), you hereby grant sharethelove.co.in an unlimited, worldwide, royalty-free, and irrevocable license to use, distribute, creative derivative works of, or otherwise exploit such Feedback in any manner. "Intellectual Property Rights" means any and all rights existing from time to time under patent law, copyright law, trade secret law, trademark law, unfair competition law, and any and all other proprietary rights, and any and all applications, renewals, extensions and restorations thereof, now or hereafter in force and effect worldwide.</p>
                  </div>     
               </div>
               <div class="responsiblitydeal-thrdparty">
               	    <div class="resposideal-thrdprty-logo">
               	         <img src="images/10.png">	
               	    </div>
                       <div class="inner-text">
               	          <p>If you are using the Services to find volunteer opportunities, your correspondence and/or ensuing relationship with nonprofit and public service organizations, volunteers, partners, advertisers, sponsors or other third parties found on or through the Services ("Volunteer Organization"), including posting or acceptance of volunteer opportunities, and any other terms or conditions associated with such dealings, are solely between you and the Volunteer Organization you choose to deal with. YOU AGREE THAT SHARETHELOVE.CO.IN WILL NOT BE RESPONSIBLE OR LIABLE FOR ANY LOSS, COST, DAMAGE, OR OTHER LIABILITY OF ANY SORT INCURRED AS THE RESULT OF ANY SUCH DEALINGS, OR AS THE RESULT OF THE PRESENCE OF SUCH PARTIES ON THE SERVICES AND YOU HEREBY IRREVOCABLY WAIVE ANY CLAIMS AGAINST SHARETHELOVE.CO.IN ARISING FROM OR RELATED TO YOUR RELATIONSHIP WITH A VOLUNTEER ORGANIZATION.</p>
               	              <p>If you are using the Services to find volunteers to fill volunteer opportunities, your correspondence or ensuing relationship with the volunteers found on or through the Services, including posting volunteer opportunities, and any other terms or conditions associates with such dealings, are solely between you and the volunteer. YOU AGREE THAT SHARETHELOVE.CO.IN WILL NOT BE RESPONSIBLE OR LIABLE FOR ANY LOSS, COST, DAMAGE, OR OTHER LIABILITY OF ANY SORT INCURRED AS THE RESULT OF ANY SUCH DEALINGS, OR AS THE RESULT OF THE PRESENCE OF SUCH PARTIES ON THE SERVICES AND YOU HEREBY IRREVOCABLY WAIVE ANY CLAIMS AGAINST SHARETHELOVE.CO.IN ARISING FROM OR RELATED TO YOUR RELATIONSHIP WITH A VOLUNTEER.</p> 
               	               <p>Release. You hereby release us, our officers, employees, agents and successors from claims, demands any and all losses, damages, rights, claims, and actions of any kind including, without limitation, personal injuries, death, and property damage, that is either directly or indirectly related to or arises from (i) any interactions with other sharethelove.co.in users (including volunteer opportunities), or (ii) your participation in any volunteer activities or activities arising from or related to your use of the Services.</p>
                    </div>           
               </div>
               <div class="links">
               	     <div class="links-logo">
               	     	<img src="images/Untitled-15.png">
               	     </div>
                        <div class="inner-text">
               	          <p>Our provision of a link to any other site or location is for your convenience and does not signify our endorsement of such other site or location or its contents. We have no control over, do not review, and cannot be responsible for, these outside sites or their content. We encourage you to review the terms of use and privacy policies for any such third party links you visit on the Site, App, or Services. WE WILL NOT BE LIABLE FOR ANY INFORMATION, SOFTWARE, OR LINKS FOUND AT ANY OTHER WEBSITE, INTERNET LOCATION, OR SOURCE OF INFORMATION, OR FOR YOUR USE OF SUCH INFORMATION.</p>
                   </div>    
               </div>
               <div class="termination">
               	     <div class="termination-logo">
               	     	<img src="images/12.png">
               	     </div>
                        <div class="inner-text">
               	           <p>You agree that we, in our sole discretion, may terminate your sharethelove.co.in membership or other use of the Site, App, or Services without prior notice, and remove and discard Your Content from the Site, for any reason and without prior notice, including, without limitation, if we believe that you have violated or acted inconsistently with the letter or spirit of the Terms. FURTHER, YOU AGREE THAT WE SHALL NOT BE LIABLE TO YOU OR ANY OTHER PARTY FOR ANY TERMINATION OF YOUR ACCESS TO THE SERVICES. You may discontinue your participation in and access to the Services at any time by emailing support@sharethelove.co.in.</p>
                      </div>     
               </div>
               <div class="disclaimer-warranties">
               	    <div class="disclaimer-warrnties-logo">
               	     	<img src="images/13.png">
               	    </div>
                         <div class="inner-text">
               	           <p>YOU EXPRESSLY AGREE THAT USE OF THE SITE, APP, AND SERVICES IS AT YOUR SOLE RISK. THE SERVICES, APP, AND SITE ARE ALL PROVIDED ON AN "AS IS" AND "AS AVAILABLE" BASIS. SHARETHELOVE.CO.IN EXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS, IMPLIED, OR STATUTORY, INCLUDING, BUT NOT LIMITED TO THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR USE OR PURPOSE, ACCURACY, AND NON-INFRINGEMENT. SHARETHELOVE.CO.IN MAKES NO WARRANTY THAT THE SERVICES, APP, OR SITE WILL MEET YOUR REQUIREMENTS, OR THAT THE SERVICES, APP, OR SITE WILL BE UNINTERRUPTED, TIMELY, SECURE, OR ERROR FREE; NOR DOES SHARETHELOVE.CO.IN MAKE ANY WARRANTY AS TO THE RESULTS THAT MAY BE OBTAINED FROM THE USE OF THE SERVICES, APP, OR SITE OR AS TO THE ACCURACY OR RELIABILITY OF ANY INFORMATION OBTAINED THROUGH THE SERVICES, APP, OR SITE, OR THAT DEFECTS IN THE SERVICES, APP, OR SITE WILL BE CORRECTED. YOU UNDERSTAND AND AGREE THAT ANY MATERIAL AND/OR INFORMATION DOWNLOADED OR OTHERWISE OBTAINED THROUGH THE USE OF THE SERVICES, APP, OR SITE IS DONE AT YOUR OWN DISCRETION AND RISK AND THAT YOU WILL BE SOLELY RESPONSIBLE FOR ANY DAMAGE TO YOUR COMPUTER SERVICES OR LOSS OF DATA THAT RESULTS FROM THE DOWNLOAD OF SUCH MATERIAL AND/OR INFORMATION.</p>
                            <p> SHARETHELOVE.CO.IN MAKES NO WARRANTY REGARDING ANY DEALINGS WITH OR TRANSACTIONS ENTERED INTO WITH ANY OTHER PARTIES (INCLUDING VOLUNTEER OPPORTUNITIES) THROUGH THE SERVICES, APP, OR SITE. THE ENTIRE RISK AS TO SATISFACTORY QUALITY, PERFORMANCE, ACCURACY, EFFORT AND RESULTS TO BE OBTAINED THROUGH THE USE OF THE SITE, APP, OR THE SERVICES IS WITH YOU. NO ADVICE OR INFORMATION, WHETHER ORAL OR WRITTEN, OBTAINED BY YOU FROM SHARETHELOVE.CO.IN OR THROUGH THE SERVICES SHALL CREATE ANY WARRANTY NOT EXPRESSLY MADE HEREIN.</p>
                       </div>     
                  </div>
                    <div class="limitatin-liabilities">
                    <div class="limitation-liabilities-logo">
                      <img src="images/14.png">
                    </div>
                         <div class="inner-text">
                           <p>YOU UNDERSTAND THAT TO THE EXTENT PERMITTED UNDER APPLICABLE LAW, IN NO EVENT WILL SHARETHELOVE.CO.IN OR ITS OFFICERS, EMPLOYEES, DIRECTORS, PARENTS, SUBSIDIARIES, AFFILIATES, AGENTS OR LICENSORS BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, PUNITIVE, OR EXEMPLARY DAMAGES, INCLUDING BUT NOT LIMITED TO, DAMAGES FOR LOSS OF REVENUES, PROFITS, GOODWILL, USE, DATA OR OTHER INTANGIBLE LOSSES (EVEN IF SUCH PARTIES WERE ADVISED OF, KNEW OF OR SHOULD HAVE KNOWN OF THE POSSIBILITY OF SUCH DAMAGES, AND NOTWITHSTANDING THE FAILURE OF ESSENTIAL PURPOSE OF ANY LIMITED REMEDY), ARISING OUT OF OR RELATED TO YOUR USE OF THE SITE, APP, OR THE SERVICES, REGARDLESS OF WHETHER SUCH DAMAGES ARE BASED ON CONTRACT, TORT (INCLUDING NEGLIGENCE AND STRICT LIABILITY), WARRANTY, STATUTE, OR OTHERWISE. IF YOU ARE DISSATISFIED WITH ANY PORTION OF THIS SITE, YOUR SOLE AND EXCLUSIVE REMEDY IS TO DISCONTINUE USE OF THE SITE. The aggregate liability of sharethelove.co.in to you for all claims arising from or related to the Site, APP, or the Services OR THESE TERMS is limited to Rupees One-thousand (Rs. 1000).</p>
                         </div>  
                    </div>
                    <div class="exclusion-limitations">
                    <div class="exclusion-limitations-logo">
                      <img src="images/15.png">
                    </div>
                        <div class="inner-text">
                          <p>Some jurisdictions do not allow the exclusion of certain warranties or the limitation or exclusion of liability for incidental or consequential damages. Accordingly, some of the above limitations and disclaimers may not apply to you. To the extent that we may not, as a matter of applicable law, disclaim any implied warranty or limit its liabilities, the scope and duration of such warranty and the extent of our liability shall be the minimum permitted under such applicable law.</p>
                        </div>  
                    </div>
                    <div class="indemnification">
                    <div class="indemnification-logo">
                      <img src="images/16.png">
                    </div>
                         <div class="inner-text">
                            <p>You agree to indemnify, defend and hold harmless sharethelove.co.in, its parents, subsidiaries, affiliates, officers, proprietors, co-branders and other partners (including third-party partners to whom Sharethelove.co.in may provide Your Content ("Third Parties")), employees, consultants and agents, from and against any and all claims, liabilities, damages, losses, costs, expenses, fees (including reasonable attorneys' fees and court costs) that sharethelove.co.in or Third Parties may incur as a result of or arising from (1) Your Content and any information you (or anyone accessing the Services using your password) submit, post or transmit through the Services, (2) your (or access to the Services as you) violation of these Terms or applicable law or regulation, (3) your (or anyone using your account's) violation of any rights of any other person or entity (including, but not limited to, third party privacy rights), or (4) any information or content we collect from third parties through the Site or Service at your request, or (5) any viruses, trojan horses, worms, time bombs, cancelbots, spyware or other similar harmful or deleterious programming routines input by you into the Services.</p>
                         </div>   
                    </div>
                    <div class="trademarks">
                    <div class="trademarks-logo">
                      <img src="images/17.png">
                    </div>
                        <div class="inner-text">
                          <p>Certain of the names, logos, and other materials displayed in the Services constitute trademarks, tradenames, service marks or logos ("Marks") of us or other entities. You are not authorized to use any such Marks. Ownership of all such Marks and the goodwill associated therewith remains with us or those other entities.</p>
                        </div>  
                    </div>
                    <div class="copyrights">
                    <div class="copyrights-logo">
                      <img src="images/18.png">
                    </div>
                        <div class="inner-text">
                          <p>The content made available to you through the Services, other than Your Content, including without limitation, text, databases, software, code, music, sound, photos, and graphics ("Our Content"), is (1) copyrighted by sharethelove.co.in and/or its licensors under India and international copyright laws, (2) subject to other intellectual property and proprietary rights and laws, and (3) owned by sharethelove.co.in or its licensors. Our Content, and Content (except Your Content), may not be copied, modified, reproduced, republished, posted, transmitted, sold, offered for sale, publicly performed, publicly displayed, or redistributed in any way without our prior written permission or the prior written permission of our applicable licensors, with the sole exception that one copy may be downloaded onto a single computer for (a) your personal, noncommercial use if you are a volunteer or (b) your archival purposes, if you are a nonprofit or public service organization. You must abide by all copyright notices, information, or restrictions contained in or attached to any of Content.</p>
                        </div>  
                    </div>
                    <div class="miscellaneous">
                    <div class="miscellaneous-logo">
                      <img src="images/19.png">
                    </div>
                        <div class="inner-text">
                          <p>The Terms constitute the entire and exclusive and final statement of the agreement between you and us with respect to the subject matter hereof, and govern your use of the Services, superseding any prior agreements or negotiations between you and us with respect to the subject matter hereof. The Terms and the relationship between you and sharethelove.co.in shall be governed by the laws of the Republic of India, without giving effect to any choice of laws or principles that would require the application of the laws of a different country or state. Any legal action, suit or proceeding arising out of or relating to the Terms, or your use of, the Services must be instituted exclusively in the courts located in India and in no other jurisdiction. You further consent to personal jurisdiction and venue in, and agree to service of process issued or authorized by, any such court. Our failure to exercise or enforce any right or provision of the Terms shall not constitute a waiver of such right or provision. If any provision of the Terms is found by a court of competent jurisdiction to be invalid, the parties nevertheless agree that the court should endeavor to give effect to the parties' intentions as reflected in the provision, and that the other provisions of the Terms remain in full force and effect. You agree that regardless of any statute or law to the contrary, any claim or cause of action arising out of or related to use of the Services or the Terms must be filed within one (1) year after such claim or cause of action arose or be forever barred. The section titles in the Terms are for convenience only and have no legal or contractual effect. This Agreement cannot be transferred or assigned by you without sharethelove.co.in's prior written consent. The terms of this Agreement can only be modified as set forth in Section 3 or upon sharethelove.co.in's written agreement.</p>
                        </div>  
                    </div>
                    <div class="survival">
                    <div class="survival-logo">
                      <img src="images/20.png">
                    </div>
                          <div class="inner-text">
                            <p>The terms of Sections 5 through 21 as well as any other limitations on liability explicitly set forth herein shall survive the expiration or earlier termination of the Terms for any reason. Our (and our licensors') proprietary rights (including any and all Intellectual Property Rights) in and to Our Content and the Services shall survive the expiration or earlier termination of the Terms for any reason.</p>
                        </div>    
                    </div>
                    <div class="violation">
                    <div class="violation-logo">
                      <img src="images/21.png">
                    </div>
                      <div class="inner-text">
                        <p>Please report any violations of the Terms to support@sharethelove.co.in<br></p>
                       <p>  Effective Date: 15 January, 2016</p>
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
            <p class="txt"> &copy; Detour Ventures <br>All rights reserved</p>
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