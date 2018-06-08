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
									<input class="input" name="search"  placeholder="Search here">
									<button  class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<?php
						session_start();
						/*If the user is logged in the header he will have the option to check the messages or his profile, if the visitor
						is not logged he/she is given the options to sign up or log in if he/she is already registered. */
						if(isset($_SESSION['login_user'])){
							$username=$_SESSION['login_user'];
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
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

<?php
/**this page gives the details and descriptioon of a selected product. The ID of the product is send via URL. */
	$id=$_GET['id'];
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$conn = new mysqli($host, $user, $pass,"assignment3");
	if($conn->connect_error) 
		die($conn->connect_error);
	$result = $conn-> query("SELECT * FROM Items WHERE ID='$id'");
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	echo "	<!-- SECTION -->
		<div class=\"section\">
			<!-- container -->
			<div class=\"container\">
				<!-- row -->
				<div class=\"row\">
					<!-- Product main img -->
					<div class=\"col-md-5\">
						<div id=\"product-main-img\">
							<div class=\"product-preview\">
								<img src=\"./img/".$row['Image']."\" alt=\"\">
							</div>

						</div>
					</div>
					<!-- /Product main img -->

				

					<!-- Product details -->
					<div class=\"col-md-7\">
						<div class=\"product-details\" style=\"padding-top: 4%;\">
							<h2 class=\"product-name\" style=\"padding-top: 4%;\">".$row['Name']."</h2>
							<p>".$row['Details']."</p>";
							if(isset($_SESSION['login_user'])){
							$result1=$conn->query("SELECT ID FROM Users WHERE Username='$username'");
							if (mysqli_num_rows($result1)!=0){
							$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
								if($row1['ID']==$row['Owner']){
									echo " <ul class=\"product-btns\" style=\"padding-top: 4%;\">
									<li><a href=\"#\"><i class=\"fa fa-trash\"></i>remove item</a></li>
									</ul>";
								}
								else {
									echo " <ul class=\"product-btns\" style=\"padding-top: 4%;\">
									<li><a href=\"#\"><i class=\"fa fa-heart-o\"></i> add to wishlist</a></li>
									<li><a href=\"chat.php?p_id=" . $row['ID'] . "&chat_user=" . $row['Owner'] . "\"><i class=\"fa fa-envelope\"></i> message owner</a></li>
									</ul>";
								}
							}
 
							}

						echo"<ul class=\"product-links\" style=\"padding-top: 4%;\">
								<li>Category:</li>
								<li><a href=\"#\">".$row['Category']."</a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class=\"col-md-12\">
						<div id=\"product-tab\">
							<!-- product tab nav -->
							<ul class=\"tab-nav\">
								<li class=\"active\"><a data-toggle=\"tab\" href=\"#tab1\" >Description </a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product description -->
							<div class=\"tab-content\">
								<!-- tab1  -->
								<div id=\"tab1\" class=\"tab-pane fade in active\">
									<div class=\"row\">
										<div class=\"col-md-12\">
											<p>".$row['Description']."</p>

										</div>
									</div>
								</div>
								<!-- /tab1  -->
							</div>
							<!-- /product description  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->";
		/**Also in this page a list of similar products is shown. Similarity means that the products are part of the same category or 
		 * created by the same owner. 
		 */
		$categ=$row['Category'];
		$item_id=$row['ID'];
		$owner=$row['Owner'];
	$result1 = $conn-> query("SELECT * FROM Items WHERE Owner='$owner' OR Category='$categ' LIMIT 8  ");
	echo "	<!-- Section -->
		<div class=\"section\">
			<!-- container -->
			<div class=\"container\">
				<!-- row -->
				<div class=\"row\">

					<div class=\"col-md-12\">
						<div class=\"section-title text-center\">
							<h3 class=\"title\">Related Products</h3>
						</div>
					</div>

						<!-- Products tab & slick -->
						<div class=\"col-md-12\">
								<div class=\"row\">
									<div class=\"products-tabs\">
										<!-- tab -->
										<div id=\"tab1\" class=\"tab-pane active\">
											<div class=\"products-slick\" data-nav=\"#slick-nav-1\">";
											
											while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
												echo "<!-- product -->
												<div class=\"product\">
													<div class=\"product-img\">
														<img src=\"./img/".$row['Image']."\" alt=\"\">
													</div>
													<div class=\"product-body\">
														<p class=\"product-category\">".$row1['Category']."</p>
														<h3 class=\"product-name\"><a href=\"#\">".$row['Name']."</a></h3>
														<div class=\"product-btns\">";
														if(isset($_SESSION['login_user'])){
															if (mysqli_num_rows($result1)!=0){
																if($row1['ID']==$row['Owner']){
																	echo "
																	<button class=\"remove-item\"><i class=\"fa fa-trash\"></i><span class=\"tooltipp\">remove item</span></button>
																	<button class=\"quick-view\"  onclick=\"location.href='product.php?id=".$row['ID']."'\"><i class=\"fa fa-eye\"></i><span class=\"tooltipp\">quick view</span></button>>";
																}
																else {
																	echo  "<button class=\"add-to-wishlist\" onclick=\"location.href='wishlist2.php?id=".$row['ID']."'\"><i class=\"fa fa-heart-o\"></i><span class=\"tooltipp\">add to wishlist</span></button>
																	<button class=\"message-owner\"><i class=\"fa fa-envelope\"></i><span class=\"tooltipp\">message owner</span></button>
																	<button class=\"quick-view\"  onclick=\"location.href='product.php?id=".$row['ID']."'\"><i class=\"fa fa-eye\"></i><span class=\"tooltipp\">quick view</span></button>";
																}
															} 
														}
														else {
																echo "<button class=\"quick-view\"  onclick=\"location.href='product.php?id=".$row['ID']."'\"><i class=\"fa fa-eye\"></i><span class=\"tooltipp\">quick view</span></button>";
														}
								
													echo "</div>
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
							<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->";
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
