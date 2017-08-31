<?php
include_once('conn/db.php');

function get_title($mode,$text){
switch($mode)
{
case category: $sql2 = "select type title from category where c_id ='$text'"; break;   
case u_id: 	   $sql2 = "select u_id title from users where email ='$text'"; break;   
 
}
$result = mysql_query($sql2);
//mysql_select_db($database_dbconfig, $dbconfig);
$rows = mysql_fetch_assoc($result);
$title	= $rows["title"];
return $title;
}
?>