<?php  
	require 'config.php';

	if(isset($_POST['submit'])){
		
		//get track info
		$trackno = $_POST['tno'];
		$tracklength = $_POST['tlength'];
        $tname = $_POST['tname'];
        $album = $_POST['albumID'];
		$track = $_FILES['track']['name'];

		$track_info = $db->query("SELECT *, album.directory FROM album INNER JOIN artist WHERE album.id='$album'")->fetch_assoc();
		$album_dir = $track_info['album_dir'];
		$artist_dir = $track_info['directory'];
		$track_path = $artist_dir.$album_dir;

		//file upload
		$audio_path = '../content/'.$track_path;
		$audio=strtolower(str_replace(" ", "_",$trackno.'_'.$_FILES['track']['name']));

		if(move_uploaded_file($_FILES['track']['tmp_name'],$audio_path.$audio)){
			echo  "upload successfuly <br>";
		}

		//store the submit data into database
		$sql = "INSERT INTO track(album_id,number,title,length,filename)
		Values ('$album','$trackno','$tname','$tracklength','$track')"; 
		$query = $db->query($sql);

		// Fetching album_id
		$sql2 = "SELECT * FROM track";
		$result = $db->query($sql2) or die($db->error);

		header("Location:view_tracks.php");
    }
	else{
		echo "undone";
	}
	$db->close();
?>