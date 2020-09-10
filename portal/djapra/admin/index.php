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
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
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
                <td colspan="2">
					<table id="box-table-a" width="100%">
						<th>No</th>
						<th>Judul Berita</th>
						<th>Area</th>
						<th>User Input</th>
						<th>Delete</th>
						<?php
							if($_SESSION['kdarea'] == '54000'){
								$data = select_data_djapra();
							}else{
								$data = select_data_djapra_by_kd_area($_SESSION['kdarea']);
							}
							
							for($i=0;$i<count($data);$i++){
								echo "<tr>";
								echo "<td>".($i+1)."</td>";
								echo "<td>".$data[$i]['judul_berita']."</td>";
								echo "<td>".$data[$i]['nama_area']."</td>";
								echo "<td>".$data[$i]['user_input']."</td>";
								echo "<td><a href='delete.php?id_data_djapra=".$data[$i]['id_data_djapra']."' onclick=\" return confirm('Hapus ?');\">Delete</a></td>";
								echo "</tr>";
						}?>
                    </table>
                </td>
			<?php }else if(isset($_GET['user'])){ ?>
				<td colspan="2">
					<a href="add.php?user">Add User</a>
					<table id="box-table-a" width="100%">
						<th>No</th>
						<th>Nama</th>
						<th>Area</th>
						<th>Username</th>
						<th>Hak Akses</th>
						<th>Aksi</th>
						<?php
							
						$data = select_admin_djapra();
							for($i=0;$i<count($data);$i++){
							echo"<tr>
								<td>".($i+1)."</td>
								<td>".$data[$i]['nama']."</td>
								<td>".$data[$i]['nama_area']."</td>
								<td>".$data[$i]['username']."</td>
								<td>"; if($data[$i]['hak_akses'] == "1") echo "Admin Berita";
										else echo "Super Admin"."</td>";
								echo "<td align='center'>
									<a href=edit.php?id_admin_djapra=".$data[$i]['id_admin_djapra']." >Edit </a>
									<a href='delete.php?id_admin_djapra=".$data[$i]['id_admin_djapra']."' onclick=\"return confirm('Hapus ?')\">|Delete</a>
								</td>
							</tr>";
						}?>
                    </table>
                </td>
			
			<?php }?>
            </tr>
            
        
    </div>


</body>
</html>

