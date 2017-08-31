<?php
include_once('conn/db.php');

$id		= $_GET["id"];
$o_id 	= $_GET["o_id"];


		$qry = "DELETE FROM `tblproduct` WHERE id='".$id."'";
		mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		echo "<script type='text/javascript'>alert('Medicine deleted successfully');</script>";
		echo "<script type='text/javascript'>window.location='cart_summary.php?o_id=".$o_id."';</script>";
	
?>