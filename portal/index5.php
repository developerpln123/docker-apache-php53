<?
//session_start();
//include "cek_session.php";
header( 'Location: http://10.3.0.178/portal/index_taw.php' ) ;
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
    <link href="jsImgSlider/themes/5/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="jsImgSlider/themes/5/js-image-slider.js" type="text/javascript"></script>
    <link href="jsImgSlider/generic.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#pdf {
	width: 1000px;
	height: 500px;
	margin: 2em auto;
	border: 2px solid #333333;
}
#pdf p {
	padding: 1em;
}
#pdf object {
	display: block;
	border: solid 1px #666;
}
.bgCover { 
	background:#000; 
	position:absolute; 
	left:0; 
	top:0; 
	display:none; 
	overflow:hidden; 
}
.overlayBox {
	display:none;
	z-index:1000;
}
.closeLink {
	float:right; font-size:14px; margin:10px 5px 0 0;
	background-color:#FFFF00; 
}
 
a:hover { text-decoration:none; }
-->
</style>
<script type="text/javascript" src="tree/jquery.js"></script>
<script type="text/javascript" src="tree/pdfobject.js"></script>
<script type="text/javascript">
/*
window.onload = function (){
	var success = new PDFObject({ url: "pengumuman_kpk1.pdf" }).embed("pdf");
};
$(document).ready(function() {
	doOverlayOpen();
});
$(document).click(function() {
	doOverlayClose();
});
*/
</script>
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
<div class="bgCover">&nbsp;</div>
<div class="overlayBox">
	<div class="overlayContent">
		<a href="#" class="closeLink" style="color:#fe1201;">CLOSE</a>
	</div>
	<div id="pdf"></div>
</div>

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
    	<td colspan="2">		
		  <div align="right">
		    <?php if($_SESSION['pegawai'] == 'Pegawai') { ?>
		      <a style="font-weight:bold;font-size:12px;" href="history.php">History Login</a>
			  &nbsp;|&nbsp;
			  <?php } ?>
			<?php if($_SESSION['pegawai']) { ?>
		      <a style="font-weight:bold;font-size:12px;" href="logout.php">Logout</a>
		      <?php } ?>
	        </div></td> 
    </tr>
  <tr>
    <td width="34%" align="right">New Feature : <a style="font-weight:bold;font-size:12px;color:#FF0000;" href="http://10.3.0.178/portal/log2/" target="#"><u>Report Portal</u></a></td>
  </tr>
    <tr>
    <td width="34%">&nbsp;</td>
    <!--<td width="66%" bgcolor="#FFFF00"> </td>-->
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
            <a href="http://10.3.0.178/portal_logs/">Sub Bidang TI</a> �2011 PLN Distribusi Jakarta dan Tangerang</div> 
<!-- end of templatemo_footer -->
<BR />
<BR />
<p>&nbsp;</p><p>&nbsp;</p>

<script language="javascript">
function showOverlayBox() {
	//if box is not set to open then don't do anything
	if( isOpen == false ) return;
	// set the properties of the overlay box, the left and top positions
	$('.overlayBox').css({
		display:'block',
		left:( $(window).width() - $('.overlayBox').width() )/2,
		top:( $(window).height() - $('.overlayBox').height() )/2 -20,
		position:'absolute'
	});
	// set the window background for the overlay. i.e the body becomes darker
	$('.bgCover').css({
		display:'block',
		width: $(window).width(),
		height:$(window).height(),
	});
}
function doOverlayOpen() {
	//set status to open
	isOpen = true;
	showOverlayBox();
	$('.bgCover').css({opacity:0}).animate( {opacity:0.5, backgroundColor:'#000'} );
	// dont follow the link : so return false.
	return false;
}
function doOverlayClose() {
	//set status to closed
	isOpen = false;
	$('.overlayBox').css( 'display', 'none' );
	// now animate the background to fade out to opacity 0
	// and then hide it after the animation is complete.
	$('.bgCover').animate( {opacity:0}, null, null, function() { $(this).hide(); } );
}
// if window is resized then reposition the overlay box
$(window).bind('resize',showOverlayBox);
// activate when the link with class launchLink is clicked
$('a.launchLink').click( doOverlayOpen );
// close it when closeLink is clicked
$('a.closeLink').click( doOverlayClose );
</script>
</body>
</html>