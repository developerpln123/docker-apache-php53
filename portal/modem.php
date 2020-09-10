<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<link rel="shortcut icon" href="images/logo_pln.jpg" />
<title>Katalog MDU</title> 
 
<!-- CSS For The Menu --> 
<link rel="stylesheet" href="tree/style.css" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" /> 
<!-- Add jQuery From the Google AJAX Libraries --> 
<script type="text/javascript" src="tree/jquery.js"></script> 
 
<!-- jQuery Color Plugin --> 
<script type="text/javascript" src="tree/jquery.color.js"></script> 
 
<!-- Import The jQuery Script --> 
<script type="text/javascript" src="tree/jMenu.js"></script> 
<style type="text/css">
<!--
.style1 {
	font-size: 11px;
	font-family: Geneva, Arial, Helvetica, sans-serif;
	color: #FF0000;
}
-->
</style>
</head> 

	<?php
    if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if(getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if(getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else
        $ip = "UNKNOWN";
    
    include "admin_portal/config.php";
    $result = mysql_query("SELECT * FROM INTERNAL_LINK WHERE STATUS=1 ORDER BY URUT ASC");
    ?>

<body>
<div id="templatemo_header_wrapper">

  </div> <!-- end of templatemo_header -->

</div> 
<!-- end of templatemo_header_wrapper -->

<div id="templatemo_content_wrapper">

	<div id="templatemo_content">
    
        <div class="content_section">
        
            <h2>Internal Link</h2>
            
      	</div>
      
        <div class="content_section">
          <p><? include "menu_slide/menu4.php"; ?></p>
        </div>

    </div> <!-- end of content -->
    
    <div id="templatmeo_sidebar">	
        <div class="sidebar_section">
        <div class="download_area">
        <h1>Katalog MDU - Modem</h1>
        <div align="right" class="style1">Untuk men-download silahkan klik kanan kemudian pilih "save link"        </div>
<p>
            <!-- Menu Start --> 
            <div id="jQ-menu"> 
             
            <?php
                $path = "ftp://10.3.0.71/REN/UMUM/KATALOG_MDU/MODEM/";
                function createDir($path = '.')
                {	
                    if ($handle = opendir($path)) 
                    {
                        echo "<ul>";
                    
                        while (false !== ($file = readdir($handle))) 
                        {
                            if (is_dir($path.$file) && $file != '.' && $file !='..')
                                printSubDir($file, $path, $queue);
                            else if ($file != '.' && $file !='..')
                                $queue[] = $file;
                        }
                        
                        printQueue($queue, $path);
                        echo "</ul>";
                    }
                }
                
                function printQueue($queue, $path)
                {
				// print_r($queue);
				// echo count($queue);
				for($i=0;$i<count($queue);$i++):
					printFile($queue[$i], $path);
				endfor;
                    // foreach ($queue as $file) 
                    // {
                        // printFile($file, $path);
                    // } 
                }
                
                function printFile($file, $path)
                {
                    echo "<li><a href=\"".$path.$file."\">$file</a></li>";
                }
                
                function printSubDir($dir, $path)
                {
                    echo "<li><span class=\"toggle\">$dir</span>";
                    createDir($path.$dir."/");
                    echo "</li>";
                }
                
                createDir($path);
            ?>            
            </div> 
        </p>
        </div>
        </div>
  </div> <!-- end of sidebar
        <div class="sidebar_section"><br/>
        <h1>Buku Standar Konstruksi</h1>
        <p>
        <a href="ftp://10.3.0.205/REN/UMUM/standar_konstruksi/buku1_KriteriaDesainEnjineeringKonstruksiJaringanDistribusi/PLNBuku1.pdf"><img src="images/downloadhijau.png" width="20" height="20" /> Kriteria Desain Enjineering Konstruksi Jaringan Distribusi</a>
        <a href="ftp://10.3.0.205/REN/UMUM/standar_konstruksi/buku2_StandarKonstruksiSambunganTenagaListrik/PLNBuku2.pdf"><img src="images/downloadhijau.png" width="20" height="20" /> Standar Konstruksi Sambungan Tenaga Listrik </a>
        <a href="ftp://10.3.0.205/REN/UMUM/standar_konstruksi/buku3_StandarKonstruksiJaringanTeganganRendahTenagaListrik/PLNBuku3.pdf"><img src="images/downloadhijau.png" width="20" height="20" /> Standar Konstruksi Jaringan Tegangan Rendah Tenaga Listrik </a>
        </p>
        </div> -->
  	<div class="cleaner"></div>    
</div> <div id="templatemo_content_wrapper_bottom"></div> <!-- end of content_wrapper -->

<div id="templatemo_footer">
            <a href="http://10.3.0.178/portal_logs/">Sub Bidang TI</a> ©2011 PLN Distribusi Jakarta dan Tangerang</div> 
<!-- end of templatemo_footer -->

</body>
</html>