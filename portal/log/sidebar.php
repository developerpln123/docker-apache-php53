			<div id="sidebar">
			<h2>General Info </h2>
			<?php
			$sql = "SELECT COUNT(1) AS jml,'1' AS tipe FROM log_pegawai WHERE waktu LIKE '%".date('d-m-Y')."%' UNION
					SELECT COUNT(1) AS jml,'2' AS tipe FROM log_pegawai WHERE waktu LIKE '%".date('d-m-Y', time()-((60*60)*24))."%' UNION
					SELECT COUNT(1) AS jml,'3' AS tipe FROM log_pegawai WHERE waktu LIKE '%".date('m-Y')."%' UNION
					SELECT COUNT(1) AS jml,'4' AS tipe FROM log_pegawai WHERE waktu LIKE '%".date('m-Y', strtotime("last month"))."%'";
			
			$result = mysql_query($sql);
			while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
				if($r['tipe'] == '1') $today = $r['jml'];
				elseif($r['tipe'] == '2') $kemarin = $r['jml'];
				elseif($r['tipe'] == '3') $month = $r['jml'];
				elseif($r['tipe'] == '4') $lastmonth = $r['jml'];
			}
			?>
			<table border="0" class="display" id="table4">
				<tbody>
					<tr class="odd gradeC">
						<td>Login Hari ini</td>
						<td><a href="detail.php"><?php echo $today?></a></td>
					</tr>
					<tr class="even gradeC">
						<td>Login Kemarin</td>
						<td><a href="detail.php?tipe=2"><?php echo $kemarin?></a></td>
					</tr>
					<tr class="odd gradeC">
						<td>Login Bulan ini</td>
						<td><a href="detail.php?tipe=3"><?php echo $month?></a></td>
					</tr>
					<tr class="odd gradeC">
						<td>Login Bulan Kemarin</td>
					<!--	<td><a href="detail.php?tipe=3"><?php echo $lastmonth?></a></td>	-->
						<td><?php echo $lastmonth?></td>
					</tr>
				</tbody>
			</table>
			</div>