<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 

{	

	 

	 public function __construct()

     {

          parent::__construct();



	 }

	

	public function index()

	{

		

   



      $home_data['testimonial'] = $this->common_model->common($table_name = 'tbl_testimonial', $field = array(), $where = array('testimonial_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



       $home_data['company'] = $this->common_model->common($table_name = 'tbl_company', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



        $home_data['blog'] = $this->common_model->common($table_name = 'tbl_blog', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('blog_id'=>'DESC'), $start = '0', $end = '3');

        //print_r( $home_data['blog']);exit;



        $home_data['attempted_question'] = $this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



         $home_data['attempted_paper'] = $this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



          

 $home_data['group_exam']=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('status'=>'Active','exam_type_id'=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');





$home_data['records']=$this->common_model->common($table_name = 'tbl_records', $field =array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



$home_data['vocabulary']=$this->common_model->common($table_name = 'tbl_english_vocabulary', $field =array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array('title_id'=>'RANDOM'), $start = '', $end = '');



           $home_data['notification'] = $this->common_model->common($table_name = 'tbl_notification', $field = array(), $where = array('notification_status'=>'Y'), $where_or = array(), $like = array(), $like_or = array(), $order = array('notification_id'=>'desc'), $start = '', $end = '');





 $home_data['test_type'] = $this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');







      $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



      $home_data['exam_details']=$this->common_model->common($table_name ='tbl_about_exam', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



      



      $home_data['slider']=$this->common_model->common($table_name ='tbl_slider', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      $home_data['welcome_content']=$this->common_model->common($table_name ='tbl_welcome_content', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


     $home_data['our_experties_list']=$this->common_model->common($table_name ='tbl_our_experties', $field = array(), $where = array(), $where_or = array('status'=>'active'), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

     $home_data['news_notice_list']=$this->common_model->common($table_name ='tbl_news_notice', $field = array(), $where = array(), $where_or = array('status'=>'active'), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');

     $home_data['events_list']=$this->common_model->common($table_name ='tbl_events', $field = array(), $where = array(), $where_or = array('status'=>'active'), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');




      $home_data['home_content']=$this->common_model->common($table_name ='tbl_home', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



      $home_data['material']=$this->common_model->common($table_name = 'tbl_study_material', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '0', $end = '4');



 		$home_data['my_firm']=$this->common_model->common($table_name = 'tbl_welcome_content', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



 		$home_data['why_us']=$this->common_model->common($table_name = 'tbl_why_us', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



 		$home_data['philosophy']=$this->common_model->common($table_name = 'tbl_philosophy', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



 		$home_data['service']=$this->common_model->common($table_name = 'tbl_service_basket', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('sort_order'=>'ASC'), $start = '', $end = '');





 		$home_data['articles_list'] = $this->common_model->common($table_name = 'tbl_blog', $field = array(), $where = array('blog_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array('blog_id'=>'desc'), $start = '0', $end = '6');







	

		$this->load->view('common/header');

		$this->load->view('manage_home/home_view',$home_data);

		$this->load->view('common/footer',$foot_data);

	}

	

	





	

}

?>