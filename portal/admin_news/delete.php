<?php
include "config.php";
include "function.php";
ini_set('session.gc_maxlifetime', 30*60);
session_start();
if($_SESSION["username"] == ""){
    echo '<script language="javascript">alert("MESSAGE : Session expired, please login again.")</script>';
	echo '<script language="javascript">window.location = "logout.php"</script>';		

}
if($_SESSION['hak_akses'] == "1"){
	$id_data_file = $_GET['id_data_file'];
	$nama_file_rename = $GET['nama_file_rename'];

	$return_delete_data_file = delete_data_file($id_data_file);
	//unlink("upload/".$nama_file_rename);

		if ($return_delete_data_file ==1) {
			echo '<script language="javascript">alert("Data Berhasil di Hapus")</script>';
			echo '<script language="javascript">window.location = "index.php"</script>';
		} else {
			echo '<script language="javascript">alert("Data gagal di Hapus")</script>';
			echo '<script language="javascript">window.location = "index.php"</script>';
		} 
}else if($_SESSION['hak_akses'] == "2"){
	$id_admin_area = $_GET['id_admin_area'];
	$return_delete_admin_area = delete_admin_area($id_admin_area);
	
	if ($return_delete_admin_area ==1) {
		echo '<script language="javascript">alert("Data Berhasil di Hapus")</script>';
		echo '<script language="javascript">window.location = "index.php"</script>';
	} else {
		echo '<script language="javascript">alert("Data gagal di Hapus")</script>';
		echo '<script language="javascript">window.location = "index.php"</script>';
	} 
	
}

?>