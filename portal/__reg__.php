<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="jPaginate - jQuery Pagination Plugin" />
<meta name="keywords" content="jquery, plugin, pagination, fancy" />
<title>Portal Aplikasi PLN Disjaya</title>
<link rel="shortcut icon" href="images/logo_pln.jpg" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="register_style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
function validateForm(){
	var error = '';
	var emailTest = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	
	if(! emailTest.test(document.form1.txt_email.value)){
		error += 'Email Tidak Valid..!\n';
	}
	if(document.form1.txt_email.value==''){
		error += 'Kotak Isian Email Masih Kosong..!\n';
	}
	if(document.form1.txt_nama.value==''){
		error += 'Kotak Isian Nama Masih Kosong..!\n';
	}
	if(error.length != '') { 
		alert(error);
		return false; 
	}
}

function copyText(txt){
	document.getElementById('txt_password').value = txt;
}

function cekPassword(){
	document.getElementById('txt_password').value = document.getElementById('txt_email').value;
}
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
<style type="text/css">
<!--
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style>
</head>
<body>
<div id="templatemo_header_wrapper">

  </div> <!-- end of templatemo_header -->

</div> 
<!-- end of templatemo_header_wrapper -->

<div id="templatemo_content_wrapper">

	<div id="templatemo_content" class="register" style="width:98%;">
    
		<h3 class="style1">REGISTRASI AKUN NON PEGAWAI</h3>
<span class="style1">Isi dan Lengkapi form dibawah ini untuk registrasi akun portal khusus non pegawai</span>
	  <form method="POST" action="reg_process.php" name="form1" onsubmit="return validateForm();">
		<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td width="100"><span class="style1">Email</span></td>
		  <td><input type="text" id="txt_email" name="txt_email" class="txt1" onkeyup="copyText(this.value)"></td>
		</tr>
		<tr>
			<td><span class="style1">Password</span></td>
		  <td><input type="text" id="txt_password" name="txt_password" class="txt1" disabled></td>
		</tr>
		<tr>
			<td><span class="style1">Nama</span></td><td><input type="text" name="txt_nama" class="txt1" onclick="cekPassword();"></td>
		</tr>
		<tr>
			<td><span class="style1">Nama Area</span></td><td>
			<select name="txt_area" class="style1">
			<?php
				$result = mysql_query("SELECT * FROM area WHERE area LIKE 'AREA%'");
				while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
					?>
					<option value="<?php echo $r['AREA'];?>"><?php echo $r['AREA'];?></option>
					<?php
				}
				mysql_free_result($result);
			?>
			</select>
			</td>
		</tr>
		<tr>
			<td><span class="style1">Bidang</span></td><td>
			<select name="txt_bidang">
				<option value="YANTEK">YANTEK</option>
				<option value="CATER">CATER</option>
				<option value="PDPJ">PDPJ</option>
				<option value="ADMINISTRASI">ADMINISTRASI</option>
				<option value="LAIN-LAIN">LAIN-LAIN</option>
			</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
			<input type="submit" name="submitfrm" class="btn" value="Submit">&nbsp;
			<input type="button" value="Back" class="btn" onclick="window.history.back()" />			</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2"><h6 class="style1">Keterangan : Untuk kemudahan, password disamakan dengan alamat email terdaftar</h6></td>
		</tr>
		</table>
	  </form>
    </div> <!-- end of content -->
    
	
	
	<div class="cleaner"></div>
	<br/><br/>
</div> <div id="templatemo_content_wrapper_bottom"></div> <!-- end of content_wrapper -->

<div id="templatemo_footer">
            <a href="http://10.3.0.178/portal_logs/">Sub Bidang TI</a> �2011 PLN Distribusi Jakarta dan Tangerang</div> 
<!-- end of templatemo_footer -->

</body>
</html>