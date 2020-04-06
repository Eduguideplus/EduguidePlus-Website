<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Principal_login extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{

	

      
	
		$this->load->view('common/header');
		$this->load->view('principal_login_page');
		$this->load->view('common/footer');
	}

	public function check_email_exist()
	{
		$category_id=$this->input->post('category_id');
		      $data=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	        echo json_encode($data);

	}

	public function login_action()
	{
		$email=$this->input->post('email1');
		$pwd=$this->input->post('pwd');

		$data=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$email,'login_pass'=>$pwd,'user_type_id'=>'3','status'=>'Active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		if(count($data)>0)
		{
			$active_user=$data[0]->id;
			$this->session->set_userdata('activeuser', $active_user);
			redirect($this->url->link(95));
		}
		else
		{
			$this->session->set_flashdata('err_msg','Sorry!! Either email id or password does not match');
			redirect($this->url->link(142));
		}

	      

	}
	
	


	
}
?>