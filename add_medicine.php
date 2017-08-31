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
		<title>EMS - Medicines</title>
		
		<?php include("scripts.php"); ?>
		
		<!--/ styles -->
		
		<!--[if lt IE 9]><script src="js/html5.js"></script><![endif]-->
		
		<script>

$(document).ready(function (e) {
$("#userForm").on('submit',(function(e) {
e.preventDefault();
$('#response').show();
$("#loader").show();
$.ajax({
url: "medicine_save.php", // Url to which the request is send
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

<?php 

if(isset($_GET["m_id"]))
{
	$m_ids = $_GET["m_id"];
	
	$qry = "SELECT * FROM medicine where m_id='".$m_ids."'";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		$rows = mysql_fetch_assoc($results);
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
			
			$phpdate = strtotime( $issue_date );
			$issue_dates = date( 'Y-m-d', $phpdate );
			
			$phpdates = strtotime( $exp_date );
			$exp_dates = date( 'Y-m-d', $phpdates );
			
			//$timestamp = strtotime($issue_date);
}

?>	
	</head>
	
	<body>
		<div class="page">

			<?php include("header.php"); ?>
			

			<!-- page title -->
			<section class="page-title">
				<div class="grid-row clearfix">
					<h1>My Account </h1>
					
					<nav class="bread-crumbs">
						<a href="index.php">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;
						<a href="#">Medicines</a>
					</nav>
				</div>
			</section>
			<!--/ page title -->
			
			<!-- page content -->
			<main class="page-content">
				
				
				<div class="grid-row">
					<div class="grid-col grid-col-9">
						<!-- feedback -->
						<article class="feedback">
							<div class="widget-title">Get in touch with us and you'll be able to </div>
										
							<p>
							Speed your way through the checkout and 
							track your orders easily with 
							keep a record of all your purchases
							</p>
							
							<form method="post" id="userForm" enctype="multipart/form-data">
								<fieldset>
									<div class="clearfix">
										<div class="input">
											<label>Name *</label>
											<input type="text" name="name" value="<?php echo $name; ?>" required >
										</div>
									</div>
									<div class="clearfix">
										<div class="select">
											<label>Category *</label>
											<select name="c_id" >
											<option value="">--Select--</option>
											<?php 
			$qry = "SELECT * FROM category";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		while($rows = mysql_fetch_assoc($results))
		{
											?>
											<option value="<?php echo $rows["c_id"]; ?>" <?php if($c_id==$rows["c_id"]){ echo "selected";} ?>><?php echo $rows["type"]; ?></option>
		<?php } ?>						
											</select>
										</div>
									</div>
									
									<div class="clearfix">
										<div class="date">
											<label>Issue Date *</label>
											<input type="date" name="issue_date" value="<?php echo $issue_dates; ?>" required >
										</div>
									</div>
									
									<div class="clearfix">
										<div class="date">
											<label>Expiray Date *</label>
											<input type="date" name="exp_date" value="<?php echo $exp_dates; ?>" required >
										</div>
									</div>
									
									<div class="clearfix">
										<div class="select">
											<label>Type *</label>
											<select name="type" required>
											<option value="">--Select--</option>
											<option value="1" <?php if($type==1){ echo "selected";} ?>>Syrup</option>
											<option value="2" <?php if($type==2){ echo "selected";} ?>>Tablet</option>
											<option value="3" <?php if($type==3){ echo "selected";} ?>>Capsule</option>
											<option value="4" <?php if($type==4){ echo "selected";} ?>>Nebulizer</option>
											</select>
										</div>
									</div>
									
									<div class="clearfix">
										<div class="input">
											<label>Mg *</label>
											<input type="text" name="mg" value="<?php echo $mg; ?>" >
										</div>
									</div>
									
									<div class="clearfix">
										<div class="input">
											<label>Description *</label>
											<textarea name="desc"> <?php echo $descr; ?> </textarea>
										</div>
									</div>
									
									<div class="clearfix">
										<div class="input">
											<label>Price *</label>
											<input type="text" name="price" value="<?php echo $price; ?>" required >
										</div>
									</div>
									
									<div class="clearfix">
										<div class="input">
											<label>Attach Image </label>
											 <input id="file" type="file" name="image1" accept="image/jpg,image/png,image/jpeg,image/gif" >
										</div>
									</div>
									
											<?php if(isset($_GET["m_id"]))
											{ ?>
											<input type="hidden" name="action" value="update" />
											<input type="hidden" name="m_id" value="<?php echo $m_ids; ?>" />
											<?php } else { ?>
											<input type="hidden" name="action" value="add" />
											<?php } ?>
											
											<?php if(isset($_GET["m_id"]))
											{ ?>
											<button type="submit" class="button" value="Submit" style="float:left;">Update</button>
											<?php } else { ?>
											<button type="submit" class="button" value="Submit" style="float:left;">Add</button>
											<?php } ?>
				<span id="response" > </span>
           
									
								</fieldset>
							</form>							
						</article>
						<!--/ feedback -->
					</div>
					
					
				</div>
			</main>
			<!--/ page content -->
		<?php include('footer.php'); ?>

		</div>
	</body>
</html>