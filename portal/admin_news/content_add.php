
<?php if($_SESSION['hak_akses'] == "1"){ ?>

	<td colspan="2">
	<form  enctype="multipart/form-data" method="post" action="add_submit.php">
		<fieldset>
		<label>Judul File</label>
		<input type="text" name="judul" size="30"/></br></br>
		<label>Keterangan</label>
		<input type="text" name="keterangan" size="30"/></br></br>
		<label>File</label>
		<input type="file" name="file" size="30"/></br></br>
		<label>Bulan</label>
		<select name="bulan">
			<option value='01' <?php if(date("m") == "01") echo "selected"; ?>>01</option>
			<option value='02' <?php if(date("m") == "02") echo "selected"; ?>>02</option>
			<option value='03' <?php if(date("m") == "03") echo "selected"; ?>>03</option>
			<option value='04' <?php if(date("m") == "04") echo "selected"; ?>>04</option>
			<option value='05' <?php if(date("m") == "05") echo "selected"; ?>>05</option>
			<option value='06' <?php if(date("m") == "06") echo "selected"; ?>>06</option>
			<option value='07' <?php if(date("m") == "07") echo "selected"; ?>>07</option>
			<option value='08' <?php if(date("m") == "08") echo "selected"; ?>>08</option>
			<option value='09' <?php if(date("m") == "09") echo "selected"; ?>>09</option>
			<option value='10' <?php if(date("m") == "10") echo "selected"; ?>>10</option>
			<option value='11' <?php if(date("m") == "11") echo "selected"; ?>>11</option>
			<option value='12' <?php if(date("m") == "12") echo "selected"; ?>>12</option>
		</select></br></br>
		<label>Tahun</label>
		<select name="tahun">
			<option value='2015' <?php if(date("Y") == "2015") echo "selected"; ?>>2015</option>
			<option value='2016' <?php if(date("Y") == "2016") echo "selected"; ?>>2016</option>
			<option value='2017' <?php if(date("Y") == "2017") echo "selected"; ?>>2017</option>
			<option value='2018' <?php if(date("Y") == "2018") echo "selected"; ?>>2018</option>
			<option value='2019' <?php if(date("Y") == "2019") echo "selected"; ?>>2019</option>
			<option value='2020' <?php if(date("Y") == "2020") echo "selected"; ?>>2020</option>
 					
		</select></br></br>
		<label></label>
		<input type="submit" value="submit">
		</fieldset>
    </form>
    </td>
  
<?php }else if($_SESSION['hak_akses'] == "2"){ ?>
		<td colspan="2">
	<form  enctype="multipart/form-data" method="post" action="add_submit.php">
		<fieldset>
		<label>Nama</label>
		<input type="text" name="nama" size="30"/></br></br>
		<label>Area</label>
		<select name="kdarea">
		<?php $area = select_area();
		for($i=0; $i<count($area); $i++){
			echo "<option value='".$area[$i]['kdarea']."'>".$area[$i]['nama_area']."</option>";
		}
		?>
		</select></br></br>
		<label>Username</label>
		<input type="text" name="username" size="30"/></br></br>
		<label>Password</label>
		<input type="password" name="password" size="30"/></br></br>
		
		<label>Hak Akses</label>
		<select name="hak_akses">
			<option value='1' >Admin Area</option>
			<option value='2' >Super Admin</option>
		</select></br></br>
		<label></label>
		<input type="submit" value="submit">
		</fieldset>
    </form>
    </td>
	
<?php }?>