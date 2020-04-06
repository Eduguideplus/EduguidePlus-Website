<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class terms_condition extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();

	}

	public function index()
	{
		 $data['terms_condition']=$this->common_model->common($table_name = 'tbl_page_manage', $field = array(), $where = array('routes_id'=>81), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		
// print_r($data['terms_condition']); exit;
	    $this->load->view('common/header');
		$this->load->view('terms_condition_view',$data);
	
		$this->load->view('common/footer');

	}

}
?>