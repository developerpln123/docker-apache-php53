<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="jPaginate - jQuery Pagination Plugin" />
<meta name="keywords" content="jquery, plugin, pagination, fancy" />
<title>Portal Aplikasi PLN Disjaya</title>
<link rel="shortcut icon" href="images/logo_pln.jpg" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<?


//GET IP USER
if (getenv("HTTP_CLIENT_IP"))
	$ip = getenv("HTTP_CLIENT_IP");
else if(getenv("HTTP_X_FORWARDED_FOR"))
	$ip = getenv("HTTP_X_FORWARDED_FOR");
else if(getenv("REMOTE_ADDR"))
	$ip = getenv("REMOTE_ADDR");
else
	$ip = "UNKNOWN";

//INSERT INTO LOG TABLE
//include Oracle Connection
/*include "admin/config_oracle.php";
 $query = "INSERT INTO PORTAL_LOGS (IP_KOM, ID_PAGE, TGL) VALUES ('".$ip."', 0, SYSDATE)";
$stmt = oci_parse($connection, $query);						
oci_execute($stmt);			
oci_close($connection);    */

//include MySQL Connection
include "admin/config.php";
$result = mysql_query("SELECT * FROM INTERNAL_LINK WHERE STATUS=1 ORDER BY URUT ASC");
?>
</head>
<body>
<div id="templatemo_header_wrapper">

	<div id="templatemo_header"><!-- end of templatemo_menu -->
        <!-- <div class="cleaner"><marquee>Alamat Portal ini akan diubah menjadi  HTTP://PORTALJAYA.PLN.CO.ID
        </marquee></div>-->
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
    	<div align="right"><a href="http://10.3.0.178/mobile" target="_blank"><img src="images/mobile.png"width="180" height="60"/></a></div>
<div class="sidebar_section">
       		
            <h2>Favorite Menu </h2>
       	
	  </div>
    	
        <div class="sidebar_section">
        
        	<div class="box">
      <h1>AP2T</h1>
      <a class="ap2t" href="http://10.14.152.2/ap2t" target="_blank"></a>
      <p><a>PLN sebagai perusahaan penyedia listrik seluruh Indonesia. Dalam usaha meningkatkan pelayanan pelanggan, PLN menggunakan aplikasi AP2T sebagai sarana pendukungnya agar lebih efektif dan efisien.</a><br />
      
        </p>
    </div>
    <div class="box last">
      <h1>SIMPEL</h1>
      <a class="sip" href="http://10.3.0.212/sip_211" target="_blank"></a>
      <p><a>Aplikasi SIMPEL merupakan sebuah aplikasi berbasis web yang digunakan untuk analisa data sorek. Hal-hal yang bisa digali dari aplikasi ini diantaranya jam nyala, pemakaian kwh,historis pemakaian kwh. </a> <br />
       
     </p>
    </div>
	
	
	<div class="box">
      <h1>Web Prabayar</h1>
      <a class="prabayar" href="http://10.100.1.25/" target="_blank"></a>
      <p><a>Website Prabayar menyediakan informasi data pelanggan dan transaksi pembelian token kWh listrik. website ini juga mampu menampilkan historis pembelian token listrik oleh pelanggan.</a><br />
       
        </p>
    </div>
	
	
	<div class="box last">
      <h1>MGT &amp; MKT </h1>
      <a class="mgt" href="http://10.3.123.35:8088/" target="_blank"></a>
      <p><a>MGT &amp; MKT merupakan aplikasi yang digunakan untuk mencatat gangguan dan keluhan pelanggan. Dengan aplikasi ini maka segala bentuk gangguan dan keluhan dapat diakomodir dengan baik.</a><br />
        
       </p>
    </div>
	
    <div class="box">
      <h1>SIMKPNAS Intranet </h1>
      <a class="simkp" href="http://10.6.1.41/~simkpnas/" target="_blank"></a>
      <p><a>Aplikasi manajemen kinerja pegawai  tingkat struktural dan fungsional yang hanya dapat diakses di lingkup internal kantor PLN. </a><br/>
        
     </p>
    </div>
	
    <div class="box last">
      <h1>SIMKPNAS Internet </h1>
      <a class="smuk" href="http://simkpnas2.pln-jawa-bali.co.id/" target="_blank"></a>
      <p><a>Aplikasi manajemen kinerja pegawai  tingkat struktural dan fungsional yang  melalui jalur internet sehingga dapat diakses darimana saja.. </a><br />
        </p>
    </div>
            
     <div class="box">
      <h1>E-Learning AP2T</h1>
      <a class="ap2t" href="http://5.0.0.27:8080/AP2T/Login.aspx" target="_blank"></a>
      <p><a>Aplikasi pendukung AP2T. Dengan menggunakan aplikasi ini pegawai diharapkan mampu mempelajari aplikasi AP2T dengan mudah. Dapat digunakan dengan User: LATIHAN, password: LATIHAN </a><br/>
       
      </p>
    </div>     
	 <div class="box last">
      <h1>Kliping Berita</h1>
      <a class="media" href="http://pln.trendreader.info/" target="_blank"></a>
      <p><a>Ingin tau berita terbaru seputar PLN? Anda tidak salah lagi, segera klik link Kliping Berita PLN yang berisi kumpulan berita terbaru tentang PLN. Dapat digunakan dengan User: demo, password: demo</a><br />
       
        </p>
    </div>		        
        </div>

	</div> <!-- end of sidebar -->
    
  	<div class="cleaner"></div>    

</div> <div id="templatemo_content_wrapper_bottom"></div> <!-- end of content_wrapper -->

<div id="templatemo_footer">
            <a href="http://10.3.0.178/portal_logs/">Sub Bidang TI</a> ©2011 PLN Distribusi Jakarta dan Tangerang</div> 
<!-- end of templatemo_footer -->

</body>
</html>