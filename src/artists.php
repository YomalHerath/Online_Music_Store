<?php
    include_once "../php/config.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Artists | Online Music Store</title>
        <link rel="stylesheet" type="text/css" href="../styles/general.css"/>
        <!--CSS file for the search button-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../styles/artists.css">
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
            <li class="navbutton"><a href="artists.php" class="navbutton" id="active">Artists</a></li>
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

        <!--Artist Grid View-->
        <table align="center" width="90%">
            <?php
                // Selecting all artists from the database
                $sql = "SELECT * FROM artist ORDER BY rand()";
                
                // Fetching artist information from the database
                $result = $db->query($sql);

                // Getting the number of table rows to display artists (4 artists per row)
                $rows = intdiv($result->num_rows, 4) + ($result->num_rows % 4);
                
                // Creating table rows
                for($tr = 1; $tr <=$rows; $tr++) {
                    echo "<tr>";

                    // Displaying 4 artists per row
                    for($i = 1; $i <= 4; $i++) {
                        // Creating a td beforehand to maintain the layout of grid view
                        echo "<td class='artistEntry'>";

                        // Outputting data from each tuple of results
                        $artist_info = $result->fetch_assoc();

                        // Skipping the loop if no results were returned (no empty img frames)
                        if(!$artist_info) {
                            continue;
                        }

                        // Assigning database values from each tuple to variables
                        $id = $artist_info['id'];
                        $name = $artist_info['name'];
                        $dir = $artist_info['directory'];
                        $picture = $artist_info['picture'];

                        // Displaying each result on the page
                        echo"<form method='GET' action='albums.php'>".  // To send artist_id to albums.php when clicked
                                "<button type='submit' class='artistGridView' name='artist_id' value='$id'>".  // Submitting artist_id to albums.php to filter out albums
                                    "<img id='artistGridView' class='artistImage' src='../content/".$dir.$picture."'/>
                                    <center>
                                        <p class='artistGridView'>$name</p>
                                    </center>
                                </button>
                            </form>
                            </td>";

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