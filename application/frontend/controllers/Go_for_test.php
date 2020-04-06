<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Go_for_test extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

 		/* if($this->session->userdata('activeuser')!='')
		 {
			$user_id=$this->session->userdata('activeuser');
		}
		else
	 	{

	 	$this->session->set_flashdata('err_msg','Please login first');
	 	redirect($this->url->link(86));
	 	}*/

	 }
	
	public function index()
	{
		$user_id=$this->session->userdata('activeuser');
   

     // $home_data['services'] = $this->common_model->common($table_name = 'tbl_service_master', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$user_details= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$exam_date_expired='N';
		$curr_date= date('Y-m-d');




		$exam_expiry= $user_details[0]->expiry_date;
		if($exam_expiry!='')
		{
				if($exam_expiry<$curr_date)
				{
					$exam_date_expired='N';
				}
				else{
					$exam_date_expired='Y';
				}
		}
$data['exam_date_expired']=$exam_date_expired;

		$data['subject_list']= $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('section_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '0', $end = '1');

		$data['chapter_list']= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_status'=>'active','sub_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '0', $end = '12');

		$data['chapterwise_set_pattern']= $this->common_model->common($table_name = 'tbl_test_set_pattern', $field = array(), $where = array('test_select_name'=>'Chapterwise','exam_id'=>2), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$data['mega_set_pattern']= $this->common_model->common($table_name = 'tbl_test_set_pattern', $field = array(), $where = array('test_select_name'=>'Mega Comprehensive','exam_id'=>2), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$data['mini_set_pattern']= $this->common_model->common($table_name = 'tbl_test_set_pattern', $field = array(), $where = array('test_select_name'=>'Mini Comprehensive','exam_id'=>2), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


        



        $exam_id=$this->uri->segment(2);
		$data['exam_name_details']= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$data['subject_list']= $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('exam_id'=>$exam_id,'section_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');





		$this->load->view('common/header');
		$this->load->view('go_for_test', $data);
		$this->load->view('common/footer');
	}

	function proceed_to_chapter()
	{
		$data['subject_list']= $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('section_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '0', $end = '1');

		$data['chapter_list']= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_status'=>'active','sub_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '0', $end = '12');

		//echo '<pre>'; print_r($data['chapter_list']); exit;


		$this->load->view('common/header');
		$this->load->view('chapter_list_view', $data);
		$this->load->view('common/footer');
	}

	function q_bank_chapterlist()
	{


 		if($this->session->userdata('activeuser')!='')
		 {
			$user_id=$this->session->userdata('activeuser');
		}
		else
	 	{

	 	$this->session->set_flashdata('err_msg','Please login first');
	 	redirect($this->url->link(86));
	 	}
		$data['subject_list']= $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('section_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '0', $end = '1');

		$data['chapter_list']= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_status'=>'active','sub_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '0', $end = '12');

		//echo '<pre>'; print_r($data['chapter_list']); exit;


		$this->load->view('common/header');
		$this->load->view('qbank_chapter_list', $data);
		$this->load->view('common/footer');
	}
	
	


	
}
?>