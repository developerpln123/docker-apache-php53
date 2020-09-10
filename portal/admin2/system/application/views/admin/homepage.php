<link rel="stylesheet" href="<?php echo base_url();?>public/media/css/demo_table.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/media/css/jquery-ui.css">
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>public/media/js/jquery-ui.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#table1').dataTable({
			"sPaginationType": "full_numbers",
			"iDisplayLength": 20
		});
	} );
	function confirmHapus(){
		var cek = confirm('Anda yakin akan menghapus data ini?');
		if (cek==true) return true;
		else return false;
	}
</script>

<a style="text-decoration:none;" href="<?php echo site_url('admin/add_link');?>">+ ADD NEW RECORD</a>
<br>
<br>
<table border="0" class="display" id="table1">
<thead>
	<tr>
		<th>No</th>
		<th>ID</th>
		<th>Parent ID</th>
		<th>Nama</th>		
		<th>Status</th>
		<th>Order</th>
		<th>Tindakan</th>
		
	</tr>
<thead>
<tbody>
	
		<?php
		$no = 1;
		foreach($link as $r){
			?>
			<tr>
			<td align="center"><?php echo $no;?></td>
			<td align="center"><?php echo $r['id'];?></td>
			<td align="center"><?php echo $r['parent_id'];?></td>
			<td><strong><?php echo $r['nama']?></strong></td>
			<td align="center"><img src="../../../images/<? if($r['status']==1) echo "tick.png"; else echo "red_cross.png";?>" width="20" height="20"/></td>
			<td><?php echo $r['urut'];?></td>
			<td><a href="<?php echo site_url('admin/edit_link/'.$r['id'])?>">Edit</a> | <a href="<?php echo site_url('admin/delete_link/'.$r['id'])?>" onclick="return confirmHapus();">Delete</a></td>
			</tr>
			<?php
			$no++;
		}
		?>
	
</tbody>
</table>