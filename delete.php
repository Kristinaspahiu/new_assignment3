<?php
/**When a user wants to delete an product which is no longer available. */
$host = 'localhost';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass,"assignment3");
	if($conn->connect_error) 
		die($conn->connect_error);

// if delete is clicked
 $item_id = $_GET['id'];
 $conn->query("DELETE FROM Items WHERE ID ='$item_id'");
 header('Location: ' . $_SERVER["HTTP_REFERER"] );
 exit;

 ?>