<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_class_room extends CI_Controller 
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
			//$this->session_check_and_session_data->session_check();
			//END LOGIN CHECK++++++++++++++++++++++++++++++++++++++
	}
	
	public function view_class_room()
	{

		

    $data['class']=$this->common->select($table_name = 'tbl_class_room_training', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'desc'), $start = '', $end = '');

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('class_room/class_room_view',$data);
		$this->load->view('template/admin_footer');
	
	}
	public function class_room_add()
	{

		
		
		

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('class_room/class_room_add_view');
		$this->load->view('template/admin_footer');
	
	}
	public function classroom_insert()
	{

		 if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        $nxt_batch_date=$this->input->post('nxt_batch_date');      
        $admission_lnk=$this->input->post('admission_lnk');
        // $video=$this->input->post('video_link');
       
            
        $created_date=date('Y-m-d H:i:s');
        $created_by=$user_id;

       

            $image=NULL;

      if(($_FILES['classroom_training']['name'])!='')
    {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['classroom_training']['tmp_name'];
            $file = $_FILES['classroom_training']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif")
            {
                move_uploaded_file($file_tmp, "../assets/uploads/classroom_training/" . $new_name . "." . $ext);

                move_uploaded_file($file_tmp, "../nism/assets/uploads/classroom_training/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                
                /*$img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/classroom_training/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 405;
                $img_config_4['height'] = 193;
                $img_config_4['new_image'] ='../assets/uploads/classroom_training/' . $image;
                

                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();*/
              }
              
        }



        $data = array(
                        
                        
                        
                        
                        'training_photo'=>$image,
                        'nxt_batch_date'=>$nxt_batch_date,
                        'admission_lnk'=>$admission_lnk,
                        'created_date'=>$created_date,
                        'created_by'=>$user_id,


                    );
        //echo '<pre>'; print_r($data); exit;
        $this->db->insert('tbl_class_room_training',$data);
        $this->session->set_flashdata('succ_msg','Added successfully');
        redirect('index.php/manage_class_room/view_class_room/','refresh');

	}

  public function classroom_training_edit()
  {

     $id=$this->uri->segment(3);
    
     $data['class']=$this->admin_model->selectone('tbl_class_room_training','id',$id);
     // $data['filetype']=$this->admin_model->selectAll('tbl_documents_type');
      // $data['exams']=$this->admin_model->selectone('tbl_exam_type','status','Active');


    
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('class_room/class_room_edit_view',$data);
    $this->load->view('template/admin_footer');
  
  }

  public function edit_classroom()
  {
   
     if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        $id =$this->input->post('id');
        $nxt_batch_date=$this->input->post('nxt_batch_date');      
        $admission_lnk=$this->input->post('admission_lnk');      
        $hidden_image=$this->input->post('hidden_classroom_training');      
       
    
       

        $edited_date=date('Y-m-d H:i:s');
        $edited_by=$user_id;
        

        if(($_FILES['classroom_training']['name'])=='')
    {
      $image=$hidden_image;
    }
    else
    {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['classroom_training']['tmp_name'];
            $file = $_FILES['classroom_training']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif")
            {
              if(@$hidden_image!='')
              {
                @unlink('../assets/uploads/classroom_training/'.@$hidden_image);
                @unlink('../nism/assets/uploads/classroom_training/'.@$hidden_image);
              }
                move_uploaded_file($file_tmp, "../assets/uploads/classroom_training/" . $new_name . "." . $ext);

              move_uploaded_file($file_tmp, "../nism/assets/uploads/classroom_training/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                
               /* $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/classroom_training/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 405;
                $img_config_4['height'] = 193;
                $img_config_4['new_image'] ='../assets/uploads/classroom_training/' . $image;
                

                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();*/
              }
              
        }
        $data = array(
                        
                        
                        
                       
                        'training_photo'=>$image,
                         'nxt_batch_date'=>$nxt_batch_date,
                        'admission_lnk'=>$admission_lnk,
                        'edited_date'=>$edited_date,
                        'edited_by'=>$user_id,

                         
                    );
        
      
        $this->db->where('id',$id);
        $this->db->update('tbl_class_room_training',$data);
      //  $this->db->insert('tbl_study_material',$data);
       $this->session->set_flashdata('success','Classroom Training updated successfully');
        redirect('index.php/manage_class_room/view_class_room/','refresh');
  }

  public function delete_classroom()
  {
     $id =$this->uri->segment(3);


     $classroom=$this->admin_model->selectone('tbl_class_room_training','id',$id);

    if(@$classroom[0]->training_photo!='')
    {
      unlink("../assets/uploads/classroom_training/".@$classroom[0]->training_photo);
    }

     $this->db->where('id',$id);
     $this->db->delete('tbl_class_room_training');
     $this->session->set_flashdata('delete_success','one Classroom Training deleted successfully');
      redirect('index.php/manage_class_room/view_class_room/','refresh');
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

      if($this->db->update('tbl_class_room_training',$data))
      {
        $result=1;
      }
      
    }
      
    echo json_encode(array('changedone'=>$result));
    

}
	
		

}
?>