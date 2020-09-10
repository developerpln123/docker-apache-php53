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
    <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
</head>

<body>
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


</body>
</html>

