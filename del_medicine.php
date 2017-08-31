<?php
include_once('conn/db.php');

$m_id		= $_GET["m_id"];


		$qry = "Update `medicine` set status=1 WHERE m_id='".$m_id."'";
		mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		echo "<script type='text/javascript'>alert('Medicine deleted successfully');</script>";
		echo "<script type='text/javascript'>window.location='medicine_view.php';</script>";
	
?>