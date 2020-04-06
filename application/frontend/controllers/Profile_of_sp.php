<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_of_sp extends CI_Controller 

{	

	 

	public function __construct()

    {

          parent::__construct();

           $this->load->database();



	}



	public function index()

	{





          $data['our_services_approach'] = $this->common_model->common($table_name = 'tbl_our_services_approach', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



      $data['our_services_approach_content'] = $this->common_model->common($table_name = 'tbl_our_services_approach_content', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



      $data['whyus'] = $this->common_model->common($table_name = 'tbl_why_us', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	 
	 

	     



	    $this->load->view('common/header');

		$this->load->view('Profile_of_sp_view',$data);

		

		$this->load->view('common/footer');



	}



}

?>