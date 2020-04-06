<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_single_ans extends CI_Controller {
  
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
  $this->load->model('set_model');
  
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
  //$data['set_no']=$this->set_model->pattern_unique('tbl_set');

  

  $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu');
  $this->load->view('answer/single_ans_list');
  $this->load->view('template/adminfooter_category');
  
  
}



}