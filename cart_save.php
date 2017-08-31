<?php
include_once('conn/db.php');

$quantity		= $_REQUEST["quantity"];
$m_id 			= $_REQUEST["m_id"];
$price 			= $_REQUEST["price"];
$m_id 			= $_REQUEST["m_id"];
$u_id 			= $_REQUEST["u_id"];
$date 			= date('Y-m-d H:i:s');

$new_price = $price * $quantity;
		$qry = "SELECT * FROM `order` WHERE u_id='".$u_id."' and status = '0'";
		mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		$rows = mysql_fetch_assoc($results);
		$o_id = $rows["o_id"];
		if($results) {
			if (mysql_num_rows($results) > 0) {
				//echo "<script type='text/javascript'>alert('Category already added');</script>";
				 $qrys = "INSERT INTO tblproduct(m_id,price,quantity,u_id,status,datetime,o_id) 
				 VALUES('$m_id','$new_price','$quantity','$u_id','0','$date','$o_id')";
					mysql_select_db($database_dbconfig, $dbconfig);
					if (mysql_query($qrys)) {
						echo "<script type='text/javascript'>alert('Medicine added successfully');</script>";
						echo "<script type='text/javascript'>window.location='medicines.php';</script>";
					} else {
						echo "Error: " . $qrys . "<br>" ;
					}
				}
				else{ 
					  $qrys = "INSERT INTO `ems`.`order` (`o_id`, `u_id`, `date`, `status`) VALUES ('', '$u_id','$date','0')";
					mysql_select_db($database_dbconfig, $dbconfig);
					if (mysql_query($qrys)) {
						
						$qry = "SELECT * FROM `order` WHERE u_id='".$u_id."' and status = '0'";
						 mysql_select_db($database_dbconfig, $dbconfig);
						$resultss = mysql_query($qry);
						$rowss = mysql_fetch_assoc($resultss);
						$o_ids = $rowss["o_id"];
						 $qryss = "INSERT INTO tblproduct(m_id,price,quantity,u_id,status,datetime,o_id) 
						VALUES('$m_id','$new_price','$quantity','$u_id','0','$date','$o_ids')";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qryss);
						echo "<script type='text/javascript'>alert('Medicine added successfully');</script>";
						echo "<script type='text/javascript'>window.location='medicines.php';</script>";
					} else {
						echo "Error: " . $qrys . "<br>" ;
					}
					  }
		 }
		else {
			die("Query failed");
		} 
		
	
?>