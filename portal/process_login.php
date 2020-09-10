<?
include "koneksi_taw.php";

//cek usn and password
if(!empty($_POST['_email']) && !empty($_POST['_password']))
{
	$get_var_username = strtoupper(mysql_real_escape_string(stripslashes(trim($_POST['_email']))));
	$get_var_password = mysql_real_escape_string(stripslashes(trim($_POST['_password'])));
	
	//cek LDAP
	error_reporting(0);
	$ds=ldap_connect('ldap://10.3.0.30');			
	if(ldap_bind($ds,"jaya\\".$get_var_username, $get_var_password))
	{
		//get data from 212
		$data_pegawai = get_data_pegawai($get_var_username);
		
		$id_unik = id_unik();		
		
		//insert log
		$arr_data = array(  'id_unik' => $id_unik,
							'usn' 	=> $get_var_username,
							'nip' 	=> $data_pegawai['nip'],
							'nama'	=> $data_pegawai['nama'],
							'flag'	=> 1,
							'area'	=> $data_pegawai['unit']);
		//print_r($arr_data);
		
		//if(save_login($arr_data))
		//{
			//set cookie
			setcookie("portal_id_unik", $id_unik, time()+3600);
			setcookie("portal_user", $get_var_username, time()+3600);
			setcookie("flag_user", "pegawai", time()+3600);
			//redirect to main page
			echo '<script language="javascript">window.location = "index.php"</script>';
		//}
		//else echo '<script language="javascript">window.location = "login_taw.php?msg=20"</script>';
		
	} 
	//cek data non pegawai
	elseif (cek_data_non_pegawai($get_var_username, $get_var_password))
	{
		//get data non pegawai
		$data_pegawai = get_data_non_pegawai($get_var_username, $get_var_password);
		
		$id_unik = id_unik();		
		
		//insert log
		$arr_data = array(  'id_unik' => $id_unik,
							'usn' 	=> $get_var_username,
							'nip' 	=> $data_pegawai['nip'],
							'nama'	=> $data_pegawai['nama'],
							'flag'	=> 0,
							'area'	=> $data_pegawai['unit']);
	
		if(save_login($arr_data))
		{
			//set cookie
			setcookie("portal_id_unik", $id_unik, time()+3600);
			setcookie("portal_user", $get_var_username, time()+3600);
			setcookie("flag_user", "non_pegawai", time()+3600);
			//redirect to main page
			//echo "oke cuk";
			echo '<script language="javascript">window.location = "index.php"</script>';
		}
		else echo '<script language="javascript">window.location = "login_taw.php?msg=20"</script>';
	}
	elseif ($get_var_username=="GUEST" AND  $get_var_password=="guest")
	{
		$id_unik = id_unik();		
		
		//set cookie
		setcookie("portal_id_unik", $id_unik, time()+3600);
		setcookie("portal_user", $get_var_username, time()+3600);
		setcookie("flag_user", "non_pegawai", time()+3600);
		//redirect to main page
		//echo "oke cuk";
		echo '<script language="javascript">window.location = "index.php"</script>';
		
	}
	else 
	{
		echo '<script language="javascript">window.location = "login_taw.php?msg=20"</script>';
	}//end of else
	
} 
else 
{
	//echo '<script language="javascript">window.location = "login_taw.php?msg=10"</script>';
}	
	


function save_login($data)
{
	include "koneksi_taw.php";

	$ip = original_ip();
	$browser = getBrowser(); 
	
	$sql = "INSERT INTO `portal_new`.`login_history` (`id_login`, `usn`, `nip`, `email`, `ip`, `browser`, `flag_pegawai`, `area`) 
			VALUES ('".$data['id_unik']."', '".$data['usn']."', '".$data['nip']."', '".$data['nama']."', '".$ip."', '".$browser."', '".$data['flag']."', '".$data['area']."');";
	
	//echo "</br>".$sql;	
	
	if(mysql_query($sql,$connection_portal))
		return true;
	else return false;
	
	mysql_close($connection_portal);
}


function get_data_pegawai($var_email)
{
	//koneksi ke DBAPPSDM
	$sdm_host		= "10.3.0.212";
	$sdm_username	= "taurisa";
	$sdm_password	= "adadech";
	$sdm_database	= "dbappsdm";

	$connection_sdm	= mysql_connect($sdm_host, $sdm_username, $sdm_password);
	mysql_select_db($sdm_database);
	
	$sql = "SELECT * FROM v_master_user WHERE email = '" .mysql_real_escape_string(trim($var_email)). "@PLN.CO.ID'";
	$resultQuery=mysql_query($sql);
	while ($rows=mysql_fetch_row($resultQuery))
	{ 
		$data['nip'] = $rows[1];
		$data['nama'] = $rows[3];
		$data['unit'] = $rows[16];
	}
	mysql_close($connection_sdm);
	return $data;	
}

function cek_data_non_pegawai($usn, $pswd)
{
	include "koneksi_taw.php";
	
	$sql = "select count(1) as jml
			from non_pegawai
			where email='".$usn."' and pswd = '".md5($pswd)."'";
	
	$resultQuery=mysql_query($sql);
	
	while ($rows=mysql_fetch_row($resultQuery)){ 
		$jml = $rows[0];
	}
	
	if($jml>0)
		return true;
	else return false;
}  

function get_data_non_pegawai($usn, $pswd)
{
	include "koneksi_taw.php";
	
	$sql = "select *
			from non_pegawai
			where email='".$usn."' and pswd = '".md5($pswd)."'";
	
	$resultQuery=mysql_query($sql);
	
	while ($rows=mysql_fetch_row($resultQuery)){ 
		$data['nip'] = $rows[0];
		$data['nama'] = $rows[3];
		$data['unit'] = $rows[4];
	}
	
	return $data;
	
	mysql_close($connection_portal);
}

function id_unik() {
	return base_convert(uniqid(),16,35).".".base_convert(rand(100,999),10,35);
}

function original_ip()
{	if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
	{ $ip=$_SERVER['HTTP_CLIENT_IP']; }
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
	{ $ip=$_SERVER['HTTP_X_FORWARDED_FOR']; }
	else
	{ $ip=$_SERVER['REMOTE_ADDR']; }
	return $ip;
}

function getBrowser() 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
    
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 
    
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
    
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
    
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
    
   	
	// now try it
	$yourbrowser= $bname . " " . $version ;
	return $yourbrowser;
} 


?>




