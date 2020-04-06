<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_gallery_category extends CI_Controller {
  
public function __construct()
  {
      parent::__construct();
      $this->load->database();
      $this->load->library('session');
      $this->load->library('form_validation');
      $this->load->library('datalist'); 
      $this->load->library('image_lib');
       $this->load->model('category_model');
      //$this->load->model('manage_users/common_user_model','common_model');
      $this->load->model('common/common');
       $this->load->model('admin_model'); 
      //START admin_login CHECK++++++++++++++++++++++++++++++++++++++
      $this->session_check_and_session_data->session_check();
      //END admin_login CHECK++++++++++++++++++++++++++++++++++++++ 
  }
  
function category_list_view()
  {
      
       if($this->session->userdata('session_user_id')!='')
           {
           $user_id= $this->session->userdata('session_user_id');
           }
       else{
           redirect('index.php/login','refresh');
           } 


           $data['active']="gallery";
        $data['category_details']=$this->admin_model->gallery_sort_order('tbl_gallery_category');


        //  $data['category_details']= $this->common->select($table_name='tbl_gallery_category',$field=array(),
        // $where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
     
     $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
      $this->load->view('manage_gallery/gallery_category_table',$data);
     $this->load->view('template/adminfooter_category');   
      
  }

   function add_category()
    {
        $data['parent_category_list']=$this->category_model->get_parent_category();
        // $data['sub_category_list']=$this->category_model->get_sub_category('parent_category');
        $data['sort_order']=$this->category_model->get_max_sort_order();

        $data['tag_details']=$this->common->select($table_name ='tbl_gallery_tag', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


        $data['active']="gallery";
        $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
        $this->load->view('category/category_add_view',$data);
       $this->load->view('template/adminfooter_category');
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
    $data['cat_details']= $this->common->select($table_name='tbl_gallery_category',$field=array(),$where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array()); 

    $data['tag_details']=$this->common->select($table_name ='tbl_gallery_tag', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


    $data['active']="gallery";
     $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
      $this->load->view('manage_gallery/gallery_category_add_view',$data);
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

function insert_category()
  {
      if($this->session->userdata('session_user_id')!='')
        {
          $user_id= $this->session->userdata('session_user_id');
        }
      else{
          redirect('index.php/login','refresh');


          }


           $tag=$this->input->post('tag');

     $meta_title=$this->input->post('meta_title');
     $meta_keyword=$this->input->post('meta_keyword');
     $meta_description=$this->input->post('meta_description');
     $user_id=$this->session->userdata('session_user_id');    
     $category_title=$this->input->post('category_name');
     $sub_category=$this->input->post('sub_category');
     $parent_category=$this->input->post('parent_category');
     $slug=$this->create_slug($category_title);
     $status = $this->input->post('status');
      $image="";
     // $sort_order=$this->input->post('sort_order');
      // $id=$this->input->post('gallery_category_id');


        $category=$this->create_slug($category_title); 
    
   /* if (!is_dir('../assets/uploads/category/'.$category)) 
    {
            mkdir('../assets/uploads/category/'.$category, 0777, true);
        }*/

        


       if($_FILES['cat_image']['name']=="")
        {
            $image="";
            
        }
        else
        {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['cat_image']['tmp_name'];
            $file = $_FILES['cat_image']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg")
            {
                move_uploaded_file($file_tmp, "../assets/uploads/category/" . $new_name . "." . $ext);
                $image = $new_name . "." . $ext;
                //--------MAIN IAMGE-----//
                $config['image_library'] = 'gd2';
                $config['source_image'] = '../assets/uploads/category/' . $image;   
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = "100%";
                
                    //--------MEDIUM IAMGE-----//
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = '../assets/uploads/category/'.$image;
                $config['quality'] = "100%";
                $config['width'] = 375;                        
                $config['height']= 250;
                $config['master_dim'] ="height" ;  

               

               $this->image_lib->initialize($config);
               $this->image_lib->resize(); 
               $this->image_lib->clear();
                      

            }
            else
            {
             $this->session->set_flashdata('succ_add','Insert Proper Image');
            redirect('index.php/manage_gallery_category/category_list_view','refresh');


            }





          }

        $insert_data= array(
                            
                            'cat_name'=>$category_title,
                              'gallery_tag_id'=>$tag,
                            'cat_slug'=>$slug,
                            // 'sort_order'=>$sort_order,
                            'cat_image'=>$image,
                            'status'=>$status,
                            'meta_title'=>$meta_title,
                            'meta_keyword'=>$meta_keyword,
                            'meta_description'=>$meta_description,
                            'created_by'=>$user_id,
                            'created_on'=>date('Y-m-d:H:i:s'));

      // print_r($insert_data); exit;
       $this->db->insert('tbl_gallery_category', $insert_data);
       $this->session->set_flashdata('succ_add','Gallery Album Successfully added');
       redirect('index.php/manage_gallery_category/category_list_view','refresh');
  }

function get_edit_details($category_id)
  {
      if($this->session->userdata('session_user_id')!='')
        {
        $user_id= $this->session->userdata('session_user_id');
        }
       else{
            redirect('index.php/login','refresh');
           }
       $id= $this->uri->segment(3);
       $data['active']="gallery";
      $data['cat_details']= $this->common->select($table_name='tbl_gallery_category',$field=array(),$where=array('cat_id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
      //  $data['parent_category_list']=$this->category_model->get_parent_category();

      $data['tag_details']=$this->common->select($table_name ='tbl_gallery_tag', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


        $data['category_detail']=$this->category_model->get_category_detail($category_id);
      $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
       $this->load->view('manage_gallery/gallery_category_edit_view',$data);
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
        $id= $this->input->post('edited_id');
        // $old_image= $this->input->post('old_image');
        //echo $old_image; exit;
    
        if($_FILES['edit_cat_image']['name']=="")
        {
            $image=$this->input->post('old_image');
            
        }
        else
        {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['edit_cat_image']['tmp_name'];
            $file = $_FILES['edit_cat_image']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "gif" || $ext == "jpg" || $ext == "jpeg")
            {
                $image=$this->input->post('old_image');
                @unlink('../assets/uploads/category/'.$image);
               
              

                move_uploaded_file($file_tmp, "../assets/uploads/category/" . $new_name . "." . $ext);
                $image = $new_name . "." . $ext;

                $config['image_library'] = 'gd2';
                $config['source_image'] = '../assets/uploads/category/' . $image;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = "100%";
               
               $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = '../assets/uploads/category/'.$image;
                $config['quality'] = "100%";
                $config['width'] = 375;                        
                $config['height']= 250;
                $config['master_dim'] ="height" ;  

               $this->image_lib->initialize($config);
               $this->image_lib->resize(); 
               $this->image_lib->clear();
                      
              }

                else
            {
             $this->session->set_flashdata('succ_update','Insert Proper Image');
       redirect('index.php/manage_gallery_category/category_list_view','refresh');


            }


            }

            $tag=$this->input->post('tag');

        $user_id=$this->session->userdata('hs_admin_id');    
        $category_title=$this->input->post('category_name');
        $parent_category=$this->input->post('parent_category');
        $slug=$this->create_slug($category_title);
        // $sort_order=$this->input->post('sort_order');
        $meta_title=$this->input->post('meta_title');
        $meta_keyword=$this->input->post('meta_keyword');
        $meta_description=$this->input->post('meta_description');

         $update_data= array(
                           
                            'cat_name'=>$category_title,
                            'gallery_tag_id'=>$tag,
                            'meta_title'=>$meta_title,
                            'meta_keyword'=>$meta_keyword,
                            'meta_description'=>$meta_description,
                            'cat_image'=>$image,
                            'cat_slug'=>$slug,
                            'modified_by'=>$user_id,
                            'modified_on'=>date('Y-m-d:H:i:s'));

         // print_r($update_data); exit;

        $this->db->where('cat_id',$id);
        //print_r($update_data); exit;
        $this->db->update('tbl_gallery_category',$update_data);
        $this->session->set_flashdata('succ_update','Gallery Album has been updated');
        redirect('index.php/manage_gallery_category/category_list_view','refresh');
  }

function delete_category()
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
     $get_details= $this->common->select($table_name='tbl_gallery_category',$field=array(),
                   $where=array('cat_id'=>$id),$like=array(),$order=array(),
                   $where_or=array(),$like_or_array=array());

     @unlink('../assets/uploads/category/'.$get_details[0]->cat_image);


     // $rs=$this->admin_model->select_data($table1,'job_id',$id);
/*$job_folder=$get_details[0]->folder_name;

  $n = $job_folder;
  $structure = '../assets/uploads/category/'.$n;
 // rmdir($structure);
 $this->deleteDirectory('../assets/uploads/category/'.$n);*/

    

     $this->db->where('cat_id',$id);
     $this->db->delete('tbl_gallery_category');
     $this->session->set_flashdata('succ_delete','gallery Album has been deleted');
     redirect('index.php/manage_gallery_category/category_list_view','refresh');
  }

  
function change_to_active()
  {
  
    $test_ids=$this->input->post('id');
    $status=$this->input->post('status');
    $data=array('status'=>$status);


    for($i=0;$i<count($test_ids);$i++)
    {
      $id=$test_ids[$i];
      $this->db->where('cat_id',$id);

      if($this->db->update('tbl_gallery_category',$data))
      {
        $result=1;
      }
      
    }
      
    echo json_encode(array('changedone'=>$result));
    


}
/*function update_sort_order()
    {

        $sort_order=$this->input->post('order');
        $cat_id=$this->input->post('cat_id');

        $data=$this->admin_model->selectOne('tbl_gallery_category','cat_id',$cat_id);
       //print_r($data);exit;
        if($sort_order!=@$data[0]->sort_order)
        {
        $data=array('sort_order'=>$sort_order);
        
         $this->db->where('cat_id',$cat_id);
         $this->db->update('tbl_gallery_category',$data);
       }


      echo json_encode(array('data'=>$data));
  }*/
  public function deleteDirectory($dir) { 
        if (!file_exists($dir)) { return true; }
        if (!is_dir($dir) || is_link($dir)) {
            return unlink($dir);
        }
        foreach (scandir($dir) as $item) { 
            if ($item == '.' || $item == '..') { continue; }
            
            if (!$this->deleteDirectory($dir . "/" . $item, false)) { 
                chmod($dir . "/" . $item, 0777); 
                if (!$this->deleteDirectory($dir . "/" . $item, false)) return false; 
            }; 
        } 
        return rmdir($dir); 
    }
}

?>