<?php include 'config-signin.php'; $msg="";



 if(isset($_POST["btnsubmit"])){
	$username = $_POST['un'];
	$pass = $_POST['pass']; 
	
	

		$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$pass'");
		
		if(mysqli_num_rows($result)>0)
		{
			while($row = mysqli_fetch_array($result)){
			
			$id= $row['userID'];
		
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $id;
			echo "<script>alert('login successful')</script>";
			header("Location:../src/account.php");
			}
		}
        else 
        {
        	$msg = "* Username or Password Wrong ! Try Again";
        }
        mysqli_close($conn);
	
}
?>
