<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manage_exam extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();
          $this->load->library('form_validation');
          $this->load->library('email');
          $this->load->library('session');
          $this->load->library('m_pdf');   
          $this->load->helper('download');
	 }


	 function generate_random_set($knowledge_set_id)
   		{

   			$sets = $this->common_model->common($table_name = 'tbl_knowledge_quiz_set_dtls', $field = array(), $where = array('set_id'=>@$knowledge_set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	   		$set_ids=array();
			for($i=0;$i<count($sets);$i++)
			{
			    $set_ids[$i]=@$sets[$i]->dtls_id;

			}


			shuffle(@$set_ids);
			$set_qty=count(@$set_ids)-1;


			$random=mt_rand(0, @$set_qty);
			$selected_set_id=$set_ids[$random];

			return $selected_set_id;

   		}


	 public function get_random_set()
	 {
	 	$data['status']=0;
	 // 	if($this->session->userdata('activeuser')!='')
		// {
		// 	$user_id=$this->session->userdata('activeuser');
		// }
		// else
		// {
		// 	redirect($this->url->link(1));
		// }
		
   		$exam_id=$this->input->post('examid');
   		$user_plan_id=$this->input->post('userplan');
        $knowledge_set_id=$this->input->post('knowledge_set_id');
   

		
   		$random_set=$this->generate_random_set($knowledge_set_id);
// echo $random_set; exit;
   		$set_exist = $this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('user_id'=>@$user_id,'set_id'=>@$random_set), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

   		if(count(@$set_exist)>0)
   		{
   			$data['status']=0;
   			$data['exam_d']=$exam_id;
   			$data['userplan_id']=$user_plan_id;
   			//$this->get_random_set();

   		}
   		else
   		{
   			$data['status']=1;
   			$data['r_set']=$random_set;
   			
   		}


   		 echo json_encode(array('workdone'=>$data));
   		


	 }
	
	public function get_instruction_details()
	{
		/*if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}*/
		
   		$set=$this->input->post('set');
   		$user_plan_id=$this->input->post('userplan');

     
        $data['set_details'] = $this->join_model->get_knowledge_set_details($set);

        $exam_id=@$data['set_details'][0]->exam_id;
        $slug=@$data['set_details'][0]->set_slug;


        $marks=0;
        $set_question=$this->join_model->get_knowledge_set_question($set);
        $pass_ids=array();
        
        for($m=0;$m<count($set_question);$m++)
        {
        	$marks=$marks+$set_question[$m]->marks;
        	
        }
   /*     $passage_question=$this->join_model->get_knowledge_set_passage_question($set);
         for($m=0;$m<count($passage_question);$m++)
        {
        	$marks=$marks+$passage_question[$m]->marks;
        	
        }

        $qnt=0;
        for($i=0;$i<count($data['pattern']);$i++)
        {
        	$qnt=@$qnt+@$data['pattern'][$i]->quantity;

        }*/
      

        $time=time();
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$randstring = str_shuffle(@$characters);
    	
    	

		//$exam_link=$slug.'/'.$time.$randstring;

    	$token_char="a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,0,1,2,3,4,5,6,7,8,9";
    	$token_arr=explode(",",$token_char);
    	$token = '';
    	
		for ($i = 0; $i<5; $i++) 
		{
			$indx=mt_rand(0,35);
		    $token .= @$token_arr[$indx];
		    
		   
		}
		$this->session->set_userdata('token',$token);
		$exam_link=$slug.'/'.$token.'/'.$user_plan_id.'/'.$time.$randstring;
		$data['exam_ready']=@$exam_link;
		
		$data['instruct']=$this->common_model->common($table_name = 'tbl_instruction', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        $data['status']=1;
		

			
		
		 echo json_encode(array('workdone'=>$data));
        //print_r( $home_data['blog']);exit;
		 

       
	}


	public function get_resume_exam()
	{
		if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}
		
   		$set=$this->input->post('set');
   		$user_exam=$this->input->post('userexam');
   		$user_exam_details=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('id'=>$user_exam), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

   		$user_plan_id=@$user_exam_details[0]->user_plan_id;

      

        $data['set_details'] = $this->join_model->get_set_details($set);
        $exam_id=@$data['set_details'][0]->exam_id;
        $slug=@$data['set_details'][0]->set_slug;

        $data['pattern']=$this->common_model->common($table_name = 'tbl_set_pattern', $field = array(), $where = array('exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        $exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        $marks=0;
        $set_question=$this->join_model->get_set_question($set);
        $pass_ids=array();
        
        for($m=0;$m<count($set_question);$m++)
        {
        	$marks=$marks+$set_question[$m]->marks;
        	
        }
     /*   $passage_question=$this->join_model->get_knowledge_set_passage_question($set);
         for($m=0;$m<count($passage_question);$m++)
        {
        	$marks=$marks+$passage_question[$m]->marks;
        	
        }

        $qnt=0;
        for($i=0;$i<count($data['pattern']);$i++)
        {
        	$qnt=@$qnt+@$data['pattern'][$i]->quantity;

        }*/
        $data['dur']=@$qnt*@$exam_time[0]->time_per_marks;
        //$data['qty']=@$qnt;
        $data['qty']=@$marks;

        $time=time();
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$randstring = str_shuffle(@$characters);
    	
    	

		//$exam_link=$slug.'/'.$time.$randstring;

    	$token_char="a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,0,1,2,3,4,5,6,7,8,9";
    	$token_arr=explode(",",$token_char);
    	$token = '';
    	
		for ($i = 0; $i<5; $i++) 
		{
			$indx=mt_rand(0,35);
		    $token .= @$token_arr[$indx];
		    
		   
		}
		$this->session->set_userdata('token',$token);
		$exam_link=$slug.'/'.$token.'/'.$user_plan_id.'/'.$user_exam.'/'.$time.$randstring;
		$data['exam_ready']=@$exam_link;
		

        $data['status']=1;
		

			
		
		 echo json_encode(array('workdone'=>$data));
        //print_r( $home_data['blog']);exit;
		 

       
	}

	public function start_examination()
	{

	if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}
        $user_id=$this->session->userdata('activeuser');
		$tkn=$this->session->userdata('token');
		$set_slug=$this->uri->segment(2);
		$lnk_tkn=$this->uri->segment(3);
		$random_url=$this->uri->segment(4);

		if($tkn=='')
		{
			$this->session->set_flashdata('errmsg','Sorry! Your test is over');
			redirect($this->url->link(95));
		}
		else{

			$set_dtls = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('set_slug'=>@$set_slug), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$set_id=@$set_dtls[0]->kq_id;
				$exam_id=@$set_dtls[0]->exam_id;
				$exam_data['exam']=@$exam_id;
			$test_type=@$set_dtls[0]->test_type;

				$exam_data['exam_type'] = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$exam_data['user_details'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>@$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
				
				$exam_data['set_id']=$set_id;
				
				$subject_id=@$set_dtls[0]->subject_id;
				$exam_data['qstn']=$this->join_model->get_question_of_section_knowledgetest($set_id,$subject_id);
			

			

				$marks=0;
		        $set_question=$this->join_model->get_knowledge_set_question($set_id);
		        
		        
		      
		        	$marks=@$set_question[0]->total_marks;
		        	
		      
		       
				 $current_date = date("Y-m-d H:i:s"); 


				 $type=@$exam_data['exam_type'][0]->type;

				 $check_user_exam= $this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('user_id'=>$user_id,'set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



					 	 $data_arr=array(
							 				'user_id'=>$user_id,
							 				'set_id'=>$set_id,
							 				'user_plan_id'=>0,
							 				'start_time'=>$current_date,
							 				'total_marks'=>$marks,
							 				'created_on'=>$current_date,
							 				'test_type'=>$test_type
							 				);
							
				if(count($check_user_exam)>0)
				 {
				 	$user_exam= $check_user_exam[0]->id;

				 	$this->db->where('id', $user_exam);
				 	$this->db->update('tbl_user_exam',$data_arr);

				 }
				 else{
				 		$this->db->insert('tbl_user_exam',$data_arr);
						$user_exam=$this->db->insert_id();
				 }
							 

					redirect($this->url->link(36).'/'.$set_slug.'/'.$lnk_tkn.'/'.$user_exam.'/'.$random_url);

		}

	}
	public function view_examination()
	{

		if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}
		$user_id=$this->session->userdata('activeuser'); 
		
		$set_slug=$this->uri->segment(2);

		$tkn=$this->session->userdata('token');
		$set_slug=$this->uri->segment(2);
		$lnk_tkn=$this->uri->segment(3);
		$random_url=$this->uri->segment(5);

		$exam_data['user_exam']=$this->uri->segment(4);

		
		
		$exam_data['set_dtls'] = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('set_slug'=>@$set_slug), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$set_id=@$exam_data['set_dtls'][0]->kq_id;
		$exam_id=@$exam_data['set_dtls'][0]->exam_id;
		$exam_data['exam']=@$exam_id;
		$exam_data['subject_id']=@$exam_data['set_dtls'][0]->subject_id;
		$exam_data['chapter_id']=@$exam_data['set_dtls'][0]->chap_id;
		$exam_data['dur']=@$exam_data['set_dtls'][0]->exam_duration;
		// $exam_data['set_dtls']=@$exam_data['set_dtls'][0]->exam_duration;

		$exam_data['pattern'] = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$exam_data['exam_type'] = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$exam_data['user_details'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>@$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
				
		// echo $exam_data['user_details'][0]->first_name; exit;


				$exam_data['set_id']=$set_id;
				
		$subject_id=@$exam_data['set_dtls'][0]->subject_id;
		$exam_data['qstn']=$this->join_model->get_question_of_section_knowledgetest($set_id,$subject_id);
	
		        $exam_data['user_plan_id']=0;

		        $exam_data['first_qstn_id']=$exam_data['qstn'][0]->dtls_id; 


		        $exam_data['st_name']=$exam_data['exam_type'][0]->exam_name;

		        
		        	$this->load->view('manage_exam/examination_view',$exam_data);
		       
		      
				
			

	
		
	}
    

	public function get_question_by_section()
	{
		$data['status']=0;
		/*if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}
         */
		$set_id=$this->input->post('set');
		$section_id=$this->input->post('section');
		//echo $set_id.$section_id;

		$qstn=$this->join_model->get_passage_question_of_section($set_id,$section_id);
		//print_r($qstn);

		$q_id= @$qstn[0]->id;
		$pss_id=@$qstn[0]->passage_id;
		$exam_id=@$qstn[0]->exam_id;

	

		$answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$alphas = range('A', 'Z');

		$exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		 $negative_marks=@$qstn[0]->marks*@$exam_time[0]->negative_marks/100;

		  $question_prev_status=$this->join_model->get_exam_question_details($user_id,$set_id,$q_id);
		 $select_option='';
		 for($c=0;$c<count($answr);$c++)
		 {
		 	if(@$answr[$c]->id==@$question_prev_status[0]->selected_choice)
		 	{
		 		$select_option=$c;
		 	}
		 }
		?>

<input type="hidden" name="hid_review" id="hid_review" value="<?php echo @$question_prev_status[0]->is_review;?>">
<input type="hidden" name="hid_e" id="hid_e" value="<?php echo @$exam_id;?>">
<input type="hidden" name="hid_s" id="hid_s" value="<?php echo @$set_id;?>">
<input type="hidden" name="hid_se" id="hid_se" value="<?php echo @$section_id;?>">
<input type="hidden" name="hid_q" id="hid_q" value="<?php echo @$q_id;?>">

		<div class="quehdng">
            <span class="quehdnglft">Passage.1</span>
            <span class="quehdngryt">
                <span class="markdef">Maximum Mark. <span class="green"><?php echo number_format((float)@$qstn[0]->marks, 2, '.', '');?></span></span>
                <span class="markdef">Negative Mark. <span class="green red"><?php if($negative_marks!=''){echo number_format((float)@$negative_marks, 2, '.', '');}else{ echo '0'; }?></span></span>
                <!--<span class="markdef"><span class="triangle"></span>Report</span>-->
            </span>
        </div>
        <!--normal que Single choice-->
        <div id="about" class="nano questionoutr" style="display:block">
            <div class="nano-content">


                <div class="questioninr">
                <div class="question-bx">
                    <?php echo @$passage[0]->description; ?>
                    </div>
                    <p class="questioninr"><b> 1)<?php echo @$qstn[0]->question; ?></b></p>
                    <div class="optninr">

                    <?php for($a=0;$a<count(@$answr);$a++){?>
                        <input id="radio<?php if($a>0){ echo $a; }?>" class="radiobtn" name="radio" type="radio" value="<?php echo $a+1; ?>" <?php if($select_option!=''){if($a==$select_option){echo 'checked'; }}?>>
                        <label class="option" for="radio<?php if($a>0){ echo $a; }?>">
                            <div class="optncrcl"><span class="optnvalue"><?php echo $alphas[$a]; ?></span></div>
                            <span class="optncntnt"><?php echo @$answr[$a]->choice; ?> </span>
                        </label>

                        <?php } ?>



                       <!-- <input id="radio1" class="radiobtn" name="radio" type="radio">
                        <label class="option" for="radio1">
                            <div class="optncrcl"><span class="optnvalue">B</span></div>
                            <span class="optncntnt">em.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. ibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pell</span>
                        </label>
                        <input id="radio2" class="radiobtn" name="radio" type="radio">
                        <label class="option" for="radio2">
                            <div class="optncrcl"><span class="optnvalue">C</span></div>
                            <span class="optncntnt">cies nec, pellentesque eu, pretium quis, sem.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. ibus et magnis dis parturient montes,</span>
                        </label>
                        <input id="radio3" class="radiobtn" name="radio" type="radio">
                        <label class="option" for="radio3">
                            <div class="optncrcl"><span class="optnvalue">D</span></div>
                            <span class="optncntnt">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. </span>
                        </label>-->
                    </div>
                </div>
            </div>

        </div>

			


	<?php }



	public function get_single_question()
	{

		/*if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}*/


		$q_id=$this->input->post('q_id');
		$q_no=$this->input->post('q_no');
		$s_id=$this->input->post('s_id');

		if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}

		


		$qstn=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		$section_id=$qstn[0]->section_id;

		

		$answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$alphas = range('A', 'Z');

		$exam_id=@$qstn[0]->exam_id;

		$exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		 // $negative_marks=@$qstn[0]->marks*@$exam_time[0]->negative_marks/100;

		 $question_prev_status=$this->join_model->get_exam_question_details($user_id,$s_id,$q_id);
		
$select_option=array();
		 $select_id=@$question_prev_status[0]->selected_choice;

$select_option=explode(',', $select_id);


 $set_quest_details=$this->common_model->common($table_name = 'tbl_knowledge_quiz_set_dtls', $field = array(), $where = array('que_id'=>@$q_id,'set_id'=>$s_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        $current_quest_details_id= @$set_quest_details[0]->dtls_id;


?>
<!--<input type="hidden" name="hid_section" id="hid_section" value="<?php echo @$qstn[0]->section_id; ?>">-->
<input type="hidden" name="hid_review" id="hid_review" value="<?php echo @$question_prev_status[0]->is_review;?>">

<input type="hidden" name="current_quest_details_id" id="current_quest_details_id" value="<?php echo @$current_quest_details_id;?>">

<input type="hidden" name="hid_e" id="hid_e" value="<?php echo @$exam_id;?>">
<input type="hidden" name="hid_s" id="hid_s" value="<?php echo @$s_id;?>">
<input type="hidden" name="hid_se" id="hid_se" value="<?php echo @$section_id;?>">
<input type="hidden" name="hid_q" id="hid_q" value="<?php echo @$q_id;?>">

		<div class="quehdng">
            <span class="quehdnglft">Question.<?php echo @$q_no;?></span>
            <!-- <span class="quehdngryt">
                <span class="markdef">Maximum Mark. <span class="green"><?php echo number_format((float)@$qstn[0]->marks, 2, '.', '');?></span></span>
                <span class="markdef">Negative Mark. <span class="green red"><?php  echo "0.25"; ?></span></span>
               
            </span> -->
        </div>
        <!--normal que Single choice-->
        <div id="about" class="nano questionoutr" style="display:block">
            <div class="nano-content">


                <div class="questioninr">
                <div class="question-bx">
                    <?php echo @$qstn[0]->question; ?>
                    </div>

                        <div class="col-md-8">
<h2 class="answer-txt">Answer Option :</h2>

                    <div class="optninr">

                    <?php for($a=0;$a<count(@$answr);$a++){?>
                        <input id="radio<?php if($a>0){ echo $a; }?>" class="radiobtn" name="radio[]" type="radio" value="<?php echo $a+1; ?>" <?php if($select_option!=''){ for ($i=0; $i <count($select_option) ; $i++) { 
                        	 if($answr[$a]->id==$select_option[$i]){echo 'checked'; }} }?>>
                        <label class="option" for="radio<?php if($a>0){ echo $a; }?>">
                            <div class="optncrcl"><span class="optnvalue"><!-- <?php echo $alphas[$a]; ?> --></span></div>
                            <span class="optncntnt"><?php echo strip_tags(@$answr[$a]->choice); ?> </span>
                        </label>

                        <?php } ?>

                         </div>

                     </div>



                </div>

            </div>

        </div>

        <?php 

    }


    public function get_previous_question()
	{

		


		$current_quest_details_id=$this->input->post('current_quest_details_id');

		$prevous_quest_details_id= $current_quest_details_id-1;

		$get_prious_quest_details= $this->common_model->common($table_name = 'tbl_knowledge_quiz_set_dtls', $field = array(), $where = array('dtls_id'=>$prevous_quest_details_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$q_id=$get_prious_quest_details[0]->que_id;
		
		$s_id=$get_prious_quest_details[0]->set_id;
		$se_id='';
		
		
	

		if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}

		


		$qstn=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		$section_id=$qstn[0]->section_id;

		

		$answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$alphas = range('A', 'Z');

		$exam_id=@$qstn[0]->exam_id;

		$exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		 // $negative_marks=@$qstn[0]->marks*@$exam_time[0]->negative_marks/100;

		 $question_prev_status=$this->join_model->get_exam_question_details($user_id,$s_id,$q_id);
		
$select_option=array();
		 $select_id=@$question_prev_status[0]->selected_choice;

$select_option=explode(',', $select_id);


 $set_quest_details=$this->common_model->common($table_name = 'tbl_knowledge_quiz_set_dtls', $field = array(), $where = array('que_id'=>@$q_id,'set_id'=>$s_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        $current_quest_details_id= @$set_quest_details[0]->dtls_id;

        $totalqstn=$this->join_model->get_question_of_section_knowledgetest($s_id,$se_id);
				$get_next=array();
				for($i=0;$i<count(@$totalqstn);$i++)
				{
					if(@$totalqstn[$i]->dtls_id==@$prevous_quest_details_id)
					{
						$get_next[0]=@$totalqstn[$i+1];
						$q_no=$i+1;
					}

				}


?>
<!--<input type="hidden" name="hid_section" id="hid_section" value="<?php echo @$qstn[0]->section_id; ?>">-->
<input type="hidden" name="hid_review" id="hid_review" value="<?php echo @$question_prev_status[0]->is_review;?>">

<input type="hidden" name="current_quest_details_id" id="current_quest_details_id" value="<?php echo @$prevous_quest_details_id;?>">

<input type="hidden" name="hid_e" id="hid_e" value="<?php echo @$exam_id;?>">
<input type="hidden" name="hid_s" id="hid_s" value="<?php echo @$s_id;?>">
<input type="hidden" name="hid_se" id="hid_se" value="<?php echo @$section_id;?>">
<input type="hidden" name="hid_q" id="hid_q" value="<?php echo @$q_id;?>">

		<div class="quehdng">
            <span class="quehdnglft">Question.<?php echo @$q_no;?></span>
            <!-- <span class="quehdngryt">
                <span class="markdef">Maximum Mark. <span class="green"><?php echo number_format((float)@$qstn[0]->marks, 2, '.', '');?></span></span>
                <span class="markdef">Negative Mark. <span class="green red"><?php  echo "0.25"; ?></span></span>
               
            </span> -->
        </div>
        <!--normal que Single choice-->
        <div id="about" class="nano questionoutr" style="display:block">
            <div class="nano-content">


                <div class="questioninr">
                <div class="question-bx">
                    <?php echo @$qstn[0]->question; ?>
                    </div>

                        <div class="col-md-8">
<h2 class="answer-txt">Answer Option :</h2>

                    <div class="optninr">

                    <?php for($a=0;$a<count(@$answr);$a++){?>
                        <input id="radio<?php if($a>0){ echo $a; }?>" class="radiobtn" name="radio[]" type="radio" value="<?php echo $a+1; ?>" <?php if($select_option!=''){ for ($i=0; $i <count($select_option) ; $i++) { 
                        	 if($answr[$a]->id==$select_option[$i]){echo 'checked'; }} }?>>
                        <label class="option" for="radio<?php if($a>0){ echo $a; }?>">
                            <div class="optncrcl"><span class="optnvalue"><!-- <?php echo $alphas[$a]; ?> --></span></div>
                            <span class="optncntnt"><?php echo strip_tags(@$answr[$a]->choice); ?> </span>
                        </label>

                        <?php } ?>

                         </div>

                     </div>



                </div>

            </div>

        </div>

        <?php

    }


     

		


	public function save_next_question()
	{
		$e_id=$this->input->post('e_id');
		$s_id=$this->input->post('s_id');
		$se_id=$this->input->post('se_id');
		$q_id=$this->input->post('q_id');
		$review=$this->input->post('rvw');
		$answer_no=$this->input->post('answ');
		//$attmp_list=$this->input->post('attmp_list');
		//$revw_list=$this->input->post('revw_list');
		$is_correct='No';
		if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}
		$current_date= date("Y-m-d H:i:s");  

		$answer_details=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>@$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


		$set_quest_details=$this->common_model->common($table_name = 'tbl_knowledge_quiz_set_dtls', $field = array(), $where = array('que_id'=>@$q_id,'set_id'=>$s_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$current_quest_details_id= @$set_quest_details[0]->dtls_id;

		//print_r($answer_details);
$choice=array();
for ($i=0; $i <count($answer_no) ; $i++) { 
	
	

	$counter=@$answer_no[$i]-1;
		
				$choice[$i]=@$answer_details[$counter]->id;

		
}
$selected_choice= implode(',', @$choice);
		
 // echo $selected_choice;
		$corect_choice=0;
		for($i=0;$i<count(@$answer_details);$i++)
		{

			if(@$answer_details[$i]->is_correct=='Yes')
			{
				$corect_choice=@$answer_details[$i]->id;
				$choice_no=$i+1;
			}

		}

// 		print_r($answer_no);
// $answer_no=explode(',', $answer_no);
		// echo count($choice);
if($choice!=""){

for ($i=0; $i < count($choice) ; $i++) { 
	
		if(@$corect_choice==@$choice[$i])
		{
			$is_correct='Yes';
		}
		
}}

	


	$user_exam_record=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('user_id'=>@$user_id,'set_id'=>@$s_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');



	$user_exam_id=@$user_exam_record[0]->id;
	//echo 'user examintion'.$user_exam_id;

		if(@$review!='')
		{
			
			$check_record=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$user_exam_id,'question_master_id'=>@$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			if(count(@$check_record)>0)
			{
				$data_array=array(
				
				'selected_choice'=>@$selected_choice,
				'correct_choice'=>@$corect_choice,
				'is_correct'=>@$is_correct,
				'is_review'=>'Yes',
				'created_on'=>$current_date
				);
				$this->db->where('user_exam_id',@$user_exam_id);
				$this->db->where('question_master_id',@$q_id);
				$this->db->update('tbl_user_exam_details',$data_array);


			}
			else
			{


$data_array=array(
					'user_exam_id'=>@$user_exam_id,
					'question_master_id'=>@$q_id,
					'selected_choice'=>@$selected_choice,
					'correct_choice'=>@$corect_choice,
					'is_correct'=>@$is_correct,
					'is_review'=>'Yes',
					'created_on'=>$current_date
				);
				$this->db->insert('tbl_user_exam_details',$data_array);


			}


			

			

		}
		
		if( @$review=='')
		{
			//echo 'Checking---------';

			$check_record=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$user_exam_id,'question_master_id'=>@$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			//print_r(@$check_record);

			if(count(@$check_record)>0)
			{
				if($selected_choice!="")
				{
				$data_array=array(
				
				'selected_choice'=>@$selected_choice,
				'correct_choice'=>@$corect_choice,
				'is_correct'=>@$is_correct,
				'is_review'=>'No',
				'created_on'=>$current_date

				);
				$this->db->where('user_exam_id',@$user_exam_id);
				$this->db->where('question_master_id',@$q_id);
				$this->db->update('tbl_user_exam_details',$data_array);

			}
			else{
				$this->db->where('user_exam_id',@$user_exam_id);
				$this->db->where('question_master_id',@$q_id);
				$this->db->delete('tbl_user_exam_details');
				}

			}
			else
			{ 
				//echo 'checking2';
				if($selected_choice!=""){
	

				$data_array=array(
				'user_exam_id'=>$user_exam_id,
				'question_master_id'=>$q_id,
				'selected_choice'=>@$selected_choice,
				'correct_choice'=>@$corect_choice,
				'is_correct'=>@$is_correct,
				'is_review'=>'No',
				'created_on'=>$current_date

				);
				//echo '<pre>';
				//print_r($data_array);
				$this->db->insert('tbl_user_exam_details',$data_array);
              }

			}
			
			

		}
		

		$attempted_question=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$user_exam_id,'is_review'=>'No'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$attempted_question_ids=array();
		if(count($attempted_question)>0)
		{
			for($at=0;$at<count($attempted_question);$at++)
			{
				$attempted_question_ids[$at]=@$attempted_question[$at]->question_master_id;

			}

			$attempte_string=implode(',', @$attempted_question_ids);
		}

		$reviewed_question=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$user_exam_id,'is_review'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$reviewed_question_ids=array();

		if(count($reviewed_question)>0)
		{

			for($rv=0;$rv<count($reviewed_question);$rv++)
			{
				$reviewed_question_ids[$rv]=@$reviewed_question[$rv]->question_master_id;

			}

			$reviewed_string = implode(',', @$reviewed_question_ids);
		}
		

		
				$qstn=$this->join_model->get_question_of_section_knowledgetest($s_id,$se_id);
				$get_next=array();
				for($i=0;$i<count(@$qstn);$i++)
				{
					if(@$qstn[$i]->id==@$q_id)
					{
						$get_next[0]=@$qstn[$i+1];
						$q_no=$i+2;
					}

				}
				// print_r($get_next);
				$next_q_id=@$get_next[0]->id;
				$next_s_id=@$get_next[0]->set_id;
				$next_e_id=@$get_next[0]->exam_id;
				$next_se_id=@$get_next[0]->section_id;
				$marks=@$get_next[0]->marks;
				
			$exam_all_pattern=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>@$next_s_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
						$next_sec=array();
						$last_pattern_index=count($exam_all_pattern)-1;
						for($i=0;$i<count($exam_all_pattern);$i++)
						{
							if($exam_all_pattern[$i]->subject_id==$se_id)
							{
									if($i==$last_pattern_index)
									{
										//$next_sec=array();
										$next_sec[0]=$exam_all_pattern[0];
									}
									else
									{
										$next_sec[0]=$exam_all_pattern[$i+1];
									}
									
							}
						
						}
						// print_r($next_sec);


						$next_section_id=$next_sec[0]->subject_id;

						   

	$next_qstn=$this->join_model->get_question_of_section_knowledgetest($s_id,$next_section_id);
								//echo '<pre>';
								//print_r($qstn);
								$q_id= @$next_qstn[0]->que_id;
								$exam_id=@$next_qstn[0]->exam_id;



						$nex_answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$next_q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

							
// print_r($nex_answr);
								$alphas = range('A', 'Z');

								// $next_exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

								// $negative_marks=@$qstn[0]->marks*@$next_exam_time[0]->negative_marks/100;

								$question_prev_status=$this->join_model->get_exam_question_details($user_id,$s_id,$next_q_id);

								 
								// echo $q_id;								 		
								$select_optioned=array();
										 $select_id=@$question_prev_status[0]->selected_choice;

								$select_optioned=explode(',', $select_id);

// print_r($select_optioned);
								 $result=5;

						if($get_next[0] !=""){


		$set_quest_details=$this->common_model->common($table_name = 'tbl_knowledge_quiz_set_dtls', $field = array(), $where = array('que_id'=>@$next_q_id,'set_id'=>$next_s_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$current_quest_details_id= @$set_quest_details[0]->dtls_id;


								?>

							
<input type="hidden" name="hid_review" id="hid_review" value="<?php echo @$question_prev_status[0]->is_review;?>">

<input type="hidden" name="current_quest_details_id" id="current_quest_details_id" value="<?php echo @$current_quest_details_id;?>">

<input type="hidden" name="hid_e" id="hid_e" value="<?php echo @$next_e_id;?>">
<input type="hidden" name="hid_s" id="hid_s" value="<?php echo @$next_s_id;?>">
<input type="hidden" name="hid_se" id="hid_se" value="<?php echo @$next_se_id;?>">
<input type="hidden" name="hid_q" id="hid_q" value="<?php echo @$next_q_id;?>">
		<div class="quehdng">
            <span class="quehdnglft">Question.<?php echo @$q_no;?></span>
            <span class="quehdngryt">
                <!-- <span class="markdef">Maximum Mark. <span class="green"><?php echo number_format((float)@$marks, 2, '.', '');?></span></span>
                <span class="markdef">Negative Mark. <span class="green red"><?php  echo '0.25';?></span></span> -->
                <!--<span class="markdef"><span class="triangle"></span>Report</span>-->
            </span>
        </div>
        <!--normal que Single choice-->
        <div id="about" class="nano questionoutr" style="display:block">
            <div class="nano-content">


                <div class="questioninr">
                <div class="question-bx">
                    <?php echo @$get_next[0]->question; ?>
                    </div>
                  <div class="col-md-8">
					<h2 class="answer-txt">Answer Option :</h2>
  
                    <div class="optninr">

                    <?php  $qs_count=0; for($a=0;$a<count(@$nex_answr);$a++){?>
                        <input id="radio<?php if($a>0){ echo $a; }?>" class="radiobtn" name="radio[]" type="radio" value="<?php echo $a+1; ?>" <?php if($select_optioned!=''){ for ($i=0; $i < count($select_optioned); $i++) { 
                        	
                         if($nex_answr[$a]->id==$select_optioned[$i]){echo 'checked'; }} }?>>
                        <label class="option" for="radio<?php if($a>0){ echo $a; }?>">
                            <div class="optncrcl"><span class="optnvalue"><!-- <?php echo $alphas[$qs_count]; ?> --></span></div>
                            <span class="optncntnt"><?php echo @$nex_answr[$qs_count]->choice; ?> </span>
                        </label>

                        <?php $qs_count++; } ?>

                         </div>
                     </div>




                </div>
            </div>

        </div>




  <input type="hidden" id="hid_attempt" name="hid_attempt" value="<?php echo @$attempte_string; ?>">
  <input type="hidden" id="hid_review1" name="hid_review1" value="<?php echo @$reviewed_string; ?>">


<?php
	} else
	{
	 echo $result;
	} 
}

	/*public function save_next_question()
	{
		$e_id=$this->input->post('e_id');
		$s_id=$this->input->post('s_id');
		$se_id=$this->input->post('se_id');
		$q_id=$this->input->post('q_id');
		$review=$this->input->post('rvw');
		$answer_no=$this->input->post('answ');
		//$attmp_list=$this->input->post('attmp_list');
		//$revw_list=$this->input->post('revw_list');

		if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}
		$current_date= date("Y-m-d H:i:s");    
		$answer_details=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>@$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		//print_r($answer_details);

		$counter=@$answer_no-1;
		//echo $counter;
		$choice=@$answer_details[$counter]->id;
		$corect_choice=0;
		for($i=0;$i<count(@$answer_details);$i++)
		{

			if(@$answer_details[$i]->is_correct=='Yes')
			{
				$corect_choice=@$answer_details[$i]->id;
				$choice_no=$i+1;
			}

		}
		//echo $corect_choice;
		if(@$choice_no==@$answer_no)
		{
			$is_correct='Yes';
		}
		else
		{
			$is_correct='No';
		}

		//echo $is_correct;


	$user_exam_record=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('user_id'=>@$user_id,'set_id'=>@$s_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



	$user_exam_id=@$user_exam_record[0]->id;
	//echo 'user examintion'.$user_exam_id;

		if(@$answer_no!='' && @$review!='')
		{
			
			$check_record=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$user_exam_id,'question_master_id'=>@$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			if(count(@$check_record)>0)
			{
				$data_array=array(
				
				'selected_choice'=>@$choice,
				'correct_choice'=>@$corect_choice,
				'is_correct'=>@$is_correct,
				'is_review'=>'Yes',
				'created_on'=>$current_date
				);
				$this->db->where('user_exam_id',@$user_exam_id);
				$this->db->where('question_master_id',@$q_id);
				$this->db->update('tbl_user_exam_details',$data_array);



			}
			else
			{
				$data_array=array(
				'user_exam_id'=>@$user_exam_id,
				'question_master_id'=>@$q_id,
				'selected_choice'=>@$choice,
				'correct_choice'=>@$corect_choice,
				'is_correct'=>@$is_correct,
				'is_review'=>'Yes',
				'created_on'=>$current_date
				);
				$this->db->insert('tbl_user_exam_details',$data_array);


			}


			

			

		}
		
		if(@$answer_no!='' && @$review=='')
		{
			//echo 'Checking---------';

			$check_record=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$user_exam_id,'question_master_id'=>@$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			//print_r(@$check_record);

			if(count(@$check_record)>0)
			{
				$data_array=array(
				
				'selected_choice'=>@$choice,
				'correct_choice'=>@$corect_choice,
				'is_correct'=>@$is_correct,
				'is_review'=>'No',
				'created_on'=>$current_date

				);
				$this->db->where('user_exam_id',@$user_exam_id);
				$this->db->where('question_master_id',@$q_id);
				$this->db->update('tbl_user_exam_details',$data_array);



			}
			else
			{ 
				//echo 'checking2';

				$data_array=array(
				'user_exam_id'=>$user_exam_id,
				'question_master_id'=>$q_id,
				'selected_choice'=>@$choice,
				'correct_choice'=>@$corect_choice,
				'is_correct'=>@$is_correct,
				'is_review'=>'No',
				'created_on'=>$current_date

				);
				//echo '<pre>';
				//print_r($data_array);
				$this->db->insert('tbl_user_exam_details',$data_array);


			}
			
			

		}
		

		$attempted_question=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$user_exam_id,'is_review'=>'No'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$attempted_question_ids=array();
		if(count($attempted_question)>0)
		{
			for($at=0;$at<count($attempted_question);$at++)
			{
				$attempted_question_ids[$at]=@$attempted_question[$at]->question_master_id;

			}

			$attempte_string=implode(',', @$attempted_question_ids);
		}

		$reviewed_question=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$user_exam_id,'is_review'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$reviewed_question_ids=array();

		if(count($reviewed_question)>0)
		{

			for($rv=0;$rv<count($reviewed_question);$rv++)
			{
				$reviewed_question_ids[$rv]=@$reviewed_question[$rv]->question_master_id;

			}

			$reviewed_string = implode(',', @$reviewed_question_ids);
		}
		

		if($se_id!=3)
		{
				$qstn=$this->join_model->get_question_of_section($s_id,$se_id);
				$get_next=array();
				for($i=0;$i<count(@$qstn);$i++)
				{
					if(@$qstn[$i]->id==@$q_id)
					{
						$get_next[0]=@$qstn[$i+1];
						$q_no=$i+2;
					}

				}
				//print_r($get_next);
				$next_q_id=@$get_next[0]->id;
				$next_s_id=@$get_next[0]->set_id;
				$next_e_id=@$get_next[0]->exam_id;
				$next_se_id=@$get_next[0]->section_id;
				$marks=@$get_next[0]->marks;
				if(@$get_next[0]->question=='')
				{
						$exam_all_pattern=$this->common_model->common($table_name = 'tbl_set_pattern', $field = array(), $where = array('exam_id'=>@$e_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
						$next_sec=array();
						$last_pattern_index=count($exam_all_pattern)-1;
						for($i=0;$i<count($exam_all_pattern);$i++)
						{
							if($exam_all_pattern[$i]->section_id==$se_id)
							{
									if($i==$last_pattern_index)
									{
										//$next_sec=array();
										$next_sec[0]=$exam_all_pattern[0];
									}
									else
									{
										$next_sec[0]=$exam_all_pattern[$i+1];
									}
									
							}
						
						}
						//print_r($next_sec);


						$next_section_id=$next_sec[0]->section_id;

						    if($next_section_id!=3)
							{

								$next_qstn=$this->join_model->get_question_of_section($s_id,$next_section_id);
								//echo '<pre>';
								//print_r($qstn);
								$q_id= @$next_qstn[0]->question_id;
								$exam_id=@$next_qstn[0]->exam_id;



								$nex_answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

								$alphas = range('A', 'Z');

								$next_exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

								$negative_marks=@$qstn[0]->marks*@$next_exam_time[0]->negative_marks/100;

								$question_prev_status=$this->join_model->get_exam_question_details($user_id,$s_id,$q_id);

								 $select_option='';
								 for($c=0;$c<count($nex_answr);$c++)
								 {
								 	if(@$nex_answr[$c]->id==@$question_prev_status[0]->selected_choice)
								 	{
								 		$select_option=$c;
								 	}
								 }
								?>

							<input type="hidden" name="hid_review" id="hid_review" value="<?php echo @$question_prev_status[0]->is_review;?>">

							<input type="hidden" name="hid_e" id="hid_e" value="<?php echo @$exam_id;?>">
							<input type="hidden" name="hid_s" id="hid_s" value="<?php echo @$s_id;?>">
							<input type="hidden" name="hid_se" id="hid_se" value="<?php echo @$next_section_id;?>">
							<input type="hidden" name="hid_q" id="hid_q" value="<?php echo @$q_id;?>">

									<div class="quehdng">
							            <span class="quehdnglft">Question.1</span>
							            <span class="quehdngryt">
							                <span class="markdef">Maximum Mark. <span class="green"><?php echo number_format((float)@$qstn[0]->marks, 2, '.', '');?></span></span>
							                <span class="markdef">Negative Mark. <span class="green red"><?php if($negative_marks!=''){echo number_format((float)@$negative_marks, 2, '.', '');}else{ echo '0'; }?></span></span>
							                <span class="markdef"><span class="triangle"></span>Report</span>
							            </span>
							        </div>
							        <!--normal que Single choice-->
							        <div id="about" class="nano questionoutr" style="display:block">
							            <div class="nano-content">


							                <div class="questioninr">
							                    <?php echo @$next_qstn[0]->question; ?>

							                    <div class="optninr">

							                    <?php for($a=0;$a<count(@$nex_answr);$a++){?>
							                        <input id="radio<?php if($a>0){ echo $a; }?>" class="radiobtn" name="radio" type="radio" value="<?php echo $a+1; ?>" <?php if($select_option!=''){if($a==$select_option){echo 'checked'; }}?>>
							                        <label class="option" for="radio<?php if($a>0){ echo $a; }?>">
							                            <div class="optncrcl"><span class="optnvalue"><?php echo $alphas[$a]; ?></span></div>
							                            <span class="optncntnt"><?php echo @$nex_answr[$a]->choice; ?> </span>
							                        </label>
							  				         <?php } ?>

											</div>
							               </div>
							            </div>

							        </div>



				<?php 
					}
					else
					{
						$next_qstn=$this->join_model->get_passage_question_of_section($s_id,$next_section_id);

						$q_id= @$next_qstn[0]->id;
						$pss_id=@$next_qstn[0]->passage_id;
						$exam_id=@$next_qstn[0]->exam_id;

						$next_passage=$this->common_model->common($table_name = 'tbl_passage', $field = array(), $where = array('id'=>@$pss_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

						$next_answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

						$alphas = range('A', 'Z');

						$next_exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

						 $negative_marks=@$qstn[0]->marks*@$next_exam_time[0]->negative_marks/100;

						 $question_prev_status=$this->join_model->get_exam_question_details($user_id,$s_id,$q_id);

								 $select_option='';
								 for($c=0;$c<count($next_answr);$c++)
								 {
								 	if(@$next_answr[$c]->id==@$question_prev_status[0]->selected_choice)
								 	{
								 		$select_option=$c;
								 	}
								 }

						 ?>

						 <input type="hidden" name="hid_review" id="hid_review" value="<?php echo @$question_prev_status[0]->is_review;?>">

						 <input type="hidden" name="hid_e" id="hid_e" value="<?php echo @$exam_id;?>">
						<input type="hidden" name="hid_s" id="hid_s" value="<?php echo @$s_id;?>">
						<input type="hidden" name="hid_se" id="hid_se" value="<?php echo @$next_section_id;?>">
						<input type="hidden" name="hid_q" id="hid_q" value="<?php echo @$q_id;?>">

								<div class="quehdng">
						            <span class="quehdnglft">Passage.1</span>
						            <span class="quehdngryt">
						                <span class="markdef">Maximum Mark. <span class="green"><?php echo number_format((float)@$next_qstn[0]->marks, 2, '.', '');?></span></span>
						                <span class="markdef">Negative Mark. <span class="green red"><?php if($negative_marks!=''){echo number_format((float)@$negative_marks, 2, '.', '');}else{ echo '0'; }?></span></span>
						                <span class="markdef"><span class="triangle"></span>Report</span>
						            </span>
						        </div>
						        <!--normal que Single choice-->
						        <div id="about" class="nano questionoutr" style="display:block">
						            <div class="nano-content">


						                <div class="questioninr">
						                    <?php echo @$next_passage[0]->description; ?>
						                    <p class="questioninr"><b> 1)<?php echo @$next_qstn[0]->question; ?></b></p>
						                    <div class="optninr">

						                    <?php for($a=0;$a<count(@$next_answr);$a++){?>
						                        <input id="radio<?php if($a>0){ echo $a; }?>" class="radiobtn" name="radio" type="radio" value="<?php echo $a+1; ?>" <?php if($select_option!=''){if($a==$select_option){echo 'checked'; }}?>>
						                        <label class="option" for="radio<?php if($a>0){ echo $a; }?>">
						                            <div class="optncrcl"><span class="optnvalue"><?php echo $alphas[$a]; ?></span></div>
						                            <span class="optncntnt"><?php echo @$next_answr[$a]->choice; ?> </span>
						                        </label>

						                        <?php } ?>

						                        </div>
												</div>
												</div>

										      	</div>


					<?php
				}


			}
				else
				{
					
						/*$q_id= @$qstn[0]->question_id;
						$exam_id=@$qstn[0]->exam_id;*/

						/*$q_id= @$get_next[0]->question_id;
						$exam_id=@$get_next[0]->exam_id;


						$answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
						//print_r($answr);

						$alphas = range('A', 'Z');

						$exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

						$negative_marks=@$qstn[0]->marks*@$exam_time[0]->negative_marks/100;

						$question_prev_status=$this->join_model->get_exam_question_details($user_id,$next_s_id,$q_id);

								 $select_option='';
								 for($c=0;$c<count($answr);$c++)
								 {
								 	if(@$answr[$c]->id==@$question_prev_status[0]->selected_choice)
								 	{
								 		$select_option=$c;
								 	}
								 }


		

		

		?>

<input type="hidden" name="hid_review" id="hid_review" value="<?php echo @$question_prev_status[0]->is_review;?>">
<input type="hidden" name="hid_e" id="hid_e" value="<?php echo @$next_e_id;?>">
<input type="hidden" name="hid_s" id="hid_s" value="<?php echo @$next_s_id;?>">
<input type="hidden" name="hid_se" id="hid_se" value="<?php echo @$next_se_id;?>">
<input type="hidden" name="hid_q" id="hid_q" value="<?php echo @$next_q_id;?>">
		<div class="quehdng">
            <span class="quehdnglft">Question.<?php echo @$q_no;?></span>
            <span class="quehdngryt">
                <span class="markdef">Maximum Mark. <span class="green"><?php echo number_format((float)@$marks, 2, '.', '');?></span></span>
                <span class="markdef">Negative Mark. <span class="green red"><?php if($negative_marks!=''){echo number_format((float)@$negative_marks, 2, '.', '');}else{ echo '0'; }?></span></span>
                <span class="markdef"><span class="triangle"></span>Report</span>
            </span>
        </div>
        <!--normal que Single choice-->
        <div id="about" class="nano questionoutr" style="display:block">
            <div class="nano-content">


                <div class="questioninr">
                    <?php echo @$get_next[0]->question; ?>

                    <div class="optninr">

                    <?php for($a=0;$a<count(@$answr);$a++){?>
                        <input id="radio<?php if($a>0){ echo $a; }?>" class="radiobtn" name="radio" type="radio" value="<?php echo $a+1; ?>" <?php if($select_option!=''){if($a==$select_option){echo 'checked'; }}?>>
                        <label class="option" for="radio<?php if($a>0){ echo $a; }?>">
                            <div class="optncrcl"><span class="optnvalue"><?php echo $alphas[$a]; ?></span></div>
                            <span class="optncntnt"><?php echo @$answr[$a]->choice; ?> </span>
                        </label>

                        <?php } ?>

                         </div>
                </div>
            </div>

        </div>

		

	<?php }}
	else
	{
		$qstn=$this->join_model->get_passage_questions_all($s_id,$se_id);
		//print_r($qstn);

		$get_next=array();
				for($i=0;$i<count(@$qstn);$i++)
				{
					if(@$qstn[$i]->id==@$q_id)
					{
						$get_next[0]=@$qstn[$i+1];
						$q_no=$i+2;
					}

				}
				//print_r($get_next);
				$x=floor($q_no / 5);
				$y=$q_no % 5;
				if($y>0)
				{
					$psg_no=$x+1;
				}
				else
				{
					$psg_no=$x;
				}

				
				$next_q_id=@$get_next[0]->id;
				$next_s_id=@$s_id;
				$next_e_id=@$get_next[0]->exam_id;
				$next_se_id=@$get_next[0]->section_id;
				$pss_id=@$get_next[0]->passage_id;
				$marks=@$get_next[0]->marks;

				if(@$get_next[0]->question=='')
				{
						$exam_all_pattern=$this->common_model->common($table_name = 'tbl_set_pattern', $field = array(), $where = array('exam_id'=>@$e_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
						$next_sec=array();
						$last_pattern_index=count($exam_all_pattern)-1;
						for($i=0;$i<count($exam_all_pattern);$i++)
						{
							if($exam_all_pattern[$i]->section_id==$se_id)
							{
									if($i==$last_pattern_index)
									{
										//$next_sec=array();
										$next_sec[0]=$exam_all_pattern[0];
									}
									else
									{
										$next_sec[0]=$exam_all_pattern[$i+1];
									}
									
							}
						
						}
						//print_r($next_sec);


						$next_section_id=$next_sec[0]->section_id;


						if($next_section_id!=3)
							{

								$next_qstn=$this->join_model->get_question_of_section($s_id,$next_section_id);
								//echo '<pre>';
								//print_r($qstn);
								$q_id= @$next_qstn[0]->question_id;
								$exam_id=@$next_qstn[0]->exam_id;



								$nex_answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

								$alphas = range('A', 'Z');

								$next_exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

								$negative_marks=@$qstn[0]->marks*@$next_exam_time[0]->negative_marks/100;

								$question_prev_status=$this->join_model->get_exam_question_details($user_id,$s_id,$q_id);

								 $select_option='';
								 for($c=0;$c<count($nex_answr);$c++)
								 {
								 	if(@$nex_answr[$c]->id==@$question_prev_status[0]->selected_choice)
								 	{
								 		$select_option=$c;
								 	}
								 }
								?>

							<input type="hidden" name="hid_review" id="hid_review" value="<?php echo @$question_prev_status[0]->is_review;?>">

							<input type="hidden" name="hid_e" id="hid_e" value="<?php echo @$exam_id;?>">
							<input type="hidden" name="hid_s" id="hid_s" value="<?php echo @$s_id;?>">
							<input type="hidden" name="hid_se" id="hid_se" value="<?php echo @$next_section_id;?>">
							<input type="hidden" name="hid_q" id="hid_q" value="<?php echo @$q_id;?>">

									<div class="quehdng">
							            <span class="quehdnglft">Question.1</span>
							            <span class="quehdngryt">
							                <span class="markdef">Maximum Mark. <span class="green"><?php echo number_format((float)@$qstn[0]->marks, 2, '.', '');?></span></span>
							                <span class="markdef">Negative Mark. <span class="green red"><?php if($negative_marks!=''){echo number_format((float)@$negative_marks, 2, '.', '');}else{ echo '0'; }?></span></span>
							                <span class="markdef"><span class="triangle"></span>Report</span>
							            </span>
							        </div>
							        <!--normal que Single choice-->
							        <div id="about" class="nano questionoutr" style="display:block">
							            <div class="nano-content">


							                <div class="questioninr">
							                    <?php echo @$next_qstn[0]->question; ?>

							                    <div class="optninr">

							                    <?php for($a=0;$a<count(@$nex_answr);$a++){?>
							                        <input id="radio<?php if($a>0){ echo $a; }?>" class="radiobtn" name="radio" type="radio" value="<?php echo $a+1; ?>" <?php if($select_option!=''){if($a==$select_option){echo 'checked'; }}?>>
							                        <label class="option" for="radio<?php if($a>0){ echo $a; }?>">
							                            <div class="optncrcl"><span class="optnvalue"><?php echo $alphas[$a]; ?></span></div>
							                            <span class="optncntnt"><?php echo @$nex_answr[$a]->choice; ?> </span>
							                        </label>
							  				         <?php } ?>

											</div>
							               </div>
							            </div>

							        </div>



				<?php 
					}


				}
				else
				{

				


		

						$passage=$this->common_model->common($table_name = 'tbl_passage', $field = array(), $where = array('id'=>@$pss_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

						$exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$next_e_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

								 $negative_marks=@$get_next[0]->marks*@$exam_time[0]->negative_marks/100;

								 $answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>@$next_q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

								 
								$alphas = range('A', 'Z');

								$question_prev_status=$this->join_model->get_exam_question_details($user_id,$next_s_id,$next_q_id);

								 $select_option='';
								 for($c=0;$c<count($answr);$c++)
								 {
								 	if(@$answr[$c]->id==@$question_prev_status[0]->selected_choice)
								 	{
								 		$select_option=$c;
								 	}
								 }

		

		 ?>

		 			<input type="hidden" name="hid_review" id="hid_review" value="<?php echo @$question_prev_status[0]->is_review;?>">


					<input type="hidden" name="hid_e" id="hid_e" value="<?php echo @$next_e_id;?>">
					<input type="hidden" name="hid_s" id="hid_s" value="<?php echo @$next_s_id;?>">
					<input type="hidden" name="hid_se" id="hid_se" value="<?php echo @$next_se_id;?>">
					<input type="hidden" name="hid_q" id="hid_q" value="<?php echo @$next_q_id;?>">


					<div class="quehdng">
					            <span class="quehdnglft">Passage.<?php echo @$psg_no; ?></span>
					            <span class="quehdngryt">
					                <span class="markdef">Maximum Mark. <span class="green"><?php echo number_format((float)@$get_next[0]->marks, 2, '.', '');?></span></span>
					                <span class="markdef">Negative Mark. <span class="green red"><?php if($negative_marks!=''){echo number_format((float)@$negative_marks, 2, '.', '');}else{ echo '0'; }?></span></span>
					                <span class="markdef"><span class="triangle"></span>Report</span>
					            </span>
					        </div>
					        <!--normal que Single choice-->
					        <div id="about" class="nano questionoutr" style="display:block">
					            <div class="nano-content">


					                <div class="questioninr">
					                    <?php echo @$passage[0]->description; ?>
					                    <p class="questioninr"><b> <?php echo @$q_no; ?>)<?php echo @$get_next[0]->question; ?></b></p>
					                    <div class="optninr">

					                    <?php for($a=0;$a<count(@$answr);$a++){?>
					                        <input id="radio<?php if($a>0){ echo $a; }?>" class="radiobtn" name="radio" type="radio" value="<?php echo $a+1; ?>" <?php if($select_option!=''){if($a==$select_option){echo 'checked'; }}?>>
					                        <label class="option" for="radio<?php if($a>0){ echo $a; }?>">
					                            <div class="optncrcl"><span class="optnvalue"><?php echo $alphas[$a]; ?></span></div>
					                            <span class="optncntnt"><?php echo @$answr[$a]->choice; ?> </span>
					                        </label>

					                        <?php } ?>

					                         </div>
					                </div>
					            </div>

					        </div>


					   

	<?php }
}
?>

  <input type="hidden" id="hid_attempt" name="hid_attempt" value="<?php echo @$attempte_string; ?>">
  <input type="hidden" id="hid_review1" name="hid_review1" value="<?php echo @$reviewed_string; ?>">
<?php
}*/


function set_timer_update()
{

	$data['status']=0;
		if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}
	$min=$this->input->post('min');
	$secnd=$this->input->post('sec');
	$setid=$this->input->post('setid');
	$exmid=$this->input->post('exmid');

	$check_exist=$this->common_model->common($table_name = 'tbl_exam_timer', $field = array(), $where = array('user_id'=>@$user_id,'set_id'=>@$setid,'user_exam_id'=>@$exmid), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	if(count(@$check_exist)>0)
	{
		$data_arr=array(
			'timer_minute'=>$min,
			'timer_second'=>$secnd

			);
		$this->db->where('user_exam_id',$exmid);
		$this->db->where('user_id',$user_id);
		$this->db->where('set_id',$setid);
		$this->db->update('tbl_exam_timer',$data_arr);


	}
	else
	{

		$data_arr=array(
			'user_exam_id'=>$exmid,
			'user_id'=>$user_id,
			'set_id'=>$setid,
			'timer_minute'=>$min,
			'timer_second'=>$secnd

			);

		$this->db->insert('tbl_exam_timer',$data_arr);

	}

	/*$exm_arr=array(

		'resume'=>'No'

		);
	$this->db->where('user_id',$user_id);
	$this->db->where('set_id',$setid);
	$this->db->update('tbl_user_exam',$exm_arr);

*/

	$data['status']=1;

	echo json_encode(array('workdone'=>$data));
	
}




	 function image_upload()
	{
		//echo $abc;exit;
		$this->load->library('upload');		
		//print_r($_FILES['user_images']['name']);exit;	
		$files = $_FILES;
		//$cpt = count($_FILES['cat_img']['name']);
		//$count = 0;
	/*	$image_array = array();
		for($i=0; $i<$cpt; $i++)
		{*/	
			$_FILES['userfile']['name']= $files['photo']['name'];
        	$_FILES['userfile']['type']= $files['photo']['type'];
        	$_FILES['userfile']['tmp_name']= $files['photo']['tmp_name'];
        	$_FILES['userfile']['error']= $files['photo']['error'];
        	$_FILES['userfile']['size']= $files['photo']['size'];    

        	$this->upload->initialize($this->set_upload_options());
			if($this->upload->do_upload())
			{
				$file_info = $this->upload->data();
				
				$img_config_4['image_library'] = 'gd2';
				$img_config_4['source_image'] = 'assets/uploads/user/'.$file_info['orig_name'];
				$img_config_4['create_thumb'] = FALSE;
				$img_config_4['maintain_ratio'] = FALSE;
				$img_config_4['width']	= 274;
				$img_config_4['height']	= 274;
				$img_config_4['new_image'] ='assets/uploads/user/'.$file_info['orig_name'];
				//echo '<pre>';print_r($img_config_4);
				$this->image_lib->initialize($img_config_4);
				$this->image_lib->resize();
				$this->image_lib->clear();

				
				//echo '<pre>';print_r($file_info);
				$image = $file_info['orig_name'];
				//$count++;
			}
		//}	

		
		//echo '<pre>';print_r($image_array);
		//exit;
		return $image;      
	}

	 private function set_upload_options()
	{   
    //upload an image options
    	$new_name = str_replace(".","",microtime());						
		$config['upload_path'] ='assets/uploads/user/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';				
		$config['file_name']=$new_name;
		
		//echo '<pre>';print_r($config);exit;
		
    	return $config;
	}   



	public function complete_examination()
	{
		

		if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}

		$user_id=$this->session->userdata('activeuser');
		$min=$this->input->post('min');
		$sec=$this->input->post('sec');
		$setid=$this->input->post('setid');
		$exmid=$this->input->post('exmid');
		$endtime=$this->input->post('endtime');
		$remaining_time=$this->input->post('remaining_time');

if($remaining_time=="all done, bye bye"){
	$remaining_time=0;
}

			$set_dtls=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>@$set), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		$set_exam_id=@$set_dtls[0]->exam_id;
$test_type=@$set_dtls[0]->test_type;

$no_of_question= @$set_dtls[0]->q_qty;

$notify_attemp=round($no_of_question*0.75);



		$exam_marks_dtls=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$set_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$negative_mks=0;

		$answer_list=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$exmid), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



		$rank_level=$this->common_model->common($table_name = 'tbl_knockout_level', $field = array(), $where = array('set_id'=>@$setid), $where_or = array(), $like = array(), $like_or = array(), $order = array('level'=>'desc'), $start = '', $end = '');	


$level_id=@$rank_level[0]->level_id;


		$ob_marks="";
		

			$select_optioned=array();

		for($i=0;$i<count($answer_list);$i++)
		{
			$q_id=@$answer_list[$i]->question_master_id;
			$qstn_dtls=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('id'=>@$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


										 $select_id=@$answer_list[$i]->selected_choice;

								$select_optioned=explode(',', $select_id);

	


if($answer_list[$i]->is_correct=='Yes'){

				$mks_each_question=$qstn_dtls[0]->marks;
				$ob_marks=$ob_marks+$mks_each_question;

			}
			if($answer_list[$i]->is_correct=='No')
			{
				$mks_each_question=$qstn_dtls[0]->marks;
				$neg=$mks_each_question*$negative_mks/100;
				$ob_marks=$ob_marks-$neg;
			}
		}	




		
$attempt_count=count($answer_list);



		$attempt_count=count($answer_list);



if($attempt_count>=$notify_attemp)
{
	$data_arr=array(
			'end_time'=>$endtime,
			'obtained_marks'=>$ob_marks,
			'exam_result'=>'complete',
			'attempt_count'=>$attempt_count,
			'is_notify'=>'Yes'

			);

	
		
		$this->db->where('id',$exmid);
		$this->db->where('user_id',$user_id);
		$this->db->update('tbl_user_exam',$data_arr);
}
else{
	$data_arr=array(
			'end_time'=>$endtime,
			'obtained_marks'=>$ob_marks,
			'exam_result'=>'complete',
			'attempt_count'=>$attempt_count,
			

			);

	
		
		$this->db->where('id',$exmid);
		$this->db->where('user_id',$user_id);
		$this->db->update('tbl_user_exam',$data_arr);
}


		$data_arr=array(
			
			'status'=>'completed'

			);
		

		$this->db->where('set_id',$setid);
		$this->db->where('user_id',$user_id);
		$this->db->update('tbl_user_knowledge_quiz',$data_arr);
		
		


		//------------------Insert on Rank Table---------------------------------------------//
    	$user_id=$this->session->userdata('activeuser');

$user_exam=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('id'=>@$exmid,'user_id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$correct_answer=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$exmid,'is_correct'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$wrong_answer=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$exmid,'is_correct'=>'No'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


$user_number=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('set_id'=>@$setid), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


// Rank Index= NCA-((NCA/TNQ)*(TT-TS)-(NWA/TNQ)*(TNQ/TT)*NWA-(NMWA*NQNA))/NC;


//   
//    NCA = Number Of Correct Answer;
//    TNQ = Total Number Of Question;
//    TT = Total Time;
//    TS = Time Save;
//    NWA = Number Of Question Wrong Answer;
//    NMWA = Negative Marks Of Each Wrong Answer (0.25)
//    NQNA = Number Of Question Not Attempt
//    NC = Number Of Contestant For Quiz



$mks_each_question=$qstn_dtls[0]->marks;
$neg=$mks_each_question*$negative_mks/100;

$tnq=@$set_dtls[0]->q_qty;
$nca=count($correct_answer);
$tt=@$set_dtls[0]->exam_duration;
// $ts=strtotime(@$user_exam[0]->start_time)+@$set_dtls[0]->exam_duration-strtotime(@$user_exam[0]->end_time);
$ts=$remaining_time;


$nwa=count($wrong_answer);

	$nmwa=$neg*$nwa;



$nqna=$tnq-$attempt_count;

$nc=count($user_number);

$first=$nca/$tnq;
$second=$ts/$tt;
$third=$nwa/$tnq;
$fourth=$tnq/$tt;

$step1=$first+$second;
$step2=$third*$fourth;
$step3=$step2*$nwa;

$step4=$step1-$step3;
$step5=$step4-$nmwa;
$step6=$step5/$nc;

// $rank_index=$nca+((($nca/$tnq)+($ts/$tt)-($nwa/$tnq)*($tnq/$tt)*$nwa-($nmwa))/$nc);
$rank_index=$nca+$step6;

if($test_type==4){



    	$rank_array=array(

    		'user_id'=>$user_id,
    		'exam_id'=>$set_exam_id,
    		'set_id'=>$setid,
    		'total_marks'=>$ob_marks,
            'rank_index'=>$rank_index,
             'level_id'=>$level_id
    		);
    	$this->db->insert('tbl_user_rank',$rank_array);

    }else{
    	$rank_array=array(

    		'user_id'=>$user_id,
    		'exam_id'=>$set_exam_id,
    		'set_id'=>$setid,
    		'total_marks'=>$ob_marks,
            'rank_index'=>$rank_index

    		);
    	$this->db->insert('tbl_user_rank',$rank_array);
    }
    	//--------------------End-----------------------------------------------------------//

$user_details = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>@$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


               $data['email']=$this->common_model->common($table_name = 'tblemail', $field = array(), $where = array('email_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                $admin_recive=$data['email'][0]->recieve_email;
                $admin_from=$data['email'][0]->from_email;
               
      	$test_type_id=@$set_dtls[0]->test_type;
		$test_dtls=$this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id'=>@$test_type_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$subject_dtls=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>@$set_dtls[0]->subject_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$set_dtls[0]->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


if($level_id==""){
$exam_date=$set_dtls[0]->exam_date;

$exam_time=$set_dtls[0]->exam_time;

}else{

	$exam_date=$set_dtls[0]->exam_date_for_knockout_next_level;

$exam_time=$set_dtls[0]->exam_time_for_knockout_next_level;

}

       $email_data['mail_data']=array
                                    (
                                    'uname'=>@$user_details[0]->user_name,
                                    'uemail'=>@$user_details[0]->login_email,
                                    'uphone'=>@$user_details[0]->login_mob,
                                    'testtype'=>@$test_dtls[0]->test_name,
                                    'uphone'=>@$user_details[0]->login_mob,
                                    'exam_name'=>@$exam_dtls[0]->exam_name,
                                    'test_code'=>@$set_dtls[0]->set_code,
                                    'sub_name'=>@$subject_dtls[0]->section_name,
                                    't_marks'=>@$set_dtls[0]->total_marks,
                                    'o_marks'=>@$user_exam[0]->obtained_marks,
                                    'user_exam'=>@$user_exam,
                                    'end_time'=>@$endtime,
                                    'user_exam'=>@$user_exam,
                                    'exam_date'=>@$exam_date,
                                    'exam_time'=>@$exam_time,
                                    'answer_list'=>@$answer_list,
                                    'rank_index'=>$rank_index,
                                    // 'time_save'=>strtotime(@$user_exam[0]->start_time)+@$set_dtls[0]->exam_duration-strtotime(@$user_exam[0]->end_time),
                                    'time_save'=>$ts,
                                    'number_of_contestant_for_quiz'=>$nc,
                                    'exam_duration'=>@$set_dtls[0]->exam_duration
                                    ); 

                                 // print_r($email_data['mail_data']); 
  @$this->email->set_mailtype("html");

                $html_email_admin = $this->load->view('mail_template/admin_examination_mail',$email_data, true);
                $send_user_mail_html=$this->load->view('mail_template/examination_reply_mail_view',$email_data, true);
                 
            
            $i = rand(000,999); 
            $html=$this->load->view('mail_template/examination_success_pdf',$email_data, true); 

            $html1=$this->load->view('mail_template/knockout_next_level_examination_success_pdf',$email_data, true); 
            // print_r($html); exit;
            $pdfFilePath ='assets/uploads/examination_pdf/'.$i.".pdf";

if($level_id==""){
	 $this->m_pdf->pdf->WriteHTML($html);
}else{
	$this->m_pdf->pdf->WriteHTML($html1);
      }
           
            $this->m_pdf->pdf->Output($pdfFilePath, "F");
            $data_file = file_get_contents($pdfFilePath);
      // exit;   
            $name = $i.'.pdf';
            // force_download($name,$data_file);  


            @$this->email->from($admin_from,  'Surajit Pramanick');
                @$this->email->to($admin_recive);
                @$this->email->subject('Examination Successful - Surajit Pramanick');
                @$this->email->message($html_email_admin);
                @$this->email->attach('assets/uploads/examination_pdf/'.$i.'.pdf');
                @$reponse=@$this->email->send();

               

                @$this->email->from($admin_from, 'Surajit Pramanick');
                @$this->email->to(@$user_details[0]->login_email);
                @$this->email->subject('Examination Successful Reply mail from  Surajit Pramanick');
                @$this->email->message($send_user_mail_html);
                $this->email->attach('assets/uploads/examination_pdf/'.$i.'.pdf');
                @$reponse_reply=@$this->email->send();

$this->session->unset_userdata('token');
$this->session->unset_userdata('activeuser');
		$data['status']=1;
		 echo json_encode(array('workdone'=>$data));
	}


	public function get_score_link()
	{
		$user_exam=$this->input->post('uexam');
		$set=$this->input->post('set');
		$set_dtls=$this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('id'=>@$set), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		$set_slg=@$set_dtls[0]->set_slug;
		$time=time();
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$randstring = str_shuffle(@$characters);
    	$score_link=$set_slg.'/'.$user_exam.'/'.$time.$randstring;
    	$data['score_ready']=@$score_link;



    	//-------------Update redeem point and amount------------------------------------------//

    	if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}

		$user_redeem=$this->common_model->common($table_name = 'tbl_user_redeem', $field = array(), $where = array('user_id'=>@$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		if(count(@$user_redeem)>0)
		{
			$user_redeem_point=@$user_redeem[0]->redeem_point;
			$user_redeem_amount=@$user_redeem[0]->redeem_amount;
		}
		



		$user_exam_details=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('id'=>$user_exam), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$full_marks=@$user_exam_details[0]->total_marks;
		$obtained_marks=@$user_exam_details[0]->obtained_marks;

		if(@$full_marks!='' && @$obtained_marks!='')
		{
			$marks_percentage=($obtained_marks/$full_marks)*100;
			$get_redeem_point=$this->common_model->common($table_name = 'tbl_exam_redeem', $field = array(), $where = array('percentage_from <='=>@$marks_percentage,'percentage_to >='=>@$marks_percentage), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			if(count(@$get_redeem_point)>0)
			{
					$got_redeem_point=@$get_redeem_point[0]->redeem_point;
					$redeem=$this->common_model->common($table_name = 'tbl_redeem', $field = array(), $where = array('id'=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
					$redm_point=@$redeem[0]->redeem_point;
					$redm_amt=@$redeem[0]->redeem_amount;
					$amt_per_point=@$redm_amt/@$redm_point;
					$got_redeem_amount=@$amt_per_point*@$got_redeem_point;
					if(count(@$user_redeem)>0)
					{
						$user_new_redeem_point=@$user_redeem_point+@$got_redeem_point;
						$user_new_redeem_amount=@$user_redeem_amount+@$got_redeem_amount;
						$data_arr=array(
							'redeem_point'=>@$user_new_redeem_point,
							'redeem_amount'=>@$user_new_redeem_amount

							);
						$this->db->where('user_id',$user_id);
						$this->db->update('tbl_user_redeem',$data_arr);
					}
					else
					{
						$user_new_redeem_point=@$got_redeem_point;
						$user_new_redeem_amount=@$got_redeem_amount;
						$data_arr=array(
							'user_id'=>$user_id,
							'redeem_point'=>@$user_new_redeem_point,
							'redeem_amount'=>@$user_new_redeem_amount

							);
						
						$this->db->insert('tbl_user_redeem',$data_arr);
					}

					$redeem_data_arr=array(
						'user_exam_id'=>$user_exam,
						'redeem_point'=>@$got_redeem_point,
						'redeem_amount'=>@$got_redeem_amount,
						'created_on'=>date('Y-m-d H:i:s')

						);
					$this->db->insert('tbl_user_exam_redeem',$redeem_data_arr);
			}
			

			



		}
		



    	//---------------------End----------------------------------------------------------------//
		

        $data['status']=1;
        echo json_encode(array('workdone'=>$data));
    	


	}


	public function complete_examination_show_result()
	{
		

		$user_id=$this->session->userdata('activeuser');
		$exmid=$this->input->post('exmid');
	
		$set=$this->input->post('setid');

		$endtime=$this->input->post('endtime');

		$remaining_time=$this->input->post('remaining_time');

		$set_dtls=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>@$set), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		$set_exam_id=@$set_dtls[0]->exam_id;
$test_type=@$set_dtls[0]->test_type;
$test_select_type=@$set_dtls[0]->test_select_type;

$no_of_question= @$set_dtls[0]->q_qty;

$notify_attemp=round($no_of_question*0.75);

		$exam_marks_dtls=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$set_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$negative_mks=0;

		$answer_list=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$exmid), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


$rank_level=$this->common_model->common($table_name = 'tbl_knockout_level', $field = array(), $where = array('set_id'=>@$set), $where_or = array(), $like = array(), $like_or = array(), $order = array('level'=>'desc'), $start = '', $end = '');	


$level_id=@$rank_level[0]->level_id;




		$ob_marks="";
		
		
	
			$select_optioned=array();

		for($i=0;$i<count($answer_list);$i++)
		{
			$q_id=@$answer_list[$i]->question_master_id;
			$qstn_dtls=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('id'=>@$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


										 $select_id=@$answer_list[$i]->selected_choice;

								$select_optioned=explode(',', $select_id);

	


			if($answer_list[$i]->is_correct=='Yes')
			{

				$mks_each_question=$qstn_dtls[0]->marks;
				$ob_marks=$ob_marks+$mks_each_question;

			}
			if($answer_list[$i]->is_correct=='No')
			{
				$mks_each_question=$qstn_dtls[0]->marks;
				$neg=$mks_each_question*$negative_mks/100;
				$ob_marks=$ob_marks-$neg;
			}
		
		}


	$attempt_count=count($answer_list);



if($attempt_count>=$notify_attemp)
{

	if($test_select_type=='Free Demo')
	{
		$data_arr=array(
			'end_time'=>$endtime,
			'obtained_marks'=>$ob_marks,
			'exam_result'=>'complete',
			'attempt_count'=>$attempt_count,
			'is_notify'=>'No'

			);
	}
else{
	$data_arr=array(
			'end_time'=>$endtime,
			'obtained_marks'=>$ob_marks,
			'exam_result'=>'complete',
			'attempt_count'=>$attempt_count,
			'is_notify'=>'Yes'

			);
	}

	
		
		$this->db->where('id',$exmid);
		$this->db->where('user_id',$user_id);
		$this->db->update('tbl_user_exam',$data_arr);
}
else{

	if($test_select_type=='Free Demo')
	{
		$data_arr=array(
			'end_time'=>$endtime,
			'obtained_marks'=>$ob_marks,
			'exam_result'=>'complete',
			'attempt_count'=>$attempt_count,
			'is_notify'=>'No'
			

			);
	}
	else{
		$data_arr=array(
			'end_time'=>$endtime,
			'obtained_marks'=>$ob_marks,
			'exam_result'=>'complete',
			'attempt_count'=>$attempt_count,
			'is_notify'=>'No'
			

			);
	}
	

	
		
		$this->db->where('id',$exmid);
		$this->db->where('user_id',$user_id);
		$this->db->update('tbl_user_exam',$data_arr);
}




$data_arr=array(
			
			'status'=>'completed'

			);
		

		$this->db->where('set_id',$set);
		$this->db->where('user_id',$user_id);
		$this->db->update('tbl_user_knowledge_quiz',$data_arr);

		


		$set_slg=@$set_dtls[0]->set_slug;
		$time=time();
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$randstring = str_shuffle(@$characters);
    	$score_link=$set_slg.'/'.$exmid.'/'.$time.$randstring;
    	$data['score_ready']=@$score_link;

    	//------------------Inset on Rank Table---------------------------------------------//
   
$user_exam=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('id'=>@$user_exam,'user_id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$correct_answer=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$exmid,'is_correct'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$wrong_answer=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$exmid,'is_correct'=>'No'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


$user_number=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('set_id'=>@$set), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');






$mks_each_question=$qstn_dtls[0]->marks;
$neg=$mks_each_question*$negative_mks/100;

$tnq=@$set_dtls[0]->q_qty;
$nca=count($correct_answer);
$tt=@$set_dtls[0]->exam_duration;
// $ts=strtotime(@$user_exam[0]->start_time)+@$set_dtls[0]->exam_duration-strtotime(@$user_exam[0]->end_time);
$ts=$remaining_time;


$nwa=count($wrong_answer);

	$nmwa=$neg*$nwa;



$nqna=$tnq-$attempt_count;

$nc=count($user_number);

$first=$nca/$tnq;
$second=$ts/$tt;
$third=$nwa/$tnq;
$fourth=$tnq/$tt;

$step1=$first+$second;
$step2=$third*$fourth;
$step3=$step2*$nwa;

$step4=$step1-$step3;
$step5=$step4-$nmwa;
$step6=$step5/$nc;

// $rank_index=$nca+((($nca/$tnq)+($ts/$tt)-($nwa/$tnq)*($tnq/$tt)*$nwa-($nmwa))/$nc);
$rank_index=$nca+$step6;



  
    	$rank_array=array(

    		'user_id'=>$user_id,
    		'exam_id'=>$set_exam_id,
    		'set_id'=>$set,
    		'total_marks'=>$ob_marks,
            'rank_index'=>$rank_index

    		);
    	$this->db->insert('tbl_user_rank',$rank_array);
    


//-------------------------------------------------End----------------------------------------------------//

$user_details = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>@$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


               $data['email']=$this->common_model->common($table_name = 'tblemail', $field = array(), $where = array('email_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                $admin_recive=$data['email'][0]->recieve_email;
                $admin_from=$data['email'][0]->from_email;
               
      	$test_type_id=@$set_dtls[0]->test_type;
		$test_dtls=$this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id'=>@$test_type_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$subject_dtls=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>@$set_dtls[0]->subject_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$set_dtls[0]->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
if($level_id==""){
$exam_date=$set_dtls[0]->exam_date;

$exam_time=$set_dtls[0]->exam_time;

}else{

	$exam_date=$set_dtls[0]->exam_date_for_knockout_next_level;

$exam_time=$set_dtls[0]->exam_time_for_knockout_next_level;

}


       $email_data['mail_data']=array
                                    (
                                    'uname'=>@$user_details[0]->user_name,
                                    'uemail'=>@$user_details[0]->login_email,
                                    'uphone'=>@$user_details[0]->login_mob,
                                    'testtype'=>@$test_dtls[0]->test_name,
                                    'uphone'=>@$user_details[0]->login_mob,
                                    'exam_name'=>@$exam_dtls[0]->exam_name,
                                    'test_code'=>@$set_dtls[0]->set_code,
                                    'sub_name'=>@$subject_dtls[0]->section_name,
                                    't_marks'=>@$set_dtls[0]->total_marks,
                                    'o_marks'=>@$ob_marks,
                                    'end_time'=>@$endtime,
                                    'user_exam'=>@$user_exam,
                                    'exam_date'=>@$exam_date,
                                    'exam_time'=>@$exam_time,
                                    'answer_list'=>@$answer_list,
                                    'rank_index'=>$rank_index,
                                    'time_save'=>$ts,
                                    'number_of_contestant_for_quiz'=>$nc,
                                    'exam_duration'=>@$set_dtls[0]->exam_duration,
                                   
                                    ); 

                                
  

				
				$this->session->unset_userdata('token');	
				//$this->session->unset_userdata('activeuser');

        $data['status']=1;
        echo json_encode(array('workdone'=>$data,'exmid'=>$exmid));
}

public function exam_success_view()
{
	if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}

		$exam_id=  $this->uri->segment(2);
		if($exam_id!='')
		{

			$data['user']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$data['attempted_exam_list']= $this->common_model->get_last_exam_details($exam_id);

		//echo '<pre>'; print_r($data['attempted_exam_list']); exit;
		$this->load->view('common/header');
		$this->load->view('manage_exam/exam_success_view', $data);
		$this->load->view('common/footer');

		}
		else{
			redirect(base_url(),'refresh');
		}
  


}



	public function get_evaluation_link()
	{

		$user_exam=$this->input->post('uexam');
		$set=$this->input->post('set');
		$set_dtls=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$set), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		$exam_id=@$set_dtls[0]->exam_id;
		$exam_type=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		$data['exam_name']=@$exam_type[0]->exam_name;
		$set_slg=@$set_dtls[0]->set_slug;
		$time=time();
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$randstring = str_shuffle(@$characters);
    	$score_link=$user_exam.'/'.$set_slg.'/'.$time.$randstring;
    	$data['evaluation_ready']=@$score_link;
		

        $data['status']=1;
        echo json_encode(array('workdone'=>$data));

	}


	public function score_show()
	{
		if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}
		$set=$this->uri->segment(2);
		$user_exam=$this->uri->segment(3);

		$set_dtls=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('set_slug'=>@$set), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		$set_exam_id=@$set_dtls[0]->exam_id;
		$set_id=@$set_dtls[0]->id;
		
		$score_data['set_id']=$set_id;
		$score_data['user_exam']=$user_exam;

		
		$exam_type=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$set_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$score_data['exam_name']=@$exam_type[0]->exam_name;

		$score_data['pattern']=$this->common_model->common($table_name = 'tbl_set_pattern', $field = array(), $where = array('exam_id'=>@$set_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		//print_r($score_data['pattern']);
		//exit;
		$total_qstn=0;
		for($i=0;$i<count($score_data['pattern']);$i++)
		{
			$total_qstn=$total_qstn+$score_data['pattern'][$i]->quantity;

		}

		$score_data['total_qstn']=@$total_qstn;

		$marks=0;
        $set_question=$this->join_model->get_knowledge_set_question($set_id);
        
        
        for($m=0;$m<count($set_question);$m++)
        {
        	$marks=$marks+@$set_question[$m]->marks;
        	
        }
      

        $score_data['full_marks']=@$marks;

		$exam_marks_dtls=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$set_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$negative_mks=@$exam_marks_dtls[0]->negative_marks;

		$score_data['negative_mark']=@$negative_mks;

		$answer_list=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$user_exam), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		//print_r($answer_list);exit;

		$ob_marks=0;

			$correct_count=0;
			$incorrect_count=0;
			for($i=0;$i<count($answer_list);$i++)
		{
			$q_id=@$answer_list[$i]->question_master_id;

			$qstn_dtls=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('id'=>@$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			if($answer_list[$i]->selected_choice==@$answer_list[$i]->correct_choice)
			{
				$mks_each_question=$qstn_dtls[0]->marks;
				$ob_marks=$ob_marks+$mks_each_question;
				$correct_count++;

			}
			else
			{
				$mks_each_question=$qstn_dtls[0]->marks;
				$ob_marks=$ob_marks-($mks_each_question*$negative_mks/100);
				$incorrect_count++;
			}
			

		}


		$score_data['ob_marks']=$ob_marks;
		$score_data['correct_attempt']=$correct_count;
		$score_data['incorrect_attempt']=$incorrect_count;
		$score_data['total_attempt']=count(@$answer_list);

		$exam_record=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('id'=>@$user_exam), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$score_data['exam_stat']=@$exam_record[0]->exam_result;


		$exam_timer=$this->common_model->common($table_name = 'tbl_exam_timer', $field = array(), $where = array('user_exam_id'=>@$user_exam,'user_id'=>$user_id,'set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$question_set=$this->common_model->common($table_name = 'tbl_question_set', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		$total_quest=count($question_set);
		$all_marks=0;
		for($q=0;$q<count($question_set);$q++)
		{
			$question_marks=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('id'=>@$question_set[q]->question_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$all_marks=$all_marks+$question_marks[0]->marks;

		}

		$exam_time_marks=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$set_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		$type_of_exam=$exam_type[0]->type;
		if($type_of_exam!='practice')
		{
				$total_time=@$total_quest*@$exam_time_marks[0]->time_per_marks;
				$total_min=$total_time-1;
				$total_sec=60;

				$min_remain=@$exam_timer[0]->timer_minute;
				$sec_remain=@$exam_timer[0]->timer_second;
				if($min_remain==0 && $sec_remain==0)
				{
					$score_data['progress']=100;
					$score_data['spd']=$score_data['total_attempt']/($total_time*60)*3600;
					$score_data['tt']=$total_time*60;

				}
				else
				{
					$used_min=$total_min-$min_remain;

					$used_sec=$total_sec-$sec_remain;
					$total_used_sec=$used_min*60+$used_sec;
					$total_time_sec=$total_time*60;

					$used_percent=$total_used_sec/$total_time_sec*100;
					$score_data['progress']=$used_percent;
					$score_data['spd']=$score_data['total_attempt']/$total_used_sec*3600;
					$score_data['tt']=$used_min*60+$used_sec;

				}

		}
		else
		{
			$used_min=$exam_timer[0]->timer_minute;
			$used_sec=$exam_timer[0]->timer_second;
			$total_used_sec=$used_min*60+$used_sec;
			$score_data['spd']=$score_data['total_attempt']/$total_used_sec*3600;
			$score_data['tt']=$total_used_sec;

			
			$all_qs=@$total_qstn;
			$all_att=count(@$answer_list);
			$qs_progress_percent=@$all_att/@$all_qs*100;
			$score_data['progress']=$qs_progress_percent;

		}
		

if($score_data['total_attempt']!=0 || $score_data['total_attempt']!='')
{
	$score_data['acc']=$correct_count/@$score_data['total_attempt']*100;

}
else
{
		$score_data['acc']=0;
}
		

		 $score_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


		$type_of_exam=$exam_type[0]->type;
		 if(@$type_of_exam=='practice')
		 {
				 	$all_category=$this->common_model->common($table_name = 'tbl_category', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
				 $pract_exam_ids=array();
				 $x=0;
				 for($c=0;$c<count($all_category);$c++)
				 {
				 	if($all_category[$c]->exam_id!='')
				 	{
				 		$pract_exam_ids[$x]=$all_category[$c]->exam_id;
				 		$x++;
				 	}

				 	
				 }
				 $prac_uniq=array_unique($pract_exam_ids);
				 $pract_id_val=array_values($prac_uniq);
				 //print_r($pract_id_val);
				 $all_practice_exams=0;
				 for($id=0;$id<count($pract_id_val);$id++)
				 {
				 	if($pract_id_val[$id]!=0)
				 	{
				 		$practice_by_exam_id=$this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('exam_id'=>$pract_id_val[$id]), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
				 	echo count($practice_by_exam_id);

				 	$all_practice_exams=$all_practice_exams+count($practice_by_exam_id);
				 	}
				 	

				 }
				// exit;
				 $score_data['all_exams']=@$all_practice_exams;
				 $score_data['complete_exam']=$this->join_model->get_completed_exam_practice(@$user_id);
				 $score_data['remain_exam']= @$all_practice_exams-count(@$score_data['complete_exam']);
				// print_r($sore_data['remain_exam']);exit;

		 }
		 else
		 {

		 	$plan_data=$this->join_model->get_user_activated_plan(@$user_id);
       
	        $paper_qty=0;
	         for($i=0;$i<count($plan_data);$i++)
	         {
	         	
	         	$paper_qty=$paper_qty+$plan_data[$i]->total_paper;

	         }

		 	
		 	$score_data['complete_exam']=$this->join_model->get_completed_exam_except_practice(@$user_id);

          	$score_data['remain_exam']=$paper_qty;
          	$score_data['all_exams']=count(@$score_data['complete_exam'])+$paper_qty;

          	 $score_data['ongoing']=$this->join_model->get_completed_exam_except_practice_incomplete(@$user_id);
		 }

		 

		 //$all_done_exam=$this->join_model->get_all_complete_exam($user_exam,);
		 //$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('id'=>$user_exam,'exam_result'=>'complete'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		 /*echo '<pre>';
		 print_r($pract_id_val);exit;*/

		 $score_data['rank']=$this->join_model->get_ranks_by_exam($set_exam_id);
		 /*echo '</pre>';
		 print_r($score_data['rank']);
		 echo '</pre>';
		 exit;*/

		$this->load->view('common/header');

		$this->load->view('manage_exam/score_summary1',$score_data);
		$this->load->view('common/footer_summary',$score_data);

	}


	public function exit_exam()
	{
		$user=$this->session->userdata('activeuser');
        if($user!='')
        {
        	$this->session->unset_userdata('token');
            //$this->session->unset_userdata('activeuser');
            //$this->session->sess_destroy();
        }
        echo  "<script type='text/javascript'>";
		echo "window.close();";
		echo "</script>";

           /* $data['status']=1;
       		echo json_encode(array('workdone'=>$data));*/
            

        
       
       

	}


	public function evaluate_examination()
	{
		if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}

		$user_exam_id=$this->uri->segment(2);
		//echo $user_exam_id;



		$exam_record=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('id'=>@$user_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$set_id=@$exam_record[0]->set_id;
		$exam_data['score']=@$exam_record[0]->obtained_marks;

		$set_dtls=$this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('id'=>@$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$exam_id=$set_dtls[0]->exam_id;

		//echo $exam_id;

		$exam_data['pattern']=$this->join_model->get_pattern(@$exam_id);
		//print_r($exam_data['pattern']);exit;

		$exam_data['exam_type'] = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$exam_data['user_details'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>@$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


		$exam_data['set_id']=$set_id;
		$exam_data['examid']=$exam_id;
		$exam_data['user_exam']=$user_exam_id;
		$exam_data['st_name']=$exam_data['exam_type'][0]->exam_name;

		$section_id=$exam_data['pattern'][0]->section_id;


		$exam_data['qstn']=$this->join_model->get_question_of_section($set_id,$section_id);

		//print_r($exam_data['qstn']);exit;

				$pattern_set=$this->common_model->common($table_name = 'tbl_set_pattern', $field = array(), $where = array('exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
				//print_r($pattern_set);

		        $exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		        $qnt=0;
		        for($i=0;$i<count($pattern_set);$i++)
		        {
		        	$qnt=@$qnt+@$pattern_set[$i]->quantity;

		        }
		        $exam_data['dur']=@$qnt*@$exam_time[0]->time_per_marks;
		        $exam_data['negative_marks']=@$exam_data['qstn'][0]->marks*@$exam_time[0]->negative_marks/100;
		       // print_r($exam_data['dur']);exit;


		         //$exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		        			  $marks=0;
                              $set_question=$this->join_model->get_set_question($set_id);
                              $pass_ids=array();
                              
                              for($m=0;$m<count($set_question);$m++)
                              {
                                $marks=$marks+$set_question[$m]->marks;
                                
                              }
                              $passage_question=$this->join_model->get_set_passage_question($set_id);

                              if(count(@$passage_question)>0)
                              {
	                              	for($m=0;$m<count(@$passage_question);$m++)
	                              	{
	                                	$marks=$marks+@$passage_question[$m]->marks;
	                                
	                              	}

                              }
                               
                              $exam_data['full_marks']=$marks;



		$this->load->view('manage_exam/exam_evaluation_view',$exam_data);



	}

	public function get_all_question_by_section()
	{

		$data['status']=0;
		if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}

		$set_id=$this->input->post('set');
		$section_id=$this->input->post('section');
		
		//echo $set_id.$section_id;
if($section_id==3)
{
		$qstn=$this->join_model->get_passage_question_of_section($set_id,$section_id);
		//print_r($qstn);
		$count=1;
	for($q=0;$q<count(@$qstn);$q++)
	{
			$q_id= @$qstn[$q]->id;
			$pss_id=@$qstn[$q]->passage_id;
			$exam_id=@$qstn[$q]->exam_id;

			$passage=$this->common_model->common($table_name = 'tbl_passage', $field = array(), $where = array('id'=>@$pss_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			//print_r($passage);

			$answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$alphas = range('A', 'Z');

			$exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			 $negative_marks=@$qstn[0]->marks*@$exam_time[0]->negative_marks/100;

			$x=floor($count / 5);
			$y=$count % 5;
			if($y>0)
			{
				$psg_no=$x+1;
			}
			else
			{
				$psg_no=$x;
			}




		
		?>
<div class="inrmain abc">

    <div class="leftmain ful-width">
        <div class="quehdng">
            <span class="quehdnglft">Passage.<?php echo @$psg_no;?></span>
            <span class="quehdngryt">
                <span class="markdef">Maximum Mark. <span class="green"><?php echo number_format(@$qstn[$q]->marks,2);?></span></span>
                <span class="markdef">Negative Mark. <span class="green red"><?php echo @$negative_marks; ?></span></span>
                <!-- <span class="markdef"><span class="triangle"></span>Report</span> -->
            </span>
        </div>
        <!--normal que Single choice-->
        <div id="about" class="nano questionoutr ful-width abc" style="display:block">
            <div class="nano-content abc">


                <div class="questioninr">
                  

                   <?php echo @$passage[0]->description; ?>
                    <p class="questioninr"><b><?php echo $count; ?>) <?php echo @$qstn[$q]->question; ?></b></p>

                    <div class="optninr">



                     <?php 

                    //$q_id= @$qs->question_id;
                    $user_exam_id=$this->input->post('u_exam');

                    $answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                    $selected_answr=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('question_master_id'=>@$q_id,'user_exam_id'=>@$user_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                    $selected_choice=@$selected_answr[0]->selected_choice;
                    $correct_choice=@$selected_answr[0]->correct_choice;

                    $alphas = range('A', 'Z');
                   for($a=0;$a<count(@$answr);$a++){

                    ?>





                     <input id="radio<?php if($a>0){ echo $a; }?>" class="radiobtn" name="radio" type="radio" value="<?php echo $a+1; ?>">
                        <label class="option <?php if(@$answr[$a]->id==@$selected_choice){if(@$correct_choice==@$answr[$a]->id){echo 'right-test';}else{ echo 'wrong-test'; }}?>" for="radio<?php if($a>0){ echo $a; }?>"<?php if($a>0){ echo $a; }?>>
                            <div class="optncrcl"><span class="optnvalue <?php if(@$answr[$a]->id==@$selected_choice){if(@$correct_choice==@$answr[$a]->id){echo 'right-test-value';}else{ echo 'wrong-test-value'; }}?>"><?php echo $alphas[$a]; ?></span></div>
                            <span class="optncntnt"><?php echo @$answr[$a]->choice; ?> </span>
                        </label>

                     

                        <?php } ?>




                    </div>
                </div>

                
                <a class="arrow_slide2 test-view" href="javascript:void(0);" onclick="answer_show_hide('<?php echo @$qstn[$q]->id; ?>')">VIEW ANSWER</a>
    
  <div class="ans-bx" id="ans_box_<?php echo @$qstn[$q]->id; ?>">
  <?php for($i=0;$i<count($answr);$i++)
  {
    if(@$answr[$i]->is_correct== 'Yes')
        {
            echo '<span class="optnvalue">'.@$alphas[$i].'</span>  ' .@$answr[$i]->choice;


        }


  }
  ?>
   </div>

   <div class="exp-box" id="exp_box_<?php echo @$qstn[$q]->id; ?>" style="display: none;">
      <h3>Explanation :</h3>
      <p><?php echo @$qstn[$q]->explanation; ?></p>
  </div>


  <div class="chckbx_ques">




            </div>

        </div>

</div>







</div>

</div>
<?php
$count++;}

}
else
{
		$qstn=$this->join_model->get_question_of_section($set_id,$section_id);
		//echo '<pre>';
		//print_r($qstn);
$count=1;

		for($q=0;$q<count($qstn);$q++)
		{
			$q_id= @$qstn[$q]->question_id;
			$exam_id=@$qstn[$q]->exam_id;

			$answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$alphas = range('A', 'Z');

			$exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		 	$negative_marks=@$qstn[$q]->marks*@$exam_time[0]->negative_marks/100;

		
		




		
?>

<div class="inrmain abc">

    <div class="leftmain ful-width">
        <div class="quehdng">
            <span class="quehdnglft">Question.<?php echo $count; ?></span>
            <span class="quehdngryt">
                <span class="markdef">Maximum Mark. <span class="green"><?php echo number_format(@$qstn[$q]->marks,2);?></span></span>
                <span class="markdef">Negative Mark. <span class="green red"><?php echo @$negative_marks; ?></span></span>
                <!-- <span class="markdef"><span class="triangle"></span>Report</span> -->
            </span>
        </div>
        <!--normal que Single choice-->
        <div id="about" class="nano questionoutr ful-width abc" style="display:block">
            <div class="nano-content abc">


                <div class="questioninr">
                   <?php echo @$qstn[$q]->question; ?>

                    <div class="optninr">



                     <?php 

                    //$q_id= @$qs->question_id;
                    $user_exam_id=$this->input->post('u_exam');

                    $answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                    $selected_answr=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('question_master_id'=>@$q_id,'user_exam_id'=>@$user_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                    $selected_choice=@$selected_answr[0]->selected_choice;
                    $correct_choice=@$selected_answr[0]->correct_choice;

                    $alphas = range('A', 'Z');
                   for($a=0;$a<count(@$answr);$a++){

                    ?>





                     <input id="radio<?php if($a>0){ echo $a; }?>" class="radiobtn" name="radio" type="radio" value="<?php echo $a+1; ?>">
                        <label class="option <?php if(@$answr[$a]->id==@$selected_choice){if(@$correct_choice==@$answr[$a]->id){echo 'right-test';}else{ echo 'wrong-test'; }}?>" for="radio<?php if($a>0){ echo $a; }?>"<?php if($a>0){ echo $a; }?>>
                            <div class="optncrcl"><span class="optnvalue <?php if(@$answr[$a]->id==@$selected_choice){if(@$correct_choice==@$answr[$a]->id){echo 'right-test-value';}else{ echo 'wrong-test-value'; }}?>"><?php echo $alphas[$a]; ?></span></div>
                            <span class="optncntnt"><?php echo @$answr[$a]->choice; ?> </span>
                        </label>

                     

                        <?php } ?>




                    </div>
                </div>

                
                <a class="arrow_slide2 test-view" href="javascript:void(0);" onclick="answer_show_hide('<?php echo @$qstn[$q]->question_id; ?>')">VIEW ANSWER</a>
    
  <div class="ans-bx" id="ans_box_<?php echo @$qstn[$q]->question_id; ?>"><?php for($i=0;$i<count($answr);$i++)
  {
    if(@$answr[$i]->is_correct== 'Yes')
        {
            echo '<span class="optnvalue">'.@$alphas[$i].'</span>  ' .@$answr[$i]->choice;


        }


  }
  ?>
   </div>

    <div class="exp-box" id="exp_box_<?php echo @$qstn[$q]->question_id; ?>" style="display: none;">
      <h3>Explanation :</h3>
      <p><?php echo @$qstn[$q]->explanation; ?></p>
  </div>

  
  <div class="chckbx_ques">




            </div>

        </div>

</div>







</div>

</div>

			

<?php 
	$count++; }}}





public function put_resume_request()
{

	$data['status']=0;
	 	if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}


	$set=$this->input->post('set');
	$user_plan_id=$this->input->post('userplan');
	$reason=$this->input->post('reason');
	$current_date=date("Y-m-d H:i:s");   
	

	$data_arr=array(

		'user_id'=>$user_id,
		'user_plan_id'=>$user_plan_id,
		'set_id'=>$set,
		'reason'=>$reason,
		'created_on'=>$current_date
		);


	$user_dtls = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$set_dtls = $this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('id'=>$set), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$set_name=@$set_dtls[0]->set_name;

		$user_plan_dtls = $this->common_model->common($table_name = 'tbl_user_plan_details', $field = array(), $where = array('id'=>$user_plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$plan_id=$user_plan_dtls[0]->plan_id;

		$plan_dtls=$this->common_model->common($table_name = 'tbl_plan', $field = array(), $where = array('id'=>$plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$plan_name=@$plan_dtls[0]->plan_name;
		$plan_valid=@$user_plan_dtls[0]->validity_date;

		$user_email=@$user_dtls[0]->login_email;
		$user_name=@$user_dtls[0]->first_name;
		/*$user_code=$user_dtls[0]->user_code;
		$created_on=$user_dtls[0]->created_on;*/


	 $data['email']=$this->common_model->common($table_name = 'tblemail', $field = array(), $where = array('email_id'=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

            
            $admin_recive=@$data['email'][0]->recieve_email;
            $admin_from=@$data['email'][0]->from_email;

             $email_data['mail_data']=array
            (
                'user_name'=>@$user_name ,
                'user_email'=>@$user_email,
                'set_name'=>@$set_name,
                'plan_name'=>@$plan_name,
                'plan_validity'=>@$plan_valid
                
            );



            $this->email->set_mailtype("html");
            
          
            $html_email_user=$this->load->view('mail_template/request_mail_user',$email_data, true);
            $html_email_admin=$this->load->view('mail_template/request_mail_admin',$email_data, true);

            $this->email->from($admin_from);
            $this->email->to($user_email);
            $this->email->subject('Request Successfully Sent...');
            $this->email->message($html_email_user);
            @$reponse=$this->email->send();

            $this->email->from($admin_from);
            $this->email->to($admin_recive);
            $this->email->subject('Examination Resume request....');
            $this->email->message($html_email_admin);
            @$reponse1=$this->email->send();


             if(@$reponse && @$reponse1)
            {
                
                $data['status']=1;
                $this->db->insert('tbl_exam_resume_request',$data_arr);
            }
            else
            {
                
                $data['status']=4;
            }

	
	

	echo json_encode(array('workdone'=>$data));
}
	
	
public function blank()
{
	
			$foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$this->load->view('common/header');
		$this->load->view('manage_exam/score_summary1');
		$this->load->view('common/footer',$foot_data);

}


public function start_knockout_examination()
	{

	if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}
        $user_id=$this->session->userdata('activeuser');
		$tkn=$this->session->userdata('token');
		$set_slug=$this->uri->segment(2);
		$lnk_tkn=$this->uri->segment(3);
		$user_plan_id=$this->uri->segment(4);
		$random_url=$this->uri->segment(5);

	



					$set_dtls = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('set_slug'=>@$set_slug), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$set_id=@$set_dtls[0]->kq_id;
				$exam_id=@$set_dtls[0]->exam_id;
				$exam_data['exam']=@$exam_id;
			$test_type=@$set_dtls[0]->test_type;

				$exam_data['exam_type'] = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$exam_data['user_details'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>@$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			

				$exam_data['next_level'] = $this->common_model->common($table_name = 'tbl_knockout_level', $field = array(), $where = array('set_id'=>@$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('level'=>'DESC'), $start = '', $end = '');


				$exam_data['set_id']=$set_id;

				$exam_data['level_id']=$exam_data['next_level'][0]->level_id;

				$subject_id=@$set_dtls[0]->subject_id;

				$exam_data['qstn']=$this->join_model->get_question_of_section_knockouttest($set_id,$subject_id,$exam_data['level_id']);
			
// print_r($exam_data['qstn']) ; exit;
		
				$marks=0;
		        $set_question=$this->join_model->get_knockout_set_question($set_id,$exam_data['level_id']);
		        
		        
		      
		        	$marks=@$set_question[0]->total_marks;
		        	
		
				 $current_date = date("Y-m-d H:i:s"); 


				 $type=@$exam_data['exam_type'][0]->type;

					 	 $data_arr=array(
							 				'user_id'=>$user_id,
							 				'set_id'=>$set_id,
							 				'user_plan_id'=>$user_plan_id,
							 				'start_time'=>$current_date,
							 				'total_marks'=>$marks,
							 				'created_on'=>$current_date,
							 				'test_type'=>$test_type,
							 				'level_id'=>$exam_data['level_id']
							 				);
							// print_r($data_arr);exit;
							 $this->db->insert('tbl_user_exam',$data_arr);
							 $user_exam=$this->db->insert_id();


							   $user_plan=$this->common_model->common($table_name = 'tbl_user_plan_details', $field = array(), $where = array('id'=>@$user_plan_id,'user_id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
							   $paper_qty=$user_plan[0]->total_paper;
							   if($paper_qty>0)
							   {
							   	$paper_qty=$paper_qty-1;
							   }

							   $data_arr=array(
							   	'total_paper'=>$paper_qty
							   	);

							   $this->db->where('user_id',@$user_id);
							   $this->db->where('id',@$user_plan_id);
							   $this->db->update('tbl_user_plan_details',$data_arr);

				
        	

				


				redirect($this->url->link(126).'/'.$set_slug.'/'.$lnk_tkn.'/'.$user_exam.'/'.$user_plan_id.'/'.$random_url);

		
		
		

	

	}

		public function view_knockout_examination()
	{


		if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}
        $user_id=$this->session->userdata('activeuser'); 
	

		$set_slug=$this->uri->segment(2);

		$tkn=$this->session->userdata('token');
		$set_slug=$this->uri->segment(2);
		$lnk_tkn=$this->uri->segment(3);
		$user_plan_id=$this->uri->segment(5);
		$random_url=$this->uri->segment(6);

		$exam_data['user_exam']=$this->uri->segment(4);

		if(@$tkn!=$lnk_tkn)
		{
			redirect($this->url->link(54));

		}
		else
		{
		
		$exam_data['set_dtls'] = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('set_slug'=>@$set_slug), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$set_id=@$exam_data['set_dtls'][0]->kq_id;
		$exam_id=@$exam_data['set_dtls'][0]->exam_id;
		$exam_data['exam']=@$exam_id;
		$exam_data['subject_id']=@$exam_data['set_dtls'][0]->subject_id;
		$exam_data['chapter_id']=@$exam_data['set_dtls'][0]->chap_id;
		$exam_data['dur']=@$exam_data['set_dtls'][0]->exam_duration;
		// $exam_data['set_dtls']=@$exam_data['set_dtls'][0]->exam_duration;

		$exam_data['pattern'] = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$exam_data['exam_type'] = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$exam_data['user_details'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>@$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
				
		// echo $exam_data['user_details'][0]->first_name; exit;

				$exam_data['next_level'] = $this->common_model->common($table_name = 'tbl_knockout_level', $field = array(), $where = array('set_id'=>@$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('level'=>'desc'), $start = '', $end = '');

			

				$exam_data['level_id']=$exam_data['next_level'][0]->level_id;

				$exam_data['set_id']=$set_id;
				
				$subject_id=@$exam_data['set_dtls'][0]->subject_id;
		$exam_data['qstn']=$this->join_model->get_question_of_section_knockouttest($set_id,$subject_id,$exam_data['level_id']);
	
		        $exam_data['user_plan_id']=@$user_plan_id;


		        $exam_data['st_name']=$exam_data['exam_type'][0]->exam_name;
// print_r($exam_data['user_details']); exit;
		        
		        	$this->load->view('manage_exam/knockout_examination_view',$exam_data);
		       
		      
				
			}

	
		
	}

		public function save_next_question_for_knockout()
	{
		$e_id=$this->input->post('e_id');
		$s_id=$this->input->post('s_id');
		$se_id=$this->input->post('se_id');
		$q_id=$this->input->post('q_id');
		$review=$this->input->post('rvw');
		$answer_no=$this->input->post('answ');
		$level_id=$this->input->post('level_id');

		// echo $level_id;
		//$attmp_list=$this->input->post('attmp_list');
		//$revw_list=$this->input->post('revw_list');
$is_correct='No';
		if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}
		$current_date= date("Y-m-d H:i:s");  

		$answer_details=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>@$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		//print_r($answer_details);
$choice=array();
for ($i=0; $i <count($answer_no) ; $i++) { 
	
	

	$counter=@$answer_no[$i]-1;
		
				$choice[$i]=@$answer_details[$counter]->id;

		
}
$selected_choice= implode(',', @$choice);
		
 // echo $selected_choice;
		$corect_choice=0;
		for($i=0;$i<count(@$answer_details);$i++)
		{

			if(@$answer_details[$i]->is_correct=='Yes')
			{
				$corect_choice=@$answer_details[$i]->id;
				$choice_no=$i+1;
			}

		}

// 		print_r($answer_no);
// $answer_no=explode(',', $answer_no);
		// echo count($choice);
if($choice!=""){

for ($i=0; $i < count($choice) ; $i++) { 
	
		if(@$corect_choice==@$choice[$i])
		{
			$is_correct='Yes';
		}
		
}}

	
$this->db->select('*');
$this->db->from('tbl_user_exam');
$this->db->where('user_id',$user_id);
$this->db->where('set_id',$s_id);
$this->db->where('level_id',$level_id);
$query=$this->db->get();
$user_exam_record=$query->result();

	// $user_exam_record=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('user_id'=>@$user_id,'set_id'=>@$s_id,'level_id'=>$level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



	$user_exam_id=@$user_exam_record[0]->id;
	//echo 'user examintion'.$user_exam_id;

		if(@$review!='')
		{
			
			$check_record=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$user_exam_id,'question_master_id'=>@$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			if(count(@$check_record)>0)
			{
				$data_array=array(
				
				'selected_choice'=>@$selected_choice,
				'correct_choice'=>@$corect_choice,
				'is_correct'=>@$is_correct,
				'is_review'=>'Yes',
				'created_on'=>$current_date
				);
				$this->db->where('user_exam_id',@$user_exam_id);
				$this->db->where('question_master_id',@$q_id);
				$this->db->update('tbl_user_exam_details',$data_array);


			}
			else
			{


$data_array=array(
					'user_exam_id'=>@$user_exam_id,
					'question_master_id'=>@$q_id,
					'selected_choice'=>@$selected_choice,
					'correct_choice'=>@$corect_choice,
					'is_correct'=>@$is_correct,
					'is_review'=>'Yes',
					'created_on'=>$current_date
				);
				$this->db->insert('tbl_user_exam_details',$data_array);


			}


			

			

		}
		
		if( @$review=='')
		{
			//echo 'Checking---------';

			$check_record=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$user_exam_id,'question_master_id'=>@$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			//print_r(@$check_record);

			if(count(@$check_record)>0)
			{
				if($selected_choice!=""){
				$data_array=array(
				
				'selected_choice'=>@$selected_choice,
				'correct_choice'=>@$corect_choice,
				'is_correct'=>@$is_correct,
				'is_review'=>'No',
				'created_on'=>$current_date

				);
				$this->db->where('user_exam_id',@$user_exam_id);
				$this->db->where('question_master_id',@$q_id);
				$this->db->update('tbl_user_exam_details',$data_array);

}else{
	$this->db->where('user_exam_id',@$user_exam_id);
				$this->db->where('question_master_id',@$q_id);
				$this->db->delete('tbl_user_exam_details');
}

			}
			else
			{ 
				//echo 'checking2';
if($selected_choice!=""){
	

				$data_array=array(
				'user_exam_id'=>$user_exam_id,
				'question_master_id'=>$q_id,
				'selected_choice'=>@$selected_choice,
				'correct_choice'=>@$corect_choice,
				'is_correct'=>@$is_correct,
				'is_review'=>'No',
				'created_on'=>$current_date

				);
				//echo '<pre>';
				//print_r($data_array);
				$this->db->insert('tbl_user_exam_details',$data_array);
              }

			}
			
			

		}
		

		$attempted_question=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$user_exam_id,'is_review'=>'No'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$attempted_question_ids=array();
		if(count($attempted_question)>0)
		{
			for($at=0;$at<count($attempted_question);$at++)
			{
				$attempted_question_ids[$at]=@$attempted_question[$at]->question_master_id;

			}

			$attempte_string=implode(',', @$attempted_question_ids);
		}

		$reviewed_question=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$user_exam_id,'is_review'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$reviewed_question_ids=array();

		if(count($reviewed_question)>0)
		{

			for($rv=0;$rv<count($reviewed_question);$rv++)
			{
				$reviewed_question_ids[$rv]=@$reviewed_question[$rv]->question_master_id;

			}

			$reviewed_string = implode(',', @$reviewed_question_ids);
		}
		

		
				$qstn=$this->join_model->get_question_of_section_knockouttest($s_id,$se_id,$level_id);
				$get_next=array();
				for($i=0;$i<count(@$qstn);$i++)
				{
					if(@$qstn[$i]->id==@$q_id)
					{
						$get_next[0]=@$qstn[$i+1];
						$q_no=$i+2;
					}

				}
				// print_r($get_next);
				$next_q_id=@$get_next[0]->id;
				$next_s_id=@$get_next[0]->set_id;
				$next_e_id=@$get_next[0]->exam_id;
				$next_se_id=@$get_next[0]->section_id;
				$marks=@$get_next[0]->marks;
				
			$exam_all_pattern=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>@$next_s_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
						$next_sec=array();
						$last_pattern_index=count($exam_all_pattern)-1;
						for($i=0;$i<count($exam_all_pattern);$i++)
						{
							if($exam_all_pattern[$i]->subject_id==$se_id)
							{
									if($i==$last_pattern_index)
									{
										//$next_sec=array();
										$next_sec[0]=$exam_all_pattern[0];
									}
									else
									{
										$next_sec[0]=$exam_all_pattern[$i+1];
									}
									
							}
						
						}
						// print_r($next_sec);


						$next_section_id=$next_sec[0]->subject_id;

						   

	$next_qstn=$this->join_model->get_question_of_section_knockouttest($s_id,$next_section_id,$level_id);
								//echo '<pre>';
								//print_r($qstn);
								$q_id= @$next_qstn[0]->que_id;
								$exam_id=@$next_qstn[0]->exam_id;



						$nex_answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$next_q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

							
// print_r($nex_answr);
								$alphas = range('A', 'Z');

								// $next_exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

								// $negative_marks=@$qstn[0]->marks*@$next_exam_time[0]->negative_marks/100;

								$question_prev_status=$this->join_model->get_knockout_exam_question_details($user_id,$s_id,$next_q_id,$level_id);

								 
								// echo $q_id;								 		
								$select_optioned=array();
										 $select_id=@$question_prev_status[0]->selected_choice;

								$select_optioned=explode(',', $select_id);

// print_r($select_optioned);
								 $result=5;

if($get_next[0] !=""){

								?>

							
<input type="hidden" name="hid_review" id="hid_review" value="<?php echo @$question_prev_status[0]->is_review;?>">
<input type="hidden" name="hid_e" id="hid_e" value="<?php echo @$next_e_id;?>">
<input type="hidden" name="hid_s" id="hid_s" value="<?php echo @$next_s_id;?>">
<input type="hidden" name="hid_se" id="hid_se" value="<?php echo @$next_se_id;?>">
<input type="hidden" name="hid_q" id="hid_q" value="<?php echo @$next_q_id;?>">
<input type="hidden" name="level_id" id="level_id" value="<?php echo @$level_id;?>">
		<div class="quehdng">
            <span class="quehdnglft">Question.<?php echo @$q_no;?></span>
            <span class="quehdngryt">
                <!-- <span class="markdef">Maximum Mark. <span class="green"><?php echo number_format((float)@$marks, 2, '.', '');?></span></span>
                <span class="markdef">Negative Mark. <span class="green red"><?php  echo '0.25';?></span></span> -->
                <!--<span class="markdef"><span class="triangle"></span>Report</span>-->
            </span>
        </div>
        <!--normal que Single choice-->
        <div id="about" class="nano questionoutr" style="display:block">
            <div class="nano-content">


                <div class="questioninr">
                <div class="question-bx">
                    <?php echo @$get_next[0]->question; ?>
                    </div>
                  <div class="col-md-8">
<h2 class="answer-txt">Answer Option :</h2>
  
                    <div class="optninr">

                    <?php  $qs_count=0; for($a=0;$a<count(@$nex_answr);$a++){?>
                        <input id="radio<?php if($a>0){ echo $a; }?>" class="radiobtn" name="radio[]" type="radio" value="<?php echo $a+1; ?>" <?php if($select_optioned!=''){ for ($i=0; $i < count($select_optioned); $i++) { 
                        	
                         if($nex_answr[$a]->id==$select_optioned[$i]){echo 'checked'; }} }?>>
                        <label class="option" for="radio<?php if($a>0){ echo $a; }?>">
                            <div class="optncrcl"><span class="optnvalue"><!-- <?php echo $alphas[$qs_count]; ?> --></span></div>
                            <span class="optncntnt"><?php echo strip_tags(@$nex_answr[$qs_count]->choice); ?> </span>
                        </label>

                        <?php $qs_count++; } ?>

                         </div>
                     </div>




                </div>
            </div>

        </div>




  <input type="hidden" id="hid_attempt" name="hid_attempt" value="<?php echo @$attempte_string; ?>">
  <input type="hidden" id="hid_review1" name="hid_review1" value="<?php echo @$reviewed_string; ?>">


<?php
	} else{ echo $result;} 
}



	public function get_knockout_single_question()
	{

		/*if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}*/


		$q_id=$this->input->post('q_id');
		$q_no=$this->input->post('q_no');
		$s_id=$this->input->post('s_id');
		$level_id=$this->input->post('level_id');

		if($this->session->userdata('activeuser')!='')
		{
			$user_id=$this->session->userdata('activeuser');
		}
		else
		{
			redirect($this->url->link(1));
		}

		


		$qstn=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		$section_id=$qstn[0]->section_id;

		

		$answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$alphas = range('A', 'Z');

		$exam_id=@$qstn[0]->exam_id;

		$exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		 // $negative_marks=@$qstn[0]->marks*@$exam_time[0]->negative_marks/100;

		 $question_prev_status=$this->join_model->get_knockout_exam_question_details($user_id,$s_id,$q_id,$level_id);
		
$select_option=array();
		 $select_id=@$question_prev_status[0]->selected_choice;

$select_option=explode(',', $select_id);

// print_r($select_option);
		 // for($c=0;$c<count($answr);$c++)
		 // {
		 // 	if(@$answr[$c]->id==@$question_prev_status[0]->selected_choice)
		 // 	{
		 // 		$select_option=;
		 // 	}
		 // }


?>
<!--<input type="hidden" name="hid_section" id="hid_section" value="<?php echo @$qstn[0]->section_id; ?>">-->
<input type="hidden" name="hid_review" id="hid_review" value="<?php echo @$question_prev_status[0]->is_review;?>">

<input type="hidden" name="hid_e" id="hid_e" value="<?php echo @$exam_id;?>">
<input type="hidden" name="hid_s" id="hid_s" value="<?php echo @$s_id;?>">
<input type="hidden" name="hid_se" id="hid_se" value="<?php echo @$section_id;?>">
<input type="hidden" name="hid_q" id="hid_q" value="<?php echo @$q_id;?>">
<input type="hidden" name="level_id" id="level_id" value="<?php echo @$level_id;?>">
		<div class="quehdng">
            <span class="quehdnglft">Question.<?php echo @$q_no;?></span>
            <span class="quehdngryt">
                <span class="markdef">Maximum Mark. <span class="green"><?php echo number_format((float)@$qstn[0]->marks, 2, '.', '');?></span></span>
                <span class="markdef">Negative Mark. <span class="green red"><?php  echo "0.25"; ?></span></span>
                <!--<span class="markdef"><span class="triangle"></span>Report</span>-->
            </span>
        </div>
        <!--normal que Single choice-->
        <div id="about" class="nano questionoutr" style="display:block">
            <div class="nano-content">


                <div class="questioninr">
                <div class="question-bx">
                    <?php echo @$qstn[0]->question; ?>
                    </div>

                        <div class="col-md-8">
<h2 class="answer-txt">Answer Option :</h2>

                    <div class="optninr">

                    <?php for($a=0;$a<count(@$answr);$a++){?>
                        <input id="radio<?php if($a>0){ echo $a; }?>" class="radiobtn" name="radio[]" type="radio" value="<?php echo $a+1; ?>" <?php if($select_option!=''){ for ($i=0; $i <count($select_option) ; $i++) { 
                        	 if($answr[$a]->id==$select_option[$i]){echo 'checked'; }} }?>>
                        <label class="option" for="radio<?php if($a>0){ echo $a; }?>">
                            <div class="optncrcl"><span class="optnvalue"><?php echo $alphas[$a]; ?></span></div>
                            <span class="optncntnt"><?php echo @$answr[$a]->choice; ?> </span>
                        </label>

                        <?php } ?>

                         </div>

                     </div>



                </div>

            </div>

        </div>

        <?php }
	
}
?>