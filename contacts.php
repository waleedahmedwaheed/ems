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
		<title>EMS - Contact </title>
		
		<?php include('scripts.php'); ?>
	</head>
	
	<body>
		<div class="page">

			<?php include('header.php'); ?>

			<!-- page title -->
			<section class="page-title">
				<div class="grid-row clearfix">
					<h1>Contacts</h1>
					
					<nav class="bread-crumbs">
						<a href="index.php">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;
						<a href="#">Contacts</a>
					</nav>
				</div>
			</section>
			<!--/ page title -->
			
			<!-- page content -->
			<main class="page-content">
				<div class="grid-row">
					<!-- map -->
					<section class="map">
						<div class="widget-title">Our Locations</div>
						<div id="map" class="google-map"></div>
					</section>
					<!--/ map -->
				</div>
				
				<div class="grid-row">
					<div class="grid-col grid-col-9">
						<!-- feedback -->
						<article class="feedback">
							<div class="widget-title">Get in touch by filling the form below</div>
										
							<form action="" id="contactform">
								<fieldset>
									<div class="clearfix">
										<div class="input">
											<label>Your name:</label>
											<input type="text" name="name">
										</div>
										<div class="input">
											<label>Your email:</label>
											<input type="text" name="email">
										</div>
									</div>
									<div class="clearfix">
										<div class="input">
											<label>Category:</label>
											<input type="text" name="category">
										</div>
										<div class="input">
											<label>Subject:</label>
											<input type="text" name="subject">
										</div>
									</div>
									<label>Message:</label>
									<textarea rows="6" name="message"></textarea>
									<div class="clearfix captcha">
											<div class="captcha-wrapper">
												<iframe src="php/capcha.html" class="capcha-frame" name="capcha_image_frame" marginwidth="0" marginheight="0" frameborder="0"></iframe>

												<input class="verify" type="text" id="verify" name="verify" />
											</div>
											<button type="submit" class="button" value="Submit">Submit</button>
											
									</div>
								</fieldset>
							</form>							
						</article>
						<!--/ feedback -->
					</div>
					
					<div class="grid-col grid-col-3">						
						<!-- contacts -->
						<section class="widget widget-contacts">
							<div class="widget-title">Contact Details</div>
							<dl>
								<dt class="opened">EMS</dt>
								<dd>
									<ul>
										<li><i class="fa fa-map-marker"></i>365 Islamabad</li>
										<li><i class="fa fa-phone"></i>Call us: 92-343-5551441</li>
										<li><i class="fa fa-envelope"></i>E-mail: contact@ems.com.pk</li>
									</ul>
								</dd>
								
								
							</dl>
						</section>
						<!--/ contacts -->
						
						<!-- follow -->
						<section class="widget widget-follow">
							<ul>
								<li><a href="#"><i class="fa fa-rss"></i>150<br>Subscribers</a></li>
								<li><a href="#"><i class="fa fa-facebook"></i>5560<br>Fans</a></li>
								<li><a href="#"><i class="fa fa-twitter"></i>2300<br>Followers</a></li>
							</ul>
						</section>
						<!--/ follow -->
					</div>
				</div>
			</main>
			<!--/ page content -->

			<?php include('footer.php'); ?>

		</div>
		
		
		
	</body>
</html>