<?
/* session_start();
if($_SESSION['pegawai']) header('Location: index.php');
include "cek_session2.php"; */
?>

<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 	<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
	<title>Login Form</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	<link rel="stylesheet" href="stylesheets/login_base.css">
	<link rel="stylesheet" href="stylesheets/login_skeleton.css">
	<link rel="stylesheet" href="stylesheets/login_layout.css">
	<script src="tree/jquery.js"></script>
	<script type="text/javascript">
$(document).ready(function(){
		$('#closeme').click(function(){
			$('#notices').slideUp(250);
			return false;
		});
	});
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
	
    <style type="text/css">
<!--
.style1 {color: #FF0000}
.style2 {font-family: Arial, Helvetica, sans-serif}
.style4 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10;
}
-->
    </style>
</head>
<body onLoad="MM_preloadImages('images/reg2.png')">
	
	<?php
		if($_GET['msg']) {
			$msg = $_GET['msg'];
			if($msg == '10') {
				?>
<div id="notices" class="notice"><span class="style2"><a href="" id="closeme" class="close">close</a>
				</span>
				  <p class="warn style2">Isikan Username dan Password.</p>
</div>
<?php
			} elseif($msg == '20') {
				?>
				<div id="notices" class="notice"><span class="style2"><a href="" id="closeme" class="close">close</a>
				</span>
				  <p class="warn style2">Username dan Password Anda Tidak Dikenal.</p>
</div>
<?php
			}
		}
	?>
<div align="right" >
<!--
<a href="http://10.3.0.178/portal/reg.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('reg_button','','images/reg2.png',1)"><img src="images/reg1.png" name="reg_button" width="195" height="50" border="0"></a>
-->
</div>	
	<div class="container">

		
  <div class="form-bg">
			<form method="POST" action="login_process.php">
				<h2>SELAMAT DATANG DI  PORTAL DISJAYA</h2>
				<p><div class="domain">@pln.co.id</div><input type="text" name="_email" placeholder="Email"></p>
				<p><input type="password" name="_password" placeholder="Password"></p>
				<p style="float:right;padding:5px 20px 0 0;"><a href="index3.php" class="style1"></a></p>
			  <button type="submit"></button> 
			  <div align="right">
			    <span class="style4"><span class="style1">User Non Pegawai</span><br/>
		      </span></div>
	          <div style="float:right; font-size:11px; line-height:10px;">username = pass = email yg sudah<br/>didaftarkan per area </div>
		      
		  </form>
		</div>
		<div style="margin-top:8px;"></div>
	</div>

</body>
</html>