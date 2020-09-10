 <td colspan="2" align="right">
					<div align="right">
					
						<?php

					 if($_SESSION['hak_akses'] == "1"){ ?>

						<a href="index.php?berita" class="style1">Berita</a>|
						<a href="add.php?berita" class="style1">Upload</a>|
						<a href="setting.php" class="style1">Setting</a>|
						<a href="logout.php" class="style1">Logout</a>
					  
					<?php }else if($_SESSION['hak_akses'] == "2"){ ?>
						<a href="index.php?user" class="style1">User</a>|
						<a href="index.php?berita" class="style1">Berita</a>|
						<a href="add.php?berita" class="style1">Upload</a>|
						<a href="setting.php" class="style1">Setting</a>|
						<a href="logout.php" class="style1">Logout</a>

					<?php }?>
					</div>
				</td>