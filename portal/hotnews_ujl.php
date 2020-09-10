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
            <td width="86%"><h1 align="left" class="style5">UJL Diberlakukan Kembali (Per 1 Juli 2013)</h1></td>
          </tr>
        </table>
		<div align="right"><a href="ftp://10.3.0.71/ren/umum/SKDIR_UJL.pdf" class="style4"><b>download SK Dir</b></a></div><br/>
            <!-- Menu Start --> 
            <div id="jQ-menu"> 
              <div>
                <p align="justify">Mulai 1 Juli 2013, PLN akan kembali   memberlakukan uang jaminan langganan (UJL) bagi pelanggan dan calon   pelanggan listrik pascabayar. UJL merupakan jaminan atas pemakaian daya   dan tenaga listrik selama menjadi pelanggan pascabayar PLN yaitu   pelanggan yang memakai tenaga listrik dari instalasi PLN dengan   transaksi pembayaran setelah tenaga listrik digunakan. Sedangkan untuk   pelanggan prabayar tidak dikenakan UJL.</p>
                <p align="justify">Sebelumnya, pada 2011 PLN mengeluarkan   kebijakan tidak lagi memungut UJL dari pelanggan baru. Hal ini didasari   kenyataan bahwa sejak tahun 2010, UJL yang dipungut dari pelanggan baru,   dimasukkan ke rekening tersendiri dan tidak digunakan PLN untuk   operasional. Maka, Direksi PLN memandang, bahwa pungutan atas UJL ini   tidak memberi manfaat banyak bagi PLN maupun bagi pelanggan. Untuk itu,   PLN melihat akan jauh lebih bermanfaat bila UJL tersebut digunakan oleh   pelanggan menjadi modal kerja pelanggan sehingga lebih menggerakkan roda   perekonomian, dari pada uang tersebut disetor ke rekening PLN di bank,   dan menjadi uang yang tidak boleh digunakan PLN maupun pelanggan   sendiri. Maka pada tahun 2011, PLN tidak lagi memungut UJL kepada   pelanggan baru.</p>
                <p align="justify">Namun pertimbangan lain muncul, ketika   Badan Pemeriksa Keuangan (BPK), atas permintaan Dewan Perwakilan Rakyat   (DPR), melakukan audit terhadap pengelolaan UJL di PLN. Dimana salah   satu temuannya adalah bahwa sangat berisiko bagi PLN dengan tidak   mengenakan UJL kepada pelanggannya, karena tidak lagi ada jaminan atas   pemakaian listrik pelanggan pascabayar. Maka, BPK merekomendasi agar PLN   mengenakan kembali UJL kepada seluruh pelanggan pascabayar. Terlebih,   BPK melihat bahwa regulasi dari Pemerintah (Menteri Energi dan Sumber   Daya Mineral/ESDM) masih mengatur bahwa PLN harus mengenakan UJL kepada   pelanggannya.</p>
                <p align="justify">Dikenakannya UJL untuk pelanggan   pascabayar ini karena pelanggan pascabayar melakukan pembayaran setelah   tenaga listrik digunakan. Maka, sebagai jaminan atas pemakaian daya dan   tenaga listrik yang digunakan itulah pelanggan pascabayar dikenakan UJL.   Namun perlu diingat, UJL bukanlah uang muka. Sehingga, jika pelanggan   pascabayar mengalami keterlambatan melunasi tagihan listrik, maka akan   dikenakan sanksi pemutusan aliran listrik dan biaya keterlambatan. Bila   UJL merupakan uang muka, maka UJL akan secara otomatis digunakan untuk   melunasi tagihan yang belum dilunasi itu. Namun, model bisnisnya,   tagihan harus tetap dilunasi oleh pelanggan dengan tidak menggunakan UJL   sebagai pelunasannya. Bila nantinya pelanggan tetap tidak melunasi   tagihan pemakaian, maka 60 hari setelah pemutusan aliran listrik,   instalasi jaringan dan alat ukur akan dibongkar, dan saat itulah UJL   dipindahbukukan melunasi tunggakan rekening itu.</p>
                <p align="justify">UJL yang diberlakukan kembali oleh PLN mulai 1 Juli 2013 ini dikenakan kepada :</p> 
                <div align="justify"><br/>
                </div>
                <p align="justify">1. Calon pelanggan yang melakukan pasang baru<br/>
                 2. Pelanggan yang memasang listrik atau merubah daya selama kurun 1 Januari 2011 sampai 30 Juni &nbsp;&nbsp;&nbsp;2013 yang tidak dikenakan UJL <br/>
                 3. Pelanggan lama yang menjadi pelanggan tahun 2010 atau sebelumnya. <br/></p>
                <p align="justify">Pengenaan UJL kepada seluruh pelanggan   pascabayar ini adalah karena UJL merupakan jaminan atas pemakaian   listrik dari pelanggan yang pembayaran rekeningnya setelah pelanggan   memakai listrik.</p>
                <p align="justify">Pemberlakuan UJL ini akan disesuaikan   dengan setiap perubahan tarif tenaga listrik bagi semua pelanggan   pascabayar. Penyesuaian UJL dilakukan secara bertahap yaitu pada saat   pelanggan mengajukan permintaan untuk perubahan daya, perubahan golongan   tarif tenaga listrik, penyelesaian tagihan susulan akibat penertiban   pemakaian tenaga listrik (P2TL), perubahan nama, pasang kembali aliran   listrik akibat pemutusan sementara, pasang kembali aliran listrik akibat   bongkar rampung, migrasi ke prabayar, serta pemindahan dan/atau   perubahan letak sambungan tenaga listrik (SL).</p>
                <p align="justify">PLN menyadari bahwa pemberlakuan UJL yang   bersamaan dengan kenaikan Tarif Tenaga Listrik akan menambah beban   dunia usaha, oleh karenanya sebagai wujud kepedulian PLN terhadap dunia   usaha, khusus untuk pelanggan yang menjadi pelanggan atau melakukan   perubahan daya tahun 2011 hingga Juni 2013, PLN memberi opsi bahwa UJL   dapat dapat dibayar mulai Januari 2014, atau diangsur dengan waktu yang   cukup panjang yaitu mulai Januarai 2014 sampai dengan Desember 2014.</p>
                <p align="justify">Tabel Tarif Uang Jaminan Langganan</p>
                <p><a href="http://www.pln.co.id/wp-content/uploads/2013/06/Tabel-UJL.jpg"><img alt="Tabel UJL" src="http://www.pln.co.id/wp-content/uploads/2013/06/Tabel-UJL-225x300.jpg" width="225" height="300" /></a></p>
                <p>Contoh perhitungan UJL untuk beberapa golongan tarif</p>
                <p><a href="http://www.pln.co.id/wp-content/uploads/2013/06/PBR21.jpg"><img alt="PBR2" src="http://www.pln.co.id/wp-content/uploads/2013/06/PBR21-300x225.jpg" width="300" height="225" /></a></p>
                <p><a href="http://www.pln.co.id/wp-content/uploads/2013/06/PBR3.jpg"><img alt="PBR3" src="http://www.pln.co.id/wp-content/uploads/2013/06/PBR3-300x225.jpg" width="300" height="225" /></a></p>
                <p><a href="http://www.pln.co.id/wp-content/uploads/2013/06/PBB2.jpg"><img alt="PBB2" src="http://www.pln.co.id/wp-content/uploads/2013/06/PBB2-300x225.jpg" width="300" height="225" /></a></p>
                <p><a href="http://www.pln.co.id/wp-content/uploads/2013/06/PBB3.jpg"><img alt="PBB3" src="http://www.pln.co.id/wp-content/uploads/2013/06/PBB3-300x225.jpg" width="300" height="225" /></a></p>
                <p><a href="http://www.pln.co.id/wp-content/uploads/2013/06/PDR2.jpg"><img alt="PDR2" src="http://www.pln.co.id/wp-content/uploads/2013/06/PDR2-300x225.jpg" width="300" height="225" /></a></p>
                <p><a href="http://www.pln.co.id/wp-content/uploads/2013/06/PDR3.jpg"><img alt="PDR3" src="http://www.pln.co.id/wp-content/uploads/2013/06/PDR3-300x225.jpg" width="300" height="225" /></a></p>
                <p><a href="http://www.pln.co.id/wp-content/uploads/2013/06/PDI1.jpg"><img alt="PDI1" src="http://www.pln.co.id/wp-content/uploads/2013/06/PDI1-300x225.jpg" width="300" height="225" /></a></p>
                <p><a href="http://www.pln.co.id/wp-content/uploads/2013/06/PDP1.jpg"><img alt="PDP1" src="http://www.pln.co.id/wp-content/uploads/2013/06/PDP1-300x225.jpg" width="300" height="225" /></a></p>
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