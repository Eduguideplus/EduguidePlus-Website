<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_stat extends CI_Controller {
	
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

public function view()
{
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	
	$data['stat']=$this->admin_model->selectAll('tbl_stat_chart');
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('stat_chart_view',$data);
	$this->load->view('template/adminfooter_category');
	
}
public function stat_update()
{
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$fact_chart=$this->admin_model->selectAll('tbl_stat_chart');
	if(count($fact_chart)>0)
	{
		
		$lu=$this->input->post('lu');
		$aq=$this->input->post('aq');
		$at=$this->input->post('at');	
		$fd=$this->input->post('fd');
		$id=$this->input->post('edit_id');
		$current_date= date('Y-m-d H:i:s');
    
		$data_update=array(
							'love_us'=>$lu,
							'question_attempt'=>$aq,
							'test_attempt'=>$at,
							'fact_text'=>$fd,
							'modified_by'=>$user_id,
							'modified_on'=>$current_date,

							);

		$this->db->where('id',$id);
		$this->db->update('tbl_stat_chart',$data_update);
		$this->session->set_flashdata('succ_msg','All Stats updated successfully');
		redirect('index.php/manage_stat/view','refresh');
	}
	else
	{
		$lu=$this->input->post('lu');
		$aq=$this->input->post('aq');
		$at=$this->input->post('at');
		$fd=$this->input->post('fd');	
		
    
		$data_insert=array(
							'love_us'=>$lu,
							'question_attempt'=>$aq,
							'test_attempt'=>$at,
							'fact_text'=>$fd,
							'created_by'=>$user_id,
							'created_on'=>$current_date,

							);
		
		$this->db->insert('tbl_stat_chart',$data_insert);
		$this->session->set_flashdata('succ_msg','All stats updated successfully');
		redirect('index.php/manage_stat/view','refresh');

	}
	

}


}



