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
		<title>EMS - Category</title>
		
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
url: "category_save.php", // Url to which the request is send
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

if(isset($_GET["c_id"]))
{
	$c_ids = $_GET["c_id"];
	
	$qry = "SELECT * FROM category where c_id='".$c_ids."'";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		$rows = mysql_fetch_assoc($results);
			$c_id = $rows["c_id"];
			$type = $rows["type"];
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
						<a href="#">Category</a>
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
							<div class="widget-title">Categories </div>
										
							
							<form method="post" id="userForm">
								<fieldset>
									<div class="clearfix">
										<div class="input">
											<label>Category Name *</label>
											<input type="text" name="type" value="<?php echo $type; ?>" required >
										</div>
									</div>
									
									
											<?php if(isset($_GET["c_id"]))
											{ ?>
											<input type="hidden" name="action" value="update" />
											<input type="hidden" name="c_id" value="<?php echo $c_ids; ?>" />
											<?php } else { ?>
											<input type="hidden" name="action" value="add" />
											<?php } ?>
											
											<?php if(isset($_GET["c_id"]))
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