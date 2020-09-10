<?
session_start();
include 'admin_portal/config.php';

$sql = "UPDATE log_pegawai SET status = '1'
		WHERE counter = '" . $_SESSION['pcounter'] . "' 
		AND nip = '" . $_SESSION['pid'] . "'";
mysql_query($sql);

session_destroy();

echo '<script language="javascript">window.location = "login.php"</script>';
?>