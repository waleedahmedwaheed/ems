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
						<a href="#">Cart Summary</a>
					</nav>
				</div>
			</section>
			<!--/ page title -->
			
			<!-- page content -->
			<main class="page-content vc_responsive">
				<div class="grid-row">	
						<!-- pricing table -->
						<div class="widget pricing-table wpb_content_element">
							<div class="widget-title">Cart Summary</div>
							
							<div class="row">
								<!--
								--><div class="col col-4">
									<div class="head"><span>Medicine</span></div>
								
								</div><!--
								--><div class="col col-4">
									<div class="head"><span>Price</span></div>
								
									
								</div><!--
								--><div class="col col-4">
									<div class="head"><span>Quantity</span></div>
									
									
									
								</div><!--
								--><div class="col col-4">
									<div class="head"><span>Total</span></div>
								
									
									
								</div>
							</div>
							
							<?php
						$qry = "SELECT * FROM `tblproduct` b , `medicine` c where b.u_id = '".$user_arr['u_id']."' and b.o_id='".$_GET["o_id"]."' and b.m_id=c.m_id";
						 mysql_select_db($database_dbconfig, $dbconfig);
						$results = mysql_query($qry);
						while($rowso = mysql_fetch_assoc($results))
		{
						$id = $rowso["id"];
						$m_id = $rowso["m_id"];
						$price = $rowso["price"];
						$quantity = $rowso["quantity"];
						$o_id = $rowso["o_id"];
						$m_id = $rowso["m_id"];
						$name = $rowso["name"];
						$c_id = $rowso["c_id"];
						$issue_date = $rowso["issue_date"];
						$exp_date = $rowso["exp_date"];
						$type = $rowso["type"];
						$mg = $rowso["mg"];
						$descr = $rowso["descr"];
						$price = $rowso["price"];
						$image = $rowso["image"];
						$date = $rowso["datetime"];
						$status = $rowso["status"];
						//$orderdate = date('jS \of F Y ');
			?>
							<div class="row">
								<!--
								--><div class="col col-4">
									<div class="price">
										<div><a href="medicine_detail.php?m_id=<?php echo $m_id; ?>"><img src="<?php if($image=="uploaded_files/"){ echo "img/medicine-icon.jpg"; } else { echo $image; } ?>" width="80" height="80" alt=""></a>
										<p style="font-size: 14px;"><a href="medicine_detail.php?m_id=<?php echo $m_id; ?>"><?php echo $name; ?></a> </p>
									</div>
									</div>
									
									
								</div><!--
								--><div class="col col-4">
									<div class="price">
										<div style="font-size: 25px;"><sup>Rs</sup><?php echo $price; ?></div>
									</div>
									
									
								</div><!--
								--><div class="col col-4">
									<div class="price">
										<div style="font-size: 25px;"><?php echo $quantity; ?></div>
									</div>
									
									
								</div><!--
								--><div class="col col-4">
									<div class="price">
										<div style="font-size: 50px;"><sup>Rs</sup><?php echo $total = $price * $quantity; ?></div>
									<?php if($status==0){ ?>
									<a href="del_cart.php?id=<?php echo $id; ?>&o_id=<?php echo $o_id; ?>" onclick="return confirm('Are you sure to want to delete?')"> <img src="img/delete.png" alt="Delete" /> </a>
									<?php } ?>
									</div>
									
									
								</div>
							</div>
							
		<?php 
		$total_cart = $total_cart + $total;
		} ?>			
							
							<div class="row">
								<!--
								--><div class="col col-4" style="width: 73%;">
									<div class="price"><span>Total</span></div>
								</div>
								
								<div class="col col-4">
								<div class="price">
										<div style="font-size: 50px;"><sup>Rs</sup><?php echo $total_cart; ?></div>
									</div>
								</div>
							
							</div>
							
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