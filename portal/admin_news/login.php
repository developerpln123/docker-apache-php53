<?php
include "config.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Portal News Letter</title>
<link rel="shortcut icon" href="images/logo_pln.jpg" />
<link href="style.css" rel="stylesheet" type="text/css" />

<style type="text/css">

.style1 {font-family: Arial, Helvetica, sans-serif}
.style2 {font-family: Tahoma}

table
{ 
    margin-left: auto;
    margin-right: auto;
}
</style>
<table width="80%">
  <tr>
	<td ><img width="100%"  src='../images/HEADER.jpg'> </td>
  </tr>
  <tr>
    <td><span class="style1"><strong>Login Admin News Letter</strong></span> </td>
    
  </tr>
  <tr>
    <td >&nbsp;</td>
  </tr>
  <tr> 
	<td>
	<form action="login_submit.php" method="post">
	<table align="left" width="30%">
		<tr>
			<td>Username </td>
			<td>: <input type="text" name="var_username" size="30"></td>
		</tr>
		<tr>
			<td>Password </td>
			<td>: <input type="password" name="var_password" size="30"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit"></td>
		</tr>
	</table>
	</form>
	</td>
  </tr>
  <tr>
    <td >&nbsp;</td>
  </tr>
  
</table>
