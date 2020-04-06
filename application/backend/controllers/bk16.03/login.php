<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
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
	
		
}
public function index()
{
	/*if($this->session->userdata('session_user_id')!="")
      {
      	redirect('index.php/dashboard','refresh');
      }
      else
      {
	    $this->load->view('login');	
	}	*/

	if(get_cookie('session_user_id')!="")
      {
      	redirect('index.php/dashboard','refresh');
      }
      else
      {
	    $this->load->view('login');	
	}	
	
}

public function login_check()
{
	$errorMsg='';
	$username=trim($this->input->post('username'));
	$password=trim($this->input->post('password'));

	
	if(empty($username))
	{
		$errorMsg.='Please Enter Your User name';	
	}
	if(empty($password))
	{
	    $errorMsg.='Please Enter Your Password';
	}

	 $data['log_details']=$this->common->select($table_name ='tbl_user', $field = array(), $where = array('login_email'=>$username,'login_pass'=>$password), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	
	 $user_type_id=@$data['log_details'][0]->user_type_id;

	if(empty($errorMsg))
	{
		$response=$this->login_model->login_availability($username,$password,$user_type_id);
		$responseCount=count($response);

		
		if($responseCount>0)
		{
			$this->session_set($response); 
			
			redirect('index.php/dashboard','refresh');
		
		}
		else
		{
			$this->session->set_flashdata('message','Error!Login failed..!');
			
			redirect('index.php/login');
		

		}
		
    }
	else
	{
		$this->session->set_flashdata('message', $errorMsg);
		redirect('index.php/login');	
	}
	
}


function logout()
{
    //$this->session->unset_userdata('user_log_seesion');
	 $this->session->sess_destroy();

	 delete_cookie('session_user_id');
	redirect('index.php/login');  
}

function session_set($result)
{
	$user_id=$result[0]->id; 
	
	/*$user_log_seesion = array(
	   'session_user_id'=>$user_id
	   
	);
	$this->session->set_userdata($user_log_seesion);*/

	 set_cookie('session_user_id',$user_id,'7200');
	
}
}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */