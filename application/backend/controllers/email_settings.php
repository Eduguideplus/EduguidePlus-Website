<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class email_settings extends CI_Controller {
	
	
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
			/*$this->load->model('search_model');
			$this->load->library('datalist');	
			$this->load->model('enquiry_list_model');*/
	
			//START LOGIN CHECK++++++++++++++++++++++++++++++++++++++
			$this->session_check_and_session_data->session_check();
			//END LOGIN CHECK++++++++++++++++++++++++++++++++++++++	
	}
	
	public function index()
	{	
		$data['emailsettings']=$this->admin_model->selectAll('tblemail');
		//$data['admin_email']=$this->admin_model->admin_email();
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('email_settings_view',$data);
		$this->load->view('template/adminfooter_category');	
		
	}
	
			
	function emailUpdate_post()
	{
		 $email=$this->input->post('email');
		 $column=$this->input->post('type');

		 if($column=="from_email"){
		 	$rowname="From Email";
		 }
		 else
		 {
		 	$rowname="Recieve Email";
		 }
		 
		 $data=array($column=>$email);
		 $this->db->where('email_id','1');
		 $this->db->update('tblemail',$data);
		 $this->session->set_flashdata('succ_update',$rowname.' updated successfully');
		 redirect('index.php/email_settings','refresh');
	}
	
}
?>