<!-- page header -->
			<header class="page-header main-page sticky">
				<div class="sticky-wrapp">
					<div class="sticky-container">
						<!-- logo -->
						<section id="logo" class="logo">
							<div>
								<a href="index.php"><img src="img/blue/logo.png" alt="EMS"></a>
							</div>
						</section>
						<!--/ logo -->
						
						<!-- main nav -->
						<nav class="main-nav">
							<ul>
								<li>
									<a href="index.php">Home</a>
								</li>
								<li>
									<a href="services.php">Services</a>
								</li>
								
								<li>
									<a href="medicines.php">Medicines</a>
								</li>
								
								<li class="right">
									<a href="about-us.php">About Us</a>
								</li>
								<li>
									<a href="contacts.php">Contacts</a>
								</li>
								<?php if  ((isset($_SESSION['SESS_NAME']) ) and ($_SESSION['SESS_NAME']=="admin@ems.com")) {
 ?>								
								<li>
									<a href="#"><i class="fa fa-plus"></i>Data Entry</a>
									<ul>
										<li><a href="add_medicine.php">Add Medicines</a></li>
										<li><a href="add_store.php">Add Stores</a></li>
										<li><a href="add_category.php">Add Category</a></li>
									</ul>
								</li>
								
								<li>
									<a href="#"><i class="fa fa-plus"></i>Listings</a>
									<ul>
										<li><a href="users_view.php">Users</a></li>
										<li><a href="medicine_view.php">Medicines</a></li>
										<li><a href="stores_view.php">Stores</a></li>
										<li><a href="category_view.php">Category</a></li>
										<li><a href="orders_view.php">Orders</a></li>
									</ul>
								</li>
 
								<?php } ?>
								<?php if ( !isset($_SESSION['SESS_NAME']) ) {
 ?>
            <li><a><i class="fa fa-plus"></i>Account</a>
			<ul>
			 <li><a href="login.php">Login</a></li>
			 <li><a href="register.php">Register</a></li>
			</ul>
			</li>
	<?php } else {
 ?>			
			<li><a><i class="fa fa-plus"></i>Account</a>
			<ul>
            <li><a href="cart.php">Cart Rs. <?php 
	$qryu = "SELECT sum(price) as cart FROM tblproduct WHERE u_id = '".$user_arr["u_id"]."' and status='0'";
	mysql_select_db($database_dbconfig, $dbconfig);
	$resultu = mysql_query($qryu, $dbconfig) or die(mysql_error());
	$rowsu = mysql_fetch_assoc($resultu); 
	echo $rowsu["cart"];
	?>
	</a></li>
            <li><a href="logout.php">Logout</a></li>
			</ul>
			</li>
	<?php } ?>
							</ul>
						</nav>
						<!--/ main nav -->
						
						<!-- mobile nav -->
						<nav id="mobile-main-nav" class="mobile-main-nav">
							<i class="fa fa-bars"></i><a href="#" class="opener">Navigation</a>
							<ul>
								<li>
									<a href="index.php">Home</a>
								</li>
								<li>
									<a href="services.php">Services</a>
								</li>
								
								<li>
									<a href="medicines.php">Medicines</a>
								</li>
								
								<li class="right">
									<a href="about-us.php">About Us</a>
								</li>
								<li>
									<a href="contacts.php">Contacts</a>
								</li>
								<?php if  ((isset($_SESSION['SESS_NAME']) ) and ($_SESSION['SESS_NAME']=="admin@ems.com")) {
 ?>								
								<li>
									<a href="#"><i class="fa fa-plus"></i>Data Entry</a>
									<ul>
										<li><a href="add_medicine.php">Add Medicines</a></li>
										<li><a href="add_store.php">Add Stores</a></li>
										<li><a href="add_category.php">Add Category</a></li>
									</ul>
								</li>
								
								<li>
									<a href="#"><i class="fa fa-plus"></i>Listings</a>
									<ul>
										<li><a href="users_view.php">Users</a></li>
										<li><a href="medicine_view.php">Medicines</a></li>
										<li><a href="stores_view.php">Stores</a></li>
										<li><a href="category_view.php">Category</a></li>
										<li><a href="orders_view.php">Orders</a></li>
									</ul>
								</li>
 
								<?php } ?>
								<?php if ( !isset($_SESSION['SESS_NAME']) ) {
 ?>
            <li><a><i class="fa fa-plus"></i>Account</a>
			<ul>
			 <li><a href="login.php">Login</a></li>
			 <li><a href="register.php">Register</a></li>
			</ul>
			</li>
	<?php } else {
 ?>			
			<li><a><i class="fa fa-plus"></i>Account</a>
			<ul>
            <li><a href="cart.php">Cart Rs. <?php 
	$qryu = "SELECT sum(price) as cart FROM tblproduct WHERE u_id = '".$user_arr["u_id"]."' and status='0'";
	mysql_select_db($database_dbconfig, $dbconfig);
	$resultu = mysql_query($qryu, $dbconfig) or die(mysql_error());
	$rowsu = mysql_fetch_assoc($resultu); 
	echo $rowsu["cart"];
	?>
	</a></li>
            <li><a href="logout.php">Logout</a></li>
			</ul>
			</li>
	<?php } ?>
							</ul>
						</nav>
						<!--/ mobile nav -->
					</div>
				</div>
			</header>
			<!--/ page header -->