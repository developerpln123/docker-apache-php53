<?

$portal_username	= "portal";
$portal_password	= "portal";
$portal_server		= "10.3.0.211"; 
$portal_service	= "SIMPEL2"; 

//$portal_server_service = $portal_server."/".$portal_service;
$connection		= oci_connect($portal_username, $portal_password, $portal_service);

?>