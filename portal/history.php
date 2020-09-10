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
<script src="tree/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#hari').click(function(){
		$('#haridetail').slideToggle('fast');
		return false;
	});
	$('#bulan').click(function(){
		$('#bulandetail').slideToggle('fast');
		return false;
	});
});
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
		      <a style="font-weight:bold;font-size:12px;" href="history.php"><u>History Login</u></a>
			  &nbsp;|&nbsp;
		      <a style="font-weight:bold;font-size:12px;" href="logout.php"><u>Logout</u></a>
		      <?php } ?>
	        </div></td> 
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>


</div>
    	
      <div class="sidebar_section">
     <!-- <marquee style="margin:0 5px -10px 5px;" behavior="scroll" direction="left" onMouseOver="this.stop();" onMouseOut="this.start();">
      <font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><B>Headline News :</B></font>&nbsp;<font face="Verdana, Arial, Helvetica, sans-serif">UJL (Uang Jaminan Langganan) diberlakukan kembali</font><B>readmore</B><br/> -->
       
        <div class="download_area">
        <h1>History Login Portal</h1>
        <p>Nama : <b><?php echo $_SESSION['pnama'];?></b></p>
        <p>NIP : <b><?php echo $_SESSION['pid'];?></b></p>
		<?php
			$sql1 = "SELECT waktu FROM `log_pegawai` WHERE nip = '".$_SESSION['pid']."' AND waktu LIKE '".date('d-m-Y')."%'";
			$array1 = array();
			$no = 1;
			$result = mysql_query($sql1);
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$array1[$no] = $row["waktu"];
				$no++;
			}
		?>
        <p id="hari" style="cursor:pointer; width:150px;">Login Hari ini : <b><?php echo ($no-1)?> kali</b></p>
		<p style="border:none;padding:0;margin:0;">
			<table border=0 id="haridetail" style="display:none;font-family:Verdana;font-size:11px;">
				<tr>
					<td>No</td>
					<td width="100">NIP</td>
					<td>Tanggal</td>
				</tr>
				<?php
				for($i=1; $i<$no; $i++){
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $_SESSION['pid'];?></td>
						<td><?php echo $array1[$i]?></td>
					</tr>
					<?php
				}
				?>
			</table>
		</p>
		<?php
			$sql2 = "SELECT waktu FROM `log_pegawai` WHERE nip = '".$_SESSION['pid']."' AND waktu LIKE '%".date('m-Y')."%'";
			$array2 = array();
			$no = 1;
			$result = mysql_query($sql2);
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$array2[$no] = $row["waktu"];
				$no++;
			}
		?>
        <p id="bulan" style="cursor:pointer; width:150px;">Login Bulan ini : <b><?php echo ($no-1)?> kali</b></p>
		<p style="border:none;padding:0;margin:0;">
			<table border=0 id="bulandetail" style="display:none;font-family:Verdana;font-size:11px;">
				<tr>
					<td>No</td>
					<td width="100">NIP</td>
					<td>Tanggal</td>
				</tr>
				<?php
				for($i=1; $i<$no; $i++){
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $_SESSION['pid'];?></td>
						<td><?php echo $array2[$i]?></td>
					</tr>
					<?php
				}
				?>
			</table>
		</p>
        </div> 
		
		
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
</body>
</html>