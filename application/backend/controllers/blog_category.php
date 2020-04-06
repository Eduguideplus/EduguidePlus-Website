<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blog_category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('image_lib');
        if (get_cookie('session_user_id')=="")
        {
            redirect(base_url().'index.php/admin_login');
        }
    }

    function index()
    {
        //echo "ok";

        if(get_cookie('session_user_id')!='')
               {
                  $user_id= get_cookie('session_user_id');
               }
             else{
                  redirect('index.php/login','refresh');
                 }

        $data['active']="blog_category";

         $data['category_details']=$this->common->select($table_name ='tbl_blog_category', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

       $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu',$data);
        $this->load->view('blog/blog_category_list',$data);
        $this->load->view('template/adminfooter_category');

        
    }

    function add_category()
    {

        if(get_cookie('session_user_id')!='')
               {
                  $user_id= get_cookie('session_user_id');
               }
             else{
                  redirect('index.php/login','refresh');
                 }

        $data['active']="blog_category";

       $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu',$data);
        $this->load->view('blog/add_blog_category',$data);
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


    function blog_insert()
    {
        if(get_cookie('session_user_id')!='')
               {
                  $user_id= get_cookie('session_user_id');
               }
             else{
                  redirect('index.php/login','refresh');
                 }

        $user_id=get_cookie('session_user_id');
        $created_date=date('y-m-d H:i:s');

        $category=$this->input->post('category');
        $category_slug=$this->create_slug($category);

        $data=array(
                    'category_name'=>$category,
                    'category_slug'=>$category_slug,
                    'created_by'=>$user_id,
                    'created_on'=>$created_date
                     );

        $this->db->insert('tbl_blog_category',$data);

        $this->session->set_flashdata('success_msg','Added Successfully');
        redirect('index.php/blog_category','refresh');

    }




    function edit_blog()
    {
        if(get_cookie('session_user_id')!='')
               {
                  $user_id= get_cookie('session_user_id');
               }
             else{
                  redirect('index.php/login','refresh');
                 }

        $data['active']="blog_category";

        $id=$this->uri->segment(3);

        $data['blog_details']=$this->common->select($table_name ='tbl_blog_category', $field = array(), $where = array('id'=>$id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu',$data);
        $this->load->view('blog/edit_blog_category',$data);
       $this->load->view('template/adminfooter_category');
    }


    function blog_update()
    {
        if(get_cookie('session_user_id')!='')
               {
                  $user_id= get_cookie('session_user_id');
               }
             else{
                  redirect('index.php/login','refresh');
                 }

        $user_id=get_cookie('session_user_id');
        $edited_date=date('y-m-d H:i:s');

        $id=$this->input->post('id');

        $category=$this->input->post('category');
        $category_slug=$this->create_slug($category);

        $data=array(
                    'category_name'=>$category,
                    'category_slug'=>$category_slug,
                    'edited_by'=>$user_id,
                    'edited_on'=>$edited_date
                     );

        $this->db->where('id',$id);
        $this->db->update('tbl_blog_category',$data);

        $this->session->set_flashdata('success_msg','Updated Successfully');

          redirect('index.php/blog_category','refresh');


    }

    function delete_data()
    {
        if(get_cookie('session_user_id')!='')
               {
                  $user_id= get_cookie('session_user_id');
               }
             else{
                  redirect('index.php/login','refresh');
                 }
                 
        $id=$this->uri->segment(3);

        $this->db->where('id',$id);
        $this->db->delete('tbl_blog_category');

        $this->session->set_flashdata('success_msg','Deleted Successfully');

            redirect('index.php/blog_category','refresh');
    }


    function change_to_active()
    {

        $pro_ids=$this->input->post('pid');
        $status=$this->input->post('status');
        $data=array('status'=>$status);


        for($i=0;$i<count($pro_ids);$i++)
        {
            $id=$pro_ids[$i];
            $this->db->where('id',$id);

            if($this->db->update('tbl_blog_category',$data))
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