<?php
	session_start();
	include 'admin_portal/config.php';
	
	if($_SESSION['pegawai'] != 'Pegawai') {
		// session khusus guest...
		$_SESSION['pegawai'] = 'non';
		$_SESSION['pid'] = '-';
		$_SESSION['plog'] = date('d-m-Y H:i');
		$_SESSION['pnama'] = '-';
		$_SESSION['pemail'] = '-';
		$_SESSION['parea'] = '-';
	} else {
		$keterangan = null;
		$ip = get_ip_user();
		$browser = get_browser_user();
		$kdarea = select_kdarea($_SESSION['parea']);
		$sql3 = "INSERT INTO log_pegawai (nip,nama,ip,browser,waktu,counter,keterangan,status,nama_area,kdarea)
				VALUES ('".$_SESSION['pid']."','".$_SESSION['pnama']."','".$ip."','".$browser."','".$_SESSION['plog']."','".$_SESSION['pcounter']."','".$_SESSION['pemail']."','0','".$_SESSION['parea']."','".$kdarea."')";
		mysql_query($sql3);
	}
	
	echo '<script language="javascript">window.location = "index.php"</script>';
	
	function get_ip_user(){
		//GET IP USER
		if (getenv("HTTP_CLIENT_IP"))
			$ip = getenv("HTTP_CLIENT_IP");
		else if(getenv("HTTP_X_FORWARDED_FOR"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else if(getenv("REMOTE_ADDR"))
			$ip = getenv("REMOTE_ADDR");
		else
			$ip = "UNKNOWN";
		return $ip;
	}
	
	function get_browser_user(){
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		if (preg_match('/MSIE/i', $user_agent)) { 
			$browser = "Internet Explorer";
		} else if (preg_match('/Firefox/i', $user_agent)) { 
			$browser = "Modzilla Firefox";
		} else if (preg_match('/Chrome/i', $user_agent)) { 
			$browser = "Google Chrome";
		} else if (preg_match('/Opera/i', $user_agent)) { 
			$browser = "Opera";
		} else if (preg_match('/Safari/i', $user_agent)) { 
			$browser = "Safari";
		} else {
			$browser = "Unknown";
		}
		return $browser;
	}
	
	function select_kdarea($nama_area) {
		if($nama_area == "AP PRIMA TANGERANG") $nama_area = "TANGERANG";
		elseif($nama_area == "AP PRIMA JAKARTA UTARA") $nama_area = "JAKARTA UTARA";
		elseif($nama_area == "AP PRIMA JAKARTA SELATAN") $nama_area = "JAKARTA SELATAN";
		
		$sql = "SELECT kdarea FROM area2 WHERE nama_area LIKE '%" . $nama_area . "%'";
		$resultQuery=mysql_query($sql);
		while ($rows=mysql_fetch_row($resultQuery)){ 
			$data = $rows[0];
		}
		return $data;
	}
	
	
	
?>