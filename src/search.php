<?php
    include_once "../php/config.php";
    
    // Getting search query
    if(isset($_GET['query'])) {
        $query = $_GET['query'];
    }
    else {
        $query = "";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php
                echo "\"$query\"";
            ?>
            | Online Music Store
        </title>
        <link rel="stylesheet" type="text/css" href="../styles/general.css"/>
        <!--CSS file for the search button-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../styles/search.css"/>
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
            echo "<p class='searchResultsFor'>Search results for : \"$query\"</p>";
        ?>

        <table align="center" width="100%"><tr>
            
            <!-- Artist Results -->
            <td class="resultSection"><fieldset class="resultSection">
                <legend>Artists</legend>
                <div class="resultSection"><table class="resultSection">
                
                <?php
                    // Querying the database for matches
                    $result = $db->query("SELECT * FROM artist WHERE (name LIKE '%".$query."%')");

                    // Checking if any results were found, and if found, create a table to display them
                    if($result->num_rows > 0) {

                        // Getting the number of table rows to display artists (2 artists per row)
                        $rows = intdiv($result->num_rows, 2) + ($result->num_rows % 2);
                        
                        // Creating table rows
                        for($tr = 1; $tr <=$rows; $tr++) {
                            echo "<tr>";

                            // Displaying 2 artists per row
                            for($i = 1; $i <= 2; $i++) {
                                // Creating a td beforehand to maintain the layout of grid view
                                echo "<td class='artistResult'>";

                                // Outputting data from each tuple of results
                                $artist_info = $result->fetch_assoc();

                                // Breaking from the loop if no results were returned
                                if(!$artist_info) {
                                    break;
                                }

                                // Assigning database values from each tuple to variables
                                $id = $artist_info['id'];
                                $name = $artist_info['name'];
                                $dir = $artist_info['directory'];
                                $picture = $artist_info['picture'];

                                // Displaying each result on the page
                                echo"<form method='GET' action='albums.php'>".  // To send artist_id to albums.php when clicked
                                        "<button type='submit' class='artistResults' name='artist_id' value='$id'>".  // Submitting artist_id to albums.php to filter out albums
                                            "<img id='artistResults' class='artistImage' src='../content/".$dir.$picture."'/>
                                            <center>
                                                <p class='artistResultsArtistName'>$name</p>
                                            </center>
                                        </button>
                                    </form>
                                    </td>";
                            }
                            echo "</tr>";
                        }
                    }
                    else {
                        echo "<p class='noResults'>No Artists Found</p>";
                    }
                ?>

                </table></div>
            </fieldset></td>
            
            <!-- Album Results -->
            <td class="resultSection"><fieldset class="resultSection">
                <legend>Albums</legend>
                <div class="resultSection"><table class="resultSection">

                <?php
                    // Querying database for matches (both artists and their albums)
                    $result = $db->query("SELECT *, album.directory AS album_dir, album.id AS album_id FROM album INNER JOIN artist ON album.artist_id=artist.id WHERE (title LIKE '%".$query."%') OR (artist.name LIKE '%".$query."%')");
                    
                    // Checking if any results were found, and if found, create a table to display them
                    if($result->num_rows > 0) {

                        // Fetching information from each tuple and displaying as a result
                        while($album_info = $result->fetch_assoc()) {
                            $id = $album_info['album_id'];
                            $title = $album_info['title'];
                            $album_dir = $album_info['album_dir'];
                            $album_art = $album_info['album_art'];
                            $year = $album_info['year'];
                            $artist_name = $album_info['name'];
                            $artist_dir = $album_info['directory'];

                            echo"<tr><td><form method='GET' action='album_details.php'>".  // To send album_id to album_details.php when clicked
                                    "<button type='submit' class='albumResults' name='album_id' value='$id'>".  // Submitting album_id to album_details.php
                                        "<img id='albumResults' class='albumArt' align='left' src='../content/".$artist_dir.$album_dir.$album_art."'/>
                                        <p class='albumResultsArtistName'>$artist_name</p>
                                        <p class='albumResultsTitle'>$title</p>
                                        <p class='albumResultsYear'>$year</p>
                                    </button>
                                </form></td></tr>";
                        }
                    }
                    else {
                        echo "<p class='noResults'>No Albums Found</p>";
                    }
                ?>

                </table></div>
            </fieldset></td>

            <!-- Track Results -->
            <td class="resultSection"><fieldset class="resultSection">
                <legend>Tracks</legend>
                <div class="resultSection"><table class="resultSection">

                <?php
                    // Querying database for matches (both artists and their tracks)
                    $result = $db->query("SELECT *, album.directory AS album_dir, album.title AS album_title, album.id AS album_id FROM album INNER JOIN track ON album.id=track.album_id INNER JOIN artist ON album.artist_id=artist.id WHERE (track.title LIKE '%".$query."%') OR (artist.name LIKE '%".$query."%')");

                    // Checking if any results were found
                    if($result->num_rows > 0) {

                        // Fetching information from each tuple and displaying as a result
                        while($track_info = $result->fetch_assoc()) {
                            $title = $track_info['title'];
                            $album_id = $track_info['album_id'];
                            $album_title = $track_info['album_title'];
                            $album_dir = $track_info['album_dir'];
                            $album_art = $track_info['album_art'];
                            $artist_name = $track_info['name'];
                            $artist_dir = $track_info['directory'];

                            echo"<tr><td class='trackResults'><form method='GET' action='album_details.php'>".  // To send album_id to album_details.php when clicked
                                    "<button type='submit' class='trackResults' name='album_id' value='$album_id'>".  // Submitting album_id to album_details.php
                                        "<img id='trackResults' class='albumArt' align='left' src='../content/".$artist_dir.$album_dir.$album_art."'/>
                                        <p class='trackResultsTrack-Artist'>$title - $artist_name</p>
                                        <p class='trackResultsAlbumTitle'>from $album_title</p>
                                    </button>
                                </form></td></tr>";
                        }
                    }
                    else {
                        echo "<p class='noResults'>No Tracks Found</p>";
                    }
                ?>

                </table></div>
            </fieldset></td>
        </tr></table>


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