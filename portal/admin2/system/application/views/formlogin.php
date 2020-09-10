<link rel="stylesheet" href="<?=base_url()?>public/css/serverstyle.css">
<link rel="stylesheet" href="<?=base_url()?>public/css/button.css">
<table width="100%" border="0">
  <tr>
    <td width="46%" align="left" valign="top" scope="col"><form name="form1" method="post" action="<?=base_url()?>index.php/auth/set_sess">
              <table width="100%" border="0">
                <tr>
                  <th scope="col">
				  
				  <table width="100%" border="0" align="left" class="BorderBox_ColorStandard"  >
				  
                    <tr>
					
                      <th width="18%"  scope="col">&nbsp;</th>
                      <td width="3%">&nbsp;</td>
                      <td width="79%" class="_css_font_default_11" >&nbsp;</td>
                    </tr>
                    <tr>
                      <th class="_css_font_default_11"  scope="col"><div align="right"><strong>User ID </strong></div></th>
                      <th class="_css_font_default_11"  scope="col"><div align="center"><strong>:</strong></div></th>
                      <th scope="col" ><div align="left" class="_css_font_default_11" >
                          <input name="var_username" type="text" class="_css_input_text" id="var_username" size="25" title="Masukkan alamat Email. Contoh: adhi.nugraha"/>
                          <strong>@pln.co.id</strong></div></th>
                    </tr>
                    <tr>
                      <th class="_css_font_default_11"  scope="col"><div align="right"><strong>Password</strong></div></th>
                      <th class="_css_font_default_11"  scope="col"><div align="center"><strong>:</strong></div></th>
                      <th scope="col"><div align="left" class="_css_font_default_11" >
                          <input name="var_password" type="password" class="_css_input_text" id="var_password" size="40" />
                      </div></th>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td ><div class="_css_font_default_11_red" ><?php echo $err;?></div></td>
                    </tr>
                    <tr>
                      <td height="30">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><input name="form_submit" type="submit" class="button" id="form_submit" value="Login" />
                          <input name="form_submit2" type="reset" class="button" id="form_submit2" value="Clear" /></td>
                    </tr>
                    <tr>
                      <td height="30">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table></th>
                </tr>
              </table>
            </form></td>
    <td width="54%" align="center" valign="middle"><img src="<?=base_url()?>public/images/cloud-computing-2.jpg" width="400" height="170" ></td>
  </tr>
</table>


