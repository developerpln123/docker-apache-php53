<?
if(!isset($_COOKIE['portal_id_unik'] ) && $_COOKIE['portal_id_unik'] == "" )
{
	header( 'Location: login_taw.php' ) ;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<link rel="shortcut icon" href="images/logo_pln.jpg" />
<title>Awesomemetrics</title> 
 
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
.style1 {
	color: #FF0000;
	font-weight: bold;
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
        <h1>Awesomemetrics<br />
        </h1>
        
		<p>
        Adalah sebuah situs web yang berisi kumpulan kliping berita PLN dari berbagai media.<br />
web ini dapat diakses dengan menggunakan:<br />
User	: PLN<br />
Password: listriknegara<br />
Klik <a style="color:#FF0000" href="http://my.awesometrics.com/user/login" >http://my.awesometrics.com/user/login</a> untuk menuju alamat situs tersebut.  <br/>
Klik <a style="color:#FF0000" href="files/panduan_media_monitoring.ppt" >disini</a> untuk download panduan.       </p>
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