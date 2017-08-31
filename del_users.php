<?php
include_once('conn/db.php');

$u_id		= $_GET["u_id"];


		$qry = "Update `users` set status=1 WHERE u_id='".$u_id."'";
		mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		echo "<script type='text/javascript'>alert('Record deleted successfully');</script>";
		echo "<script type='text/javascript'>window.location='users_view.php';</script>";
	
?>