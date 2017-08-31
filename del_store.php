<?php
include_once('conn/db.php');

$s_id		= $_GET["s_id"];


		$qry = "Update `store` set status=1 WHERE s_id='".$s_id."'";
		mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		echo "<script type='text/javascript'>alert('Record deleted successfully');</script>";
		echo "<script type='text/javascript'>window.location='stores_view.php';</script>";
	
?>