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
		<title>EMS - Medicines </title>
		
		<?php include('scripts.php'); ?>
		
	</head>
	
	<body>
		<div class="page">

			<?php include('header.php'); ?>
			
			

			<!-- page title -->
			<section class="page-title">
				<div class="grid-row clearfix">
					<h1>Medicines</h1>
					
					<nav class="bread-crumbs">
						<a href="index.php">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;
						<a href="medicines.php">Medicines</a>
						
					</nav>
				</div>
			</section>
			<!--/ page title -->
			
			<!-- page content -->
			<main class="page-content">
				<div class="grid-row">
					<!-- photo tour -->
					<section id="photo-tour" class="widget photo-tour photo-tour-4">						
						<div class="grid">
							
							<?php
			if(!isset($_GET["view"])){
    $page = 1;
} else {
    $page = $_GET['view'];
}
	 if (isset($_GET["view"])) { $page  = $_GET["view"]; } else { $page=1; }; 
	$start_from = ($page-1) * 8; 
	
			$qry = "SELECT * FROM medicine where status=0 order by m_id desc Limit $start_from, 8";
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
<script>

$(document).ready(function (e) {
$("#userForm<?php echo $m_id; ?>").on('submit',(function(e) {
e.preventDefault();
$('#response<?php echo $m_id; ?>').show();
$.ajax({
url: "cart_save.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$("#loader").hide();
$('#userForm<?php echo $m_id; ?>')[0].reset();
$("#response<?php echo $m_id; ?>").html(data);
}
});

}));
});


</script>							
							<div class="item item2">
								<div class="pic">
									<img src="<?php if($image=="uploaded_files/"){ echo "img/medicine-icon.jpg"; } else { echo $image; } ?>" width="270" height="142" alt="EMS <?php echo $name; ?>">
									<div class="links">
										<ul>
											<li><a href="medicine_detail.php?m_id=<?php echo $m_id; ?>" class="fa fa-link"></a></li>										
										</ul>
									</div>
								</div>
								<h3><?php echo $name; ?></h3>
								<h3>Rs. <?php echo $price; ?></h3>
								
								<form method="post" id="userFrom<?php echo $m_id; ?>" action="cart_save.php" style="margin-top: 5px;">
								<input type="number" name="quantity" value="0" style="float: left;width: 33%;background: rgba(86, 54, 10, 0.12);padding: 1px 21px;height: 28px;color: black;" />
								<input type="hidden" name="m_id" value="<?php echo $m_id; ?>"  />
								<input type="hidden" name="price" value="<?php echo $price; ?>"  />
								<input type="hidden" name="u_id" value="<?php echo $user_arr['u_id']; ?>"  />
								<input type="submit" name="submit" value="Add to cart" class="button"  style="float: left;margin-top: 0px;padding: 1px 21px;" />
								</form>
								
								<?php //echo get_title(category,$c_id); ?>
								<span id="response<?php echo $m_id; ?>"> </span>
							</div>
	

	
		<?php } ?>				
							
							
							
							
						</div>
						
						 
            <?php 
$sql = "SELECT COUNT(m_id) FROM medicine"; 
mysql_select_db($database_dbconfig, $dbconfig);
$rs_result = mysql_query($sql, $dbconfig) or die(mysql_error());	 
$row2 = mysql_fetch_row($rs_result); 
$total_records = $row2[0]; 
$total_pages = ceil($total_records / 8); 

//echo $total_records; 

if($page > 1){
    
	
	?>
    
    <a href="medicines.php?view=<?php echo $prev = ($page - 1);?>" class="button"> < </a>
    <?php
}

 
for ($i=1; $i<=$total_pages; $i++) {  
      
	 if($page == $i){
		 ?>
<a class="button" href="#"><?php echo $page;?> </a>
     
      <?php  }
	else {		
            }
      
	?>

<?php
}; 

if($page < $total_pages){
  
	?>
    <a href="medicines.php?view=<?php echo $next = ($page + 1); ?>" class="button">></a>
   
    <?php
}
?>
        
		
						
					</section>
					<!--/ photo tour -->
				</div>
			</main>
			<!--/ page content -->

			
		<?php include('footer.php'); ?>
		</div>
		
		
		
		
	</body>
</html>