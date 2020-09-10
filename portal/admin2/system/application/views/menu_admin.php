<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/ddlevelsfiles/ddlevelsmenu-base.css" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/ddlevelsfiles/ddlevelsmenu-topbar.css" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/ddlevelsfiles/ddlevelsmenu-sidebar.css" />
<script type="text/javascript"  src="<?=base_url()?>public/ddlevelsfiles/ddlevelsmenu.js"></script>
<div id="ddtopmenubar" class="mattblackmenu">
	<ul>
		<li><?=anchor('admin/homepage','Home')?></li>
		<?php 
		if(($this->session->userdata('email') != null) && ($this->session->userdata('nip') != null) && ($this->session->userdata('level') != null)) {
			?>
			<li><a href="#" rel="submenu_admin">Administrator</a></li>
			<li><?=anchor('auth/logout','Logout')?></li>
			<?php
		}
		?>
	</ul>
</div>

<script type="text/javascript">
	ddlevelsmenu.setup("ddtopmenubar", "topbar") 
</script>

<ul id="submenu_admin" class="ddsubmenustyle">
	<li><?=anchor('admin/user','User Admin')?></li>
</ul>







