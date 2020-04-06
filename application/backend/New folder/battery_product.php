<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class battery_product extends CI_Controller {
	
public function __construct()
{
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
	$this->load->library('encrypt');
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->library('email');			
	$this->load->library('image_lib');
	//$this->load->model('login_model');	
		
}

public function view()
{
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
	else
		{
			redirect('index.php/login','refresh');
		}
	//$data['testimonial']=$this->admin_model->selectAll('tbl_testimonial');
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('battery_product');
	$this->load->view('template/adminfooter_category');	
}

public function get_make_by_type()
{
	$type= $this->input->post('type');

	// $capacity_list= $this->common->select($table_name='tbl_battery_make',$field=array(),$where=array('battery_pro_type_id'=>$type),$where_or=array(),$like=array(),$like_or=array(),$order=array('battery_make_name'=>'ASC'),$start='',$end='',$where_in_array=array());
    	
	$make_list= $this->common->select($table_name='tbl_battery_make',$field=array(),$where=array('battery_pro_type_id'=>$type),$where_or=array(),$like=array(),$like_or=array(),$order=array('battery_make_name'=>'ASC'),$start='',$end='',$where_in_array=array());

	echo json_encode(array('make'=>$make_list));
}


public function get_brand_by_type()
{
	$type= $this->input->post('type');

	$brand_list= $this->common->select($table_name='tbl_battery_brand',$field=array(),$where=array('battery_pro_type_id'=>$type),$where_or=array(),$like=array(),$like_or=array(),$order=array('battery_brand_name'=>'ASC'),$start='',$end='',$where_in_array=array());

	echo json_encode(array('brand'=>$brand_list));
}

public function add_battery()
{
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
	else
		{
			redirect('index.php/login','refresh');
		}

$data['product_type']= $this->common->select($table_name='tbl_product_type',$field=array(),$where=array(),$where_or=array(),$like=array(),$like_or=array(),$order=array());	


	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('add_battery',$data);
	$this->load->view('template/adminfooter_category');	
}

public function edit_battery()
{
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
	else
		{
			redirect('index.php/login','refresh');
		}
	//$data['testimonial']=$this->admin_model->selectAll('tbl_testimonial');
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('edit_battery');
	$this->load->view('template/adminfooter_category');	
}

public function specification()
{
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
	else
		{
			redirect('index.php/login','refresh');
		}
	//$data['testimonial']=$this->admin_model->selectAll('tbl_testimonial');
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('specification');
	$this->load->view('template/adminfooter_category');	
}
public function battery_details()
{
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
	else
		{
			redirect('index.php/login','refresh');
		}
	//$data['testimonial']=$this->admin_model->selectAll('tbl_testimonial');
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('battery_details');
	$this->load->view('template/adminfooter_category');	
}
}