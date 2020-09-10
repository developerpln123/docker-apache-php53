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
	
}else if($_SESSION['hak_akses'] == "2"){
	$id_admin_area = $_POST['id_admin_area'];
	$nama = $_POST['nama'];
	$kdarea = $_POST['kdarea'];
	$username = $_POST['username'];
	if($_POST['password'] != "") $password = " ,password = md5('".$_POST['password']."')";
	else $password = "";
	$hak_akses = $_POST['hak_akses'];
	
	$return_update_admin_area = update_admin_area($id_admin_area,$kdarea,$username,$password,$nama,$hak_akses);
	if ($return_update_admin_area ==1) {
		echo '<script language="javascript">alert("Data Berhasil di perbarui")</script>';
		echo '<script language="javascript">window.location = "index.php"</script>';
	} else {
		echo '<script language="javascript">alert("Data gagal di perbarui")</script>';
		echo '<script language="javascript">window.location = "index.php"</script>';	
	} 
	
}
?>