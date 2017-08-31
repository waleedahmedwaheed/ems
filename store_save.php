<?php
include_once('conn/db.php');

$name 			= $_REQUEST["name"];
$location 			= $_REQUEST["location"];
$s_id 			= $_REQUEST["s_id"];
$action = $_REQUEST["action"];

if($action=="update")
{
	$qrys = "UPDATE store set name='$name',location='$location'	where s_id='$s_id'";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qrys);
					echo "<script type='text/javascript'>alert('Record updated successfully');</script>";
					echo "<script type='text/javascript'>window.location='stores_view.php';</script>";
}
else if($action=="add")
{
		  /* $qry = "SELECT * FROM category WHERE type='".strtoupper($name)."'";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		if($results) {
			if (mysql_num_rows($results) > 0) {
				echo "<script type='text/javascript'>alert('Category already added');</script>";
				}
				else{ */  
					 $qrys = "INSERT INTO store(name,location) VALUES('$name','$location')";
					mysql_select_db($database_dbconfig, $dbconfig);
					if (mysql_query($qrys)) {
						echo "<script type='text/javascript'>alert('Medical store added successfully');</script>";
						echo "<script type='text/javascript'>window.location='add_store.php';</script>";
					} else {
						echo "Error: " . $qrys . "<br>" ;
					}
					 /* }
		}
		else {
			die("Query failed");
		}   */
		
}
?>