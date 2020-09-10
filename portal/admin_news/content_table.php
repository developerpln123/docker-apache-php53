
<?php if($_SESSION['hak_akses'] == "1"){ ?>

		<td colspan="2">
		  <table  id="box-table-a" width="100%">
			<thead>
			<tr>
			<th width="4%"><strong>No</strong></th>
			  <th width="20%"><strong>Judul</strong></th>
			  <th width="20%"><strong>Nama File</strong></th>
			  
			  <th width="20%"><strong>Keterangan</strong></th>
			  <th width="15%"><strong>Tanggal Upload</strong></th>
			  <th width="8%"><strong>Bulan</strong></th>
			  <th width="8%"><strong>Tahun</strong></th>
			  
			  
			  <th width="10%"><strong>Hapus</strong></th>
			</tr></thead>
			<tbody>
			<? 
			$data_file = select_data_file($_SESSION['kdarea']);
			for($i = 0; $i<count($data_file); $i++) {
			?>
			<tr>
				<td><?php echo $i+1?></td>
				<td><?php echo $data_file[$i]['judul']?></td>
				<td><a href="upload/<?php echo $data_file[$i]['nama_file_rename']?>" target="_blank"><?=$data_file[$i]['nama_file_asli']?></a></td>
				
				<td><?php echo $data_file[$i]['keterangan']?></td>
				<td><?php echo $data_file[$i]['tanggal_upload']?></td>
				<td><?php echo $data_file[$i]['bulan']?></td>
				<td><?php echo $data_file[$i]['tahun']?></td>
				<td align="center"><a href="delete.php?id_data_file=<?php echo $data_file[$i]['id_data_file'];?>&nama_file_rename=<?php echo $data_file[$i]['nama_file_rename']?>" onclick='return confirm("Delete <?php echo $data_file[$i]['judul'];?>")'><img src="../images/red_cross.png" width="20" height="20"/></a></td>
			</tr>
			<?}
			?></tbody>
		  </table>
		</td>
  
<?php }else if($_SESSION['hak_akses'] == "2"){ ?>
		<td colspan="2">
		  <table  id="box-table-a" width="100%">
			<thead>
			<tr>
			<th width="4%"><strong>No</strong></th>
			  <th width="20%"><strong>Nama</strong></th>
			  <th width="20%"><strong>Area</strong></th>
			  
			  <th width="20%"><strong>Username</strong></th>
			  <th width="15%"><strong>Hak akses</strong></th>
			  <th width="10%"><strong>Hapus</strong></th>
			</tr></thead>
			<tbody>
			<? 
			$data_admin_area = select_admin_area();
			for($i = 0; $i<count($data_admin_area); $i++) {
			?>
			<tr>
				<td><?php echo $i+1?></td>
				<td><?php echo $data_admin_area[$i]['nama']?></td>
				<td><?php echo $data_admin_area[$i]['nama_area']?></td>
				<td><?php echo $data_admin_area[$i]['username']?></td>
				<td><?php if($data_admin_area[$i]['hak_akses'] == "1") echo "Admin Area";
						else echo "Super Admin";?></td>
				<td align="center">
					<a href="edit.php?id_admin_area=<?php echo $data_admin_area[$i]['id_admin_area'];?>" >Edit </a>
					<a href="delete.php?id_admin_area=<?php echo $data_admin_area[$i]['id_admin_area'];?>" onclick='return confirm("Delete <?php echo $data_admin_area[$i]['nama'];?>")'>|Delete</a>
				</td>
			</tr>
			<?}
			?></tbody>
		  </table>
		</td>
	
<?php }?>