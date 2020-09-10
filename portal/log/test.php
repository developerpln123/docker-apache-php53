<?php
	include "../admin_portal/config.php";
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Log Data Portal</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="media/css/demo_page.css">
<link rel="stylesheet" href="media/css/demo_table.css">
<link rel="stylesheet" href="media/css/jquery-ui.css">
<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery-ui.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="js/highcharts.js"></script>
<script type="text/javascript" language="javascript" src="js/modules/exporting.js"></script>
<script type="text/javascript" language="javascript" src="js/theme-gray.js"></script>
<script type="text/javascript">
$(document).ready( function() {
	$('#table1').dataTable({ });
	$(function() {
		$("#day1").datepicker();
		$("#day2").datepicker();
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
			<br/>
			<fieldset><legend>Search</legend>
			<form method="get" action="#">
				Area : 
				<select name="area">
					<option style="font-size:10px;" value="">SEMUA AREA</option>
					<?php
						$sql = "SELECT SUBSTR(area,6) AS nama_area FROM area WHERE SUBSTR(area,1,4) = 'AREA'";
						$result = mysql_query($sql);
						while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
							?>
							<option style="font-size:10px;" value="<?php echo $r['nama_area'];?>"><?php echo $r['nama_area'];?></option>
							<?php
						}
					?>
				</select>
				<br/>
				Dari : <input name="day1" id="day1" type="text">&nbsp;&nbsp;Hingga&nbsp;&nbsp;<input name="day2" id="day2" type="text">
				<input type="hidden" name="tipe" value="5">
				<input type="submit" value="Search">
			</form>
			</fieldset>
			<br/>
			<h2>Rekap Login Per Area</h2>
			<table border="0" class="display" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Total Login</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
			
			<div style="clear:both;">&nbsp;</div>
		</div>
		
		<div id="leftpage">
			<?php include "sidebar.php";?>
		</div>
		<div style="clear:both;"></div>
		
	</div>
	
	</div>

</body>
</html>