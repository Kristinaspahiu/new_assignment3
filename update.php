<?php

session_start();
if(isset($_POST["Signup"])) {
  
   $host = 'localhost';
   $user = 'root';
   $pass = '';
   
  $conn = new mysqli($host, $user, $pass,"assignment3");
    $username=$_SESSION['login_user'];
  if($conn->connect_error) 
   die($conn->connect_error);
   $newusername=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['username']));
$result = $conn-> query("SELECT ID FROM users WHERE Username='$newusername'");
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count=mysqli_num_rows($row);
if($count==0){
    $newemail=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email']));
    $newname=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['name']));
    $newsurname=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['surname']));      
    $newpassword=htmlspecialchars(mysqli_real_escape_string($conn,password_hash($_POST['password'], PASSWORD_DEFAULT )));
    $conn->query("UPDATE users
    SET Name='$newname',Surname='$newsurname',Email='$newemail',Username='$newusername',Password='$newpassword'
    WHERE Username='$username'"); 
    $_SESSION['login_user'] = $newusername; 
    $_SESSION['user_right'] = 0;
    header("location:myaccount.php");
}
else {   
    $message = "This username already exists.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>"; }

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

      <!-- Login form style-->
      <link type="text/css" rel="stylesheet" href="css/style2.css"/>


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
                                   <input class="input" name="search" placeholder="Search here">
                                   <button   class="search-btn">Search</button>
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
                    <div class="wrapper">
                    <!--The form that is used to get the updated data from the user. -->
                            <div class="login">
                              <div class="tabs">
                                <div class="tab active">UPDATE PROFILE</div>
                              </div>
                              <form method="POST" action="update.php" >
                                <div class="inputform">
                                  <input id="email" type="text" name="email" required/>
                                  <label for="email">EMAIL</label>
                                </div>
                                <div class="inputform">
                                        <input id="name" type="text" name="name" required/>
                                        <label for="name">NAME</label>
                                      </div>
                                 <div class="inputform">
                                  <input id="surname" type="text" name="surname" required/>
                                  <label for="surname">SURNAME</label>
                                </div>
                                <div class="inputform">
                                        <input id="username" type="text" name="username" required/>
                                        <label for="username">USERNAME</label>
                                      </div>
                                                        
                                <div class="inputform">
                                  <input id="password" type="password" name="password" required/>
                                  <label for="password">PASSWORD</label>
                                </div>
                                <button type="Submit" id="Signup" >UPDATE</button>
                              </form>
                            </div>
                          </div>
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
       <script src="js/main.js"></script>

   </body>
</html>







