<!DOCTYPE html>
<html>
    <head>
        <title>Online Music Store</title>
        <link rel="stylesheet" type="text/css" href="styles/general.css"/>
        <!--CSS file for the search button-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="styles/homepage.css"/>
    </head>
    <body>
        <header>
            <img src="images/logo.png" alt="Logo" id="logo" align="left"/>
            <h1 id="siteheader">Online Music Store</h1>
            <h3 id="sitedesc">Download and stream digital music</h3>
            <div align="right" style="margin-bottom: 5px;">
             <?php include 'php/nav.php'; ?>
            </div>
        </header>
        <ul id="navbar">
            <li class="navbutton"><a href="index.php" class="navbutton" id="active">Home</a></li>
            <li class="navbutton"><a href="src/genres.html" class="navbutton">Genres</a></li>
            <li class="navbutton"><a href="src/artists.php" class="navbutton">Artists</a></li>
            <li class="navbutton"><a href="src/albums.php" class="navbutton">Albums</a></li>
            <li class="navbutton"><a href="src/contactus.html" class="navbutton">Contact Us</a></li>
            <li class="navbutton"><a href="src/aboutus.html" class="navbutton">About Us</a></li>
            <a href="src/payment.html">
                <img src="images/cart.png" alt="Cart" height="36" width="36" id="cart" align="right"/>
            </a>
            <div align="right" class="searchcontainer"><form method="GET" action="src/search.php">
                <input type="text" name="query" placeholder="Search tracks, albums and artists..." id="searchbar"/>
                <button type="submit" class="searchbutton"><i class="fa fa-search"/></i></button>
            </form></div>
        </ul>
        
        <table width="85%" align="center" style="margin-top: 32px;">
            <tr>
                <td colspan="2">
                    <fieldset id="popularArtist">
                        <legend>Artist of the Week</legend>
                        <div id="artistLogo" align="right">
                            <a href="">
                                <img src="images/artists/muse/logo.png"/>
                            </a>
                        </div>
                        <div id="albumArts" align="right">
                            <a href="src/album_black_holes_and_revelations.html">
                                <img height="160px" width="160px" class="albumArt" src="images/albums/muse/black_holes_and_revelations.jpg" alt="Black Holes and Revelations"/>
                            </a>
                            <a href="src/album_absolution.html">
                                <img height="160px" width="160px" class="albumArt" src="images/albums/muse/absolution.jpg" alt="Absolution"/>
                            </a>
                            <a href="src/album_origin_of_symmetry.html">
                                <img height="160px" width="160px" class="albumArt" src="images/albums/muse/origin_of_symmetry.jpg" alt="Origin of Symmetry"/>
                            </a>
                        </div>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    <fieldset id="upcomingRelease">
                        <legend>Upcoming Releases</legend>
                        <fieldset class="subfieldset"><a href="" class="subfieldset">
                            <img align="left" height="100px" width="100px" class="upcomingRelease" src="images/albums/tool/fear_inoculum.jpg"/><br/>
                            Tool: <i>Fear Inoculum</i><br/>
                            Genre - Progressive Metal<br/>
                            Release Date - August 30, 2019 
                        </a></fieldset>
                        <fieldset class="subfieldset"><a href="" class="subfieldset">
                            <img align="left" height="100px" width="100px" class="upcomingRelease" src="images/albums/leprous/pitfalls.jpg"/><br/>
                            Leprous: <i>Pitfalls</i><br/>
                            Genre - Progressive Rock/Metal<br/>
                            Release Date - October 25, 2019
                        </a></fieldset>
                        <fieldset class="subfieldset"><a href="" class="subfieldset">
                            <img align="left" height="100px" width="100px" class="upcomingRelease" src="images/albums/alcest/spiritual_instinct.jpg"/><br/>
                            Alcest: <i>Spiritual Instinct</i><br/>
                            Genre - Shoegaze<br/>
                            Release Date - October 25, 2019
                        </a></fieldset>
                    </fieldset>
                </td>
                <td width="50%">
                    <fieldset id="trendingArtist">
                            <legend>Trending Artists</legend>
                            <table width="100%">
                                <tr>
                                    <td width="50%">
                                        <fieldset class="subfieldset" id="ta1"><a class="subfieldset" id="trendingArtist" href="">
                                            Leprous
                                        </a></fieldset>
                                    </td>
                                    <td width="50%">
                                        <fieldset class="subfieldset" id="ta2"><a class="subfieldset" id="trendingArtist" href="">
                                            Muse
                                        </a></fieldset>
                                    </td>
                                </tr>
                                    <td>
                                        <fieldset class="subfieldset" id="ta3"><a class="subfieldset" id="trendingArtist" href="">
                                            Nirvana
                                        </a></fieldset>
                                    </td>
                                    <td>
                                        <fieldset class="subfieldset" id="ta4"><a class="subfieldset" id="trendingArtist" href="">
                                            The&nbsp;Beatles
                                        </a></fieldset>
                                    </td>
                            </table>
                    </fieldset>
                </td>
            </tr>
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
                <a href="src/contactus.html" class="footerLinks">Contact Us</a><br/>
                <a href="src/aboutus.html" class="footerLinks">About Us</a>
                <p class="footerText">2019</p>
            </p>
        </footer>
    </body>
</html>