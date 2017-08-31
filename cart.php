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
		<title>EMS - Cart </title>
		
		<?php include('scripts.php'); ?>
	</head>
	
	<body>
		<div class="page">

		<?php include('header.php'); ?>
		
			

			<!-- page title -->
			<section class="page-title">
				<div class="grid-row clearfix">
					<h1>My Account</h1>
					
					<nav class="bread-crumbs">
						<a href="index.php">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;
						<a href="#">Orders</a>
					</nav>
				</div>
			</section>
			<!--/ page title -->
			
			<!-- page content -->
			<main class="page-content vc_responsive">
				<div class="grid-row">	
						<!-- pricing table -->
						<div class="widget pricing-table wpb_content_element">
							<div class="widget-title">Recent Orders</div>
							
							<?php
						$qry = "SELECT * FROM `order` where u_id = '".$user_arr['u_id']."' order by status";
						 mysql_select_db($database_dbconfig, $dbconfig);
						$results = mysql_query($qry);
						while($rowso = mysql_fetch_assoc($results))
		{
						$orderdate = $rowso["date"];
						$status = $rowso["status"];
						$o_id = $rowso["o_id"];
						//$orderdate = date('jS \of F Y ');
			?>
							<div class="row">
								<!--
								--><div class="col col-4">
									<div class="head"><span>Order</span></div>
									<div class="price">
										<div><a href="cart_summary.php?o_id=<?php echo $o_id; ?>"><?php echo $rowso["o_id"]; ?></a></div>
									</div>
									
									
								</div><!--
								--><div class="col col-4">
									<div class="head"><span>Date</span></div>
									<div class="price">
										<div style="font-size: 25px;"><?php echo date("jS F, Y", strtotime("$orderdate")); ?></div>
									</div>
									
									
								</div><!--
								--><div class="col col-4">
									<div class="head"><span>Status</span></div>
									<div class="price">
										<div style="font-size: 25px;"><?php switch($status)
										{
										case 0: echo "Pending"; break;   
										case 1: echo "Approved"; break;   
										} ?></div>
									</div>
									
									
								</div><!--
								--><div class="col col-4">
									<div class="head"><span>Total</span></div>
									<div class="price">
										<div style="font-size: 50px;"><sup>Rs</sup><?php
										$qryu = "SELECT sum(price) as cart FROM tblproduct WHERE u_id = '".$user_arr["u_id"]."' and o_id='".$o_id."'";
	mysql_select_db($database_dbconfig, $dbconfig);
	$resultu = mysql_query($qryu, $dbconfig) or die(mysql_error());
	$rowsu = mysql_fetch_assoc($resultu); 
	echo $rowsu["cart"]; ?></div>
									</div>
									
									
								</div>
							</div>
							<?php if($status==0){ ?>
							<div class="join">
										<a href="checkout.php?o_id=<?php echo $o_id; ?>">
											<button class="wpb_button wpb_btn-large">Proceed to checkout</button>
										</a>
									</div>
								<?php } ?>
		<?php } ?>				
						</div>
						
						
						<!--/ pricing table -->

						<div class="grid-row-sep"></div>

						
				</div>
			</main>
			<!--/ page content -->

			
			<?php include('footer.php'); ?>

		</div>
		
		
		
	</body>
</html>