<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {
    
        public function __construct()
        {
                parent::__construct();
        }

    
	function load(){
		
		$loadMenu = $this->input->post('loadMenu');
		if($loadMenu)
		{
			
			if(method_exists($this,$loadMenu))
			{
				
			    return $this->$loadMenu();
			}
			
		}
		return false;
	}

	function _inbox()
	{
		$data = false;
		$data['inbox'] = false;
		$this->load->model('Inbox_model');
		$datainbox = $this->Inbox_model->gets();
		if($datainbox)
		{
			$data['inbox'] = $datainbox;
		}
		return $this->load->view('content/inbox_content_view',$data);
	}
    
	function _outbox()
	{
		$data = false;
		$data['outbox'] = false;
		$this->load->model('Outbox_model');
		$dataoutbox = $this->Outbox_model->gets();
		if($dataoutbox)
		{
			$data['outbox'] = $dataoutbox;
		}
		return $this->load->view('content/outbox_content_view',$data);
	}
	
	
	function _sent()
	{
		$data = false;
		$data['sentitems'] = false;
		$this->load->model('Sentitems_model');
		$dataoutbox = $this->Sentitems_model->gets();
		if($dataoutbox)
		{
			$data['sentitems'] = $dataoutbox;
		}
		return $this->load->view('content/sentitems_content_view',$data);
	}
	
	function _phones()
	{
		$data = false;
		$data['phone'] = false;
		$this->load->model('Phone_model');
		$dataphone = $this->Phone_model->gets();
		if($dataphone)
		{
			$data['phone'] = $dataphone;
		}
		return $this->load->view('content/phone_content_view',$data);
		
	}
}

 
