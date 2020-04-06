<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_documents extends CI_Controller 
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
	
	public function view_documents()
	{

		//$data['category']=$this->admin_model->selectAll('tbl_category');
		
		//$data['plans']=$this->admin_model->selectAll('tbl_subscription_plan');
		
		 // $data['material']=$this->admin_model->selectAll('tbl_study_material');

    $data['material']=$this->common->select($table_name = 'tbl_study_material', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'desc'), $start = '', $end = '');

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('study/study_view',$data);
		$this->load->view('template/admin_footer');
	
	}

    public function view_downloads()
    {

        $data['material']=$this->common->select($table_name = 'tbl_downloads', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'desc'), $start = '', $end = '');

        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu');
        $this->load->view('downloads/download_view',$data);
        $this->load->view('template/admin_footer');
    
    }



	public function download_add()
	{

		
		
		 

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('downloads/download_add_view');
		$this->load->view('template/admin_footer');
	
	}

    public function documents_add()
    {

        
        
         

        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu');
        $this->load->view('study/study_add_view');
        $this->load->view('template/admin_footer');
    
    }
	public function documents_insert()
	{

		 if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        $mat_name=$this->input->post('material_name');      
        // $mat_type=$this->input->post('material_type');
        $exam=$this->input->post('exam_id');
        // $video=$this->input->post('video_link');
       
            
        $current_date=date('Y-m-d H:i:s');
        

            $image=NULL;

      if(($_FILES['material_file']['name'])!='')
    {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['material_file']['tmp_name'];
            $file = $_FILES['material_file']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "pdf")
            {
                move_uploaded_file($file_tmp, "../assets/uploads/material/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/material/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                // $img_config_4['width']  = 150;
                // $img_config_4['height'] = 150;
                $img_config_4['new_image'] ='../assets/uploads/material/' . $image;
                

                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();
              }
              else
              {
                $this->session->set_flashdata('succ_msg','Please insert only PDF File');
                redirect('index.php/manage_documents/documents_add/','refresh');
              }
        }



        $data = array(
                        
                        
                        
                        'material_name'=>$mat_name,
                        'material_file'=>$image,
                        // 'material_type'=>$mat_type,
                        // 'video_link'=>$video,
                        'created_on'=>$current_date,


                    );
        //echo '<pre>'; print_r($data); exit;
        $this->db->insert('tbl_study_material',$data);
        $this->session->set_flashdata('succ_msg','Added successfully');
        redirect('index.php/manage_documents/view_documents/','refresh');

	}

    public function downloads_insert()
    {

         if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        $mat_name=$this->input->post('material_name');      
        // $mat_type=$this->input->post('material_type');
        $exam=$this->input->post('exam_id');
        // $video=$this->input->post('video_link');
       
            
        $current_date=date('Y-m-d H:i:s');
       

            $image=NULL;

      if(($_FILES['material_file']['name'])!='')
    {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['material_file']['tmp_name'];
            $file = $_FILES['material_file']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "pdf")
            {
                move_uploaded_file($file_tmp, "../assets/uploads/downloads/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/downloads/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                // $img_config_4['width']  = 150;
                // $img_config_4['height'] = 150;
                $img_config_4['new_image'] ='../assets/uploads/downloads/' . $image;
                

                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();
              }
              else
              {
                $this->session->set_flashdata('succ_msg','Please insert only PDF File');
                redirect('index.php/manage_documents/downloads_add/','refresh');
              }
        }



        $data = array(
                        'material_name'=>$mat_name,
                        'material_file'=>$image,
                        // 'material_type'=>$mat_type,
                        // 'video_link'=>$video,
                        'created_on'=>$current_date,


                    );
        //echo '<pre>'; print_r($data); exit;
        $this->db->insert('tbl_downloads',$data);
        $this->session->set_flashdata('succ_msg','Added successfully');
        redirect('index.php/manage_documents/view_downloads/','refresh');

    }


  public function documents_edit()
  {

     $id=$this->uri->segment(3);
    
     $data['study_material']=$this->admin_model->selectone('tbl_study_material','id',$id);
     // $data['filetype']=$this->admin_model->selectAll('tbl_documents_type');
      // $data['exams']=$this->admin_model->selectone('tbl_exam_type','status','Active');


    
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('study/study_edit_view',$data);
    $this->load->view('template/admin_footer');
  
  }

  public function downloads_edit()
  {

     $id=$this->uri->segment(3);
    
     $data['study_material']=$this->admin_model->selectone('tbl_downloads','id',$id);
     


    
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('downloads/download_edit_view',$data);
    $this->load->view('template/admin_footer');
  
  }


   public function edit_download_action()
  {
   
     if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        $id =$this->input->post('id');
        $mat_name=$this->input->post('material_name');      
        $hidden_image=$this->input->post('hidden_file');      
        // $mat_type=$this->input->post('material_type');
        // $exam=$this->input->post('exam_id');
        // $video=$this->input->post('video_link');
    
       

        $current_date=date('Y-m-d H:i:s');
        // $image=NULL;


        if(($_FILES['material_file']['name'])=='')
    {
      $image=$hidden_image;
    }
    else
    {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['material_file']['tmp_name'];
            $file = $_FILES['material_file']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "pdf")
            {
              if(@$hidden_image!='')
              {
                unlink('../assets/uploads/downloads/'.@$hidden_image);
              }
                move_uploaded_file($file_tmp, "../assets/uploads/downloads/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/downloads/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                // $img_config_4['width']  = 150;
                // $img_config_4['height'] = 150;
                $img_config_4['new_image'] ='../assets/uploads/downloads/' . $image;
                

                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();
              }
               else
              {
                $this->session->set_flashdata('succ_msg','Only PDF File will support');
                redirect('index.php/manage_documents/downloads_edit/','refresh');
              }
        }
        $data = array(
                        
                        
                        // 'exam_id'=>$exam,
                        'material_name'=>$mat_name,
                        'material_file'=>$image,
                        // 'material_type'=>$mat_type,
                        // 'video_link'=>$video,
                        'created_on'=>$current_date,

                         
                    );
        
      
        $this->db->where('id',$id);
        $this->db->update('tbl_downloads',$data);
      //  $this->db->insert('tbl_study_material',$data);
       $this->session->set_flashdata('success','File updated successfully');
        redirect('index.php/manage_documents/view_downloads/','refresh');
  }

  public function edit_process()
  {
   
     if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        $id =$this->input->post('id');
        $mat_name=$this->input->post('material_name');      
        $hidden_image=$this->input->post('hidden_file');      
        // $mat_type=$this->input->post('material_type');
        // $exam=$this->input->post('exam_id');
        // $video=$this->input->post('video_link');
    
       

        $current_date=date('Y-m-d H:i:s');
        // $image=NULL;


        if(($_FILES['material_file']['name'])=='')
    {
      $image=$hidden_image;
    }
    else
    {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['material_file']['tmp_name'];
            $file = $_FILES['material_file']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "pdf")
            {
              if(@$hidden_image!='')
              {
                unlink('../assets/uploads/material/'.@$hidden_image);
              }
                move_uploaded_file($file_tmp, "../assets/uploads/material/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/material/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                // $img_config_4['width']  = 150;
                // $img_config_4['height'] = 150;
                $img_config_4['new_image'] ='../assets/uploads/material/' . $image;
                

                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();
              }
               else
              {
                $this->session->set_flashdata('succ_msg','Only PDF File will support');
                redirect('index.php/manage_documents/documents_edit/','refresh');
              }
        }
        $data = array(
                        
                        
                        // 'exam_id'=>$exam,
                        'material_name'=>$mat_name,
                        'material_file'=>$image,
                        // 'material_type'=>$mat_type,
                        // 'video_link'=>$video,
                        'created_on'=>$current_date,

                         
                    );
        
      
        $this->db->where('id',$id);
        $this->db->update('tbl_study_material',$data);
      //  $this->db->insert('tbl_study_material',$data);
       $this->session->set_flashdata('success','student kit updated successfully');
        redirect('index.php/manage_documents/view_documents/','refresh');
  }

  public function delet_study_mat()
  {
     $id =$this->uri->segment(3);


     $study_detail=$this->admin_model->selectone('tbl_study_material','id',$id);

    if(@$study_detail[0]->material_file!='')
    {
      unlink("../assets/uploads/material/".@$study_detail[0]->material_file);
    }

     $this->db->where('id',$id);
     $this->db->delete('tbl_study_material');
     $this->session->set_flashdata('delete_success','one student kit deleted successfully');
      redirect('index.php/manage_documents/view_documents/','refresh');
  }

  public function delet_download()
  {
     $id =$this->uri->segment(3);


     $study_detail=$this->admin_model->selectone('tbl_downloads','id',$id);

    if(@$study_detail[0]->material_file!='')
    {
      @unlink("../assets/uploads/downloads/".@$study_detail[0]->material_file);
    }

     $this->db->where('id',$id);
     $this->db->delete('tbl_downloads');
     $this->session->set_flashdata('delete_success','One file deleted successfully');
      redirect('index.php/manage_documents/view_downloads/','refresh');
  }
function change_to_active()
{
  
    $test_ids=$this->input->post('id');
    $status=$this->input->post('status');
    $data=array('material_status'=>$status);


    for($i=0;$i<count($test_ids);$i++)
    {
      $id=$test_ids[$i];
      $this->db->where('id',$id);

      if($this->db->update('tbl_study_material',$data))
      {
        $result=1;
      }
      
    }
      
    echo json_encode(array('changedone'=>$result));
    

}
	
    function change_to_active_download()
{
  
    $test_ids=$this->input->post('id');
    $status=$this->input->post('status');
    $data=array('material_status'=>$status);


    for($i=0;$i<count($test_ids);$i++)
    {
      $id=$test_ids[$i];
      $this->db->where('id',$id);

      if($this->db->update('tbl_downloads',$data))
      {
        $result=1;
      }
      
    }
      
    echo json_encode(array('changedone'=>$result));
    

}
		

}
?>