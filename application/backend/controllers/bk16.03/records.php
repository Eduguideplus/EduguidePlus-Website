<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class records extends CI_Controller {
	
public function __construct()
{
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
	 
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->library('email');			
	
		
}

public function records_view()
{
	
	    if($this->session->userdata('session_user_id')!='')
        {
            $user_id= $this->session->userdata('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }

	$data['records']=$this->admin_model->selectAll('tbl_records');

	$this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
	$this->load->view('records_view',$data);
	 $this->load->view('template/adminfooter_category');
	//redirect('profile/profile_show');

	//$this->load->view('profile_edit',$user);
	
}


 
   
function records_update()
{
	
	    if($this->session->userdata('session_user_id')!='')
        {
            $user_id= $this->session->userdata('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
		$record_1_title=$this->input->post('record_1_title');
    	$record_1_count=$this->input->post('record_1_count');
    	$record_2_title=$this->input->post('record_2_title');           
		$record_2_count=$this->input->post('record_2_count');	
		$record_3_title=$this->input->post('record_3_title');	
		$record_3_count=$this->input->post('record_3_count'); 
		$record_4_title=$this->input->post('record_4_title');
		$record_4_count=$this->input->post('record_4_count');
		$rec_id=$this->input->post('recid');
    	
		$data=array('record_1_title'=>$record_1_title,    
					'record_1_count'=>$record_1_count,
					'record_2_title'=>$record_2_title, 
					'record_2_count'=>$record_2_count,
					'record_3_title'=>$record_3_title,
					'record_3_count'=>$record_3_count,
					'record_4_title'=>$record_4_title,
					'record_4_count'=>$record_4_count);
		//print_r($data);
		$this->db->where('records_id',$rec_id);
		$this->db->update('tbl_records',$data);
		$this->session->set_flashdata('succ_update','Records updated successfully');
		redirect('index.php/records/records_view/','refresh');
}
			   
}


