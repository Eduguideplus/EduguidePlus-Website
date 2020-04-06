<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Downoadsfile extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   

      

      $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      $home_data['material']=$this->common_model->common($table_name = 'tbl_downloads', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');
	
		$this->load->view('common/header');
		$this->load->view('downloads_view',$home_data);
		$this->load->view('common/footer',$foot_data);
	}
	
	


	
}
?>