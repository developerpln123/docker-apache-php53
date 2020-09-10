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
    <script>tinymce.init({ selector:'textarea' });</script>
</head>

<body>
    <div class="slider-wrapper theme-default">
            <tr>
    			<td colspan="2"><div align="right"><img width="100%"  src='../images/header.png'> </div></td>
            </tr>
            <tr><td colspan="2"><div align="right"></div></td></tr>
            <tr>
                <td colspan="2" align="right"><div align="right"><a href="logout.php" class="style1">Logout</a></div></td>
            </tr>
            <tr>
                <td colspan="2">
                <form method="post" enctype="multipart/form-data" action="form_upload_submit.php">
                    <table width="100%">
                    <tr class="form_upload">
                        <td width="15%">Area</td>
                        <td >
                        <select name="var_kdarea" class="input_width">
                        <?php 
                        if($_SESSION['kdarea'] == 54000){
                            $area = select_area();
                            for($i=0; $i<count($area); $i++){
                                echo "<option value='".$area[$i]['kdarea']."'>".$area[$i]['nama_area']."</option>";
                            }
                        }else{
                            echo "<option value='".$_SESSION['kdarea']."'>".$_SESSION['nama_area']."</option>";
                        }
                        ?>
                        </select>
                        </td>
                    </tr>
                    <tr class="form_upload">
                        <td width="15%">Judul Berita</td>
                        <td ><input name="var_judul_berita" class="input_width"></td>
                    </tr>
                    <tr class="form_upload">
                        <td width="15%">Isi Berita</td>
                        <td > <textarea name="var_isi_berita"></textarea><br></td>
                    </tr>
                    <tr class="form_upload">
                        <td width="15%">Foto</td>
                        <td ><input name="var_foto" size="36" type="file"></td>
                    </tr>
                    <tr class="form_upload">
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

