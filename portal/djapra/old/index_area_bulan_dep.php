<?
include "lib/config.php";
include "lib/function.php";

$kdarea = $_GET['kdarea'];
$bulan_tahun = $_GET['bulan_tahun'];
$bulan_tahun_nama = select_nama_bulan($bulan_tahun);
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
                <td colspan="2" align="center">
                <div align="center">
                    <span class="index_area"><strong><?php echo $bulan_tahun_nama; ?></strong></span>
                    <br><br>
                </div>
                </td>
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

