<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manage_blog extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('image_lib');
        $this->load->library('session');
        $this->load->model('admin_model');
        $this->load->model('common/common_model');

    }

    public function blog_cat_view()
    {
    
    if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }

    $data['blog_cat_list']=$this->admin_model->selectAll('tbl_blog_category');
    

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('blog/blog_cat_table',$data);
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

    function blog_cat_add()
    {
        if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        //$data['category_list']=$this->admin_model->selectone('tbl_category','parent_category','0');
        

        //echo '<pre>';print_r($data['category_list']); exit;

        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu');
        $this->load->view('blog/blog_cat_add');
        $this->load->view('template/adminfooter_category');
    }

    function blog_cat_insert()
    {
        if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        $blog_cat_name=$this->input->post('blog_cat_name');       
        $slug=$this->create_slug($blog_cat_name);              
        $current_date=date('Y-m-d H:i:s');
        
        $data = array(
                        
                        
                        'category_slug'=>$slug,
                        'category_name'=>$blog_cat_name,
                        'created_by'=>$user_id,
                        'created_on'=>$current_date,
                        
                    );
        //echo '<pre>'; print_r($data); exit;
        $this->db->insert('tbl_blog_category',$data);
        $this->session->set_flashdata('succ_msg','added successfully');
        redirect('index.php/manage_blog/blog_cat_view/','refresh');


    }
    function blog_cat_edit()
    {
        if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }

        $edit_id = $this->uri->segment(3);
        $data['edit_blog_cat_list']=$this->admin_model->selectone('tbl_blog_category','category_id',$edit_id);
        

        //echo '<pre>';print_r($data['category_list']); exit;

        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu');
        $this->load->view('blog/blog_cat_edit',$data);
        $this->load->view('template/adminfooter_category');
    }

    function blog_cat_update()
    {
        if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        $edit_id = $this->input->post('edit_id');
        $blog_cat_name=$this->input->post('blog_cat_name');       
        $slug=$this->create_slug($blog_cat_name);              
        $current_date=date('Y-m-d H:i:s');
        
        $data = array(
                        
                        
                        'category_slug'=>$slug,
                        'category_name'=>$blog_cat_name,
                        'edited_by'=>$user_id,
                        'edited_on'=>$current_date,
                        
                    );
        //echo '<pre>'; print_r($data); exit;
        $this->db->where('category_id',$edit_id);
        $this->db->update('tbl_blog_category',$data);
        $this->session->set_flashdata('succ_msg','updated successfully');
        redirect('index.php/manage_blog/blog_cat_view/','refresh');


    }
    function delete_blog_cat()
    {
        $id=$this->uri->segment(3);
        
        $this->db->where('category_id',$id);
        $this->db->delete('tbl_blog_category');           
        $this->session->set_flashdata('succ_msg','deleted successfully');
        redirect('index.php/manage_blog/blog_cat_view/','refresh');


    }

    function change_to_active()
    {
    
        $blog_cat_ids=$this->input->post('id');
        $status=$this->input->post('status');
        $data=array('category_status'=>$status);


        for($i=0;$i<count($blog_cat_ids);$i++)
        {
            $id=$blog_cat_ids[$i];
            $this->db->where('category_id',$id);

            if($this->db->update('tbl_blog_category',$data))
            {
                $result=1;
            }
            
        }
            
        echo json_encode(array('changedone'=>$result));
        


    }

    public function blog_list_view()
    {
    
    if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }

    $data['blog_list']=$this->admin_model->selectAll('tbl_blog');
    

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('blog/blog_table',$data);
    $this->load->view('template/adminfooter_category');
    
    
    }

    function blog_add()
    {
        if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }

        $data['blog_category']=$this->admin_model->selectAll('tbl_blog_category');
        

        //echo '<pre>';print_r($data['category_list']); exit;

        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu');
        $this->load->view('blog/blog_add',$data);
        $this->load->view('template/adminfooter_category');
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
        $category_array=$this->input->post('category');      
        $blog_title=$this->input->post('blog_title');
        $blog_title_slug=$this->create_slug($blog_title);
        $meta_title=$this->input->post('meta_title');
        $meta_desc=$this->input->post('meta_desc');
        $blog_desc=$this->input->post('description');       
        $current_date=date('Y-m-d H:i:s');
        $image=NULL;

        if(($_FILES['blog_image']['name'])!='')
          {
          $new_name =time();      
          $config['upload_path'] ='../assets/uploads/blog/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
          $config['file_name']=$new_name; 
          
            
          $this->load->library('upload', $config);  
          //==========end:resize body_part image======================   
          $field_name = "blog_image"; 
              
          $image=NULL;   
          if($this->upload->do_upload($field_name))
          { 
            
           $file_info = $this->upload->data();
           $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
           $file_size=$file_info['file_size'];
           $this->image_lib->clear();     
           $image =$file_info['raw_name'].$file_info['file_ext']; 
            
          
           
           
           $image_config["image_library"] = "gd2";
           $image_config["source_image"] ='../assets/uploads/blog/'.$image;   
           $image_config['create_thumb'] = FALSE;
           $image_config['maintain_ratio'] = FALSE;
           $image_config['new_image'] = '../assets/uploads/blog/'.$image; 
           $image_config['quality'] = "100%";
           $image_config['width'] = 410;
           $image_config['height']= 245;
           
           $image_config['master_dim'] = "height";
           $this->image_lib->initialize($image_config);
           $this->image_lib->resize(); 
           $this->image_lib->clear();
          } //end if
        }
        $data = array(
                        
                        
                        'meta_title'=>$meta_title,
                        'meta_description'=>$meta_desc,
                        'blog_title'=>$blog_title,
                        'blog_title_slug'=>$blog_title_slug,
                        'blog_description'=>$blog_desc,
                        'blog_thumbnail'=>$image,
                        'added_by'=>$user_id,
                        'added_on'=>$current_date,


                    );
        //echo '<pre>'; print_r($data); exit;
        $this->db->insert('tbl_blog',$data);
        $blog_id = $this->db->insert_id();

        if(count($category_array)>0)
                {
                    for($x=0;$x<count($category_array);$x++)
                    {
                        //echo $image[$x]['product_image'];
                        $blog_cat_data = array(

                                                    'blog_id'=>$blog_id,
                                                    'blog_category_id'=>$category_array[$x],
                                                    'created_by'=>$user_id,
                                                    'created_on'=>$current_date,
                                                                                                        
                                                    );
                        $this->db->insert('tbl_blog_category_id',$blog_cat_data);
                    }
                }   

       
        $this->session->set_flashdata('succ_msg','added successfully');
        redirect('index.php/manage_blog/blog_list_view/','refresh');


    }

    function blog_edit()
    {
        if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }

        $edit_id = $this->uri->segment(3);
        $data['blog_edit']=$this->admin_model->selectone('tbl_blog','blog_id',$edit_id);
        $data['blog_category']=$this->admin_model->selectAll('tbl_blog_category');

        //echo '<pre>';print_r($data['category_list']); exit;

        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu');
        $this->load->view('blog/blog_edit',$data);
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

        $blog_id = $this->input->post('edit_id');

        $category_array = $this->input->post('category');      
        $blog_title = $this->input->post('blog_title');
        $blog_title_slug = $this->create_slug($blog_title);
        $meta_title = $this->input->post('meta_title');
        $meta_desc = $this->input->post('meta_desc');
        $blog_desc = $this->input->post('description'); 
        $old_image = $this->input->post('old_image');    
        $current_date=date('Y-m-d H:i:s');
        $image=NULL;

        if(($_FILES['blog_image']['name'])!='')
          {
          $new_name =time();      
          $config['upload_path'] ='../assets/uploads/blog/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
          $config['file_name']=$new_name; 
          
            
          $this->load->library('upload', $config);  
          //==========end:resize body_part image======================   
          $field_name = "blog_image"; 
              
          $image=NULL;   
          if($this->upload->do_upload($field_name))
          { 
            
           $file_info = $this->upload->data();
           $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
           $file_size=$file_info['file_size'];
           $this->image_lib->clear();     
           $image =$file_info['raw_name'].$file_info['file_ext']; 
            
          
           
           
           $image_config["image_library"] = "gd2";
           $image_config["source_image"] ='../assets/uploads/blog/'.$image;   
           $image_config['create_thumb'] = FALSE;
           $image_config['maintain_ratio'] = FALSE;
           $image_config['new_image'] = '../assets/uploads/blog/'.$image; 
           $image_config['quality'] = "100%";
           $image_config['width'] = 410;
           $image_config['height']= 245;
           
           $image_config['master_dim'] = "height";
           $this->image_lib->initialize($image_config);
           $this->image_lib->resize(); 
           $this->image_lib->clear();
          } //end if
        }
        if($image=='')
        {
            $image= $old_image;
        }
        else{

            @unlink('../assets/uploads/blog/'.$old_image);
           
        }
        //print_r($category_array); exit;
        $data = array(
                        
                        
                        'meta_title'=>$meta_title,
                        'meta_description'=>$meta_desc,
                        'blog_title'=>$blog_title,
                        'blog_title_slug'=>$blog_title_slug,
                        'blog_description'=>$blog_desc,
                        'blog_thumbnail'=>$image,
                        'edited_by'=>$user_id,
                        'edited_on'=>$current_date,


                    );
        //echo '<pre>'; print_r($data); exit;
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_blog',$data);

        $chk_blog_cat = $this->admin_model->selectone('tbl_blog_category_id','blog_id',$blog_id);
        if(count($chk_blog_cat)>0)
        {
            $this->db->where('blog_id',$blog_id);
            $this->db->delete('tbl_blog_category_id');
        }
        //print_r($category_array); exit;
        if(count($category_array)>0)
                {

                    for($x=0;$x<count($category_array);$x++)
                    {
                        //echo $image[$x]['product_image'];
                        $blog_cat_data = array(

                                                    'blog_id'=>$blog_id,
                                                    'blog_category_id'=>$category_array[$x],
                                                    'created_by'=>$user_id,
                                                    'created_on'=>$current_date,
                                                                                                        
                                                    );
                        $this->db->insert('tbl_blog_category_id',$blog_cat_data);
                    }
                }   

       
        $this->session->set_flashdata('succ_msg','updated successfully');
        redirect('index.php/manage_blog/blog_list_view/','refresh');


    }

    function delete_blog()
    {
        $id=$this->uri->segment(3);
        
        $chk_blog_category = $this->admin_model->selectOne('tbl_blog_category_id','blog_id',$id);
        if(count($chk_blog_category)>0)
        {
            $this->db->where('blog_id',$id);
            $this->db->delete('tbl_blog_category_id');

            $this->db->where('blog_id',$id);
            $this->db->delete('tbl_blog');
        }
                   
        $this->session->set_flashdata('succ_msg','deleted successfully');
        redirect('index.php/manage_blog/blog_list_view/','refresh');


    }

    function blog_change_to_active()
    {
    
        $blog_ids=$this->input->post('id');
        $status=$this->input->post('status');
        $data=array('blog_status'=>$status);


        for($i=0;$i<count($blog_ids);$i++)
        {
            $id=$blog_ids[$i];
            $this->db->where('blog_id',$id);

            if($this->db->update('tbl_blog',$data))
            {
                $result=1;
            }
            
        }
            
        echo json_encode(array('changedone'=>$result));
        


    }

}
?>