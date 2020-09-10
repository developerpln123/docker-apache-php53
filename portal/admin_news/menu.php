
<?php if($_SESSION['hak_akses'] == "1"){ ?>

	<td><span class="style1"><strong>Welcome Area <?php echo $_SESSION['nama_area']?><strong></span></td>
    <td align="right"><a href="index.php">Index</a> | <a href="add.php">Add File</a> | <a href="setting.php">Setting</a> |<a href="logout.php">Logout</a> </td>
  
<?php }else if($_SESSION['hak_akses'] == "2"){ ?>
	
	<td><span class="style1"><strong>Welcome Super Admin <?php echo $_SESSION['username']?><strong></span></td>
	<td align="right"><a href="index.php">Index</a> | <a href="add.php">Add User</a> | <a href="setting.php">Setting</a> |<a href="logout.php">Logout</a> </td>

<?php }?>