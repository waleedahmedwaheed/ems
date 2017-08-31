<?php include_once('conn/db.php'); 
include_once("functions.php");
error_reporting(0);
session_start();

if ( !isset($_SESSION['SESS_NAME']) ) {
	//header('location: login.php');
} else {
	
	echo $qry = "SELECT * FROM users WHERE email = '{$_SESSION['SESS_NAME']}'";
	mysql_select_db($database_dbconfig, $dbconfig);
	$result = mysql_query($qry, $dbconfig) or die(mysql_error());
	$user_arr = mysql_fetch_assoc($result);
	//exit;
}
?>
<!DOCTYPE html>
<html>
<head>
		<title>EMS - Medicine Detail </title>
		
		<?php include('scripts.php'); ?>
	</head>
	
	<body>
		<div class="page">

		<?php include('header.php'); ?>
			
			

			<!-- page title -->
			<section class="page-title">
				<div class="grid-row clearfix">
					<h1>Medicine Detail</h1>
					
					<nav class="bread-crumbs">
						<a href="index.php">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;
						<a href="medicines.php">Medicines</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;
						<a href="#">Detail</a>
					</nav>
				</div>
			</section>
			<!--/ page title -->
			
			<?php
			$qry = "SELECT * FROM medicine where m_id='".$_GET["m_id"]."'";
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
			
			?>
			
			<!-- page content -->
			<main class="page-content">
				<div class="grid-row">
					<div class="grid-col grid-col-9">
						<!-- photo tour -->
						<section class="widget photo-tour photo-tour-1">	
							<div class="widget-title"><?php echo $name; ?></div>
																	
							<div class="grid clearfix">
								<div class="item item2">
									<div class="pic">
										<img src="<?php if($image=="uploaded_files/"){ echo "img/medicine-icon.jpg"; } else { echo $image; } ?>" width="770" height="258" alt="EMS <?php echo $name; ?>">
									</div>
								</div>
							</div>
						</section>
						<!--/ photo tour -->
						<!-- details -->
						<section class="widget widget-details">
							<div class="widget-title">Description</div>
							<div class="text">
								<p><?php echo $descr; ?></p>
							
							</div>
						</section>
						<!--/ details -->
					</div>
					
					<div class="grid-col grid-col-3">
						<!-- departments -->
						<section class="widget widget-departments">
							<div class="widget-title">Details</div>
							<dl>
								<dt><i class="fa fa-medkit" title="Category"></i><?php echo get_title(category,$c_id); ?></dt>
								<dt><i class="fa fa-user-md" title="Issue Date"></i> <?php echo $issue_date; ?></dt>
								<dt><i class="fa fa-stethoscope" title="Expiry Date"></i> <?php echo $exp_date; ?></dt>
								<dt><i class="fa fa-heart" title="Type"></i><?php switch($type)
{
case 1: echo "Syrup"; break;   
case 2: echo "Tablet"; break;   
case 3: echo "Capsule"; break;   
case 4: echo "Nebulizer"; break;   
 
} ?></dt>
								<dt><i class="fa fa-scissors"></i><?php if($mg==""){ echo "Nil"; } else { echo $mg." MG"; } ?></dt>
								<dt><i class="fa fa-wheelchair" title="Price"></i>Rs. <?php echo $price; ?></dt>
								</dl>
						</section>
						<!--/ departments -->
					</div>
				</div>
				
				<div class="grid-row-sep"></div>
				
				<div class="grid-row">					
					<!-- related projects -->
					<section id="photo-tour" class="widget photo-tour photo-tour-4">
						<div class="widget-title">Related Medicines</div>
						
						<div class="grid">	
							
							<?php
							$qry = "SELECT * FROM medicine order by rand() Limit 4";
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
			$date = $rows["datetime"];
				?>
				
							<div class="item item1">
								<div class="pic">
									<img src="<?php echo $image; ?>" width="270" height="142" alt="EMS <?php echo $name; ?>">
									<div class="links">
										<ul>
											<li><a href="medicine_detail.php?m_id=<?php echo $m_id; ?>" class="fa fa-link"></a></li>										
										</ul>
									</div>
								</div>
								<h3><?php echo $name; ?></h3>
								<p><?php echo get_title(category,$c_id); ?></p>
							</div>
		<?php } ?>			
						
							
						</div>
					</section>
					<!--/ related projects -->
				</div>
			</main>
			<!--/ page content -->

			<?php include('footer.php'); ?>

		</div>
		
		
		
		
	</body>
</html>