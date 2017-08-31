<?php
include_once('conn/db.php');

$name 			= $_REQUEST["type"];
$c_id 			= $_REQUEST["c_id"];
$action = $_REQUEST["action"];


if($action=="update")
{
	$qrys = "UPDATE category set type='".strtoupper($name)."' where c_id='$c_id'";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qrys);
					echo "<script type='text/javascript'>alert('Record updated successfully');</script>";
					echo "<script type='text/javascript'>window.location='category_view.php';</script>";
}
else if($action=="add")
{
	
		  $qry = "SELECT * FROM category WHERE type='".strtoupper($name)."'";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		if($results) {
			if (mysql_num_rows($results) > 0) {
				echo "<script type='text/javascript'>alert('Category already added');</script>";
				}
				else{  
					$qrys = "INSERT INTO category(type) VALUES('".strtoupper($name)."')";
					mysql_select_db("ems", $dbconfig);
					if (mysql_query($qrys)) {
						echo "<script type='text/javascript'>alert('Category added successfully');</script>";
						echo "<script type='text/javascript'>window.location='add_category.php';</script>";
					} else {
						echo "Error: " . $qrys . "<br>" ;
					}
					 }
		}
		else {
			die("Query failed");
		}  
		
}	
?>