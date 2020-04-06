<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manage_articles extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   

     // $data['class_room'] = $this->common_model->common($table_name = 'tbl_class_room_training', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


	//	@$blog_title=$_GET['blog_title'];


          $category_id=$this->uri->segment(2);

		$data['articles_list'] = $this->common_model->common($table_name = 'tbl_blog', $field = array(), $where = array('category_id'=>$category_id,'blog_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array('blog_id'=>'desc'), $start = '', $end = '');


		$data['recent_articles_list'] = $this->common_model->common($table_name = 'tbl_blog', $field = array(), $where = array('created_on'=>date('Y-m-d'),'blog_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array('blog_id'=>'desc'), $start = '', $end = '');


		$data['blog_category_list'] = $this->common_model->common($table_name = 'tbl_blog_category', $field = array(), $where = array('status'=>'Active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    

	
		$this->load->view('common/header');
		$this->load->view('articles',$data);
		$this->load->view('common/footer');
	}




	public function search_blog()
  {



    $search_title = trim($this->input->get('blog_title'));
    

 // echo 'test';
    // echo $search_title; exit;

  

    if($search_title!=''){





      $this->db->select('*');
      $this->db->from('tbl_blog');
      $this->db->like('blog_title',$search_title);
      $this->db->where('blog_status','active');
      $this->db->order_by('blog_id', 'DESC');
      $query= $this->db->get();
      $data['articles_list']= $query->result();



  // echo count($data['blog_list']); 


 $data['recent_articles_list'] = $this->common_model->common($table_name = 'tbl_blog', $field = array(), $where = array('created_on'=>date('Y-m-d'),'blog_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array('blog_id'=>'desc'), $start = '', $end = '');


		$data['blog_category_list'] = $this->common_model->common($table_name = 'tbl_blog_category', $field = array(), $where = array('status'=>'Active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


  //  $data['popular_post_list'] = $this->common_model->common($table_name = 'tbl_blog', $field = array(), $where = array('popular_post'=>'yes','blog_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');




     $this->load->view('common/header');
    $this->load->view('articles',$data);
    $this->load->view('common/footer');

      
} 

}	
	
	


	
}
?>