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

	<div id="templatemo_header" align="right"><!-- end of templatemo_menu -->
  </div> <!-- end of templatemo_header -->

</div> 
<!-- end of templatemo_header_wrapper -->

<div id="templatemo_content_wrapper">

	<div id="templatemo_content">
    
        <div class="content_section">
        
            <a href="http://10.3.0.178/mobile" target="_blank"><img src="images/mobile.png"width="180" height="60"/></a><br/>
            
      </div>
        <div class="content_section">
          <p><? include "menu_slide/menu4.php"; ?></p>
        </div>
    

    </div> <!-- end of content -->

    
    <div id="templatmeo_sidebar">

<div class="sidebar_section">
<table width="100%" border="0">
  <tr>
    <td width="64%">&nbsp;</td>
    <td width="36%" bgcolor="#FFFF00">
    <strong><font color="#FF0000" size="2"> <img src="images/star.png" width="17" height="17" />&nbsp;HOT News:&nbsp;&nbsp;</b></font></strong><a href="hotnews_ees.php"><font color="#333" size="2"><u>Kewajiban Mengisi EES</u></font></a></td>
  </tr>
</table>


</div>
    	
      <div class="sidebar_section">
     <!-- <marquee style="margin:0 5px -10px 5px;" behavior="scroll" direction="left" onMouseOver="this.stop();" onMouseOut="this.start();">
      <font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><B>Headline News :</B></font>&nbsp;<font face="Verdana, Arial, Helvetica, sans-serif">UJL (Uang Jaminan Langganan) diberlakukan kembali</font><B>readmore</B><br/> -->
       <?php include "imageslider.php"; ?>        
        
        </div>

	</div> <!-- end of sidebar -->
    
  	<div class="cleaner"></div>    

</div> <div id="templatemo_content_wrapper_bottom"></div> <!-- end of content_wrapper -->

<div id="templatemo_footer">
            <a href="http://10.3.0.178/portal_logs/">Sub Bidang TI</a> ©2011 PLN Distribusi Jakarta dan Tangerang</div> 
<!-- end of templatemo_footer -->
<BR />
<BR />
<p>&nbsp;</p><p>&nbsp;</p>
</body>
</html>