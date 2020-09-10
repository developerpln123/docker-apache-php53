<?php
function isallowed() {

    $ci =& get_instance();
    $ci->load->library('session');
    $user_class_methods = $ci->session->userdata('user_class_methods');
    $user_classes = $ci->session->userdata('user_classes');
    $user_info = $ci->session->userdata('user_info');
    $user_logged = $ci->session->userdata('user_logged');
	//set session apa yang harus ada
    $nip = $ci->session->userdata('nip');
	
    $current_class = $ci->uri->rsegment(1);
    $current_method = $ci->uri->rsegment(2);
    $current_class_method = $current_class . "." . $current_method;
    $all_allowed_classes = array('login', 'logout', 'forbidden','auth', 'admin');
    
	if( $nip==null AND !in_array($current_class, $all_allowed_classes))
	{
		$ci->load->helper('url');
		header("location: ".base_url()."index.php/auth/login");	
    }
    
}
?>