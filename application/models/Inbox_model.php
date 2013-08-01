<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	Class Inbox_model extends CI_Model{
	public function __construct()
        {
                parent::__construct();
        }
        
        
        	function gets($limit=false,$offset=false,$search=false){
			if($search){
				$this->db->or_like($search);
			}
			if($limit){
				$query = $this->db->get('inbox',$limit,$offset);
			}else{
				$query = $this->db->get('inbox');
			}
			if($query->num_rows() > 0){
				return $query->result();
			}
			return false;
		}
		
		function delete($data=false)
		{
			if($data)
			{
				$this->db->where($data);
				if($this->db->delete('inbox'))
				{
					return true;
				}
			}
			return false;
		}
		
		function update($where=false,$data=false)
		{
			if($where && $data)
			{
				$this->db->where($where);
				if($this->db->update('inbox',$data))
				{
					return true;
				}
			}
			return false;
		}
		
		function insert($data=false)
		{
			if($data)
			{
				if($this->db->insert('inbox',$data))
				{
					return $thid->db->insert_id();
				}
			}
			return false;
		}
		
		
	    
	    
	}