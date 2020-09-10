<?php
include "config.php";
include "function.php";
ini_set('session.gc_maxlifetime', 30*60);
session_start();
if($_SESSION["username"] == ""){
    echo '<script language="javascript">alert("MESSAGE : Session expired, please login again.")</script>';
	echo '<script language="javascript">window.location = "logout.php"</script>';		

}

$id_admin_area = $_SESSION['id_admin_area'];
$kdarea = $_SESSION['kdarea'];
$username = $_POST['username'];
if($_POST['password'] != "") $password = " ,password = md5('".$_POST['password']."')";
else $password = "";
$nama = $_POST['nama'];
$hak_akses = $_SESSION['hak_akses'];

$return_update_admin_area = update_admin_area($id_admin_area,$kdarea,$username,$password,$nama,$hak_akses);
if ($return_update_admin_area ==1) {
	echo '<script language="javascript">alert("Data Berhasil di Perbarui")</script>';
	echo '<script language="javascript">window.location = "index.php"</script>';
} else {
	echo '<script language="javascript">alert("Data gagal di Perbarui")</script>';
	echo '<script language="javascript">window.location = "index.php"</script>';	
} 


?>