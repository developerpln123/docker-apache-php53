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
<style type="text/css">
<!--
.style4 {color: #0099FF}
-->
</style>
<head>
    <title>Portal Djapra</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="images/logo.jpg" />
    <link rel="stylesheet" href="slider/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="slider/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="slider/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="slider/themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="slider/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="slider/style.css" type="text/css" media="screen" />
</head>

<body>
    <div id="wrapper">
        <div class="slider-wrapper theme-default">
            <tr>
    			<td colspan="2"><div align="right"><img width="100%"  src='images/header.png'> </div></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="center"><div align="center"><span class="index_area"><strong><?php echo $data[0]['nama_area']; ?></strong></span><br>
                  <br>
              </div></td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php
                    if(count($data)>0){
                    ?>
                    <table width="100%" >
                        <tr>
                        <td width="20%" class="index_area">
                            <ul>
                        
                            <?php
                            $result = select_list_bulan($bulan[0]['bulan_tahun']);
                            foreach($result as $key => $value){
                                echo "<a href='index_area_bulan.php?kdarea=".$kdarea."&bulan_tahun=".$value['bulan_tahun_angka']."' target='_blank' class='style1'>".$value['bulan_tahun_nama']."</a><br><br>";
                            } 
                            ?>
                        </td>
                        <td width="1%" >&nbsp;</td>
                        <td width="79%" >
                            <p align="justify" class="index_area"><?php echo $data[0]['judul_berita']; ?></p>
                            <hr align="JUSTIFY">
                            <p align="justify" >
                            <img src="image_file/<?php echo $data[0]['foto']; ?>" class="index_area" />
							     <?php echo $data[0]['isi_berita']; ?>
                            </p>             
                        </td>
                      </tr>
                    </table>
                    <?php }else{
                        echo "Tidak ada data";
                     } ?>    
                </td>
            </tr>
            

            
        </div>
    </div>

<script type="text/javascript" src="slider/scripts/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="slider/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
</script>
</body>
</html>

