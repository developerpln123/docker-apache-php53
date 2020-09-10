<?
include "lib/config.php";
include "lib/function.php";

$kdarea = $_GET['kdarea'];
$id = $_GET['id'];

$data = select_data_djapra_by_kd_area_last($kdarea,$id);
$bulan = select_bulan_djapra_by_kd_area($kdarea);
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
    			<td colspan="2"><div align="right"><img width="100%"  src='images/header.png'> </div></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" ><div align="center"><span class="nama_area"><strong><?php echo $data[0]['nama_area']; ?></strong></span><br>
                  <br>
              </div></td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php
                    if(count($data)>0){
                    ?>
                    <table class='content' >
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
                            <p class="judul_berita"><?php echo $data[0]['judul_berita']; ?></p>
                            <hr>
                            <img src="image_file/<?php echo $data[0]['foto']; ?>" class="foto" />
							<p class="isi_berita"><?php echo $data[0]['isi_berita']; ?></p>             
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

