<?php
Class MY_Controller extends CI_Controller {
	function __construct()
	{ 
		parent::__construct();
			if(!$this->session->userdata('logged_in')){
				redirect(base_url().'login', 'refresh');
			}
	}
}
?>
