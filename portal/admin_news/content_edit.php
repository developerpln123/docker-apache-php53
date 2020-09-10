
<?php if($_SESSION['hak_akses'] == "1"){ ?>

  
<?php }else if($_SESSION['hak_akses'] == "2"){
	$id_admin_area = $_GET['id_admin_area'];
	$admin_area = select_admin_area_by_id_admin_area($id_admin_area);
 ?>
		<td colspan="2">
	<form  enctype="multipart/form-data" method="post" action="edit_submit.php">
		<fieldset>
		<input type="hidden" name="id_admin_area" value="<?php echo $admin_area[0]['id_admin_area'];?>" size="30"/>
		<label>Nama</label>
		<input type="text" name="nama" value="<?php echo $admin_area[0]['nama'];?>" size="30"/></br></br>
		<label>Area</label>
		<select name="kdarea">
		<?php $area = select_area();
		for($i=0; $i<count($area); $i++){
			if($area[$i]['kdarea'] == $admin_area[0]['kdarea'])$selected = " selected";
			else $selected = "";
			echo "<option value='".$area[$i]['kdarea']."' ".$selected.">".$area[$i]['nama_area']."</option>";
		}
		?>
		</select></br></br>
		<label>Username</label>
		<input type="text" name="username" size="30" value="<?php echo $admin_area[0]['username'];?>"/></br></br>
		<label>New Password</label>
		<input type="password" name="password" size="30"/></br></br>
		
		<label>Hak Akses</label>
		<select name="hak_akses">
			<option value='1' <?php if($admin_area[0]['hak_akses'] == "1") echo "selected";?> >Admin Area</option>
			<option value='2' <?php if($admin_area[0]['hak_akses'] == "2") echo "selected";?> >Super Admin</option>
		</select></br></br>
		<label></label>
		<input type="submit" value="submit">
		</fieldset>
    </form>
    </td>
	
<?php }?>