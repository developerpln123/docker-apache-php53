<?php
//echo substr("201602",4,6);

include "lib/function.php";

/* $result =  select_list_bulan("201602");
print_r($result);
foreach($result as $key => $value){
	echo $value['bulan_tahun_angka']." ".$value['bulan_tahun_nama']."<br>";
}   */
$timestamp = strtotime("2015-01-30");
$formattedDate = date('d F Y', $timestamp);
echo $formattedDate;
?>