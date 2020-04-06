<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class forget_password extends CI_Controller {
	
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
	$this->load->model('login_model');	
	$this->load->model('admin_details_model');	
		
}
	public function index()
	{
		$this->load->view('forget_password');		
	}
	
	public function forget_password_action()
	{
		@$admin_details_array=$this->admin_details_model->admin_details('1');
		@$admin_mail= $admin_details_array[0]->from_email;
		@$from_email=$admin_mail;
		@$email=$this->input->post('email');
		@$data['admin_details_by_email_array']=$this->admin_details_model->admin_details_by_email($email);
		if(count($data['admin_details_by_email_array'])>0)
		{
			@$this->email->set_mailtype("html");
			@$html_email_user = $this->load->view('mail_templet/forget_password_templet',$data, true);
			//echo "<pre>";print_r($html_email_user);exit;
			@$this->email->from($from_email);
			@$this->email->to($email);
			@$this->email->subject('Forgot your password for Maintdrop.com, No worries!');
			@$this->email->message($html_email_user);
			@$result=$this->email->send();
			
			@$this->session->set_flashdata('message','Your password has been sent in your mail.');
			redirect('index.php/forget_password','refresh');
		}
		else
		{
			@$this->session->set_flashdata('message','You are not allowed');
			redirect('index.php/forget_password','refresh');
		}
	}
}