<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=rekapitulasi_laporan.xls");
 
// Tambahkan table
include "../admin_portal/config.php";
$kondisi = $_GET['s'];
$bulan = $_GET['bln'];
$area = $_GET['unit'];
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
					<td><?php echo $r['jml'] . " Kali";?></td>
				</tr>
				<?php
				$no++;
			}
		?>
		</tbody>
	</table>
</body>
</html>