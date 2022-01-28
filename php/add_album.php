<?php
	require 'config.php';

	if(isset($_POST['submit'])){

		//get all the submition data from form
		$artist = $_POST['artist'];
		$title = $_POST['albumname'];
		$description = $_POST['description'];
		$year = $_POST['year'];
		$genre = $_POST['genre'];
		$price = $_POST['price'];

		//getting artist name from artist_id
		$artist_name = $db->query("SELECT * FROM artist WHERE id='$artist'")->fetch_assoc()['name'];

		//formatting artist_dir from artist name
		$artist_dir = strtolower(str_replace(" ", "_", $artist_name)).'/';

		// $artist_dir = $artist.'/';

		//formatting album_dir from album title
		$album_dir = strtolower(str_replace(" ", "_", $title)).'/';

		// $album_dir = $title.'/';
		$image_path = $artist_dir.$album_dir;

		if (!file_exists('../content/'.$image_path)) {
			mkdir('../content/'.$image_path, 0777, true);
		}

		//upload image
		$upload_to = '../content/'.$image_path;

		$image1 = $_FILES['image']['name'];
		$temp1 = $_FILES['image']['tmp_name'];
		$extesion1 = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		$image11 = move_uploaded_file($temp1, $upload_to.$image1);

		//store the submit data into database
		$sql = "INSERT INTO album(artist_id,title,description,genre_id,year,price,album_art,directory)
		Values ('$artist','$title','$description','$genre','$year','$price','$image1','$album_dir')";
		$query = $db->query($sql);
		echo mysqli_error($db);

		// // Fetching album_id
		$sql2 = "SELECT * FROM album";
		$result = $db->query($sql2) or die($db->error);

		while(($album_info = $result->fetch_assoc()) !== null){
			if($album_info['title'] == $title && $album_info['artist_id'] == $artist) {
			$album_id = $album_info['id'];
			echo $album_id;
			header("Location:view_album.php");
			}
		}

		echo mysqli_error($db);
	}
	else{
		echo "undone";
	}
	$db->close();
?>
