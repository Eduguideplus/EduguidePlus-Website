<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_batch extends CI_Controller
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
    $this->load->model('common/common_model');      
}

function batch()
{
    if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        $data['batch']=$this->common_model->common($table_name = 'tbl_batch', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        $data['active']='manage_batch';

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('manage_batch/batch_table',$data);
    $this->load->view('template/adminfooter_category');
    
}


function add_batch()
    {
        if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        
    $data['faculty_details']=$this->admin_model->selectone('tbl_user','user_type_id','4');



     //$data['city_details']=$this->admin_model->selectone('cities','state_id','41');
    $data['country']=$this->admin_model->selectall('countries');

    $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu');
        $this->load->view('manage_batch/batch_add_view',$data);
        $this->load->view('template/adminfooter_category');
    }

      function get_state_by_country()
{
  $country_id= $this->input->post('country_id');

  

    $state_list= $this->common_model->common($table_name ='states', $field = array(), $where = array('country_id'=>$country_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    //echo "<pre>";print_r($state_list);exit;

    echo json_encode(array('state_list'=>$state_list));
}



function get_city_by_state()
{
  $state_id= $this->input->post('state_id');


    $city_list= $this->common_model->common($table_name ='cities', $field = array(), $where = array('state_id'=>$state_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    //echo "<pre>";print_r($state_list);exit;

    echo json_encode(array('city_list'=>$city_list));
}

    

    function insert()
    {

      if(get_cookie('session_user_id')!='')
      {
        $user_id= get_cookie('session_user_id');
      }
      else{
        redirect('index.php/login','refresh');
      }

       $user_id= get_cookie('session_user_id');
        
        $faculty_id=$this->input->post('faculty');
        $batch_country=$this->input->post('country');
        $batch_state=$this->input->post('state');
        $batch_city=$this->input->post('city');
        $batch_year=$this->input->post('batch_year');
        $batch_month=$this->input->post('batch_month');
        $batch_description=$this->input->post('batch_description');
        $current_date=date('Y-m-d H:i:s');
        
        // echo $batch_month;exit;

        $data = array(

           
            'created_date'=>$current_date,
            'created_by'=>$user_id,
            'faculty_id'=>$faculty_id,
            'batch_country'=>$batch_country,
            'batch_state'=>$batch_state,
            'batch_city'=>$batch_city,
            'batch_month'=>$batch_month,
            'batch_description'=>$batch_description,
            'batch_year'=>$batch_year
            
            );
        $this->db->insert('tbl_batch',$data); 
        $insert_id=$this->db->insert_id();

      $user_details=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$faculty_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
          $faculty_name=@$user_details[0]->user_name;

        $bach_details=$this->common_model->common($table_name = 'tbl_batch', $field = array(), $where = array('faculty_id'=>$faculty_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        $city_details=$this->common_model->common($table_name = 'cities', $field = array(), $where = array('id'=>$batch_city), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        $cityName= $city_details[0]->name; 
        $total_bach=count($bach_details);


          $month=$batch_month;

          $city=substr($cityName, 0,3);
          $in_city=strtoupper($city);
         $in_year=$batch_year;
         $faculty=substr($faculty_name, 0,4);
         $in_faculty=strtoupper($faculty);


         $count_num=strlen((string)$total_bach);
        
         if($count_num==1)
         {
          $no_of_batch='0'.$total_bach;
         }
         if($count_num==2)
         {
          $no_of_batch=$total_bach;
         }
         

         $count_munth=strlen((string)$month);
          if($count_munth==1)
          {
            $in_month='0'.$month;
          }
          else
          {
            $in_month=$month;
          }

         $final_batch_code=$in_city.$in_year.$in_month.$in_faculty.$no_of_batch;
    
        $bach_code=array('batch_name'=>$final_batch_code);
      
        $this->db->where('batch_id', $insert_id);
        $this->db->update('tbl_batch', $bach_code);
        
        $this->session->set_flashdata('succ_msg','One Batch added successfully');
        redirect('index.php/manage_batch/batch/','refresh');


    }


function change_to_active()
{
  
    $batch_id=$this->input->post('id');
    $status=$this->input->post('status');
    $data=array('batch_status'=>$status);


    for($i=0;$i<count($batch_id);$i++)
    {
      $id=$batch_id[$i];
      $this->db->where('batch_id',$id);

      if($this->db->update('tbl_batch',$data))
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


 function edit()

{
    if(get_cookie('session_user_id')!='')
    {
      $user_id= get_cookie('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

    $batch_id =$this->uri->segment(3);
    

    $data['batch']=$this->admin_model->selectone('tbl_batch','batch_id',$batch_id);

    $data['faculty_details']=$this->admin_model->selectone('tbl_user','user_type_id','4');

     $data['city_details']=$this->admin_model->selectone('cities','state_id','41');


    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('manage_batch/batch_edit_view',$data);
    $this->load->view('template/adminfooter_category');
}
function update()
{

    if(get_cookie('session_user_id')!='')
    {
      $user_id= get_cookie('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }
        $batch_id=$this->input->post('batch_id');
        $faculty_id=$this->input->post('faculty');
        $batch_city=$this->input->post('batch_city');
        $batch_year=$this->input->post('batch_year');
        $batch_month=$this->input->post('batch_month');
        $batch_description=$this->input->post('batch_description');
        $current_date=date('Y-m-d H:i:s');



        $user_details=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$faculty_id,'user_type_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
          $faculty_name=@$user_details[0]->user_name;

        $bach_details=$this->common_model->common($table_name = 'tbl_batch', $field = array(), $where = array('faculty_id'=>$faculty_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

         $city_details=$this->common_model->common($table_name = 'cities', $field = array(), $where = array('id'=>$batch_city), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        $cityName= $city_details[0]->name; 
        
        $total_bach=count($bach_details);


          $month=$batch_month;

          $city=substr($cityName, 0,3);
          $in_city=strtoupper($city);
         $in_year=$batch_year;
         $faculty=substr($faculty_name, 0,4);
         $in_faculty=strtoupper($faculty);


         $count_num=strlen((string)$total_bach);
        
         if($count_num==1)
         {
          $no_of_batch='0'.$total_bach;
         }
         if($count_num==2)
         {
          $no_of_batch=$total_bach;
         }
         

         $count_munth=strlen((string)$month);
          if($count_munth==1)
          {
            $in_month='0'.$month;
          }
          else
          {
            $in_month=$month;
          }

         $final_batch_code=$in_city.$in_year.$in_month.$in_faculty.$no_of_batch;

         $data = array(

            // 'batch_name'=>$final_batch_code,
             'edited_date'=>$current_date,
            'edited_by'=>$user_id,
            'faculty_id'=>$faculty_id,
            // 'batch_city'=>$batch_city,
            // 'batch_month'=>$batch_month,
            'batch_description'=>$batch_description
            // 'batch_year'=>$batch_year
            
            );
        
      
      $this->db->where('batch_id',$batch_id);
      $this->db->update('tbl_batch',$data);
      $this->session->set_flashdata('succ_msg','One Batch updated successfully.');
      redirect('index.php/manage_batch/batch/','refresh');

}

function delete()
{
    $id=$this->uri->segment(3);

    $sub = $this->admin_model->selectOne('tbl_batch','batch_id',$id);

            
                $this->db->where('batch_id',$id);

                $this->db->delete('tbl_batch');
                
                $this->session->set_flashdata('succ_msg','One batch deleted successfully.');
            
            
            redirect('index.php/manage_batch/batch/','refresh');

    
}

}