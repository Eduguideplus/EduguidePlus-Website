<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class social_site extends CI_Controller {
	
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
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	
	$data['site']=$this->admin_model->selectAll('tbl_social_link');
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('social_link',$data);
	$this->load->view('template/adminfooter_category');
	
}
public function links_update()
{
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$social_links=$this->admin_model->selectAll('tbl_social_link');
	if(count($social_links)>0)
	{
		
		$fb_link=$this->input->post('fb');
		$twitter_link=$this->input->post('twt');
		$youtube_link=$this->input->post('ytb');	
		$google_link=$this->input->post('gle');	
		$linkedin_link=$this->input->post('linkedin');	
		$id=$this->input->post('edit_id');
		$current_date= date('Y-m-d H:i:s');
    
		$data_update=array(
							'facebook_link'=>$fb_link,
							'twitter_link'=>$twitter_link,
							'youtube_link'=>$youtube_link,
							'googleplus_link'=>$google_link,
							'modified_by'=>$user_id,
							'modified_on'=>$current_date,
							'linkedin_link'=>$linkedin_link,

							);

		$this->db->where('id',$id);
		$this->db->update('tbl_social_link',$data_update);
		$this->session->set_flashdata('succ_msg','All links updated successfully');
		redirect('index.php/social_site/view','refresh');
	}
	else
	{
		$fb_link=$this->input->post('fb');
		$twitter_link=$this->input->post('twt');
		$youtube_link=$this->input->post('ytb');	
		$linkedin_link=$this->input->post('linkedin');	
		$google_link=$this->input->post('gle');	
		
    
		$data_insert=array(
							'facebook_link'=>$fb_link,
							'twitter_link'=>$twitter_link,
							'youtube_link'=>$youtube_link,
							'googleplus_link'=>$google_link,
							'created_by'=>$user_id,
							'created_on'=>$current_date,
							'linkedin_link'=>$linkedin_link,

							);
		
		$this->db->insert('tbl_social_link',$data_insert);
		$this->session->set_flashdata('succ_msg','All links updated successfully');
		redirect('index.php/social_site/view','refresh');

	}
	

}


}



