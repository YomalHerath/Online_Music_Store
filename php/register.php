<?php
	
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$username = $_POST["username"];
		$email = $_POST["email"];
		$pass = $_POST["pass"];
		$bday =  $_POST["bday"];
		$cpwd =  $_POST["pass"];
		
		if($pass == $cpwd){
			$query = "select * from user WHERE username = '$username'";
			$query_run = mysqli_query($conn,$query);
			
			if(mysqli_num_rows($query_run)>0)
			{
			echo'<script type="text/javascript"> alert ("Email already exists...Try another Email") </script>';
			echo'<script type="text/javascript"> alert ("user already exists...Try another username") </script>';
			}
			else{
				$query1 = "INSERT INTO user(username, email, fname, lname, password, bday) VALUES('$username', '$email', '$fname', '$lname', '$pass', '$bday')";
				$query_run = mysqli_query($conn,$query1);
				
				
				if($query_run){
					echo'<script type="text/javascript"> alert ("you are now registered !! Welcome !!") </script>';
					$_SESSION['username'] =$username;
					header("Location:../src/login.html");
				}
				else{
					echo '<script type = "text/javascript">alert("Error !!")</script>';
				}
			}
			
		}
		else 
		{
			echo'<script type = "text/javascript"alert("password mismatch !!")</script>';
		}
		$conn->close();
	
	

?>
