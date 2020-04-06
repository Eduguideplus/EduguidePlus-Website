<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact extends CI_Controller {
	
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

public function contact_view()
{
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	
	$user['contact']=$this->admin_model->selectAll('tbl_contact');
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('office_contact',$user);
	$this->load->view('template/adminfooter_category');
	
}
public function contact_update()
{
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$office_contact=$this->admin_model->selectAll('tbl_contact');
	if(count($office_contact)>0)
	{
		//echo 'update'; exit;
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$address=$this->input->post('address');	
		$map=$this->input->post('map_link');	
		$id=$this->input->post('contact_id');
    
		$data_update=array('contact_address'=>$address,'contact_phno'=>$mobile,'contact_email'=>$email,'map_link'=>$map);

		$this->db->where('contact_id',$id);
		$this->db->update('tbl_contact',$data_update);
		$this->session->set_flashdata('succ_msg','Contact Details updated successfully');
		redirect('index.php/contact/contact_view','refresh');
	}
	else
	{
		//echo 'insert'; exit;
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$map=$this->input->post('map_link');	
		$address=$this->input->post('address');	
    
		$data_update=array('contact_address'=>$address,'contact_phno'=>$mobile,'contact_email'=>$email,'map_link'=>$map);
		
		$this->db->insert('tbl_contact',$data_update);
		$this->session->set_flashdata('succ_msg','Contact Details updated successfully');
		redirect('index.php/contact/contact_view','refresh');
	}
	

}


}



