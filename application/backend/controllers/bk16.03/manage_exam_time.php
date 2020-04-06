<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_exam_time extends CI_Controller {
	
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

public function view()
{
  
  if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

  $data['exam']=$this->admin_model->selectOne('tbl_exam_type','exam_type_id','o');
  $data['exam_time']=$this->admin_model->selectAll('tbl_exam_time');
  
  $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu');
  $this->load->view('exam_time/exam_time_list',$data);
  $this->load->view('template/adminfooter_category');
  
  
}


public function add()
{
	
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

	$data['exam']=$this->admin_model->selectOne('tbl_exam_type','exam_type_id','o');
	
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('exam_time/add_exam_time',$data);
	$this->load->view('template/adminfooter_category');
	
	
}



    function insert()
    {

      if($this->session->userdata('session_user_id')!='')
      {
        $user_id= $this->session->userdata('session_user_id');
      }
      else{
        redirect('index.php/login','refresh');
      }
    	
    	$exam_id = $this->input->post('exam_id');
      $exam_time = $this->input->post('markstime');
      $negative = $this->input->post('negative_marks');
    	
      $current_date=date('Y-m-d H:i:s');
    	
    	
    	$data = array(

    				
    				'exam_id'=>$exam_id,
    				'time_per_marks'=>$exam_time,
            'negative_marks'=>$negative,
    				
    				
    				);
    	
    	//echo '<pre>'; print_r($data); exit;
      $chk_avail = $this->admin_model->selectOne('tbl_exam_time','exam_id',$exam_id);
      if(count($chk_avail)>0)
      {
        $this->session->set_flashdata('succ_msg','Already Inserted');
        redirect('index.php/manage_exam_time/view/','refresh');
      }
      else
      {
        $this->db->insert('tbl_exam_time',$data);
        $this->session->set_flashdata('succ_msg','Inserted Successfully');
        redirect('index.php/manage_exam_time/view/','refresh');
      }
    	
    	


    }


    function edit()

  {
    if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

    $edit_id =$this->uri->segment(3);
    

    $data['exam_time']=$this->admin_model->selectone('tbl_exam_time','id',$edit_id);


    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('exam_time/edit_exam_time',$data);
    $this->load->view('template/adminfooter_category');
}
function update()
{

    if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }
        $edit_id=$this->input->post('edit_id');

        $negative = $this->input->post('negative_marks');
        $time =$this->input->post('markstime');
        //$current_date=date('Y-m-d H:i:s');
        $data = array(

            
            'time_per_marks'=>$time,
             'negative_marks'=>$negative,
            
            );
      //echo '<pre>'; print_r($data); exit;
      $this->db->where('id',$edit_id);
      $this->db->update('tbl_exam_time',$data);
      $this->session->set_flashdata('succ_msg','Updated successfully.');
      redirect('index.php/manage_exam_time/view/','refresh');

}

function delete()
{
  $id=$this->uri->segment(3);

  $time = $this->admin_model->selectOne('tbl_exam_time','id',$id);

  if(count($time)!=0)
      {
      

      
        $this->db->where('id',$id);

        $this->db->delete('tbl_exam_time');
        
        $this->session->set_flashdata('succ_msg','Deleted successfully.');
      
      }
      redirect('index.php/manage_exam_time/view/','refresh');

  
}



		
		
		
}




