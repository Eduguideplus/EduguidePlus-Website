<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller {
	
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

public function profile_view()
{
	
	
	$user_id=$this->uri->segment(3);
	$user['profile']=$this->admin_model->selectOne('tbl_user','id',$user_id);
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('profile_edit',$user);
	$this->load->view('template/admin_footer');
	
}
public function profile_update()
{
	$userid = $this->input->post('userid');
	$fst_name = $this->input->post('f_name');
	$email=$this->input->post('email');
	$lst_name = $this->input->post('lst_name');

	$data_update = array(

							'user_name'=>$fst_name,
							
							'login_email'=>$email

						);

	$this->db->where('id',$userid);
	$this->db->update('tbl_user',$data_update);
	$this->session->set_flashdata('succ_update','Profile Updated Successfully');
	redirect('index.php/profile/profile_view/'.$userid,'refresh');

}


}



