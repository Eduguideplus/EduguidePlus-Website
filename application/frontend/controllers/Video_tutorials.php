<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Video_tutorials extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   

     $data['class_room'] = $this->common_model->common($table_name = 'tbl_class_room_training', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');

     $data['material']=$this->common_model->common($table_name = 'tbl_study_material', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '0', $end = '4');

      $data['partner_details'] = $this->common_model->common($table_name = 'tbl_partner', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    // echo "<pre>;" ; print_r($partner_details);exit;
      $data['slider'] = $this->common_model->common($table_name = 'tbl_training_slider', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');




      $data['category_list'] = $this->common_model->common($table_name = 'tbl_video_tutorial_category', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



      $slug=$this->uri->segment(1);

        $app_routes=$this->common_model->common($table_name = 'app_routes', $field = array(), $where = array('slug'=>$slug), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



   
		$data['about_us']=$this->common_model->common($table_name = 'tbl_page_manage', $field = array(), $where = array('routes_id'=>$app_routes[0]->id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');




	
		$this->load->view('common/header');
		$this->load->view('video_category_view',$data);
		$this->load->view('common/footer');
	}

	public function video_list()
	{
		
   

     $data['class_room'] = $this->common_model->common($table_name = 'tbl_class_room_training', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');

     $data['material']=$this->common_model->common($table_name = 'tbl_study_material', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '0', $end = '4');

      $data['partner_details'] = $this->common_model->common($table_name = 'tbl_partner', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    // echo "<pre>;" ; print_r($partner_details);exit;
      $data['slider'] = $this->common_model->common($table_name = 'tbl_training_slider', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


       $data['video_list'] = $this->common_model->common($table_name = 'tbl_video_tutorial', $field = array(), $where = array('category_id'=>$this->uri->segment(2),'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	
		$this->load->view('common/header');
		$this->load->view('video_list_view',$data);
		$this->load->view('common/footer');
	}

	public function exam_details()
	{
		
   

     $data['class_room'] = $this->common_model->common($table_name = 'tbl_class_room_training', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');

     $data['material']=$this->common_model->common($table_name = 'tbl_study_material', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '0', $end = '4');

      $data['partner_details'] = $this->common_model->common($table_name = 'tbl_partner', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    // echo "<pre>;" ; print_r($partner_details);exit;
      $data['slider'] = $this->common_model->common($table_name = 'tbl_training_slider', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	
		$this->load->view('common/header');
		$this->load->view('exam_details_view',$data);
		$this->load->view('common/footer');
	}

	public function institute_details()
	{
		
   

     $data['class_room'] = $this->common_model->common($table_name = 'tbl_class_room_training', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');

     $data['material']=$this->common_model->common($table_name = 'tbl_study_material', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '0', $end = '4');

      $data['partner_details'] = $this->common_model->common($table_name = 'tbl_partner', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    // echo "<pre>;" ; print_r($partner_details);exit;
      $data['slider'] = $this->common_model->common($table_name = 'tbl_training_slider', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	
		$this->load->view('common/header');
		$this->load->view('institute_details_view',$data);
		$this->load->view('common/footer');
	}
	
	


	
}
?>