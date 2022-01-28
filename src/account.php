<!DOCTYPE html>
<html>
    <head>
        <title>Account - Online Music Store</title>
        <link rel="stylesheet" type="text/css" href="../styles/general.css"/>
        <link rel="stylesheet" type="text/css" href="../styles/account.css"/>
    </head>
    <body>
        <header>
            <img src="../images/logo.png" alt="Logo" id="logo" align="left"/>
            <h1 id="siteheader">Online Music Store</h1>
            <h3 id="sitedesc">Download and stream digital music</h3>
            <div align="right" style="margin-bottom: 5px;">
                    <?php include '../php/nav.php';?>
            </div>
        </header>
        <ul id="navbar">
            <li class="navbutton"><a href="../index.php" class="navbutton">Home</a></li>
            <li class="navbutton"><a href="genres.html" class="navbutton">Genres</a></li>
            <li class="navbutton"><a href="artists.html" class="navbutton">Artists</a></li>
            <li class="navbutton"><a href="albums.html" class="navbutton">Albums</a></li>
            <li class="navbutton"><a href="contactus.html" class="navbutton">Contact Us</a></li>
            <li class="navbutton"><a href="aboutus.html" class="navbutton">About Us</a></li>
            <a href="">
                <img src="../images/cart.png" alt="Cart" height="36" width="36" id="cart" align="right"/>
            </a>
            <div align="right"><button class="button" id="search" onClick="location.href='search.html'">Search</button></div>
        </ul>
        
   <?php
   include '../php/config-signin.php';
   $id = $_SESSION['id'];
   
   $sql = mysqli_query($conn,"SELECT * FROM user WHERE userID = $id");
   while($row = mysqli_fetch_array($sql)){
    	$username = $row['username'];
		$fname = $row['fname'];
		$email = $row['email'];
   }
   ?>
        
<fieldset id="account">
<legend>User Account</legend>
    <center><img src="../images/profile.jpg" width="220" height="220" style="border: 3px solid black;"></center><br/>
    <div class="accountText">
        <p>Username&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $username; ?> </p>
        <p>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $fname; ?></p>
        <p>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $email; ?> </p>
    </div>
    <a href='changepass.html'>Change Password</a>

</fieldset>
        <hr/>
        <footer>
            <p align="center">
                <div style="float:right;">
                    <a href="mailto:onlinemusicstore@gmail.com" class="footerLinks">onlinemusicstore@gmail.com</a><br/>
                    <p class="footerText">
                        SLIIT Kurunegala branch,<br/>
                        Mihindu Mawatha, Kurunegala
                    </p>
                </div>
                <a href="contactus.html" class="footerLinks">Contact Us</a><br/>
                <a href="aboutus.html" class="footerLinks">About Us</a>
                <p class="footerText">2019</p>
            </p>
        </footer>
    </body>
</html>