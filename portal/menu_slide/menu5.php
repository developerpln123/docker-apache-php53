<style type="text/css">

.sidebarmenu ul{
margin: 0;
padding: 0;
list-style-type: none;
font: bold 12px Verdana;
width: 180px; /* Main Menu Item widths */
border-bottom: 1px solid #ccc;
}
 
.sidebarmenu ul li{
position: relative;
}

/* Top level menu links style */
.sidebarmenu ul li a{
display: block;
overflow: auto; /*force hasLayout in IE7 */
color: #3A5909;
text-decoration: none;
padding: 6px;
border-bottom: 1px solid #fff;
border-right: 1px solid #fff;
}

.sidebarmenu ul li a:link, .sidebarmenu ul li a:visited, .sidebarmenu ul li a:active{
background-color: #C6DD88; /*background of tabs (default state)*/
}

.sidebarmenu ul li a:visited{
color: #3A5909;
}

.sidebarmenu ul li a:hover{
background-color: #3A5909;
color: #FFFFFF;
}

/*Sub level menu items */
.sidebarmenu ul li ul{
position: absolute;
width: 170px; /*Sub Menu Items width */
top: 0;
visibility: hidden;
}

.sidebarmenu a.subfolderstyle{
background: url(menu_slide/right.gif) no-repeat 97% 50%;
}

 
/* Holly Hack for IE \*/
* html .sidebarmenu ul li { float: left; height: 1%; }
* html .sidebarmenu ul li a { height: 1%; }
/* End */

</style>

<script type="text/javascript">

//Nested Side Bar Menu (Mar 20th, 09)
//By Dynamic Drive: http://www.dynamicdrive.com/style/

var menuids=["sidebarmenu1"] //Enter id(s) of each Side Bar Menu's main UL, separated by commas

function initsidebarmenu(){
for (var i=0; i<menuids.length; i++){
  var ultags=document.getElementById(menuids[i]).getElementsByTagName("ul")
    for (var t=0; t<ultags.length; t++){
    ultags[t].parentNode.getElementsByTagName("a")[0].className+=" subfolderstyle"
  if (ultags[t].parentNode.parentNode.id==menuids[i]) //if this is a first level submenu
   ultags[t].style.left=ultags[t].parentNode.offsetWidth+"px" //dynamically position first level submenus to be width of main menu item
  else //else if this is a sub level submenu (ul)
    ultags[t].style.left=ultags[t-1].getElementsByTagName("a")[0].offsetWidth+"px" //position menu to the right of menu item that activated it
    ultags[t].parentNode.onmouseover=function(){
    this.getElementsByTagName("ul")[0].style.display="block"
    }
    ultags[t].parentNode.onmouseout=function(){
    this.getElementsByTagName("ul")[0].style.display="none"
    }
    }
  for (var t=ultags.length-1; t>-1; t--){ //loop through all sub menus again, and use "display:none" to hide menus (to prevent possible page scrollbars
  ultags[t].style.visibility="visible"
  ultags[t].style.display="none"
  }
  }
}

if (window.addEventListener)
window.addEventListener("load", initsidebarmenu, false)
else if (window.attachEvent)
window.attachEvent("onload", initsidebarmenu)

</script>
<!--
<div class="sidebarmenu">
<ul id="sidebarmenu1">
	<li><a href="http://simkpnas.pln-jawa-bali.co.id/" class="menulink" target="_blank"><img src="../images/internet.png" border="0" width="20" height="20">&nbsp;&nbsp;Internet</a>
		<ul id="sidebarmenu1">
			<li><a href="http://10.14.152.16/eis/" target="_blank"><img src="../images/folder2.png" border="0" width="20" height="20">&nbsp;&nbsp;EIS AP2T</a>
				<ul id="sidebarmenu1">
					<li><a href="http://10.3.0.178/renko/index.php/data-center/buku-statistik-tahunan" target="_blank"><img src="../images/stat.png" border="0" width="20" height="20">&nbsp;&nbsp;Statistik</a></li>
					<li><a href="http://10.3.0.70/" target="_blank"><img src="../images/km2.png" border="0" width="20" height="20">&nbsp;&nbsp;KM PLN Disjaya</a></li>
				</ul>
			</li>
			<li><a href="http://10.3.0.178/renko/" target="_blank"><img src="../images/renko.png" border="0" width="20" height="20">&nbsp;&nbsp;Portal Renko</a></li>
			<li><a href="#" target="_blank"><img src="../images/chart.png" border="0" width="20" height="20">&nbsp;&nbsp;Kinerja</a></li>
		</ul>
	</li>
</ul>
</div> -->

<?
include "admin/config.php";

echo '<div class="sidebarmenu">';	
listCategory(0,0);
echo '</div>';
function listCategory($parent_id,$level=0) {
    $query = "SELECT nama as name, id , parent_id, link, icon FROM internal_link  WHERE  status='1' and parent_id=".$parent_id." order by urut";
    $res = mysql_query($query) or die($query);
    if(mysql_num_rows($res) == 0) return;
	 
    echo '<ul id="sidebarmenu1">';
    while (list ($name, $id, ,$link, $icon) = mysql_fetch_row($res))
    {   
        if ($level==0)
        {
           echo '<li><a href="'.$link.'" class="menulink" target="_blank">&nbsp;&nbsp;'.$name.'</a>';
        }
        else
        {
           echo '<li><a href="'.$link.'" target="_blank">&nbsp;&nbsp;'.$name.'</a>';
        }
        listCategory($id,$level+1);
        echo '</li>';
    }
    echo '</ul>';
}

?>

