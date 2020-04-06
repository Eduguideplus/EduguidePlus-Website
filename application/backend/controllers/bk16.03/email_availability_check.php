<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email_availability_check extends CI_Controller {
	
	 private $username='';
	 private $user_fullname='';
	 private $user_role = 0;
	 private $user_email='';
	 private $user_id = 0;
	 private $user_company='';
	 
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
			$this->load->model('admin_model');
			$this->load->model('users');
			$this->load->model('search_model');
			$this->load->model('pathology');
			$this->load->library('datalist');	
			$this->load->model('manage_users/common_user_model','common_model');
				
			//START LOGIN CHECK++++++++++++++++++++++++++++++++++++++
			$this->session_check_and_session_data->session_check();
			//END LOGIN CHECK++++++++++++++++++++++++++++++++++++++	
	}
	
	function check_usere_mail_availability()
	{
		$email = trim($this->input->post('email'));
		if($email=='')
		{
			return false;
		}
		else
		{
			
		echo $this->users->checkuseremail_availability($email);
			
		}
	}
	
	function check_email()
	{
		
		$email = trim($this->input->post('email'));
		$user_id = trim($this->input->post('user_id'));
		
	    echo $this->users->check_user_email($email,$user_id);
			
		
	}
	
	
	
	
}

?>