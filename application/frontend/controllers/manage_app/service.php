<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Service extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();

	}

public function get_all_service_list()
  {

 	 $service_list=$this->common_model->common($table_name ='tbl_our_service', $field = array(), $where = array(), $where_or = array('status'=>'active'), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

 	 if(count($service_list)>0){

 	 	$result=1;
 	 	echo json_encode(array('service_list'=>$service_list,'result'=>$result));

 	 }else{
		$result=0;
 	 	echo json_encode(array('result'=>$result));
 	 }
     

}
}