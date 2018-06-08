<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title></title>

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


    </head>
	<body>
		<!-- HEADER -->
		<header>
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

						<?php
						/*If the user is logged in the header he will have the option to check the messages or his profile, if the visitor
						is not logged he/she is given the options to sign up or log in if he/she is already registered. */
						session_start();
						if(isset($_SESSION['login_user'])){
							echo"<!-- ACCOUNT -->
						<div class=\"col-md-3 clearfix\">
							<div class=\"header-ctn\">
								<!-- Messages -->
								<div>
									<a href=\"\">
										<i class=\"fa fa-envelope\"></i>
										<span>Messages</span>
									</a>
								</div>
								<!-- /Messages-->
								<!-- My Account -->
                                <div>
									<a href=\"myaccount.php\"><i class=\"fa fa-user-o\"></i> 
									<span>My account</span>
								</a>
								</div>
								<!-- /My Account -->

							</div>
						</div>
						<!-- /ACCOUNT -->";

						}
						else echo"<!-- ACCOUNT -->
						<div class=\"col-md-3 clearfix\">
							<div class=\"header-ctn\">
								<!-- Sign up -->
								<div>
									<a href=\"signup.php\">
										<i class=\"fa fa-user-plus\"></i>
										<span>Sign Up</span>
									</a>
								</div>
								<!-- /Sign Up -->
								<!-- Log in -->
                                <div>
									<a href=\"login.php\"><i class=\"fa fa-user-o\"></i> 
									<span>Log in</span>
								</a>
								</div>
								<!-- /Log in -->

							</div>
						</div>
						<!-- /ACCOUNT -->";
						?>
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
 <?php
 /*If the user is logged in the program will show the products that are located in the wishlist table. If the visitor is not logged in he/she 
 will be shown a message. */
$host = 'localhost';
$user = 'root';
$pass = '';
if(isset($_SESSION['login_user'])){
$username=$_SESSION['login_user'];
$conn = new mysqli($host, $user, $pass,"assignment3");
echo "<!-- SECTION -->
<div class=\"section\">
	<!-- container -->
	<div class=\"container\">
		<!-- row -->
		<div class=\"row\">

			<!-- section title -->
			<div class=\"col-md-12\">
				<div class=\"section-title\">
                    <h3 class=\"title\">wishlist</h3>
                    </div>
                    </div>
                  
                    <!-- /section title -->";

if($conn->connect_error) 
die($conn->connect_error);
$result1 = $conn-> query("SELECT ID FROM Users WHERE Username='$username'");
$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
$user_id=$row1['ID'];
$result = $conn-> query("SELECT i.Name,i.Image, i.ID, i.Category FROM wishlist w INNER JOIN items i ON w.Item=i.ID AND w.User='$user_id' ");
if(mysqli_num_rows($result)==0)
	{/**If there is no item in the wishlist the user will get a message. */
		echo "<!-- SECTION -->
			<div class=\"section\">
				<!-- container -->
				<div class=\"container\">
					<!-- row -->
					<div class=\"row\">
						<!-- shop -->
						<div class=\"col-md-2\">
						</div>
						<!-- /shop -->

						<!-- shop -->
						<div class=\"col-md-8\">
                        <h1><b>You have no items in your wishlist.</b></h1>
                        </div>
						<!-- /shop -->
						   
                    
						<!-- shop -->
						<div class=\"col-md-2\">
						</div>
						<!-- /shop -->
					</div>
            	</div>
        	</div>";
    }
                        
    else {
        echo  "<!-- Products tab & slick -->
                <div class=\"col-md-12\">
                     <div class=\"row\">
                        <div class=\"products-tabs\">
                            <!-- tab -->
                            <div id=\"tab1\" class=\"tab-pane active\">
                                 <div class=\"products-slick\" data-nav=\"#slick-nav-1\">";
                                 
                                 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                     /**The products in the wishlist will be shown acompanied by the options to message the owner, remove from the wishlist and 
									  * see more information about the product */
                                  echo  "	<!-- product -->
                                                <div class=\"product\">
                                                    <div class=\"product-img\">
                                                        <img src=\"./img/".$row['Image']."\" alt=\"\"> 
                                                    </div>
                                                    <div class=\"product-body\">
                                                        <p class=\"product-category\">".$row['Category']."</p>
                                                        <h3 class=\"product-name\"><a href=\"#\">".$row['Name']."</a></h3>
                                                        <div class=\"product-btns\">
                                                        <button class=\"remove from wishlist\" onclick=\"location.href='remove.php?id=".$row['ID']."'\"><i class=\"fa fa-times\"></i><span class=\"tooltipp\">remove from wishlist</span></button>
                                                        <button class=\"message-owner\"><i class=\"fa fa-envelope\"></i><span class=\"tooltipp\">message owner</span></button>
                                                        <button class=\"quick-view\"  onclick=\"location.href='product.php?id=".$row['ID']."'\"><i class=\"fa fa-eye\"></i><span class=\"tooltipp\">quick view</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /product -->";
                                            }
                                        
                                    }
                                         echo "</div>
				
                                         </div>
                                         <!-- /tab -->
                                     </div>
                                 </div>
                             </div>
                             <!-- Products tab & slick -->
                             </div>
                             <!-- /row -->
                             </div>
                             <!-- /container --> ";    
                            }
    else{
		/**in the case the user is not logged in he will get this message. */
        echo "<!-- SECTION -->
			<div class=\"section\">
				<!-- container -->
				<div class=\"container\">
					<!-- row -->
					<div class=\"row\">
					<!-- SECTION -->

			<div class=\"section\">
				<!-- container -->
				<div class=\"container\">
					<!-- row -->
					<div class=\"row\">
						<!-- shop -->
						<div class=\"col-md-2\">
						</div>
						<!-- /shop -->

						<!-- shop -->
						<div class=\"col-md-8\">
						<h1><b>You are not logged in.</b></h1>
						<!-- /shop -->
						   
                    	</div>
						<!-- shop -->
						<div class=\"col-md-2\">
						</div>
						<!-- /shop -->
					</div>
            	</div>
			</div>
			
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div> ";
    }                                          
  ?>          

               
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
                                        <li><a href="#">Help</a></li>
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