<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {
    
        public function __construct()
        {
                parent::__construct();
        }

    
	function load($offset=false){
		
		$loadMenu = false;
		$search = false;
		$load = false;
		
		if($this->input->post('sortName'))
		{
			$sortName = $this->input->post('sortName');
		}
		if($this->input->post('sortValue'))
		{
			$shortValue = $this->input->post('sortValue');
		}
		
		if($this->input->post('search'))
		{
			$search = $this->input->post('search');
		}
		if($this->input->post('load'))
		{
			$load = true;
		}
		$loadMenu = $this->input->post('loadMenu');
		if($loadMenu)
		{
			
			if(method_exists($this,$loadMenu))
			{
				
			    return $this->$loadMenu($offset,$load,$search);
			}
			
		}
		return false;
	}
	
	// pagination //
	function _pagination($limit=false,$totalrows=false,$offset=false)
	{
		$this->load->library('pagination');
		$config['uri_segment'] = $this->uri->total_segments();
		$config['base_url'] = base_url().'content/load/';
		$config['total_rows'] = $totalrows;
		$config['per_page'] = $limit;
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}

	function _inbox($offset=false,$load=false,$searchValue=false)
	{
		$search = false;
		$data = false;
		$limit = 10;
		$data['inbox'] = false;
		$data['load'] = false;
		$data['sortName'] = false;
		$data['sortValue'] = false;
		if($load)
		{
			$data['load'] = true;
		}
		$data['pagination'] = false;
		if($searchValue)
		{
			$search['SenderNumber'] = $searchValue ;
			$search['TextDecoded']  = $searchValue;
			$search['RecipientID'] = $searchValue;
		}
		
		// fais code :D
		# check short name
		if($this->input->post('sortName')){
			if(trim($this->input->post('sortName')) != ''){
				$data['sortName'] = $this->input->post('sortName');
				$sort['name'] = $this->input->post('sortName');
			}
		}
		# check short value
		if($this->input->post('sortValue')){
			if(trim($this->input->post('sortValue')) != ''){
				$data['sortValue'] = $this->input->post('sortValue');
				$sort['value'] = $this->input->post('sortValue');
			}
		}
		$this->load->model('Inbox_model');
		$total_rows = count($this->Inbox_model->gets($search));
		$data['pagination'] = $this->_pagination($limit,$total_rows,$offset);
		$datainbox = $this->Inbox_model->gets($limit,$offset,$search);
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
			$tmp = false;
			foreach($dataphone as $phn)
			{
				$temp = false;
				$temp['IMEI'] = $phn->IMEI;
				$temp['ID'] = $phn->ID; 
				$temp['Receive'] = $phn->Receive;
				$temp['Send'] = $phn->Send; 
				$temp['status'] = 1; 
				$temp['Signal'] = $phn->Signal;
				if(strtotime($phn->TimeOut) < time())
				{
					$temp['status'] = 0;
				}
				$tmp[] = $temp;
			}
			$data['phone'] = $tmp;
		}
		return $this->load->view('content/phone_content_view',$data);
		
	}
}

 
