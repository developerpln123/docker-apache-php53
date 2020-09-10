<?php
$portal_host		= "10.3.0.178";
$portal_username	= "taurisa";
$portal_password	= "adadech";
$portal_database	= "portal_new";
$connection_portal	= mysql_connect($portal_host, $portal_username, $portal_password);
mysql_select_db($portal_database);

	$bulan_sekarang = date('m-Y', strtotime('-1 month'));
	
	if($_POST['bulan']) $parameter = $_POST['bulan'];
	else $parameter = $bulan_sekarang;
	
	$next_month_data = null;
	$next_month = date('m-Y', strtotime('+1 month'));
	$sql = "SELECT id_jml FROM jml_pegawai WHERE bulan = '".$next_month."'";
	$res = mysql_query($sql);
	while ($r = mysql_fetch_array($res, MYSQL_ASSOC)) { $next_month_data = $r['id_jml']; }
	if(empty($next_month_data)) {
		// penambahan utk next month di table jml_pegawai
		$qry = "SELECT jumlah_pegawai FROM jml_pegawai WHERE bulan = '".$bulan_sekarang."'";
		$hasil = mysql_query($qry);
		while ($r2 = mysql_fetch_array($hasil, MYSQL_ASSOC)) { $val_jumlah = $r2['jumlah_pegawai']; }
		$q = "INSERT INTO jml_pegawai (jumlah_pegawai,jumlah_non_pegawai,bulan) VALUES ('".$val_jumlah."','','".$next_month."')";
		mysql_query($q);
	}
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
			'iDisplayLength': 30
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
			<fieldset><legend>&nbsp;&nbsp;PENCARIAN&nbsp;&nbsp;</legend>
			<form method="POST" action="">
				Pilih Bulan : <select name="bulan">
					<?php
						$flag_skip = true;	// skip bulan pertama dari combo bulan
						$array_month = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
						$sql = "SELECT bulan FROM jml_pegawai ORDER BY id_jml DESC";
						$res = mysql_query($sql);
						while ($r = mysql_fetch_array($res, MYSQL_ASSOC)) {
							$var_year = substr($r['bulan'],3,4);
							$var_month = substr($r['bulan'],0,2);
							if(substr($r['bulan'],0,1) == 0) $var_month = substr($r['bulan'],1,1);
							$var_month -= 1;
							$txt_month = $array_month[$var_month];
							
							if((!$flag_skip) && (date('m-Y') != $r['bulan'])) {
							?>
							<option value="<?php echo $r['bulan']?>" <?php if($parameter == $r['bulan']) echo "SELECTED";?>><?php echo $txt_month." ".$var_year?></option>
							<?php
							} else $flag_skip = false;
						}
					?>
				</select>
				<input type="submit" value="Search">
			</form>
			</fieldset><br/><br/>
			
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
			//echo "== " .$parameter;
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
						<td align="center"><a href="detail2.php?s=peg&bln=<?php echo $parameter;?>&unit=<?php echo str_replace(' ','_',$r['AREA']);?>"><?php echo $r['JML_PEGAWAI'];?></a></td>
						<td align="center">
						<?php
						if($jumlah_pegawai[$id] < $r['JML_PEGAWAI']) $total = $r['JML_PEGAWAI'];
						else $total = $jumlah_pegawai[$id];
						echo $total;
						?>
						</td>
						<td align="center"><?php echo round(($r['JML_PEGAWAI']/$total) * 100) . " %";?></td>
						<td align="center"><a href="detail2.php?s=non&bln=<?php echo $parameter;?>&unit=<?php echo $r['KDAREA'];?>"><?php echo $r['JML_NON'];?></a></td>
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
				</tbody>
				<tfoot>
				<tr class="gradeA">
					<td colspan="2"><b>TOTAL</b></td>
					<td align="center"><b><?php echo $total_pegawai_aktif;?></b></td>
					<td align="center"><b><?php echo $total_pegawai;?></b></td>
					<td align="center"><b><?php echo round(($total_pegawai_aktif / $total_pegawai) * 100) . " %";?></b></td>
					<td align="center"><b><?php echo $total_nonpegawai_aktif;?></b></td>
					<td align="center"><b><?php echo $total_nonpegawai;?></b></td>
					<td align="center"><b><?php echo round(($total_nonpegawai_aktif / $total_nonpegawai) * 100) . " %";?></b></td>
				</tr>
				</tfoot>
			</table>
			<br/><br/>
			<a target="_blank" style="float:right;" href="xls1.php?bln=<?php echo $parameter;?>"><img height="32" width="32" title="Export Excel" src="media/images/xls.png"></a>
		</div>
		<div style="clear:both;"></div>
	</div>
	
	</div>
</body>
</html>