<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

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
         if($this->session->userdata('session_user_id')!='')
        {
          $user_id= $this->session->userdata('session_user_id');
        }
        else{
          redirect('index.php/login','refresh');
        }

        $data['active']='home';


        $data['title']=$this->common_model->common($table_name ='tbl_home', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        $data['slider_image']=$this->common_model->common($table_name ='tbl_slider', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('home/home_list',$data);
    $this->load->view('template/adminfooter_category');

}


function add()
{
    // echo "ok";

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('highlight_area/add_area');
    $this->load->view('template/adminfooter_category');
}

public function home_update()
{

     $home=$this->input->post('home_id');
      $title1=$this->input->post('title1');
       $title2=$this->input->post('title2');
        $title3=$this->input->post('title3');

    $data['home']=$this->common_model->common($table_name = 'tbl_home', $field = array(), $where = array('home_id'=>$home), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); 

  

      if(count(@$data['home'])>0)
      {
        $data=array(
        
        'home_main_title'=>$title1,
        'home_title'=>$title2,
        'button_title'=>$title3,
        'edited_on'=>date('Y-m-d')
        );
     $this->db->where('home_id',$home);
    $this->db->update('tbl_home',$data);
      }
      else
      {


 $data=array(
        
        'home_main_title'=>$title1,
        'home_title'=>$title2,
        'button_title'=>$title3,
        'created_on'=>date('Y-m-d'),
        );
    $this->db->insert('tbl_home',$data);
}

redirect("index.php/home",'refresh');
}

function add_image()
{
  //echo "ok";

  $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('home/image_view');
    $this->load->view('template/adminfooter_category');
}


function image_insert()
{
   $status=$this->input->post('status');
   $title_1=$this->input->post('title_1');
   $title_2=$this->input->post('title_2');
   $button_title=$this->input->post('button_title');
   $button_link=$this->input->post('button_link');

   $created_on=date('y-m-d');
  if($_FILES['img_upload']['name']=="")
        {
            $image="";
            
        }
        else
        {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['img_upload']['tmp_name'];
            $file = $_FILES['img_upload']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png"|| $ext == "jpg" || $ext == "jpeg")
            {
                move_uploaded_file($file_tmp, "../assets/uploads/slider/" . $new_name . "." . $ext);
                $image = $new_name . "." . $ext;
               
                      

            }
            else
            {
                $this->session->set_flashdata('image_error','please upload an image..!');
                redirect('index.php/home','refresh');
            }
        }
        $data=array(
          'image'=>$image,
          'title_1'=>$title_1,
          'title_2'=>$title_2,
          'button_title'=>$button_title,
          'button_link'=>$button_link,
           'status'=>$status,
           'created_on'=>$created_on
          );
        $this->db->insert('tbl_slider',$data);
    $id = $this->db->insert_id();
    redirect("index.php/home",'refresh');
}

function edit_image()
{
  //echo "ok";

  $slider_id=$this->uri->segment(3);

  $data['slider_image']=$this->common_model->common($table_name ='tbl_slider', $field = array(), $where = array('slider_id'=>$slider_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');




  $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('home/image_edit_view',$data);
    $this->load->view('template/adminfooter_category');
}

function image_update()
{
   $status=$this->input->post('status');
   $modify_on=date('y-m-d');
   $slider_id=$this->input->post('slider_id');

  $title_1=$this->input->post('title_1');
   $title_2=$this->input->post('title_2');
   $button_title=$this->input->post('button_title');
   $button_link=$this->input->post('button_link');

   $old_image=$this->input->post('old_image');
    // echo $_FILES['img_upload']['name'];exit;

  if($_FILES['img_upload']['name']=="")
        {
            $image="";
            
        }
        else
        {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['img_upload']['tmp_name'];
            $file = $_FILES['img_upload']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png"|| $ext == "jpg" || $ext == "jpeg")
            {
                move_uploaded_file($file_tmp, "../assets/uploads/slider/" . $new_name . "." . $ext);
                $image = $new_name . "." . $ext;
               
                      

            }
            else
            {
                $this->session->set_flashdata('image_error','please upload an image..!');
                redirect('index.php/home','refresh');
            }
          }
          
          if($image=='')
            {
              $old_image=$this->input->post('old_image');
              $image=$old_image;
            }else{
              @unlink('../assets/uploads/slider/'.$old_image);
            }
        

        $data=array(
          'image'=>$image,
          'title_1'=>$title_1,
          'title_2'=>$title_2,
          'button_title'=>$button_title,
          'button_link'=>$button_link,
           'status'=>$status,
           'edited_on'=>$modify_on
          );
       // echo $image; print_r($data); exit; 
        $this->db->where('slider_id',$slider_id);
        $this->db->update('tbl_slider',$data);
    
    redirect("index.php/home",'refresh');
}







   function delete_data()
    {
         $id=$this->uri->segment(3);
         $data=$this->admin_model->selectOne('tbl_slider','slider_id', $id);
         unlink('../assets/uploads/slider/'.@$data[0]->image);
         $this->admin_model->delete_data('tbl_slider','slider_id',$id);
         $this->session->set_flashdata('msg','Slider  Has Been Deleted !');
         redirect('index.php/home','refresh');
    }


function change_to_active()
{
        $cat_ids=$this->input->post('id');
        $status=$this->input->post('status');
        $data=array('status'=>$status);


        for($i=0;$i<count($cat_ids);$i++)
        {
            $id=$cat_ids[$i];
            $this->db->where('slider_id',$id);

            if($this->db->update('tbl_slider',$data))
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
