<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_slider extends CI_Controller {
	
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
	//$this->load->model('login_model');	
		
}

public function edit_view()
{
	
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$data['slider']=$this->admin_model->selectAll('tbl_slider_content');

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('manage_slider/slider_content_update',$data);
	$this->load->view('template/adminfooter_category');
	
	
}

public function update()
{
	
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$edit_id = $this->input->post('edit_id');

	$first_heading = $this->input->post('heading1');
	$second_heading = $this->input->post('heading2');

	$slider =$this->admin_model->selectAll('tbl_slider_content');
	if(count($slider)>0)
	{
		$data = array('first_heading'=>$first_heading,'second_heading'=>$second_heading);
		$this->db->where('id',$edit_id);
		$this->db->update('tbl_slider_content',$data);
		$this->session->set_flashdata('succ_msg','updated successfully');
    	redirect('index.php/manage_slider/edit_view/','refresh');

	}
	else
	{
		$data = array('first_heading'=>$first_heading,'second_heading'=>$second_heading);
		
		$this->db->insert('tbl_slider_content',$data);
		$this->session->set_flashdata('succ_msg','inserted successfully');
    	redirect('index.php/manage_slider/edit_view/','refresh');
	}


	
	
	}
}
