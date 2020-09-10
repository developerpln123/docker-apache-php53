<?
include "../lib/config.php";
include "../lib/function.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Portal Djapra</title>
<link rel="shortcut icon" href="images/logo_pln.jpg" />
<link href="../style.css" rel="stylesheet" type="text/css" />
  
  <script src="../js/textarea/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  
<body bgcolor="#00FF00">
<table width="80%" bgcolor="#FFFFFF">
  <tr>
	<td colspan="2"><img width="100%"  src='../images/header.png'> </td>
  </tr>
  <tr>
	
</tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><span class="style2"><strong></strong></span></td>
  </tr>
  <tr>
    <td colspan="2">
	<form method="post" enctype="multipart/form-data" action="login_submit.php">
	<table width="100%">
		<tr class="form_login">
			<td width="15%" class="style2">Username</td>
			<td ><input name="var_username" size="30"></td>
		</tr>
		<tr class="form_login">
			<td width="15%" class="style2">Password</td>
			<td ><input name="var_password" size="30" type="password"></td>
		</tr>
		
		<tr class="form_login">
			<td width="15%"></td>
			<td ><input type="submit" value="Submit"></td>
		</tr>
	</table>
	</form>
	</td>
  </tr>
  <tr>
  </tr>
</table>
</body>