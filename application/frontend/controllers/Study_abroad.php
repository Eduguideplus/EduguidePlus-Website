<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Study_abroad extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   

     $data['class_room'] = $this->common_model->common($table_name = 'tbl_class_room_training', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');

     $data['material']=$this->common_model->common($table_name = 'tbl_study_material', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '0', $end = '4');

      $data['partner_details'] = $this->common_model->common($table_name = 'tbl_partner', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    // echo "<pre>;" ; print_r($partner_details);exit;
      $data['slider'] = $this->common_model->common($table_name = 'tbl_training_slider', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      $data['study_abroad'] = $this->common_model->common($table_name = 'tbl_study_abroad', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	
		$this->load->view('common/header');
		$this->load->view('study_abroad_view',$data);
		$this->load->view('common/footer');
	}

	
	
	


	
}
?>