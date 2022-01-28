<?php
   include_once 'config.php';
	
	
	
	// Escape user inputs for security
	//$ID = $_POST["paymentID"];
	$method = $_POST["Pmethod"];
	//$ = $_POST["paymentID"];
	$Camount = $_POST["amount"];
	$name = $_POST["Cname"];
	$cno = $_POST["Cno"];
	$date = $_POST["Exp_date"];
	$CVVno = $_POST["CVVno"];

	// Attempt insert query execution
	$sql = "INSERT INTO payment1(Pmethod,amount,Cname,Cno,Exp_date,CVVno) VALUES ('$method','$Camount','$name','$cno','$date','$CVVno')";
	
	if(mysqli_query($db, $sql)){
	
		echo "<script> alert('Records added successfully!!!!')</script>";
		
	
		header("Location:http://localhost/oms/src/payment.html");
	} 
	else{
		echo "<script> alert('ERROR: Could not able to execute $sql. ') </script>" ;
	}
	echo mysqli_error($db);
	
?>



















































