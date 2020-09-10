<?php
	include "../admin_portal/config.php";
	$bulan = date('m-Y', strtotime('-1 month'));
	$jumlah_pegawai = "0#";
	$jumlah_non_pegawai = "0#";
	
	for($i=0; $i<sizeof($_POST['peg']); $i++) {
		$jumlah_pegawai .= $_POST['peg'][$i] . "#";
		$jumlah_non_pegawai .= $_POST['non'][$i] . "#";
	}
	
	$sql = "UPDATE jml_pegawai SET jumlah_pegawai = '".$jumlah_pegawai."', jumlah_non_pegawai = '".$jumlah_non_pegawai."' WHERE bulan = '".$bulan."'";
	mysql_query($sql);
	
	header('Location: jumlah.php');
?>