<?php include_once('conn/db.php'); 

session_start();

if ( !isset($_SESSION['SESS_NAME']) ) {
	//header('location: login.php');
} else {
	
	$qry = "SELECT * FROM users WHERE email = '{$_SESSION['SESS_NAME']}'";
	mysql_select_db($database_dbconfig, $dbconfig);
	$result = mysql_query($qry, $dbconfig) or die(mysql_error());
	$user_arr = mysql_fetch_assoc($result);
	//exit;
}
?>
<!DOCTYPE html>
<html>
<head>
		<title>EMS - Home <?php //echo $_SESSION['SESS_NAME']; ?></title>
		
		<?php include('scripts.php'); ?>
		
		

	</head>
	
	<body>
		<div class="page">

			<?php include('header.php'); ?>
			
			

			<!-- slider -->
			<div class="slider-wrapper">
				<section class="slider" id="slider">
					<div class="ls-slide" data-ls="transition2d:9;slidedelay:7000;">					
						<img src="pic/banner2.png" alt="" class="ls-bg">
						
						<div class="intro ls-l" data-ls="offsetyin:top;offsetxin:0;durationin:2000;offsetyout:bottom;offsetxout:0;durationout:1000;" style="left:80%;top:35%;">
							
						</div>
					</div>
					<div class="ls-slide" data-ls="transition2d:40;slidedelay:7000;">				
						<img src="pic/banner.png" alt="" class="ls-bg">
						
						<div class="intro ls-l" data-ls="scalexin:0.3;scaleyin:0.3;rotatexin:180;offsetxin:0;durationin:2000;durationout:2000;scalexout:2;scaleyout:2;offsetxout:0;fadeout:true;showuntil:3000;" style="left:80%;top:35%;">
							
						</div>
					</div>
					<div class="ls-slide" data-ls="transition2d:11;slidedelay:7000;">
						<img src="pic/medical-slide-3.jpg" alt="" class="ls-bg">
						
						<div class="intro ls-l" data-ls="skewxin:30;skewyin:0;offsetxin:right;fadein:false;durationin:2000;durationout:1000;offsetxout:right;offsetyout:0;fadeout:true;" style="left:80%;top:35%;">
							
						</div>
					</div>
				</section>
			</div>
			<!--/ slider -->
			
			<!-- page content -->
			<main class="page-content">
				<div class="grid-row">
					<!-- benefits -->
					<section class="benefits">
						<ul>
							<li>
								<div class="pic"><i class="fa fa-heart"></i></div>
								<div class="text">
									<h2>Support</h2>
									<a href="about-us.php" class="more"></a>
								</div>
							</li>
							<li>
								<div class="pic"><i class="fa fa-flask"></i></div>
								<div class="text">
									<h2>Best Quality</h2>
									<a href="about-us.php" class="more"></a>
								</div>
							</li>
							<li>
								<div class="pic"><i class="fa fa-stethoscope"></i></div>
								<div class="text">
									<h2>Fastest Delivery</h2>
									<a href="about-us.php" class="more"></a>
								</div>
							</li>
							<li>
								<div class="pic"><i class="fa fa-comments-o"></i></div>
								<div class="text">
									<h2>Customer Care</h2>
									<a href="about-us.php" class="more"></a>
								</div>
							</li>
						</ul>
					</section>
					<!--/ benefits -->
				</div>
				
				
				<div class="grid-row">
					<div class="grid-col grid-col-4">
						<!-- departments -->
						<section class="widget widget-departments">
							<div class="widget-title">About EMS</div>
							<dl>
								<dt><i class="fa fa-medkit"></i>What we really do?</dt>
								<dd>EMS is an full service online pharmacy in Pakistan with home delivery service offers 2 hours medicine delivery with in Islamabad.</dd>
								<dt><i class="fa fa-user-md"></i>Our Assets</dt>
								<dd>EMS in Pakistan proud of their team members who are committed to deliver medicines through home delivery and the service that they offer to our customers.</dd>
								<dt><i class="fa fa-stethoscope"></i>Our Vision</dt>
								<dd>We aims to deliver authentic products to our customers and save precious lives.</dd>
								<dt><i class="fa fa-heart"></i>Why EMS?</dt>
								<dd>Because it is your health which is at stake, we believe that Everyone has the right to buy genuine medicine without being worried about counterfeits</dd>
							</dl>
						</section>
						<!--/ departments -->
					</div>
					
					<div class="grid-col grid-col-4">
						<!-- sevices -->
						<section class="widget widget-sevices">
							<div class="widget-title">Our Medical Services</div>
							<ul>
							<?php
							$qry = "SELECT * FROM category order by rand() limit 6";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		while($rows = mysql_fetch_assoc($results))
		{
							?>
								<li><i class="fa fa-bookmark"></i><a href="services.php"><i class="fa fa-angle-right"></i><?php echo $rows["type"]; ?></a></li>
		<?php } ?>					
								
								<li><a href="services.php"> See more ...</a></li>
							</ul>
						</section>
						<!--/ sevices -->
					</div>
					
					<div class="grid-col grid-col-4">
						<!-- appointment -->
						<section class="widget widget-appointment">
							<div class="widget-title">Order Medicine</div>
							<form method="post" id="contactform">
								<fieldset>
									<div class="row">
										<input type="text" placeholder="Full Name" name="name">
										<i class="fa fa-user"></i>
									</div>
									<div class="row">
										<input type="tel" placeholder="Phone Number" name="phone">
										<i class="fa fa-phone"></i>
									</div>
									<div class="row">
										<input type="email" placeholder="Email Address" name="email">
										<i class="fa fa-envelope"></i>
									</div>
									<div class="row">
										<input type="text" placeholder="Appointment Date" name="date">
										<i class="fa fa-calendar"></i>
									</div>
									<div class="row">
										<textarea cols="30" rows="5" placeholder="Message" name="message"></textarea>
										<i class="fa fa-align-left"></i>
									</div>
									<div class="clearfix captcha">
										<button type="submit" class="button" value="Submit">Send Message</button>
										
									</div>
								</fieldset>
							</form>
						</section>
						<!--/ appointment -->	
					</div>
				</div>
			</main>
			<!--/ page content -->

			<?php include('footer.php'); ?>

		</div>
		
	</body>
</html>