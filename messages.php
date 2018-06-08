
<?php

session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass,"assignment3");
if($conn->connect_error) 
    die($conn->connect_error);

$logged_user =$_SESSION['user_id'];
$sql = "SELECT u.username as Reciever, u.ID as RecieverID, u1.username as Sender, u1.ID as SenderID, i.ID as ProductID, i.Name as ProductName, i.Category, i.Owner
        FROM message m
        INNER JOIN users u ON m.Reciever = u.ID
        INNER JOIN users u1 ON m.Sender = u1.ID
        INNER JOIN items i ON m.Item = i.ID
        WHERE Sender = '$logged_user' OR Reciever = '$logged_user'
        GROUP BY Item";

$result= mysqli_query($conn,$sql);

$messages = array();
while ($row=mysqli_fetch_array($result)){
    /* Check which user is on the other side of the conversation */
    $conversationBuddy = $row['Reciever'];
    $conversationBuddyID = $row['RecieverID'];
    if($row['Reciever'] == $_SESSION['login_user']) {
        $conversationBuddy = $row['Sender'];
        $conversationBuddyID = $row['SenderID'];
    }
    array_push($messages, array(
        'product_id' => $row['ProductID'],
        'convo_user' => $conversationBuddy,
        'convo_user_id' => $conversationBuddyID,
        'product_name' => $row['ProductName'],
        'product_category' => $row['Category'],
        'owner' => $row['Owner']
    ));
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

       <title>Electro - HTML Ecommerce Template</title>

      <!-- Google font -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
      <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"/>
        
      <!-- Bootstrap -->
      <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

      <!-- Slick -->
      <link type="text/css" rel="stylesheet" href="css/slick.css"/>
      <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

      <!-- nouislider -->
      <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

      <!-- Font Awesome Icon -->
      <link rel="stylesheet" href="css/font-awesome.min.css">

      <!-- Custom stlylesheet -->
      <link type="text/css" rel="stylesheet" href="css/style.css"/>

      <!-- Chat form style-->
      <link type="text/css" rel="stylesheet" href="css/chat.scss"/>


  </head>
   <body>


           <!-- MAIN HEADER -->
           <div id="header">
               <!-- container -->
               <div class="container">
                   <!-- row -->
                   <div class="row">
                       <!-- LOGO -->
                    
                       <div class="col-md-3">
                           <div class="header-logo">
                               <a href="index.php" class="logo">
                                   <img src="./img/logo.png" alt="">
                               </a>
                           </div>
                       </div>
                       <!-- /LOGO -->

                       <!-- SEARCH BAR -->
                       <div class="col-md-6">
                           <div class="header-search">
                                <form method="GET" action="search.php">
                                   <input class="input" name="search"  placeholder="Search here">
                                   <button  class="search-btn">Search</button>
                               </form>
                           </div>
                       </div>
                       <!-- /SEARCH BAR -->
                   </div>
                   <!-- row -->
               </div>
               <!-- container -->
           </div>
           <!-- /MAIN HEADER -->
       </header>
       <!-- /HEADER -->

       <!-- SECTION -->
       <div class="section">
           <!-- container -->
           <div class="container">
                <!-- row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section">
                            <!-- container -->
                            <div class="container">
                                <!-- row -->
                                <div class="row">
                                    <!--message list -->
                                    <div class="col-md-12">
                                        <table id="entries" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th> User </th>
                                                    <th> Product </th>
                                                    <th> Product Category </th>
                                                    <th> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            /**The conversations are shown in the form of a table. */
                                                for ($x = 0; $x < count($messages); $x++) {
                                                    $tableRow = "<tr>";
                                                    $tableRow .= "<td>" . $messages[$x]["convo_user"] . "</td>";
                                                    $tableRow .= "<td>" . $messages[$x]["product_name"] . "</td>";
                                                    $tableRow .= "<td>" . $messages[$x]["product_category"] . "</td>";
                                                    $tableRow .= "<td>
                                                    <a
                                                    href='chat.php?p_id=".$messages[$x]["product_id"]."&chat_user=".$messages[$x]["convo_user_id"]."' class='btn btn-info'>
                                                    View Conversation 
                                                    </a>
                                                    </td>";
                                                    $tableRow .= "</tr>";
                                                    echo $tableRow;
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /message list -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /section title -->
                </div>
               <!-- /row -->
           </div>
           <!-- /container -->
       </div>
       <!-- /SECTION -->

       <!-- FOOTER -->
       <footer id="footer">
           <!-- top footer -->
           <div class="section">
               <!-- container -->
               <div class="container">
                   <!-- row -->
                   <div class="row">
                       <div class="col-md-3 col-xs-6">
                           <div class="footer">
                               <h3 class="footer-title">About Us</h3>
                               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                               <ul class="footer-links">
                                   <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                                   <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                                   <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                               </ul>
                           </div>
                       </div>

                       <div class="col-md-3 col-xs-6">
                           <div class="footer">
                               <h3 class="footer-title">Categories</h3>
                               <ul class="footer-links">
                                    <li><a href="index.php" onclick="product('housing')">Housing</a></li>
									<li><a href="index.php" onclick="product('school')">School</a></li>
									<li><a href="index.php" onclick="product('sports')">Sports</a></li>
									<li><a href="index.php" onclick="product('clothing')">Clothing</a></li>
									<li><a href="index.php" onclick="product('electronics')">Electronics</a></li>
									<li><a href="index.php" onclick="product('other')">Other</a></li>
                               </ul>
                           </div>
                       </div>

                       <div class="clearfix visible-xs"></div>

                       <div class="col-md-3 col-xs-6">
                           <div class="footer">
                               <h3 class="footer-title">Information</h3>
                               <ul class="footer-links">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="help.php">Help</a></li>
                               </ul>
                           </div>
                       </div>

                       <div class="col-md-3 col-xs-6">
                           <div class="footer">
                               <h3 class="footer-title">Service</h3>
                               <ul class="footer-links">
                                    <li><a href="myaccount.php">My Account</a></li>
                                    <li><a href="wishlist.php">Wishlist</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
                   <!-- /row -->
               </div>
               <!-- /container -->
           </div>
          <!-- /top footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
        <script src="js/jquery.zoom.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script>
    $(document).ready(function() {
        $('#entries').DataTable();
    });
    </script>
	</body>
</html>
