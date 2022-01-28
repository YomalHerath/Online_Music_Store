<?php

 //require 'config.php';
 include_once 'config.php';

?>
<html>
    <head>
        <title>Online Music Store</title>
        <link rel="stylesheet" type="text/css" href="../styles/general.css"/>
        <link rel="stylesheet" type="text/css" href="../styles/payment_history.css"/>
    </head>
    <body>
        <header>
            <img src="../images/logo.png" alt="Logo" id="logo" align="left"/>
            <h1 id="siteheader">Online Music Store</h1>
            <h3 id="sitedesc">Download and stream digital music</h3>
			

	<fieldset id="payment">
    <legend> payment history </legend>
<?php
	$sql = "SELECT paymentID, amount, Pmethod, cname, cno, Exp_date, CVVno FROM payment1";
	$result = $db->query($sql);
    echo mysqli_error($db);
	if ($result->num_rows > 0) 
	{
    	echo "<table><tr><th>paymentID</th><th>Amount</th><th>Payment Method</th><th>Card Holder Name</th><th>Card Number</th><th>Expiry Date</th><th>CVV Number</th></tr>";
    	// output data of each row
    while($row = $result->fetch_assoc()) 
	{
        echo "<tr><td>".$row["paymentID"]."</td><td>".$row["amount"]."</td><td>".$row["Pmethod"]."</td><td>".$row["cname"]."</td><td>".$row["cno"]."</td><td>".$row["Exp_date"]."</td><td>".$row["CVVno"]."</td></tr>";
    }
    echo "</table>";
	}
		 else 
	{
    	echo "0 results";
	}
	$db->close();

	?>
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