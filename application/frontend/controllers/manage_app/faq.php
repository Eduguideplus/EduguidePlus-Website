<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Faq extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();

	}


function get_faq(){

   		$get_all_faq= $this->common_model->common($table_name = 'tbl_faq', $field = array(), $where = array('faq_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        if(count($get_all_faq)>0){
          $result =1;
           echo json_encode(array('result'=>$result, 'get_faq'=>$get_all_faq));
        }else{
            $result=0;
              echo json_encode(array('result'=>$result));
        }
   		
}

}