<?
include "lib/config.php";
include "lib/function.php";

$kdarea = $_GET['kdarea'];
$id = $_GET['id'];

$data = select_data_djapra_by_kd_area_last($kdarea,$id);
$bulan = select_bulan_djapra_by_kd_area($kdarea);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Portal Djapra</title>
<link rel="shortcut icon" href="images/logo_pln.jpg" />
<link href="style.css" rel="stylesheet" type="text/css" />
<body bgcolor="#00FF00">
<table width="80%" bgcolor="#FFFFFF">
  <tr>
	<td colspan="2"><img width="100%"  src='images/header.png'> </td>
  </tr>
  <tr>
	<td colspan="2"align="right"> </td>
</tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><span class="index_area"><strong><?php echo $data[0]['nama_area']; ?></strong></span><br><br></td>
  </tr>
  <tr>
    <td colspan="2">
	<?php
	if(count($data)>0){
	?>
		<table width="100%" >
			<tr>
				<td width="25%" class="index_area">
				<ul>
				
				<?php
				$result = select_list_bulan($bulan[0]['bulan_tahun']);
				foreach($result as $key => $value){
					echo "<a href='index_area_bulan.php?kdarea=".$kdarea."&bulan_tahun=".$value['bulan_tahun_angka']."' target='_blank' class='style1'>".$value['bulan_tahun_nama']."</a><br><br>";
				} 
				?>
				</td>
				<td width="75%" >
				<p class="index_area"><?php echo $data[0]['judul_berita']; ?></p>
				<hr>
				<p ><img src="image_file/<?php echo $data[0]['foto']; ?>" class="index_area" /><?php echo $data[0]['isi_berita']; ?></p>
				</td>
			</tr>
		</table>
	<?php }else{
		echo "Tidak ada data";
	} ?>	
	</td>
  </tr>
  <tr>
  </tr>
</table>
</body>