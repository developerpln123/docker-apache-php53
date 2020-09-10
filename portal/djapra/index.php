<?
include "lib/config.php";
include "lib/function.php";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html lang="en">
<head>
    <title>Portal Djapra</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="images/logo.jpg" />
    
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="bxslider/js/jquery.bxslider.min.js"></script>
	<script src="bxslider/js/jquery.bxslider.js"></script>
	<!-- bxSlider CSS file -->
	<link href="bxslider/css/jquery.bxslider.css" rel="stylesheet" />
</head>

<body>
    <div class="slider-wrapper theme-default">
            <tr>
    			<td colspan="2"><div align="right"><img width="100%"  src='images/header.png'> </div></td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                <div align="right">
                    <a href="admin/login.php" class="style1">Upload Berita</a>
                </div>
                </td>
            </tr>
			<p class="seputar_area">Seputar area</p>
			<div>
				<ul class="bxslider">
				<?php
                $data = select_latest_berita();
                for($i=0;$i<count($data);$i++)
                {
                    $id_data_djapra       = $data[$i]['id_data_djapra'];
                    $kdarea     = $data[$i]['kdarea'];
                    $judul_berita  = $data[$i]['judul_berita'];
                    $isi_berita    = $data[$i]['plaintext'];
                    $foto          = $data[$i]['foto'];
                  

                    echo "<li>
							<img  class='slide' src='image_file/$foto'>
							<p class='slide_judul'>$judul_berita<p>
							<p class='slide_isi'>".substr($isi_berita,0,600)."...<a href='index_area.php?kdarea=$kdarea&id=$id_data_djapra'>Selanjutnya</a></p>
							</li>";
                }
				?>
				</ul>
			</div>
			<tr>
            <td colspan="2">
                <table width="100%" >
                <tr>
                    <td width="5%" ><img src="images/home.png" class="home"/></td>
                    <td width="30%" class="home"><a href="index_area.php?kdarea=54110" class="style_link">Area Menteng</a></td>
                    <td width="5%" class="home"><img src="images/home.png" class="home"/></td>
                    <td width="30%" class="home"><a href="index_area.php?kdarea=54130" class="style_link">Area Cempaka Putih</a></td>
                    <td width="5%"  class="home"><img src="images/home.png" class="home"/></td>
                    <td width="30%" class="home"><a href="index_area.php?kdarea=54210" class="style_link">Area Bandengan</a></td>
                </tr>
                </table>

                <br><br>

                <table width="100%" >
                <tr>
                    <td width="5%" ><img src="images/home.png" class="home"/></td>
                    <td width="30%" class="home"><a href="index_area.php?kdarea=54310" class="style_link">Area Bulungan</a></td>
                    <td width="5%" class="home"><img src="images/home.png" class="home"/></td>
                    <td width="30%" class="home"><a href="index_area.php?kdarea=54330" class="style_link">Area Kebon Jeruk</a></td>
                    <td width="5%"  class="home"><img src="images/home.png" class="home"/></td>
                    <td width="30%" class="home"><a href="index_area.php?kdarea=54360" class="style_link">Area Ciputat</a></td>
                </tr>
                </table>

                <br><br>

                <table width="100%" >
                <tr>
                    <td width="5%" ><img src="images/home.png" class="home"/></td>
                    <td width="30%" class="home"><a href="index_area.php?kdarea=54380" class="style_link">Area Bintaro</a></td>
                    <td width="5%" class="home"><img src="images/home.png" class="home"/></td>
                    <td width="30%" class="home"><a href="index_area.php?kdarea=54410" class="style_link">Area Jatinegara</a></td>
                    <td width="5%"  class="home"><img src="images/home.png" class="home"/></td>
                    <td width="30%" class="home"><a href="index_area.php?kdarea=54420" class="style_link">Area Pondok Kopi</a></td>
                </tr>
                </table>

                <br><br>

                <table width="100%" >
                <tr>
                    <td width="5%" ><img src="images/home.png" class="home"/></td>
                    <td width="30%" class="home"><a href="index_area.php?kdarea=54510" class="style_link">Area Tanjung Priok</a></td>
                    <td width="5%" class="home"><img src="images/home.png" class="home"/></td>
                    <td width="30%" class="home"><a href="index_area.php?kdarea=54530" class="style_link">Area Marunda</a></td>
                    <td width="5%"  class="home"><img src="images/home.png" class="home"/></td>
                    <td width="30%" class="home"><a href="index_area.php?kdarea=54630" class="style_link">Area Cengkareng</a></td>
                </tr>
                </table>

                <br><br>

                <table width="100%" >
                <tr>
                    <td width="5%" ><img src="images/home.png" class="home"/></td>
                    <td width="30%" class="home"><a href="index_area.php?kdarea=54710" class="style_link">Area Kramat Jati</a></td>
                    <td width="5%" class="home"><img src="images/home.png" class="home"/></td>
                    <td width="30%" class="home"><a href="index_area.php?kdarea=54720" class="style_link">Area Ciracas</a></td>
                    <td width="5%"  class="home"><img src="images/home.png" class="home"/></td>
                    <td width="30%" class="home"><a href="index_area.php?kdarea=54720" class="style_link">Area Pondok Gede</a></td>
                </tr>
                </table>

                <br><br>

                <table width="100%" >
                <tr>
                    <td width="5%" ><img src="images/home.png" class="home"/></td>
                    <td width="30%" class="home"><a href="index_area.php?kdarea=54740" class="style_link">Area Lenteng Agung</a></td>
                    <td colspan="4"/></td>
                    
                </tr>
                </table>
            </td>
        </tr>
        
</div>


<script type="text/javascript">
$(document).ready(function(){
  $('.bxslider').bxSlider({
	auto: true
  
  });
});
</script>
</body>
</html>

