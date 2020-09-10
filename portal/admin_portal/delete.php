<?
include "config.php";

$sql = "DELETE FROM `internal_link` WHERE `internal_link`.`id` =".$_GET['id'];

if(mysql_query($sql))
		header("location:index.php");
	else echo "Connection Error!!";

?>