<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_service_basket extends CI_Controller 
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
	
	public function view_service_basket()
	{

		//$data['category']=$this->admin_model->selectAll('tbl_category');
		
		//$data['plans']=$this->admin_model->selectAll('tbl_subscription_plan');
		
		 // $data['material']=$this->admin_model->selectAll('tbl_study_material');

    $data['service']=$this->common->select($table_name = 'tbl_service_basket', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'desc'), $start = '', $end = '');

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('service_basket/service_view',$data);
		$this->load->view('template/admin_footer');
	
	}
	public function service_basket_add()
	{

		
		
		 // $data['material_type']=$this->admin_model->selectAll('tbl_documents_type');
		  // $data['exams']=$this->admin_model->selectone('tbl_exam_type','status','Active');

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('service_basket/service_add_view');
		$this->load->view('template/admin_footer');
	
	}
	public function service_basket_insert()
	{

		 if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        $service_title=$this->input->post('service_title');      
        // $mat_type=$this->input->post('material_type');
        // $video=$this->input->post('video_link');
       
            
        $created_date=date('Y-m-d H:i:s');
        $created_by=$user_id;

       

            $image=NULL;

      if(($_FILES['service_icon']['name'])!='')
    {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['service_icon']['tmp_name'];
            $file = $_FILES['service_icon']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif")
            {
                move_uploaded_file($file_tmp, "../assets/uploads/service_basket/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/service_basket/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 405;
                $img_config_4['height'] = 193;
                $img_config_4['new_image'] ='../assets/uploads/service_basket/' . $image;
                

                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();
              }
              
        }



        $data = array(
                        
                        
                        
                        'service_title'=>$service_title,
                        'service_icon'=>$image,
                        
                        'created_date'=>$created_date,
                        'created_by'=>$user_id,


                    );
        //echo '<pre>'; print_r($data); exit;
        $this->db->insert('tbl_service_basket',$data);
        $this->session->set_flashdata('succ_msg','Added successfully');
        redirect('index.php/manage_service_basket/view_service_basket/','refresh');

	}

  public function service_basket_edit()
  {

     $id=$this->uri->segment(3);
    
     $data['service']=$this->admin_model->selectone('tbl_service_basket','id',$id);
     // $data['filetype']=$this->admin_model->selectAll('tbl_documents_type');
      // $data['exams']=$this->admin_model->selectone('tbl_exam_type','status','Active');


    
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('service_basket/service_edit_view',$data);
    $this->load->view('template/admin_footer');
  
  }

  public function edit_service_basket()
  {
   
     if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        $id =$this->input->post('id');
        $service_title=$this->input->post('service_title');      
        $hidden_image=$this->input->post('hidden_service_icon');      
       
    
       

        $edited_date=date('Y-m-d H:i:s');
        $edited_by=$user_id;
        

        if(($_FILES['service_icon']['name'])=='')
    {
      $image=$hidden_image;
    }
    else
    {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['service_icon']['tmp_name'];
            $file = $_FILES['service_icon']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif")
            {
              if(@$hidden_image!='')
              {
                unlink('../assets/uploads/service_basket/'.@$hidden_image);
              }
                move_uploaded_file($file_tmp, "../assets/uploads/service_basket/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/service_basket/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 405;
                $img_config_4['height'] = 193;
                $img_config_4['new_image'] ='../assets/uploads/service_basket/' . $image;
                

                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();
              }
              
        }
        $data = array(
                        
                        
                        
                        'service_title'=>$service_title,
                        'service_icon'=>$image,
                        
                        'edited_date'=>$edited_date,
                        'edited_by'=>$user_id,

                         
                    );
        
      
        $this->db->where('id',$id);
        $this->db->update('tbl_service_basket',$data);
      //  $this->db->insert('tbl_study_material',$data);
       $this->session->set_flashdata('success','Service Basket updated successfully');
        redirect('index.php/manage_service_basket/view_service_basket/','refresh');
  }

  public function delet_service_basket()
  {
     $id =$this->uri->segment(3);


     $service_basket=$this->admin_model->selectone('tbl_service_basket','id',$id);

    if(@$service_basket[0]->service_icon!='')
    {
      unlink("../assets/uploads/service_basket/".@$service_basket[0]->service_icon);
    }

     $this->db->where('id',$id);
     $this->db->delete('tbl_service_basket');
     $this->session->set_flashdata('delete_success','one Service deleted successfully');
      redirect('index.php/manage_service_basket/view_service_basket/','refresh');
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

      if($this->db->update('tbl_service_basket',$data))
      {
        $result=1;
      }
      
    }
      
    echo json_encode(array('changedone'=>$result));
    

}
	
		

}
?>