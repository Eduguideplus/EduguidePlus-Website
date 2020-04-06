<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class partner_management extends CI_Controller 
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
	
	public function view_partner()
	{

		//$data['category']=$this->admin_model->selectAll('tbl_category');
		
		//$data['plans']=$this->admin_model->selectAll('tbl_subscription_plan');
		
		 // $data['material']=$this->admin_model->selectAll('tbl_study_material');

    $data['partner']=$this->common->select($table_name = 'tbl_partner', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'desc'), $start = '', $end = '');

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('partner_management/partner_view',$data);
		$this->load->view('template/admin_footer');
	
	}
	public function partner_add()
	{

		
		
		 // $data['material_type']=$this->admin_model->selectAll('tbl_documents_type');
		  // $data['exams']=$this->admin_model->selectone('tbl_exam_type','status','Active');

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('partner_management/partner_add_view');
		$this->load->view('template/admin_footer');
	
	}
	public function partner_insert()
	{

		 if($this->session->userdata('session_user_id')!='')
        {
            $user_id= $this->session->userdata('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        // $service_title=$this->input->post('service_title');      
        // $mat_type=$this->input->post('material_type');
        // $video=$this->input->post('video_link');
       
            
        $created_date=date('Y-m-d H:i:s');
        $created_by=$user_id;

       

            $image=NULL;

      if(($_FILES['partner_photo']['name'])!='')
    {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['partner_photo']['tmp_name'];
            $file = $_FILES['partner_photo']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif")
            {
                move_uploaded_file($file_tmp, "../assets/uploads/manage_partner/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/manage_partner/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 400;
                $img_config_4['height'] = 200;
                $img_config_4['new_image'] ='../assets/uploads/manage_partner/' . $image;
                

                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();
              }
              
        }



        $data = array(
                        
                        
                        
                        
                        'partner_photo'=>$image,
                        
                        'created_date'=>$created_date,
                        'created_by'=>$user_id,


                    );
        //echo '<pre>'; print_r($data); exit;
        $this->db->insert('tbl_partner',$data);
        $this->session->set_flashdata('succ_msg','Added successfully');
        redirect('index.php/partner_management/view_partner/','refresh');

	}

  public function partner_edit()
  {

     $id=$this->uri->segment(3);
    
     $data['partner']=$this->admin_model->selectone('tbl_partner','id',$id);
     // $data['filetype']=$this->admin_model->selectAll('tbl_documents_type');
      // $data['exams']=$this->admin_model->selectone('tbl_exam_type','status','Active');


    
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('partner_management/partner_edit_view',$data);
    $this->load->view('template/admin_footer');
  
  }

  public function edit_partner()
  {
   
     if($this->session->userdata('session_user_id')!='')
        {
            $user_id= $this->session->userdata('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        $id =$this->input->post('id');
        // $service_title=$this->input->post('service_title');      
        $hidden_image=$this->input->post('hidden_partner');      
       
    
       

        $edited_date=date('Y-m-d H:i:s');
        $edited_by=$user_id;
        

        if(($_FILES['partner_photo']['name'])=='')
    {
      $image=$hidden_image;
    }
    else
    {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['partner_photo']['tmp_name'];
            $file = $_FILES['partner_photo']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif")
            {
              if(@$hidden_image!='')
              {
                unlink('../assets/uploads/manage_partner/'.@$hidden_image);
              }
                move_uploaded_file($file_tmp, "../assets/uploads/manage_partner/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/manage_partner/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 400;
                $img_config_4['height'] = 200;
                $img_config_4['new_image'] ='../assets/uploads/manage_partner/' . $image;
                

                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();
              }
              
        }
        $data = array(
                        
                        
                        
                       
                        'partner_photo'=>$image,
                        
                        'edited_date'=>$edited_date,
                        'edited_by'=>$user_id,

                         
                    );
        
      
        $this->db->where('id',$id);
        $this->db->update('tbl_partner',$data);
      //  $this->db->insert('tbl_study_material',$data);
       $this->session->set_flashdata('success','Partner updated successfully');
        redirect('index.php/partner_management/view_partner/','refresh');
  }

  public function delete_partner()
  {
     $id =$this->uri->segment(3);


     $partner=$this->admin_model->selectone('tbl_partner','id',$id);

    if(@$partner[0]->partner_photo!='')
    {
      unlink("../assets/uploads/manage_partner/".@$partner[0]->partner_photo);
    }

     $this->db->where('id',$id);
     $this->db->delete('tbl_partner');
     $this->session->set_flashdata('delete_success','one partner deleted successfully');
      redirect('index.php/partner_management/view_partner/','refresh');
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

      if($this->db->update('tbl_partner',$data))
      {
        $result=1;
      }
      
    }
      
    echo json_encode(array('changedone'=>$result));
    

}
	
		

}
?>