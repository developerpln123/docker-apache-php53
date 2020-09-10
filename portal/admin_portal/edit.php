<?
include "config.php";
$id = $_GET['id'];
$result = mysql_query("SELECT * FROM INTERNAL_LINK WHERE ID=".$id);
$row = mysql_fetch_object($result);

$parent = mysql_query("SELECT ID, NAMA FROM INTERNAL_LINK ORDER BY PARENT_ID");

?>
<form action="simpan.php" method="post" name="form1">
<table width="50%">
  <tr>
    <td width="17%">Nama</td>
    <td width="2%"><div align="center">:</div></td>
    <td width="81%"><input type="text" name="nama" value="<?=$row->nama?>"></td>
  </tr>
  <tr>
    <td width="17%">Parent</td>
    <td width="2%"><div align="center">:</div></td>
    <td width="81%"><select name="parent_id">
	  <option value="0" <? if($row->parent_id==0) echo 'selected="selected"'; ?>>NO Parent</option>
	  <? while ($par = mysql_fetch_assoc($parent)) { ?>
      <option value="<?=$par['ID']?>" <? if($par['ID']==$row->parent_id) echo 'selected="selected"'; ?>><?=$par['NAMA']?></option>
	  <? } ?>
    </select>
    </td>
  </tr>
  <tr valign="top">
    <td>Deskripsi</td>
    <td><div align="center">:</div></td>
    <td><textarea name="deskripsi" cols="30" rows="4"><?=$row->deskripsi?></textarea></td>
  </tr>
  <tr>
    <td>Link</td>
    <td><div align="center">:</div></td>
    <td><input name="link" type="text" size="50" value="<?=$row->link?>"></td>
  </tr>
  <tr>
    <td>Icon</td>
    <td><div align="center">:</div></td>
    <td><input type="text" name="icon" value="<?=$row->icon?>"></td>
  </tr>
  <tr>
    <td>Status</td>
    <td><div align="center">:</div></td>
    <td><select name="status">
      <option value="0" <? if($row->status == 0) echo 'selected="selected"';?>>Tidak Tampil</option>
      <option value="1" <? if($row->status == 1) echo 'selected="selected"';?>>Tampil</option>
    </select>    </td>
  </tr>
  <tr>
    <td>Order</td>
    <td><div align="center">:</div></td>
    <td><input name="order" type="text" size="2" value="<?=$row->urut?>" /></td>
  </tr>
  <tr>
    <td><input type="hidden" name="jenis" value="edit" /></td>
    <td><input type="hidden" name="id" value="<?=$row->id?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Submit"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>