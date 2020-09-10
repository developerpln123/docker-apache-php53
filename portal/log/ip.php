<?php
	include "../admin_portal/config.php";
	
	function konversiTgl($mode, $var){
		if($mode == 1){
			$tgl = substr($var,0,2);
			$bln = bulan(substr($var,3,2));
		} else if($mode == 2){
			$tgl = '';
			$bln = bulan(substr($var,0,2));
		}
		$thn = substr($var,-4);
		return $tgl." ".$bln." ".$thn;
	}
	
	function bulan($var){
		if($var == 1) $bln = "Januari";
		elseif($var == 2) $bln = "Februari";
		elseif($var == 3) $bln = "Maret";
		elseif($var == 4) $bln = "April";
		elseif($var == 5) $bln = "Mei";
		elseif($var == 6) $bln = "Juni";
		elseif($var == 7) $bln = "Juli";
		elseif($var == 8) $bln = "Agustus";
		elseif($var == 9) $bln = "September";
		elseif($var == 10) $bln = "Oktober";
		elseif($var == 11) $bln = "November";
		elseif($var == 12) $bln = "Desember";
		return $bln;
	}
	
	if($_GET['tipe'] == null) $tipe = 1;
	else $tipe = $_GET['tipe'];
?>
<html>
<head>
<title>Log Data Portal</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="media/css/demo_page.css">
<link rel="stylesheet" href="media/css/demo_table.css">
<link rel="stylesheet" href="media/css/jquery-ui.css">
<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery-ui.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#table1').dataTable({
			"sPaginationType": "full_numbers",
			"iDisplayLength": 20
		});
	} );
	
	$(function() {
		$("#bydate").datepicker();
		$("#day1").datepicker();
		$("#day2").datepicker();
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
			
			<?php
				if($tipe == 1) {
			?>
			
			<fieldset><legend>Search in Period</legend>
			<form method="get" action="#">
				Dari : <input name="day1" id="day1" type="text">&nbsp;&nbsp;Hingga&nbsp;&nbsp;<input name="day2" id="day2" type="text">
				<input type="hidden" name="tipe" value="5">
				<input type="submit" value="Search">
			</form>
			</fieldset>
			<br/>
			<h2>IP Address Teraktif</h2>
			<table border="0" class="display" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>IP Address</th>
						<th>Total Digunakan</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql = "SELECT DISTINCT (ip) AS ip,nama,count(ip) AS jml FROM log_pegawai GROUP BY ip ORDER BY jml DESC";
				$result = mysql_query($sql);
				$no = 1;
				while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
				?>
					<tr class="gradeA">
						<td><?php echo $no;?></td>
						<td><?php echo $r['ip'];?></td>
						<td><?php echo $r['jml'] . " kali";?></td>
						<td><?php echo "<a href=\"ip.php?tipe=10&ip=".$r['ip']."\">Lihat Pengguna IP Address ini</a>";?></td>
					</tr>
				<?php
				$no++;
				}
				?>
				</tbody>
			</table>
			
			<?php 
				} else if($tipe == 5) {
				
				$day1 = substr($_GET['day1'],3,2)."-".substr($_GET['day1'],0,2)."-".substr($_GET['day1'],-4);
				$day2 = substr($_GET['day2'],3,2)."-".substr($_GET['day2'],0,2)."-".substr($_GET['day2'],-4);
				$keterangan = "IP Address Teraktif Tanggal ".konversiTgl('1',$day1)." hingga ".konversiTgl('1',$day2);
			?>
			
			<fieldset><legend>Search in Period</legend>
			<form method="get" action="#">
				Dari : <input name="day1" id="day1" type="text">&nbsp;&nbsp;Hingga&nbsp;&nbsp;<input name="day2" id="day2" type="text">
				<input type="hidden" name="tipe" value="5">
				<input type="submit" value="Search">
			</form>
			</fieldset>
			<br/>
			<h2><?php echo $keterangan;?></h2>
			<table border="0" class="display" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>IP Address</th>
						<th>Total Digunakan</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql = "SELECT DISTINCT (ip) AS ip,nama,count(ip) AS jml FROM log_pegawai 
						WHERE waktu BETWEEN '".$day1." 00:00' AND '".$day2." 23:59'
						GROUP BY ip ORDER BY jml DESC";
				$result = mysql_query($sql);
				$no = 1;
				while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
				?>
					<tr class="gradeA">
						<td><?php echo $no;?></td>
						<td><?php echo $r['ip'];?></td>
						<td><?php echo $r['jml'] . " kali";?></td>
						<td><?php echo "<a href=\"ip.php?tipe=10&ip=".$r['ip']."\">Lihat Pengguna IP Address ini</a>";?></td>
					</tr>
				<?php
				$no++;
				}
				?>
				</tbody>
			</table>
			
			<?php 
				} else if($tipe == 10) {
			?>
			
			<h2>Pengguna IP Address <?php echo $_GET['ip']?></h2>
			<table border="0" class="display" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>IP Address</th>
						<th>Nama Pengguna</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql = "SELECT DISTINCT(nama) AS nama,keterangan FROM log_pegawai WHERE ip = '".$_GET['ip']."'";
				$result = mysql_query($sql);
				$no = 1;
				while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
				?>
					<tr class="gradeA">
						<td><?php echo $no;?></td>
						<td><?php echo "".$_GET['ip']."";?></td>
						<td><?php echo "".$r['nama']."";?></td>
						<td><?php echo "".$r['keterangan']."";?></td>
					</tr>
				<?php
				$no++;
				}
				?>
				</tbody>
			</table>
				
				
			<?php 
				}
			?>
			
			<br/><br/>
			<br/><br/>
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
	
	
	