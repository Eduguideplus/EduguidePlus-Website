
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
		<h2><?php echo @$exam_name; ?></h2>
	</div>
	<div class="col-md-8 col-md-offset-2">
		<div class="score">
	
			<div class="score-top">
				<div class="score-top-top">
					<b>Recent Chapters <span class="pull-right">My Rank: 02</span></b>
				</div>

				<?php for($i=0;$i<count(@$pattern);$i++)
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
						<b>Simplification</b>
						<p>50/51 Questions</p>
					</div>
					<div class="col-md-4">
						<div class="score-total-r">
							<span><i class="fa fa-check-circle color-green"></i>40</span>
							<span><i class="fa fa-times-circle color-red"></i>40</span>
							<span><i class="fa fa-minus-circle"></i>40</span>
							<span><i class="fa fa-circle-thin"></i>40</span>
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
							<img src="assets/images/score-1.png">
							<div class="score-head-text">
								<h3>2 <span>%</span></h3>
								<p>PROGRESS</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="scorre-head">
							<img src="assets/images/score-2.png">
							<div class="score-head-text">
								<h3>50 <span>%</span></h3>
								<p>ACCURACY</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="scorre-head br-0">
							<img src="assets/images/score-3.png">
							<div class="score-head-text">
								<h3>330<span>que/hr</span></h3>
								<p>SPEED</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="col-md-4">
						
						<div class="progress-top">
							<div id="pie" class="example"></div>
						<div class="chartdiv-content">
							<h3>55</h3>
							<p>Chapter</p>
						</div>
						</div>

						<div class="progress-bottom">
							<ul>
								<li class="complete-num">Completed <span>20</span></li>
								<li class="ongoing-num"> Ongoing <span>20</span></li>
								<li>Unseen <span>0</span></li>
							</ul>
						</div>								
					</div>
					<div class="col-md-4">
						
						<div class="progress-top">
							<div id="pie2" class="example"></div>
						<div class="chartdiv-content">
							<h3>11</h3>
							<p>Attempted</p>
						</div>
						</div>

						<div class="progress-bottom">
							<ul>
								<li class="correct-num"> Correct<span>30</span></li>
								<li class="ongoing-num"> Incorrect <span>20</span></li>
								<li>Skipped<span>0</span></li>
							</ul>
						</div>								
					</div>
					<div class="col-md-4">
						
						<div class="progress-top">
							<div id="pie3" class="example"></div>
						<div class="chartdiv-content">
							<h3>00:00:12</h3>
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
					</div>
				</div>
			</div>
		</div>
	</div>
</section>