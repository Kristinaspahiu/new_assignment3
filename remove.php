<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass,"assignment3");
	if($conn->connect_error) 
		die($conn->connect_error);

// if remove from wishlist is clicked
 $item_id = $_GET['id'];
 $conn->query("DELETE FROM wishlist WHERE Item ='$item_id'");
 header('Location: '. $_SERVER["HTTP_REFERER"] );
 exit;

 ?>