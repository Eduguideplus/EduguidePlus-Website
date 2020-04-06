<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();
          $this->load->model('join_model');

	 }
	
	public function index()
	{
		
   

      
		 $test_type=$this->uri->segment(2);
		 $current_date=date('Y-m-d');

	$data['test_dtls'] = $this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id'=>$test_type), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

if($test_type==4){

	$data['set_list'] = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('test_type'=>$test_type,'status'=>'active','exam_date >='=>date('Y-m-d')), $where_or = array(), $like = array(), $like_or = array(), $order = array('exam_date'=>'asc'), $start = '0', $end = '3');
	 // echo $test_type;
}else{


		$data['set_list'] = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('test_type'=>$test_type,'status'=>'active','exam_date >='=>date('Y-m-d')), $where_or = array(), $like = array(), $like_or = array(), $order = array('exam_date'=>'asc'), $start = '0', $end = '3');
}



    $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    // print_r( $data['set_list']);exit;

	
		$this->load->view('common/header');
		$this->load->view('test',$data);
		$this->load->view('common/footer',$foot_data);
	}
	
	
	public function join_view()
	{


		$set_slug=$this->uri->segment(2);
		
   
		$usr=$this->session->userdata('activeuser');
		if($usr!='')
		{
			 $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			 $data['set_dtls'] = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('set_slug'=>$set_slug), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			 $test_type=@$data['set_dtls'][0]->test_type;

			  $data['test_type_dtls'] = $this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id'=>$test_type), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			   $data['user_plan'] = $this->join_model->get_current_active_plan($usr,$test_type);

	
			$this->load->view('common/header');
			$this->load->view('join',$data);
			$this->load->view('common/footer',$foot_data);
		}
		else
		{
			$step='gotojoin';
			$this->session->set_userdata('come_from',$step);
			$this->session->set_userdata('set_slug',$set_slug);
			redirect($this->url->link(86));
		}
      

     
	}

	public function exam_join_action()
	{
		$usr=$this->session->userdata('activeuser');
		if($usr!='')
		{
		 $set_id=$this->input->post('set_id');
		 $user_plan_id=$this->input->post('plan_id');

		  $set_dtls=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		  $test_type=@$set_dtls[0]->test_type;

	 $user_knowledge=$this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>$usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		 $data_arr=array(
						
						'user_id'=>$usr,
						'set_id'=>$set_id,
						'user_plan_id'=>$user_plan_id,
						'test_type'=>$test_type,
						'created_on'=>date('Y-m-d,H:i:s'),
						'created_by'=>$usr
                        );
		 if(count($user_knowledge)>0){
		 	$this->db->where('set_id',$set_id);
		 	$this->db->update('tbl_user_knowledge_quiz',$data_arr);
		 }else{
		  $this->db->insert('tbl_user_knowledge_quiz',$data_arr);	
		 }

		

		 $user_plan=$this->common_model->common($table_name = 'tbl_user_plan', $field = array(), $where = array('id'=>$user_plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		 $remaining_test=@$user_plan[0]->remaining_qty;
		 $new_remaining_qty=$remaining_test-1;

		 $data_user_plan=array(
		 	                   'remaining_qty'=>$new_remaining_qty,
		 	                   'modified_on'=>date('Y-m-d H:i:s')
		                      );
		 
		 //print_r($data_user_plan);exit;
		 $this->db->where('id',$user_plan_id);
		 $this->db->update('tbl_user_plan',$data_user_plan);

  $test_dtls=$this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id'=>$test_type), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

// $data_payment_report=array(
// 	                       'user_id'=>$usr,
//                            'payment_amount'=>@$set_dtls[0]->exam_fees,
//                            'payment_for'=>'Exam Joining of '.@$test_dtls[0]->test_name,
//                            'payment_done_on'=>date('Y-m-d H:i:s')
//                            );

// $this->db->insert('tbl_user_payment_report',$data_payment_report);


	$this->session->set_flashdata('succ_msg','You have been enrolled to this examination successfully');
		 redirect($this->url->link(95));
		//exit;
		}
		else
		{
			 redirect($this->url->link(86));
		}	

}

public function instruction_view()
{

	if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}

	$usr=$this->session->userdata('activeuser');
	 $set_slug=$this->uri->segment(2);
	 $data['set_dtls']=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('set_slug'=>$set_slug), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	 $exam_date=@$data['set_dtls'][0]->exam_date;
	 $exam_time=@$data['set_dtls'][0]->exam_time; 
	 // echo '<pre>';

// print_r($data['set_dtls']); exit;
$data['test_type'] = $this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id'=>$data['set_dtls'][0]->test_type), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['exam_type'] = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$data['set_dtls'][0]->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



$data['subject'] = $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$data['set_dtls'][0]->subject_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['user_knw_plan'] = $this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('user_id'=>$usr,'set_id'=>@$data['set_dtls'][0]->kq_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	// echo $current_date=date('Y-m-d');
	 //echo $current_time=date('H:i');
	 $data['instruct']=$this->common_model->common($table_name = 'tbl_instruction', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	 $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	 $data['chapter_det']=$this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_id'=>@$data['set_dtls'][0]->chap_id,'sub_id'=>@$data['set_dtls'][0]->subject_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


	$this->load->view('common/header');
	$this->load->view('instruction',$data);
	$this->load->view('common/footer',$foot_data);
}
	

public function knockout_instruction_view()
{

	if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}

	$usr=$this->session->userdata('activeuser');
	 $set_slug=$this->uri->segment(2);
	 $data['set_dtls']=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('set_slug'=>$set_slug), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	 $exam_date=@$data['set_dtls'][0]->exam_date;
	 $exam_time=@$data['set_dtls'][0]->exam_time; 
	 // echo '<pre>';

// print_r($data['set_dtls']); exit;
$data['test_type'] = $this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id'=>$data['set_dtls'][0]->test_type), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['exam_type'] = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$data['set_dtls'][0]->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



$data['subject'] = $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$data['set_dtls'][0]->subject_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['user_knw_plan'] = $this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('user_id'=>$usr,'set_id'=>@$data['set_dtls'][0]->kq_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	// echo $current_date=date('Y-m-d');
	 //echo $current_time=date('H:i');
	 $data['instruct']=$this->common_model->common($table_name = 'tbl_instruction', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	 $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	 $data['chapter_det']=$this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_id'=>@$data['set_dtls'][0]->chap_id,'sub_id'=>@$data['set_dtls'][0]->subject_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


	$this->load->view('common/header');
	$this->load->view('knockout_instruction',$data);
	$this->load->view('common/footer',$foot_data);
}
	
	
}
?>