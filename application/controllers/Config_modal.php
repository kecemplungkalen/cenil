 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_modal extends CI_Controller {
    
    function getconfig()
    {
	    $conf = false;
	    if($this->input->post('configType'))
	    {
		$conf = $this->input->post();
		if(method_exists($this,$conf['configType']))
		{
			return $this->$conf['configType']($conf);
		}
	    }
	    return -1;
	    
    }
    
    function _phoneModal($param=false){
	    
	    if($param)
	    {
		    return $this->load->view('modal/phone_config_modal_view','');
	    }
    
    }
    
    
}