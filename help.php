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
									<button  class="search-btn">Search</button>
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
        


    
        <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-2">
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-8">
						<!--this page gives the user information on how to use the webpage. -->
                            <h3>Can't log in to Giveaway</h3>	
                            <p>If you're having trouble accessing your account, follow these steps:<br/><br/>
                                1. Go to the hompage to make sure you're logged out<br/>
                                2. Go to index.php/password/reset and find your account<br/>
                                3. Click "Send a password reset email"<br/>
                                4. Check the email account you use with Electron for a password reset email<br/>
                                5. Follow the steps in the email to reset your password</br>
                                6. Log in to Electron with your new password</p><br/><br/>
							
							<h4>Quick tips</h4>
							<h5>Logging in with a new device?</h5>
							<p>If you’re still logged in on another device, you can change your email or password from that device.</p>
                    <!-- /shop -->
                    </div>
					<!-- shop -->
					<div class="col-md-2">
						
					</div>
					<!-- /shop -->
</div>
            </div>
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
								<h3 class="footer-title">Help</h3>
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

