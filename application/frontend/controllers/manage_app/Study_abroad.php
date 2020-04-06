<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Study_abroad extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();

	}

public function get_all_list()
  {
$new_array= array();
 	/* $service_list=$this->common_model->common($table_name ='tbl_study_abroad', $field = array(), $where = array(), $where_or = array('status'=>'active'), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');*/

 	$this->db->select('*');
 	$this->db->from('tbl_study_abroad tsa');
 	$this->db->join('countries c','tsa.country_name=c.id');
 	//$this->db->join('tbl_abroad_fees taf','tsa.study_abroad_id=taf.study_abroad_id');
 	$this->db->where('tsa.status','active');
 	$qry=$this->db->get();
 	$service_list=$qry->result();

 	foreach ($service_list as $row) {
 		

 		array_push($new_array, $row->study_abroad_id);
 	}

 	$this->db->select('*');
 	$this->db->from('tbl_abroad_fees taf');
 	
 	//$this->db->join('tbl_abroad_fees taf','tsa.study_abroad_id=taf.study_abroad_id');
 	$this->db->where_in('taf.study_abroad_id',$new_array);
 	$this->db->where('taf.status','active');
 	$qry=$this->db->get();
 	$service_list1=$qry->result();



 	echo json_encode(array('service_list'=>$service_list,'feesstruture'=>$service_list1));






 	//  if(count($service_list)>0){

 	//  	$result=1;
 	//  	echo json_encode(array('service_list'=>$service_list,'result'=>$result));

 	//  }else{
		// $result=0;
 	//  	echo json_encode(array('result'=>$result));
 	//  }
     

}
}