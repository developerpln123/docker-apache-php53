<?php
class Auth_model extends Model
{
	function Auth_model()
	{
		parent::Model();
	}
	
	function cek_user($email)
	{
		$sql = "SELECT * FROM admin_portal WHERE trim(email) = '".strtoupper($email)."@PLN.CO.ID'";
		//echo $sql;
		$query	= $this->db->query($sql);
		if ($query->num_rows() > 0)
			return true;
		else return false;
	}
	
	function get_user($email)
	{
		$sql = "SELECT * FROM admin_portal WHERE trim(email) = '".strtoupper($email)."@PLN.CO.ID'";
		//echo $sql;
		$query	= $this->db->query($sql);
		return $query->row();
	}

}

?>