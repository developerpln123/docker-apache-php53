<?
include "lib/config.php";
include "lib/function.php";

$kdarea = $_GET['kdarea'];
$id = '';
$bulan_tahun = $_GET['bulan_tahun'];

$data = select_data_djapra_by_kd_area_last($kdarea,$id);
$bulan = select_bulan_djapra_by_kd_area($kdarea);
$bulan_tahun_nama = select_nama_bulan($bulan_tahun);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html lang="en">
<head>
    <title>Portal Djapra</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="images/logo.jpg" />
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>

<body>
   <div class="slider-wrapper theme-default">
            <tr>
    			<td colspan="2"><img width="100%"  src='images/header.png'></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">
                <div align="center">
                    <span class="judul_bulan"><?php echo $bulan_tahun_nama; ?></span>
                    <br><br>
                </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
				<?php
                    if(count($data)>0){
                    ?>
                    <table class='content'>
                        <tr>
                        <td width="20%" class="tanggal">
                            <?php
							echo "<a href='index.php' class='style1'>Home</a><br><br>";
							
                            $result = select_list_bulan($bulan[0]['bulan_tahun']);
                            foreach($result as $key => $value){
                                echo "<a href='index_area_bulan.php?kdarea=".$kdarea."&bulan_tahun=".$value['bulan_tahun_angka']."' class='style1'>".$value['bulan_tahun_nama']."</a><br><br>";
                            } 
                            ?>
                        </td>
                        <td width="1%" >&nbsp;</td>
                        <td width="79%" valign="top">
                             <?php 
							$data = select_data_djapra_by_kd_area_bulan($kdarea,$bulan_tahun);
							
							for($i=0;$i<count($data);$i++){
							?>
							<li class="data_djapra">
								<span class="judul_berita"><?php echo $data[$i]['judul_berita']; ?></span><br>
								<span class="tanggal">Posted on <?php echo date('d F Y',strtotime($data[$i]['tanggal'])); ?></span><br>
								<span class="isi_berita"><?php echo substr($data[$i]['plaintext'],0,400)."..."; ?>
								<a href="index_area.php?kdarea=<?php echo $kdarea; ?>&id=<?php echo $data[$i]['id_data_djapra']; ?>">Selanjutnya</a></span>
							</li>
							<?php } ?>     
                        </td>
                      </tr>
                    </table>
                    <?php }else{
                        echo "Tidak ada data";
                     } ?> 
				</td>
            </tr>
	</div>


</body>
</html>

