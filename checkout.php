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
		<title>EMS - Checkout </title>
		
		<?php include('scripts.php'); ?>
		
		<script>

$(document).ready(function (e) {
$("#userForm").on('submit',(function(e) {
e.preventDefault();
$('#response').show();
$("#loader").show();
$.ajax({
url: "checkout_save.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$("#loader").hide();
$('#userForm')[0].reset();
$("#response").html(data);
}
});

}));
});


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
						<a href="#">Checkout</a>
					</nav>
				</div>
			</section>
			<!--/ page title -->
			
			<!-- page content -->
			<main class="page-content vc_responsive">
				<div class="grid-row">	
						<!-- pricing table -->
						<div class="widget pricing-table wpb_content_element">
							<div class="widget-title">Checkout</div>
							<div class="grid-row">
					<div class="grid-col grid-col-9">
						<!-- feedback -->
						<article class="feedback">
							
							<form method="post" id="userForm">
								<fieldset>
									<div class="clearfix">
										<div class="input">
											<label>Address *</label>
											<input type="text" name="address" required >
										</div>
									</div>
									<div class="clearfix">
										<div class="input">
											<label>Town/City *</label>
											<input type="text" name="town" required >
										</div>
									</div>
									<div class="clearfix">
										<div class="input">
											<label>State/County *</label>
											<input type="text" name="state" required >
										</div>
									</div>
									<div class="clearfix">
										<div class="input">
											<label>Postcode/Zip *</label>
											<input type="text" name="zip" required >
										</div>
									</div>
									<div class="clearfix">
										<div class="input">
											<label>Phone *</label>
											<input type="text" name="phone" required >
										</div>
									</div>
									<input type="hidden" name="o_id" value="<?php echo $_GET["o_id"]; ?>" />
									<div>
										<label> <input type="radio" style="float: left;margin-right: 10px;" checked required > Cash on Delivery </label>
										<label> <input type="checkbox" style="float: left;margin-right: 10px;"  required > I’ve read and accept the terms & conditions </label>
									</div>
									<button type="submit" class="button" value="Submit" style="float:left;">Place Order</button>
									
								<span id="response"> </span>
           	
								</fieldset>
								</form>				
						</article>
						<!--/ feedback -->
					</div>
					
					
				</div>
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