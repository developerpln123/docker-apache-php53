<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Metro, a sleek, intuitive, and powerful framework for faster and easier web development for Windows Metro Style.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development">
    <meta name="author" content="Sergey Pimenov and Metro UI CSS contributors">

    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
    <title>Portal Disjaya</title>

    <link href="newsleter/docs/css/metro.css" rel="stylesheet">
    <link href="newsleter/docs/css/metro-icons.css" rel="stylesheet">
    <link href="newsleter/docs/css/metro-responsive.css" rel="stylesheet">
    <link href="newsleter/docs/css/metro-schemes.css" rel="stylesheet">

    <link href="css/docs.css" rel="stylesheet">

    <script src="newsleter/js/jquery-2.1.3.min.js"></script>
    <script src="newsleter/js/metro.js"></script>
    <script src="newsleter/js/docs.js"></script>
    <script src="newsleter/js/prettify/run_prettify.js"></script>
    <script src="newsleter/js/ga.js"></script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<style type="text/css">
body {
	background-color: #6C3;
}
</style>
</head>
<body>
    <div class="container page-content">
        

		

        <div class="example" data-text="">
		<a href='visimisidisjaya.php'><img src='images/home.png' width="80" height="80" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<img src='images/HEADER.jpg'/> 
		

		
			
            <div class="grid">
			

                <div class="row cells3">
                    <div class="cell">
                        <h5>News Letter Area BANDENGAN</h5>
                        <div class="panel success">
                            <div class="heading">
								<span class="icon mif-home"></span>
                                <span class="title">BANDENGAN</span>
                            </div>
                            <div class="content">
							<?php
								include "admin_news/config.php";
								include "admin_news/function.php";
								$data_file = select_data_file("54210");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
								
								/* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/BANDENGAN/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
							</div>
                        </div>
                    </div>

                    <div class="cell">
                        <h5>News Letter Area BINTARO</h5>
                        <div class="panel success">
                            <div class="heading">
                                <span class="icon mif-home"></span>
                                <span class="title">BINTARO</span>
                            </div>
                            <div class="content">
							<?php
				                $data_file = select_data_file("54380");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
								/* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/BINTARO/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
							</div>
                        </div>
                    </div>

                    <div class="cell">
                        <h5>News Letter Area BULUNGAN</h5>
                        <div class="panel success" data-role="panel">
                            <div class="heading ">
                                <span class="icon mif-home"></span>
                                <span class="title">BULUNGAN</span>
                            </div>
                            <div class="content">
							<?php
				                $data_file = select_data_file("54310");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
								
								/* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/BULUNGAN/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row cells3">
                    <div class="cell">
                        <h5>News Letter Area Cempaka Putih</h5>
                        <div class="panel">
                            <div class="heading">
								<span class="icon mif-home"></span>
                                <span class="title">CEMPAKA PUTIH</span>
                            </div>
                            <div class="content">
							<?php
				                $data_file = select_data_file("54130");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
								
								/* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/CEMPAKA_PUTIH/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                              
							</div>
                        </div>
                    </div>

                    <div class="cell">
                        <h5>News Letter Area Cengkareng</h5>
                        <div class="panel">
                            <div class="heading">
								<span class="icon mif-home"></span>
                                <span class="title">CENGKARENG</span>
                            </div>
                            <div class="content">
							<?php
								$data_file = select_data_file("54630");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }

							   /* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/CENGKARENG/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
							</div>
                        </div>
                    </div>

                    <div class="cell">
                        <h5>News Letter Area Cikokol</h5>
                        <div class="panel">
                            <div class="heading">
								<span class="icon mif-home"></span>
                                <span class="title">CIKOKOL</span>
                            </div>
                            <div class="content">
							<?php
				                $data_file = select_data_file("54610");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
								
								/* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/CIKOKOL/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                              
							</div>
                        </div>
                    </div>
                </div>
				
				

				<div class="row cells3">
                    <div class="cell">
                        <h5>News Letter Area CIKUPA</h5>
                        <div class="panel success">
                            <div class="heading">
								<span class="icon mif-home"></span>
                                <span class="title">CIKUPA</span>
                            </div>
                            <div class="content">
							<?php
				                $data_file = select_data_file("54640");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
								
								/* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/CIKUPA/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
							</div>
                        </div>
                    </div>

                    <div class="cell">
                        <h5>News Letter Area CIPUTAT</h5>
                        <div class="panel success">
                            <div class="heading">
                                <span class="icon mif-home"></span>
                                <span class="title">CIPUTAT</span>
                            </div>
                            <div class="content">
							<?php
								$data_file = select_data_file("54360");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
				                /* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/CIPUTAT/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
							</div>
                        </div>
                    </div>

                    <div class="cell">
                        <h5>News Letter Area CIRACAS</h5>
                        <div class="panel success" data-role="panel">
                            <div class="heading ">
                                <span class="icon mif-home"></span>
                                <span class="title">CIRACAS</span>
                            </div>
                            <div class="content">
							<?php
				                $data_file = select_data_file("54720");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
								
								/* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/CIRACAS/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
                            </div>
                        </div>
                    </div>
                </div>		



				
				<div class="row cells3">
                    <div class="cell">
                        <h5>News Letter Area JATINEGARA</h5>
                        <div class="panel">
                            <div class="heading">
								<span class="icon mif-home"></span>
                                <span class="title">JATINEGARA</span>
                            </div>
                            <div class="content">
							<?php
				                $data_file = select_data_file("54410");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
								
								/* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/JATINEGARA/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
							</div>
                        </div>
                    </div>

                    <div class="cell">
                        <h5>News Letter Area KEBON JERUK</h5>
                        <div class="panel">
                            <div class="heading">
                                <span class="icon mif-home"></span>
                                <span class="title">KEBON JERUK</span>
                            </div>
                            <div class="content">
							<?php
				                $data_file = select_data_file("54330");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
								
								/* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/KEBON_JERUK/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
							</div>
                        </div>
                    </div>

                    <div class="cell">
                        <h5>News Letter Area KRAMAT JATI</h5>
                        <div class="panel" data-role="panel">
                            <div class="heading ">
                                <span class="icon mif-home"></span>
                                <span class="title">KRAMAT JATI</span>
                            </div>
                            <div class="content">
							<?php
				                $data_file = select_data_file("54710");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
								
								/* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/KRAMAT_JATI/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
                            </div>
                        </div>
                    </div>
                </div>		


				
				<div class="row cells3">			

					<div class="cell">
                        <h5>News Letter Area LENTENG AGUNG</h5>
                        <div class="panel success" data-role="panel">
                            <div class="heading ">
                                <span class="icon mif-home"></span>
                                <span class="title">LENTENG AGUNG</span>
                            </div>
                            <div class="content">
							<?php
								$data_file = select_data_file("54740");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
							
				                /* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/LENTENG_AGUNG/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
                            </div>
                        </div>
                    </div>
					
                    <div class="cell">
                        <h5>News Letter Area MARUNDA</h5>
                        <div class="panel success">
                            <div class="heading">
								<span class="icon mif-home"></span>
                                <span class="title">MARUNDA</span>
                            </div>
                            <div class="content">
							<?php
								$data_file = select_data_file("54530");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
							
				                /* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/MARUNDA/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
							</div>
                        </div>
                    </div>

                    <div class="cell">
                        <h5>News Letter Area MENTENG</h5>
                        <div class="panel success">
                            <div class="heading">
                                <span class="icon mif-home"></span>
                                <span class="title">MENTENG</span>
                            </div>
                            <div class="content">
							<?php
								$data_file = select_data_file("54110");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
							
				                /* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/MENTENG/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
							</div>
                        </div>
                    </div>

                    
                </div>		



				
				<div class="row cells3">			

					<div class="cell">
                        <h5>News Letter Area PONDOK GEDE</h5>
                        <div class="panel" data-role="panel">
                            <div class="heading ">
                                <span class="icon mif-home"></span>
                                <span class="title">PONDOK GEDE</span>
                            </div>
                            <div class="content">
							<?php
								$data_file = select_data_file("54730");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
							
				                /* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/PONDOK_GEDE/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
                            </div>
                        </div>
                    </div>
					
                    <div class="cell">
                        <h5>News Letter Area PONDOK KOPI</h5>
                        <div class="panel">
                            <div class="heading">
								<span class="icon mif-home"></span>
                                <span class="title">PONDOK KOPI</span>
                            </div>
                            <div class="content">
							<?php
								$data_file = select_data_file("54420");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
							
				                /* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/PONDOK_KOPI/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
							</div>
                        </div>
                    </div>

                    <div class="cell">
                        <h5>News Letter Area SERPONG</h5>
                        <div class="panel">
                            <div class="heading">
                                <span class="icon mif-home"></span>
                                <span class="title">SERPONG</span>
                            </div>
                            <div class="content">
							<?php
								$data_file = select_data_file("54620");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
							
				                /* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/SERPONG/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
							</div>
                        </div>
                    </div>

                    
                </div>	
				
				
				
				<div class="row cells3">			

					<div class="cell">
                        <h5>News Letter Area TANJUNG PRIOK</h5>
                        <div class="panel success" data-role="panel">
                            <div class="heading ">
                                <span class="icon mif-home"></span>
                                <span class="title">TANJUNG PRIOK</span>
                            </div>
                            <div class="content">
							<?php
								$data_file = select_data_file("54510");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
							
				                /* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/TANJUNG_PRIOK/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
                            </div>
                        </div>
                    </div>
					
                    <div class="cell">
                        <h5>News Letter Area TELUK NAGA</h5>
                        <div class="panel success">
                            <div class="heading">
								<span class="icon mif-home"></span>
                                <span class="title">TELUK NAGA</span>
                            </div>
                            <div class="content">
							<?php
								$data_file = select_data_file("54660");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
							
				                /* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/TELUK_NAGA/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
							</div>
                        </div>
                    </div>

                    <div class="cell">
                        <h5>News Letter Area PRIMA SELATAN</h5>
                        <div class="panel success">
                            <div class="heading">
                                <span class="icon mif-home"></span>
                                <span class="title">PRIMA SELATAN</span>
                            </div>
                            <div class="content">
							<?php
								$data_file = select_data_file("54840");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
							
				                /* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/AP_PRIMA_SELATAN/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
							</div>
                        </div>
                    </div>

                    
                </div>		


				<div class="row cells3">			

					<div class="cell">
                        <h5>News Letter Area PRIMA TANGERANG</h5>
                        <div class="panel" data-role="panel">
                            <div class="heading ">
                                <span class="icon mif-home"></span>
                                <span class="title">PRIMA TANGERANG</span>
                            </div>
                            <div class="content">
							<?php
								$data_file = select_data_file("54820");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
							
				                /* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/AP_PRIMA_TANGERANG/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
                            </div>
                        </div>
                    </div>
					
                    <div class="cell">
                        <h5>News Letter Area PRIMA UTARA</h5>
                        <div class="panel">
                            <div class="heading">
								<span class="icon mif-home"></span>
                                <span class="title">PRIMA UTARA</span>
                            </div>
                            <div class="content">
							<?php
								$data_file = select_data_file("54830");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
				                }
							
				                /* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/AP_PRIMA_UTARA/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
							</div>
                        </div>
                    </div>

                    <div class="cell">
                        <h5>News Letter KANTOR DISTRIBUSI</h5>
                        <div class="panel">
                            <div class="heading">
                                <span class="icon mif-home"></span>
                                <span class="title">KANTOR DISTRIBUSI</span>
                            </div>
                            <div class="content">
							<?php
								$data_file = select_data_file("54000");
								for($i=0; $i<count($data_file); $i++){
									echo "<a href = 'admin_news/upload/".$data_file[$i]['nama_file_rename']."' target='_blank'>".$data_file[$i]['nama_file_asli']."</a><br>";
									
									
				                }
							
				                /* $dir = "ftp://10.3.0.71/REN/UMUM/NEWSLETTER/KANTOR_DISTRIBUSI/";
				            
				                if (is_dir($dir)) {
								    if ($dh = opendir($dir)) {
								        while (($file = readdir($dh)) !== false) {
								            //echo "filename: $file : filetype: " . filetype($dir . $file) . "<BR>";
											echo "<a href='".$dir."/".$file."' target='_blank'>".$file."</a><BR>";
								        }
								        closedir($dh);
								    }
								}   */
							?>                            
							</div>
                        </div>
                    </div> 

                    
                </div>		
				
				
				
            </div>
        </div> <!-- End of example -->

         
    </div>

   

</body>
</html>