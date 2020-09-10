<?
include "koneksi_taw.php";
$datetime = date('Y-m-d H:i:s');
$sql = "UPDATE  `portal_new`.`login_history` 
		SET  `logout_time` =  '$datetime' 
		WHERE CONVERT(  `login_history`.`id_login` USING utf8 ) =  '".$_COOKIE['portal_id_unik']."' ";
	
mysql_query($sql,$connection_portal);
	
mysql_close($connection_portal);
	
setcookie("portal_id_unik", "", time()-3600);
setcookie("portal_user", "", time()-3600);
setcookie("flag_user", "", time()-3600);
//	echo "logout";	
header( 'Location: index_taw.php' ) ;
?>