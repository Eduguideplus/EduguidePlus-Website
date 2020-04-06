<?php
class common_model extends CI_Model {

    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	public function common($table_name='',$field=array(),$where=array(),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='',$where_in_array=array())
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
			
			if(count($like)>0)
			{
			
				foreach($like as $key=>$val)
				{
					if(trim($val))
					{
					   $this->db->like($key,$val);
					 
					} 
				}
			
			}
			
			
			if($end)
			{

				$this->db->limit($end,$start);
			}
			
			if(count($where_in_array)>0)
			{
				
				$this->db->where_in('user_id', $where_in_array);
			}
			 
			$query = $this->db->get();
			$resultResponse=$query->result();
			return $resultResponse;
					
			}
			else
			{
					 echo 'Table name should not be empty';exit;
			}
	
	   }

		public function sum($table_name='',$field_name='',$where=array(),$where_or=array(),$start='',$end='')
		{
			if(trim($field_name) && trim($table_name) )
			{
				$this->db->select_sum($field_name);
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
			    $query = $this->db->get();
				$resultResponse=$query->result();
			    return $resultResponse;
			}
			else 
			{
				echo 'Opps!something went wrong';
			}
		}
	
	
function size_by_search_category($cat_id)  
{  
   $this->db->select('DISTINCT(size_id)');  
   $this->db->from('tbl_product_size');  
   $this->db->where('pro_category_id =',$cat_id);  
   $query=$this->db->get();  
   return $query->result();  
}

function size_by_search_subcategory($cat_id)  
{  
   $this->db->select('DISTINCT(size_id)');  
   $this->db->from('tbl_product_size');  
   $this->db->where('pro_subcate_id =',$cat_id);  
   $query=$this->db->get();  
   return $query->result();  
}




	



}
?>