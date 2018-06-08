
<?php
/**This page is included in the index.php if the user chooses one of the categories. Only the products from the chosen category will be shown.
 */
session_start();
if(isset($_COOKIE['category'])){
$category=$_COOKIE['category'];
$host = 'localhost';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass,"assignment3");
echo "
	<!-- container -->
	<div class=\"container\">
		<!-- row -->
		<div class=\"row\">

			<!-- section title -->
			<div class=\"col-md-12\">
				<div class=\"section-title\">
					<h3 class=\"title\">".$category."</h3> 
					</div>
					 </div>
			<!-- /section title -->";

	

if($conn->connect_error) 
die($conn->connect_error);
$result = $conn-> query("SELECT * FROM Items WHERE Category='$category'");

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
						<h1><b> There are no items in this category.</b></h1>
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
else {echo "
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
				<p class=\"product-category\">".$row['Category']."</p>
				<h3 class=\"product-name\"><a href=\"#\">".$row['Name']."</a></h3>
				<div class=\"product-btns\">";
				if(isset($_SESSION['login_user'])){
					$username=$_SESSION['login_user'];
					$result1=$conn->query("SELECT ID FROM Users WHERE Username='$username'");									
					if (mysqli_num_rows($result1)!= 0){
						$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
						if($row1['ID']==$row['Owner']){
							echo "
							<button name=\"remove\" class=\"remove-item\" onclick=\"location.href='delete.php?id=".$row['ID']."'\"><i class=\"fa fa-trash\"></i><span class=\"tooltipp\">remove item</span></button>
							<button class=\"quick-view\"  onclick=\"location.href='product.php?id=".$row['ID']."'\"><i class=\"fa fa-eye\"></i><span class=\"tooltipp\">quick view</span></button>";
						}
						else {
							echo  "<button class=\"add-to-wishlist\" onclick=\"location.href='wishlist2.php?id=".$row['ID']."'\"><i class=\"fa fa-heart-o\"></i><span class=\"tooltipp\">add to wishlist</span></button>
							<button class=\"message-owner\" onclick=\"location.href='chat.php?p_id=" . $row['ID'] . "&chat_user=" . $row['Owner'] . "'\"><i class=\"fa fa-envelope\"></i><span class=\"tooltipp\">message owner</span></button>
							<button class=\"quick-view\"  onclick=\"location.href='product.php?id=".$row['ID']."'\"><i class=\"fa fa-eye\"></i><span class=\"tooltipp\">quick view</span></button>";
						}
					} 
				}
				else {
						echo  "<button class=\"add-to-wishlist\" onclick=\"location.href='wishlist2.php?id=".$row['ID']."'\"><i class=\"fa fa-heart-o\"></i><span class=\"tooltipp\">add to wishlist</span></button>
						<button class=\"message-owner\" onclick=\"location.href='chat.php?p_id=" . $row['ID'] . "&chat_user=" . $row['Owner'] . "'\"><i class=\"fa fa-envelope\"></i><span class=\"tooltipp\">message owner</span></button>
						<button class=\"quick-view\" onclick=\"location.href='product.php?id=".$row['ID']."'\"><i class=\"fa fa-eye\"></i><span class=\"tooltipp\">quick view</span></button>";
				}
				echo "</div>
			</div>
		</div>
		<!-- /product -->";
			
				}
				echo"</div>
				
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
";

		}
	}
	setcookie( "category" , '' , time() - 3600);
?>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
