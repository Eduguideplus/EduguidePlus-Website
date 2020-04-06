<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class welcome_content extends CI_Controller {
	
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

public function content_view()
{
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	
	$user['welcome']=$this->admin_model->selectAll('tbl_welcome_content');
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('welcome_content/welcome_content_view',$user);
	$this->load->view('template/adminfooter_category');
	
}
public function content_update()
{
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$welcome_content=$this->admin_model->selectAll('tbl_welcome_content');
	if(count($welcome_content)>0)
	{
		//echo 'update'; exit;
		// $email=$this->input->post('email');
		// $mobile=$this->input->post('mobile');
		// $address=$this->input->post('address');	
		$title=$this->input->post('title');	
		$content=$this->input->post('content');	
		$id=$this->input->post('hidden_id');
		$edited_by=$user_id;
		$edited_date=date('Y-m-d');
    
		$data_update=array('title'=>$title,'content'=>$content,'edited_by'=>$edited_by,'edited_date'=>$edited_date);

		$this->db->where('id',$id);
		$this->db->update('tbl_welcome_content',$data_update);
		$this->session->set_flashdata('succ_msg','welcome content updated successfully');
		redirect('index.php/welcome_content/content_view','refresh');
	}
	else
	{
		//echo 'insert'; exit;
		// $email=$this->input->post('email');
		// $mobile=$this->input->post('mobile');
		// $map=$this->input->post('map_link');	
		// $address=$this->input->post('address');	
		$title=$this->input->post('title');	
		$content=$this->input->post('content');
		$created_by= $user_id;
		$created_date=date('Y-m-d');
    
		$data_update=array('title'=>$title,'content'=>$content,'created_by'=>$created_by,'created_date'=>$created_date);
		
		$this->db->insert('tbl_welcome_content',$data_update);
		$this->session->set_flashdata('succ_msg','welcome content updated successfully');
		redirect('index.php/welcome_content/content_view','refresh');
	}
	

}


}



