<?php
class common_model extends CI_Model
{

    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function insert_data($data,$table){	
		
		$this->db->insert($table,$data);
		return $this->db->insert_id();		
	}
	
	
	
	function checkuseremail_availability($email)
		{
			
			$this -> db -> select('*');
			$this -> db -> from('tbl_user');
			$this -> db -> where('email = ' . "'" . $email . "'");
			$query = $this -> db -> get();
			if($query -> num_rows() > 0 )
				return FALSE;
			else
				return TRUE;
		}
	
	public function get_single_user_details($field=array(),$where=array(),$like=array(),$order=array(),$start='',$end='')
	{	
		if(count($field)>0)
		{
		  $field=implode(',',$field);
		}
		else
		{
		   $field='*';
		}
		$this->db->select($field);
		$this->db->from('tbl_user U');
		$this->db->join('tbl_state S', 'S.state_id=U.state_id', 'left');
		$this->db->join('tbl_city C', 'C.city_id=U.city_id', 'left');
		$this->db->join('tbl_area A', 'A.area_id=U.area_id', 'left');
		
		if(count($where)>0)
		{
			foreach($where as $key=>$val)
			{
				if(trim($val))
				{
					$this->db->where($key,$val);
				} 
			}
			
		}
		
		
		
		$query=$this->db->get();
		$result=$query->result();
		return @$result;
	}
	
	public function get_user_specialization($field=array(),$where=array(),$like=array(),$order=array(),$start='',$end='')
	{	
		if(count($field)>0)
		{
		  $field=implode(',',$field);
		}
		else
		{
		   $field='*';
		}
		$this->db->select($field);
		$this->db->from('tbl_user_specialization');
		
		if(count($where)>0)
		{
			foreach($where as $key=>$val)
			{
				if(trim($val))
				{
					$this->db->where($key,$val);
				} 
			}
			
		}
		
		$query=$this->db->get();
		$result=$query->result();
		return @$result;
	}
	
	public function get_user_membership($field=array(),$where=array(),$like=array(),$order=array(),$start='',$end='')
	{	
		if(count($field)>0)
		{
		  $field=implode(',',$field);
		}
		else
		{
		   $field='*';
		}
		$this->db->select($field);
		$this->db->from('tbl_user_membership ');
		if(count($where)>0)
		{
			foreach($where as $key=>$val)
			{
				if(trim($val))
				{
					$this->db->where($key,$val);
				} 
			}
			
		}
		
		$query=$this->db->get();
		$result=$query->result();
		return @$result;
	}
	
	public function get_user_chember($field=array(),$where=array(),$like=array(),$order=array(),$start='',$end='')
	{	
		if(count($field)>0)
		{
		  $field=implode(',',$field);
		}
		else
		{
		   $field='*';
		}
		$this->db->select($field);
		$this->db->from('tbl_user_chember');
		if(count($where)>0)
		{
			foreach($where as $key=>$val)
			{
				if(trim($val))
				{
					$this->db->where($key,$val);
				} 
			}
			
		}
		
		$query=$this->db->get();
		$result=$query->result();
		return @$result;
	}
	
		public function get_user_services($field=array(),$where=array(),$like=array(),$order=array(),$start='',$end='')
			{	
				if(count($field)>0)
				{
				  $field=implode(',',$field);
				}
				else
				{
				   $field='*';
				}
				$this->db->select($field);
				$this->db->from('tbl_user_services');
				if(count($where)>0)
				{
					foreach($where as $key=>$val)
					{
						if(trim($val))
						{
							$this->db->where($key,$val);
						} 
					}
					
				}
				
				$query=$this->db->get();
				$result=$query->result();
				return @$result;
			}
		
	
	
	
	
}
?>