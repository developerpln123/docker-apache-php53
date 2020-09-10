<?php
	include "../admin_portal/config.php";
?>
<html>
<head>
<title>Log Data Portal</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="media/css/demo_page.css">
<link rel="stylesheet" href="media/css/demo_table.css">
<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#table1').dataTable();
		$('#table2').dataTable();
		$('#table3').dataTable();
	} );
</script>
</head>
<body>

	<div id="container">
	
	<div id="header">
		<?php include 'menu.php';?>
	</div>
	
	<div id="tables">
		
		
		<div id="centerpage">
			<h2>20 Login Terbaru Hari ini (<?php echo date('d/m/Y')?>) - <a href="detail.php">All</a></h2>
			<table border="0" class="display" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>IP Address</th>
						<th>NIP</th>
						<th>Nama Pegawai</th>
						<th>Email</th>
						<th>Waktu Login</th>
					</tr>
				</thead>
				<tbody>
			<?php
			$sql = "SELECT nip,nama,ip,waktu,keterangan FROM log_pegawai WHERE waktu LIKE '%".date('d-m-Y')."%' ORDER BY id_log_pegawai DESC LIMIT 20";
			$result = mysql_query($sql);
			$no = 1;
			while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
				?>
					<tr class="gradeA">
						<td><?php echo $no;?></td>
						<td><?php echo $r['ip'];?></td>
						<td><?php echo $r['nip'];?></td>
						<td><?php echo "<a href=\"detail.php?tipe=10&nip=".$r['nip']."\">".$r['nama']."</a>";?></td>
						<td><?php echo $r['keterangan'];?></td>
						<td><?php echo $r['waktu'];?></td>
					</tr>
				<?php
				$no++;
			}
			?>
				</tbody>
			</table>
			
			<br/><br/>
			<br/><br/>
			
			<h2>10 Login User Teraktif Hari ini (<?php echo date('d/m/Y')?>) - <a href="detail.php?tipe=21">All</a></h2>
			<table border="0" class="display" id="table2">
				<thead>
					<tr>
						<th>No</th>
						<th>NIP</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Area</th>
						<th>Total Login</th>
					</tr>
				</thead>
				<tbody>
			<?php
			$sql = " SELECT DISTINCT (nip) AS nip,nama,keterangan,count(nip) AS jml,nama_area
					FROM log_pegawai
					WHERE waktu LIKE '%".date('d-m-Y')."%' GROUP BY nip ORDER BY jml DESC LIMIT 10";
			$result = mysql_query($sql);
			$no = 1;
			while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
				?>
					<tr class="gradeA">
						<td><?php echo $no;?></td>
						<td><?php echo $r['nip'];?></td>
						<td><?php echo "<a href=\"detail.php?tipe=10&nip=".$r['nip']."\">".$r['nama']."</a>";?></td>
						<td><?php echo $r['keterangan'];?></td>
						<td><?php echo $r['nama_area'];?></td>
						<td><?php echo $r['jml'] . " Kali";?></td>
					</tr>
				<?php
				$no++;
			}
			?>
				</tbody>
			</table>
			
			<br/><br/>
			<br/><br/>
			
			<h2>Browser yang Digunakan </h2>
			<table border="0" class="display" id="table3">
				<thead>
					<tr>
						<th>No</th>
						<th>Browser</th>
						<th>Total Digunakan</th>
					</tr>
				</thead>
				<tbody>
			<?php
			$sql = "SELECT DISTINCT (browser) AS browser, count( browser ) AS jml
					FROM log_pegawai GROUP BY browser ORDER BY jml DESC";
			$result = mysql_query($sql);
			$no = 1;
			while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
				?>
					<tr class="gradeA">
						<td><?php echo $no;?></td>
						<td><?php echo $r['browser'];?></td>
						<td><?php echo $r['jml'] . " Kali";?></td>
					</tr>
				<?php
				$no++;
			}
			?>
				</tbody>
			</table>
			
			
		<div style="clear:both;"></div>
		</div>
		
		<div id="leftpage">
			<?php include "sidebar.php";?>
		</div>
		<div style="clear:both;"></div>
	
	</div>
	
	
	
	</div>

</body>
</html>