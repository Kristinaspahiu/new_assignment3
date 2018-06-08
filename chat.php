
<?php

session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass,"assignment3");
if($conn->connect_error) 
    die($conn->connect_error);

$itemID =  htmlspecialchars(mysqli_real_escape_string($conn, $_REQUEST['p_id']));
$result = $conn-> query("SELECT * FROM Items WHERE ID='$itemID'");
$productData =mysqli_fetch_array($result, MYSQLI_ASSOC);
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
                                    <!--chat -->
                                    <div class="col-md-8">
                                        <div id="frame">
                                            <div class="chat-content">
                                                <div class="contact-profile">
                                                    <p>Messages</p>
                                                </div>
                                                <div class="messages" id="messages">
                                                    <ul id="msg-list">
                                                        
                                                    </ul>
                                                </div>
                                                <div class="message-input">
                                                    <div class="wrap">
                                                        <input id="usermsg" name="usermsg" class="chat-text" type="text" placeholder="Write your message..." />
                                                        <button class="submit" id="sendMSG" onclick="sendMsg(<?=$_REQUEST['p_id']?>, <?=$_REQUEST['chat_user']?>)"><i class="sendbutton fa fa-paper-plane" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /chat -->

                                    <!-- item -->
                                    <?php if($productData != null){ ?>
                                    <div class="col-md-4">
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="./img/<?=$productData['Image']?>" alt="" style="width: 80%;">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Category: <strong><?=$productData['Category']?></strong></p>
                                                <h3 class="product-name"><a href="#"><?=$productData['Name']?></a></h3>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist" onclick="location.href='wishlist2.php?id=<?=$productData['ID']?>'" ><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="quick-view" onclick="location.href='product.php?id=<?=$productData['ID']?>'" ><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!-- /item -->
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
                                    <li><a href="#" onclick="product('housing')">Housing</a></li>
									<li><a href="#" onclick="product('school')">School</a></li>
									<li><a href="#" onclick="product('sports')">Sports</a></li>
									<li><a href="#" onclick="product('clothing')">Clothing</a></li>
									<li><a href="#" onclick="product('electronics')">Electronics</a></li>
									<li><a href="#" onclick="product('other')">Other</a></li>
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

        <script type="text/javascript">
            $( document ).ready(function() {
                /* Scroll messages to bottom of div */
                var element = document.getElementById("messages");
                var p_id = get('p_id');
                var chat_user = get('chat_user');

                /* When the document loads up, fetch all messages for this conversation */
                $.get('chat/sync_chat.php', {p_id, chat_user, get_all: true}, function(data) {
                    data.forEach(function(msg) {
                        if(msg['is_reply']) {
                            $( "#msg-list" ).append( "<li class=\"replies\"><p> " + msg['msg'] + " </p></li>" );
                        } else {
                            $( "#msg-list" ).append( "<li class=\"sent\"><p> " + msg['msg'] + " </p></li>" );
                        }
                    });

                    /* Scroll the message area all the way down to the latest messages */
                    element.scrollTop = element.scrollHeight;
                });

                // Execute a function when the user releases a key on the keyboard
                $("#usermsg").keyup(function(event) {
                    // Cancel the default action, if needed
                    event.preventDefault();
                    // Number 13 is the "Enter" key on the keyboard
                    if (event.keyCode === 13) {
                        // Trigger the button element with a click
                        $( "#sendMSG" ).click();
                    }
                });

                /* Periodical function that checks for new messages every 2 seconds */
                (function worker() {
                    $.get('chat/sync_chat.php', {p_id, sync: true}, function(data) {
                        console.log(data);
                        if(data['new_msg']) {
                            $( "#msg-list" ).append( "<li class=\"sent\"><p> " + data['msg'] + " </p></li>" );
                            element.scrollTop = element.scrollHeight;
                        }
                         // Now that we've completed the request schedule the next one.
                        setTimeout(worker, 2000);
                    });
                })();
            });
            
            /* Function for sending a new message to the conversation */
            function sendMsg(p_id, chat_user) {
                var clientmsg = $("#usermsg").val();
                $.post("chat/sendmsg.php", {text: clientmsg, p_id, chat_user});			
                $("#usermsg").val("");
                $( "#msg-list" ).append( "<li class=\"replies\"><p> " + clientmsg + " </p></li>" );
                var element = document.getElementById("messages");
                element.scrollTop = element.scrollHeight;
            }

            /* Function that parses the url GET arguments for assigning to javascript variables */
            function get(name){
                if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
                    return decodeURIComponent(name[1]);
            }
        </script>
	</body>
</html>
