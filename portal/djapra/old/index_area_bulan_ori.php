<?
include "lib/config.php";
include "lib/function.php";

$kdarea = $_GET['kdarea'];
$bulan_tahun = $_GET['bulan_tahun'];
$bulan_tahun_nama = select_nama_bulan($bulan_tahun);
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
    <td colspan="2" align="center"><span class="index_area_bulan"><strong><?php echo $data[0]['nama_area']; ?></strong></span><br><br></td>
  </tr>
   <tr>
    <td colspan="2"><p class="index_area_bulan"><?php echo $bulan_tahun_nama; ?></p><hr></td>
  </tr>
  <tr>
    <td colspan="2">
		<?php 
		$data = select_data_djapra_by_kd_area_bulan($kdarea,$bulan_tahun);
		
		for($i=0;$i<count($data);$i++){
		?>
		<li class="index_area_bulan">
			<p class="index_area_bulan_judul"><?php echo $data[$i]['judul_berita']; ?></p>
			<p class="index_area_bulan_tanggal">Posted on <?php echo $data[$i]['tanggal']; ?></p>
			<p class="index_area_bulan_isi"><?php echo substr($data[$i]['isi_berita'],0,400)."..."; ?>
			<a href="index_area.php?kdarea=<?php echo $kdarea; ?>&id=<?php echo $data[$i]['id_data_djapra']; ?>">Selanjutnya</a></p>
		</li>
		<?php } ?>
	</td>
  </tr>
  <tr>
  </tr>
</table>
</body>