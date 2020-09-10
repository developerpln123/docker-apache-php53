<?php
	include "../admin_portal/config.php";
	$nip = $_GET['nip'];
	$bulan = $_GET['bln'];
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
		$('#table1').dataTable({
			"sPaginationType": "full_numbers",
			'iDisplayLength': 20
		});
	});
</script>
</head>
<body>
	<div id="container">
	
	<div id="header">
		<?php include 'menu.php';?>
	</div>
	<div id="tables">
		<div id="centerpage">
			<h2>REKAPITULASI LAPORAN AKSES PORTAL DISJAYA</h2><br>
			<table border="0" class="display" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>NIP</th>
						<th>Nama</th>
						<th>Browser</th>
						<th>Waktu</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					$sql = "SELECT * FROM log_pegawai 
							WHERE waktu LIKE '%".$bulan."%' AND nip = '".$nip."' ORDER BY id_log_pegawai DESC";
					$res = mysql_query($sql);
					while ($r = mysql_fetch_array($res, MYSQL_ASSOC)) {
						?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $r['nip'];?></td>
							<td><?php echo $r['nama'];?></td>
							<td><?php echo $r['browser'];?></td>
							<td><?php echo $r['waktu'];?></td>
						</tr>
						<?php
						$no++;
					}
				?>
				</tbody>
			</table>
		</div>
		
		<div style="clear:both;"></div>
	</div>
	
	</div>

</body>
</html>	
	