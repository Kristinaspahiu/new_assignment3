<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass,"assignment3");


if($conn->connect_error) 
    die($conn->connect_error);
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sender = $_SESSION['user_id'];
    $receiver = htmlspecialchars(mysqli_real_escape_string($conn, $_REQUEST['chat_user']));
    $item = htmlspecialchars(mysqli_real_escape_string($conn, $_REQUEST['p_id']));
    $datetime = date('Y-m-d H:i:s');
    $content = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['text']));
    $conn->query("INSERT INTO message(Sender,Reciever, Item, DateSent, Content) VALUES('$sender','$receiver','$item','$datetime','$content')");
}
?>