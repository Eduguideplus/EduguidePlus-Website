<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_schedule_to_meet extends CI_Controller {
	
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


public function list_view()
{
  
  if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

  $data['active']='schedule_to_meet';

 $data['exam_type']=$this->common_model->common($table_name = 'tbl_shedule_to_meet', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  
  

  $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu',$data);
  $this->load->view('schedule_to_meet/schedule_to_meet_list_view',$data);
  $this->load->view('template/adminfooter_category');
  
  
}





    function delete_data()
    {
          $id=$this->uri->segment(3);

          
          

          
            $this->db->where('shedule_to_meet_id',$id);

            $this->db->delete('tbl_shedule_to_meet');
            
            $this->session->set_flashdata('succ_msg','deleted successfully.');
          
          
            redirect('index.php/manage_schedule_to_meet/list_view/','refresh');
    }





		
		
		
}
?>



