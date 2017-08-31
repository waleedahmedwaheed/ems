<?php
include_once('conn/db.php');

$name 			= $_REQUEST["name"];
$c_id		= $_REQUEST["c_id"];
$issue_date		= $_REQUEST["issue_date"];
$exp_date		= $_REQUEST["exp_date"];
$type		= $_REQUEST["type"];
$mg		= $_REQUEST["mg"];
$desc		= $_REQUEST["desc"];
$price		= $_REQUEST["price"];
$date = date('Y-m-d H:i:s');
$action = $_REQUEST["action"];
$m_id = $_REQUEST["m_id"];

if($action=="update")
{
	$qrys = "UPDATE medicine set name='$name',c_id='$c_id',issue_date='$issue_date',exp_date='$exp_date',type='$type',mg='$mg',descr='$desc',price='$price'
	where m_id='$m_id'";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qrys);
					echo "<script type='text/javascript'>alert('Record updated successfully');</script>";
					echo "<script type='text/javascript'>window.location='medicine_view.php';</script>";
}
else if($action=="add")
{
$uploadOk = 1;
$size = 10*1024*1024;

if (!isset($_FILES['image1']['tmp_name'])) {
	$location1 = "";
	}else{
	if($_FILES["image1"]["size"] > $size ){
		$uploadOk = 0;
	}
	if($uploadOk==0){
		echo "Sorry, there was an error in uploading";
	} else{
		
	
	$file=$_FILES['image1']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image1']['tmp_name']));
	$image_name= addslashes($_FILES['image1']['name']);
	$image_size= getimagesize($_FILES['image1']['tmp_name']);

	
			
			move_uploaded_file($_FILES["image1"]["tmp_name"],"uploaded_files/" . $_FILES["image1"]["name"]);
			
			$location1="uploaded_files/" . $_FILES["image1"]["name"];
		}
	}
	

		 /* $qry = "SELECT * FROM users WHERE email='".$email."'";
		 mysql_select_db("ems", $dbconfig);
		$results = mysql_query($qry);
		if($results) {
			if (mysql_num_rows($results) > 0) {
				echo "<script type='text/javascript'>alert('Email already in use');</script>";
				}
				else{  */
					 $qrys = "INSERT INTO medicine(name,c_id,issue_date,exp_date,type,mg,descr,price,image,datetime) 
					VALUES('$name','$c_id','$issue_date','$exp_date','$type','$mg','$desc','$price','$location1','$date')";
					mysql_select_db($database_dbconfig, $dbconfig);
					if (mysql_query($qrys)) {
						echo "<script type='text/javascript'>alert('Medicine added successfully');</script>";
						echo "<script type='text/javascript'>window.location='add_medicine.php';</script>";
					} else {
						echo "Error: " . $qrys . "<br>" ;
					}
					/* }
		}
		else {
			die("Query failed");
		}  */
		
		//mysqli_close($conn);
}
?>