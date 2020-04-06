<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_top_college extends CI_Controller {
	
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

  // $data['active']='manage_exam_type';

 $data['clg_header']=$this->common_model->common($table_name = 'tbl_top_college_header', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  
  

  $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu',$data);
  $this->load->view('top_colleges/college_header',$data);
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



    function add_college_header()
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
          $this->load->view('top_colleges/add_college_header');
          $this->load->view('template/adminfooter_category');

    }

    


     function college_header_insert()
    {

      if(get_cookie('session_user_id')!='')
      {
        $user_id= get_cookie('session_user_id');
      }
      else
      {
        redirect('index.php/login','refresh');
      }

     
      $header=$this->input->post('header');

      $header_slug=$this->create_slug($header);


      $current_date=date('Y-m-d H:i:s');
      
        $data = array(
            
                       
            'created_by'=>$user_id,
            'created_date'=>$current_date,
            'header'=>$header,
            'slug'=>$header_slug        

            );
      
      
      $this->db->insert('tbl_top_college_header',$data);

   
      $this->session->set_flashdata('succ_msg','added successfully');
      redirect('index.php/manage_top_college/index/','refresh');
    }




      function header_edit()
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
        

           $data['clg_header']=$this->common_model->common($table_name = 'tbl_top_college_header', $field = array(), $where = array('id'=>$id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


          $this->load->view('template/admin_header');
          $this->load->view('template/admin_leftmenu');
          $this->load->view('top_colleges/edit_college_header',$data);
          $this->load->view('template/adminfooter_category');

    }


       function college_header_update()
    {

      if(get_cookie('session_user_id')!='')
      {
        $user_id= get_cookie('session_user_id');
      }
      else
      {
        redirect('index.php/login','refresh');
      }

     
      $header=$this->input->post('header');
      $header_slug=$this->create_slug($header);

      $edit_id=$this->input->post('edit_id');

      $current_date=date('Y-m-d H:i:s');
      
        $data = array(
            
                       
            'edited_by'=>$user_id,
            'edited_date'=>$current_date,
            'header'=>$inst,
            'slug'=>$header_slug        

            );
      
      
      $this->db->where('header_id',$edit_id);
      $this->db->update('tbl_top_college_header',$data);

   
      $this->session->set_flashdata('succ_msg','Updated successfully');
      redirect('index.php/manage_top_college/index/','refresh');
    }

   function college_header_delete()
{
  $id=$this->uri->segment(3);

  

      
        $this->db->where('header_id',$id);

        $this->db->delete('tbl_top_college_header');

        
        
        $this->session->set_flashdata('succ_msg','deleted successfully.');
      
      
      redirect('index.php/manage_top_college/index/','refresh');

  
}



function change_to_active_college_header()
{
  
    $cat_ids=$this->input->post('catid');
    $status=$this->input->post('status');
    $data=array('status'=>$status);


    for($i=0;$i<count($cat_ids);$i++)
    {
      $id=$cat_ids[$i];
      $this->db->where('header_id',$id);

      if($this->db->update('tbl_top_college_header',$data))
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

//end top college header portion
///top collegs

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

 $data['top_clg']=$this->common_model->common($table_name = 'tbl_top_colleges', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  
  

  $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu');
  $this->load->view('top_colleges/institution_list',$data);
  $this->load->view('template/adminfooter_category');
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

        
     $data['header']=$this->common_model->common($table_name = 'tbl_top_college_header', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  
          
    $data['inst']=$this->common_model->common($table_name = 'tbl_institute', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


    $data['course']=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


          

          $this->load->view('template/admin_header');
          $this->load->view('template/admin_leftmenu');
          $this->load->view('top_colleges/inst_add_view',$data);
          $this->load->view('template/adminfooter_category');

    }




    function insert_top_college()
    {

      if(get_cookie('session_user_id')!='')
      {
        $user_id= get_cookie('session_user_id');
      }
      else
      {
        redirect('index.php/login','refresh');
      }

      $header=$this->input->post('header');     
      $college=$this->input->post('college');

      // $institute_slug=$this->create_slug($institute);
     
      $type=$this->input->post('type');

      // print_r($video_link); 
      $course=$this->input->post('course');
      
     
      $duration=$this->input->post('duration');
      

     
    
      
    
      
      $current_date=date('Y-m-d H:i:s');
      
        $data = array(
            
            'header_id'=>$header,
            'college_id'=>$college,
            'type'=>$type,
            
            'course'=>$course,
                      
            'duration'=>$duration,
            
            
            'created_on'=>$current_date,
            'created_by'=>$user_id,
               

            );
      
      
      $this->db->insert('tbl_top_colleges',$data);

     
      $this->session->set_flashdata('succ_msg','added successfully');
      redirect('index.php/manage_top_college/inst_list/','refresh');
    }


    public function fetch_city()
{
$state_id=$this->input->post('state_id');
$state_detail=$this->admin_model->selectOne('states','id',$state_id);
$state_id=@$state_detail[0]->id;
$city_list=$this->admin_model->selectOne('cities','state_id',$state_id);
echo json_encode(array('city_list'=>$city_list));
}

function fetch_college_type()
{
$college_name= $this->input->post('college_id');
// print_r($college_name); exit;
$clg_type_detail= $this->admin_model->selectOne('tbl_institute','id',$college_name);
$type_id=@$clg_type_detail[0]->id;
$state_list= $this->admin_model->selectOne('tbl_institute','id',$type_id);
$management_of_inst=$state_list[0]->management_of_inst;


// print_r($state_list); exit;
 echo json_encode(array('college_type'=>$management_of_inst));
}


function edit_top_college()
{
  $id=$this->uri->segment(3);

  // print_r($id); exit;

  $data['top']=$this->common_model->common($table_name = 'tbl_top_colleges', $field = array(), $where = array('top_college_id'=>$id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  $header_id= @$header[0]->header_id;
  $clg_id= @$header[0]->college_id;
  $course_id= @$header[0]->course;

   $data['header']=$this->common_model->common($table_name = 'tbl_top_college_header', $field = array(), $where = array('header_id'=>$header_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


  $data['inst']=$this->common_model->common($table_name = 'tbl_institute', $field = array(), $where = array('id'=>$clg_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


  $data['course']=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$course_id,'exam_type_id'=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  

          $this->load->view('template/admin_header');
          $this->load->view('template/admin_leftmenu');
          $this->load->view('top_colleges/inst_edit_view',$data);
          $this->load->view('template/adminfooter_category');


}


 function update_top_college()
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
      

      $header=$this->input->post('header');     
      $college=$this->input->post('college');

      // $institute_slug=$this->create_slug($institute);
     
      $type=$this->input->post('type');

      // print_r($video_link); 
      $course=$this->input->post('course');
      
     
      $duration=$this->input->post('duration');




  
    
      
    
      
      $current_date=date('Y-m-d H:i:s');
      
        $data = array(
            
              'header_id'=>$header,
            'college_id'=>$college,
            'type'=>$type,
            
            'course'=>$course,
                      
            'duration'=>$duration,
            
            
            'edited_on'=>$current_date,
            'edited_by'=>$user_id,       

            );
      
      
      $this->db->where('top_college_id',$edit_id);
      $this->db->update('tbl_top_colleges',$data);

     
      $this->session->set_flashdata('succ_msg','Updated successfully');
      redirect('index.php/manage_top_college/inst_list/','refresh');
    }



    function inst_delete()
    {
      $id=$this->uri->segment(3);

      // print_r($id); exit;

      $this->db->where('top_college_id',$id);
      $this->db->delete('tbl_top_colleges');

      $this->session->set_flashdata('succ_msg','Deleted successfully');
      redirect('index.php/manage_top_college/inst_list/','refresh');
    }

    function change_to_active_top_college()
    {
       $cat_ids=$this->input->post('catid');
    $status=$this->input->post('status');
    $data=array('status'=>$status);


    for($i=0;$i<count($cat_ids);$i++)
    {
      $id=$cat_ids[$i];
      $this->db->where('top_college_id',$id);

      if($this->db->update('tbl_top_colleges',$data))
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




