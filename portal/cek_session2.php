<?
include 'admin_portal/config.php';

if(!$_SESSION['pegawai']) {
	$myip = get_ip_user();
	$mytime = time();
	$sql = "SELECT nip,nama,counter FROM log_pegawai WHERE ip = '".$myip."' AND status='0' AND counter BETWEEN " . ($mytime-3600) . " AND " . $mytime;
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$nip = $row["nip"];
		$nama = $row["nama"];
		$counter = $row["counter"];
	}
	if(($nip) && ($nama) && ($counter)) {
		$_SESSION['pegawai'] = 'Pegawai';
		$_SESSION['pid'] = $nip;
		$_SESSION['plog'] = date('d-m-Y H:i',time()-3600);
		$_SESSION['pnama'] = $nama;
		$_SESSION['pemail'] = null;
		$_SESSION['parea'] = null;
		$_SESSION['pcounter'] = $counter;
		header('Location: index.php');
	}
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

?>