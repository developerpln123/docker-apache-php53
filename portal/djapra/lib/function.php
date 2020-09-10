<?php

function login($get_var_username,$get_var_password){
	$sql = "select * from admin_djapra admin , area2 area where admin.username = '".$get_var_username."' and admin.password = md5('".$get_var_password."') and admin.kdarea = area.kdarea ";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	while($rows = mysql_fetch_array($resultQuery)){
		$data[] = $rows;
	}
	return $data;
}

function select_area(){
	$sql = "select * from area2";
	echo $sql;
	$resultQuery = mysql_query($sql);
	while($rows = mysql_fetch_array($resultQuery)){
		$data[] = $rows;
	}
	return $data;
}

//3 berita terakhir--home
function select_latest_berita(){
	$sql = "SELECT * FROM  `data_djapra` ORDER BY id_data_djapra DESC LIMIT 3";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	while($rows = mysql_fetch_array($resultQuery)){
		$data[] = $rows;
	}
	return $data;
}
//bulan pertama--index_area
function select_bulan_djapra_by_kd_area($kdarea){
	$sql = "select bulan_tahun from data_djapra 
			where kdarea = '$kdarea'
			order by bulan_tahun asc limit 1";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	while($rows = mysql_fetch_array($resultQuery)){
		$data[] = $rows;
	}
	return $data;
}
//berita terakhir area--index_area
function select_data_djapra_by_kd_area_last($kdarea,$id){
	$sql = "SELECT d.*,a.nama_area FROM data_djapra d, area2 a where  
			d.kdarea = a.kdarea and
			d.kdarea = '$kdarea' and
			d.id_data_djapra like '%$id%'
			order by d.id_data_djapra desc 
			limit 1";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	while($rows = mysql_fetch_array($resultQuery)){
		$data[] = $rows;
	}
	return $data;
}
//berita per bulan per area--index_area_bulan
function select_data_djapra_by_kd_area_bulan($kdarea,$bulan_tahun){
	$sql = "SELECT d.*,a.nama_area FROM data_djapra d, area2 a where  
			d.kdarea = a.kdarea and
			d.kdarea = '$kdarea' and
			d.bulan_tahun = '$bulan_tahun' 
			order by d.id_data_djapra desc";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	while($rows = mysql_fetch_array($resultQuery)){
		$data[] = $rows;
	}
	return $data;
}
//lihat berita all--admin
function select_data_djapra(){
	$sql = "SELECT  d.*,a.nama_area FROM data_djapra d, area2 a where  
			d.kdarea = a.kdarea";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	while($rows = mysql_fetch_array($resultQuery)){
		$data[] = $rows;
	}
	return $data;
}
//lihat berita per area--admin
function select_data_djapra_by_kd_area($kdarea){
	$sql = "SELECT  d.*,a.nama_area FROM data_djapra d, area2 a where  
			d.kdarea = a.kdarea and d.kdarea = '$kdarea'";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	while($rows = mysql_fetch_array($resultQuery)){
		$data[] = $rows;
	}
	return $data;
}

//insert data djapra--admin
function insert_data_djapra($var_kdarea,$var_judul_berita,$var_isi_berita,$var_plaintext,$var_foto,$var_tanggal,$var_bulan_tahun,$var_waktu,$var_user_input){
	$sql = "insert into data_djapra set
					kdarea = '".$var_kdarea."', 
					judul_berita = '".$var_judul_berita."', 
					isi_berita = '".$var_isi_berita."', 
					plaintext = '".$var_plaintext."', 
					foto = '".$var_foto."', 
					tanggal = '".$var_tanggal."', 
					bulan_tahun = '".$var_bulan_tahun."', 
					waktu = '".$var_waktu."', 
					user_input = '".$var_user_input."'";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	if($resultQuery){
		$result = 1;
	}else{
		$result = 2;
	} 
	
	return $result;
}
//delete data djapra--admin
function delete_data_djapra($id_data_djapra){
	$sql = "delete from data_djapra where id_data_djapra = '".$id_data_djapra."'";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	if($resultQuery){
		$result = 1;
	}else{
		$result = 2;
	}
	
	return $result;
}

//bantuan
function select_list_bulan($bulan_tahun){
	$result = array();
	
	$tahun_last = substr($bulan_tahun,0,4);
	$bulan_last = substr($bulan_tahun,4,6);
	
	$tahun_now = date('Y');
	$bulan_now = date('m');
	
	$array_bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	$no = 0;
	for($a=$tahun_last; $a<=$tahun_now; $a++){
		
		if($a == $tahun_last && ($tahun_now - $a) == 0){//untuk 1 tahun saja
			for($b=($bulan_last -1); $b<$bulan_now; $b++){
				
				$result[$no]['bulan_tahun_nama'] = $array_bulan[$b]." ".$a;
				$result[$no]['bulan_tahun_angka'] = $a.insert_nol($b+1);
				//echo $array_bulan[$b]." ".$a." ".$a.insert_nol($b+1)."<br>";
				$no++;
			}
		}else if($a == $tahun_last && ($tahun_now - $a) != 0){//untuk tahun pertama
			for($b=($bulan_last -1); $b<12;$b++){
				
				$result[$no]['bulan_tahun_nama'] = $array_bulan[$b]." ".$a;
				$result[$no]['bulan_tahun_angka'] = $a.insert_nol($b+1);
				//echo $array_bulan[$c]." ".$a." ".$a.insert_nol($c+1)."<br>";
				$no++;
			}
		}else if($a != $tahun_last && ($tahun_now - $a) != 0){//untuk tahun tengah
			for($b=0; $b<12;$b++){
				
				$result[$no]['bulan_tahun_nama'] = $array_bulan[$b]." ".$a;
				$result[$no]['bulan_tahun_angka'] = $a.insert_nol($b+1);
				//echo $array_bulan[$c]." ".$a." ".$a.insert_nol($c+1)."<br>";
				$no++;
			}
		}else{//untuk tahun sisa
			for($b=0; $b<$bulan_now; $b++){
				
				$result[$no]['bulan_tahun_nama'] = $array_bulan[$b]." ".$a;
				$result[$no]['bulan_tahun_angka'] = $a.insert_nol($b+1);
				//echo $array_bulan[$b]." ".$a." ".$a.insert_nol($b+1)."<br>";
				$no++;
			}
		}
			
	}
	
	return $result;
}

function insert_nol($bulan){
	$result = "";
	if(strlen($bulan) == "1"){
		$result = "0".$bulan;
	}else{
		$result = $bulan;
	}
	
	return $result;
}

function select_nama_bulan($bulan_tahun){
	$result = array();
	$tahun = substr($bulan_tahun,0,4);
	$bulan = substr($bulan_tahun,4,6);
	
	$array_bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	
	$result = $array_bulan[$bulan-1]." ".$tahun;
	return $result;
}



//user
function select_admin_djapra(){
	$sql = "select * from admin_djapra admin,area2 area where  admin.kdarea = area.kdarea";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	while($rows = mysql_fetch_array($resultQuery)){
		$data[] = $rows;
	}
	return $data;
}

function select_admin_djapra_by_id_admin_djapra($id_admin_djapra){
	$sql = "select * from admin_djapra where id_admin_djapra =  '".$id_admin_djapra."'";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	while($rows = mysql_fetch_array($resultQuery)){
		$data[] = $rows;
	}
	return $data;
}

function insert_admin_djapra($kdarea,$username,$password,$nama,$hak_akses){
	$sql = "insert into admin_djapra set kdarea = '".$kdarea."',username = '".$username."' $password ,nama = '".$nama."',hak_akses = '".$hak_akses."'";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	if($resultQuery){
		$result = 1;
	}else{
		$result = 2;
	}
	
	return $result;
}

function update_admin_djapra($id_admin_djapra,$kdarea,$username,$password,$nama,$hak_akses){
	$sql = "update admin_djapra set kdarea = '".$kdarea."',username = '".$username."' $password ,nama = '".$nama."',hak_akses = '".$hak_akses."' where id_admin_djapra =  '".$id_admin_djapra."'";
	//echo $sql;
	$resultQuery = mysql_query($sql);
	if($resultQuery){
		$result = 1;
	}else{
		$result = 2;
	}
	
	return $result;
}

function delete_admin_djapra($id_admin_djapra){
	$sql = "delete from admin_djapra where id_admin_djapra = '".$id_admin_djapra."'";
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