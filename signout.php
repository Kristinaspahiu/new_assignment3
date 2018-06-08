<?php
//If the user click log out.
session_start();
session_destroy();
header("location:index.php");
exit();

?>