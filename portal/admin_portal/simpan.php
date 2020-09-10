<?
include "config.php";

$jenis = $_POST['jenis'];
//echo $jenis;

if($jenis=="new")
{
	$sql = "INSERT INTO `internal_link` (`id` , `parent_id` , `nama` , `deskripsi` , `link` , `icon` , `status` , `urut`)
			VALUES (
			NULL , 
			'".$_POST['parent_id']."',
			'".$_POST['nama']."', 
			'".$_POST['deskripsi']."', 
			'".$_POST['link']."', 
			'".$_POST['icon']."', 
			'".$_POST['status']."', 
			1000 )";
	//echo $sql;
	if(mysql_query($sql))
		header("location:index.php");
	else echo "Connection Error!!";
}

elseif($jenis=="edit")
{
	$sql = "UPDATE `internal_link` SET `parent_id` = '".$_POST['parent_id']."', 
			`nama` = '".$_POST['nama']."',
			`deskripsi` = '".$_POST['deskripsi']."' ,
			`link` = '".$_POST['link']."',
			`icon` = '".$_POST['icon']."',
			`status` = '".$_POST['status']."',
			`urut` = '".$_POST['order']."' WHERE `internal_link`.`id` =".$_POST['id']."";
	//echo $sql;
	if(mysql_query($sql))
		header("location:index.php");
	else echo "Connection Error!!";
}


?>
