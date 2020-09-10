
<?php include('koneksi.php');?>

<?php $kueri = "select A.NAMA_APJ AS APJ, B.NAMA_UPJ AS UPJ, A.KODE_APJ, C.CONN_STATUS AS STATUS, C.ip_address, C.last_checked, c.last_on from APJ A,UPJ B, address C where A.KODE_APJ=B.KODE_APJ AND B.KODE_UPJ=C.KODE_UNIT AND (A.KODE_APJ<23) and (B.NAMA_UPJ LIKE '%POP ICON') order by APJ, UPJ ASC";
$hasil = mysql_query($kueri, $koneksi); ?>
<table id="hor-minimalist-b" summary="monitoring" width="100%" height="100%">
<thead>	
	<tr>
	<th >No.</th>
	<th >AREA</th>
	<th >UNIT</th>
	<th >IP ADDRESS</th>
	<th >LAST ON</th>
	<th >LAST CHECKED</th>
	<th >STATUS</th>
	</tr>
</thead>
<tbody>
    <?php
	$area0 = "";
	$i=1;
	while($isi=mysql_fetch_object($hasil))
	{
	if($area0==$isi->APJ)
		$area = "";
	else{$area0=$isi->APJ; $area=$area0;}
    ?><tr>
	<td align="right"><?=$i?>.</td>
  <td><?=$area?></td>
	     <td><?=$isi->UPJ?></td>
	     <td align="center"><? if($isi->UPJ=="MTG POP ICON" || $isi->UPJ=="APD POP ICON") echo "NOT AVAILABLE"; else{
		 	 echo $isi->ip_address;}?></td>
		 <td align="center"><? if($isi->UPJ=="MTG POP ICON" || $isi->UPJ=="APD POP ICON") echo "-"; else{
		 	 echo $isi->last_on;}?></td>
          <td align="center"><? if($isi->UPJ=="MTG POP ICON" || $isi->UPJ=="APD POP ICON") echo "-"; else{
		 	 echo $isi->last_checked;}?></td>
		  <td align="center"><? if($isi->UPJ=="MTG POP ICON" || $isi->UPJ=="APD POP ICON") echo "-"; else if ($isi->STATUS=="0") echo "<img src='images/red_cross.png' width='20' height='20'>"; else echo "<img src='images/tick.png' width='20' height='20'>"; ?></td>
	      </tr>
  <? $i++; }

	?>
<tbody>
</table>
