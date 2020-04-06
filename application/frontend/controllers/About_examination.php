<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class About_examination extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   

      

      $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      $data['exam_details']=$this->common_model->common($table_name ='tbl_about_exam', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    


	
		$this->load->view('common/header');
		$this->load->view('about_examination',$data);
		$this->load->view('common/footer',$foot_data);
	}
	
	


	
}
?>