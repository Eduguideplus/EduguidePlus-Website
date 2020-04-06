<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_institution extends CI_Controller {
	
public function __construct()
{
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
  $this->load->library('pagination');
	 
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->library('email');			
	$this->load->library('image_lib');
	$this->load->model('common/common_model');	
		
}


public function inst_level()
{
  
  if(get_cookie('session_user_id')!='')
    {
      $user_id= get_cookie('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

  // $data['active']='manage_exam_type';

 $data['inst_level']=$this->common_model->common($table_name = 'tbl_institute_level', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  
  

  $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu',$data);
  $this->load->view('institution/institution_level_view',$data);
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



      function add_inst_level()
    {

        if(get_cookie('session_user_id')!='')
        {
          $user_id= get_cookie('session_user_id');
        }
        else
        {
          redirect('index.php/login','refresh');
        }

        // $data['active']='manage_exam_type';

          
          

          //echo '<pre>';print_r($data['category_list']); exit;

          $this->load->view('template/admin_header');
          $this->load->view('template/admin_leftmenu');
          $this->load->view('institution/add_inst_level');
          $this->load->view('template/adminfooter_category');

    }


     function inst_level_insert()
    {

      if(get_cookie('session_user_id')!='')
      {
        $user_id= get_cookie('session_user_id');
      }
      else
      {
        redirect('index.php/login','refresh');
      }

     
      $inst=$this->input->post('inst');

      $inst_slug=$this->create_slug($inst);


      $current_date=date('Y-m-d H:i:s');
      
        $data = array(
            
                       
            'created_by'=>$user_id,
            'created_date'=>$current_date,
            'institute_level'=>$inst,
            'slug'=>$inst_slug        

            );
      
      
      $this->db->insert('tbl_institute_level',$data);

   
      $this->session->set_flashdata('succ_msg','added successfully');
      redirect('index.php/manage_institution/inst_level/','refresh');
    }




      function inst_level_edit()
    {

        if(get_cookie('session_user_id')!='')
        {
          $user_id= get_cookie('session_user_id');
        }
        else
        {
          redirect('index.php/login','refresh');
        }
        

        $id=$this->uri->segment(3);

        // print_r($id); exit;
        

           $data['inst_level']=$this->common_model->common($table_name = 'tbl_institute_level', $field = array(), $where = array('id'=>$id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


          $this->load->view('template/admin_header');
          $this->load->view('template/admin_leftmenu');
          $this->load->view('institution/edit_inst_level',$data);
          $this->load->view('template/adminfooter_category');

    }


       function inst_level_update()
    {

      if(get_cookie('session_user_id')!='')
      {
        $user_id= get_cookie('session_user_id');
      }
      else
      {
        redirect('index.php/login','refresh');
      }

     
      $inst=$this->input->post('inst');
      $inst_slug=$this->create_slug($inst);

      $edit_id=$this->input->post('edit_id');

      $current_date=date('Y-m-d H:i:s');
      
        $data = array(
            
                       
            'edited_by'=>$user_id,
            'edited_date'=>$current_date,
            'institute_level'=>$inst,
            'slug'=>$inst_slug        

            );
      
      
      $this->db->where('id',$edit_id);
      $this->db->update('tbl_institute_level',$data);

   
      $this->session->set_flashdata('succ_msg','Updated successfully');
      redirect('index.php/manage_institution/inst_level/','refresh');
    }

   function inst_level_delete()
{
  $id=$this->uri->segment(3);

  

      
        $this->db->where('id',$id);

        $this->db->delete('tbl_institute_level');

        
        
        $this->session->set_flashdata('succ_msg','deleted successfully.');
      
      
      redirect('index.php/manage_institution/inst_level/','refresh');

  
}



function change_to_active_inst_level()
{
  
    $cat_ids=$this->input->post('catid');
    $status=$this->input->post('status');
    $data=array('status'=>$status);


    for($i=0;$i<count($cat_ids);$i++)
    {
      $id=$cat_ids[$i];
      $this->db->where('id',$id);

      if($this->db->update('tbl_institute_level',$data))
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



function inst_list()
{
    if(get_cookie('session_user_id')!='')
    {
      $user_id= get_cookie('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

  // $data['active']='manage_exam_type';

   //  $data['inst']=$this->common_model->common($table_name = 'tbl_institute', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $data['count_inst']=$this->common_model->common($table_name = 'tbl_institute', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');





               // $total_row=$this->blog_model->fetch_all_blog_count('tbl_blog','active');

                 $total_row=$this->common_model->common($table_name = 'tbl_institute', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
            

            
            
                 $config['base_url'] = base_url()."index.php/manage_institution/inst_list?";
            











// $total_row = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>'3','status'=>'Active','admin_approve'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

 //  $config['base_url'] =$this->url->link(92);

            $config['total_rows'] = count($total_row); 
            $config['per_page'] = 20;
            $config['first_link'] = 'FIRST';
            $config['last_link'] = 'LAST';
            $config['first_tag_open'] = '<li  class="paging-nav">';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li  class="paging-nav">';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = 'NEXT<i class="fa fa-angle-double-right"></i>';
            $config['next_tag_open'] = '<li  class="paging-nav">';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '<i class="fa fa-angle-double-left"></i>PREV';
            $config['prev_tag_open'] = '<li  class="paging-nav">';
            $config['prev_tag_close'] = '</li>';
            $config['full_tag_open'] = '<ul class="pagination" id="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['cur_tag_open'] = '<li class="number active"><span class="font600"><b>';
            $config['cur_tag_close'] = '</b></span></li>';
            $config['num_tag_open'] = '<li class="number"><span class="font600">';
            $config['num_tag_close'] = '</span></li>';

            $config["num_links"] =8;
            $config['page_query_string'] = TRUE;

            $this->pagination->initialize($config);
            if(isset($_GET['per_page'])){
                $page = $_GET['per_page'] ;


            }
            else{
                $page = 0;
            }
           $str_links = $this->pagination->create_links();

           $data['links'] = $str_links;

         //  $data['blog_list']=$this->common_model->fetch_all_blog('tbl_blog',$config['per_page'],$page);




 
               // $data['blog_list']=$this->blog_model->fetch_all_blog('tbl_blog',$config['per_page'],$page,'active');
                $data['inst']=$this->common_model->common($table_name = 'tbl_institute', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('institute_name'=>'asc'), $start = $page, $end = $config['per_page']);
            



  
  

  $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu');
  $this->load->view('institution/institution_list',$data);
  $this->load->view('template/adminfooter_category');
}



function search_by_institute()
{
    if(get_cookie('session_user_id')!='')
    {
      $user_id= get_cookie('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

   $search_name=$this->input->post('search_name');

   //  $data['inst']=$this->common_model->common($table_name = 'tbl_institute', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

   // $data['count_inst']=$this->common_model->common($table_name = 'tbl_institute', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



                $inst=$this->common_model->common($table_name = 'tbl_institute', $field = array(), $where = array(), $where_or = array(), $like = array('institute_name'=>@$search_name), $like_or = array(), $order = array('institute_name'=>'asc'), $start = '', $end = '');

                


                ?>



                <?php

                 if(count(@$inst)>0){


               foreach($inst as $row)
               {

                


               ?>
                
                <tr>
                  <td><input type="checkbox" name="record" value="<?php echo $row->id;?>"></td>
                  <td>
                  <?php if($row->status=='active')
                  {?>
                     <img src="<?php echo base_url();?>../assets/images/active.png">
                  <?php 
                  }
                  else{ ?>
                     <img src="<?php echo base_url();?>../assets/images/inactive.png">
                  <?php
                  }  ?>
                  </td>
              
                <?php 
                      $countries=$this->common_model->common($table_name = 'countries', $field = array(), $where = array('id'=>$row->country), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


                      $states=$this->common_model->common($table_name = 'states', $field = array(), $where = array('id'=>$row->state), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


                      $cities=$this->common_model->common($table_name = 'cities', $field = array(), $where = array('id'=>$row->city), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  

                 ?>


                  
                  <td>
                            <?php if($row->image!='')  {  ?>

                  <img src="<?php echo base_url()."../assets/uploads/institute/".$row->image;?>" style="width:100px;height:20px"> </img> 

                 <?php  }  else{ ?> <img src="<?php echo base_url();?>../assets/uploads/no_image.png" style="width:100px;height:20px"> 
 <?php } ?>


                  </td>
                  <td>
                  
                   <?php echo $row->institute_name; ?>
                 
                  </td>
                

                 
                  
                
                  <td><?php echo $row->management_of_inst; ?></td>
                
                  <td><?php echo @$cities[0]->name; ?></td>
                 
                
                 <td><?php echo $row->total_seat; ?></td>

                  
                  <td> <a href="<?php echo base_url();?>index.php/manage_institution/edit_institute/<?php echo $row->id;?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>

                   
                    <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo $row->id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button>
                   
                 
                   <a href="<?php echo base_url();?>index.php/manage_institution/inst_info/<?php echo $row->id;?>" class="btn btn-success" title="Institute Info"><i class="fa fa-graduation-cap"></i></a> 

                    <a href="<?php echo base_url();?>index.php/manage_institution/course_lst/<?php echo $row->id;?>" class="btn btn-primary" title="Course List"><i class="fa fa-book"></i></a> 
                        

                  
                   </td>
                </tr>

                 <?php
                       } } else{ 
                        echo '<tr>
                            <td colspan="8">Institute not found..</td></tr>';
                     }
                       ?>



            



  
  
<?php
  
}







function course_lst()
{
  if(get_cookie('session_user_id')!='')
    {
      $user_id= get_cookie('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }
    $int_id= $this->uri->segment(3);
    if($int_id!='')
    {
      $data['get_course_list']= $this->common_model->common($table_name = 'tbl_course_institute', $field = array(), $where = array('institute_id'=>$int_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('course_institute_id'=>'DESC'), $start = '', $end = '');

      $data['institute_details']= $this->common_model->common($table_name = 'tbl_institute', $field = array(), $where = array('id'=>$int_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      $data['selected_inst_id']= $int_id;
 
 $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu');
  $this->load->view('institution/institution_course_list',$data);
  $this->load->view('template/adminfooter_category');

    }
    else{
      $this->session->set_flashdata('err_msg','Please seclect anyy Institute');
      redirect('index.php/manage_institution/inst_list/','refresh');

    }
}

function add_course()
{
 if(get_cookie('session_user_id')!='')
    {
      $user_id= get_cookie('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }
    $int_id= $this->uri->segment(3);
    if($int_id!='')
    {
      $data['parent_exam_type']=$this->admin_model->selectone('tbl_exam_type','exam_type_id','0');
      $data['institute_details']= $this->common_model->common($table_name = 'tbl_institute', $field = array(), $where = array('id'=>$int_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      $data['selected_inst_id']= $int_id;
 
 $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu');
  $this->load->view('institution/institution_course_add',$data);
  $this->load->view('template/adminfooter_category');

    }
    else{
      $this->session->set_flashdata('err_msg','Please seclect anyy Institute');
      redirect('index.php/manage_institution/inst_list/','refresh');

    }
}
function add_couse_exam_action()
{
  $selected_inst_id= $this->input->post('selected_inst_id');
  $exam_name= $this->input->post('exam_name');
  $parent_cat= $this->input->post('parent_cat');

  $insert_data= array(
    'course_id'=>$parent_cat,
    'examination_id'=>$exam_name,
    'institute_id'=>$selected_inst_id,
    'status'=>'active'
  );
$this->db->insert('tbl_course_institute', $insert_data);
$this->session->set_flashdata('succ_msg','Data successfuly deleted');
redirect('index.php/manage_institution/course_lst/'.$selected_inst_id,'refresh');

}
function course_exam_delete()
{
  $inst_course_id= $this->uri->segment(3);
  $selected_inst_id=  $this->uri->segment(4);
  $this->db->where('course_institute_id', $inst_course_id);
  $this->db->delete('tbl_course_institute');
  $this->session->set_flashdata('succ_msg','Data successfuly inserted');
redirect('index.php/manage_institution/course_lst/'.$selected_inst_id,'refresh');

}
function add_institute()
    {

        if(get_cookie('session_user_id')!='')
        {
          $user_id= get_cookie('session_user_id');
        }
        else
        {
          redirect('index.php/login','refresh');
        }

        
     $data['countries']=$this->common_model->common($table_name = 'countries', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  
          
    $data['inst_level']=$this->common_model->common($table_name = 'tbl_institute_level', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

          

          $this->load->view('template/admin_header');
          $this->load->view('template/admin_leftmenu');
          $this->load->view('institution/inst_add_view',$data);
          $this->load->view('template/adminfooter_category');

    }




    function insert_inst()
    {

      if(get_cookie('session_user_id')!='')
      {
        $user_id= get_cookie('session_user_id');
      }
      else
      {
        redirect('index.php/login','refresh');
      }

      $inst_level=$this->input->post('inst_level');     
      $institute=$this->input->post('institute');

      $institute_slug=$this->create_slug($institute);
     
      $management=$this->input->post('management');

      // print_r($video_link); 
      $country1=$this->input->post('country1');
      
     
      $state=$this->input->post('state');
      $city=$this->input->post('city');
      $address=$this->input->post('address');
      $total_seat=$this->input->post('total_seat');
      $about=$this->input->post('about');

       $image=NULL;
    if(($_FILES['image']['name'])!='')
    {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['image']['tmp_name'];
            $file = $_FILES['image']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif")
            {
                move_uploaded_file($file_tmp, "../assets/uploads/institute/" . $new_name . "." . $ext);

                $image = $new_name . "." . $ext;

                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/institute/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 1920;
                $img_config_4['height'] = 300;
                $img_config_4['new_image'] ='../assets/uploads/institute/' . $image;

                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();
              }
        }
    
      
    
      
      $current_date=date('Y-m-d H:i:s');
      
        $data = array(
            
            'inst_level_id'=>$inst_level,
            'institute_name'=>$institute,
            'management_of_inst'=>$management,
            
            'city'=>$city,
                      
            'state'=>$state,
            'country'=>$country1,
            'address'=>$address,            
            'total_seat'=>$total_seat,
            'created_date'=>$current_date,
            'created_by'=>$user_id,
            'slug'=>$institute_slug,
            'image'=>$image,
            'about_institute'=>$about     

            );
      
      
      $this->db->insert('tbl_institute',$data);

     
      $this->session->set_flashdata('succ_msg','added successfully');
      redirect('index.php/manage_institution/inst_list/','refresh');
    }


    public function fetch_city()
{
$state_id=$this->input->post('state_id');
$state_detail=$this->admin_model->selectOne('states','id',$state_id);
$state_id=@$state_detail[0]->id;
$city_list=$this->admin_model->selectOne('cities','state_id',$state_id);
echo json_encode(array('city_list'=>$city_list));
}

function fetch_state()
{
$country_name= $this->input->post('country_name');
$country_detail= $this->admin_model->selectOne('countries','id',$country_name);
$country_id=@$country_detail[0]->id;
$state_list= $this->admin_model->selectOne('states','country_id',$country_id);

//print_r($state_list);
echo json_encode(array('state_list'=>$state_list));
}


function edit_institute()
{
  $id=$this->uri->segment(3);

  $data['inst']=$this->common_model->common($table_name = 'tbl_institute', $field = array(), $where = array('id'=>$id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  $data['inst_level']=$this->common_model->common($table_name = 'tbl_institute_level', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  $data['countries']=$this->common_model->common($table_name = 'countries', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  

          $this->load->view('template/admin_header');
          $this->load->view('template/admin_leftmenu');
          $this->load->view('institution/inst_edit_view',$data);
          $this->load->view('template/adminfooter_category');


}


 function update_inst()
    {

      if(get_cookie('session_user_id')!='')
      {
        $user_id= get_cookie('session_user_id');
      }
      else
      {
        redirect('index.php/login','refresh');
      }

      $edit_id=$this->input->post('edit_id');     
      

      $inst_level=$this->input->post('inst_level');     
      $institute=$this->input->post('institute');

      $institute_slug=$this->create_slug($institute);



     
      $management=$this->input->post('management');

      // print_r($video_link); 
      $country1=$this->input->post('country1');
      
     
      $state=$this->input->post('state');
      $city=$this->input->post('city');
      $address=$this->input->post('address');
      $total_seat=$this->input->post('total_seat');
      $old_image=$this->input->post('old_image');
      $about=$this->input->post('about');




        if(($_FILES['image']['name'])=='')
    {
          $image=$old_image;
    }
    else
    {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['image']['tmp_name'];
            $file = $_FILES['image']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif")
            {
              if($old_image!='')
              {
                   unlink('../assets/uploads/institute/'.@$old_image);
              }
                move_uploaded_file($file_tmp, "../assets/uploads/institute/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;

                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/institute/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 1920;
                $img_config_4['height'] = 300;
                $img_config_4['new_image'] ='../assets/uploads/institute/' . $image;

                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();
              }
        }
    
      
    
      
      $current_date=date('Y-m-d H:i:s');
      
        $data = array(
            
            'inst_level_id'=>$inst_level,
            'institute_name'=>$institute,
            'management_of_inst'=>$management,
            
            'city'=>$city,
                      
            'state'=>$state,
            'country'=>$country1,
            'address'=>$address,            
            'total_seat'=>$total_seat,
            'edited_date'=>$current_date,
            'edited_by'=>$user_id,
            'slug'=>$institute_slug,       
            'image'=>$image,       
            'about_institute'=>$about,       

            );
      
      
      $this->db->where('id',$edit_id);
      $this->db->update('tbl_institute',$data);

     
      $this->session->set_flashdata('succ_msg','Updated successfully');
      redirect('index.php/manage_institution/inst_list/','refresh');
    }



    function inst_delete()
    {
      $id=$this->uri->segment(3);

      // print_r($id); exit;

      $this->db->where('id',$id);
      $this->db->delete('tbl_institute');

      $this->session->set_flashdata('succ_msg','Deleted successfully');
      redirect('index.php/manage_institution/inst_list/','refresh');
    }

    function change_to_active_inst()
    {
       $cat_ids=$this->input->post('catid');
    $status=$this->input->post('status');
    $data=array('status'=>$status);


    for($i=0;$i<count($cat_ids);$i++)
    {
      $id=$cat_ids[$i];
      $this->db->where('id',$id);

      if($this->db->update('tbl_institute',$data))
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

    function change_to_active_inst_course()
    {
       $cat_ids=$this->input->post('catid');
    $status=$this->input->post('status');
    $data=array('status'=>$status);


    for($i=0;$i<count($cat_ids);$i++)
    {
      $id=$cat_ids[$i];
      $this->db->where('course_institute_id',$id);

      if($this->db->update('tbl_course_institute',$data))
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




 
  
   


function inst_info()
{
  $info_id= $this->uri->segment(3);


  $data['inst_info']=$this->common_model->common($table_name = 'tbl_institute_info', $field = array(), $where = array('institute_id'=>$info_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


      $this->load->view('template/admin_header');
      $this->load->view('template/admin_leftmenu');
      $this->load->view('institution/institute_info',$data);
      $this->load->view('template/adminfooter_category');


  // print_r($info_id); exit;
}

function add_inst_info()
{
  $ins_id=$this->uri->segment(3);

  $data['ins_id']=$ins_id;

      $this->load->view('template/admin_header');
      $this->load->view('template/admin_leftmenu');
      $this->load->view('institution/info_add',$data);
      $this->load->view('template/adminfooter_category');
}


function insert_inst_info()
{
  
   if(get_cookie('session_user_id')!='')
      {
        $user_id= get_cookie('session_user_id');
      }
      else
      {
        redirect('index.php/login','refresh');
      }

  $inst_id=$this->input->post('inst_id');
  $info_1=$this->input->post('info_1');
  $info_2=$this->input->post('info_2');
  $info_3=$this->input->post('info_3');

  $data=array(
              'info_content_1'=>$info_1,
              'info_content_2'=>$info_2,
              'info_content_3'=>$info_3,
              'created_by'=>$user_id,
              'created_date'=>date('Y-m-d'),
              'institute_id'=>$inst_id


             );
  $this->db->insert('tbl_institute_info',$data);

      $this->session->set_flashdata('succ_msg','Inserted successfully');
      redirect('index.php/manage_institution/inst_info/'.$inst_id,'refresh'); 


}

function edit_institute_info()
{
  $edit_id=$this->uri->segment(3);
  $inst_id=$this->uri->segment(4);

  $data['inst_info']=$this->common_model->common($table_name = 'tbl_institute_info', $field = array(), $where = array('id'=>$edit_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  // print_r($inst_id); exit;

  $data['inst_id']=$inst_id;

      $this->load->view('template/admin_header');
      $this->load->view('template/admin_leftmenu');
      $this->load->view('institution/info_edit',$data);
      $this->load->view('template/adminfooter_category');

}


function update_inst_info()
{
  if(get_cookie('session_user_id')!='')
      {
        $user_id= get_cookie('session_user_id');
      }
      else
      {
        redirect('index.php/login','refresh');
      }

  $inst_id=$this->input->post('inst_id');
  $edit_id=$this->input->post('edit_id');
  $info_1=$this->input->post('info_1');
  $info_2=$this->input->post('info_2');
  $info_3=$this->input->post('info_3');

  $data=array(
              'info_content_1'=>$info_1,
              'info_content_2'=>$info_2,
              'info_content_3'=>$info_3,
              'edited_by'=>$user_id,
              'edited_date'=>date('Y-m-d'),
              


             );
  $this->db->where('id',$edit_id);
  $this->db->update( 'tbl_institute_info',$data);

      $this->session->set_flashdata('succ_msg','Updated successfully');
      redirect('index.php/manage_institution/inst_info/'.$inst_id,'refresh'); 
}

function info_delete()
{
  $delete_id=$this->uri->segment(3);

  $inst_id=$this->uri->segment(4);
  // print_r($inst_id); exit;

  $this->db->where('id',$delete_id);
  $this->db->delete('tbl_institute_info');


      $this->session->set_flashdata('succ_msg','Deleted successfully');
      redirect('index.php/manage_institution/inst_info/'.$inst_id,'refresh'); 


}


function change_to_active_information()
{

         $cat_ids=$this->input->post('catid');
    $status=$this->input->post('status');
    $data=array('status'=>$status);


    for($i=0;$i<count($cat_ids);$i++)
    {
      $id=$cat_ids[$i];
      $this->db->where('id',$id);

      if($this->db->update('tbl_institute_info',$data))
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




