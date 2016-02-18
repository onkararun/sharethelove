<footer>
       <div class="ft-main">
         <div class="ft-left">
            <p class="txt"> &copy; Detour Ventures <br>All rights reserved</p>
         </div> 
         <div class="footer-right">
          <ul class="footer-nav">
            <?php if(!isset($_SESSION['userid'])) { ?>
               <li><a href="../index.php">Home</a>|</li>
               <li><a href="../About us/about us.php">About</a>|</li>
               <li><a href="../legal_information/legal_information.php">Legal Information</a>|</li>
               <li><a href="../PP/PP.php">Privacy Policy</a>|</li>
               <li><a href="../T&C/T&C.php">T&C</a></li>  
            <?php } else { ?>
               <li><a href="../home.php">Home</a>|</li>
               <li><a href="../About us/about us.php">About</a>|</li>
               <li><a href="../legal_information/legal_information.php">Legal Information</a>|</li>
               <li><a href="../PP/PP.php">Privacy Policy</a>|</li>
               <li><a href="../T&C/T&C.php">T&C</a></li>   
             <?php } ?>
          </ul>
        </div>
       </div>
   </footer>