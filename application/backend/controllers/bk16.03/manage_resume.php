<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_resume extends CI_Controller {
	
public function __construct()
{
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
	 
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->library('email');			
	$this->load->library('image_lib');
	$this->load->model('common/common_model');
	$this->load->model('set_model');
	//$this->load->model('admin_details_model');	
		
}
	public function index()
	{
		$data['request']=$this->admin_model->selectAll('tbl_exam_resume_request');
		$this->load->view('template/admin_header');
    	$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_resume/resume_request_view',$data);	
		 $this->load->view('template/adminfooter_category');	
	}

	public function change_status()
	{
		$id=$this->input->post('resume_id');
		$stat=$this->input->post('stat');


		$request_dtls=$this->common_model->common($table_name = 'tbl_exam_resume_request', $field = array(), $where = array('id'=>$id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		
		$set=$request_dtls[0]->set_id;
		$user=$request_dtls[0]->user_id;
		$user_plan=$request_dtls[0]->user_plan_id;
		if($stat=='pending')
		{
			$data_arr=array(

				'resume'=>'Yes'
			);

			$data_arr1=array('status'=>'approved');

			$this->db->where('id',$id);
			$this->db->update('tbl_exam_resume_request',$data_arr1);

			$this->db->where('user_id',$user);
			$this->db->where('set_id',$set);
			$this->db->where('user_plan_id',$user_plan);
			$this->db->update('tbl_user_exam',$data_arr);

			$data['status']=1;
			

		}
		else
		{

			$data_arr=array(

				'resume'=>'No'
			);

			$data_arr1=array('status'=>'pending');

			$this->db->where('id',$id);
			$this->db->update('tbl_exam_resume_request',$data_arr1);

			$this->db->where('user_id',$user);
			$this->db->where('set_id',$set);
			$this->db->where('user_plan_id',$user_plan);
			$this->db->update('tbl_user_exam',$data_arr);

			$data['status']=1;

		}

		 echo json_encode(array('workdone'=>$data));
		


	}





	
	
}