<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Services extends CI_Controller 
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



      $data['service'] = $this->common_model->common($table_name = 'tbl_our_service', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


      $pageSlug= $this->uri->segment(1);
   $get_route_id= $this->common_model->common($table_name = 'app_routes', $field = array(), $where = array('slug'=>$pageSlug), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

   $pageId= @$get_route_id[0]->id;



     $data['pageContent'] = $this->common_model->common($table_name = 'tbl_page_manage', $field = array(), $where = array('routes_id'=>$pageId), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	
		$this->load->view('common/header');
		$this->load->view('services_view',$data);
		$this->load->view('common/footer');
	}

	
	
	


	
}
?>