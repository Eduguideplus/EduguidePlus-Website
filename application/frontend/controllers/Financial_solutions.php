<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Financial_solutions extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   

      $data['financial_solutions'] = $this->common_model->common($table_name = 'tbl_financial_solutions', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      $data['financial_solutions_content'] = $this->common_model->common($table_name = 'tbl_financial_solutions_content', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      

	
		$this->load->view('common/header');
		$this->load->view('financial_solutions_view',$data);
		$this->load->view('common/footer');
	}
	
	


	
}
?>