<?php
/*insert the product in the wishlist table and then go back to the previous page. this table uses the user ID and the product ID.*/ 
$host = 'localhost';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass,"assignment3");
	if($conn->connect_error) 
		die($conn->connect_error);
session_start();
if(isset($_SESSION['login_user'])){
    $user=$_SESSION['login_user'];
    $result=mysqli_query($conn,"SELECT ID FROM users WHERE Username='$user'");
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $user_id=$row['ID'];   
 $item_id = $_GET['id'];
 $conn->query("INSERT INTO wishlist(User,Item) VALUES('$user_id','$item_id')");
 header('Location: ' . $_SERVER["HTTP_REFERER"] );
 exit;
}
else {$message = "You are not logged in.\\nTry again.";
echo "<script type='text/javascript'>alert('$message');</script>";}

 ?>