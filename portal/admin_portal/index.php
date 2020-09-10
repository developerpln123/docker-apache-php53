<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Portal Admin</title>
<link rel="shortcut icon" href="images/logo_pln.jpg" />
<link href="style.css" rel="stylesheet" type="text/css" />
<?
include "config.php";
$result = mysql_query("SELECT * FROM internal_link ORDER BY PARENT_ID,URUT ASC");
?>
<style type="text/css">
<!--
.style1 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
<table width="100%">
  <tr>
    <td><span class="style1"><strong>Portal Administrator</strong> | <a href="new.php">Add</a></span> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="">
      <table width="1200px" id="box-table-a">
        <thead>
		<tr>
<th width="4%"><strong>No</strong></th>
	      <th width="4%"><strong>ID</strong></th>
          <th width="4%"><strong>Parent ID</strong></th>
          <th width="20%"><strong>Nama</strong></th>
          <th width="25%"><strong>Deskripsi</strong></th>
          <th width="5%"><strong>Icon</strong></th>
          <th width="4%"><strong>Status</strong></th>
          <th width="4%"><strong>Order</strong></th>
          <th width="15%"><strong>Tindakan</strong></th>
        </tr></thead>
		<tbody>
		<? $i=1;
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		?>
        <tr>	  <td><?=$i?></td>
		  <td><?=$row['id']?></td>
		  <td><?=$row['parent_id']?></td>
          <td><img src="../images/<?=$row['icon']?>" width="20" height="20" />&nbsp;&nbsp;<strong><?=$row['nama']?></strong></td>
          <td><?=$row['deskripsi']?></td>
          <td><?=$row['icon']?></td>
          <td align="center"><img src="../images/<? if($row['status']==1) echo "tick.png"; else echo "red_cross.png";?>" width="20" height="20"/></td>
          <td><?=$row['urut']?></td>
          <td><a href="edit.php?id=<?=$row['id']?>">Edit</a> | <a href="delete.php?id=<?=$row['id']?>">Delete</a> </td>
        </tr>
		<?
		$i++;}
		?></tbody>
      </table>
        </form>
    </td>
  </tr>
</table>
