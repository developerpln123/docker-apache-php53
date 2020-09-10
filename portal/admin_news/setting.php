<?php
include "config.php";
include "function.php";
ini_set('session.gc_maxlifetime', 30*60);
session_start();
if($_SESSION["username"] == ""){
    echo '<script language="javascript">alert("MESSAGE : Session expired, please login again.")</script>';
	echo '<script language="javascript">window.location = "logout.php"</script>';		

}
$result = mysql_query("SELECT * FROM data_file ORDER BY time ASC");
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
	<td colspan="2"><img width="100%"  src='../images/HEADER.jpg'> </td>
  </tr>
  <tr>
	 <?php include "menu.php";?>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><span class="style2"><strong></strong></span></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
	<?php 
	$id_admin_area = $_SESSION['id_admin_area'];
	$admin_area = select_admin_area_by_id_admin_area($id_admin_area);
	?>
	<form  method="post" action="setting_submit.php">
		<fieldset>
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $admin_area[0]['username'];?>" size="30"/></br></br>
		<label>New Password</label>
		<input type="password" name="password" size="30"/></br></br>
		<label>Nama</label>
		<input type="text" name="nama" size="30" value="<?php echo $admin_area[0]['nama'];?>"/></br></br>
		
		<label></label>
		<input type="submit" value="submit">
		</fieldset>
    </form>
    </td>
  </tr>
</table>
