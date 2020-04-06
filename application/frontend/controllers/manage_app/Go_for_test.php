<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Go_for_test extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

 		

	 }
	
	public function subjectwise_exam()
	{
		

        
		$json =  file_get_contents('php://input');
    	$obj  =  json_decode($json);


        $exam_id=$obj->exam_id;

        $exam_details= array();
        $subject_test_list= array();

		$data['exam_name_details']= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		foreach($data['exam_name_details'] as $res)
		{
			$resaray['exam_id']=$res->id;
      		$resaray['description']=$res->description;
      		$resarray['exam_name']=$res->exam_name;

      		array_push($exam_details, $resarray);
		}

		$data['subject_list']= $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('exam_id'=>$exam_id,'section_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		 foreach($data['subject_list'] as $row){

         $test_list = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('exam_id'=>@$row->exam_id,'subject_id'=>@$row->id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

         $test_array=array();

         if(count($test_list)>0)
         {
         	$istest= 1;
         }
         else{
         	$istest=0;
         }

         foreach($test_list as $test_row)
         {

         	$test_rowarray['kq_id']=$test_row->kq_id;
         	$test_rowarray['set_slug']=$test_row->set_slug;
         	$test_rowarray['set_name']=$test_row->set_name;

         	array_push($test_array, $test_rowarray);

         }
         $rowarray['section_name']=$row->section_name;
         $rowarray['istest']=$istest;
         $rowarray['test_array']=$test_array;

         array_push($subject_test_list, $rowarray);

	}

	echo json_encode(array('exam_details'=>$exam_details,'subject_test_list'=>$subject_test_list));
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