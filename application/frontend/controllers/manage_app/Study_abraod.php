<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Study_abraod extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();

	}

public function get_all_list()
  {
		$service_list= array();
 	

 	/*$this->db->select('*');
 	$this->db->from('tbl_study_abroad tsa');
 	$this->db->join('countries c','tsa.country_name=c.id');
 	$this->db->join('tbl_abroad_fees taf','tsa.study_abroad_id=taf.study_abroad_id');
 	$this->db->where('tsa.status','active');
 	$qry=$this->db->get();
 	$service_list=$qry->result();*/

 	 $study_abroad = $this->common_model->common($table_name = 'tbl_study_abroad', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

 	 foreach ($study_abroad as $key => $value) {

 	 	  $country = $this->common_model->common($table_name ='countries', $field = array(), $where = array('id'=>$value->country_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

 	 	  $fees = $this->common_model->common($table_name = 'tbl_abroad_fees', $field = array(), $where = array('study_abroad_id'=>$value->study_abroad_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

 	 	  $fee_array=array();

 	 	  foreach($fees as $row)
 	 	  {
 	 	  	$feearray['college_name']= $row->college_name;
 	 	  	$feearray['course_name']= $row->course_name;
 	 	  	$feearray['fees']= $row->fees;

 	 	  	array_push($fee_array, $feearray);
 	 	  }

 	 	  $rowarray['country_name']=@$country[0]->name; 
 	 	  $rowarray['course_name']=@$value->course_name; 
 	 	  $rowarray['college_name']=@$value->college_name; 
 	 	  $rowarray['fee_array']=@$fee_array; 
 	 	  $rowarray['study_abroad_id']=$value->study_abroad_id; 

 	 	  array_push($service_list, $rowarray);



 	 }



 	echo json_encode(array('service_list'=>$service_list));

     

}
}