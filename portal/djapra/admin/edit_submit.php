<?php
include "../lib/config.php";
include "../lib/function.php";
ini_set('session.gc_maxlifetime', 30*60);
session_start();
if($_SESSION["username"] == ""){
    echo '<script language="javascript">alert("MESSAGE : Session expired, please login again.")</script>';
	echo '<script language="javascript">window.location = "logout.php"</script>';		

}

if(isset($_GET['berita'])){
	
}else if(isset($_GET['user'])){
	
	$var_id_admin_djapra = $_POST['var_id_admin_djapra'];
	$var_kdarea = $_POST['var_kdarea'];
	$var_username = $_POST['var_username'];
	if($_POST['var_password'] != "") $var_password  = " ,password = md5('".$_POST['var_password']."')";
	else $var_password = "";
	$var_nama = $_POST['var_nama'];
	$var_hak_akses = $_POST['var_hak_akses'];
	
	$return_update_admin_djapra = update_admin_djapra($var_id_admin_djapra,$var_kdarea,$var_username,$var_password,$var_nama,$var_hak_akses);
	if ($return_update_admin_djapra ==1) {
		echo '<script language="javascript">alert("Data Berhasil di Perbarui")</script>';
		echo '<script language="javascript">window.location = "index.php?user"</script>';
	} else {
		echo '<script language="javascript">alert("Data gagal di Perbarui")</script>';
		echo '<script language="javascript">window.location = "index.php?user"</script>';	
	} 
}
?>