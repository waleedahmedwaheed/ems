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
		<title>EMS - Order Received </title>
		
		<?php include('scripts.php'); ?>
		<style>
		table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
td{
	padding: 12px;
    line-height: 28px;
    vertical-align: top;
    border-top: 1px solid #ddd;
	font-size: 15px;
    color: #5d5d5d;
}th{
	padding: 12px;
    line-height: 28px;
    vertical-align: top;
    border-top: 1px solid #ddd;
	font-size: 15px;
	font-weight: bold;
    color: #5d5d5d;
}


@media print{

body *{ visibility: hidden; }
#bprint *{ visibility: hidden; }

.page-content * {visibility: visible; }

.page-content  {position :absolute; top:40px; left:40px; }

}

</style>
		
		<script type='text/javascript'>

function printDiv(divname){

var printContents = document.getElementById(divname).innerHTML;

var originalContents = document.body.innerHTML;

document.body.innerHTML = printContents;

window.print();

document.body.innerHTML = originalContents;

}

</script>

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
						<a href="#">Order Received</a>
					</nav>
				</div>
			</section>
			<!--/ page title -->
			
			<!-- page content -->
			<main class="page-content vc_responsive">
				<div class="grid-row">	
						<!-- pricing table -->
						<div class="widget pricing-table wpb_content_element">
						<button onclick="window.print();" id="bprint"> <img src="img/print.png" alt="Print" /> </button>
					
							<div class="widget-title" style="text-align: center;border-left-style: none;">EMS</div>
							<div class="widget-title">Order Received</div>
							
							<?php
						$qrys = "SELECT * FROM `order` where o_id='".$_GET["o_id"]."'";
						 mysql_select_db($database_dbconfig, $dbconfig);
						$resultss = mysql_query($qrys);
						$rowss = mysql_fetch_assoc($resultss);
						$orderdate = $rowss["date"];
						$status = $rowss["status"];
						$o_ids = $rowss["o_id"];
						$address = $rowss["address"];
						$town = $rowss["town"];
						$state = $rowss["state"];
						$phone = $rowss["phone"];
						$zip = $rowss["zip"];
							?>
								
								<table>
								<tr>
								<td>Order</td>
								<td><?php echo $o_ids; ?></td>
								</tr>
								<tr>
								<td>Date</td>
								<td><?php echo date("jS F, Y", strtotime("$orderdate")); ?></td>
								</tr>
								<tr>
								<td>Total</td>
								<td>Rs. <?php
								$qryu = "SELECT sum(price) as cart FROM tblproduct WHERE o_id='".$_GET["o_id"]."'";
								mysql_select_db($database_dbconfig, $dbconfig);
								$resultu = mysql_query($qryu, $dbconfig) or die(mysql_error());
								$rowsu = mysql_fetch_assoc($resultu); 
								echo $rowsu["cart"]; ?></td>
								</tr>
								<tr>
								<td>Payment Method</td>
								<td>Cash on Delivery</td>
								</tr>
								</table>
								
							<div class="widget-title">Order Details</div>
							<table>
							
							<tr>
								<td>Medicine</td>
								<td>Total</td>
							</tr>
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
						$total = $price * $quantity;
						//$orderdate = date('jS \of F Y ');
			?>
							
								<tr>
								<td><?php echo $name; ?> * <?php echo $quantity; ?></td>
								<td>Rs. <?php echo $total; ?></td>
								</tr>
								
		<?php 
		$total_cart = $total_cart + $total;
		} ?>			
							</table>
							<div class="widget-title">Customer Details</div>
							
							<table>
								<tr>
								<td>Email</td>
								<td><?php echo $_SESSION['SESS_NAME']; ?></td>
								</tr>
								<tr>
								<td>Address</td>
								<td><?php echo $address; ?></td>
								</tr>
								<tr>
								<td>Town</td>
								<td><?php echo $town; ?></td>
								</tr>
								<tr>
								<td>State</td>
								<td><?php echo $state; ?></td>
								</tr>
								<tr>
								<td>Zip</td>
								<td><?php echo $zip; ?></td>
								</tr>
								<tr>
								<td>Phone</td>
								<td><?php echo $phone; ?></td>
								</tr>
								</table>
							
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