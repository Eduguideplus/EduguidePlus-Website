<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_about_us extends CI_Controller {
	
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

public function content_view()
{
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$data['about_us_content']=$this->admin_model->selectAll('tbl_about_us');

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('about_us/about_us_update',$data);
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

	$check = $this->admin_model->selectAll('tbl_about_us');	
	$edit_id = $this->input->post('edit_id');
	$content = $this->input->post('content');
	/*$old_img = $this->input->post('old_image');
    	$image=NULL;

		if(($_FILES['image_about']['name'])!='')
		  {
		  $new_name =time();      
		  $config['upload_path'] ='../assets/uploads/about_us_image/';
		  $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
		  $config['file_name']=$new_name; 
		  
		    
		  $this->load->library('upload', $config);  
		  //==========end:resize body_part image======================   
		  $field_name = "image_about"; 
		      
		  $image=NULL;   
		  if($this->upload->do_upload($field_name))
		  { 
		    
		   $file_info = $this->upload->data();
		   $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
		   $file_size=$file_info['file_size'];
		   $this->image_lib->clear();     
		   $image =$file_info['raw_name'].$file_info['file_ext']; 
		    
		  
		   
		   
		   $image_config["image_library"] = "gd2";
		   $image_config["source_image"] ='../assets/uploads/about_us_image/'.$image;   
		   $image_config['create_thumb'] = FALSE;
		   $image_config['maintain_ratio'] = FALSE;
		   $image_config['new_image'] = '../assets/uploads/about_us_image/'.$image; 
		   $image_config['quality'] = "100%";
		   $image_config['width'] = 570;
		   $image_config['height']= 310;
		   
		   $image_config['master_dim'] = "height";
		   $this->image_lib->initialize($image_config);
		   $this->image_lib->resize(); 
		   $this->image_lib->clear();
		  } //end if
		}
		  
			if($image=='')
		  	{
		  		$image=$old_img;
		  	}
		  	else
		  	{
		  		@unlink('../assets/uploads/about_us_image/'.$old_img);
		  	}*/
				

				$data = array(
    					
    					'page_content'=>$content,
    					
    				
    						);
				//print_r($data); exit;
	if(count($check)>0)
    	{
    		
    		$this->db->where('id',$edit_id);
    		$this->db->update('tbl_about_us',$data);
    		$this->session->set_flashdata('succ_msg','updated successfully');
    		redirect('index.php/manage_about_us/content_view/','refresh');
    	}
    	else
    	{
    		$this->db->insert('tbl_about_us',$data);
    		$this->session->set_flashdata('succ_msg','added successfully');
    		redirect('index.php/manage_about_us/content_view/','refresh');
    	}

	
	}
}