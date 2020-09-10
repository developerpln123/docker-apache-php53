<?php
include "../lib/config.php";
include "../lib/function.php";
ini_set('session.gc_maxlifetime', 30*60);
session_start();

if(isset($_GET['id_data_djapra'])){
	$id_data_djapra= $_GET['id_data_djapra'];

	$return_delete_data_djapra = delete_data_djapra($id_data_djapra);
	//unlink("upload/".$nama_file_rename);

	if ($return_delete_data_djapra ==1) {
		echo '<script language="javascript">alert("Data Berhasil di Hapus")</script>';
		echo '<script language="javascript">window.location = "index.php?berita"</script>';
	} else {
		echo '<script language="javascript">alert("Data gagal di Hapus")</script>';
		echo '<script language="javascript">window.location = "index.php?berita"</script>';
	} 
} else if(isset($_GET['id_admin_djapra'])){
	$id_admin_djapra= $_GET['id_admin_djapra'];

	$return_delete_admin_djapra = delete_admin_djapra($id_admin_djapra);
	//unlink("upload/".$nama_file_rename);

	if ($return_delete_admin_djapra ==1) {
		echo '<script language="javascript">alert("Data Berhasil di Hapus")</script>';
		echo '<script language="javascript">window.location = "index.php?user"</script>';
	} else {
		echo '<script language="javascript">alert("Data gagal di Hapus")</script>';
		echo '<script language="javascript">window.location = "index.php?user"</script>';
	} 
}
?>