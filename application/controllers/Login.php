<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends  CI_Controller{
    
    public function index(){
// 	    if($this->session->userdata('logged_in'))
// 	    {
// 		    redirect(base_url(), 'refresh');
// 	    }
	    if($this->input->post('xusername') && $this->input->post('xpassword'))
	    {
		
			if($this->_verivy($this->input->post('xusername'),$this->input->post('xpassword')))
			{
			    $data = array('logged_in' => true);
			    $this->session->set_userdata($data);
			    redirect(base_url(), 'refresh');
			}
	    }
	    $this->load->view('header_view');
	    $this->load->view('login/login_view');
	    $this->load->view('footer_view');
    }
    
    function _verivy($username=false,$password=false)
    {
	    if($username && $password)
	    {
		    return true;
	    }
	    
    }
}
