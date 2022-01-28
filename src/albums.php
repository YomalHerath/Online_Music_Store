<?php
    include_once "../php/config.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php
                if(isset($_GET['artist_id'])) {
                    $artist_id = $_GET['artist_id'];
                    $sql = "SELECT *, album.directory AS album_dir FROM album INNER JOIN artist ON album.artist_id=artist.id WHERE artist.id=$artist_id ORDER BY album.title"; 
                    $artist_name = $db->query($sql)->fetch_assoc()['name'];
                    echo "$artist_name";
                }
                else {
                    echo "Albums";
                }
            ?>
            | Online Music Store</title>
        <link rel="stylesheet" type="text/css" href="../styles/general.css"/>
        <!--CSS file for the search button-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../styles/albums.css">
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
            <li class="navbutton"><a href="albums.php" class="navbutton" id="active">Albums</a></li>
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

        <!--Album Grid View-->
        <table align="center" width="90%">
            <?php
                // Checking if artist value is set (clicked on an artist), if not select all albums
                if(isset($_GET['artist_id'])) {
                    $artist_id = $_GET['artist_id'];
                    $sql = "SELECT *, album.directory AS album_dir, album.id AS album_id FROM album INNER JOIN artist ON album.artist_id=artist.id WHERE artist.id=$artist_id ORDER BY album.title";
                
                    $artist_name = $db->query($sql)->fetch_assoc()['name'];
                    echo "<p class='albumsBy'>Albums by : $artist_name</p>";
                }
                else {
                    $sql = "SELECT *, album.directory AS album_dir, album.id AS album_id FROM album INNER JOIN artist ON album.artist_id=artist.id ORDER BY rand()";
                }
                
                // Fetching album information from the database
                $result = $db->query($sql);

                // Getting the number of table rows to display albums (4 albums per row)
                $rows = intdiv($result->num_rows, 4) + ($result->num_rows % 4);
                
                // Creating table rows
                for($tr = 1; $tr <=$rows; $tr++) {
                    echo "<tr>";

                    // Displaying 4 albums per row
                    for($i = 1; $i <= 4; $i++) {
                        // Creating a td beforehand to maintain the layout of grid view
                        echo "<td class='albumEntry'>";

                        // Outputting data from each tuple of results
                        $album_info = $result->fetch_assoc();

                        // Skipping the loop if no results were returned (no empty img frames)
                        if(!$album_info) {
                            continue;
                        }

                        // Assigning database values from each tuple to variables
                        $id = $album_info['album_id'];
                        $album_title = $album_info['title'];
                        $album_dir = $album_info['album_dir'];
                        $album_art = $album_info['album_art'];
                        $artist_name = $album_info['name'];
                        $artist_dir = $album_info['directory'];

                        // Displaying each result on the page
                        echo"<form method='GET' action='album_details.php'>".  // To send album_id to album_details.php when clicked
                                "<button type='submit' class='albumGridView' name='album_id' value='$id'>".  // Submitting album_id to album_details.php
                                "<img id='albumGridView' class='albumArt' src='../content/".$artist_dir.$album_dir.$album_art."'/>
                                <center>
                                    <p class='albumTitle'>$album_title</p>
                                    <p class='artistName'>$artist_name</p>
                                </center>
                                </button>
                            </form></td>";

                    }

                    echo "</tr>";
                }
            ?>
        </table>

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