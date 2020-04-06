<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_career extends CI_Controller {
	
public function __construct()
     {
            parent::__construct();
			$this->load->database();
			$this->load->library('session');
			$this->load->library('form_validation');
			$this->load->library('datalist');	
			$this->load->library('image_lib');
			$this->load->helper('text');
			
			
			//$this->load->model('manage_users/common_user_model','common_model');
			$this->load->model('common/common_model');
			$this->load->model('admin_model');	
			//START admin_login CHECK++++++++++++++++++++++++++++++++++++++
			$this->session_check_and_session_data->session_check();
			//END admin_login CHECK++++++++++++++++++++++++++++++++++++++	
	}
	
function career_list_view()
	{
		  
		   if($this->session->userdata('session_user_id')!='')
		       {
			     $user_id= $this->session->userdata('session_user_id');
		       }
		   else{
			     redirect('index.php/login','refresh');
		       } 
	  // $data['career_details']=$this->admin_model->order_date('tbl_career');
        //$data['career_details']= $this->common->select($table_name='tbl_career',$field=array(),
	    	 //$where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());

          $data['career_details']=$this->common_model->common($table_name ='tbl_career', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		 

		 $data['active']='career';
		  $this->load->view('template/admin_header');
		  $this->load->view('template/admin_leftmenu',$data);
		  $this->load->view('manage_career/career_list_view',$data);
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

function add_view()
	{
		  if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
		 $data['cat_details']= $this->common->select($table_name='tbl_job_category',$field=array(),
	    	$where=array('status'=>'active',),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());









		 
		  $data['active']='career';
		  $this->load->view('template/admin_header');
		  $this->load->view('template/admin_leftmenu',$data);
		  $this->load->view('manage_career/add_career_view',$data);
		  $this->load->view('template/adminfooter_category');	 
			
	}

function insert_career()
	{
		if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
	    else{
			  redirect('index.php/login','refresh');
		    }

		/*$image=NULL;
	  if(($_FILES['career_image']['name'])!='')
		{
		$new_name =time();						
		$config['upload_path'] ='../assets/uploads/career';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|docs';				
		$config['file_name']=$new_name;	
		$config['quality'] = "100%";
		//$config['width'] = 300;
		//$config['height']= 200;
		
		//$this->upload->initialize($config);		
		$this->load->library('upload', $config);		
		//==========end:resize body_part image======================			
		$field_name = "career_image";	
						
		$image=NULL;			
		if($this->upload->do_upload($field_name))
		{	
			//echo $new_name;exit;	
			$file_info = $this->upload->data();
			$original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
			$file_size=$file_info['file_size'];
			$this->image_lib->clear();  			
			$image =$file_info['raw_name'].$file_info['file_ext'];	
				
		} //end if
        }*///end if



          $user_id=$this->session->userdata('session_user_id');
          $status = $this->input->post('status');
          $job_category=$this->input->post('job_category');

         $job_name=$this->input->post('job_name');
		  $work_location=$this->input->post('work_location');
		  // $slug=$this->create_slug($job_discipline);
		   
          $nopost=$this->input->post('vacancy');
          $requisite_qualification=$this->input->post('qualification');

          $experience=$this->input->post('experience');

          $meta_title=$this->input->post('meta_title');
          $meta_keyword=$this->input->post('meta_keyword');
          $meta_description=$this->input->post('meta_description');
          $job_details=$this->input->post('job_details');

		  $insert_data= array(
		  	                  'job_category_id'=>$job_category,
		  	                  'status'=>$status,
		  	                  'work_location'=>$work_location,
		  	                  'job_title'=>$job_name,
		  	                  // 'slug'=>$slug,
			                  'vacancy'=>$nopost,
		  	                  'requisite_qualification'=>$requisite_qualification,

		  	                  'experience'=>$experience,

		  	                  'job_requirment'=>$job_details,
		  	                  // 'job_image'=>$image,
		  	                  
		  	                  'meta_title'=>$meta_title,
		  	                  'meta_description'=>$meta_description,
		  	                  'meta_keyword'=>$meta_keyword,
		  	                  'created_on'=>date('Y-m-d'),
		  	                  'created_by'=>$user_id);
 // print_r($insert_data); exit;

		  $this->db->insert('tbl_career', $insert_data);
		  $this->session->set_flashdata('succ_add','One Job  Successfully added');
		  redirect('index.php/manage_career/career_list_view','refresh');
	}


function get_edit_details()
	{
		  if($this->session->userdata('session_user_id')!='')
		    {
			  $user_id= $this->session->userdata('session_user_id');
		    }
		   else{
			    redirect('index.php/login','refresh');
		       }
		   $id= $this->uri->segment(3);
		   //echo $id; exit;
		  $data['career_details']=$this->common->select($table_name='tbl_career',$field=array(),
			$where=array('job_alert_id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		   //print_r($data['get_details']); exit;

 $data['cat_details']= $this->common->select($table_name='tbl_job_category',$field=array(),
	    	$where=array('status'=>'active',),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());

		    $data['active']='career';
		  $this->load->view('template/admin_header');
		  $this->load->view('template/admin_leftmenu',$data);
		   $this->load->view('manage_career/edit_career_view',$data);
		   $this->load->view('template/adminfooter_category');	
	}
	
function edit_action()
	{
		if($this->session->userdata('session_user_id')!='')
		    {
		 	  $user_id= $this->session->userdata('session_user_id');
		    }
		else{
			  redirect('index.php/login','refresh');
		    }

		    
		   /* $old_image= $this->input->post('old_image');
		    //echo $old_image; exit;
		
		   $image=NULL;
	  if(($_FILES['edit_career_image']['name'])!='')
		{
		$new_name =time();						
		$config['upload_path'] ='../assets/uploads/career';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|docs';				
		$config['file_name']=$new_name;	
		$config['quality'] = "100%";
		//$config['width'] = 300;
		//$config['height']= 200;
		
		//$this->upload->initialize($config);		
		$this->load->library('upload', $config);		
		//==========end:resize body_part image======================			
		$field_name = "edit_career_image";	
						
		$image=NULL;			
		if($this->upload->do_upload($field_name))
		{	
			//echo $new_name;exit;	
			$file_info = $this->upload->data();
			$original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
			$file_size=$file_info['file_size'];
			$this->image_lib->clear();  			
			$image =$file_info['raw_name'].$file_info['file_ext'];	
				
		} //end if
        }//end if

		     if($image==NULL)
		      {
			     $image=$old_image;
		      }
		     else{
			        //echo $img;
			        @unlink("../assets/uploads/career/".@$old_image);
		         }*/
		  $job_alert_id= $this->input->post('job_alert_id');
		  $user_id=$this->session->userdata('hs_admin_id');
          $job_category=$this->input->post('job_category');
		  $work_location=$this->input->post('work_location');

          $job_name=$this->input->post('job_name');
		  // $slug=$this->create_slug($job_discipline);
		   
          $nopost=$this->input->post('vacancy');
          $requisite_qualification=$this->input->post('qualification');

          $experience=$this->input->post('experience');

          $meta_title=$this->input->post('meta_title');
          $meta_keyword=$this->input->post('meta_keyword');
          $meta_description=$this->input->post('meta_description');
          $job_details=$this->input->post('job_details');

		  $update_data= array('job_category_id'=>$job_category,
		  	                 'work_location'=>$work_location,
		  	                 'vacancy'=>$nopost,
		  	                 'job_title'=>$job_name,
		  	                  'requisite_qualification'=>$requisite_qualification,
		  	                  'experience'=>$experience,
		  	                 'job_requirment'=>$job_details,
		  	                  // 'job_image'=>$image,
		  	                  // 'slug'=>$slug,
		  	                  'meta_title'=>$meta_title,
		  	                  'meta_description'=>$meta_description,
		  	                  'meta_keyword'=>$meta_keyword,
		  	                  
		  	                  'edited_on'=>date('Y-m-d'),
		  	                  'edited_by'=>$user_id);

		// print_r($update_data); exit;
  //         print_r($job_alert_id); exit;
		  $this->db->where('job_alert_id',$job_alert_id);
				//print_r($update_data); exit;
          $this->db->update('tbl_career',$update_data);
		  $this->session->set_flashdata('succ_update','One Job  has been updated');
		  redirect('index.php/manage_career/career_list_view');
	}

function delete_career()
	{
		if($this->session->userdata('session_user_id')!='')
		   {
			  $user_id= $this->session->userdata('session_user_id');
		   }
		else{
			  redirect('index.php/login','refresh');
		    }
		
		$id= $this->uri->segment(3);
		//echo $id;
		$career_details= $this->common->select($table_name='tbl_career',$field=array(),
			$where=array('job_alert_id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		$image = $career_details[0]->image;
		//echo $image; exit;
		//$count = count($get_details);
		//echo $count; exit;
		@unlink("../assets/uploads/career/".@$image);

		$this->db->where('job_alert_id',$id);
		$this->db->delete('tbl_career');
		$this->session->set_flashdata('succ_delete','One job has been deleted');
		redirect('index.php/manage_career/career_list_view');
	}

	function change_to_active()
  {
	
		$test_ids=$this->input->post('id');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($test_ids);$i++)
		{
			$id=$test_ids[$i];
			$this->db->where('job_alert_id',$id);

			if($this->db->update('tbl_career',$data))
			{
				$result=1;
			}
			
		}
			
		echo json_encode(array('changedone'=>$result));
		
}

public function solver_list_view()
{
	
	
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$data['solver'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');
	//echo '<pre>'; print_r($data['user']); exit;
	 $data['active']='solver';
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu',$data);
	$this->load->view('manage_career/solver_table',$data);
	$this->load->view('template/adminfooter_category');
	//redirect('profile/profile_show');

	//$this->load->view('profile_edit',$user);
	
}

}

?>