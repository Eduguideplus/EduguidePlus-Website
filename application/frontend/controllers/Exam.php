<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Exam extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   

     // $home_data['services'] = $this->common_model->common($table_name = 'tbl_service_master', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      

	
		$this->load->view('common/header');
		$this->load->view('exam');
		$this->load->view('common/footer');
	}
	
	


	
}
?>