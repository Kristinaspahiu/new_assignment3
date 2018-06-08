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

		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>
			function product(category){ 
					document.cookie="category = "+ category;
       				 $("#prod").load("category.php");
   				}
			</script>

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
								<a href="index.php" onclick="product('sports')" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form method="GET" action="search.php">
									<input class="input" type="text" name="search" placeholder="Search here">
									<button name="search_btn" class="search-btn">Search</button>
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
									<a href=\"messages.php\">
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
				<!--A list of all the available categories is shown. if the user chooses one of them, there will be products from 
				this category shown and also a list of new products.-->
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/housing.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Housing</h3>
								<a href="#" onclick="product('housing')" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/school.png" alt="">
							</div>
							<div class="shop-body">
								<h3>School</h3>
								<a href="#" onclick="product('school')" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
							<div class="shop">
								<div class="shop-img">
									<img src="./img/sports.png" alt="">
								</div>
								<div class="shop-body">
									<h3>Sports</h3>
									<a href="#" onclick="product('sports')" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
						<!-- /shop -->
						<!-- shop -->
					<div class="col-md-4 col-xs-6">
							<div class="shop">
								<div class="shop-img">
									<img src="./img/clothing.png" alt="">
								</div>
								<div class="shop-body">
									<h3>Clothing</h3>
									<a onclick="product('clothing')" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
						<!-- /shop -->
						<!-- shop -->
					<div class="col-md-4 col-xs-6">
							<div class="shop">
								<div class="shop-img">
									<img src="./img/electronics.png" alt="">
								</div>
								<div class="shop-body">
									<h3>Electronics</h3>
									<a href="#" onclick="product('electronics')" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
						<!-- /shop -->
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/other.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Other</h3>
								<a href="#" onclick="product('other')" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<div id="prod" class="section"></div>
<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass,"assignment3");
	if($conn->connect_error) 
		die($conn->connect_error);

	
 	$result = $conn-> query("SELECT * FROM Items ORDER BY DatePosted");
	echo "<!-- SECTION -->
		 <div class=\"section\">
			 <!-- container -->
			 <div class=\"container\">
				 <!-- row -->
				 <div class=\"row\">
		 
					 <!-- section title -->
					 <div class=\"col-md-12\">
						 <div class=\"section-title\">
							 <h3 class=\"title\">New Products</h3> 
						 </div>
					 </div>
					 <!-- /section title -->"
		 ;
	if(mysqli_num_rows($result)==0){
		echo "<!-- container -->
				<div class=\"container\">
					<!-- row -->
					<div class=\"row\">
						<!-- shop -->
						<div class=\"col-md-2\">
						</div>
						<!-- /shop -->

						<!-- shop -->
						<div class=\"col-md-8\">
						<h1><b> There are no items.</b></h1>
						</div>
						<!-- /shop -->
						
						<!-- shop -->
						<div class=\"col-md-2\">
						</div>
						<!-- /shop -->
					</div>
            	</div>";
	}
else {
		echo "
<!-- Products tab & slick -->
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
							<p class=\"product-category\">Category</p>
							<h3 class=\"product-name\"><a href=\"#\">".$row['Name']."</a></h3>
							<div class=\"product-btns\">";
							if(isset($_SESSION['login_user'])){
								$username=$_SESSION['login_user'];
								$result1=$conn->query("SELECT ID FROM Users WHERE Username='$username'");									
								if (mysqli_num_rows($result1)!= 0){
									$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
									if($row1['ID']==$row['Owner']){
										/**If the product belongs to the user or he/she is not logged in he/she can only see the details of the product. If the user is logged in he can 
										 * also message the owner or add the product to the wishlist.
										 */
										echo "
										<button name=\"remove\" class=\"remove-item\" onclick=\"location.href='delete.php?id=".$row['ID']."'\"><i class=\"fa fa-trash\"></i><span class=\"tooltipp\">remove item</span></button>
										<button class=\"quick-view\"  onclick=\"location.href='product.php?id=".$row['ID']."'\"><i class=\"fa fa-eye\"></i><span class=\"tooltipp\">quick view</span></button>";
									}
									else {
										echo "<button class=\"add-to-wishlist\" onclick=\"location.href='wishlist2.php?id=".$row['ID']."'\"><i class=\"fa fa-heart-o\"></i><span class=\"tooltipp\">add to wishlist</span></button>
										<button class=\"message-owner\" onclick=\"location.href='chat.php?p_id=" . $row['ID'] . "&chat_user=" . $row['Owner'] . "'\"><i class=\"fa fa-envelope\"></i><span class=\"tooltipp\">message owner</span></button>
										<button class=\"quick-view\" onclick=\"location.href='product.php?id=".$row['ID']."'\"><i class=\"fa fa-eye\"></i><span class=\"tooltipp\">quick view</span></button>";
									}
								} 
							}
							else {echo "<button class=\"quick-view\" onclick=\"location.href='product.php?id=".$row['ID']."'\"><i class=\"fa fa-eye\"></i><span class=\"tooltipp\">quick view</span></button>";}
						echo " </div>
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
";
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
		<script src="js/main.js"></script>

	</body>
</html>

