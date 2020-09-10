<?php

class Auth extends Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model','model');
		$this->load->library('session');
		$this->load->helper(array('url','form'));
	}
	
	function index()
	{
		redirect('/auth/login/');
		
	}
	
	function login($errorMsg = NULL)
	{
		$data['title']  = "Login";
		$data['err']	= $errorMsg;
		$data['isi']	= "formlogin";
		$this->load->view('template_1', $data);
	}
	
	function set_sess()
	{
		//get post data
		$email = $_POST['var_username'];
		$pswd  = $_POST['var_password'];
		
		//cek isian email dan password
		if($email=="" OR $pswd=="")
		{	
			$this->login('Email dan Password harap diisi.');
		}
		else if($this->model->cek_user($email))
		{
			error_reporting(0);
			$ds=ldap_connect('ldap://10.3.0.30');
			
			if(ldap_bind($ds,"jaya\\".$email,$pswd))
			{ 
				//ambil data dari database & set session
				$data = $this->model->get_user($email);
				$this->session->set_userdata('nip', $data->id_admin_portal);
				$this->session->set_userdata('email', $data->email);
				$this->session->set_userdata('level', $data->level);
				redirect('admin/homepage/');
			}
			else $this->login('Email atau password salah.');
		}
		else
		{
			$this->login('Maaf, data anda tidak ada dalam daftar.');
		}
		
	}
	
	function logout()
	{
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		header("location: ".base_url()."index.php/auth/login");
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */