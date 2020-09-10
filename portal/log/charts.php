<?php
	include "../admin_portal/config.php";
	$tipe = $_GET['tipe'];
	if($tipe == '') $tipe = 1;
	
	if($tipe == 1) $chart = "area";
	elseif($tipe == 2) $chart = "column";
	elseif($tipe == 3) $chart = "line";
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
	$('#selectchart').change( function() {
		location.href = $(this).val();
	});
	$('#table1').dataTable({ });
});
$(function () {
        $('#container_chart').highcharts({
            chart: {
                type: '<?php echo $chart;?>'
            },
            title: {
                text: 'STATISTIK LOGIN PORTAL 2 MINGGU TERAKHIR'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
				<?php
					$dayLength = "";
					for($i=14; $i>=1; $i--){
						$dayShort = date("d M", strtotime('-'.$i.' days'));
						$dayLength .= '\'' . $dayShort . "',";
					}
					$dayLength = substr($dayLength,0,-1);
				?>
                categories: [<?php echo $dayLength;?>],
                tickmarkPlacement: 'on',
                title: {
                    enabled: false
                }
            },
            yAxis: {
                title: {
                    text: ''
                },
                labels: {
                    formatter: function() {
                        return this.value;
                    }
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ''
            },
            plotOptions: {
			<?php
			if($tipe == 1) {
			?>
                area: {
                    stacking: 'normal',
                    lineColor: '#FF3501',
                    lineWidth: 2,
                    marker: {
                        lineWidth: 2,
                        lineColor: '#FF3501'
                    }
                }
			<?php
			} elseif($tipe == 2) {
			?>
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
			<?php
			} elseif($tipe == 3) {
			?>
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
			<?php
			}
			?>
            },
            series: [{
				<?php
					$sql = "";
					$angka = null;
					for($i=14; $i>=1; $i--){
						$day = date("d-m-Y", strtotime('-'.$i.' days'));
						$sql .= "SELECT COUNT(1) AS jml,'".$i."' AS tipe FROM log_pegawai WHERE waktu LIKE '".$day."%' UNION ";
					}
					$sql = substr($sql,0,-6);
					$result = mysql_query($sql);
					while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
						$angka .= $r['jml'] . ",";
					}
					$angka = substr($angka,0,-1);
				?>
				name: 'Data Login',
				data: [<?php echo $angka;?>]
            }]
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
			<h2>Total Login 2 Minggu Terakhir</h2>
			<table border="0" class="display" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Total Login</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					$result = mysql_query($sql);
					while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
						?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo date("d M Y", strtotime('-'.$r['tipe'].' days'));?></td>
							<td><?php echo $r['jml'];?></td>
						</tr>
						<?php
						$no++;
					}
				?>
				</tbody>
			</table>
			
			<div style="clear:both;">&nbsp;</div>
			<div id="container_chart">
			</div>
			<br/>
			<i>Tipe Grafik</i>&nbsp;:&nbsp;
			<select class="select_style" id="selectchart">
				<option value="#">- Pilih Grafik -</option>
				<option value="charts.php">Grafik Area</option>
				<option value="charts.php?tipe=2">Grafik Kolom</option>
				<option value="charts.php?tipe=3">Grafik Garis</option>
			</select>
		</div>
		
		<div id="leftpage">
			<?php include "sidebar.php";?>
		</div>
		<div style="clear:both;"></div>
		
	</div>
	
	</div>

</body>
</html>