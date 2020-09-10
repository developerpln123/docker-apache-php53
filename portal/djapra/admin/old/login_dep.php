<?
include "../lib/config.php";
include "../lib/function.php";
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
    <link rel="stylesheet" href="../slider/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../slider/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../slider/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../slider/themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../slider/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../slider/style.css" type="text/css" media="screen" />
    <script src="../js/textarea/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>

<body>
    <div id="wrapper">
        <div class="slider-wrapper theme-default">
            <tr>
    			<td colspan="2"><div align="right"><img width="100%"  src='../images/header.png'> </div></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">
                <form method="post" enctype="multipart/form-data" action="login_submit.php">
                    <table width="100%">
                        <tr class="form_login">
                            <td width="15%" class="style2">Username</td>
                            <td ><input name="var_username" size="30"></td>
                        </tr>
                        <tr class="form_login">
                            <td width="15%" class="style2">Password</td>
                            <td ><input name="var_password" size="30" type="password"></td>
                        </tr>
                
                        <tr class="form_login">
                            <td width="15%"></td>
                            <td ><input type="submit" value="Submit"></td>
                        </tr>
                    </table>
                </form>
                </td>
            </tr>
            
        </div>
    </div>

<script type="text/javascript" src="../slider/scripts/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="../slider/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
</script>
</body>
</html>

