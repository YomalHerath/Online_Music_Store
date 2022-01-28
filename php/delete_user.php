<?php
//including the database connection file
require 'config.php';
 
//getting id of the data from url
if(isset($_GET['id'])){
    $uid = $_GET['id'];
}
// //redirecting to the display page 
$result = mysqli_query($db, "DELETE FROM user WHERE userID = $uid");
header("Location:view_user.php");
?>