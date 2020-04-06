<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_subject extends CI_Controller {
	
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
	$this->load->model('common/common_model');	
		
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
	//$data['subject']=$this->admin_model->selectAll('tbl_subject');
	$data['subject']= $this->common_model->common($table_name = 'tbl_subject', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');




	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('manage_subject/subject_table_view',$data);
	$this->load->view('template/adminfooter_category');
	
	
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
    function add()
    {
    	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}


		//$data['category']= $this->admin_model->selectOne('tbl_category','parent_category','0');
		$data['category']= $this->admin_model->selectAll('tbl_category');


    	$data['board']= $this->common_model->common($table_name = 'tbl_board', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    	$data['medium']= $this->common_model->common($table_name = 'tbl_medium', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('short_order'=>'ASC'), $start = '', $end = '');

    	$data['class']= $this->common_model->common($table_name = 'tbl_class', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    	//print_r($data['board']); exit;

    	$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_subject/subject_add_view',$data);
		$this->load->view('template/adminfooter_category');
    }
    function insert()
    {
    	$category=$this->input->post('category');
    	$board=$this->input->post('board');
    	$medium=$this->input->post('medium');
    	$class=$this->input->post('class');
    	$sub_name=$this->input->post('sub_name');
    	$order=$this->input->post('order');
    	$slug=$this->create_slug($sub_name);

    	$image=NULL;
    	if(($_FILES['sub_icon']['name'])!='')
		  {
		  $new_name =time();      
		  $config['upload_path'] ='../assets/uploads/subject_icon/';
		  $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
		  $config['file_name']=$new_name; 
		  
		    
		  $this->load->library('upload', $config);  
		  //==========end:resize body_part image======================   
		  $field_name = "sub_icon"; 
		      
		  $image=NULL;   
		  if($this->upload->do_upload($field_name))
		  { 
		    
		   $file_info = $this->upload->data();
		   $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
		   $file_size=$file_info['file_size'];
		   $this->image_lib->clear();     
		   $image =$file_info['raw_name'].$file_info['file_ext']; 
		    
		  
		   
		   
		   $image_config["image_library"] = "gd2";
		   $image_config["source_image"] ='../assets/uploads/subject_icon/'.$image;   
		   $image_config['create_thumb'] = FALSE;
		   $image_config['maintain_ratio'] = FALSE;
		   $image_config['new_image'] = '../assets/uploads/subject_icon/'.$image; 
		   $image_config['quality'] = "100%";
		   $image_config['width'] = 270;
		   $image_config['height']= 180;
		   
		   $image_config['master_dim'] = "height";
		   $this->image_lib->initialize($image_config);
		   $this->image_lib->resize(); 
		   $this->image_lib->clear();
		  } //end if
		}
    	
    	$current_date=date('Y-m-d H:i:s');
    	$data = array(

    				
    				'cat_id'=>$category,
    				'board_id'=>$board,
    				'medium_id'=>$medium,
    				'class_id'=>$class,
    				'subject_name'=>$sub_name,
    				'subject_slug'=>$slug,
    				'short_order'=>$order,
    				'subject_icon'=>$image

    				);
    	$this->db->insert('tbl_subject',$data);
    	$this->session->set_flashdata('succ_msg','One subject added successfully');
    	redirect('index.php/manage_subject/view/','refresh');


    }

function delete()
{
	$id=$this->uri->segment(3);

	$sub = $this->admin_model->selectOne('tbl_subject','id',$id);

	if(count($sub)!=0)
			{
			

			
				$this->db->where('id',$id);

				$this->db->delete('tbl_subject');
				
				$this->session->set_flashdata('succ_msg','One subject deleted successfully.');
			
			}
			redirect('index.php/manage_subject/view/','refresh');

	
}
function edit()

{
		if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
		$sub_id=$this->uri->segment(3);

		$data['view']=$this->admin_model->selectOne('tbl_subject','id',$sub_id);

		$data['category']= $this->admin_model->selectAll('tbl_category');

    	$data['board']= $this->common_model->common($table_name = 'tbl_board', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    	$data['medium']= $this->common_model->common($table_name = 'tbl_medium', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('short_order'=>'ASC'), $start = '', $end = '');

    	$data['class']= $this->common_model->common($table_name = 'tbl_class', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		
		
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_subject/subject_edit_view',$data);
		$this->load->view('template/adminfooter_category');
}
function update()
{
		$sub_id=$this->input->post('edit_sub_id');

		$category=$this->input->post('category');
    	$board=$this->input->post('board');
    	$medium=$this->input->post('medium');
    	$class=$this->input->post('class');
    	$sub_name=$this->input->post('sub_name');
    	$order=$this->input->post('order');
    	$old_image=$this->input->post('old_image');

    	$slug=$this->create_slug($sub_name);
    	$image=NULL;

		if(($_FILES['sub_icon']['name'])!='')
		  {
		  $new_name =time();      
		  $config['upload_path'] ='../assets/uploads/subject_icon/';
		  $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
		  $config['file_name']=$new_name; 
		  
		    
		  $this->load->library('upload', $config);  
		  //==========end:resize body_part image======================   
		  $field_name = "sub_icon"; 
		      
		  $image=NULL;   
		  if($this->upload->do_upload($field_name))
		  { 
		    
		   $file_info = $this->upload->data();
		   $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
		   $file_size=$file_info['file_size'];
		   $this->image_lib->clear();     
		   $image =$file_info['raw_name'].$file_info['file_ext']; 
		    
		  
		   
		   
		   $image_config["image_library"] = "gd2";
		   $image_config["source_image"] ='../assets/uploads/subject_icon/'.$image;   
		   $image_config['create_thumb'] = FALSE;
		   $image_config['maintain_ratio'] = FALSE;
		   $image_config['new_image'] = '../assets/uploads/subject_icon/'.$image; 
		   $image_config['quality'] = "100%";
		   $image_config['width'] = 270;
		   $image_config['height']= 180;
		   
		   $image_config['master_dim'] = "height";
		   $this->image_lib->initialize($image_config);
		   $this->image_lib->resize(); 
		   $this->image_lib->clear();
		  } //end if
		}
		  if($image=='')
		  {
		  	$image=$old_image;
		  }
		  else
		  {
		  	@unlink('../assets/uploads/subject_icon/'.$old_image);
		  }
    	
    	$current_date=date('Y-m-d H:i:s');
    	$data = array(

    				
    				'cat_id'=>$category,
    				'board_id'=>$board,
    				'medium_id'=>$medium,
    				'class_id'=>$class,
    				'subject_name'=>$sub_name,
    				'subject_slug'=>$slug,
    				'short_order'=>$order,
    				'subject_icon'=>$image,

    				);
    	//echo '<pre>'; print_r($data); exit;
    	
    	$this->db->where('id',$sub_id);
    	$this->db->update('tbl_subject',$data);
    	$this->session->set_flashdata('succ_msg','One subject updated successfully.');
    	redirect('index.php/manage_subject/view/','refresh');

}

function change_to_active()
{
	
		$sub_ids=$this->input->post('subid');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($sub_ids);$i++)
		{
			$id=$sub_ids[$i];
			$this->db->where('id',$id);

			if($this->db->update('tbl_subject',$data))
			{
				$result=1;
			}
			else
			{
				$result=0;
			}


			}
			
		echo json_encode(array('changedone'=>$result));
		


}


		
		
		
}




