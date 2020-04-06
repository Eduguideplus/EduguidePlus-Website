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
					if($val)
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
	

	function get_all_exam_details($user_id)
	{
			$this->db->select('*');
			$this->db->from('tbl_user_exam tue');
			$this->db->join('tbl_knowledge_qiuz_set tks','tue.set_id=tks.kq_id');
			$this->db->where('tue.is_notify','Yes');
			$this->db->where('tue.user_id',$user_id);
			$this->db->order_by('tue.id','DESC');
			$result= $this->db->get();
			return $result->result();
	}

	function get_last_exam_details($exam_id)
	{
			$this->db->select('*');
			$this->db->from('tbl_user_exam tue');
			$this->db->join('tbl_knowledge_qiuz_set tks','tue.set_id=tks.kq_id');
			//$this->db->where('tue.is_notify','Yes');
			$this->db->where('tue.id',$exam_id);
			$this->db->order_by('tue.id','DESC');
			
			$result= $this->db->get();
			return $result->result();
	}


	function get_all_exam_details_by_principal()
	{
			$this->db->select('*');
			$this->db->from('tbl_user_exam tue');
			$this->db->join('tbl_knowledge_qiuz_set tks','tue.set_id=tks.kq_id');
			$this->db->where('tue.is_notify','Yes');
			// $this->db->where('tue.user_id',$user_id);
			$this->db->order_by('tue.id','DESC');
			$result= $this->db->get();
			return $result->result();
	}

	function get_all_student_of_partner($userId)
	{
			$this->db->select('*');
			$this->db->from('tbl_user tu');
			$this->db->join('tbl_batch tb','tu.batch_id=tb.batch_id');
			$this->db->where('tb.faculty_id',$userId);
			$this->db->where('tu.user_type_id',2);
			$result= $this->db->get();
			return $result->result();
	}

	function get_parti_institute($inst_level, $exam_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_institute');
		$this->db->join('tbl_course_institute','tbl_institute.id=tbl_course_institute.institute_id');
		$this->db->where('tbl_institute.inst_level_id',$inst_level);
		$this->db->where('tbl_institute.status','active');
		$this->db->where('tbl_course_institute.examination_id',$exam_id);
		$query=$this->db->get();
		return $query->result();


	}

}
?>