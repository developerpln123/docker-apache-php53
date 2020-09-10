<?
session_start();
include "../lib/config.php";
include "../lib/function.php";

$id_admin_djapra = $_SESSION['id_admin_djapra'];
$data = select_admin_djapra_by_id_admin_djapra($id_admin_djapra)

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
                <td colspan="2">
					<form method="post" enctype="multipart/form-data" action="setting_submit.php">
					<table width="100%">
						<tr >
                            <td width="15%" class="style2">Nama</td>
                            <td ><input name="var_nama" size="30" value='<?php echo $data[0]['nama']?>'></td>
                        </tr>						
						<tr >
                            <td width="15%" class="style2">Username</td>
                            <td ><input name="var_username" size="30" value='<?php echo $data[0]['username']?>'></td>
                        </tr>
                        <tr >
                            <td width="15%" class="style2">New Password</td>
                            <td ><input name="var_password" size="30" type="password" ></td>
                        </tr>
                
                        <tr >
                            <td width="15%"></td>
                            <td ><input type="submit" value="Submit"></td>
                        </tr>
                    </table>
                </form>
                </td>
            </tr>
            
        
    </div>


</body>
</html>

