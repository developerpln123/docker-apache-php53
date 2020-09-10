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
	$file = $_FILES['var_foto']['tmp_name'];
	$folder = "../image_file/".$_POST['var_kdarea']."_".date("YmdHis").".jpg";

	if(move_uploaded_file($file,$folder)){
		$var_kdarea = $_POST['var_kdarea'];
		$var_judul_berita = $_POST['var_judul_berita'];
		$var_isi_berita = $_POST['var_isi_berita'];
		$var_plaintext = $_POST['var_plaintext'];
		$var_foto = $_POST['var_kdarea']."_".date("YmdHis").".jpg";
		$var_tanggal = date("Y-m-d");
		$var_bulan_tahun = date("Ym");
		$var_waktu= date("h:i:s");
		$var_user_input = $_SESSION['username'];
		
		$return_insert_data_djapra = insert_data_djapra($var_kdarea,$var_judul_berita,$var_isi_berita,$var_plaintext,$var_foto,$var_tanggal,$var_bulan_tahun,$var_waktu,$var_user_input);
		
		if ($return_insert_data_djapra ==1) {
			echo '<script language="javascript">alert("Data Berhasil di Upload")</script>';
			echo '<script language="javascript">window.location = "index.php?berita"</script>';
		} else {
			echo '<script language="javascript">alert("Data gagal di Upload")</script>';
			echo '<script language="javascript">window.location = "index.php?berita"</script>';
		} 
	}
}else if(isset($_GET['user'])){
	$var_nama = $_POST['var_nama'];
	$var_kdarea = $_POST['var_kdarea'];
	$var_username = $_POST['var_username'];
	$var_password = " ,password = md5('".$_POST['var_password']."')";
	$var_hak_akses = $_POST['var_hak_akses'];
	
	$return_insert_admin_djapra = insert_admin_djapra($var_kdarea,$var_username,$var_password,$var_nama,$var_hak_akses);
	if ($return_insert_admin_djapra ==1) {
		echo '<script language="javascript">alert("Data Berhasil di tambah")</script>';
		echo '<script language="javascript">window.location = "index.php?user"</script>';
	} else {
		echo '<script language="javascript">alert("Data gagal di tambah")</script>';
		echo '<script language="javascript">window.location = "index.php?user"</script>';	
	} 
}
?>