<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=rekapitulasi_laporan.xls");
 
// Tambahkan table
$portal_host		= "10.3.0.178";
$portal_username	= "taurisa";
$portal_password	= "adadech";
$portal_database	= "portal_new";
$connection_portal	= mysql_connect($portal_host, $portal_username, $portal_password);
mysql_select_db($portal_database);
$parameter = $_GET['bln'];
?>

<html>
<head>
    <style>
        body {
            font-family: Arial;
        }
        table {
            border-collapse: collapse;
        }
        th {
            background-color: #cccccc;
        }
        th, td {
            border: 1px solid #676365;
        }
    </style>
</head>
<body>
	<table border="0" class="display" id="table1">
		<thead>
			<tr>
				<th>No</th>
				<th>Area</th>
				<th>User Pegawai Aktif</th>
				<th>Total Pegawai</th>
				<th>Persentase</th>
				<th>User Non-Pegawai Aktif</th>
				<th>User Non-Pegawai</th>
				<th>Persentase</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$jumlah_pegawai = array();
		$jumlah_non_pegawai = array();
		$q1 = "SELECT jumlah_pegawai,jumlah_non_pegawai FROM jml_pegawai WHERE bulan = '".$parameter."'";
		$res = mysql_query($q1);
		while ($r = mysql_fetch_array($res, MYSQL_ASSOC)) {
			$jumlah_pegawai = explode('#',$r['jumlah_pegawai']); 
			$jumlah_non_pegawai = explode('#',$r['jumlah_non_pegawai']); 
		}
		
		$arrayParameter = explode('-',$parameter);
		$parameter2 = $arrayParameter[1] . $arrayParameter[0];
		
		$sql = "SELECT DISTINCT(a.nama_area) AS AREA, a.kdarea AS KDAREA, a.id_area AS ID_AREA, IFNULL(b.PEGAWAI,0) AS JML_PEGAWAI, IFNULL(c.NONPEGAWAI,0) AS JML_NON FROM area2 a
				
				LEFT JOIN (SELECT nama_area, IFNULL(jml,0) AS PEGAWAI FROM rekap_log_pegawai WHERE blth = '".$parameter2."' AND flag_pegawai = '1' ) b 
				ON a.nama_area = b.nama_area
				
				LEFT JOIN (SELECT nama_area, IFNULL(jml,0) AS NONPEGAWAI FROM rekap_log_pegawai WHERE blth = '".$parameter2."' AND flag_pegawai = '0' ) c 
				ON a.nama_area = c.nama_area";
				
		//echo $sql;
		$result = mysql_query($sql);
		$total_pegawai = 0;
		$total_nonpegawai = 0;
		$total_pegawai_aktif = 0;
		$total_nonpegawai_aktif = 0;
		$no = 1;
		while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$id = $r['ID_AREA'];
			?>
				<tr class="gradeA">
					<td><?php echo $no;?></td>
					<td><?php echo $r['AREA'];?></td>
					<td align="center"><?php echo $r['JML_PEGAWAI'];?></td>
					<td align="center">
					<?php
						if($jumlah_pegawai[$id] < $r['JML_PEGAWAI']) $total = $r['JML_PEGAWAI'];
						else $total = $jumlah_pegawai[$id];
						echo $total;
					?>
					</td>
					<td align="center"><?php echo round(($r['JML_PEGAWAI']/$total) * 100) . " %";?></td>
					<td align="center"><?php echo $r['JML_NON'];?></td>
					<td align="center"><?php echo $jumlah_non_pegawai[$id];?></td>
					<td align="center">
						<?php 
							if($jumlah_non_pegawai[$id] != 0) echo round(($r['JML_NON']/$jumlah_non_pegawai[$id]) * 100) . " %";
							else echo "0 %";
						?>
					</td>
					<?php
						$total_pegawai += $total;
						$total_pegawai_aktif += $r['JML_PEGAWAI'];
						$total_nonpegawai += $jumlah_non_pegawai[$id];
						$total_nonpegawai_aktif += $r['JML_NON'];
					?>
				</tr>
			<?php
			$no++;
		}
		?>
			<tr class="gradeA">
				<td colspan="2"><b>TOTAL</b></td>
				<td align="center"><b><?php echo $total_pegawai_aktif;?></b></td>
				<td align="center"><b><?php echo $total_pegawai;?></b></td>
				<td align="center"><b><?php echo round(($total_pegawai_aktif / $total_pegawai) * 100) . " %";?></b></td>
				<td align="center"><b><?php echo $total_nonpegawai_aktif;?></b></td>
				<td align="center"><b><?php echo $total_nonpegawai;?></b></td>
				<td align="center"><b><?php echo round(($total_nonpegawai_aktif / $total_nonpegawai) * 100) . " %";?></b></td>
			</tr>
		</tbody>
	</table>
</body>
</html>