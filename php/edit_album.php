<?php
// including the database connection file
require 'config.php';
 
if(isset($_POST['submit']))
{    
        $atitle = $_POST['albumname'];
        $desc =$_POST['description'];
        $price = $_POST['price'];
        $album_id = $_POST['id'];
    
        //updating the table
        $result = mysqli_query($db, "UPDATE album SET title='$atitle', description='$desc', price='$price' WHERE id = '$album_id'");
        
        if($db->query($result)){
            header("Location: view_album.php");
        }else{
            echo 'no';
        }
}
?>
<?php

//getting title from url
if(!isset($_GET['id'])){
    header("Location: view_album.php");
}else{
    $album_id = $_GET['id'];
}
 
//selecting data associated with this particular price
$result = mysqli_query($db, "SELECT * FROM album WHERE id = '$album_id' ");
 
while($row = mysqli_fetch_array($result))
{
    $atitle = $row['title'];
    $desc =$row['description'];
    $price = $row['price'];
    $album_id = $row['id'];   
}
?>
<html>
<head>    
    <title>Edit Data</title>
    <link rel="stylesheet" typr="text/css" href="../styles/general.css">
    <link rel="stylesheet" type="text/css" href="../styles/addalbum.css">
</head>
 
<body>
        
            <img src="../images/logo.png" alt="Logo" id="logo" align="left"/>
            <h1 id="siteheader">Online Music Store</h1>
            <h3 id="sitedesc">Download and stream digital music</h3><br><br>
            </div>
        <header>
        <ul id="navbar">
            <li class="navbutton"><a href="../src/add_album.html" class="navbutton">Add Album</a></li>
            <li class="navbutton"><a href="../src/add_artist.html" class="navbutton">Add Artist</a></li>
            <li class="navbutton"><a href="../src/add_track.html" class="navbutton">Add Track</a></li>
            <li class="navbutton"><a href="../php/view_album.php" class="navbutton">View Album Details</a></li>
            <li class="navbutton"><a href="../php/view_tracks.php" class="navbutton">View Track Details</a></li>
            <li class="navbutton"><a href="../php/view_artist.php" class="navbutton">View Artist Details</a></li>
            <li class="navbutton"><a href="../php/view_user.php" class="navbutton">View User Details</a></li>
        </ul>
        </header>

        <fieldset id="addAlbum">
        <legend>Edit Album</legend>
            <form action = "edit_album.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr><th>
                    <label>Edit Album Title : </label></th>
                </tr><tr><th>
                    <input type="text" name="albumname" id="name" value="<?php echo $atitle; ?>"  >
                </th></tr>
            
                <tr><th>
                    <label>Edit Description : </label></th>
                </tr><tr><th>
                    <textarea name ="description" id="name" cols="37" name="description" ><?php echo $desc;?></textarea>
                </th></tr>
            
                <tr><th>
                    <label>Edit Album Price : </label></th>
                </tr><tr><th>
                    <input type="text" name="price" id="price" value="<?php echo $price; ?>" >
                </th></tr>

            </table>
            <br/> <input type="hidden" name="id" value="<?php echo $album_id; ?>">
            <input type="submit" value="Update" name="submit" class="button" >
        </form>
        </fieldset>

    </form>

    <hr/>
    <footer>
            <p align="center">
                <div style="float:right;">
                    <a href="mailto:onlinemusicstore@gmail.com" class="footerLinks">onlinemusicstore@gmail.com</a><br/>
                    <p class="footerText">
                        SLIIT Kurunegala branch,<br/>
                        Mihindu Mawatha, Kurunegala
                    </p>
                </div>
                <a href="contactus.html" class="footerLinks">Contact Us</a><br/>
                <a href="aboutus.html" class="footerLinks">About Us</a>
                <p class="footerText">2019</p>
            </p>
    </footer>

</body>
</html>