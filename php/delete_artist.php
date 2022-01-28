<?php
//including the database connection file
require 'config.php';
 
//getting id of the data from url
if(isset($_GET['id'])){
    $a_id = $_GET['id'];
}
// //redirecting to the display page 
$result = mysqli_query($db, "DELETE FROM artist WHERE id = $a_id");
header("Location:view_artist.php");
?>