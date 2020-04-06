<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Articals_details extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   

     // $home_data['services'] = $this->common_model->common($table_name = 'tbl_service_master', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


		



		$blog_id=$this->uri->segment(2);


		$data['articles_details'] = $this->common_model->common($table_name = 'tbl_blog', $field = array(), $where = array('blog_id'=>@$blog_id,'blog_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


		$data['recent_articles_list'] = $this->common_model->common($table_name = 'tbl_blog', $field = array(), $where = array('created_on'=>date('Y-m-d'),'blog_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


		$data['blog_category_list'] = $this->common_model->common($table_name = 'tbl_blog_category', $field = array(), $where = array('status'=>'Active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



      

	
		$this->load->view('common/header');
		$this->load->view('articals_details_view',$data);
		$this->load->view('common/footer');
	}
	
	


	
}
?>