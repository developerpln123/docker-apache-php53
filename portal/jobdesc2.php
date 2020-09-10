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
<style type="text/css">
<!--
.style1 {
	font-size: 11px;
	font-family: Geneva, Arial, Helvetica, sans-serif;
	color: #FF0000;
}
-->
</style>
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
        <h1>Job Description</h1>
		<div align="right" class="style1">Untuk men-download silahkan klik kanan kemudian pilih "save link"</div>
        <p><br/>
        <a href="http://10.3.0.70/www.km-plnjaya.com/Database%5CJOB%20DESCRIPTION%5CUrjab,%20KKJ%20&%20Dirkom%20Distribusi%202012%5CStandar%20Uraian%20Jabatan%20PT%20PLN%20(Persero)%20Distribusi%20Jawa-Bali%20Edisi%201%20Tahun%202012.pdf"><img src="images/downloadhijau.png" width="20" height="20" /> Buku Standar Uraian Jabatan 2012</a><br/>
        <a href="http://10.3.0.70/www.km-plnjaya.com/Database%5CJOB%20DESCRIPTION%5CUrjab,%20KKJ%20&%20Dirkom%20Distribusi%202012%5CDirektori%20Kebutuhan%20Kompetensi%20Jabatan%202012%20-%20Edisi%20Online%201.pdf"><img src="images/downloadhijau.png" width="20" height="20" /> Buku Direktori Kebutuhan Kompetensi Jabatan 2012 </a><br/>
        <a href="http://10.3.0.70/www.km-plnjaya.com/Database%5CJOB%20DESCRIPTION%5CUrjab,%20KKJ%20&%20Dirkom%20Distribusi%202012%5CDirektori%20Kompetensi%202012%20-%20Edisi%20Online%201.pdf"><img src="images/downloadhijau.png" width="20" height="20" /> Buku Direktori Kompetensi 2012 </a><br/>
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