<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Coming_soon extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   

     // $data['class_room'] = $this->common_model->common($table_name = 'tbl_class_room_training', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    

	
		$this->load->view('common/header');
		$this->load->view('coming_soon');
		$this->load->view('common/footer');
	}

	
	
	


	
}
?>