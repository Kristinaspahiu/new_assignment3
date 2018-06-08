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
				<div class="container" style="width:100%;">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-2">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-5">
							<div class="header-search">
								<form method="GET" action="search.php">
									<input class="input" name="search" placeholder="Search here">
									<button  class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->
						<?php
						/**The header has all the options that a logged in user has. He/she can check their wishlist, messages, add a new item 
						 * update the profile or log out.
						 */
						session_start();
						if(isset($_SESSION['login_user'])){
							echo "<!-- ACCOUNT -->
							<div class=\"col-md-5 clearfix\">
								<div class=\"header-ctn\">
								
									 <!-- WISHLIST -->
									<div>
										<a href=\"wishlist.php\">
											<i class=\"fa fa-heart\"></i>
											<span>Wishlist</span>
										</a>
									</div>
									<!--/WISHLIST -->
									<!-- Messages -->
									<div>
											<a href=\"messages.php\">
											<i class=\"fa fa-envelope\"></i> 
											<span>Messages</span>
										</a>
										</div>
										<!-- /Messages -->
									<!--Add new item -->
									<div>
										<a href=\"newitem.php\">
											<i class=\"fa fa-plus-circle\"></i>
											<span>Add new item</span>
										</a>
									</div>
									<!-- /Add new item  -->
									<!-- Update profile -->
									<div>
										<a href=\"update.php\"><i class=\"fa fa-cog\"></i> 
										<span>Update profile</span>
									</a>
									</div>
									<!-- /Update profile -->
									<!-- Sign out -->
									<div>
										<a href=\"signout.php\"><i class=\"fa fa-sign-out\"></i> 
										<span>Sign out</span>
									</a>
									</div>
									<!-- /Sign out -->
	
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
/**In this page the user will see a list of all the products that were added by this user, or get a message if there are no items. */
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
					<h3 class=\"title\">my items</h3>
					</div>
					</div>
					<!-- /section title -->
		
";
if($conn->connect_error) 
die($conn->connect_error);
$result1 = $conn-> query("SELECT ID FROM Users WHERE Username='$username'");
$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
$result = $conn-> query("SELECT * FROM Items WHERE Owner=".$row1['ID']);
if(mysqli_num_rows($result)==0)
	{
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
						<h1><b>You have no items.</b></h1>
						<!-- /shop -->
						   
                    	</div>
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

                                    echo"	<!-- product -->
                                                <div class=\"product\">
                                                    <div class=\"product-img\">
                                                        <img src=\"./img/".$row['Image']."\" alt=\"\"> 
                                                    </div>
                                                    <div class=\"product-body\">
                                                        <p class=\"product-category\">".$row['Category']."</p>
                                                        <h3 class=\"product-name\"><a href=\"#\">".$row['Name']."</a></h3>
														<div class=\"product-btns\">
                                                            <button name=\"remove\" class=\"remove-item\" onclick=\"location.href='delete.php?id=".$row['ID']."'\"><i class=\"fa fa-trash\"></i><span class=\"tooltipp\">remove item</span></button>
                                                            <button class=\"quick-view\"  onclick=\"location.href='product.php?id=".$row['ID']."'\"><i class=\"fa fa-eye\"></i><span class=\"tooltipp\">quick view</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /product -->";
                                            }
    
                                            echo "</div>
                                            <div id=\"slick-nav-1\" class=\"products-slick-nav\"></div>
                                        </div>
                                        <!-- /tab -->
                                    </div>
                                </div>
                            </div>
                            <!-- Products tab & slick --> ";		}  
								}
		else {
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
  
                           
							
  </div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>         
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
                                        <li><a href="#">My Account</a></li>
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