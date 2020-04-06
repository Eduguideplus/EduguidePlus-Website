<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Library extends CI_Controller {

public function __construct()
     {
         parent::__construct();

         $this->load->database();       
         $this->load->model('admin_model');
         $this->load->library('session');
             
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->library('email');          
            $this->load->library('image_lib');
            $this->load->model('common/common_model');  
        
         
     }

    public function index()
    {
         if(get_cookie('session_user_id')!='')
        {
          $user_id= get_cookie('session_user_id');
        }
        else{
          redirect('index.php/login','refresh');
        }


        $data['exam_type']=$this->common_model->common($table_name ='tbl_library', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    

        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu');
        $this->load->view('library/library_list',$data);
        $this->load->view('template/adminfooter_category');

    }



function add_library()
{
    // echo "ok";


    if(get_cookie('session_user_id')!='')
        {
          $user_id= get_cookie('session_user_id');
        }
        else
        {
          redirect('index.php/login','refresh');
        }

          $data['parent_exam_type']=$this->common_model->common($table_name ='tbl_exam_type', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
          

          //echo '<pre>';print_r($data['category_list']); exit;

          $this->load->view('template/admin_header');
          $this->load->view('template/admin_leftmenu');
          $this->load->view('library/add_library',$data);
          $this->load->view('template/adminfooter_category');
}


function insert()
{
    if(get_cookie('session_user_id')!='')
      {
        $user_id= get_cookie('session_user_id');
      }
      else
      {
        redirect('index.php/login','refresh');
      }

        $library_exam_id=$this->input->post('Library');
         $file_information=$this->input->post('file_info');
        

         



     
       
    
        
        $image=NULL;
        if(($_FILES['upload_pdf']['name'])!='')
          {
          $new_name =time();      
          $config['upload_path'] ='../assets/uploads/library/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf';    
          $config['file_name']=$new_name; 
          
            
          $this->load->library('upload', $config);  
          //==========end:resize body_part image======================   
          $field_name = "upload_pdf"; 
              
          $image=NULL;   
          if($this->upload->do_upload($field_name))
          { 
            
           $file_info = $this->upload->data();
           $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
           $file_size=$file_info['file_size'];
           $this->image_lib->clear();     
           $image =$file_info['raw_name'].$file_info['file_ext']; 
            
          
           
           
           $image_config["image_library"] = "gd2";
           $image_config["source_image"] ='../assets/uploads/library/'.$image;   
           $image_config['create_thumb'] = FALSE;
           $image_config['maintain_ratio'] = TRUE;
           $image_config['new_image'] = '../assets/uploads/library/'.$image; 
           $image_config['quality'] = "100%";
           // $image_config['width'] = 50;
           // $image_config['height']= 50;
           
           $image_config['master_dim'] = "height";
           $this->image_lib->initialize($image_config);
           $this->image_lib->resize(); 
           $this->image_lib->clear();
          } //end if
        }
        
        $current_date=date('Y-m-d H:i:s');
        
            $data = array(

                    
                    'library_exam_id'=>$library_exam_id,
                    'upload_file'=>$image,
                    'file_information'=>$file_information,
                    'created_date'=>$current_date
                );
         // echo   $file_information.$library_exam_id;exit;  
        //echo '<pre>'; print_r($data); exit;
        $this->db->insert('tbl_library',$data);
        $this->session->set_flashdata('succ_msg','added successfully');
        redirect('index.php/Library','refresh');

}


function group_edit()
{
     $library_id=$this->uri->segment(3);

         $data['parent_exam_type']=$this->common_model->common($table_name ='tbl_exam_type', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

     $data['library']=$this->common_model->common($table_name ='tbl_library', $field = array(), $where = array('library_id'=>$library_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


         $this->load->view('template/admin_header');
          $this->load->view('template/admin_leftmenu');
          $this->load->view('library/edit_library',$data);
          $this->load->view('template/adminfooter_category');

}


function update()
{

    $edit_id=$this->input->post('edit_id');

    // echo $edit_id;exit;

    
      $Library=$this->input->post('Library');
       $old_image=$this->input->post('old_image');
     
         $file_info=$this->input->post('file_info');

      $image=NULL;
        if(($_FILES['upload_pdf']['name'])!='')
          {
          $new_name =time();      
          $config['upload_path'] ='../assets/uploads/library/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf';    
          $config['file_name']=$new_name; 
          
            
          $this->load->library('upload', $config);  
          //==========end:resize body_part image======================   
          $field_name = "upload_pdf"; 
              
          $image=NULL;   
          if($this->upload->do_upload($field_name))
          { 
            
           $file_info = $this->upload->data();
           $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
           $file_size=$file_info['file_size'];
           $this->image_lib->clear();     
           $image =$file_info['raw_name'].$file_info['file_ext']; 
            
          
           
           
           $image_config["image_library"] = "gd2";
           $image_config["source_image"] ='../assets/uploads/library/'.$image;   
           $image_config['create_thumb'] = FALSE;
           $image_config['maintain_ratio'] = TRUE;
           $image_config['new_image'] = '../assets/uploads/library/'.$image; 
           $image_config['quality'] = "100%";
           // $image_config['width'] = 50;
           // $image_config['height']= 50;
           
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
            @unlink('../assets/uploads/library/'.$old_image);
          }

          $current_date=date('Y-m-d H:i:s');
      
            $data = array(
                    'library_exam_id'=>$Library,
                    'upload_file'=>$image,
                    'file_information'=>$file_info,
                    'edited_date'=>$current_date

                    );
        
      //echo '<pre>'; print_r($data); exit;
      $this->db->where('library_id',$edit_id);
      $this->db->update('tbl_library',$data);
      $this->session->set_flashdata('succ_msg',' updated successfully.');
      redirect('index.php/Library','refresh');
}


function delete_data()
{
    $id=$this->uri->segment(3);


    $image=$this->common_model->common($table_name ='tbl_library', $field = array(), $where = array('library_id'=>$id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    
$delete_image=$image[0]->upload_file;
            
                $this->db->where('library_id',$id);

                $this->db->delete('tbl_library');

                @unlink('../assets/uploads/library/'.$delete_image);
                
                $this->session->set_flashdata('succ_msg','deleted successfully.');
            
            
            redirect('index.php/Library','refresh');
}


function change_to_active()
{
        $cat_ids=$this->input->post('catid');
        $status=$this->input->post('status');
        $data=array('status'=>$status);


        for($i=0;$i<count($cat_ids);$i++)
        {
            $id=$cat_ids[$i];
            $this->db->where('library_id',$id);

            if($this->db->update('tbl_library',$data))
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

?>