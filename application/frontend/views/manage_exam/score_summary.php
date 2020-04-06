<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/webcss/site-responsive.css" rel="stylesheet">
<!-- Bootstrap -->
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

<div class="ggg">
            <div class="ed_dashboard_tab">
                <div class="tab-content">
                  
                    
                    <div class="tab-pane active" id="wallet">
                        <div class="ed_dashboard_tab_info bg-gray">
                            <h2 class="wallet-title">Your Examination Summary</h2>
                            <div class="wallet-content clearfix">
                                
                            </div>


                             
                           <div class="summary">
                            <table class="table table-hover">
                            <thead>
                           <tr>
                            
                            <th>Examination Name</th>
                            <th>Total Question</th>
                            <th>Full Marks</th>
                            <th>Attemted Question</th>
                            <th>Correct Attempt</th>
                            <th>Incorrect Attempt</th>
                            <th>Obtained Marks</th>
                            <th>Examination Status</th>
                            
                           </tr>
                           </thead>
                           <tbody>
                           <tr>
                           
                           <td><?php echo @$exam_name; ?></td>
                           <td><?php echo @$total_qstn; ?></td>
                           <td><?php echo @$full_marks; ?></td>
                           <td><?php echo @$total_attempt; ?></td>
                           <td><?php echo @$correct_attempt; ?></td>
                           <td><?php echo @$incorrect_attempt; ?></td>
                           <td><?php echo @$ob_marks; ?></td>
                           <td><?php echo @$exam_stat; ?></td>
                           
                           </tr>
                           </tbody>
                            </table>
                           </div>

                           <div class="summary">
                            <table class="table table-hover" border="1">
                            <thead>
                           <tr>
                            
                            <th>Section Name</th>
                            <th>Total Question</th>
                            <th>Full Marks</th>
                            <th>Attemted Question</th>
                            <th>Correct Attempt</th>
                            <th>Incorrect Attempt</th>
                            <th>Obtained Marks</th>
                             
                            
                           </tr>
                           </thead>
                           <tbody>
<?php for($i=0;$i<count($pattern);$i++)
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
							

								}

                              ?>
                           <tr >
                           
                              
                             
                           <td><?php echo @$section_dtls[0]->section_name; ?></td>
                           <td align="center"><?php echo @$pattern[$i]->quantity; ?></td>
                           <td align="center"><?php echo @$f_marks; ?></td>
                           <td align="center"><?php echo @$section_attempt; ?></td>
                           <td align="center"><?php echo @$sec_correct_count; ?></td>
                           <td align="center"><?php echo @$sec_incorrect_count; ?></td>
                           <td align="center"><?php echo @$sec_marks; ?></td>
                           
                           
                           </tr>

                            <?php } ?>
                           </tbody>
                            </table>
                           </div>
							<a class="text-center btn btn-primary" id="" href="<?php echo $this->url->link(61);?>" >EXIT</a>

                          <!--  <p class="text-left" style="font-weight:bold;"><i class="fa fa-th-list" aria-hidden="true"></i> Completed Examination List</p>
                           <div>
                            <table class="table table-hover">
                            <thead>
                           <tr>
                            <th>Set Name</th>
                            <th>Examination Name</th>
                            <th>Completed On</th>
                            <th>Full Marks</th>
                            <th>Marks Obtained</th>
                            <th>View Details Result</th>
                            
                           </tr>
                           </thead>
                          <tbody>
                           <tr>
                           <td><p></p></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           </tr>
                           </tbody>
                            </table>
                           </div> -->


                          

                          <!--  <p class="text-left" style="font-weight:bold;"><i class="fa fa-list-alt" aria-hidden="true"></i></i> Remaining Examination List</p> -->
                           <!-- <p style="font-weight:bold;" class="text-left">Please click bellow button to start the exam.please follow the rules and condition of the examination.</p>  --> 
                           <div>

                          
                           <!-- <table class=table-responsive border="1">
                           <tr>
                            <th>Set Name</th>
                            <th>Examination Name</th>
                            <th>Days Left</th>
                            <th>No. of Question</th>
                            <th>Full Marks</th>
                            <th>Duration</th>
                            <th>Start Examination</th>
                            
                           </tr>
                           <?php foreach($sets as $st){
                            $exam = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$st->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                            ?>
                           <tr>
                           <td><?php echo $st->set_name; ?></td>
                           <td><?php echo @$exam[0]->exam_name; ?></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td><a href="" class="btn btn-success">Start Now <i class="fa fa-play" aria-hidden="true"></i></a></td>
                           </tr>
                           <?php } ?>
                           </table> -->
                           </div>



                          <!--  <ul>
                           <?php foreach($sets as $st){?>
                           <a href="#"><li><?php echo $st->set_name; ?></li></a>
                           <?php } ?>
                           </ul> -->
                        </div>
                    </div>
                    
                   
            </div>
            
            
        </div>
    </div>






    

    <script>
    function exam_exit()
    {

    	var base_url='<?php echo base_url(); ?>';

    	 $.ajax(

                        {

                        type: "POST",

                        dataType: 'json',

                        url:base_url+'index.php/manage_exam/exit_exam',
                        data:{},
                        async: false,

                        success: function (data) {
                            
                            var perform= data.workdone;
                                    //alert(perform['status']);
                                    if(perform['status']==1)
                                    {
                                        
                                        close();

                                    }
                                   
                                    
                                      }
                        });
    		

    }
    </script>