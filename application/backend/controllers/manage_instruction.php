<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_instruction extends CI_Controller {
	
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

public function view_instruction()
{
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	
	$user['instruction']=$this->admin_model->selectAll('tbl_instruction');
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('instruction/instruction_view_table',$user);
	$this->load->view('template/adminfooter_category');
	
}

public function add_instruction()
{
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	
	
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('instruction/instruction_add_view');
	$this->load->view('template/adminfooter_category');

}

public function insert_instruction()
{
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
		$title=$this->input->post('ins_title');
		$details=$this->input->post('ins_dtls');
		$current_date=date('Y-m-d H:i:s');
		$data_arr=array('instruction_title'=>$title,'instruction_details'=>$details,'created_on'=>$current_date);
		$this->db->insert('tbl_instruction',$data_arr);
		$this->session->set_flashdata('succ_msg','Instruction Details updated successfully');
		redirect('index.php/manage_instruction/view_instruction','refresh');


}

public function edit_instruction()
{

	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	
	$id=$this->uri->segment(3);
	$data['instruction']=$this->admin_model->selectOne('tbl_instruction','id',$id);

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('instruction/instruction_edit_view',$data);
	$this->load->view('template/adminfooter_category');

}
public function update_instruction()
{
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

		$title=$this->input->post('ins_title');
		$details=$this->input->post('ins_dtls');
		$current_date=date('Y-m-d H:i:s');
		$data_arr=array('instruction_title'=>$title,'instruction_details'=>$details,'created_on'=>$current_date);
		$id=$this->input->post('ins_id');

		$this->db->where('id',$id);
		$this->db->update('tbl_instruction',$data_arr);
		$this->session->set_flashdata('succ_msg','Instruction Details updated successfully');
		redirect('index.php/manage_instruction/view_instruction','refresh');

}

function instruction_delete($id)
 {
 	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else
		{

			redirect('index.php/login','refresh');
		}

	  $this->db->where('id',$id);
	  $this->db->delete('tbl_instruction');
	  
	  redirect(base_url().'index.php/manage_instruction/view_instruction/','refresh');
 }



}



