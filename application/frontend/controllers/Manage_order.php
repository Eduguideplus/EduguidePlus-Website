<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manage_order extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   
		$usr=$this->session->userdata('activeuser');
		if($usr!='')
		{
			 $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
       		
       		$data['plans'] = $this->common_model->common($table_name = 'tbl_user_plan', $field = array(), $where = array('user_id'=>$usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

       		 $data['user']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	
			$this->load->view('common/header');
			$this->load->view('order_details',$data);
			$this->load->view('common/footer',$foot_data);
		}
		else
		{
				redirect($this->url->link(86));
		}	
   
     
	}
	
	


	
}
?>