<?php
include_once('conn/db.php');

$c_id		= $_GET["c_id"];


		$qry = "Update `category` set status=1 WHERE c_id='".$c_id."'";
		mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		echo "<script type='text/javascript'>alert('Record deleted successfully');</script>";
		echo "<script type='text/javascript'>window.location='category_view.php';</script>";
	
?>