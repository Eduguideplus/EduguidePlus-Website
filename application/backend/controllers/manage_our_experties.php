<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_our_experties extends CI_Controller {
	
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
	$this->load->model('admin_model');	
		
}

public function list_view()
{
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

	$data['testimonial']=$this->admin_model->selectAll('tbl_our_experties');

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('manage_our_experties/our_experties_table',$data);
	$this->load->view('template/adminfooter_category');
	//redirect('profile/profile_show');

	//$this->load->view('profile_edit',$user);
	
}


 function create_slug($string)
  {     
        $replace = '-';         
        $string = strtolower($string);     
 
        //replace / and . with white space     
        $string = preg_replace("/[\/\.]/", " ", $string);     
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);     
 
        //remove multiple dashes or whitespaces     
        $string = preg_replace("/[\s-]+/", " ", $string);     
 
        //convert whitespaces and underscore to $replace     
        $string = preg_replace("/[\s_]/", $replace, $string);     
 
        //limit the slug size     
        $string = substr($string, 0, 100);     
 
        //slug is generated     
        return $string; 
    }
    function add_view()
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
		$this->load->view('manage_our_experties/our_experties_add');
		$this->load->view('template/adminfooter_category');
    }
    function insert()
    {

    	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

    	$name=$this->input->post('testname');
       
       	$content=$this->input->post('content');
       	$profession=$this->input->post('profession');
    	
    	
       	$current_date=date('Y-m-d H:i:s');
    	$image=NULL;

		if(($_FILES['image']['name'])!='')
		  {
		  $new_name =time();      
		  $config['upload_path'] ='../assets/uploads/our_experties/';
		  $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
		  $config['file_name']=$new_name; 
		  
		    
		  $this->load->library('upload', $config);  
		  //==========end:resize body_part image======================   
		  $field_name = "image"; 
		      
		  $image=NULL;   
		  if($this->upload->do_upload($field_name))
		  { 
		    
		   $file_info = $this->upload->data();
		   $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
		   $file_size=$file_info['file_size'];
		   $this->image_lib->clear();     
		   $image =$file_info['raw_name'].$file_info['file_ext']; 
		    
		  
		   
		   
		   $image_config["image_library"] = "gd2";
		   $image_config["source_image"] ='../assets/uploads/our_experties/'.$image;   
		   $image_config['create_thumb'] = FALSE;
		   $image_config['maintain_ratio'] = FALSE;
		   $image_config['new_image'] = '../assets/uploads/our_experties/'.$image; 
		   $image_config['quality'] = "100%";
		   $image_config['width'] = 100;
		   $image_config['height']= 100;
		   
		   $image_config['master_dim'] = "height";
		   $this->image_lib->initialize($image_config);
		   $this->image_lib->resize(); 
		   $this->image_lib->clear();
		  } //end if
		}
    	$data = array(
    					
    					
    					'name'=>$name,
    					'image'=>$image,
    					'content'=>$content,
    					'designation'=>$profession,
    					'created_by'=>$user_id,
    					'created_on'=>$current_date,
    				);
    	//echo '<pre>'; print_r($data); exit;
    	$this->db->insert('tbl_our_experties',$data);
    	$this->session->set_flashdata('succ_msg','added successfully');
    	redirect('index.php/manage_our_experties/list_view/','refresh');


    }

function delete_data()
{
	$id=$this->uri->segment(3);
	$image_find = $this->admin_model->selectOne('tbl_our_experties','our_experties_id',$id);
	$old_image = $image_find[0]->image;
	//echo $old_image; exit;
	if($old_image!='')
	{
		@unlink('../assets/uploads/our_experties/'.$old_image);
	}
	$this->db->where('our_experties_id',$id);
	$this->db->delete('tbl_our_experties');			
	$this->session->set_flashdata('succ_msg','deleted successfully');
			
			
	redirect('index.php/manage_our_experties/list_view/','refresh');


}
function edit_view()

{
		if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
		$test_id=$this->uri->segment(3);
		$data['test_data'] = $this->admin_model->selectOne('tbl_our_experties','our_experties_id',$test_id);
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_our_experties/our_experties_edit',$data);
		$this->load->view('template/adminfooter_category');
}
function update()
{

		if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
		$test_id=$this->input->post('testid');
    	$name=$this->input->post('testname');
    	
    	$content=$this->input->post('content');
    	//$slug=$this->create_slug($cat_name);
    	$current_date=date('Y-m-d H:i:s');
    	$old_img = $this->input->post('old_image');
    	$profession=$this->input->post('profession');

    	$image=NULL;

		if(($_FILES['image']['name'])!='')
		  {
		  $new_name =time();      
		  $config['upload_path'] ='../assets/uploads/our_experties/';
		  $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
		  $config['file_name']=$new_name; 
		  
		    
		  $this->load->library('upload', $config);  
		  //==========end:resize body_part image======================   
		  $field_name = "image"; 
		      
		  $image=NULL;   
		  if($this->upload->do_upload($field_name))
		  { 
		    
		   $file_info = $this->upload->data();
		   $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
		   $file_size=$file_info['file_size'];
		   $this->image_lib->clear();     
		   $image =$file_info['raw_name'].$file_info['file_ext']; 
		    
		  
		   
		   
		   $image_config["image_library"] = "gd2";
		   $image_config["source_image"] ='../assets/uploads/our_experties/'.$image;   
		   $image_config['create_thumb'] = FALSE;
		   $image_config['maintain_ratio'] = FALSE;
		   $image_config['new_image'] = '../assets/uploads/our_experties/'.$image; 
		   $image_config['quality'] = "100%";
		   $image_config['width'] = 100;
		   $image_config['height']= 100;
		   
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
		  	@unlink('../assets/uploads/our_experties/'.$old_img);
		  }
    	$data = array(
    					
    					
    					'name'=>$name,
    					'image'=>$image,
    					'content'=>$content,
    					'designation'=>$profession,
    					'edited_by'=>$user_id,
    					'edited_on'=>$current_date,
    				);
    	
    	$this->db->where('our_experties_id',$test_id);
    	$this->db->update('tbl_our_experties',$data);
    	$this->session->set_flashdata('succ_msg','updated successfully');
    	redirect('index.php/manage_our_experties/list_view/','refresh');

}

function change_to_active()
{
	
		$test_ids=$this->input->post('id');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($test_ids);$i++)
		{
			$id=$test_ids[$i];
			$this->db->where('our_experties_id',$id);

			if($this->db->update('tbl_our_experties',$data))
			{
				$result=1;
			}
			
		}
			
		echo json_encode(array('changedone'=>$result));
		


}


		
		
		
}




