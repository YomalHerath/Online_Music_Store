<?php  
	require 'config.php';

	if(isset($_POST['submit'])){
		
		//upload image
		$upload_to = 'images/';
	
		$image1 = $_FILES['artist_image']['name'];
		$temp1 = $_FILES['artist_image']['tmp_name'];
		$extesion1 = pathinfo($_FILES['artist_image']['name'], PATHINFO_EXTENSION);
		$image11 = move_uploaded_file($temp1, $upload_to.$image1); 

		//get all the submition data from form
		$artistName = $_POST['artist_name'];
	
		//store the submit data into database
		$sql = "INSERT INTO artist(name,directory,picture)
        Values ('$artistName','$artistName','$image1')";
         
		if($query = $db->query($sql)){
			echo "successfully added";
			header("Location:view_artist.php");
        }
	}
	else{
		echo "undone";
	}
	$db->close();
?>