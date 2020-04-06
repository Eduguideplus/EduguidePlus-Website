<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manage_financial_solutions extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('image_lib');
        if (get_cookie('session_user_id')=="")
        {
            redirect(base_url().'index.php/login');
        }
    }

    ///////////////// SHOW COUPON LIST  /////////////////

    
    function list_view()
    {
        $data['active']="financial_solutions";
        $data['data_list']=$this->admin_model->selectAll('tbl_financial_solutions');
        $data['contact']=$this->admin_model->selectAll('tbl_financial_solutions_content');
        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu',$data);
        $this->load->view('financial_solutions/financial_solutions_view',$data);
        $this->load->view('template/adminfooter_category');
    }
    function add_view()
    {
        $data['active']="financial_solutions";
        $data['setting_active']="slider";
        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu',$data);
        $this->load->view('financial_solutions/financial_solutions_add_view');
        $this->load->view('template/adminfooter_category');
    }
    function add_submit()
    {
        $manager_name=$this->input->post('manager_name');
        $designation=$this->input->post('designation');
        $title=$this->input->post('title');
        $content=$this->input->post('content');


$image=NULL;
        if(@$_FILES['slider_image']['name']!="")
        {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['slider_image']['tmp_name'];
            $file = $_FILES['slider_image']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg")
            {
                move_uploaded_file($file_tmp, "../assets/uploads/financial_solutions/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/financial_solutions/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 60;
                $img_config_4['height'] = 60;
                $img_config_4['new_image'] ='../assets/uploads/financial_solutions/' . $image; 
                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                
                $this->image_lib->clear();


            
            }
        }
       
        $data=array(
            'title'=>$title,
            'content'=>$content,

            
            'image' => $image,

            'created_by'=>get_cookie('session_user_id'),
            'created_on'=>date('Y-m-d H:i:s')
           
            );
        // echo '<pre>';print_r($data);exit;
        $this->admin_model->insert_data($data,'tbl_financial_solutions');
        $this->session->set_flashdata('msg',"Insert Successfully !");

        redirect(base_url().'index.php/manage_financial_solutions/list_view');
    }
    function edit_view()
    {
         $id=$this->uri->segment(3); 

         $data['data_info']=$this->admin_model->selectOne('tbl_financial_solutions','id', $id);
         $data['active']="financial_solutions";
         $data['setting_active']="financial_solutions";
         $this->load->view('template/admin_header');
         $this->load->view('template/admin_leftmenu',$data);
         $this->load->view('financial_solutions/financial_solutions_edit_view');
         $this->load->view('template/adminfooter_category');
    }
    function edit_submit()
    {
        $manager_name=$this->input->post('manager_name');
        $designation=$this->input->post('designation');
        $title=$this->input->post('title');
        $content=$this->input->post('content');

        $old_pic=$this->input->post('old_pic');
        $slider_id=$this->input->post('slider_id');

       

        $image=NULL;

        if($_FILES['image']['name']=="")
        {
            $image=$old_pic;
            //echo $image; exit;
        }
        else
        {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['image']['tmp_name'];
            $file = $_FILES['image']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg")
            {
                move_uploaded_file($file_tmp, "../assets/uploads/financial_solutions/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/financial_solutions/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 60;
                $img_config_4['height'] = 60;
                $img_config_4['new_image'] ='../assets/uploads/financial_solutions/' . $image; 
                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                
                $this->image_lib->clear();


            
            }

            @unlink('../assets/uploads/financial_solutions/'.$old_pic);
            
        }
        
        $data=array(

            'title'=>$title,
            'content'=>$content,
           
            'image' => $image,
            'modified_by'=>get_cookie('session_user_id'),
            'modified_on'=>date('Y-m-d H:i:s')
            
            );
         //echo '<pre>';print_r($data);exit;
        $this->db->where('id',$slider_id);
        $this->db->update('tbl_financial_solutions',$data);
        $this->session->set_flashdata('msg'," Updated Successfully !");
        redirect(base_url().'index.php/manage_financial_solutions/list_view');
    }
    function delete_data()
    {
         $id=$this->uri->segment(3);
         $data=$this->admin_model->selectOne('tbl_financial_solutions','id', $id);
         unlink('../assets/uploads/financial_solutions/'.$data[0]->image);

         $this->admin_model->delete_data('tbl_financial_solutions','id',$id);
         $this->session->set_flashdata('msg_err',"Delete Successfully !");
         redirect(base_url().'index.php/manage_financial_solutions/list_view');
    }





 function index()
    {
        $data['active']="financial_solutions";
        $data['contact']=$this->admin_model->selectAll('tbl_financial_solutions_content');
        $data['data_list']=$this->admin_model->selectAll('tbl_financial_solutions');

        // $check_tbl = $this->common->select($table_name='tbl_about_company',$field=array(),$where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());

        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu',$data);
        $this->load->view('financial_solutions/financial_solutions_view');
        $this->load->view('template/adminfooter_category');
    }
   
public function update()
{
    $title=$this->input->post('title');
    $content=$this->input->post('content');
    $bottom_content=$this->input->post('bottom_content');


$fb_link=$this->input->post('fb_link');
$twitter_link=$this->input->post('twitter_link');
$linkedin_link=$this->input->post('linkedin_link');
 $google_plus_link=$this->input->post('google_plus_link');

    
         $id=$this->input->post('id');
        // echo $id;exit;



         

          // $check_tbl=$this->admin_model->selectAll('tbl_about_company');

         $data=array(
            'content'=>$content,
            'modified_by'=>get_cookie('session_user_id'),
            'modified_on'=>date('Y-m-d H:i:s')
            
            
            
         

            
            );

          $check_tbl = $this->common->select($table_name='tbl_financial_solutions_content',$field=array(),$where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());

          if(count($check_tbl)<1){


       
            

        
      //   print_r($data); exit;

          $this->db->insert('tbl_financial_solutions_content',$data);
          


      }
              else{

                 $this->db->where('id',$id);
          $this->db->update('tbl_financial_solutions_content',$data);      


              }





          $this->session->set_flashdata('msg2',"Updated Successfully !");
          redirect(base_url().'index.php/manage_financial_solutions');
    
}




function change_to_active()
  {
  
    $test_ids=$this->input->post('id');
    $status=$this->input->post('status');
    $data=array('status'=>$status);


    for($i=0;$i<count($test_ids);$i++)
    {
      $id=$test_ids[$i];
      $this->db->where('id',$id);

      if($this->db->update('tbl_financial_solutions',$data))
      {
        $result=1;
      }
      
    }
      
    echo json_encode(array('changedone'=>$result));
    


}










   
   
   
}
?>