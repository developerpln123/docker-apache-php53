<?php
	session_start();
	include 'admin_portal/config.php';
	//echo '<script language="javascript">alert(\'12\')</script>';
	$sql = "SELECT * FROM non_pegawai WHERE email='".$_GET['email']."' AND pswd='".md5($_GET['pswd'])."'";
	$result = mysql_query($sql);
	while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$id = $r['id_non_pegawai'];
		$nama = $r['nama'];
		$email = $r['email'];
		$area = $r['area'];
		$kdarea = $r['kdarea'];
	}
	
	if(($id != '') && ($email != '') && ($_SESSION['temp'] == date('H:i'))) {
		$_SESSION['pegawai'] = 'non';
		$_SESSION['pid'] = $id;
		$_SESSION['plog'] = date('d-m-Y H:i');
		$_SESSION['pnama'] = $nama;
		$_SESSION['pemail'] = $email;
		$_SESSION['parea'] = $area;
		$_SESSION['pcounter'] = time();
		
		$keterangan = null;
		$ip = get_ip_user();
		$browser = get_browser_user();
		$sql3 = "INSERT INTO log_pegawai (nip,nama,ip,browser,waktu,counter,keterangan,status,nama_area,kdarea)
				VALUES ('".$_SESSION['pid']."','".$_SESSION['pnama']."','".$ip."','".$browser."','".$_SESSION['plog']."','".$_SESSION['pcounter']."','".$_SESSION['pemail']."','0','".$area."','".$kdarea."')";
		mysql_query($sql3); 
	//	echo "eksekusi";
		
		echo '<script language="javascript">window.location = "index.php"</script>';
	} else {
		session_destroy();
		echo '<script language="javascript">window.location = "login.php?msg=20"</script>';
	}
	
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
	
?>