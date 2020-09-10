<?
$portal_host		= "localhost";
$portal_username	= "adminmysl";
$portal_password	= "passwordmysql";
$portal_database	= "portal_new";

$connection_portal	= mysql_connect($portal_host, $portal_username, $portal_password);
mysql_select_db($portal_database);

?>