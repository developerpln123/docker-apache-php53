<?
session_start();
include "../lib/config.php";
include "../lib/function.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Portal Djapra</title>
<link rel="shortcut icon" href="images/logo_pln.jpg" />
<link href="../style.css" rel="stylesheet" type="text/css" />
  
  <script src="../js/textarea/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  
<body bgcolor="#00FF00">
<table width="80%" bgcolor="#FFFFFF">
  <tr>
	<td colspan="2"><img width="100%"  src='../images/header.png'> </td>
  </tr>
  <tr>
	
</tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="right"><a href="logout.php" class="style1">Logout</a></td>
  </tr>
  <tr>
    <td colspan="2">
	<form method="post" enctype="multipart/form-data" action="form_upload_submit.php">
	<table width="100%">
		<tr  class="form_upload">
			<td width="15%">Area</td>
			<td >
				<select name="var_kdarea" class="input_width">
				<?php 
				if($_SESSION['kdarea'] == 54000){
					$area = select_area();
					for($i=0; $i<count($area); $i++){
						echo "<option value='".$area[$i]['kdarea']."'>".$area[$i]['nama_area']."</option>";
					}
				}else{
					echo "<option value='".$_SESSION['kdarea']."'>".$_SESSION['nama_area']."</option>";
				}
				?>
				</select>
			</td>
		</tr>
		<tr class="form_upload">
			<td width="15%">Judul Berita</td>
			<td ><input name="var_judul_berita" class="input_width"></td>
		</tr>
		<tr class="form_upload">
			<td width="15%">Isi Berita</td>
			<td > <textarea name="var_isi_berita"></textarea><br></td>
		</tr>
		<tr class="form_upload">
			<td width="15%">Foto</td>
			<td ><input name="var_foto" size="36" type="file"></td>
		</tr>
		<tr class="form_upload">
			<td width="15%"></td>
			<td ><input type="submit" value="Submit"></td>
		</tr>
	</table>
	</form>
	</td>
  </tr>
  <tr>
  </tr>
</table>
</body>