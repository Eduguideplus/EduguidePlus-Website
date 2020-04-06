

<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
</section>

<div class="container-fluid login_register deximJobs_tabs practice">
 <div class="row">
  <div class="container main-container-home">

  	<?php if($this->session->flashdata('succ_msg')!=''){?>
  	 <div class="text-center" style="font:weight:bold;font-size:15px;color:green;">
  	<h4><?php echo $this->session->flashdata('succ_msg'); ?></h4>
	</div>
  	<?php } ?>
  		<div class="col-md-12 col-sm-12 col-xs-12 text-center log-in">
  			<h3>Dashboard</h3>
  		</div>

  		<div class="col-md-12 col-sm-12 col-xs-12">
  			<div class="my-account-wrapper">
  			
  			<?php $this->load->view('account_sidebar',$user); ?>


  			  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 res480-pl-0 res480-pr-0">

         <div class="myaccount-field myaccount-widget">

       <h3 class="title">Welcome <?php echo @$user[0]->user_name;?></h3>


        <fieldset class="listar-statisticsarea dashboard-view">

      <div class="panel-group dashboad-test" id="accordion">

						

									



<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
Practice Test</a>
</h4>
</div>
<div id="collapse2" class="panel-collapse collapse in">
<div class="panel-body">



		      	<?php if(count($practice)>0){?>
		      			<div class="table-responsive">
		      				<table class="table dashboard-table table-bordered">
			    <thead>
			      <tr>
			        <th>Group Name</th>
			        <th>Examination Name</th>
			        <th>Chapter Name</th>
			        <th>Set Name</th>
			        <th>Number of wrong hit for answer</th>
			        <th>Current Status</th>
			        <th>Time & Date</th>
			      </tr>
			    </thead>
			    <tbody> 

<?php foreach($practice as $pr)
{
$user_exam_id=$pr->id;
$wrong_count_details=$set_dtls=$this->common_model->common($table_name = 'tbl_practice_attempt', $field = array(), $where = array('user_test_id'=>$user_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$set_id=$pr->set_id;
$set_dtls=$this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$user_plan_id=@$set_dtls[0]->user_plan_id;
$chap_id=@$set_dtls[0]->chap_id;

$chap_details=$this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_id'=>$chap_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$sub_id=@$chap_details[0]->sub_id;

$sub_details=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$sub_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$user_plan_dtls=$this->common_model->common($table_name = 'tbl_user_plan', $field = array(), $where = array('id'=>$user_plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$exam_id=@$user_plan_dtls[0]->exam_id;

$exam_details=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$group_id=@$exam_details[0]->exam_type_id;

$group_details=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$group_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


?>
<tr>
<td><?php echo @$group_details[0]->exam_name; ?></td>
<td><?php echo @$exam_details[0]->exam_name; ?></td>
<td><?php echo @$chap_details[0]->chap_name; ?></td>
<td><?php echo @$set_dtls[0]->set_name; ?></td>
<td><?php echo @$wrong_count_details[0]->wrong_attempt; ?></td>
<td><?php if(@$pr->exam_result=='attempted'){?> <a href="<?php echo $this->url->link(92).'/'.$set_id.'/'.@$set_dtls[0]->set_slug;?>" class="btn btn-danger"><?php echo 'Not Promoted'; ?></a><?php }else{?>
<a href="<?php echo $this->url->link(92).'/'.$set_id.'/'.@$set_dtls[0]->set_slug;?>" class="btn btn-Success"><?php echo 'Promoted'; ?></a>
<?php } ?></td>
<td><?php echo @$pr->created_on;?></td>
</tr>
<?php } ?>
								     
			     
</tbody>
</table>

</div>


<?php } else{echo 'No Record Available'; }?>






</div>
</div>
</div>

</div>





                           </fieldset>




          


                          <!-- <fieldset class="listar-statisticsarea mt-20">
                          	<h4>Overall Progress Status</h4>

                                        
                            <ul class="listar-statistics">

                              <li class="listar-newfeedback">
                                <div class="listar-couterholder">
                                	<img src="<?php echo base_url(); ?>assets/images/progress-report.png" alt="" class=""> 
                                	<div class="overall">
                                  <h3 data-from="0" data-to="672" data-speed="8000" data-refresh-interval="50">00</h3>
                                  <h4>Progress</h4>
                                  </div>
                                </div>
                              </li>
                              <li class="listar-activelists">
                                <div class="listar-couterholder">
                                <img src="<?php echo base_url(); ?>assets/images/target.png" alt="" class=""> 
                                <div class="overall">
                                  <h3 data-from="0" data-to="38" data-speed="8000" data-refresh-interval="50">00</h3>
                                  <h4>Accuracy</h4>
                                  </div>
                                </div>
                              </li>
                              <li class="listar-newuser">
                                <div class="listar-couterholder">
                                <img src="<?php echo base_url(); ?>assets/images/stopwatch.png" alt="" class=""> 
                                <div class="overall">
                                  <h3 data-from="0" data-to="315" data-speed="8000" data-refresh-interval="50">00</h3>
                                  <h4>Question / hr</h4>
                                  </div>
                                </div>
                              </li>
                             
                              
                            </ul>
                          </fieldset> -->

                           <fieldset class="listar-statisticsarea mt-20">
                           <div class="row">
                             <div class="col-md-7 progress-satus">
                          	<h4>Subjectwise Progress Status for
                          
                            <select class="form-control" onchange="view_subject_details(this.value);">
                              <option value="">Select Test</option>
                              <?php

                              $searchTestid= $this->uri->segment(2);
                              foreach($practiceExamarray as $pr)
                                { 
                                    ?>
                          <option value="<?php echo $pr['user_exam_id']; ?>" <?php if($searchTestid==$pr['user_exam_id']){ echo 'selected'; } ?>><?php echo $pr['user_exam_name']; ?></option>
                         <?php
                               }
                          ?>
                  </select></h4>
                          </div>
                             </div>

                             <?php if(count($subject_details)>0)
                             {
                              foreach($subject_details as $key=>$val)
                              {
                                $c=$key+1;
                              ?>
                             <div class="col-md-4 col-sm-4 col-xs-12 res767-wid-50 text-center pie-bx">
                             <div id="element<?php echo $c; ?>" class="element"></div>
                             <h4><?php echo $val->section_name; ?></h4>
                             	

                             </div>
                             <?php
                           }
                         }
                         else{
                          ?>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                             
                             <h4>No Record Available</h4>
                          <?php
                         }
                             ?>
                             <!--  <div class="col-md-4 col-sm-4 col-xs-12 res767-wid-50 text-center pie-bx">
                             <div id="element2" class="element"></div>
                             <h4>PHYSICS</h4>
                             	

                             </div>
                              <div class="col-md-4 col-sm-4 col-xs-12 res767-wid-50 text-center pie-bx">
                             <div id="element3" class="element"></div>
                             <h4>CHEMESTRY</h4>
                             	

                             </div>
 -->

                          
                           

                          
                          </fieldset>



                           <!-- <fieldset class="listar-statisticsarea mt-20">
                          	

                            <div class="col-md-6 col-sm-6 col-xs-12 text-center pie-bx border-rgt">
                              <h4>Your Result</h4>
                             <div id="element4" class="element"></div>
                             <h4>Total</h4>
                             	

                             </div>

                             <div class="col-md-6 col-sm-6 col-xs-12 text-center pie-bx">
                             <h4>1st Ranker Result</h4>
                             <div id="element5" class="element"></div>
                             <h4>Total</h4>
                             	

                             </div>


                              <div class="col-md-12">
                             	<div class="ans-list">
                             		
                             			<ul>
                             				<li><span class="correct"></span><h6>Correct <p>70</p></h6></li>

                             				<li><span class="Notans"></span><h6>Not Answer <p>10</p></h6></li>
                             				<li><span class="wrong"></span><h6>Wrong Answer <p>30</p></h6></li>
                             				
                             			</ul>

                             		


                             	</div>

                             </div>
                          </fieldset>-->




                           <fieldset class="listar-statisticsarea">

                           		<div class="panel-group dashboad-test" id="accordion">

									

									  <div class="panel panel-default">
									    <div class="panel-heading">
									      <h4 class="panel-title">
									        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
									        Knowledge Test </a>
									      </h4>
									    </div>
									    <div id="collapse3" class="panel-collapse collapse in">
									      <div class="panel-body">

									      	<?php if(count($knowledge)>0){

									      		?>
									      		<div class="table-responsive">
									      				<table class="table dashboard-table table-bordered">
														    <thead>
														      <tr>
														        <th>Group Name</th>
														        <th>Examination Name</th>
														        <th>Subject</th>
														        <th>Date & Time</th>
														        <th>Duration & Full Marks</th>
														        <th>Status</th>
														        <th>Your Rank Index</th>
														        <th>1st Ranker Index</th>
														        <th>Performance (%)</th>
														        <th>Award</th>
														        <th>Award Claimed Details</th>
														        <th>Action</th>
														      </tr>
														    </thead>
														    <tbody>

<?php	
foreach($knowledge as $know){

$set_id=@$know->set_id;

$set_dtls=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$group_id=@$set_dtls[0]->group_id;
$exam_id=@$set_dtls[0]->exam_id;
$sub_id=@$set_dtls[0]->subject_id;
$user_plan_id=@$know->user_plan_id;
$active_usr=$this->session->userdata('activeuser');

@$exam_date_time=@$set_dtls[0]->exam_date.' '.@$set_dtls[0]->exam_time;
$total_user_per_set=$this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$set_id,'test_type'=>'3'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$sub_details=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$sub_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$exam_details=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$group_details=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$group_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$user_rank=$this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$user_exam=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$user_refund=$this->common_model->common($table_name = 'tbl_claim_refund', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


$first_user_rank=$this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'DESC'), $start = '', $end = '');


$user_award=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$user_n_award=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$claim_award=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
// echo '<pre>';
// print_r($user_exam);

$ob_marks=@$user_exam[0]->obtained_marks;
$total_marks=@$user_exam[0]->total_marks;
@$percentage=($ob_marks/$total_marks)*100;
?>

<?php if(count($total_user_per_set)>1){ ?>
<tr>
<td><?php echo @$group_details[0]->exam_name; ?></td>
<td><?php echo @$exam_details[0]->exam_name; ?></td>
<td><?php echo @$sub_details[0]->section_name; ?></td>

<td><?php echo @$set_dtls[0]->exam_date.', '.@$set_dtls[0]->exam_time;
$time_arr=explode(':',@$set_dtls[0]->exam_time);if($time_arr[0]>=12){echo ' PM';}else{echo ' AM'; } ?>
</td>

<td><?php 
echo gmdate("H:i:s", $set_dtls[0]->exam_duration);
 ?></td>

<td><?php if(strtotime($exam_date_time) >= time()){ echo 'Enrolled'; }else{ 

  // echo count($user_exam);

if(count($user_exam)<=0){ echo "Absent"; }else{
  echo "Present";
}



 } ?></td>

<td><?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{
if(count($user_exam)<=0){ echo 'N/A'; }else{
  echo @$user_rank[0]->rank_index; } } ?></td>
<td>

<?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{ echo @$first_user_rank[0]->rank_index; } ?>
  
</td>
<td><?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{echo @$percentage;} ?></td>

<td><?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{ if(count($user_exam)<=0){ echo 'N/A'; } else if(@$user_award[0]->award_amount!=""){echo @$user_award[0]->award_amount; } else if(count($user_n_award)<=0){ echo 'Not Awarded yet'; } else{echo 'Try Next';} } ?></td>

<td> <?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{ if(count($user_exam)<=0){ echo 'N/A'; }else if(count($user_n_award)<=0){ echo 'Not Awarded yet';
} else if( count($claim_award)<0 || @$user_award[0]->award_amount!="refund"){ ?>
  <a href="<?php echo $this->url->link(102);?>/<?php echo @$set_id; ?>" class="btn btn-warning">Claim Award</a>
<?php } else{ echo "Claimed";  } } ?>
</td>

<td>

	<?php 
if(strtotime($exam_date_time) >= time()){ 

		?>

	<a href="<?php echo $this->url->link(117).'/'.$set_dtls[0]->set_slug;?>" class="btn btn-success">Start Exam Now</a>

	<?php }else{   ?>	
<a href="<?php echo $this->url->link(90); ?>" class="btn btn-success">Rank & Award</a>

	<?php }  ?>			
</td>
</tr>

<?php }else{ ?>
<tr>
<td><?php echo @$group_details[0]->exam_name; ?></td>
<td><?php echo @$exam_details[0]->exam_name; ?></td>
<td><?php echo @$sub_details[0]->section_name; ?></td>

<td><?php echo @$set_dtls[0]->exam_date.', '.@$set_dtls[0]->exam_time;
$time_arr=explode(':',@$set_dtls[0]->exam_time);if($time_arr[0]>=12){echo ' PM';}else{echo ' AM'; } ?>
</td>

<td><?php 
echo gmdate("H:i:s", @$set_dtls[0]->exam_duration);
 ?></td>

<td><?php if(strtotime($exam_date_time) >= time()){ echo 'Enrolled'; }else{ echo 'Not Conducted Exam'; } ?></td>

<td><?php  echo 'N/A'; ?></td>
<td>
<?php  echo 'N/A'; ?></td>
<td><?php  echo 'N/A'; ?></td>
<td><?php  echo 'N/A'; ?></td>

<td> <?php  echo 'N/A'; ?>
</td>

<td> <?php if(strtotime(@$exam_date_time) >= time()){ ?><a href="<?php echo $this->url->link(117).'/'.$set_dtls[0]->set_slug;?>" class="btn btn-success">Start Exam Now</a> <?php }else{ 

if(@count($user_refund)==0){

  ?> 


  <a href="<?php echo $this->url->link(122);?>/<?php echo @$set_id; ?>" class="btn btn-warning">Refund</a>

<?php }else{ ?>

<a href="<?php echo $this->url->link(123);?>/<?php echo @$set_id; ?>" class="btn btn-warning">Refund Details</a>

<?php } } ?>
     </td>
</tr>
<?php } ?>
<?php } ?>
														       <!-- <tr>
														        <td>Engineering</td>
														        <td>JEE</td>
														        <td>Physics</td>
														        <td>5</td>
														        <td>9.25</td>
														        <td>54.05405405</td>
														        <td>12-12-2018 & 14:54:00</td>
														        <td>Next Try</td>
														        <td>NA</td>
														        <td>NO</td>
														       														      </tr> -->
														     
														    </tbody>
														  </table>



									      		</div>




<?php } else { echo 'No Record Available'; }?>


									      </div>


									    </div>



									  </div>




									  <div class="panel panel-default">
									    <div class="panel-heading">
									      <h4 class="panel-title">
									        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
									        Quiz Test 1</a>
									      </h4>
									    </div>
									    <div id="collapse4" class="panel-collapse collapse in">
									      <div class="panel-body">
									      	<?php if(count($qt1)>0){?>
									      			<div class="table-responsive">
									      				<table class="table dashboard-table table-bordered">
														    <thead>
														      <tr>
                                      <th>Group Name</th>
                                      <th>Examination Name</th>
                                      <th>Subject</th>
                                      <th>Date & Time</th>
                                      <th>Duration & Full Marks</th>
                                      <th>Status</th>
                                      <th>Your Rank Index</th>
                                      <th>1st Ranker Index</th>
                                      <th>Performance (%)</th>

                                      <th>Award</th>
                                      <th>Award Claimed Details</th>
                                      <th>Action</th>
														      </tr>
														    </thead>
														    <tbody>

<?php 
foreach($qt1 as $qt){  
$active_usr=$this->session->userdata('activeuser');
$set_id=@$qt->set_id;
$set_dtls=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$group_id=@$set_dtls[0]->group_id;
$exam_id=@$set_dtls[0]->exam_id;
$sub_id=@$set_dtls[0]->subject_id;
$user_plan_id=@$qt->user_plan_id;
$active_usr=$this->session->userdata('activeuser');

$exam_date_time=@$set_dtls[0]->exam_date.' '.@$set_dtls[0]->exam_time;

$total_user_per_set=$this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$set_id,'test_type'=>'5'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



  $sub_details=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$sub_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$exam_details=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$group_details=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$group_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$user_rank=$this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$user_exam=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


$first_user_rank=$this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'DESC'), $start = '', $end = '');


$user_refund=$this->common_model->common($table_name = 'tbl_claim_refund', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


$user_award=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$user_n_award=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$claim_award=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
// echo '<pre>';
// print_r($user_exam);

$ob_marks=@$user_exam[0]->obtained_marks;
$total_marks=@$user_exam[0]->total_marks;
@$percentage=($ob_marks/$total_marks)*100;


?>

<?php if(count($total_user_per_set)>1){ ?>
<tr>
<td><?php echo @$group_details[0]->exam_name; ?></td>
<td><?php echo @$exam_details[0]->exam_name; ?></td>
<td><?php echo @$sub_details[0]->section_name; ?></td>

<td><?php echo @$set_dtls[0]->exam_date.', '.@$set_dtls[0]->exam_time;
$time_arr=explode(':',@$set_dtls[0]->exam_time);if($time_arr[0]>=12){echo ' PM';}else{echo ' AM'; } ?>
</td>

<td><?php 
echo gmdate("H:i:s", $set_dtls[0]->exam_duration);
 ?></td>

<td><?php if(strtotime($exam_date_time) >= time()){ echo 'Enrolled'; }else{ 

  // echo count($user_exam);

if(count($user_exam)<=0){ echo "Absent"; }else{
  echo "Present";
}



 } ?></td>

<td><?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{
if(count($user_exam)<=0){ echo 'N/A'; }else{
  echo @$user_rank[0]->rank_index; } } ?></td>
<td>

<?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{ echo @$first_user_rank[0]->rank_index; } ?>
  
</td>
<td><?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{echo @$percentage;} ?></td>

<td><?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{ if(count($user_exam)<=0){ echo 'N/A'; } else if(@$user_award[0]->award_amount!=""){echo @$user_award[0]->award_amount; } else if(count($user_n_award)<=0){ echo 'Not Awarded yet'; } else{echo 'Try Next';} } ?></td>

<td> <?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{ if(count($user_exam)<=0){ echo 'N/A'; }else if(count($user_n_award)<=0){ echo 'Not Awarded yet';
} else if( count($claim_award)<0 || @$user_award[0]->award_amount!="refund"){ ?>
  <a href="<?php echo $this->url->link(102);?>/<?php echo @$set_id; ?>" class="btn btn-warning">Claim Award</a>
<?php }else if(@$user_award[0]->award_amount=="refund"){echo "Refund";}  else{ echo "Claimed";} } ?>
</td>

<td>

  <?php 
if(strtotime($exam_date_time) >= time()){ 

    ?>

  <a href="<?php echo $this->url->link(117).'/'.$set_dtls[0]->set_slug;?>" class="btn btn-success">Start Exam Now</a>

  <?php }else{   ?> 
<a href="<?php echo $this->url->link(90); ?>" class="btn btn-success">Rank & Award</a>

  <?php }  ?>     
</td>
</tr>

<?php }else{ ?>
<tr>
<td><?php echo @$group_details[0]->exam_name; ?></td>
<td><?php echo @$exam_details[0]->exam_name; ?></td>
<td><?php echo @$sub_details[0]->section_name; ?></td>

<td><?php echo @$set_dtls[0]->exam_date.', '.@$set_dtls[0]->exam_time;
$time_arr=explode(':',@$set_dtls[0]->exam_time);if($time_arr[0]>=12){echo ' PM';}else{echo ' AM'; } ?>
</td>

<td><?php 
echo gmdate("H:i:s", $set_dtls[0]->exam_duration);
 ?></td>

<td><?php if(strtotime($exam_date_time) >= time()){ echo 'Enrolled'; }else{ echo 'Not Conducted Exam'; } ?></td>

<td><?php  echo 'N/A'; ?></td>
<td>
<?php  echo 'N/A'; ?></td>
<td><?php  echo 'N/A'; ?></td>
<td><?php  echo 'N/A'; ?></td>

<td> <?php  echo 'N/A'; ?>
</td>

<td> <?php if(strtotime($exam_date_time) >= time()){ ?><a href="<?php echo $this->url->link(117).'/'.$set_dtls[0]->set_slug;?>" class="btn btn-success">Start Exam Now</a> <?php } else { 

  if(@count($user_refund)==0){

  ?> 


  <a href="<?php echo $this->url->link(122);?>/<?php echo @$set_id; ?>" class="btn btn-warning">Refund</a>

<?php }else{ ?>

<a href="<?php echo $this->url->link(123);?>/<?php echo @$set_id; ?>" class="btn btn-warning">Refund Details</a>

<?php } } ?>    </td>
</tr>
<?php } ?>
                                <?php } ?>
														   
														     
														    </tbody>
														  </table>



									      		</div>

<?php } else{ echo 'No Record Available'; }?>



									      </div>
									    </div>
									  </div>




									    <div class="panel panel-default">
									    <div class="panel-heading">
									      <h4 class="panel-title">
									        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
									        Quiz Test 2</a>
									      </h4>
									    </div>
									    <div id="collapse5" class="panel-collapse collapse in">
									      <div class="panel-body">
									      	<?php if(count($qt2)>0){?>
									      			<div class="table-responsive">
									      				<table class="table dashboard-table table-bordered">
														    <thead>
														      <tr>
                                        <th>Group Name</th>
                                        <th>Examination Name</th>
                                        <th>Subject</th>
                                        <th>Date & Time</th>
                                        <th>Duration & Full Marks</th>
                                        <th>Status</th>
                                        <th>Your Rank Index</th>
                                        <th>1st Ranker Index</th>
                                        <th>Performance (%)</th>

                                        <th>Award</th>
                                        <th>Award Claimed Details</th>
                                        <th>Action</th>
														      </tr>
														    </thead>
														    <tbody>

<?php foreach($qt2 as $qt){  
$active_usr=$this->session->userdata('activeuser');
$set_id=@$qt->set_id;
$set_dtls=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$group_id=@$set_dtls[0]->group_id;
$exam_id=@$set_dtls[0]->exam_id;
$sub_id=@$set_dtls[0]->subject_id;
$user_plan_id=@$qt->user_plan_id;
$active_usr=$this->session->userdata('activeuser');

$exam_date_time=@$set_dtls[0]->exam_date.' '.@$set_dtls[0]->exam_time;

$total_user_per_set=$this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$set_id,'test_type'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  $sub_details=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$sub_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$exam_details=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$group_details=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$group_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$user_rank=$this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$user_exam=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$user_refund=$this->common_model->common($table_name = 'tbl_claim_refund', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


$first_user_rank=$this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'DESC'), $start = '', $end = '');


$user_award=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$user_n_award=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$claim_award=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
// echo '<pre>';
// print_r($user_exam);

$ob_marks=@$user_exam[0]->obtained_marks;
$total_marks=@$user_exam[0]->total_marks;
@$percentage=($ob_marks/$total_marks)*100;

// echo count($total_user_per_set).'okk';
?>

<?php if(count($total_user_per_set)>1){ ?>
<tr>
<td><?php echo @$group_details[0]->exam_name; ?></td>
<td><?php echo @$exam_details[0]->exam_name; ?></td>
<td><?php echo @$sub_details[0]->section_name; ?></td>

<td><?php echo @$set_dtls[0]->exam_date.', '.@$set_dtls[0]->exam_time;
$time_arr=explode(':',@$set_dtls[0]->exam_time);if($time_arr[0]>=12){echo ' PM';}else{echo ' AM'; } ?>
</td>

<td><?php 
echo gmdate("H:i:s", $set_dtls[0]->exam_duration);
 ?></td>

<td><?php if(strtotime($exam_date_time) >= time()){ echo 'Enrolled'; }else{ 

  // echo count($user_exam);

if(count($user_exam)<=0){ echo "Absent"; }else{
  echo "Present";
}



 } ?></td>

<td><?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{
if(count($user_exam)<=0){ echo 'N/A'; }else{
  echo @$user_rank[0]->rank_index; } } ?></td>
<td>

<?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{ echo @$first_user_rank[0]->rank_index; } ?>
  
</td>
<td><?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{echo @$percentage;} ?></td>

<td><?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{ if(count($user_exam)<=0){ echo 'N/A'; } else if(@$user_award[0]->award_amount!=""){echo @$user_award[0]->award_amount; } else if(count($user_n_award)<=0){ echo 'Not Awarded yet'; } else{echo 'Try Next';} } ?></td>

<td> <?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{ if(count($user_exam)<=0){ echo 'N/A'; }else if(count($user_n_award)<=0){ echo 'Not Awarded yet';
} else if( count($claim_award)<0 || @$user_award[0]->award_amount!="refund"){ ?>
  <a href="<?php echo $this->url->link(102);?>/<?php echo @$set_id; ?>" class="btn btn-warning">Claim Award</a>
<?php }else if(@$user_award[0]->award_amount=="refund"){echo "Refund";}  else{ echo "Claimed";} } ?>
</td>

<td>

  <?php 
if(strtotime($exam_date_time) >= time()){ 

    ?>

  <a href="<?php echo $this->url->link(117).'/'.$set_dtls[0]->set_slug;?>" class="btn btn-success">Start Exam Now</a>

  <?php }else{   ?> 
<a href="<?php echo $this->url->link(90); ?>" class="btn btn-success">Rank & Award</a>

  <?php }  ?>     
</td>
</tr>

<?php }else{ ?>
<tr>
<td><?php echo @$group_details[0]->exam_name; ?></td>
<td><?php echo @$exam_details[0]->exam_name; ?></td>
<td><?php echo @$sub_details[0]->section_name; ?></td>

<td><?php echo @$set_dtls[0]->exam_date.', '.@$set_dtls[0]->exam_time;
$time_arr=explode(':',@$set_dtls[0]->exam_time);if($time_arr[0]>=12){echo ' PM';}else{echo ' AM'; } ?>
</td>

<td><?php 
echo gmdate("H:i:s", $set_dtls[0]->exam_duration);
 ?></td>

<td><?php if(strtotime($exam_date_time) >= time()){ echo 'Enrolled'; }else{ echo 'Not Conducted Exam'; } ?></td>

<td><?php  echo 'N/A'; ?></td>
<td>
<?php  echo 'N/A'; ?></td>
<td><?php  echo 'N/A'; ?></td>
<td><?php  echo 'N/A'; ?></td>

<td> <?php  echo 'N/A'; ?>
</td>

<td> <?php if(strtotime($exam_date_time) >= time()){ ?><a href="<?php echo $this->url->link(117).'/'.$set_dtls[0]->set_slug;?>" class="btn btn-success">Start Exam Now</a> <?php }else{  

  if(@count($user_refund)==0){

  ?> 


  <a href="<?php echo $this->url->link(122);?>/<?php echo @$set_id; ?>" class="btn btn-warning">Refund</a>

<?php }else{ ?>

<a href="<?php echo $this->url->link(123);?>/<?php echo @$set_id; ?>" class="btn btn-warning">Refund Details</a>

<?php } } ?>  
  </td>
</tr>
<?php } ?>
<?php } ?>
														      
														     
														    </tbody>
														  </table>



									      		</div>


<?php } else{ echo 'No Record Available'; }?>


									      </div>
									    </div>
									  </div>



									    <div class="panel panel-default">
									    <div class="panel-heading">
									      <h4 class="panel-title">
									        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
									        Knockout test</a>
									      </h4>
									    </div>
									    <div id="collapse6" class="panel-collapse collapse in">
									      <div class="panel-body">
									      		<?php if(count($nock_out)>0){?>
									      			<div class="table-responsive">
									      				<table class="table dashboard-table table-bordered">
														    <thead>
														      <tr>
                                     <th>Group Name</th>
                                        <th>Examination Name</th>
                                        <th>Subject</th>
                                        <th>Date & Time</th>
                                        <th>Duration & Full Marks</th>
                                        <th>Status</th>
                                        <th>Your Rank Index</th>
                                        <th>1st Ranker Index</th>
                                        <th>Performance (%)</th>

                                       
                                        <th>Award</th>
                                        <th>Award Claimed Details</th>
                                        <th>Action</th>
                                        <th>Level Status</th>
                                        <!-- <th>Accept Challenge from your friend</th> -->
														      </tr>
														    </thead>
														     <tbody>

<?php 
foreach($nock_out as $knock){

$set_id=@$knock->set_id;

$set_dtls=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$group_id=@$set_dtls[0]->group_id;
$exam_id=@$set_dtls[0]->exam_id;
$sub_id=@$set_dtls[0]->subject_id;
$user_plan_id=@$knock->user_plan_id;
$active_usr=$this->session->userdata('activeuser');

$exam_date_time=@$set_dtls[0]->exam_date.' '.@$set_dtls[0]->exam_time;

$next_level_date=@$set_dtls[0]->exam_date_for_knockout_next_level;
$curr_date= date('Y-m-d');
$next_level_date= strtotime($next_level_date);
$curr_date=strtotime($curr_date);

$total_user_per_set=$this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$set_id,'test_type'=>'4'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  $sub_details=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$sub_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$exam_details=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$group_details=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$group_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$user_rank=$this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$user_exam=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$user_refund=$this->common_model->common($table_name = 'tbl_claim_refund', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


$first_user_rank=$this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'DESC'), $start = '', $end = '');


$user_award=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$user_n_award=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$claim_award=$this->common_model->common($table_name = 'tbl_claim_award', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

//echo '<pre>'; print_r($claim_award);
 
$rank_level=$this->common_model->common($table_name = 'tbl_knockout_level', $field = array(), $where = array('set_id'=>@$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('level'=>'desc'), $start = '', $end = '');  



$next_level_id=@$rank_level[0]->level_id;

$nxt_level_cre=$this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'level_id'=>$next_level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$nxt_level_studentrank=$this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'level_id'=>$next_level_id,'user_id'=>$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

// echo $level_id;
     // $total_reg_user= $this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');   
        
     // $n=count($total_reg_user);   
        
     // $next_level_stu=($n*25)/100; 

$nxt_level_rank=$this->common_model->common($table_name = 'tbl_student_knockout_level', $field = array(), $where = array('user_id'=>$active_usr,'set_id'=>$set_id,'level_id'=>@$level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');




$ob_marks=@$user_exam[0]->obtained_marks;
$total_marks=@$user_exam[0]->total_marks;
@$percentage=($ob_marks/$total_marks)*100;
?>

<?php if(count($total_user_per_set)>1){ ?>
<tr>
<td><?php echo @$group_details[0]->exam_name; ?></td>
<td><?php echo @$exam_details[0]->exam_name; ?></td>
<td><?php echo @$sub_details[0]->section_name; ?></td>

<td><?php echo @$set_dtls[0]->exam_date.', '.@$set_dtls[0]->exam_time;
$time_arr=explode(':',@$set_dtls[0]->exam_time);if($time_arr[0]>=12){echo ' PM';}else{echo ' AM'; } ?>
</td>

<td><?php 
echo gmdate("H:i:s", $set_dtls[0]->exam_duration);
 ?></td>

<td><?php if(strtotime($exam_date_time) >= time()){ echo 'Enrolled'; }else{ 

  // echo count($user_exam);

if(count($user_exam)<=0){ echo "Absent"; }else{
  echo "Present";
}



 } ?></td>

<td><?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{
if(count($user_exam)<=0){ echo 'N/A'; }else{
  echo @$user_rank[0]->rank_index; } } ?></td>
<td>

<?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{ echo @$first_user_rank[0]->rank_index; } ?>
  
</td>
<td><?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{echo @$percentage;} ?></td>

<td><?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{ if(count($user_exam)<=0){ echo 'N/A'; } else if(@$user_award[0]->award_amount!=""){echo @$user_award[0]->award_amount; } else if(count($user_n_award)<=0){ echo 'Not Awarded yet'; } else{echo 'Try Next';} } ?></td>

<td> <?php if(strtotime($exam_date_time) >= time()){ echo 'N/A'; }else{ if(count($user_exam)<=0){ echo 'N/A'; }else if(count($user_n_award)<=0){ echo 'Not Awarded yet';
} else if(count($user_award)>0 && @$user_award[0]->award_amount >0){ 
    if(count($claim_award)==0)
      {
        ?>
  <a href="<?php echo $this->url->link(102);?>/<?php echo @$set_id; ?>" class="btn btn-warning">Claim Award</a>
<?php 
}
else{
      echo "Claimed";
}
}
 else{ echo "Try Next";  } } ?>
</td>

<td>

  <?php 
if(strtotime($exam_date_time) >= time()){ 


    ?>

  <a href="<?php echo $this->url->link(117).'/'.$set_dtls[0]->set_slug;?>" class="btn btn-success">Start Exam Now</a>

  <?php }else{   ?> 
<a href="<?php echo $this->url->link(90); ?>" class="btn btn-success">Rank & Award</a>

  <?php }  ?>     
</td>

<td> <?php
if(strtotime($exam_date_time) >= time()){  echo "Level 1"; }

 

else if(count($nxt_level_rank)>0){ 

  if($next_level_date >= $curr_date && count($nxt_level_studentrank)==0)
  {
    

  ?> 
 


 <a href="<?php echo $this->url->link(124).'/'.$set_dtls[0]->set_slug;?>" class="btn btn-success">Go to Next Level</a> <?php 
}
else{
  echo 'Over';

}
}
 else{ echo "Over"; }  
 ?> </td>

</tr>

<?php }else{ ?>
<tr>
<td><?php echo @$group_details[0]->exam_name; ?></td>
<td><?php echo @$exam_details[0]->exam_name; ?></td>
<td><?php echo @$sub_details[0]->section_name; ?></td>

<td><?php echo @$set_dtls[0]->exam_date.', '.@$set_dtls[0]->exam_time;
$time_arr=explode(':',@$set_dtls[0]->exam_time);if($time_arr[0]>=12){echo ' PM';}else{echo ' AM'; } ?>
</td>

<td><?php 
echo gmdate("H:i:s", $set_dtls[0]->exam_duration);
 ?></td>

<td><?php if(strtotime($exam_date_time) >= time()){ echo 'Enrolled'; }else{ echo 'Not Conducted Exam'; } ?></td>

<td><?php  echo 'N/A'; ?></td>
<td>
<?php  echo 'N/A'; ?></td>
<td><?php  echo 'N/A'; ?></td>
<td><?php  echo 'N/A'; ?></td>

<td> <?php  echo 'N/A'; ?>
</td>

<td> <?php if(strtotime($exam_date_time) >= time()){ ?><a href="<?php echo $this->url->link(117).'/'.$set_dtls[0]->set_slug;?>" class="btn btn-success">Start Exam Now</a> <?php }else{ 

if(@count($user_refund)==0){

  ?> 


  <a href="<?php echo $this->url->link(122);?>/<?php echo @$set_id; ?>" class="btn btn-warning">Refund</a>

<?php }else{ ?>

<a href="<?php echo $this->url->link(123);?>/<?php echo @$set_id; ?>" class="btn btn-warning">Refund Details</a>

<?php } } ?>
     </td>
     
<td> <?php if(strtotime($exam_date_time) >= time()){ ?><a href="<?php echo $this->url->link(117).'/'.$set_dtls[0]->set_slug;?>" class="btn btn-success">Start Exam Now</a> <?php }else{ 

if(@count($user_refund)==0){

  ?> 


  <a href="<?php echo $this->url->link(122);?>/<?php echo @$set_id; ?>" class="btn btn-warning">Refund</a>

<?php }else{ ?>

<a href="<?php echo $this->url->link(123);?>/<?php echo @$set_id; ?>" class="btn btn-warning">Refund Details</a>

<?php } } ?>
     </td>
</tr>
<?php } ?>
<?php } ?>
                                   <!-- <tr>
                                    <td>Engineering</td>
                                    <td>JEE</td>
                                    <td>Physics</td>
                                    <td>5</td>
                                    <td>9.25</td>
                                    <td>54.05405405</td>
                                    <td>12-12-2018 & 14:54:00</td>
                                    <td>Next Try</td>
                                    <td>NA</td>
                                    <td>NO</td>
                                                                    </tr> -->
                                 
                                </tbody>
														  </table>



									      		</div>


<?php } else{echo 'No Record Available'; }?>


									      </div>
									    </div>
									  </div>
									  
								</div>





                           </fieldset>


                          




                         


                        </div>
                  </div>

  			</div>

  		</div>

  </div>
 </div>
</div>





