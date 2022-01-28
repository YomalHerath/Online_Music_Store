<?php
	session_start();
	if(isset($_GET['album_id']) & !empty($_GET['id'])){
			$items = $_GET['album_id'];
			$_SESSION['cart'] = $items;
			header('location: index.php?status=success');
    }
    else {
		header('location: index.php?status=failed');
    }
    
    $items = $_SESSION['cart'];
    $cartitems = explode(",", $items);
    if(in_array($_GET['album_id'], $cartitems)){
    	header('location: ../src/album_details.php?album_id=$album_id?status=incart');
    }
    else {
    	$items .= "," . $_GET['id'];
    	$_SESSION['cart'] = $items;
    	header('location: ../src/album_details.php?album_id='.$album_id.'?status=success');
    }
?>