<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	Class Sentitems_model extends CI_Model{
	    
	public function __construct()
        {
                parent::__construct();
        }

		function gets($limit=false,$start=false,$keyword=false)
		{
			if($limit)
			{
				$this->db->limit($limit,$start);
			}
			
			if($keyword)
			{
				
			}
			$get = $this->db->get('sentitems');
			log_message('error',print_r($this->db->last_query(),true));
			if($get->num_rows() > 0)
			{
				return $get->result();
			}
			
			return false;
		}
		
		function delete($data=false)
		{
			if($data)
			{
				$this->db->where($data);
				if($this->db->delete('sentitems'))
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
				if($this->db->update('sentitems',$data))
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
				if($this->db->insert('sentitems',$data))
				{
					return $thid->db->insert_id();
				}
			}
			return false;
		}
	}
	    