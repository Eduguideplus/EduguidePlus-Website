<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_why_us extends CI_Controller 
{
	 
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
			$this->load->model('dash_board_model');
            $this->load->model('common');
			//START LOGIN CHECK++++++++++++++++++++++++++++++++++++++
			$this->session_check_and_session_data->session_check();
			//END LOGIN CHECK++++++++++++++++++++++++++++++++++++++
	}
	
	public function why_us_view()
	{


    $data['whyus']=$this->common->select($table_name = 'tbl_why_us', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'desc'), $start = '', $end = '');

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_why_us/whyus_view',$data);
		$this->load->view('template/admin_footer');
	
	}
	public function whyus_add()
	{

		
		
		 // $data['material_type']=$this->admin_model->selectAll('tbl_documents_type');
		  // $data['exams']=$this->admin_model->selectone('tbl_exam_type','status','Active');

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_why_us/whyus_add_view');
		$this->load->view('template/admin_footer');
	
	}
	public function whyus_insert()
	{

		 if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        // $service_title=$this->input->post('service_title');      
        // $mat_type=$this->input->post('material_type');
        // $video=$this->input->post('video_link');
       

        $title=$this->input->post('title');
        $content=$this->input->post('content');

            
        $created_date=date('Y-m-d H:i:s');
        $created_by=$user_id;

        $data = array(   
                        'created_date'=>$created_date,
                        'created_by'=>$user_id,
                        'title'=>$title,
                        'content'=>$content


                    );
        //echo '<pre>'; print_r($data); exit;
        $this->db->insert('tbl_why_us',$data);
        $this->session->set_flashdata('succ_msg','Added successfully');
        redirect('index.php/manage_why_us/why_us_view/','refresh');

	}

  public function whyus_edit()
  {

     $id=$this->uri->segment(3);
    
     $data['whyus']=$this->admin_model->selectone('tbl_why_us','id',$id);
     


    
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('manage_why_us/whyus_edit_view',$data);
    $this->load->view('template/admin_footer');
  
  }

  public function whyus_update()
  {
   
     if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        $id =$this->input->post('hidden_id');
            
        $edited_date=date('Y-m-d H:i:s');
        $edited_by=$user_id;

        $title=$this->input->post('title');
        $content=$this->input->post('content');
        $old_image=$this->input->post('old_image');

          $image=NULL;
        if(($_FILES['cat_icon']['name'])!='')
          {
          $new_name =time();      
          $config['upload_path'] ='../assets/uploads/whyus/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
          $config['file_name']=$new_name; 
          
            
          $this->load->library('upload', $config);  
          //==========end:resize body_part image======================   
          $field_name = "cat_icon"; 
              
          $image=NULL;   
          if($this->upload->do_upload($field_name))
          { 
            
           $file_info = $this->upload->data();
           $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
           $file_size=$file_info['file_size'];
           $this->image_lib->clear();     
           $image =$file_info['raw_name'].$file_info['file_ext']; 
            
          
           
           
           // $image_config["image_library"] = "gd2";
           // $image_config["source_image"] ='../assets/uploads/company_logo/'.$image;   
           // $image_config['create_thumb'] = FALSE;
           // $image_config['maintain_ratio'] = TRUE;
           // $image_config['new_image'] = '../assets/uploads/company_logo/'.$image; 
           // $image_config['quality'] = "100%";
           // $image_config['width'] = 50;
           // $image_config['height']= 50;
           
           // $image_config['master_dim'] = "height";

                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/whyus/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = TRUE;
                $img_config_4['width']  = 500;
                $img_config_4['height'] = 350;
                $img_config_4['new_image'] ='../assets/uploads/whyus/' . $image;




           $this->image_lib->initialize($img_config_4);
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
            @unlink('../assets/uploads/whyus/'.$old_image);
          }

        
        $data = array(
                        
                        
                        
                       
                        
                        
                        'edited_date'=>$edited_date,
                        'edited_by'=>$user_id,
                        'title'=>$title,
                        'content'=>$content,
                        'image'=>$image,

                         
                    );
        
      
        $this->db->where('id',$id);
        $this->db->update('tbl_why_us',$data);
      //  $this->db->insert('tbl_study_material',$data);
       $this->session->set_flashdata('success','Why us updated successfully');
        redirect('index.php/manage_why_us/why_us_view/','refresh');
  }

  public function delete_whyus()
  {
     $id =$this->uri->segment(3);

     $this->db->where('id',$id);
     $this->db->delete('tbl_why_us');
     $this->session->set_flashdata('delete_success','one why us deleted successfully');
      redirect('index.php/manage_why_us/why_us_view/','refresh');
  }
function change_to_active()
{
  
    $service_ids=$this->input->post('id');
    $status=$this->input->post('status');
    $data=array('status'=>$status);


    for($i=0;$i<count($service_ids);$i++)
    {
      $id=$service_ids[$i];
      $this->db->where('id',$id);

      if($this->db->update('tbl_why_us',$data))
      {
        $result=1;
      }
      
    }
      
    echo json_encode(array('changedone'=>$result));
    

}
	
		

}
?>