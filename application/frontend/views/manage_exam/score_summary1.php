<?php 
$user_id=$this->session->userdata('user_identity');
$rnk=0;
if($user_id!='')
{
	for($i=0;$i<count(@$rank);$i++)
	{
		if($user_id==$rank[$i]->user_id)
		{
			$rnk=$i+1;
		}

	}
	if($rnk==0)
	{
		$rank='N/A';
	}
}


?>
<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
    </section>


<section class="main-container b-200">
	<div class="title text-center">
		<h2><?php echo @$exam_name; ?>
		</h2>
	</div>
	<div class="col-md-8 col-md-offset-2">
		<div class="score">
	
			<div class="score-top">
				<div class="score-top-top text-center">
					<b><span class="pull-left">All Sections</span> <span class="">Marks Obtained: <?php echo @$ob_marks; ?> / <?php echo @$full_marks; ?></span>  <span class="pull-right">My Rank: <?php echo @$rnk; ?></span></b>
				</div>

				<?php 
				$not_answ=0;
				$total_qst=0;
				for($i=0;$i<count(@$pattern);$i++)
                            {

                              $section_dtls=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>@$pattern[$i]->section_id,'section_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                              
                              if(@$pattern[$i]->section_id!=3)
                              {
                                $qstn=$this->join_model->get_question_of_section($set_id,$pattern[$i]->section_id);
                                  $f_marks=0;
                                  for($q=0;$q<count($qstn);$q++)
                                  {
                                     $f_marks=$f_marks+$qstn[$q]->marks;
                                  }


                              }
                              else
                              {
                                $qstn=$this->join_model->get_passage_question_of_section($set_id,$pattern[$i]->section_id);
                                
                                  $f_marks=0;
                                  for($q=0;$q<count($qstn);$q++)
                                  {
                                     $f_marks=$f_marks+$qstn[$q]->marks;
                                  }
                              }


                              
                              
                              $attempt_qstn=$this->join_model->get_question_of_section_attempted($user_exam,$pattern[$i]->section_id);
                                  $section_attempt=count($attempt_qstn);
                                  $section_not_ans=@$pattern[$i]->quantity-@$section_attempt;
								  $not_answ=$not_answ+$section_not_ans;
								  $total_qst= $total_qst+@$pattern[$i]->quantity;
                                  $answer_attempt_qstn=$this->join_model->get_answer_of_section_correct_attempted($user_exam,$pattern[$i]->section_id);
                                  //$section_correct_attempt=count($correct_attempt_qstn);

                            

							$negative_mks=$negative_mark;    
							$sec_marks=0;
				            $sec_correct_count=0;
							$sec_incorrect_count=0;
							
							for($j=0;$j<count($answer_attempt_qstn);$j++)
								{
									$q_id=@$answer_attempt_qstn[$j]->question_master_id;

									$qstn_dtls=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('id'=>@$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

									if($answer_attempt_qstn[$j]->selected_choice==@$answer_attempt_qstn[$j]->correct_choice)
									{
										$mks_each_question=$qstn_dtls[0]->marks;
										$sec_marks=$sec_marks+$mks_each_question;
										$sec_correct_count++;

									}
									else
									{
										$mks_each_question=$qstn_dtls[0]->marks;
										$sec_marks=$sec_marks-($mks_each_question*$negative_mks/100);
										$sec_incorrect_count++;
									}

							
								}?>
				<div class="score-top-bottom">
					<div class="col-md-4">
						<b><?php echo @$section_dtls[0]->section_name; ?></b>
						<p><?php echo @$section_attempt; ?>/<?php echo @$pattern[$i]->quantity; ?> Questions</p>
					</div>
					<div class="col-md-4">
						<div class="score-total-r">
							<span><i class="fa fa-check-circle color-green"></i><?php echo @$sec_correct_count; ?></span>
							<span><i class="fa fa-times-circle color-red"></i><?php echo @$sec_incorrect_count; ?></span>
						<!--<span><i class="fa fa-minus-circle"></i>40</span>-->
							<span><i class="fa fa-circle-thin"></i><?php $not_ans=@$pattern[$i]->quantity-@$section_attempt; echo @$not_ans; ?></span>
						</div>
					</div>
				</div>
<?php } ?>

			</div>

			<div class="score-top score-b">
				<div class="score-top-top">
					<b>Overall Progress Status</b>
				</div>
				<div class="score-top-bottom">
					<div class="col-md-4">
						<div class="scorre-head">
							<img src="<?php echo base_url(); ?>assets/images/score-1.png">
							<div class="score-head-text">
								<h3><?php echo ceil(@$progress); ?> <span>%</span></h3>
								<p>PROGRESS</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="scorre-head">
							<img src="<?php echo base_url(); ?>assets/images/score-2.png">
							<div class="score-head-text">
								<h3><?php echo ceil(@$acc); ?> <span>%</span></h3>
								<p>ACCURACY</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="scorre-head br-0">
							<img src="<?php echo base_url(); ?>assets/images/score-3.png">
							<div class="score-head-text">
								<h3><?php echo ceil(@$spd); ?><span>que/hr</span></h3>
								<p>SPEED</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="col-md-6">
						
						<div class="progress-top">
							<div id="pie" class="example"></div>
						<div class="chartdiv-content">
							<h3><?php echo @$all_exams; ?></h3>
							<p>Question Set</p>
						</div>
						</div>

						<div class="progress-bottom">
							<ul>
								<li class="complete-num">Completed <span><?php echo count($complete_exam);; ?></span></li>
								
								<li class="ongoing-num"> Ongoing <span><?php if(count(@$ongoing)>0){echo count(@$ongoing);}else{echo '0'; } ?></span></li>

								
								<li class="unseen">Unseen <span><?php echo @$remain_exam; ?></span></li>
							</ul>
						</div>								
					</div>
					<div class="col-md-6">
						
						<div class="progress-top">
							<div id="pie2" class="example"></div>
						<div class="chartdiv-content">
							<h3><?php /*echo @$total_attempt;*/ echo $total_qst; ?></h3>
							<p>Questions</p>
						</div>
						</div>

						<div class="progress-bottom">
							<ul>
								<li class="correct-num"> Correct<span><?php echo @$correct_attempt; ?></span></li>
								<li class="incorrect"> Incorrect <span><?php echo @$incorrect_attempt; ?></span></li>
								<li class="unseen">Not answered<span><?php /*$not_ans=@$total_attempt-(@$correct_attempt+@$incorrect_attempt); echo @$not_ans;*/ echo $not_answ; ?></span></li>
							</ul>
						</div>								
					</div>
					<!-- <div class="col-md-4">
						
						<div class="progress-top">
							<div id="pie3" class="example"></div>
						<div class="chartdiv-content">
							<h3>00:00:<?php echo @$tt; ?></h3>
							<p>Time Spent</p>
						</div>
						</div>

						<div class="progress-bottom">
							<ul>
								<li class="complete-num">Correct <span>00:00:04</span></li>
								<li class="ongoing-num"> Incorrect <span>00:00:08</span></li>
								<li>Skipped <span>00:00:00</span></li>
							</ul>
						</div>								
					</div> -->
				</div>
			</div>
		</div>
	</div>

</section>
<div class="clearfix"></div>
<div class="text-center" style="padding:20px 0;">
	<a class="text-center btn btn-primary" id="" href="<?php echo $this->url->link(61);?>" >EXIT</a>
</div>


