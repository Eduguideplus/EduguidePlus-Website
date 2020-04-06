<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();
          $this->load->model('join_model');
          $this->load->model('common/custom_model');

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

	function create_slug($string)
  {     
        $replace = '-';         
        $string = strtolower($string);     
 
        //replace /995 995and . with white space     
        $string = preg_replace("/[\/\.]/", " ", $string);     
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);     
 
        //remove multiple dashes or whitespaces     
        $string = preg_replace("/[\s-]+/", " ", $string);     
 
        //convert whitespaces and underscore to $replace     
        $string = preg_replace("/[\s_]/", $replace, $string);     
 
        //limit the slug size     
        $string = substr($string, 0, 100);     
 
        //slug is generated     
        return $string; 
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

	public function get_question_list()
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
		$chap_id= $this->uri->segment(2);
		if($chap_id=='')
		{
			redirect($this->url->link(156));
		}
		else{

			$data['chapter_ifo_array']= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_id'=>$chap_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			
			$get_all_question= $this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('chap_id'=>$chap_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$quest_list_array=array();

			foreach($get_all_question as $row)
			{
					$quest_id= $row->id;

					$anwer_array= $this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$quest_id,'is_correct'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
					$rowarray['question_id']=$row->id;
					$rowarray['question']=strip_tags($row->question);
					$rowarray['answer']=@$anwer_array[0]->choice;
					array_push($quest_list_array, $rowarray);

			}

			$data['quest_list_array']=$quest_list_array;
			$this->load->view('common/header');
			$this->load->view('question_list_view', $data);
			$this->load->view('common/footer');
		}
	}

	public function comprehensive_join_action()
	{
			$compr_type= $this->uri->segment(2);
			$set_id='';
			if($compr_type!='')
			{
				if($this->session->userdata('activeuser')!='')
				{
					$user_id=$this->session->userdata('activeuser');
				}
				else
				{
					$this->session->set_userdata('chapterId', $compr_type);
					$this->session->set_userdata('come_from','comprehensive_join');
					$this->session->set_flashdata('err_msg','Please login first');
	 				redirect($this->url->link(86));
				}
				//-----------------creating set---------------------------//
				

				$sub_id= 1;

				

				$subject_details= $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$sub_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$exam_id= $subject_details[0]->exam_id;

				$exam_details= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$group_id= $exam_details[0]->exam_type_id;
				$test_type_id= 1; 

				if($compr_type=='mini')
				{

					$test_select_type= 'Mini Comprehensive';

				$chapterwise_set_pattern= $this->common_model->common($table_name = 'tbl_test_set_pattern', $field = array(), $where = array('test_select_name'=>'Mini Comprehensive','exam_id'=>2), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$no_of_question=$chapterwise_set_pattern[0]->no_of_question;
				$no_of_marks=$chapterwise_set_pattern[0]->no_of_marks;
				$total_marks=$chapterwise_set_pattern[0]->total_marks;
				$time_question_second=$chapterwise_set_pattern[0]->time_question_second;
				$total_time=$chapterwise_set_pattern[0]->total_time;

				$total_time_sec=$time_question_second*$no_of_question;

				$actual_name='MINICOMPR-'.time();
				$set_slug= $this->create_slug($actual_name);


				$data_set=array(
                'set_name'          =>$actual_name,
                'set_slug'          =>$set_slug,
                'test_type'         =>$test_type_id,
                'group_id'          =>$group_id,
                'exam_id'           =>$exam_id,
                'subject_id'        =>$sub_id,
                'q_qty'             =>$no_of_question,
                'exam_date'         =>date('Y-m-d'),
               	'test_select_type'	=>'Mini Comprehensive',
                'total_marks'       =>$total_marks,
                'exam_duration'     =>$total_time_sec,
                'reg_start_date'    =>date('Y-m-d'),
                'reg_closing_date'  =>date('Y-m-d'),
                'exam_fees'         =>0,
                'set_code'          =>$actual_name,
                'exam_instruction'  =>'Mini Comprehensive Mock Test',
                'status'			=>'active',
                'created_on'        =>date('Y-m-d'),
                'created_by'        =>$user_id



            );
           $this->db->insert('tbl_knowledge_qiuz_set', $data_set);
           $set_id=$this->db->insert_id();

            $chapter_qty= $no_of_question-3;
            $rest_qty= 3; 
            //-------------------getting question from selected chapter-----//

             $thirteenth_chapter_detais= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('chap_id'=>'DESC'), $start = '1', $end = '13');

            $thirteenth_chapter_id= @$thirteenth_chapter_detais[0]->chap_id;

            $all_chapter_detais= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('chap_id'=>'DESC'), $start = '', $end = '');

            $last_chapter_id= @$all_chapter_detais[0]->chap_id;

            
            $data_qs= $this->custom_model->get_question_for_mini_by_chap($test_type_id,$sub_id,$chapter_qty,$thirteenth_chapter_id,$last_chapter_id);

            //echo '<pre>'; print_r($data_qs); exit;

           

            //----------------getting 13th chapter------------------//

            $thirteenth_chapter_detais= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('chap_id'=>'DESC'), $start = '1', $end = '13');

            $thirteenth_chapter_id= $thirteenth_chapter_detais[0]->chap_id;



			//------------getting rest question from 13th no chapter-------//
			$data_rest_qs= $this->custom_model->get_question_by_type_chapter($test_type_id,$sub_id,$thirteenth_chapter_id,$rest_qty);

		//echo '<pre>'; print_r($data_rest_qs);exit;

		if($set_id!='')
		{
			foreach($data_qs as $res)
			{
				 $data_dtls=array(
				'set_id'    =>$set_id,
                'que_id'    =>$res->id,
                'created_by'=>$user_id,
                'created_on'=>date('Y-m-d')

            );
            $this->db->insert('tbl_knowledge_quiz_set_dtls',$data_dtls);
			}

			foreach($data_rest_qs as $qes)
			{
				 $restdata_dtls=array(
				'set_id'    =>$set_id,
                'que_id'    =>$qes->id,
                'created_by'=>$user_id,
                'created_on'=>date('Y-m-d')
				);
           	 $this->db->insert('tbl_knowledge_quiz_set_dtls',$restdata_dtls);
			}
		}

		//----------------join user and test-----------------------//

		$user_knowladge_id='';

		$user_knowledge=$this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		 $data_arr=array(
						
						'user_id'=>$user_id,
						'set_id'=>$set_id,
						'user_plan_id'=>0,
						'test_type'=>$test_type_id,
					
						'test_select_type'=>'Mini Comprehensive',
						'created_on'=>date('Y-m-d,H:i:s'),
						'created_by'=>$user_id
                        );
		 if(count($user_knowledge)>0)
		 {
		 	$this->db->where('set_id',$set_id);
		 	$this->db->update('tbl_user_knowledge_quiz',$data_arr);


		 }
		 else
		 {
		  	$this->db->insert('tbl_user_knowledge_quiz',$data_arr);	
		 }

		 redirect($this->url->link(143).'/'.$set_id.'/'.$set_slug);

	}
	else{
		$test_select_type= 'Mega Comprehensive';

				$chapterwise_set_pattern= $this->common_model->common($table_name = 'tbl_test_set_pattern', $field = array(), $where = array('test_select_name'=>'Mega Comprehensive','exam_id'=>2), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$no_of_question=$chapterwise_set_pattern[0]->no_of_question;
				$no_of_marks=$chapterwise_set_pattern[0]->no_of_marks;
				$total_marks=$chapterwise_set_pattern[0]->total_marks;
				$time_question_second=$chapterwise_set_pattern[0]->time_question_second;
				$total_time=$chapterwise_set_pattern[0]->total_time;

				$total_time_sec=$time_question_second*$no_of_question;

				$actual_name='MEGACOMPR-'.time();
				$set_slug= $this->create_slug($actual_name);


				$data_set=array(
                'set_name'          =>$actual_name,
                'set_slug'          =>$set_slug,
                'test_type'         =>$test_type_id,
                'group_id'          =>$group_id,
                'exam_id'           =>$exam_id,
                'subject_id'        =>$sub_id,
                'q_qty'             =>$no_of_question,
                'exam_date'         =>date('Y-m-d'),
               	'test_select_type'	=>'Mega Comprehensive',
                'total_marks'       =>$total_marks,
                'exam_duration'     =>$total_time_sec,
                'reg_start_date'    =>date('Y-m-d'),
                'reg_closing_date'  =>date('Y-m-d'),
                'exam_fees'         =>0,
                'set_code'          =>$actual_name,
                'exam_instruction'  =>'Mega Comprehensive Mock Test',
                'status'			=>'active',
                'created_on'        =>date('Y-m-d'),
                'created_by'        =>$user_id



            );
         $this->db->insert('tbl_knowledge_qiuz_set', $data_set);
         $set_id=$this->db->insert_id();

            $chapter_qty= $no_of_question-25;
            $rest_qty= 25; 
            //-------------------getting question from selected chapter-----//

             $thirteenth_chapter_detais= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('chap_id'=>'DESC'), $start = '1', $end = '13');

            $thirteenth_chapter_id= @$thirteenth_chapter_detais[0]->chap_id;

            $all_chapter_detais= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('chap_id'=>'DESC'), $start = '', $end = '');

            $last_chapter_id= @$all_chapter_detais[0]->chap_id;

            
            $data_qs= $this->custom_model->get_question_for_mini_by_chap($test_type_id,$sub_id,$chapter_qty,$thirteenth_chapter_id,$last_chapter_id);

            //echo '<pre>'; print_r($data_qs); exit;

           

            //----------------getting 13th chapter------------------//

            $thirteenth_chapter_detais= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('chap_id'=>'DESC'), $start = '1', $end = '13');

            $thirteenth_chapter_id= $thirteenth_chapter_detais[0]->chap_id;



			//------------getting rest question from 13th no chapter-------//
			$data_rest_qs= $this->custom_model->get_question_by_type_chapter($test_type_id,$sub_id,$last_chapter_id,$rest_qty);

		//echo '<pre>'; print_r($data_rest_qs);exit;

		if($set_id!='')
		{
			foreach($data_qs as $res)
			{
				 $data_dtls=array(
				'set_id'    =>$set_id,
                'que_id'    =>$res->id,
                'created_by'=>$user_id,
                'created_on'=>date('Y-m-d')

            );
            $this->db->insert('tbl_knowledge_quiz_set_dtls',$data_dtls);
			}

			foreach($data_rest_qs as $qes)
			{
				 $restdata_dtls=array(
				'set_id'    =>$set_id,
                'que_id'    =>$qes->id,
                'created_by'=>$user_id,
                'created_on'=>date('Y-m-d')
				);
           	 $this->db->insert('tbl_knowledge_quiz_set_dtls',$restdata_dtls);
			}
		}

		//----------------join user and test-----------------------//

		$user_knowladge_id='';

		$user_knowledge=$this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		 $data_arr=array(
						
						'user_id'=>$user_id,
						'set_id'=>$set_id,
						'user_plan_id'=>0,
						'test_type'=>$test_type_id,
					
						'test_select_type'=>'Mega Comprehensive',
						'created_on'=>date('Y-m-d,H:i:s'),
						'created_by'=>$user_id
                        );
		 if(count($user_knowledge)>0)
		 {
		 	$this->db->where('set_id',$set_id);
		 	$this->db->update('tbl_user_knowledge_quiz',$data_arr);


		 }
		 else
		 {
		  	$this->db->insert('tbl_user_knowledge_quiz',$data_arr);	
		 }

		 redirect($this->url->link(143).'/'.$set_id.'/'.$set_slug);
	}
				
	}
	else{
			redirect($this->url->link(131),'refresh');
		}

}

	public function exam_join_action()
	{
			$chapter_id= $this->uri->segment(2);
			$set_id='';
			if($chapter_id!='')
			{
				if($this->session->userdata('activeuser')!='')
				{
					$user_id=$this->session->userdata('activeuser');
				}
				else
				{
					$this->session->set_userdata('chapterId', $chapter_id);
					$this->session->set_userdata('come_from','chapter_join');
					$this->session->set_flashdata('err_msg','Please login first');
	 				redirect($this->url->link(86));
				}
				//-----------------creating set---------------------------//
				$chapter_details= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_id'=>$chapter_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$sub_id= $chapter_details[0]->sub_id;

				$chapter_name= $chapter_details[0]->chap_name;
				$chapternew_name= str_replace(' ', '-', $chapter_name);

				$subject_details= $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$sub_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$exam_id= $subject_details[0]->exam_id;

				$exam_details= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$group_id= $exam_details[0]->exam_type_id;
				$test_type_id= 1; 
				$test_select_type= 'Chapterwise';

				$chapterwise_set_pattern= $this->common_model->common($table_name = 'tbl_test_set_pattern', $field = array(), $where = array('test_select_name'=>'Chapterwise','exam_id'=>2), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$no_of_question=$chapterwise_set_pattern[0]->no_of_question;
				$no_of_marks=$chapterwise_set_pattern[0]->no_of_marks;
				$total_marks=$chapterwise_set_pattern[0]->total_marks;
				$time_question_second=$chapterwise_set_pattern[0]->time_question_second;
				$total_time=$chapterwise_set_pattern[0]->total_time;

				$total_time_sec=$time_question_second*$no_of_question;

				$actual_name='CHAP-'.$chapternew_name.'-'.time();
				$set_slug= $this->create_slug($actual_name);


				$data_set=array(
                'set_name'          =>$actual_name,
                'set_slug'          =>$set_slug,
                'test_type'         =>$test_type_id,
                'group_id'          =>$group_id,
                'exam_id'           =>$exam_id,
                'subject_id'        =>$sub_id,
                'chap_id'           =>$chapter_id,
                'q_qty'             =>$no_of_question,
                'exam_date'         =>date('Y-m-d'),
               	'test_select_type'	=>'Chapterwise',
                'total_marks'       =>$total_marks,
                'exam_duration'     =>$total_time_sec,
                'reg_start_date'    =>date('Y-m-d'),
                'reg_closing_date'  =>date('Y-m-d'),
                'exam_fees'         =>0,
                'set_code'          =>$actual_name,
                'exam_instruction'  =>'Chapterswise Mock Test',
                'status'			=>'active',
                'created_on'        =>date('Y-m-d'),
                'created_by'        =>$user_id



            );
           $this->db->insert('tbl_knowledge_qiuz_set', $data_set);
           $set_id=$this->db->insert_id();

            $chapter_qty= $no_of_question-3;
            $rest_qty= 3; 
            //-------------------getting question from selected chapter-----//
            
            $data_qs= $this->custom_model->get_question_by_type_chapter($test_type_id,$sub_id,$chapter_id,$chapter_qty);

           

            //----------------getting 13th chapter------------------//

            $thirteenth_chapter_detais= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('chap_id'=>'DESC'), $start = '1', $end = '13');

            $thirteenth_chapter_id= $thirteenth_chapter_detais[0]->chap_id;



			//------------getting rest question from 13th no chapter-------//
			$data_rest_qs= $this->custom_model->get_question_by_type_chapter($test_type_id,$sub_id,$thirteenth_chapter_id,$rest_qty);

		//echo '<pre>'; print_r($data_rest_qs);exit;

		if($set_id!='')
		{
			foreach($data_qs as $res)
			{
				 $data_dtls=array(
				'set_id'    =>$set_id,
                'que_id'    =>$res->id,
                'created_by'=>$user_id,
                'created_on'=>date('Y-m-d')

            );
            $this->db->insert('tbl_knowledge_quiz_set_dtls',$data_dtls);
			}

			foreach($data_rest_qs as $qes)
			{
				 $restdata_dtls=array(
				'set_id'    =>$set_id,
                'que_id'    =>$qes->id,
                'created_by'=>$user_id,
                'created_on'=>date('Y-m-d')
				);
           	 $this->db->insert('tbl_knowledge_quiz_set_dtls',$restdata_dtls);
			}
		}

		//----------------join user and test-----------------------//

		$user_knowladge_id='';

		$user_knowledge=$this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		 $data_arr=array(
						
						'user_id'=>$user_id,
						'set_id'=>$set_id,
						'user_plan_id'=>0,
						'test_type'=>$test_type_id,
						'chapter_id'=>$chapter_id,
						'test_select_type'=>'Chapterwise',
						'created_on'=>date('Y-m-d,H:i:s'),
						'created_by'=>$user_id
                        );
		 if(count($user_knowledge)>0)
		 {
		 	$this->db->where('set_id',$set_id);
		 	$this->db->update('tbl_user_knowledge_quiz',$data_arr);


		 }
		 else
		 {
		  	$this->db->insert('tbl_user_knowledge_quiz',$data_arr);	
		 }

		 redirect($this->url->link(117).'/'.$set_id.'/'.$set_slug);
	}
	else{
			redirect($this->url->link(135),'refresh');
		}

}

public function comprehensive_instruction_view()
{

	 $set_id=$this->uri->segment(2);

	if($this->session->userdata('activeuser')!='')
				{
					$user_id=$this->session->userdata('activeuser');
				}
				else
				{
					
					$this->session->set_flashdata('err_msg','Please login first');
	 				redirect($this->url->link(86));
				}

	$usr=$this->session->userdata('activeuser');

	$usr=$this->session->userdata('activeuser');

	$user_details= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$exam_date_expired='N';
		$curr_date= date('Y-m-d');




		$exam_expiry= $user_details[0]->expiry_date;
		if($exam_expiry!='')
		{
				if($exam_expiry<$curr_date)
				{
					$exam_date_expired='Y';
				}
				else{
					$exam_date_expired='N';
				}
		}
$data['exam_date_expired']=$exam_date_expired;

	
	 $data['set_dtls']=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	 $exam_date=@$data['set_dtls'][0]->exam_date;
	 $slug=@$data['set_dtls'][0]->set_slug;
	 
	
$data['test_type'] = $this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id'=>$data['set_dtls'][0]->test_type), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['exam_type'] = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$data['set_dtls'][0]->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



$data['subject'] = $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$data['set_dtls'][0]->subject_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['user_knw_plan'] = $this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('user_id'=>$usr,'set_id'=>@$data['set_dtls'][0]->kq_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

 

	  $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	  $time=time();
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$randstring = str_shuffle(@$characters);
    	

    	$token_char="a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,0,1,2,3,4,5,6,7,8,9";
    	$token_arr=explode(",",$token_char);
    	$token = '';
    	
		for ($i = 0; $i<5; $i++) 
		{
			$indx=mt_rand(0,35);
		    $token .= @$token_arr[$indx];
		    
		   
		}
		$this->session->set_userdata('token',$token);
		$exam_link=$slug.'/'.$token.'/'.$time.$randstring;
		$data['exam_ready']=@$exam_link;


	$this->load->view('common/header');
	$this->load->view('comprehensive_instruction',$data);
	$this->load->view('common/footer',$foot_data);
}

public function instruction_view()
{

	 $set_id=$this->uri->segment(2);

	if($this->session->userdata('activeuser')!='')
				{
					$user_id=$this->session->userdata('activeuser');
				}
				else
				{
					
					$this->session->set_flashdata('err_msg','Please login first');
	 				redirect($this->url->link(86));
				}

	$usr=$this->session->userdata('activeuser');

	$user_details= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$exam_date_expired='N';
		$curr_date= date('Y-m-d');




		$exam_expiry= $user_details[0]->expiry_date;
		if($exam_expiry!='')
		{
				if($exam_expiry<$curr_date)
				{
					$exam_date_expired='Y';
				}
				else{
					$exam_date_expired='N';
				}
		}
$data['exam_date_expired']=$exam_date_expired;

	
	 $data['set_dtls']=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	 $exam_date=@$data['set_dtls'][0]->exam_date;
	 $slug=@$data['set_dtls'][0]->set_slug;
	 
	
$data['test_type'] = $this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id'=>$data['set_dtls'][0]->test_type), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['exam_type'] = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$data['set_dtls'][0]->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



$data['subject'] = $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$data['set_dtls'][0]->subject_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['user_knw_plan'] = $this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('user_id'=>$usr,'set_id'=>@$data['set_dtls'][0]->kq_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

 $data['chapter_det']=$this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_id'=>@$data['set_dtls'][0]->chap_id,), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	  $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	  $time=time();
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$randstring = str_shuffle(@$characters);
    	

    	$token_char="a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,0,1,2,3,4,5,6,7,8,9";
    	$token_arr=explode(",",$token_char);
    	$token = '';
    	
		for ($i = 0; $i<5; $i++) 
		{
			$indx=mt_rand(0,35);
		    $token .= @$token_arr[$indx];
		    
		   
		}
		$this->session->set_userdata('token',$token);
		$exam_link=$slug.'/'.$token.'/'.$time.$randstring;
		$data['exam_ready']=@$exam_link;


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