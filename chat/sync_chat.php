<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass,"assignment3");


if($conn->connect_error) 
    die($conn->connect_error);
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_REQUEST['get_all'])){
    $logged_userid = $_SESSION['user_id'];
    $chat_user = htmlspecialchars(mysqli_real_escape_string($conn, $_REQUEST['chat_user']));
    $product_id = htmlspecialchars(mysqli_real_escape_string($conn, $_REQUEST['p_id']));

    /* Get all messages for this conversation */
    $sql="SELECT Sender, DateSent, Content
    FROM message 
    WHERE (Sender='$logged_userid' OR Reciever='$logged_userid') AND 
    (Sender='$chat_user' OR Reciever='$chat_user') AND Item='$product_id'";

    $messages = array();
    if ($result=mysqli_query($conn,$sql)){
        // Fetch one and one row
        while ($row=mysqli_fetch_array($result)){
            $element = array(
                "msg" => $row['Content'],
                "datetime" => $row['DateSent'],
                "is_reply" => $row['Sender'] != $logged_userid ? false : true
            );
            array_push($messages, $element);
        }
    }
    header('Content-Type: application/json');
    echo json_encode($messages);
}

if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_REQUEST['sync'])){
    $logged_userid = $_SESSION['user_id'];
    $product_id = htmlspecialchars(mysqli_real_escape_string($conn, $_REQUEST['p_id']));
    
    $last_timestamp_checked = $_SESSION['last_timestamp'];
    /* Get all new messages */
    $sql="SELECT DateSent, Content
    FROM message 
    WHERE Reciever='$logged_userid' AND 
    DateSent >= '$last_timestamp_checked' AND Item='$product_id'";

    $result=$conn->query($sql);
    if (mysqli_num_rows($result)!=0){
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $data = array(
            "new_msg" => true,
            "msg" => $row['Content'],
            "datetime" => $row['DateSent'],
        );
    } else {
        $data = array( "new_msg" => false );
    }
    
    header('Content-Type: application/json');
    $_SESSION['last_timestamp'] = date('Y-m-d H:i:s');
    echo json_encode($data);
}
?>