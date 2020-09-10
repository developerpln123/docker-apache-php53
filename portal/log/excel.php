<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=portal_rekap.xls");
 
// Tambahkan table
include "../admin_portal/config.php";
$sqlMode = 1;
$tipe = $_GET['tipe'];
if($tipe == 21){
	$day = date('d-m-Y');
} else if($tipe == 24){
	$day = substr($_GET['day1'],3,2)."-".substr($_GET['day1'],0,2)."-".substr($_GET['day1'],-4);
} else if($tipe == 25){
	$sqlMode = 2;
	$day1 = substr($_GET['day1'],3,2)."-".substr($_GET['day1'],0,2)."-".substr($_GET['day1'],-4);
	$day2 = substr($_GET['day2'],3,2)."-".substr($_GET['day2'],0,2)."-".substr($_GET['day2'],-4);
}

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
    <table>
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
			if($sqlMode == 1) {
				$sql = "SELECT DISTINCT (nip) AS nip,nama,keterangan,count(nip) AS jml,nama_area
						FROM log_pegawai WHERE waktu LIKE '%".$day."%' GROUP BY nip ORDER BY jml DESC";
			} else {
				$date1 = substr($_GET['day1'],3,2);
				$month1 = substr($_GET['day1'],0,2);
				$year1 = substr($_GET['day1'],-4);
				// ---
				$date2 = substr($_GET['day2'],3,2);
				$month2 = substr($_GET['day2'],0,2);
				$year2 = substr($_GET['day2'],-4);
				// ---
				$time1 = mktime(01, 00, 00, $month1, $date1, $year1);
				$time2 = mktime(24, 59, 59, $month2, $date2, $year2);
				$sql = "SELECT DISTINCT (nip) AS nip,nama,keterangan,count(nip) AS jml,nama_area
						FROM log_pegawai WHERE counter BETWEEN '".$time1."' AND '".$time2."' GROUP BY nip ORDER BY jml DESC";
			}
			
			$result = mysql_query($sql);
			$no = 1;
			while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
			?>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $r['nip'];?></td>
                <td><?php echo $r['nama'];?></td>
                <td><?php echo $r['keterangan'];?></td>
				<td><?php echo $r['nama_area'];?></td>
                <td><?php echo $r['jml'];?></td>
            </tr>
			<?
				$no++;
			}
			?>
        </tbody>
    </table>
</body>
</html>