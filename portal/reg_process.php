<?php
	include "admin_portal/config.php";

	$sql = "INSERT INTO non_pegawai (email,pswd,nama,area,bidang) 
			VALUES ('".$_POST['txt_email']."','".md5($_POST['txt_email'])."','".$_POST['txt_nama']."','".$_POST['txt_area']."','".$_POST['txt_bidang']."')";
	mysql_query($sql);
	
	echo '<script language="javascript">
			alert(\'Registrasi Berhasil\');
			window.location = "login.php";
			</script>';

?>