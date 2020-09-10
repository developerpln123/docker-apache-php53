<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=rekapitulasi_laporan.xls");
 
// Tambahkan table
include "../admin_portal/config.php";
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
		
		$sql = "SELECT d.*,IFNULL(JML_PEGAWAI,0) AS JML_PEGAWAI FROM (
				SELECT a.*, IFNULL(JML_NON,0) AS JML_NON FROM area2 a
				
				LEFT JOIN (SELECT kdarea, count( * ) AS JML_NON FROM (
				SELECT DISTINCT (nip) AS nip, kdarea FROM log_pegawai
				WHERE waktu LIKE '%".$parameter."%' AND LENGTH( nip ) < 5 )b
				GROUP BY kdarea )c ON a.kdarea = c.kdarea )d
				
				LEFT JOIN (SELECT kdarea, count( * ) AS JML_PEGAWAI FROM (
				SELECT DISTINCT (nip) AS nip, kdarea FROM log_pegawai
				WHERE waktu LIKE '%".$parameter."%' AND LENGTH( nip ) > 5 )e
				GROUP BY kdarea )f ON d.kdarea = f.kdarea";
				
		//echo $sql;
		$result = mysql_query($sql);
		$total_pegawai = 0;
		$total_nonpegawai = 0;
		$total_pegawai_aktif = 0;
		$total_nonpegawai_aktif = 0;
		$no = 1;
		while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$id = $r['id_area'];
			?>
				<tr class="gradeA">
					<td><?php echo $no;?></td>
					<td><?php echo $r['nama_area'];?></td>
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