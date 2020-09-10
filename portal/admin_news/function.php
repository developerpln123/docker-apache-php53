<?php

function login($get_var_username,$get_var_password){
	$sql = "select * from admin_area admin , area2 area where admin.username = '".$get_var_username."' and admin.password = md5('".$get_var_password."') and admin.kdarea = area.kdarea ";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	while($rows = mysql_fetch_array($resultQuery)){
		$data[] = $rows;
	}
	return $data;
}

//add update delete admin
function select_area(){
	$sql = "select * from area2";
	echo $sql;
	$resultQuery = mysql_query($sql);
	while($rows = mysql_fetch_array($resultQuery)){
		$data[] = $rows;
	}
	return $data;
}

function select_admin_area(){
	$sql = "select * from admin_area admin,area2 area where  admin.kdarea = area.kdarea";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	while($rows = mysql_fetch_array($resultQuery)){
		$data[] = $rows;
	}
	return $data;
}

function select_admin_area_by_id_admin_area($id_admin_area){
	$sql = "select * from admin_area where id_admin_area =  '".$id_admin_area."'";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	while($rows = mysql_fetch_array($resultQuery)){
		$data[] = $rows;
	}
	return $data;
}

function insert_admin_area($kdarea,$username,$password,$nama,$hak_akses){
	$sql = "insert into admin_area set kdarea = '".$kdarea."',username = '".$username."' $password ,nama = '".$nama."',hak_akses = '".$hak_akses."'";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	if($resultQuery){
		$result = 1;
	}else{
		$result = 2;
	}
	
	return $result;
}

function update_admin_area($id_admin_area,$kdarea,$username,$password,$nama,$hak_akses){
	$sql = "update admin_area set kdarea = '".$kdarea."',username = '".$username."' $password ,nama = '".$nama."',hak_akses = '".$hak_akses."' where id_admin_area =  '".$id_admin_area."'";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	if($resultQuery){
		$result = 1;
	}else{
		$result = 2;
	}
	
	return $result;
}

function delete_admin_area($id_admin_area){
	$sql = "delete from admin_area where id_admin_area = '".$id_admin_area."'";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	if($resultQuery){
		$result = 1;
	}else{
		$result = 2;
	}
	return $result;
}

//data file
function select_data_file($kdarea){
	$sql = "SELECT * FROM data_file where kdarea = '".$kdarea."' ORDER BY time ASC ";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	while($rows = mysql_fetch_array($resultQuery)){
		$data[] = $rows;
	}
	return $data;
}

function insert_data_file($nama_file_asli,$nama_file_rename,$judul,$keterangan,$tanggal_upload,$bulan,$tahun,$kdarea){
	$sql = "insert into data_file set nama_file_asli = '".$nama_file_asli."', nama_file_rename = '".$nama_file_rename."', judul = '".$judul."', keterangan = '".$keterangan."', tanggal_upload = '".$tanggal_upload."',bulan = '".$bulan."', tahun = '".$tahun."',kdarea = '".$kdarea."'";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	if($resultQuery){
		$result = 1;
	}else{
		$result = 2;
	}
	
	return $result;
}

function delete_data_file($id_data_file){
	$sql = "delete from data_file where id_data_file = '".$id_data_file."'";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	if($resultQuery){
		$result = 1;
	}else{
		$result = 2;
	}
	
	return $result;
}
?>