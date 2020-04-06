<?php
class common_user_model extends CI_Model
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
	
	function update_data($data,$table,$columname,$columnvalue)
	{
		$this->db->where($columname,$columnvalue);
		$this->db->update($table,$data);	
	}

	public function select($table_name='',$field=array(),$where=array(),$where_or=array(),
		$like=array(),$like_or=array(),$order=array(),$start='',$end='')
	{
		
		if(trim($table_name))
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
			$this->db->from($table_name); 
			
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
			
			
			if(count($where_or)>0)
			{
				foreach($where_or as $key=>$val)
				{
					
				
					if(trim($val))
					{
							
						$this->db->or_where($key,$val);
					} 
				}
			}
			
			if(count($order)>0)
			{
			
				foreach($order as $key=>$val)
				{
					if(trim($val))
					{
						$this->db->order_by($key,$val);
					} 
				}
			
			}
			
			
			if($end)
			{

				$this->db->limit($end,$start);
			}
			 
			$query = $this->db->get();
			$resultResponse=$query->result();
			return $resultResponse;
					
			}
			else
			{
					 echo 'Table name should no empty';exit;
			}
	
	}
	
	
	
		public function get_settings_details($field=array(),$where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array(),$start='',$end='')
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
				$this->db->from('tbl_site_sittings');
				
				
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


	
	
	
	public function get_admin_details($field=array(),$where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array(),$start='',$end='')
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
		$this->db->from('tbluser ');
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
	
	
	
	public function get_admin_email($field=array(),$where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array(),$start='',$end='')
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
		$this->db->from('tblemail ');
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
	
	public function get_advertise($status)
	{
		$this->db->select('av.*, ad.full_name');
		$this->db->from('tbl_advertisement av');
		$this->db->join('tbl_seller ad','ad.seller_id= av.advertiser_id');
		if($status!='')
		{
			$this->db->where('av.ad_status',$status);
		}


		$query=$this->db->get();
		$result=$query->result();
		return @$result;
	}

	


	
	

	
	

	
	

	



}
?>