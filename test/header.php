<header class="top">
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
        <?php if(!isset($_SESSION['userid'])) { ?>
          <li><a href="#">ABOUT</a></li>
          <li><a href="../blog">BLOG</a></li>
        <?php } else { ?>
          <li><a href="../home.php">HOME</a></li>
        <?php } ?>
      </ul>
    </div>
    
      <?php if(!isset($_SESSION['userid'])) { ?>
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
      <?php } else { ?>
        <div class="pull-right-logoutbtn">
          <a id="logout-trigger" href="#"><img src="../images/settings-button.png" /></a>
          <ul>
            <li><a href="#" >ACCOUNT SETTINGS</a></li>
            <li><a href="../About us/about us.php" >SUPPORT US</a></li>
            <li><a href="../About us/about us.php" >ABOUT</a></li>
            <li><a href="../logout.php">LOGOUT</a></li>
          </ul>
        </div>
      <?php } ?>
    
  </div>
</header>