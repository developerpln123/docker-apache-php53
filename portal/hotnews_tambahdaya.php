<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<link rel="shortcut icon" href="images/logo_pln.jpg" />
<title>Hot News</title> 
 
<!-- CSS For The Menu --> 
<link rel="stylesheet" href="tree/style.css" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" /> 
<!-- Add jQuery From the Google AJAX Libraries --> 
<script type="text/javascript" src="tree/jquery.js"></script> 
 
<!-- jQuery Color Plugin --> 
<script type="text/javascript" src="tree/jquery.color.js"></script> 
 
<!-- Import The jQuery Script --> 
<script type="text/javascript" src="tree/jMenu.js"></script> 
<style type="text/css">
<!--
.style4 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FF0000;
	font-weight: bold;
}
.style5 {
	color: #1C82FF;
	font-family: Arial, Helvetica, sans-serif;
}
.style8 {
	font-family: Arial, Helvetica, sans-serif;
	color: #333333;
	font-size: 14px;
}
-->
</style>
</head> 

	<?php
    if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if(getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if(getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else
        $ip = "UNKNOWN";
    
    include "admin_portal/config.php";
    $result = mysql_query("SELECT * FROM INTERNAL_LINK WHERE STATUS=1 ORDER BY URUT ASC");
    ?>

<body>
<div id="templatemo_header_wrapper">

  </div> <!-- end of templatemo_header -->

</div> 
<!-- end of templatemo_header_wrapper -->

<div id="templatemo_content_wrapper">

	<div id="templatemo_content">
    
        <div class="content_section">
        
            <h2>Internal Link</h2>
            
      	</div>
      
        <div class="content_section">
          <p><? include "menu_slide/menu4.php"; ?></p>
        </div>

    </div> <!-- end of content -->
    
    <div id="templatmeo_sidebar">	
        <div class="sidebar_section">
        <div class="download_area">
        <table width="100%" border="0">
          <tr>
            <td width="14%"><img src="images/hotnews.gif" width="83" height="74" /></td>
            <td width="86%"><h1 align="left" class="style5">Program Tambah Daya &quot;Gratis Biaya Penyambungan&quot;</h1></td>
          </tr>
        </table>
		<div align="right"><a href="ftp://10.3.0.71/ren/umum/Surat_DIRNRK-Tambah_Daya_Gratis_BP.pdf" class="style4"><b>download SK Dir</b></a></div>
		<br/>
            <!-- Menu Start --> 
            <div id="jQ-menu"> 
              <div>
                <p align="center"><img src="images/tambahdaya.jpg.jpg" width="642" height="247" /></p>
                <p>PLN memberikan layanan tambah daya   listrik gratis biaya penyambungan (BP) bagi pelanggan listrik PLN di   seluruh Indonesia. Pelanggan dengan daya 450 VA, 900 VA, 1.300 VA, dan   2.200 VA masing-masing diberi kesempatan untuk menaikkan daya listriknya   ke 1.300 VA hingga 3.500 VA. Layanan tambah daya gratis BP ini berlaku   hingga 31 Agustus 2013.</p>
                <p>Layanan tambah daya gratis BP   diperuntukkan bagi pelanggan listrik pasca bayar dan listrik pintar   (prabayar). Khusus bagi pelanggan listrik pintar (prabayar) selain bebas   biaya penyambungan, pelanggan juga tidak dikenakan Uang Jaminan   Langganan (UJL). Pelanggan listrik pintar yang melakukan tambah daya   hanya perlu membeli token (pulsa) awal minimal Rp 5.000,-. Sedangkan   bagi pelanggan pasca bayar dikenakan UJL yang besarnya sesuai tarif yang   berlaku di daya baru sesuai kenaikan. Pelanggan peserta program Tambah Daya Gratis ini, baru bisa melakukan turun daya setelah 1 (satu) tahun dihitung sejak menyala.</p>
                <p>Promosi tambah daya gratis biaya   penyambungan ini dilakukan dalam rangka menyambut Idul Fitri 1434   Hijriyah, tahun 2013 Masehi. PLN mempertimbangkan aspek kenyamanan saat   keluarga dan masyarakat bersilaturahmi merayakan lebaran. Sehingga PLN   memberi kesempatan berupa bebas biaya penyambungan bagi pelanggan yang   ingin menambah daya listrik bila merasa kebutuhan listriknya meningkat.</p>
                <p>Untuk mendaftar tambah daya tidak perlu   datang ke kantor PLN. Pelanggan cukup menghubungi call center PLN lewat   telepon di nomor 123 (melalui telepon tetap) atau (kode area)123   (melalui seluler). Disamping itu juga bisa mendaftar dengan cara online   melalui website www.pln.co.id. Dengan demikian, diharapkan pelanggan   semakin merasakan kemudahan, kecepatan dan kenyamanan dalam berurusan   dengan PLN.</p>
                <p>PLN sendiri berharap, layanan tambah daya   gratis ini benar-benar dimanfaatkan sebaik mungkin oleh semakin banyak   pelanggan sehingga mereka dapat menggunakan listrik dengan lebih nyaman.</p>
                <p align="justify">&nbsp;</p>
              </div>
              <p>&nbsp;</p>
              <p align="justify">&nbsp;</p>
          </div> 
        </p>
        </div>
      </div>
  </div> 
  	<div class="cleaner"></div>    
</div> <div id="templatemo_content_wrapper_bottom"></div> <!-- end of content_wrapper -->

<div id="templatemo_footer">
            <a href="http://10.3.0.178/portal_logs/">Sub Bidang TI</a> ©2011 PLN Distribusi Jakarta dan Tangerang</div> 
<!-- end of templatemo_footer -->

</body>
</html>