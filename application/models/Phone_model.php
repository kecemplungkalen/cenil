<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phone_model extends CI_Model{

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
			$get = $this->db->get('phones');
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
				if($this->db->delete('phones'))
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
				if($this->db->update('phones',$data))
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
				if($this->db->insert('phones',$data))
				{
					return $thid->db->insert_id();
				}
			}
			return false;
		}

}