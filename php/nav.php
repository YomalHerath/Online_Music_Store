                     <?php 
                     session_start();
                     error_reporting(0);
                    
					if(empty($_SESSION['id'])){
                     ?>
					
                    <button class="button" onClick="location.href='http://localhost/oms/src/login.html'">Login</button>
                    <button class="button" onClick="location.href='http://localhost/oms/src/register.html'">Sign Up</button> 
                    
					<?php 
                    }else{
                     ?>
                    
                    <button class="button" onClick="location.href='http://localhost/oms/php/signout.php'">Logout</button>
                    <button class="button" onClick="location.href='http://localhost/oms/src/account.html'">Profile</button>
                    
					<?php } ?>