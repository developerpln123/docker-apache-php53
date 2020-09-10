<?php
	include "../admin_portal/config.php";
	
	/*
		tipe 1 : login hari ini,
		tipe 2 : login kemarin,
		tipe 3 : login bulan ini,
		tipe 4 : login by date,
		tipe 5 : login in period,
		
		tipe 10 : login by nip
		tipe 21 : user aktip hari ini
		tipe 22 : user aktip kemarin
		tipe 23 : user aktip bulan ini
		tipe 24 : user aktip by date
	  */
	
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
		$('#table2').dataTable();
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
			<?php if($tipe <= 5) { 
				$sqlMode = 1;
				if($tipe == 1){
					$keterangan = "Daftar Login Tanggal ".konversiTgl('1',date('d/m/Y'));
					$waktu = date('d-m-Y');
				} else if($tipe == 2){
					$keterangan = "Daftar Login Tanggal ".konversiTgl('1',date('d/m/Y', time()-((60*60)*24)));
					$waktu = date('d-m-Y', time()-((60*60)*24));
				} else if($tipe == 3){
					$keterangan = "Daftar Login Bulan ".konversiTgl('2',date('m/Y'));
					$waktu = date('m-Y');
				} else if($tipe == 4){
					$waktu = substr($_GET['bydate'],3,2)."-".substr($_GET['bydate'],0,2)."-".substr($_GET['bydate'],-4);
					$keterangan = "Daftar Login Tanggal ".konversiTgl('1',$waktu);
				} else if($tipe == 5){
					$sqlMode = 2;
					$day1 = substr($_GET['day1'],3,2)."-".substr($_GET['day1'],0,2)."-".substr($_GET['day1'],-4);
					$day2 = substr($_GET['day2'],3,2)."-".substr($_GET['day2'],0,2)."-".substr($_GET['day2'],-4);
					$keterangan = "Daftar Login Tanggal ".konversiTgl('1',$day1)." hingga ".konversiTgl('1',$day2);
				}
			?>
			
			<fieldset><legend>Search By Date</legend>
			<form method="get" action="#">
				Pilih Hari : <input name="bydate" id="bydate" type="text">
				<input type="hidden" name="tipe" value="4">
				<input type="submit" value="Search">
			</form>
			</fieldset><br/>
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
						<th>NIP</th>
						<th>Nama Pegawai</th>
						<th>Email</th>
						<th>Waktu Login</th>
					</tr>
				</thead>
				<tbody>
			<?php
			if($sqlMode == 1) $sql = "SELECT nip,nama,ip,waktu,keterangan FROM log_pegawai WHERE waktu LIKE '%".$waktu."%' ORDER BY id_log_pegawai DESC";
			else if($sqlMode == 2) {
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
				$sql = "SELECT nip,nama,ip,waktu,keterangan FROM log_pegawai WHERE counter BETWEEN '".$time1."' AND '".$time2."' ORDER BY id_log_pegawai ASC";
			//	$sql = "SELECT nip,nama,ip,waktu,keterangan FROM log_pegawai WHERE waktu BETWEEN '".$day1." 00:00' AND '".$day2." 23:59' ORDER BY id_log_pegawai DESC";
			}
			$result = mysql_query($sql);
			$no = 1;
			while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
				?>
					<tr class="gradeA">
						<td><?php echo $no;?></td>
						<td><?php echo $r['ip'];?></td>
						<td><?php echo $r['nip'];?></td>
						<td><?php echo $r['nama'];?></td>
						<td><?php echo $r['keterangan'];?></td>
						<td><?php echo $r['waktu'];?></td>
					</tr>
				<?php
				$no++;
			}
			?>
				</tbody>
			</table>
			
			<?php } else if(($tipe == 10) || ($tipe == 11) || ($tipe == 12)) { ?>
			
			<h2>Detail Login Data</h2>
			
			<fieldset><legend>Search in Period</legend>
			<form method="get" action="#">
				Dari : <input name="day1" id="day1" type="text">&nbsp;&nbsp;Hingga&nbsp;&nbsp;<input name="day2" id="day2" type="text">
				<input type="hidden" name="tipe" value="12">
				<input type="hidden" name="nip" value="<? echo $_GET['nip']?>">
				<input type="submit" value="Search">
			</form>
			</fieldset>
			<br/>
			<table border="0" class="display" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>IP Address</th>
						<th>NIP</th>
						<th>Nama Pegawai</th>
						<th>Browser</th>
						<th>Waktu Login</th>
					</tr>
				</thead>
				<tbody>
					
			<?php
			
			if($tipe == 10){
				if(($_GET['day1']) && ($_GET['day2'])) {
					$day1 = substr($_GET['day1'],3,2)."-".substr($_GET['day1'],0,2)."-".substr($_GET['day1'],-4);
					$day2 = substr($_GET['day2'],3,2)."-".substr($_GET['day2'],0,2)."-".substr($_GET['day2'],-4);
					$keterangan = "Daftar Login Tanggal ".konversiTgl('1',$day1)." hingga ".konversiTgl('1',$day2);
					$sql = "SELECT nip,nama,ip,browser,waktu FROM log_pegawai WHERE nip = '".$_GET['nip']."' AND waktu BETWEEN '".$day1." 00:00' AND '".$day2." 23:59' ORDER BY id_log_pegawai DESC";
				} else $sql = "SELECT nip,nama,ip,browser,waktu FROM log_pegawai WHERE nip = '".$_GET['nip']."' AND waktu LIKE '%".date('d-m-Y')."%' ORDER BY id_log_pegawai DESC";
			} elseif($tipe == 11){
				$day = substr($_GET['bydate'],3,2)."-".substr($_GET['bydate'],0,2)."-".substr($_GET['bydate'],-4);
				$sql = "SELECT nip,nama,ip,browser,waktu FROM log_pegawai WHERE nip = '".$_GET['nip']."' AND waktu LIKE '%".$day."%' ORDER BY id_log_pegawai DESC";
			} elseif($tipe == 12){
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
				$sql = "SELECT nip,nama,ip,browser,waktu FROM log_pegawai WHERE nip = '".$_GET['nip']."' AND counter BETWEEN '".$time1."' AND '".$time2."' ORDER BY id_log_pegawai ASC";
			}
			//echo $sql;
			$result = mysql_query($sql);
			$no = 1;
			while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
				?>
					<tr class="gradeA">
						<td><?php echo $no;?></td>
						<td><?php echo $r['ip'];?></td>
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
				
				
			<?php } else if($tipe > 20) {
				$sqlMode = 1;
				if($tipe == 21){
					$keterangan = "Login User Teraktif Tanggal ".konversiTgl('1',date('d/m/Y'));
					$waktu = date('d-m-Y');
				} else if($tipe == 22){
					$keterangan = "Login User Teraktif Tanggal ".konversiTgl('1',date('d/m/Y', time()-((60*60)*24)));
					$waktu = date('d-m-Y', time()-((60*60)*24));
				} else if($tipe == 23){
					$keterangan = "Login User Teraktif Bulan ".konversiTgl('2',date('m/Y'));
					$waktu = date('m-Y');
				} else if($tipe == 24){
					$waktu = substr($_GET['bydate'],3,2)."-".substr($_GET['bydate'],0,2)."-".substr($_GET['bydate'],-4);
					$keterangan = "Login User Teraktif Tanggal ".konversiTgl('1',$waktu);
				} else if($tipe == 25){
					$sqlMode = 2;
					$day1 = substr($_GET['day1'],3,2)."-".substr($_GET['day1'],0,2)."-".substr($_GET['day1'],-4);
					$day2 = substr($_GET['day2'],3,2)."-".substr($_GET['day2'],0,2)."-".substr($_GET['day2'],-4);
					$keterangan = "Login User Teraktif Tanggal ".konversiTgl('1',$day1)." hingga ".konversiTgl('1',$day2);
				}
			?>
			
			<fieldset><legend>Search By Date</legend>
			<form method="get" action="#">
				Pilih Hari : <input name="bydate" id="bydate" type="text">
				<input type="hidden" name="tipe" value="24">
				<input type="submit" value="Search">
			</form>
			</fieldset>
			</fieldset><br/>
			<fieldset><legend>Search in Period</legend>
			<form method="get" action="#">
				Dari : <input name="day1" id="day1" type="text">&nbsp;&nbsp;Hingga&nbsp;&nbsp;<input name="day2" id="day2" type="text">
				<input type="hidden" name="tipe" value="25">
				<input type="submit" value="Search">
			</form>
			</fieldset>
			<br/>
			<h2><?php echo $keterangan;?></h2>
			<table border="0" class="display" id="table1">
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
						FROM log_pegawai WHERE waktu LIKE '%".$waktu."%' GROUP BY nip ORDER BY jml DESC";
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
			//echo $sql;
			$result = mysql_query($sql);
			$no = 1;
			while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
				?>
					<tr class="gradeA">
						<td><?php echo $no;?></td>
						<td><?php echo $r['nip'];?></td>
						<?php
						if($tipe == 21){
							?>
							<td><?php echo "<a href=\"detail.php?tipe=10&nip=".$r['nip']."\">".$r['nama']."</a>";?></td>
							<?php
						} else if($tipe == 24){
							?>
							<td><?php echo "<a href=\"detail.php?tipe=11&bydate=".$_GET['bydate']."&nip=".$r['nip']."\">".$r['nama']."</a>";?></td>
							<?php
						} else if($tipe == 25){
							?>
							<td><?php echo "<a href=\"detail.php?tipe=12&day1=".$_GET['day1']."&day2=".$_GET['day2']."&nip=".$r['nip']."\">".$r['nama']."</a>";?></td>
							<?php
						}
						
						?>
						
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
			<?php } ?>
			
			<br/><br/><br/>
			
			<?php
				if(($tipe == 21) || ($tipe == 24) || ($tipe == 25)){
				$param2 = "";
				if($tipe == 21) $param1 = date('d-m-Y');
				else if($tipe == 24) $param1 = $_GET['bydate'];
				else if($tipe == 25){
					$param1 = $_GET['day1'];
					$param2 = $_GET['day2'];
				}
			?>
			<a target="_blank" style="float:right;" href="excel.php?tipe=<?php echo $tipe;?>&day1=<?php echo $param1;?>&day2=<?php echo $param2;?>"><img height="32" width="32" title="Export Excel" src="media/images/xls.png"></a>
			<?php 
				}
			?>
			
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