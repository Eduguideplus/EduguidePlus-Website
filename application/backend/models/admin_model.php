<?php
class Admin_model extends CI_Model {

    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


		
	public function validate($username,$password)
	{
           
        $this->db->select('*');
        $this->db->from('tbluser');     
           
        $this->db->where('username', $username);
        //$this->db->or_where('emp_pan', $username);
        $this->db->or_where('emp_code', $username);

        $this->db->where('password', $password);
        
        $query = $this->db->get();

       return $query->result();
   
	}

	function delete_data($table,$columname,$columnvalue){
		$this->db->where($columname,$columnvalue);
		$this->db->delete($table);
		//echo $this->db->last_query();exit;
	}
    function select_all($table)
		 {
		                
		      $this->db->select('*');
		      $this->db->from($table); 
		      $query = $this -> db -> get();
				
			return $query->result();
				
		 }
		  function select_coupon($table)
         {
                        
              $this->db->select('*');
              $this->db->order_by('created_on','DESC');
              $this->db->from($table); 
              $query = $this -> db -> get();
                
            return $query->result();
                
         }
    function select_data($table,$collum_name, $collum_value)
		 {
		                
		      $this->db->select('*');
		      $this->db->from($table); 
		      $this->db->where($collum_name, $collum_value); 
		      $query = $this -> db -> get();
				
			return $query->result();
				
		 }

	function select_data2($table,$collum_name1, $collum_value1,$collum_name2, $collum_value2)
	 {
	                
	      $this->db->select('*');
	      $this->db->from($table); 
	      $this->db->where($collum_name1, $collum_value1);
	      $this->db->where($collum_name2, $collum_value2); 
	      $query = $this -> db -> get();
			
		return $query->result();
			
	 }	 
		 

	function delete_whereclause($table,$whereclause){
		$this->db->where($whereclause);
		$this->db->delete($table);
		//echo $whereclause;echo $this->db->last_query();exit;
	}
	
	function update_data($data,$table,$columname,$columnvalue)
	{
		$this->db->where($columname,$columnvalue);
		$this->db->update($table,$data);	
	}
	
	function insert_data($data,$table){		
		$this->db->insert($table,$data);
		return $this->db->insert_id();		
	}
	
	function selectAllSort($table,$limit,$start,$orderBy_column,$orderBy_attr){
		$this -> db -> select('*')-> from($table);
		if($limit!=''){
			$this->db->limit($limit, $start);
		}
		if($orderBy_column!=''){
			$this->db->order_by($orderBy_column,$orderBy_attr);
		}
		$query = $this -> db -> get();
		$list=array();
		if($query -> num_rows > 0)
		{
			return $list=$query->result();
		}		
		return $list;
	}

	function selectAlltrabe()
	{
		$this -> db -> select('*')-> from('tbl_travbae_location');
		$this -> db ->where('travbae_location_category','country');
		$query = $this -> db -> get();
		$list=array();
		if($query -> num_rows > 0)
		{
			return $list=$query->result();
		}
		return $list;
	}

	function selectAllwhere($table,$where_clause,$orderBy_column,$orderBy_attr){
		$this -> db -> select('*')-> from($table);
		if($where_clause!=''){
			$this -> db ->where($where_clause);
		}
		if($orderBy_column!=''){
			$this->db->order_by($orderBy_column,$orderBy_attr);
		}
		$query = $this -> db -> get();
		$list=array();
		if($query -> num_rows > 0)
		{
			return $list=$query->result();
		}		
		return $list;
	}
	
	function selectAll($table){
		$this->db->select('*')-> from($table);
		$query = $this->db->get();
		$list=array();
		if($query -> num_rows > 0)
		{
			return $list=$query->result();
		}		
		return $list;
	}
	
	function selectOne($table,$columnname,$columnvalue){
		$this -> db -> select('*')-> from($table)->where($columnname,$columnvalue);
		$query = $this -> db -> get();
		$list=array();
		if($query -> num_rows > 0)
		{
			return $list=$query->result();
		}		
		return $list;
	}

	function single_value($table,$columname,$whereclause)
	{
		$columnvalue='';
		$this->db->select($columname);
		if($whereclause!='')
		{
			$this->db->where($whereclause);
		}
    	$query = $this->db->get($table);
		//echo $this->db->last_query();
		//print_r($query->result()); 
		if($query -> num_rows > 0  )
		 {			 
			foreach($query->result() as $row)
			{
				$columnvalue=$row->$columname; 				
			}			
		 }				
		return $columnvalue;	
	}
	
			
	function selectDistinct($table,$column,$columnname,$columnvalue)
	{
		$this->db->distinct();
		$this -> db -> select($column)-> from($table);
		if($columnname!=''){
			$this -> db ->where($columnname,$columnvalue);
		}
		
		$query = $this -> db -> get();
		$list=array();
		if($query -> num_rows > 0)
		{
			return $list=$query->result();
		}		
		return $list;
	}		
	
		
	function SelectData($limit,$start,$table1,$table2,$join,$where,$orderBy_column,$orderBy_attr)
	{
            $this->db->select('*')->from($table1);
			if($join!=''){
				$this -> db -> join($table2,$join);
				}		
			if($where!=''){
					$this -> db -> where($where);
			}
			
			if($limit!=''){			
				$this->db->limit($limit, $start);
			}
			if($orderBy_column!=''){
				$this->db->order_by($orderBy_column,$orderBy_attr);
			}	
			$query=$this->db->get(); 
			    
         $list=array();
		
		if($query->num_rows>0)
		{
			return $query->result();
		}
			return $list;
     }
	 
	 
		
	function max_id($table,$columname){
		$last_id=0;
		$this->db->select_max($columname);
    	$query = $this->db->get($table);	
		if($query -> num_rows > 0  )
		 {
			foreach($query->result() as $row)
			{
				if( $row->$columname!=NULL)
				{
				 	$last_id=$row->$columname;
				}
			}
			
		 }
				
		return $last_id;	
	}
	public function get_category() 
	{       
        $this->db->select('*');
        $this->db->from('tbl_category');
        //$this->db->where('parent_category_id', '0');
        $this->db->where('status', 'active');
        $this->db->group_by('category_name');
        $query=$this->db->get();

        return $query->result();
   }
	
	public function get_country() 
	{       
        $this->db->select('*');
        $this->db->from('countries');
         $this->db->group_by('name');
        
        $query=$this->db->get();

        return $query->result();
    }

    public function get_city() 
	{       
        $this->db->select('*');
        $this->db->from('cities');
         $this->db->group_by('name');
        
        $query=$this->db->get();

        return $query->result();
    }	
	






function selectOneJoin($table1,$table2,$commonCol1,$commonCol2,$columnname,$columnvalue){

  $this ->db-> select('*')-> from($table1);

  if($columnname!="" && $columnvalue!=""){
   $this->db->where($table1.".".$columnname,$columnvalue);
  }
  if($table2=='temp_upload'){
   $this->db->where($table2.".upload_status",'publish');
  }
  
  if($table2!=''){
   $this ->db ->join($table2,$table1.".".$commonCol1."=".$table2.".".$commonCol2);
  }
  $query = $this ->db-> get();
  $list=array();
  if($query ->num_rows > 0)
  {
   return $list=$query->result();
  }
  
  return $list;
 }


function selectOneWhereJoin($table1,$table2,$join,$where){
  $this ->db-> select('*')-> from($table1);
  if($join!=''){
   $this ->db -> join($table2,$join);
  }
  if($where!=''){
   $this ->db -> where($where);
  }  
  
  $query = $this ->db -> get();
  $list=array();
  if($query ->num_rows > 0)
  {
   return $list=$query->result();
  }
  
  return $list;
 }


 /*************************************************************   P2Exam   **********************************************************************/

  function exam_name($exam_id) 
	{       
        $this->db->select('*');
        $this->db->from('tbl_exam_type');
        $this->db->group_by('exam_name');
        $this ->db -> where($exam_id);
        $query=$this->db->get();

        return $query->result();
    }	

    function pattern_unique($table) 
	{       
        $this->db->select('*');
        $this->db->from($table);
        $this->db->group_by('exam_id');
        
        $query=$this->db->get();

        return $query->result();
    }

  	    function payment_export($start_date, $end_date)
{
   

    $this->db->select('*');
    $this->db->from('tbl_user_payment_report r');
    $this->db->join('tbl_user b', 'r.user_id= b.id','left');
    $this->db->where('r.payment_done_on >=', $start_date);
    $this->db->where('r.payment_done_on <=', $end_date);
    // $this->db->where('status','placed');
    $this->db->order_by('r.id','DESC');

    $query= $this->db->get();
    return $query->result();

}  


 function gallery_sort_order($table)
    {
        $this->db->select('*')-> from($table);
        $this->db->order_by("cat_id", "desc");

        $query=$this->db->get();
        $list=array();
        return $list=$query->result();
    }
     function get_gallery_details(){
         $this->db->select('*');
        $this->db->from('tbl_gallery');
        $this->db->order_by('gallery_id','desc');
        
         $query=$this->db->get();
        return $query->result();
    }











}


?>