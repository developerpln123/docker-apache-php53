<?php
	include "../admin_portal/config.php";
	
	$jumlah_pegawai = array();
	$jumlah_non_pegawai = array();
	$q1 = "SELECT jumlah_pegawai,jumlah_non_pegawai FROM jml_pegawai WHERE bulan = '".date('m-Y')."'";
	$res = mysql_query($q1);
	while ($r = mysql_fetch_array($res, MYSQL_ASSOC)) {
		$jumlah_pegawai = explode('#',$r['jumlah_pegawai']); // jumlah pegawai update manual
		
		// jumlah non-pegawai selalu auto-update
		$jumlah = "0#";
		$sql = "SELECT id_area,a.kdarea,IFNULL(b.jml,0) AS jml FROM area2 a
				LEFT JOIN (SELECT kdarea, count(*) AS jml FROM non_pegawai GROUP BY kdarea) b
				ON a.kdarea = b.kdarea";
		$result = mysql_query($sql);
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$jumlah .= $row['jml'] . "#";
		}
		$jumlah_non_pegawai = explode('#',$jumlah);
	}
	
	$array_month = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
	$var_year = substr(date('m-Y'),3,4);
	$var_month = substr(date('m-Y'),0,2);
	if(substr(date('m-Y'),0,1) == 0) $var_month = substr(date('m-Y'),1,1);
	$var_month -= 1;
	$txt_month = $array_month[$var_month];
	
	$bulanTahun = $txt_month." ".$var_year;
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
	function numberOnly(angka){
		var charCode = (angka.which) ? angka.which : event.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
		else return true;
	}
	$(document).ready(function() {
		$('#table1').dataTable({
			"sPaginationType": "full_numbers",
			'iDisplayLength': 25
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
			<h2>REKAPITULASI JUMLAH PEGAWAI </h2><br>
			<b><?php echo "BULAN : ".strtoupper($bulanTahun);?></b><br><br>
			<form method="POST" action="jumlah_save.php">
			<table border="0" class="display" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>Area</th>
						<th>Jumlah Pegawai</th>
						<th>Jumlah Non-Pegawai</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$sql = "SELECT * FROM area2 ORDER BY id_area ASC";
					$result = mysql_query($sql);
					while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
						$id = $r['id_area'];
						?>
						<tr>
							<td align="center"><?php echo $no;?></td>
							<td><?php echo $r['nama_area'];?></td>
							<td align="center"><input type="text" name="peg[]" value="<?php echo $jumlah_pegawai[$id];?>" style="text-align:center;" onkeypress="return numberOnly(event);"></td>
							<td align="center"><input type="text" name="non[]" value="<?php echo $jumlah_non_pegawai[$id];?>" style="text-align:center;background:#EFEFEF;" Readonly></td>
						</tr>
						<?php
						$no++;
					}
					?>
				</tbody>
			</table>
			<br><br>
			<center><input type="submit" value="SUBMIT" style="cursor:pointer;" class="select_style"></center><br>
			</form>
		</div>
		
		<div style="clear:both;"></div>
	</div>
	
	</div>

</body>
</html>	
	