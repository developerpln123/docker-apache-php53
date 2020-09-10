<?php
class Admin_model extends Model
{
	function Admin_model()
	{
		parent::Model();
	}
	
	function get_link()
	{
		$sql = "SELECT * FROM INTERNAL_LINK ORDER BY PARENT_ID,URUT ASC";
		$query	= $this->db->query($sql);
		return $query->result_array();
	}
	
	function get_parent_link()
	{
		$sql = "SELECT ID, NAMA FROM INTERNAL_LINK ORDER BY PARENT_ID";
		$query	= $this->db->query($sql);
		return $query->result_array();
	}
	
	function add_link_save(){
		$sql = "INSERT INTO `internal_link` (`id` , `parent_id` , `nama` , `deskripsi` , `link` , `icon` , `status` , `urut`)
				VALUES (
				NULL , 
				'".$this->input->post('parent_id')."',
				'".$this->input->post('nama')."', 
				'".$this->input->post('deskripsi')."', 
				'".$this->input->post('link')."', 
				'".$this->input->post('icon')."', 
				'".$this->input->post('status')."', 
				1000 )";
		$this->db->query($sql);
	}
	
	function add_user_save(){
		$sql = "INSERT INTO `admin_portal` (`email` , `status` , `level`)
				VALUES (
					'".strtoupper($this->input->post('email'))."',
					'".$this->input->post('status')."', 
					'ADMIN' )";
		$this->db->query($sql);
	}
	
	function edit_link_save(){
		$sql = "UPDATE `internal_link` SET `parent_id` = '".$_POST['parent_id']."', 
				`nama` = '".$_POST['nama']."',
				`deskripsi` = '".$_POST['deskripsi']."' ,
				`link` = '".$_POST['link']."',
				`icon` = '".$_POST['icon']."',
				`status` = '".$_POST['status']."',
				`urut` = '".$_POST['order']."' WHERE `internal_link`.`id` =".$_POST['id']."";
		$this->db->query($sql);
	}
	
	function get_detail_link($id){
		$sql = "SELECT * FROM INTERNAL_LINK WHERE id = '".$id."'";
		$query	= $this->db->query($sql);
		return $query->result_array();
	}
	
	function delete_link($id){
		$sql = "DELETE FROM INTERNAL_LINK WHERE id = '".$id."'";
		$this->db->query($sql);
	}
	
	function delete_user($id){
		$sql = "DELETE FROM ADMIN_PORTAL WHERE id_admin_portal = '".$id."'";
		$this->db->query($sql);
	}
	
	function get_admin_data(){
		$sql = "SELECT * FROM ADMIN_PORTAL ORDER BY id_admin_portal ASC";
		$query	= $this->db->query($sql);
		return $query->result_array();
	}
	
}

?>
