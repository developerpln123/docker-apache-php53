<?
include "../lib/config.php";
include "../lib/function.php";
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html lang="en">
<style type="text/css">
<!--
.style4 {color: #0099FF}
-->
</style>
<head>
    <title>Portal Djapra</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../images/logo.jpg" />
     <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    <script src="../js/textarea/tinymce.min.js"></script>
    <script>
		tinymce.init({ selector:'textarea' });
		/*var plaintext = tinyMCE.getContent('var_isi_berita');
		function get_plaintext(){
			document.getElementById('plaintext') = plaintext;
		}*/
	
	</script>
</head>

<body>
   <div class="slider-wrapper theme-default">
            <tr>
    			<td colspan="2"><div align="right"><img width="100%"  src='../images/header.png'> </div></td>
            </tr>
            <tr><td colspan="2"><div align="right"></div></td></tr>
            <tr>
                 <?php include "menu.php";?>
            </tr>
            <tr>
				<?php if(isset($_GET['berita'])){ ?>
                
				<?php }else if(isset($_GET['id_admin_djapra'])){ 
				$id_admin_djapra = $_GET['id_admin_djapra'];
				$data = select_admin_djapra_by_id_admin_djapra($id_admin_djapra);
				?>
				<td colspan="2">
				<form method="post" enctype="multipart/form-data" action="edit_submit.php?user">
                    <table width="100%">
                    <tr class="form_upload">
						<input type='hidden' name='var_id_admin_djapra' value='<?php echo $data[0]['id_admin_djapra']?>'>
						<td width="15%">Nama</td>
                        <td ><input name="var_nama" class="input_width" value='<?php echo $data[0]['nama']?>'></td>
                    </tr>
					<tr class="form_upload">
                        <td width="15%">Area</td>
                        <td >
						<select name="var_kdarea" class="input_width">
                        <?php 
						$area = select_area();
                            for($i=0; $i<count($area); $i++){
								$selected = '';
								if($area[$i]['kdarea'] == $data[0]['kdarea']) $selected= ' selected';
                                echo "<option value='".$area[$i]['kdarea']."' $selected>".$area[$i]['nama_area']."</option>";
                            }
                        
                        ?>
                        </select>
                        </td>
                    </tr>
					<tr class="form_upload">
                        <td width="15%">Username</td>
                        <td ><input name="var_username" class="input_width" value='<?php echo $data[0]['username']?>'></td>
                    </tr>
					<tr class="form_upload">
                        <td width="15%">New Password</td>
                        <td ><input type='password' name="var_password" class="input_width"></td>
                    </tr>
					<tr class="form_upload">
                        <td width="15%">Hak Akses</td>
                        <td ><select name="var_hak_akses">
								<option value='1' <?php if($data[0]['hak_akses'] =='1') echo ' selected';?>>Admin Berita</option>
								<option value='2' <?php if($data[0]['hak_akses'] =='2') echo ' selected';?>>Super Admin</option>
							</select></td>
                    </tr>
                    <tr class="form_upload">
                        <td width="15%"></td>
                        <td ><input type="submit" value="Submit" ></td>
                    </tr>
                    </table>
					<input type='hidden' id='plaintext' name='var_plaintext' value=''>
                </form>
                </td>
				<?php }?>
            </tr>
            
     
    </div>


</body>
</html>

