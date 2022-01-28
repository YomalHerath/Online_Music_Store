<?php
//including the database connection file
require 'config.php';
 
//getting id of the data from url
if(isset($_GET['id'])){
    $tid = $_GET['id'];
}
// //redirecting to the display page 
$result = mysqli_query($db, "DELETE FROM track WHERE id = $tid");
header("Location:view_tracks.php");
?>