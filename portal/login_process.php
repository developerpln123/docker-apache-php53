<?
session_start();

$portal_host		= "10.3.0.212";
$portal_username	= "taurisa";
$portal_password	= "adadech";
$portal_database	= "dbappsdm";

$connection_portal	= mysql_connect($portal_host, $portal_username, $portal_password);
mysql_select_db($portal_database);

function select_master_user_by_email($var_email){
	$sql = "SELECT * FROM v_master_user WHERE email = '" .mysql_real_escape_string(trim($var_email)). "'";
	$resultQuery=mysql_query($sql);
	while ($rows=mysql_fetch_row($resultQuery)){ 
		$data[] = $rows;
	}
	return $data;
}

if(!empty($_POST['_email']) && !empty($_POST['_password'])){
	$get_var_username = strtoupper(mysql_real_escape_string(stripslashes(trim($_POST['_email']))));
	$get_var_password = mysql_real_escape_string(stripslashes(trim($_POST['_password'])));
	
	// user - pass pakai "guest" untuk sementara di-disable
	// user - pass untuk bypass
	if(strtoupper($get_var_username) == 'TEMP' && strtoupper($get_var_password) == 'TEMP@123') echo '<script language="javascript">window.location = "index3.php"</script>';
	
	if (strpos($get_var_username,'@') !== false) {
	//	aktifkan user non_pegawai dengan uncomment 2 line dibawah ini...
		$_SESSION['temp'] = date('H:i');
		echo '<script language="javascript">window.location = "index4.php?email='.$get_var_username.'&pswd='.$get_var_password.'"</script>';
	}

} else {
	echo '<script language="javascript">window.location = "login.php?msg=10"</script>';
}

$ds=ldap_connect('ldap://10.3.0.30');			
if(ldap_bind($ds,"jaya\\".$get_var_username, $get_var_password))
{
	$get_var_email = $get_var_username."@PLN.CO.ID";
	$master_user = select_master_user_by_email($get_var_email);
	$current_id_user = $master_user[0][0];
	if ($current_id_user=="") {	
		echo '<script language="javascript">window.location = "login.php?msg=10"</script>';	
	} else {
		
		$current_nip = $master_user[0][1];
		$current_nama = $master_user[0][2];			
		$current_email = $master_user[0][3];
		$current_unit = $master_user[0][16];									
		
		$_SESSION['pegawai'] = 'Pegawai';
		$_SESSION['pid'] = $current_nip;
		$_SESSION['plog'] = date('d-m-Y H:i',time()-3600);
		$_SESSION['pnama'] = $current_nama;
		$_SESSION['pemail'] = $current_email;
		$_SESSION['parea'] = $current_unit;
		$_SESSION['pcounter'] = time();
		echo '<script language="javascript">window.location = "index3.php?nipeg='.$current_nip.'"</script>';
						
	}//end of else
} else {
	echo '<script language="javascript">window.location = "login.php?msg=20"</script>';
}//end of else

?>