<?
session_start();
include "cek_session.php";
?>

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
include "admin_portal/config.php";
$result = mysql_query("SELECT * FROM INTERNAL_LINK WHERE STATUS=1 ORDER BY URUT ASC");
?>
</head>
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
        <h1>Link Kliping PLN</h1>
        <p>
        <a href="http://10.6.1.236/~klipingpln/"><img src="images/downloadhijau.png" width="20" height="20" />http://10.6.1.236/~klipingpln/</a><br/>
        <a href="http://pln.trendreader.info/index.php"><img src="images/downloadhijau.png" width="20" height="20" />http://pln.trendreader.info/index.php</a><br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;username = password = demo
        </p>
        </div>
        </div>
  </div> <!-- end of sidebar
        <div class="sidebar_section"><br/>
        <h1>Buku Standar Konstruksi</h1>
        <p>
        <a href="ftp://10.3.0.205/REN/UMUM/standar_konstruksi/buku1_KriteriaDesainEnjineeringKonstruksiJaringanDistribusi/PLNBuku1.pdf"><img src="images/downloadhijau.png" width="20" height="20" /> Kriteria Desain Enjineering Konstruksi Jaringan Distribusi</a>
        <a href="ftp://10.3.0.205/REN/UMUM/standar_konstruksi/buku2_StandarKonstruksiSambunganTenagaListrik/PLNBuku2.pdf"><img src="images/downloadhijau.png" width="20" height="20" /> Standar Konstruksi Sambungan Tenaga Listrik </a>
        <a href="ftp://10.3.0.205/REN/UMUM/standar_konstruksi/buku3_StandarKonstruksiJaringanTeganganRendahTenagaListrik/PLNBuku3.pdf"><img src="images/downloadhijau.png" width="20" height="20" /> Standar Konstruksi Jaringan Tegangan Rendah Tenaga Listrik </a>
        </p>
        </div> -->
    
  	<div class="cleaner"></div>    
</div> <div id="templatemo_content_wrapper_bottom"></div> <!-- end of content_wrapper -->

<div id="templatemo_footer">
            <a href="http://10.3.0.178/portal_logs/">Sub Bidang TI</a> ©2011 PLN Distribusi Jakarta dan Tangerang</div> 
<!-- end of templatemo_footer -->

</body>
</html>