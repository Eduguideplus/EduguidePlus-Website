<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mock_test extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();
          $this->load->model('join_model');

	 }
	
	public function index()
	{
		
   

				$active_usr=$this->session->userdata('activeuser');
				if($active_usr=='')
				{
					redirect($this->url->link(86));
				}
				else
				{
					 $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

					 $set_id=$this->uri->segment(2);


					 $data['set_dtls'] = $this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


					 $default_set=@$data['set_dtls'][0]->default_set;
					 if($default_set=='no')
					 {
					 	$user_plan_id=@$data['set_dtls'][0]->user_plan_id;
					 	$user_plan_details=$this->common_model->common($table_name = 'tbl_user_plan', $field = array(), $where = array('id'=>$user_plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
					 	$validity=@$user_plan_details[0]->plan_validity;
					 	$create_date=@$user_plan_details[0]->created_on;
					 	$start_dt = new DateTime($create_date);

						$date = $start_dt->format('Y-m-d');
						//echo $date;
						//$lastdate= date('Y-m-d', strtotime("+12 months", strtotime($date)));
						$lastdate= date('Y-m-d', strtotime("+".$validity." months", strtotime($date)));
						//echo $lastdate;exit;
						$current_date=date('Y-m-d');
						//echo strtotime($lastdate).'<br>'.strtotime($current_date);exit;

						if(strtotime($lastdate)<strtotime($current_date))
						{
							echo 'Your plan Validity has been expired';exit;
						}
					 }

					 $data['set_question'] = $this->common_model->common($table_name = 'tbl_question_set', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

					 $user_exam_dtls = $this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('user_id'=>$active_usr,'set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
					 $user_exam_id=@$user_exam_dtls[0]->id;

					 if(count($user_exam_dtls)>0)
					 {
					 	$status=@$user_exam_dtls[0]->exam_result;
					 	if($status=='promoted')
					 	{
					 		$user_exam_id=@$user_exam_dtls[0]->id;

					 		 $set_id=$this->uri->segment(2);


							 $data['set_dtls'] = $this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

							 $data['set_question'] = $this->common_model->common($table_name = 'tbl_question_set', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

							$this->load->view('common/header');
							$this->load->view('practicetest_complete',$data);
							$this->load->view('common/footer',$foot_data);

					 	}
					 	else
					 	{

					 		 $user_attempt_dtls = $this->common_model->common($table_name = 'tbl_practice_attempt', $field = array(), $where = array('user_test_id'=>$user_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
					 		 if(@$user_attempt_dtls[0]->wrong_attempt>0)
					 		 {
					 		 	shuffle( $data['set_question']);
					 		 }

					 		$this->load->view('common/header');
							$this->load->view('mocktest',$data);
							$this->load->view('common/footer',$foot_data);
					 	}
					 }
					 else
					 {
					 	$this->load->view('common/header');
						$this->load->view('mocktest',$data);
						$this->load->view('common/footer',$foot_data);
					 }

	
					
				}
      

     
	}

	function check_current_option()
	{
		$active_usr=$this->session->userdata('activeuser');
		if($active_usr!='')
		{
		$optn=$this->input->post('optn');
		$qstn=$this->input->post('qstn');
		$chapt=$this->input->post('chapt');
		$qset=$this->input->post('qset');
		$current_date_time=date('Y-m-d,H:i:s');

		$check_status=$this->join_model->check_option_status($qstn,$optn);
		//echo $check_status;

		$set_dtls = $this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('id'=>$qset), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		/*$set_qstn_list = $this->common_model->common($table_name = 'tbl_question_set', $field = array(), $where = array('set_id'=>$qset), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$firstq=@$set_qstn_list[0]->question_id; 
		$secondq=@$set_qstn_list[1]->question_id;
		$thirdq=@$set_qstn_list[2]->question_id;
*/

		$user_plan_id=@$set_dtls[0]->user_plan_id;
		$test_type_id=@$set_dtls[0]->test_type_id;

		if($test_type_id==1)
		{
			$each_marks=1;
		}
		$total_marks=$each_marks*3;

		$option_list = $this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$qstn), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$correct_choice='';

		for($i=0;$i<count($option_list);$i++)
		{
			if(@$option_list[$i]->is_correct=='Yes')
			{
				$correct_choice=@$option_list[$i]->id;
			}
		}

		if($correct_choice==$optn)
		{
			$is_correct='Yes';
		}
		else
		{
			$is_correct='No';
		}

		$user_exam_dtls = $this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('user_id'=>$active_usr,'set_id'=>$qset,'user_plan_id'=>$user_plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		if(count($user_exam_dtls)>0)
		{


			$user_exam_id=@$user_exam_dtls[0]->id;
			$attempt_count=@$user_exam_dtls[0]->attempt_count;

			$answer_list = $this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>$user_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			if(count($answer_list)==3)
			{
				$this->db->where('user_exam_id',$user_exam_id);
				$this->db->delete('tbl_user_exam_details');

				$data_user_exam=array(
					'obtained_marks'=>0.00,
					
					);
					$this->db->where('id',$user_exam_id);
					$this->db->update('tbl_user_exam',$data_user_exam);

					if($check_status==1)
					{
						

						$data_user_exam_detail=array(
						'user_exam_id'=>$user_exam_id,
						'question_master_id'=>$qstn,
						'selected_choice'=>$optn,
						'correct_choice'=>$correct_choice,
						'is_correct'=>$is_correct,
						'created_on'=>$current_date_time

						);

						$this->db->insert('tbl_user_exam_details',$data_user_exam_detail);

							$user_exam_dtls = $this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('id'=>$user_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

							$current_obtained_marks=@$user_exam_dtls[0]->obtained_marks;
							if($current_obtained_marks=='' || $current_obtained_marks==0)
							{
								$obtained_marks=$each_marks;
							}
							else
							{
								$obtained_marks=$current_obtained_marks+$each_marks;
							}
							
							$data_user_exam=array(
							'obtained_marks'=>$obtained_marks,
							
							);
							$this->db->where('id',$user_exam_id);
							$this->db->update('tbl_user_exam',$data_user_exam);

					}
					else
					{
							$wrong_count_check = $this->common_model->common($table_name = 'tbl_practice_attempt', $field = array(), $where = array('user_test_id'=>$user_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

							$prev_wrong_count=@$wrong_count_check[0]->wrong_attempt;

							$current_wrong_count=$prev_wrong_count+1;
							$data_wrong_count=array(
							
							'wrong_attempt'=>$current_wrong_count
					
							);
							$this->db->where('user_test_id',$user_exam_id);
							$this->db->update('tbl_practice_attempt',$data_wrong_count);


						$user_exam_dtls = $this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('id'=>$user_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

						$current_obtained_marks=@$user_exam_dtls[0]->obtained_marks;
						if($current_obtained_marks=='' || $current_obtained_marks==0)
						{
							$obtained_marks=-($each_marks*25/100);
						}
						else
						{
							$obtained_marks=$current_obtained_marks-($each_marks*25/100);
						}
						
						$data_user_exam=array(
						'obtained_marks'=>$obtained_marks,
						
						);

						$this->db->where('id',$user_exam_id);
						$this->db->update('tbl_user_exam',$data_user_exam);
					}
			}
			else
			{
				if($check_status==1)
				{
					$current_obtained_marks=@$user_exam_dtls[0]->obtained_marks;
					if($current_obtained_marks=='' || $current_obtained_marks==0)
					{
						$obtained_marks=$each_marks;
					}
					else
					{
						$obtained_marks=$current_obtained_marks+$each_marks;
					}
					
					$data_user_exam=array(
					'obtained_marks'=>$obtained_marks,
					
					);
					$this->db->where('id',$user_exam_id);
					$this->db->update('tbl_user_exam',$data_user_exam);

					$data_user_exam_detail=array(
					'user_exam_id'=>$user_exam_id,
					'question_master_id'=>$qstn,
					'selected_choice'=>$optn,
					'correct_choice'=>$correct_choice,
					'is_correct'=>$is_correct,
					'created_on'=>$current_date_time

					);

					$this->db->insert('tbl_user_exam_details',$data_user_exam_detail);
				}
				else
				{
					$current_obtained_marks=@$user_exam_dtls[0]->obtained_marks;
					if($current_obtained_marks=='' || $current_obtained_marks==0)
					{
						$obtained_marks=$each_marks-($each_marks*25/100);
					}
					else
					{
						$obtained_marks=$current_obtained_marks-($each_marks*25/100);
					}
					
					$data_user_exam=array(
					'obtained_marks'=>$obtained_marks,
					
					);

					$this->db->where('id',$user_exam_id);
					$this->db->update('tbl_user_exam',$data_user_exam);

					$wrong_count_check = $this->common_model->common($table_name = 'tbl_practice_attempt', $field = array(), $where = array('user_test_id'=>$user_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
					$prev_wrong_count=@$wrong_count_check[0]->wrong_attempt;

					$current_wrong_count=$prev_wrong_count+1;
					$data_wrong_count=array(
					
					'wrong_attempt'=>$current_wrong_count
			
					);
					$this->db->where('user_test_id',$user_exam_id);
					$this->db->update('tbl_practice_attempt',$data_wrong_count);



				}
			}
			

		}



		else
		{



			if($check_status==1)
			{
				$data_user_exam=array(
				'user_id'=>$active_usr,
				'set_id'=>$qset,
				'user_plan_id'=>$user_plan_id,
				'total_marks'=>$total_marks,
				'obtained_marks'=>$each_marks,
				'test_type'=>$test_type_id,
				'attempt_count'=>'10',
				'created_on'=>$current_date_time

				);
				$this->db->insert('tbl_user_exam',$data_user_exam);

				$user_exam_id=$this->db->insert_id();

				$data_user_exam_detail=array(
				'user_exam_id'=>$user_exam_id,
				'question_master_id'=>$qstn,
				'selected_choice'=>$optn,
				'correct_choice'=>$correct_choice,
				'is_correct'=>$is_correct,
				'created_on'=>$current_date_time

				);

				$this->db->insert('tbl_user_exam_details',$data_user_exam_detail);

				$data_wrong_count=array(
				'user_test_id'=>$user_exam_id,
				'wrong_attempt'=>'0',
		
				);

				$this->db->insert('tbl_practice_attempt',$data_wrong_count);

			}
			else
			{
				//$each_marks=$each_marks-($each_marks*25/100);
				$obtained_marks=-($each_marks*25/100);
				$data_user_exam=array(
				'user_id'=>$active_usr,
				'set_id'=>$qset,
				'user_plan_id'=>$user_plan_id,
				'obtained_marks'=>$obtained_marks,
				'total_marks'=>$total_marks,
				'test_type'=>$test_type_id,
				'attempt_count'=>'11',
				'created_on'=>$current_date_time

				);

				$this->db->insert('tbl_user_exam',$data_user_exam);
				$user_exam_id=$this->db->insert_id();

				$data_wrong_count=array(
				'user_test_id'=>$user_exam_id,
				'wrong_attempt'=>'1',
		
				);

				$this->db->insert('tbl_practice_attempt',$data_wrong_count);
			}
			
		}

		$user_exam_dtls = $this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('id'=>$user_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$user_exam_id=@$user_exam_dtls[0]->id;
		$total_mks=@$user_exam_dtls[0]->total_marks;
		$obt_mks=@$user_exam_dtls[0]->obtained_marks;
		if($total_mks==$obt_mks)
		{
			$data_stat=array('exam_result'=>'promoted');
			$this->db->where('id',$user_exam_id);
			$this->db->update('tbl_user_exam',$data_stat);
		}
		echo $check_status;
		


		}

		

}
	
	


	
}
?>