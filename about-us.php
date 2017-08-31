<?php include_once('conn/db.php'); 
include_once("functions.php");
//error_reporting(0);
session_start();
$u_ids = $_SESSION['SESS_NAME'];
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
		<title>EMS - About Us </title>
		
		<?php include('scripts.php'); ?>
	</head>
	
	<body>
		<div class="page">

			<?php include('header.php'); ?>

			<!-- page title -->
			<section class="page-title">
				<div class="grid-row clearfix">
					<h1>About us</h1>
					
					<nav class="bread-crumbs">
						<a href="index.php">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;
						<a href="#">About Us</a>
					</nav>
				</div>
			</section>
			<!--/ page title -->

			<main class="page-content">
				<div class="grid-row">
					<div class="grid-col grid-col-5">
						<!-- philosophy -->
						<section class="widget">	
							<div class="widget-title">Our Philosophy</div>
							
							<div class="wpb_text_column wpb_content_element">
								<div class="wpb_wrapper">			
									<img src="img/about.png" width="260" height="246" alt="" class="alignleft">
									<h1>
									<b>Some Words About Us</b>
									</h1>
									<p>
									EMS is committed to deliver its customers the very best prices on the best brands and original medicines in Islamabad, Pakistan. We are committed to provide the best pharmacy service online. Like EMS no other online pharmacy in Pakistan can match our level of customer service, and industry-only policies like 2 hours delivery city wide, free delivery on orders above 3000, price gurantee and a hassle-free return policy.</p>
									<br/>
									<h1>
									<b>What we really do?</b>
									</h1>
									<p>
									EMS is an full service online pharmacy in Pakistan with home delivery service offers 2 hours medicine delivery with in Karachi. You can place your order on phone or our intuitive website to get medicines at your home. 
									</p><br>
								</div>
								
							</div>
						</section>
						<!--/ philosophy -->
					</div>
					
					<hr>
				</div>
				
					<div class="grid-row">
						<!-- callout -->
						<div class="callout wpb_content_element">
							<div class="icon"><i class="fa fa-user-md"></i></div>
							<div class="callout-wrapper">
								<div class="callout-content">
									<div class="title">EMS strives to provide a high standard</div>
									<div class="subtitle">We aims to deliver authentic products to our customers and save precious lives.</div>
								</div>
								
							</div>
						</div>
						<!--/ callout -->
					</div>
					<div class="grid-row">
						<div class="grid-col grid-col-4">
						<!-- categories -->
						<section class="widget widget-sevices">
							<div class="widget-title">Why Choose EMS?</div>
							<ul>
								<li><i class="fa fa-bookmark"></i><a href="#">We are in introductory phase and delivering orders placed between 11:am to 6:pm.</a></li>
								<li><i class="fa fa-bookmark"></i><a href="#">We are committed to deliver best quality products at your convenience</a></li>
								<li><i class="fa fa-bookmark"></i><a href="#">We aims to deliver all orders with in 2 hours after order confirmation.</a></li>
								<li><i class="fa fa-bookmark"></i><a href="#">You can reach us by filling up a form on our contact  page or alternatively you can also send us an email at order@ems.com.pk</a></li>
								<li><i class="fa fa-bookmark"></i><a href="#">We are also available over phone 0343 5551441</a></li>
							</ul>
						</section>
						<!--/ categories -->
						</div>
						<div class="grid-col grid-col-4">
						<!-- help -->
						<section class="widget widget-comments">
							<div class="widget-title">About EMS</div>
							<div id="help-carousel" class="owl-carousel">
								<div class="item">
									<ul>
										<li>
											<img src="img/blue/logo.png" alt="">
											<p>Our mission is to provide integrated pharmacy services with Convenience and Quality.</p>
										</li>
										<li>
											<img src="img/blue/logo.png" alt="">
											<p>Only qualified pharmacists handle all our pharmaceutical products, including procurement, storage, and dispensing. </p>
										</li>
									</ul>
								</div>
								<div class="item">
									<ul>
										<li>
											<img src="img/blue/logo.png" alt="">
											<p>We only procure our medicines directly from manufacturers or their distributors. </p>
										</li>
										<li>
											<img src="img/blue/logo.png" alt="">
											<p>All your pharmaceutical needs are met at your doorstep by our trained riders, in safe and hygienic conditions.</p>
										</li>
									</ul>
								</div>
								
							</div>
						</section>
						<!--/ help -->
						</div>
						<div class="grid-col grid-col-4">
							<!-- testimonial -->
							<div class="widget testimonial">
								<div class="clearfix">
									<img src="img/bag.png" width="96" height="96" alt="">
									<p>EMS in Pakistan proud of their team members who are committed to deliver medicines through home delivery and the service that they offer to our customers. They made this dream of an online pharmacy in Pakistan make happen.</p>
								</div>
								<div class="author">Our Assets</div>
							</div>
							<!--/ testimonial -->
						</div>
					</div>
			</main>

<?php include('footer.php'); ?>


		</div>
		
		
		
		
		
	</body>
</html>