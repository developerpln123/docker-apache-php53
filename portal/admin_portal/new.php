<?
include "config.php";

$parent = mysql_query("SELECT ID, NAMA FROM INTERNAL_LINK WHERE STATUS=1 ORDER BY PARENT_ID");

?>
<form action="simpan.php" method="post" name="form1">
<table width="50%">
  <tr>
    <td width="17%">Nama</td>
    <td width="2%"><div align="center">:</div></td>
    <td width="81%"><input type="text" name="nama"></td>
  </tr>
  <tr>
    <td width="17%">Parent</td>
    <td width="2%"><div align="center">:</div></td>
    <td width="81%"><select name="parent_id">
	  <option value="0" >NO Parent</option>
	  <? while ($par = mysql_fetch_assoc($parent)) { ?>
      <option value="<?=$par['ID']?>" ><?=$par['NAMA']?></option>
	  <? } ?>
    </select>
  </tr>
  <tr valign="top">
    <td>Deskripsi</td>
    <td><div align="center">:</div></td>
    <td><textarea name="deskripsi" cols="30" rows="4"></textarea></td>
  </tr>
  <tr>
    <td>Link</td>
    <td><div align="center">:</div></td>
    <td><input name="link" type="text" size="50"></td>
  </tr>
  <tr>
    <td>Icon</td>
    <td><div align="center">:</div></td>
    <td><input type="text" name="icon"></td>
  </tr>
  <tr>
    <td>Status</td>
    <td><div align="center">:</div></td>
    <td><select name="status">
      <option value="0">Tidak Tampil</option>
      <option value="1">Tampil</option>
    </select>
    </td>
  </tr>
  <tr>
    <td><input type="hidden" name="jenis" value="new" /></td>
    <td>&nbsp;</td>
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