<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Location extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();

	}
	

	function get_country()
	{

		

   		$data= $this->common_model->common($table_name = 'countries', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

   	
   			
   		 echo json_encode(array('data'=>$data));
	

}




function get_all_state(){
		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);
   		$country_id     =  $obj->country_id;
   		$get_all_state= $this->common_model->common($table_name = 'states', $field = array(), $where = array('country_id'=>$country_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

   		 echo json_encode(array('get_all_state'=>$get_all_state));
}


function get_all_city(){
		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);
   		$state_id     =  $obj->state_id;
   		$get_all_city= $this->common_model->common($table_name = 'cities', $field = array(), $where = array('state_id'=>$state_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

   		 echo json_encode(array('get_all_city'=>$get_all_city));
}


function signup_slider(){

      $get_sign_up_slider= $this->common_model->common($table_name = 'tbl_signup_slider', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

       echo json_encode(array('sign_up_slider'=>$get_sign_up_slider));
}
}