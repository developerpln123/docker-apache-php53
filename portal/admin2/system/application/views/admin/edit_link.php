<link rel="stylesheet" href="<?php echo base_url();?>public/media/css/mytable.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/media/css/jquery-ui.css">
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>public/media/js/jquery-ui.js"></script>
<script type="text/javascript" charset="utf-8">

</script>
<?php
foreach($result as $r){
	$id = $r['id'];
	$parent_id = $r['parent_id'];
	$nama = $r['nama'];
	$deskripsi = $r['deskripsi'];
	$link = $r['link'];
	$status = $r['status'];
	$icon = $r['icon'];
	$urut = $r['urut'];
}
?>
<div class="tablestyle1">
<form method="POST" action="<?php echo site_url('admin/edit_link_save');?>">
<table id="hor-minimalist-a" align="left" style="width:500px;">
	<thead>
		<tr >
			<th scope="col" style="width:150px;">FIELD</th>
			<th scope="col">VALUE</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>NAMA</td>
			<td><input type="text" name="nama" value="<?php echo $nama;?>"></td>
		</tr>
		<tr>
			<td>PARENT</td>
			<td>
			<select name="parent_id"><option value="0" <?php if($parent_id == "0") echo "SELECTED";?>>NO Parent</option>
				<?php
					foreach($parent as $r){
						?>
						<option value="<?=$r['ID']?>" <?php if($parent_id == $r['ID']) echo "SELECTED";?>><?=$r['NAMA']?></option>
						<?php
					}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td>DESKRIPSI</td>
			<td><textarea name="deskripsi" cols="30" rows="4"><?php echo $deskripsi;?></textarea></td>
		</tr>
		<tr>
			<td>LINK</td>
			<td><input name="link" type="text" size="50" value="<?php echo $link;?>"></td>
		</tr>
		<tr>
			<td>ICON</td>
			<td><input type="text" name="icon" value="<?php echo $icon;?>"></td>
		</tr>
			<tr>
				<td>STATUS</td>
			<td><select name="status">
				<option value="0" <?php if($status == "0") echo "SELECTED";?>>Tidak Tampil</option>
				<option value="1" <?php if($status == "1") echo "SELECTED";?>>Tampil</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>ORDER</td>
			<td><input name="order" type="text" size="5" value="<?php echo $urut;?>" /></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2"><input name="id" type="hidden" value="<?php echo $id;?>"><input type="submit" class="btn1" value="SAVE"></td>
		</tr>
	</tbody>
</table>
</form>
</div>