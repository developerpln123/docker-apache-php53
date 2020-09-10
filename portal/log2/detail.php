<?php
	include "../admin_portal/config.php";
	$kondisi = $_GET['s'];
	$bulan = $_GET['bln'];
	$area = $_GET['unit'];
	$array_month = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
	
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
						<th>Email</th>
						<th>Area</th>
						<th>Login</th>
					</tr>
				</thead>
				<tbody>
				<?php
					if($kondisi == "peg") $where = "LENGTH(nip) > 5";
					else if($kondisi == "non") $where = "LENGTH(nip) < 5";
					
					$no = 1;
					$sql = "SELECT DISTINCT(nip) AS nip,nama,keterangan,count(nip) AS jml,nama_area FROM log_pegawai 
							WHERE waktu LIKE '%".$bulan."%' AND kdarea = '".$area."' AND " . $where . " GROUP BY nip ORDER BY jml DESC";
					$res = mysql_query($sql);
					while ($r = mysql_fetch_array($res, MYSQL_ASSOC)) {
						?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $r['nip'];?></td>
							<td><?php echo $r['nama'];?></td>
							<td><?php echo $r['keterangan'];?></td>
							<td><?php echo $r['nama_area'];?></td>
							<td><a href="individu.php?nip=<?php echo $r['nip']?>&bln=<?php echo $bulan;?>"><?php echo $r['jml'] . " Kali";?></a></td>
						</tr>
						<?php
						$no++;
					}
				?>
				</tbody>
			</table>
			<br/><br/>
			<a target="_blank" style="float:right;" href="excel2.php?s=<?php echo $kondisi;?>&bln=<?php echo $bulan;?>&unit=<?php echo $area;?>"><img height="32" width="32" title="Export Excel" src="media/images/xls.png"></a>
		</div>
		
		<div style="clear:both;"></div>
	</div>
	
	</div>

</body>
</html>	
	