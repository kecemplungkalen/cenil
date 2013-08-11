<?php 

Class Panel extends MY_Controller{
    

	public function index()
	{
		    $data['sidebar'] = false;
		    $data['content'] = false;
		    $data['content'] = $this->load->view('content_view','',true);
		    $data['sidebar'] = $this->load->view('sidebar_view','',true); 
		    $this->load->view('header_view');
		    $this->load->view('container_view',$data);
		    $this->load->view('footer_view');
		    
	}
    
}