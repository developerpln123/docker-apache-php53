<link rel="stylesheet" href="<?php echo base_url();?>public/media/css/mytable.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/media/css/jquery-ui.css">
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>public/media/js/jquery-ui.js"></script>
<script type="text/javascript" charset="utf-8">

</script>

<div class="tablestyle1">
<form method="POST" action="<?php echo site_url('admin/add_link_save');?>">
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
			<td><input type="text" name="nama"></td>
		</tr>
		<tr>
			<td>PARENT</td>
			<td>
			<select name="parent_id"><option value="0" >NO Parent</option>
				<?php
					foreach($parent as $r){
						?>
						<option value="<?=$r['ID']?>" ><?=$r['NAMA']?></option>
						<?php
					}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td>DESKRIPSI</td>
			<td><textarea name="deskripsi" cols="30" rows="4"></textarea></td>
		</tr>
		<tr>
			<td>LINK</td>
			<td><input name="link" type="text" size="50"></td>
		</tr>
		<tr>
			<td>ICON</td>
			<td><input type="text" name="icon"></td>
		</tr>
			<tr>
				<td>STATUS</td>
			<td><select name="status">
				<option value="0">Tidak Tampil</option>
				<option value="1">Tampil</option>
			</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" class="btn1" value="SAVE"></td>
		</tr>
	</tbody>
</table>
</form>
</div>