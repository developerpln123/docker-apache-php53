<?
$myip = get_ip_user();
$mytime = time();
$sql = "SELECT nip,nama,counter FROM log_pegawai WHERE ip = '".$myip."' AND status='0' AND counter BETWEEN " . ($mytime-60) . " AND " . $mytime;
echo $sql;
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