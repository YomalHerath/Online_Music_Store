<?php
session_start();

	$user ='root';
	$pass='';
	$db='OnlineMusicStore';
	$conn= new mysqli('localhost','root',$pass,$db)
		or die("unable connect");

	
?>
