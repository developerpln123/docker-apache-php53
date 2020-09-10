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

<a style="text-decoration:none;" href="<?php echo site_url('admin/add_user');?>">+ ADD NEW RECORD</a>
<br>
<br>
<table border="0" class="display" id="table1">
<thead>
	<tr>
		<th>No</th>
		<th>Level</th>
		<th>Email</th>
		<th>Status</th>
		<th>Opsi</th>
	</tr>
<thead>
<tbody>
	
		<?php
		$no=1;
		foreach($result as $r){
			if($r['status'] == '1') $status = "Aktif";
			else $status = "Tidak Aktif";
			?>
			<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $r['level'];?></td>
			<td><?php echo $r['email'];?></td>
			<td align="center"><?php echo $status;?></td>
			<td align="center"><a href="<?php echo site_url('admin/delete_user/'.$r['id_admin_portal'])?>" onclick="return confirmHapus();">Delete</a></td>
			</tr>
			<?php
			$no++;
		}
		?>
	
</tbody>
</table>