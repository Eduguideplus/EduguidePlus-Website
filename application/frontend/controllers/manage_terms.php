<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class   Manage_terms extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();

	}

	public function privacy_policy()
	{
		 $data['privacy']=$this->common_model->common($table_name = 'tbl_page_manage', $field = array(), $where = array('routes_id'=>82), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		


		  $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


	    $this->load->view('common/header');
		$this->load->view('privacy_policy_view',$data);
		$this->load->view('common/footer',$foot_data);

	}
	public function view_terms()
	{
		$data['terms_condition']=$this->common_model->common($table_name = 'tbl_page_manage', $field = array(), $where = array('routes_id'=>81), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		  $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

// print_r($data['terms_condition']); exit;
	    $this->load->view('common/header');
		$this->load->view('terms_condition_view',$data);
		$this->load->view('common/footer',$foot_data);

	}

}
?>