<?php
//including the database connection
require 'config.php';
 
//getting id of the data from url
if(isset($_GET['id'])){
    $album_id = $_GET['id'];
}
//redirecting to the display page 
print_r($a_id);
$result = mysqli_query($db, "DELETE FROM album WHERE id = $album_id");
$result = mysqli_query($db, "DELETE FROM track WHERE album_id = $album_id");
header("Location:view_album.php");
?>