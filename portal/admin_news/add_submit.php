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
	$file = $_FILES['file']['tmp_name'];
	$folder = "upload/".$_SESSION['kdarea']."_".date("Ym").".pdf";

	if(move_uploaded_file($file,$folder)){
		$nama_file_asli = $_FILES['file']['name'];
		$nama_file_rename = $_SESSION['kdarea']."_".date("Ym").".pdf";
		$judul = $_POST['judul'];
		$keterangan = $_POST['keterangan'];
		$tanggal_upload = date("d/m/Y");
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$kdarea = $_SESSION['kdarea'];
		$return_insert_data_file = insert_data_file($nama_file_asli,$nama_file_rename,$judul,$keterangan,$tanggal_upload,$bulan,$tahun,$kdarea);
		
		if ($return_insert_data_file ==1) {
			echo '<script language="javascript">alert("Data Berhasil di Upload")</script>';
			echo '<script language="javascript">window.location = "index.php"</script>';
		} else {
			echo '<script language="javascript">alert("Data gagal di Upload")</script>';
			echo '<script language="javascript">window.location = "index.php"</script>';
		} 
	}
}else if($_SESSION['hak_akses'] == "2"){
	$nama = $_POST['nama'];
	$kdarea = $_POST['kdarea'];
	$username = $_POST['username'];
	$password = " ,password = md5('".$_POST['password']."')";
	$hak_akses = $_POST['hak_akses'];
	
	$return_insert_admin_area = insert_admin_area($kdarea,$username,$password,$nama,$hak_akses);
	if ($return_insert_admin_area ==1) {
		echo '<script language="javascript">alert("Data Berhasil di tambah")</script>';
		echo '<script language="javascript">window.location = "index.php"</script>';
	} else {
		echo '<script language="javascript">alert("Data gagal di tambah")</script>';
		echo '<script language="javascript">window.location = "index.php"</script>';	
	} 
	
}
?>