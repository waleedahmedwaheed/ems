<?php
include_once('conn/db.php');

$address		= $_REQUEST["address"];
$town 			= $_REQUEST["town"];
$state 			= $_REQUEST["state"];
$zip 			= $_REQUEST["zip"];
$phone 			= $_REQUEST["phone"];
$o_id 			= $_REQUEST["o_id"];


		$qry = "Update `order` set address='$address',town='$town',state='$state',zip='$zip',phone='$phone',status = '1' WHERE o_id='".$o_id."'";
		mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		
		$qrys = "Update `tblproduct` set status = '1' WHERE o_id='".$o_id."'";
		mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qrys);
		
		echo "<script type='text/javascript'>alert('Order has been placed successfully');</script>";
		echo "<script type='text/javascript'>window.location='order_receive.php?o_id=".$o_id."';</script>";

		
	
?>