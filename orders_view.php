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
		<title>EMS - Orders </title>
		
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
						<button onclick="window.print();" id="bprint"> <img src="img/print.png" alt="Print" /> </button>
					
							<div class="widget-title" style="text-align: center;border-left-style: none;">EMS</div>
							<div class="widget-title">All Orders</div>
								
								<table>
								<tr>
								<th>ID</th>
								<th>Date</th>
								<th>Address</th>
								<th>Town</th>
								<th>State</th>
								<th>Zip</th>
								<th>Phone</th>
								</tr>
								
								<?php
								$qryu = "SELECT * FROM `order`";
								mysql_select_db($database_dbconfig, $dbconfig);
								$resultu = mysql_query($qryu, $dbconfig) or die(mysql_error());
								while($rowss = mysql_fetch_assoc($resultu))
								{
							
								$o_id = $rowss["o_id"];
								$orderdate = $rowss["date"];
								$status = $rowss["status"];
								$address = $rowss["address"];
								$town = $rowss["town"];
								$state = $rowss["state"];
								$phone = $rowss["phone"];
								$zip = $rowss["zip"];
								 ?>
								<tr>
								<td><a href="cart_summary_adm.php?o_id=<?php echo $o_id; ?>"><?php echo $o_id; ?></a></td>
								<td><?php echo $orderdate; ?></td>
								<td><?php echo $address; ?></td>
								<td><?php echo $town; ?></td>
								<td><?php echo $state; ?></td>
								<td><?php echo $zip; ?></td>
								<td><?php echo $phone; ?></td>
								</tr>
								<?php } ?>
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