<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class terms extends CI_Controller {
	
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

public function terms_view()
{
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	
	$data['terms_content']=$this->admin_model->selectAll('tbl_terms');
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('content/terms_conditions',$data);
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
	$terms_content = $this->admin_model->selectAll('tbl_terms');
	if(count($terms_content)>0)
	{
		
		$edit_id = $this->input->post('edit_id');
		$term_content = $this->input->post('terms_content');
		
		$data_update = array('term_content'=>$term_content);

		$this->db->where('term_id',$edit_id);
		$this->db->update('tbl_terms',$data_update);
		$this->session->set_flashdata('succ_msg','Updated successfully');
		redirect('index.php/terms/terms_view','refresh');
	}
	else
	{
		$term_content = $this->input->post('terms_content');	
    
		$data_insert = array('term_content'=>$term_content);
		
		$this->db->insert('tbl_terms',$data_insert);
		$this->session->set_flashdata('succ_msg','Added successfully');
		redirect('index.php/terms/terms_view','refresh');
	}
	

}


}



