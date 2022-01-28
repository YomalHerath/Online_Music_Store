<?php
    include_once "../php/config.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php
                // Getting album information according to given album_id
                $album_id = $_GET['album_id'];
                $result = $db->query("SELECT *, album.directory AS album_dir, artist.id AS artist_id FROM album INNER JOIN artist ON album.artist_id=artist.id WHERE album.id='$album_id'");
                $album_info = $result->fetch_assoc();

                $album_title = $album_info['title'];
                $artist_name = $album_info['name'];

                // Displaying album title and artist name on the title
                echo $album_title." - ".$artist_name;
            ?>
            | Online Music Store</title>
        <link rel="stylesheet" type="text/css" href="../styles/general.css"/>
        <!--CSS file for the search button-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../styles/album_details.css">
    </head>
    <body>
       <header>
            <img src="../images/logo.png" alt="Logo" id="logo" align="left"/>
            <h1 id="siteheader">Online Music Store</h1>
            <h3 id="sitedesc">Download and stream digital music</h3>
            <div align="right" style="margin-bottom: 5px;">
                    <button class="button" onclick="location.href='login.html'">Login</button>
                    <button class="button" onclick="location.href='register.html'">Sign Up</button>
            </div>
        </header>
        <ul id="navbar">
            <li class="navbutton"><a href="../index.php" class="navbutton">Home</a></li>
            <li class="navbutton"><a href="genres.html" class="navbutton">Genres</a></li>
            <li class="navbutton"><a href="artists.php" class="navbutton">Artists</a></li>
            <li class="navbutton"><a href="albums.php" class="navbutton">Albums</a></li>
            <li class="navbutton"><a href="account.html" class="navbutton">Account</a></li>
            <li class="navbutton"><a href="contactus.html" class="navbutton">Contact Us</a></li>
            <li class="navbutton"><a href="aboutus.html" class="navbutton">About Us</a></li>
            <a href="">
                <img src="../images/cart.png" alt="Cart" height="36" width="36" id="cart" align="right"/>
            </a>
            <div align="right" class="searchcontainer"><form method="GET" action="search.php">
                <input type="text" name="query" placeholder="Search tracks, albums and artists..." id="searchbar"/>
                <button type="submit" class="searchbutton"><i class="fa fa-search"/></i></button>
            </form></div>
        </ul>

        <?php
            // Getting the remaining album information
            $description = $album_info['description'];
            $year = $album_info['year'];
            $album_dir = $album_info['album_dir'];
            $album_art = $album_info['album_art'];
            $price = $album_info['price'];
            $artist_dir = $album_info['directory'];
            $artist_id = $album_info['artist_id'];
            $artist_image = $album_info['picture'];

            // Displaying album information
            echo"<div class='albumDetails'>";

            // Displaying album details header
            echo"<table class='albumDetailsHeader'><tr class='albumDetailsHeader' style='background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)), url(../content/$artist_dir$artist_image)'>
                    <td id='albumDetailsHeader'><div class='albumDetailsHeader'>
                        <form method='GET' action='albums.php'><button type='submit' name='artist_id' value='$artist_id' class='albumDetailsArtistName'>
                            <h2 class='albumDetailsArtistName'>$artist_name</h2>
                        </button></form>
                        <h1 class='albumDetailsAlbumTitle'>$album_title</h1>
                        <h2 class='albumDetailsYear'>$year</h2>

                        <p class='albumDetailsDescription'>$description</p>
                    </div></td>

                    <td id='albumDetailsAlbumArt'><img class='albumDetailsAlbumArt' src='../content/$artist_dir$album_dir$album_art'/></td>
                </tr></table>";
            
            // Getting the tracklist
            $tracklist = $db->query("SELECT *, track.id AS track_id, track.title AS track_title FROM track WHERE track.album_id='$album_id' ORDER BY number");
           
            echo"<table class='tracklist'><tr class='tracklistHeader'>
                <th>Track No</th>
                <th>Track Title</th>
                <th>Length</th>
                <th>Preview</th>";

            // Displaying the tracklist track by track
            while($track_info = $tracklist->fetch_assoc()) {
                $track_no = $track_info['number'];
                $track_title = $track_info['track_title'];
                $track_length = $track_info['length'];
                $track_file = $track_info['filename'];

                echo"<tr class='trackRow'>
                        <td id='trackNo'>$track_no</td>
                        <td id='trackTitle'>$track_title</td>
                        <td id='trackLength'>$track_length</td>
                        <td id='trackPreview'>
                            <audio controls>
                                <source src='../content/$artist_dir"."$album_dir"."$track_file' type='audio/mpeg'/>
                            </audio>
                        </td>
                    </tr>";
            }

            echo"</table>
                <table class='addtocart'>
                    <tr>
                        <td class='price'>Rs. $price</td>
                        <td class='addtocart'><a class='addtocart' href='../php/add_to_cart.php?album_id=$album_id'>Add to Cart</a></td>
                    </tr>
                </table>
                </div>";
        ?>

        <br><br>
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
