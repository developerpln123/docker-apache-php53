<?php
ini_set('session.gc_maxlifetime', 30*60);
session_start();
include  "../lib/config.php";
include "../lib/function.php";
$get_var_username = $_POST['var_username'];
$get_var_password = $_POST['var_password'];

$admin = login($get_var_username,$get_var_password);


if($admin[0]['id_admin_djapra'] == ""){
	echo '<script language="javascript">alert("MESSAGE : Login Gagal, User tidak ditemukan. Silahkan ulangi kembali")</script>';
    echo '<script language="javascript">window.location = "login.php"</script>';
}else{
	$_SESSION['id_admin_djapra'] = $admin[0]['id_admin_djapra'];
	$_SESSION['kdarea'] = $admin[0]['kdarea'];
	$_SESSION['nama_area'] = $admin[0]['nama_area'];
	$_SESSION['username'] = $admin[0]['username'];
	$_SESSION['nama'] = $admin[0]['nama'];
	$_SESSION['hak_akses'] = $admin[0]['hak_akses'];
	echo '<script language="javascript">window.location = "index.php?berita"</script>';
}
?>