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
		<title>EMS - Services </title>
		
		<?php include('scripts.php'); ?>

	</head>
	
	<body>
		<div class="page">

			
			<?php include('header.php'); ?>

			<!-- page title -->
			<section class="page-title">
				<div class="grid-row clearfix">
					<h1>services</h1>
					
					<nav class="bread-crumbs">
						<a href="index.php">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;
						<a href="#">Services</a>
					</nav>
				</div>
			</section>
			<!--/ page title -->

			<main class="page-content">
				<div class="grid-row">
					<div class="grid-col grid-col-9">
						<section class="detailed-services wpb_content_element">
							<div class="widget-title">Our Services</div>
							<dl>
								
								<?php
		$qry = "SELECT * FROM medicine order by name";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		while($rows = mysql_fetch_assoc($results))
		{
			$m_id = $rows["m_id"];
			$name = $rows["name"];
			$c_id = $rows["c_id"];
			$issue_date = $rows["issue_date"];
			$exp_date = $rows["exp_date"];
			$type = $rows["type"];
			$mg = $rows["mg"];
			$descr = $rows["descr"];
			$price = $rows["price"];
			$image = $rows["image"];
								?>
								
								<dt id="service5"><i class="fa fa-check"></i><?php echo $name; ?></dt>
								<dd>
									<div class="details">
										<div class="clearfix">
											<img src="<?php if($image=="uploaded_files/"){ echo "img/medicine-icon.jpg"; } else { echo $image; } ?>" width="185" height="110" alt="">
											<ul>
												<li><?php echo get_title(category,$c_id); ?></li>
												<li>Rs. <?php echo $price; ?></li>
												<li><?php switch($type)
{
case 1: echo "Syrup"; break;   
case 2: echo "Tablet"; break;   
case 3: echo "Capsule"; break;   
case 4: echo "Nebulizer"; break;   
 
} ?></li>
											</ul>
											<ul>
												<li><?php echo date("jS F, Y", strtotime("$issue_date")); ?></li>
												<li><?php echo date("jS F, Y", strtotime("$exp_date")); ?></li>
											</ul>
										</div>
									</div>
								</dd>
								
		<?php } ?>					
								
							</dl>
						</section>
						
					</div>

					<div class="grid-col grid-col-3">
						

						<!-- categories -->
						<section class="widget widget-sevices">
							<div class="widget-title">Categories</div>
							<ul>
							<?php
							$qry = "SELECT * FROM category order by type";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		while($rows = mysql_fetch_assoc($results))
		{
			?>
								<li><i class="fa fa-bookmark"></i><a href="#"><i class="fa fa-angle-right"></i><?php echo $rows["type"]; ?></a></li>
		<?php } ?>						
								</ul>
						</section>
						<!--/ categories -->
						

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

<?php include('footer.php'); ?>
			</div>
			
		
	</body>
</html>