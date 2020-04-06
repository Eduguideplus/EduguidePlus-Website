<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Financial_planning extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   

       $data['financial_list'] = $this->common_model->common($table_name = 'tbl_financial_planning', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      

	
		$this->load->view('common/header');
		$this->load->view('financial_planning_view',$data);
		$this->load->view('common/footer');
	}
	
	


	
}
?>