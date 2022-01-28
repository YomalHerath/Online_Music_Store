<html>
    <head>
        <link rel="stylesheet" typr="text/css" href="../styles/general.css">
        <link rel="stylesheet" type="text/css" href="../styles/addalbum.css">
    </head>
    <body>

        <img src="../images/logo.png" alt="Logo" id="logo" align="left"/>
        <h1 id="siteheader">Online Music Store</h1>
        <h3 id="sitedesc">Download and stream digital music</h3><br><br>
    
    <ul id="navbar">
        <li class="navbutton"><a href="../src/adminhome.html" class="navbutton">Home</a></li>
        <li class="navbutton"><a href="../src/add_album.html" class="navbutton">Add Album</a></li>
        <li class="navbutton"><a href="../src/add_artist.html" class="navbutton">Add Artist</a></li>
        <li class="navbutton"><a href="../src/add_track.html" class="navbutton">Add Track</a></li>
        <li class="navbutton"><a href="../php/view_album.php" class="navbutton">View Album Details</a></li>
        <li class="navbutton"><a href="../php/view_tracks.php" class="navbutton">View Track Details</a></li>
        <li class="navbutton"><a href="../php/view_artist.php" class="navbutton">View Artist Details</a></li>
        <li class="navbutton"><a href="../php/view_user.php" class="navbutton">View User Details</a></li>
    </ul>
    
    <center>

    <table width='80%' border= 1 style="background-color:rgba(255, 255, 255,0.6);">

        <tr><th colspan ="9" align = "center" style="background-color:rgba(0, 0, 255, 0.3);"><h2>Album Details</h2></th></tr>

        <th>Album Id</th>
        <th>Artist Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Genre Id</th>
        <th>Price</th>
        <th>Album Art</th>
        <th>Directory</th>
        </tr>

    <?php 
       require 'config.php';

        $query = " SELECT * FROM album";
        $sql= mysqli_query($db,$query) or die ('error getting');
    
        while($row=mysqli_fetch_array($sql)){ 
    ?>
           
        <tr>
           <td>
           <?php echo $row['id']; ?></td>
           <td>
           <?php echo $row['artist_id']; ?></td>
           <td>
           <?php echo $row['title']; ?></td>
           <td>
           <?php echo $row['description']; ?></td>
           <td>
           <?php echo $row['genre_id']; ?></td>
           <td>
           <?php echo $row['price']; ?></td>
           <td>
           <?php echo $row['album_art']; ?></td>
           <td>
           <?php echo $row['directory']; ?></td>
           <?php   
            echo "<td><a href=\"edit_album.php?id=$row[id]\">Edit</a> |
            <a href=\"delete_album.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete
            </a></td></tr>"; 
            ?>

        </tr>
    
    <?php   
        }
    ?>    
    </table>
    </center>
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
