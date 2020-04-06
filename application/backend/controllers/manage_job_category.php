<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_job_category extends CI_Controller {
  
public function __construct()
  {
      parent::__construct();
      $this->load->database();
      $this->load->library('session');
      $this->load->library('form_validation');
      $this->load->library('datalist'); 
      $this->load->library('image_lib');
      
      //$this->load->model('manage_users/common_user_model','common_model');
      $this->load->model('common/common_model');
        
      //START admin_LOGIN CHECK++++++++++++++++++++++++++++++++++++++
      $this->session_check_and_session_data->session_check();
      //END admin_LOGIN CHECK++++++++++++++++++++++++++++++++++++++ 
  }
  
function category_list_view()
  {
      
       if(get_cookie('session_user_id')!='')
           {
           $user_id= get_cookie('session_user_id');
           }
       else{
           redirect('index.php/login','refresh');
           } 
       //$data['category_details']=$this->admin_model->job_cat_sort_order('tbl_job_category');


        $data['category_details']=$this->common_model->common($table_name ='tbl_job_category', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

     
         $data['active']='job_cat';
      $this->load->view('template/admin_header');
      $this->load->view('template/admin_leftmenu',$data);
      $this->load->view('manage_job_category/job_category_table',$data);
      $this->load->view('template/adminfooter_category');   
      
  }

function add_view()
  {
      if(get_cookie('session_user_id')!='')
        {
          $user_id= get_cookie('session_user_id');
        }
      else{
          redirect('index.php/login','refresh');
          }
            // $data['category_details']=$this->admin_model->job_cat_sort_order_desc('tbl_job_category');
          $data['category_details']=$this->common_model->common($table_name ='tbl_job_category', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

       $data['active']='job_cat';
      $this->load->view('template/admin_header');
      $this->load->view('template/admin_leftmenu',$data);
      $this->load->view('manage_job_category/job_category_add_view',$data);
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
      // if(get_cookie('session_user_id')!='')
      //   {
      //     $user_id= get_cookie('session_user_id');
      //   }
      // else{
      //     redirect('index.php/login','refresh');
      //     }

    
        $user_id=get_cookie('session_user_id');    
        $category_title=$this->input->post('category_name');
        $slug=$this->create_slug($category_title);
        $status = $this->input->post('status');
        $sort_order=$this->input->post('sort_order');
        $id=$this->input->post('job_category_id');

        $insert_data= array('job_category_title'=>$category_title,
                            'job_category_slug'=>$slug,
                            'sort_order'=>$sort_order,
                            'status'=>$status,
                            'created_by'=>$user_id,
                            'created_on'=>date('Y-m-d'));

       //print_r($insert_data); exit;
       $this->db->insert('tbl_job_category', $insert_data);
       $this->session->set_flashdata('succ_add','job Category Successfully added');
       redirect('index.php/manage_job_category/category_list_view','refresh');
  }

function get_edit_details()
  {
      // if($this->session->userdata('hs_admin_id')!='')
      //   {
      //   $user_id= $this->session->userdata('hs_admin_id');
      //   }
      //  else{
      //       redirect('admin_login','refresh');
      //      }
       $id= $this->uri->segment(3);
       //echo $id; exit;
      $data['category_details']= $this->common->select($table_name='tbl_job_category',$field=array(),$where=array('job_category_id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
       
       $data['active']='job_cat';
      $this->load->view('template/admin_header');
      $this->load->view('template/admin_leftmenu',$data);
       $this->load->view('manage_job_category/job_category_edit_view',$data);
       $this->load->view('template/adminfooter_category'); 
  }
  
function edit_action()
  {
    // if($this->session->userdata('hs_admin_id')!='')
    //     {
    //     $user_id= $this->session->userdata('hs_admin_id');
    //     }
    // else{
    //     redirect('admin_login','refresh');
    //     }

         $user_id=$this->session->userdata('hs_admin_id');    
         $category_title=$this->input->post('category_name');
         $slug=$this->create_slug($category_title);
         $sort_order=$this->input->post('sort_order');
         $id=$this->input->post('category_edit_id');


         $update_data=array('job_category_title'=>$category_title,
                            'job_category_slug'=>$slug,
                            'sort_order'=>$sort_order,
                            'edited_by'=>$user_id,
                            'edited_on'=>date('Y-m-d'));
        //print_r($update_data); exit;

        $this->db->where('job_category_id',$id);
        //print_r($update_data); exit;
        $this->db->update('tbl_job_category',$update_data);
        $this->session->set_flashdata('succ_update','job Category has been updated');
        redirect('index.php/manage_job_category/category_list_view','refresh');
  }

function delete_category()
  {
      //  if($this->session->userdata('hs_admin_id')!='')
      //     {
      //         $user_id= $this->session->userdata('hs_admin_id');
      //     }
      // else{
      //          redirect('admin_login','refresh');
      //     }
    
      $id= $this->uri->segment(3);
       //echo $id;

     // $get_details= $this->common->select($table_name='tbl_job_category',$field=array(),
     //               $where=array('job_category_id'=>$id),$like=array(),$order=array(),
     //               $where_or=array(),$like_or_array=array());
    

     $this->db->where('job_category_id',$id);
     $this->db->delete('tbl_job_category');
     $this->session->set_flashdata('succ_delete','job Category has been deleted');
     redirect('index.php/manage_job_category/category_list_view','refresh');
  }

  
function change_to_active()
  {
  
    $test_ids=$this->input->post('id');
    $status=$this->input->post('status');
    $data=array('status'=>$status);


    for($i=0;$i<count($test_ids);$i++)
    {
      $id=$test_ids[$i];
      $this->db->where('job_category_id',$id);

      if($this->db->update('tbl_job_category',$data))
      {
        $result=1;
      }
      
    }
      
    echo json_encode(array('changedone'=>$result));
    


}
function update_sort_order()
    {

        $sort_order=$this->input->post('order');
        $cat_id=$this->input->post('cat_id');

        $data=$this->admin_model->selectOne('tbl_job_category','job_category_id',$cat_id);
       //print_r($data);exit;
        if($sort_order!=@$data[0]->sort_order)
        {
        $data=array('sort_order'=>$sort_order);
        
         $this->db->where('job_category_id',$cat_id);
         $this->db->update('tbl_job_category',$data);
       }


      echo json_encode(array('data'=>$data));
  }
  // function update_sort_order()
  //   {

  //       $sort_order=$this->input->post('order');
  //       $cat_id=$this->input->post('cat_id');

  //       $data=$this->admin_model->selectOne('tbl_job_category','job_category_id',$cat_id);
       
  //       if($sort_order!=@$data[0]->category_sort_order)
  //       {
  //       $data=array('job_category_sort_order'=>$sort_order);

  //        $this->db->where('category_id',$cat_id);
  //        $this->db->update('tbl_job_category',$data);
  //      }

  //     echo json_encode(array('data'=>$data));
  // }

}

?>