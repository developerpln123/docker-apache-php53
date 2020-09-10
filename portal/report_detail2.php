<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Pingmon | Monitoring Server Disjaya</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="green_style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Bauhaus_Md_BT_400.font.js" type="text/javascript"></script>
<!--[if lt IE 7]><link href="style_ie.css" rel="stylesheet" type="text/css" /><![endif]-->
</head>
<body id="page4">
<div id="main">
  <!-- header -->
  <div id="header">
	<? include "menu_atas.php"; ?>
    <div class="logo"><a href="#"><img src="images/logo.png" alt="" /></a></div>
  </div>
  <!-- content -->
  <div id="content">
    <div class="indent1">
      <h2>DETAIL REPORT PROVIDER</h2>
      <div class="img-box1">

<?php include('koneksi.php'); ?>

    <table id="hor-minimalist-b" summary="monitoring" width="80%" height="100%">
      <thead>
        <tr>
          <th >No.</th>
          <th align="left">IP ADDRESS</th>
          <th align="left">WAKTU</th>
        </tr>
      </thead>
      <tbody>
,
<?php    
	$ip = $_GET['ip_address'];
	$status = $_GET['putus'];
	$ambil = "SELECT L.ip_address,L.waktu, L.status, P.ip_address, P.jml_putus 
				from `logs` L, `v_ip_putus` P 
				where P.jml_putus='".$status."'
				AND P.ip_address='".$ip."' 
				AND L.ip_address=P.ip_address
				AND L.status=0
				ORDER BY L.waktu ASC";
	$result = mysql_query($ambil, $koneksi);
	$i=1;
	while($isi=mysql_fetch_object($result))
		{ ?>
		  <tr>
          <td align="center"><?=$i?></td>
		  <td align="left"><?=$isi->ip_address?></td>
		  <td align="left"><?=$isi->waktu?></td>       
		</tr>
        <?php $i++; } ?>
      </tbody>
    </table>


      </div>
    </div>
  </div>
  <!-- footer -->
  <div id="footer">
    <div class="indent">
      <div class="fleft"><strong>Sub Bidang TI </strong>�2011 PLN Distribusi Jakarta dan Tangerang</div>
      <div class="fright">Designed by: <a href="http://www.templates.com"><img alt="" src="images/templates-logo.gif" /></a>&nbsp;</div>
    </div>
  </div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
