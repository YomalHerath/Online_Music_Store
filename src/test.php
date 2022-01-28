<?php
    include_once "../php/config.php";

    /* INSERT ALBUM
    $artist_id = 6;
    $title = "Random Access Memories";
    $description = "Random Access Memories is the fourth studio album by French electronic music duo Daft Punk, released on 17 May 2013 by Daft Life and Columbia Records.";
    $genre_id = 6;
    $year = 2013;
    $price = 2200.00;
    $album_art = "folder.jpg";
    $directory = "random_access_memories/";

    $sql =  "INSERT INTO album (artist_id, title, description, genre_id, year, price, album_art, directory) 
            VALUES ('$artist_id', '$title', '$description', '$genre_id', '$year', '$price', '$album_art', '$directory')";
    
    $query = $db->query($sql);

    echo mysqli_error($db);
    */
    
    
    $tracks = array(array(6, 1, "Give Life Back to Music", "00:04:34", "01_give_life_back_to_music.mp3"),
                    array(6, 2, "The Game of Love", "00:05:21", "02_the_game_of_love.mp3"),
                    array(6, 3, "Giorgio by Moroder", "00:09:04", "03_giorgio_by_moroder.mp3"),
                    array(6, 4, "Within", "00:03:48", "04_within.mp3"),
                    array(6, 5, "Instant Crush", "00:05:37", "05_instant_crush.mp3"),
                    array(6, 6, "Lose Yourself to Dance", "00:05:53", "06_lose_yourself_to_dance.mp3"),
                    array(6, 7, "Touch", "00:08:18", "07_touch.mp3"),
                    array(6, 8, "Get Lucky", "00:06:08", "08_get_lucky.mp3"),
                    array(6, 9, "Beyond", "00:04:50", "09_beyond.mp3"),
                    array(6, 10, "Motherboard", "00:05:41", "10_motherboard.mp3"),
                    array(6, 11, "Fragments of Time", "00:04:39", "10_fragments_of_time.mp3"),
                    array(6, 12, "Doin\' It Right", "00:04:11", "10_doin_it_right.mp3"),
                    array(6, 13, "Contact", "00:06:21", "10_contact.mp3"),
                    );

    foreach($tracks as $track) {
        $album_id = $track[0];
        $number = $track[1];
        $title = $track[2];
        $length = $track[3];
        $filename = $track[4];

        $sql = "INSERT INTO track (album_id, number, title, length, filename)
                VALUES ('$album_id', '$number', '$title', '$length', '$filename')";

        $query = $db->query($sql);

        echo mysqli_error($db);
    }
    
?>