<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tools_details extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   

     // $data['class_room'] = $this->common_model->common($table_name = 'tbl_class_room_training', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		// $data['gallery_category_list'] = $this->common_model->common($table_name = 'tbl_gallery_category', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		// $data['gallery_tag_list'] = $this->common_model->common($table_name = 'tbl_gallery_tag', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    

	
		$this->load->view('common/header');
		$this->load->view('tools_details_view');
		$this->load->view('common/footer');
	}

	
	
	


	
}
?>