<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manage_gallery extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   

     

		$cat_id=$this->uri->segment(2);

		$data['gallery_cat_details']= $this->common_model->common($table_name = 'tbl_gallery_category', $field = array(), $where = array('cat_id'=>@$cat_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		


		$data['gallery_image_list'] = $this->common_model->common($table_name = 'tbl_gallery', $field = array(), $where = array('cat_id'=>@$cat_id,'type'=>'image','status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$data['gallery_video_list'] = $this->common_model->common($table_name = 'tbl_gallery', $field = array(), $where = array('cat_id'=>@$cat_id,'type'=>'video','status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    

	
		$this->load->view('common/header');
		$this->load->view('gallery',$data);
		$this->load->view('common/footer');
	}

	
	
	


	
}
?>