<?php
class Admin extends Controller {

	function Admin()
	{
		parent::Controller();
		$this->load->model('admin_model','model');
		$this->load->library('session');
		$this->load->helper(array('url','form'));
	}
	
	function homepage() 
	{
		if( !$this->_cek_session()) redirect('auth/logout');
		
		$data['link'] = $this->model->get_link();
		$data['title']  = "HOMEPAGE";
		$data['isi']	= "admin/homepage";
		$this->load->view('template_1', $data);
	}
	
	function user(){
		if( !$this->_cek_session()) redirect('auth/logout');
		
		$data['title']  = "HOMEPAGE";
		$data['isi']	= "admin/user";
		$data['result']	= $this->model->get_admin_data();
		$this->load->view('template_1', $data);
	}
	
	function add_user(){
		if( !$this->_cek_session()) redirect('auth/logout');
		
		$data['title']  = "ADD NEW USER";
		$data['isi']	= "admin/add_user";
		$this->load->view('template_1', $data);
		
	}
	
	function add_user_save(){
		if( !$this->_cek_session()) redirect('auth/logout');
		$this->model->add_user_save();
		redirect('admin/user');
	}
	
	function delete_user(){
		if( !$this->_cek_session()) redirect('auth/logout');
		$id = $this->uri->segment(3);
		$this->model->delete_user($id);
		redirect('admin/user');
	}
	
	function add_link(){
		if( !$this->_cek_session()) redirect('auth/logout');
		
		$data['title']  = "ADD NEW LINK";
		$data['isi']	= "admin/add_link";
		$data['parent']	= $this->model->get_parent_link();
		$this->load->view('template_1', $data);
		
	}
	
	function add_link_save(){
		if( !$this->_cek_session()) redirect('auth/logout');
		$this->model->add_link_save();
		redirect('admin/homepage');
	}
	
	function edit_link(){
		if( !$this->_cek_session()) redirect('auth/logout');
		
		$link = $this->uri->segment(3);
		$data['title']  = "EDIT NEW LINK";
		$data['isi']	= "admin/edit_link";
		$data['parent']	= $this->model->get_parent_link();
		$data['result']	= $this->model->get_detail_link($link);
		$this->load->view('template_1', $data);
		
	}

	function edit_link_save(){
		if( !$this->_cek_session()) redirect('auth/logout');
		$this->model->edit_link_save();
		redirect('admin/homepage');
	}
	
	function delete_link() {
		if( !$this->_cek_session()) redirect('auth/logout');
		$link = $this->uri->segment(3);
		
		$this->model->delete_link($link);
		redirect('admin/homepage');
	}
	
	function _cek_session(){
		if(($this->session->userdata('email')==null) || ($this->session->userdata('nip')==null) || ($this->session->userdata('level')==null)) return false;
		else return true;
	}
	
}

/* End of file survey.php */
/* Location: ./system/application/controllers/survey.php */