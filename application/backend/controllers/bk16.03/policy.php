<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class policy extends CI_Controller {
	
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

public function policy_view()
{
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	
	$data['policy']=$this->admin_model->selectAll('tbl_policy');
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('content/policy_view',$data);
	$this->load->view('template/adminfooter_category');
	
}
public function update()
{
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$content = $this->admin_model->selectAll('tbl_policy');
	if(count($content)>0)
	{
		
		$edit_id = $this->input->post('edit_id');
		$content = $this->input->post('policy');
		
		$data_update = array('content'=>$content);
		//print_r($data_update); exit;
		$this->db->where('id',$edit_id);
		$this->db->update('tbl_policy',$data_update);
		$this->session->set_flashdata('succ_msg','Updated successfully');
		redirect('index.php/policy/policy_view','refresh');
	}
	else
	{
		$content = $this->input->post('policy');	
    
		$data_insert = array('content'=>$content);
		//print_r($data_insert); exit;
		$this->db->insert('tbl_policy',$data_insert);
		$this->session->set_flashdata('succ_msg','Added successfully');
		redirect('index.php/policy/policy_view','refresh');
	}
	

}


}



