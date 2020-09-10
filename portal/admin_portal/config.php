<?
$portal_host		= "localhost";
$portal_username	= "root";
$portal_password	= "";
$portal_database	= "portal1";


$connection_portal		= mysql_connect($portal_host, $portal_username, $portal_password);
mysql_select_db($portal_database);

?>