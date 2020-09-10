<?php
ini_set('session.gc_maxlifetime', 30*60);
session_start();
include  "../lib/config.php";
include "../lib/function.php";

$get_var_id_admin_djapra = $_SESSION['id_admin_djapra'];
$get_var_kdarea = $_SESSION['kdarea'];
$get_var_username = $_POST['var_username'];
if($_POST['var_password'] != "") $get_var_password  = " ,password = md5('".$_POST['var_password']."')";
else $get_var_password = "";
$get_var_nama = $_POST['var_nama'];
$get_var_hak_akses = $_SESSION['hak_akses'];

$return_update_admin_djapra = update_admin_djapra($get_var_id_admin_djapra,$get_var_kdarea,$get_var_username,$get_var_password,$get_var_nama,$get_var_hak_akses);
if ($return_update_admin_djapra ==1) {
	echo '<script language="javascript">alert("Data Berhasil di Perbarui")</script>';
	echo '<script language="javascript">window.location = "index.php?berita"</script>';
} else {
	echo '<script language="javascript">alert("Data gagal di Perbarui")</script>';
	echo '<script language="javascript">window.location = "index.php?berita"</script>';	
} 
?>