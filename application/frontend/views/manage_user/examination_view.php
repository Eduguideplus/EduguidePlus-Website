<?php //include "header.php";
//$this->session->unset_userdata('token');
/*echo '<pre>';
print_r($exam_list);*/
 ?>
<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
    </section>
<div class="ed_dashboard_wrapper">
    <div class="container">
        <div class="row">

        <?php if($this->session->flashdata('error_msg')!=''){?>
         <div class="alert alert-danger alert-dismissable">
        
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Sorry!</strong> <?php echo @$this->session->flashdata('error_msg');?>
  </div>
  <?php } ?>
 <?php if($this->session->flashdata('success_msg')!=''){?>
  <div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success!</strong> <?php echo @$this->session->flashdata('success_msg');?>
  </div>
  <?php } ?>
            <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="ed_sidebar_wrapper">
                    <div class="ed_profile_img ">
                    <img src="<?php echo base_url();?>assets/uploads/user/<?php if(@$user[0]->profile_photo!=''){ echo @$user[0]->profile_photo; }else{echo 'no-img-profile.png'; }?>" alt="Dashboard Image" class="img-profile" id="img_profile">
                    <div class="img-loader" style="display:none;" id="photo_loader">
                        <img src="<?php echo base_url();?>assets/images/loading1.gif">
                    </div>
                    </div>
                    <h3><?php echo $user[0]->first_name;?></h3>
                     <div class="ed_tabs_left">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="<?php echo $this->url->link(8); ?>" data-toggle="tab">dashboard</a></li>
                          <li><a href="#profile" data-toggle="tab">profile</a></li>
                          <li><a href="#setting" data-toggle="tab">setting</a></li>
                          <li><a href="#wallet" data-toggle="tab">Details</a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
            <div class="ed_dashboard_tab">
                <div class="tab-content">
                  
                    
                    <div class="tab-pane active" id="wallet">
                        <div class="ed_dashboard_tab_info">
                            <h2 class="wallet-title">Exam Details</h2>
                            <div class="wallet-content clearfix">
                                
                            </div>


                             <p class="text-left exam-head" style="font-weight:bold;"><i class="fa fa-th-list" aria-hidden="true"></i> Remaining Examination List</p>
                           <div>
                            <div class="table-responsive">
                            <table class="table table-border table-hover">
                            <thead>
                           <tr>
                            
                            <th>Examination Name</th>
                            <th>No. of Examination</th>
                            <th>Full Marks</th>
                            <th>Duration</th>
                            <th>End Date</th>
                            <th>Take Examination</th>
                            
                           </tr>
                           </thead>
                           <tbody>
                           <?php 

                           $total_remaining_paper=0;
                           for($i=0;$i<count($exam_list);$i++){


                            if( $exam_list[$i]['paper_qty']>0)
                            {

                              $total_remaining_paper=$total_remaining_paper+$exam_list[$i]['paper_qty'];

                            $exam_type_id=$exam_list[$i]['exam_type'];
                             $exam_type_dtls = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$exam_type_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                               $pattern = $this->common_model->common($table_name = 'tbl_set_pattern', $field = array(), $where = array('exam_id'=>@$exam_type_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                               $total_qstn=0;
                               if(count(@$pattern)>0)
                               {
                                    $marks=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('exam_id'=>@$exam_type_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                                    $each_marks=@$marks[0]->marks;


                                    for($q=0;$q<count($pattern);$q++)
                                    {
                                      $total_qstn=$total_qstn+@$pattern[$q]->quantity;
                                    }

                                    $total_marks=@$total_qstn*@$each_marks;


                                     $time_exam = $this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$exam_type_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                                     $total_duration=@$time_exam[0]->time_per_marks*@$total_marks;


                               }
                               else
                               {
                                  $total_marks=0;
                               }



                              

                           

                            ?>
                           <tr>
                           <td><p><?php echo @$exam_type_dtls[0]->exam_name; ?></p></td>
                           <td><?php echo @$exam_list[$i]['paper_qty']; ?></td>
                           <td><?php if($total_marks!=0){ echo @$total_marks; }?></td>
                           <td><?php echo @$total_duration; ?></td>
                           <td><?php echo $exam_list[$i]['validity_date']; ?></td>
                           <td> <button class="btn btn-success" onclick="go_to_instruction_now('<?php echo @$exam_type_id; ?>','<?php echo $exam_list[$i]['user_plan_id'];?>')">Start Examination Now <i class="fa fa-play" aria-hidden="true"></i></button></td>
                           </tr>

                           <?php }} ?>
                           </tbody>
                            </table>

                          </div>
                           </div>



<!--complete Exam-->
<?php if(count(@$completed_exam)>0){?>
<div class="complete-box">
  <hr>
                           <p class="text-left exam-head" style="font-weight:bold;"><i class="fa fa-th-list" aria-hidden="true"></i> Completed Examination List</p>
                           <div class="table-responsive">
                            <table class="table table-hover">
                            <thead>
                           <tr>
                            <th>Set Name</th>
                            <th>Examination Name</th>
                            <th>Completed On</th>
                            <th>Full Marks</th>
                            <th>Marks Obtained</th>
                            <th>View Details Result</th>
                            <th>Show Analysis</th>
                            
                           </tr>
                           </thead>
                          <tbody>
                          <?php 
                             
                            $user_id=$this->session->userdata('user_identity');
                            foreach($completed_exam as $ce)
                            {

                              $time=time();
                              $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                               $randstring = str_shuffle(@$characters);

                              $set_id=$ce->set_id;

                              $set_dtls= $this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('id'=>@$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                               $user_exam= $this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('set_id'=>@$set_id,'user_id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                              $exam_type=$set_dtls[0]->exam_id;

                              $exam_type_dtls= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$exam_type), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


                              $marks=0;
                              $set_question=$this->join_model->get_set_question($set_id);
                              $pass_ids=array();
                              
                              for($m=0;$m<count($set_question);$m++)
                              {
                                $marks=$marks+$set_question[$m]->marks;
                                
                              }
                              $passage_question=$this->join_model->get_set_passage_question($set_id);
                               for($m=0;$m<count($passage_question);$m++)
                              {
                                $marks=$marks+$passage_question[$m]->marks;
                                
                              }
                                  ?>
                           
                           <tr>
                           <td><p><?php echo @$set_dtls[0]->set_name; ?></p></td>
                           <td><?php echo @$exam_type_dtls[0]->exam_name; ?></td>
                           <td><?php echo @$ce->end_time; ?></td>
                           <td><?php echo@$marks; ?></td>
                           <td><?php echo number_format((float)@$ce->obtained_marks, 2, '.', ''); ?></td>
                           <td><a href="javascript:void(0)" onclick="go_to_evaluation('<?php echo $ce->id; ?>','<?php echo @$set_id; ?>')" class="btn btn-warning" target="_blank"><i class="fa fa-book" aria-hidden="true"></i> Evaluation</a></td>
                           <td><a href="<?php echo $this->url->link(60).'/'.$set_dtls[0]->set_slug.'/'.$user_exam[0]->id.'/'.$time.'/'.$randstring;?>"  class="btn btn-info" target="_blank"><i class="fa fa-pie-chart" aria-hidden="true"></i> Analysis</a></td>
                           </tr>

                           <?php


                            }


                          ?>
                           </tbody>
                            </table>
                           </div>
                         </div>
<?php } ?>




<!--End-->

<!--Incomplete Exam-->

<?php if(count(@$incomplete_exam)>0){?>
                           <p class="text-left exam-head" style="font-weight:bold;"><i class="fa fa-th-list" aria-hidden="true"></i> Incompleted Examination List</p>
                           <div class="table-responsive">
                            <table class="table table-hover">
                            <thead>
                           <tr>
                            <th>Set Name</th>
                            <th>Examination Name</th>
                            <th>Created On</th>
                            <th>Full Marks</th>
                            <th>Action </th>
                           <!-- <th>Send Request</th>-->
                            
                           </tr>
                           </thead>
                          <tbody>
                          <?php 

                            foreach($incomplete_exam as $ice)
                            {
                              $set_id=$ice->set_id;

                              $set_dtls= $this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('id'=>@$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                              $exam_type=$set_dtls[0]->exam_id;

                              $exam_type_dtls= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$exam_type), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


                              $marks=0;
                              $set_question=$this->join_model->get_set_question($set_id);
                              $pass_ids=array();
                              
                              for($m=0;$m<count($set_question);$m++)
                              {
                                $marks=$marks+$set_question[$m]->marks;
                                
                              }
                              $passage_question=$this->join_model->get_set_passage_question($set_id);
                               for($m=0;$m<count($passage_question);$m++)
                              {
                                $marks=$marks+$passage_question[$m]->marks;
                                
                              }


                            if($this->session->userdata('user_identity')!='')
                            {
                              $user_id=$this->session->userdata('user_identity');
                            }
                              $request_dtls= $this->common_model->common($table_name = 'tbl_exam_resume_request', $field = array(), $where = array('user_id'=>@$user_id,'user_plan_id'=>@$ice->user_plan_id,'set_id'=>@$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                              $exist_req=count($request_dtls);


                                  ?>
                           
                           <tr>
                           <td><p><?php echo @$set_dtls[0]->set_name; ?></p></td>
                           <td><?php echo @$exam_type_dtls[0]->exam_name; ?></td>
                           <td><?php echo @$ice->created_on; ?></td>
                           <td><?php echo@$marks; ?></td>
                           <td>
                            
                             
                          <!--<a href="javascript:void(0)" onclick="go_to_resume_exam('<?php echo @$ice->id; ?>','<?php echo @$set_id; ?>')" class="btn   <?php if(@$request_dtls[0]->status=='approved'){ echo 'btn-success'; }else{ echo 'btn-warning';}?> <?php if(@$ice->resume=='No'){echo 'disable-anchor';}?>" target="_blank"> Resume</a>-->

							<a href="javascript:void(0)" class="btn btn-success" target="_blank" onclick="go_to_resume_exam('<?php echo @$ice->id; ?>','<?php echo @$set_id; ?>')" > Resume</a>

                           </td>
                           <!--<td><span id="req_<?php echo @$set_id; ?>">
                           <?php 

                           if($exist_req!=0)
                           { 
                            if($request_dtls[0]->status=='approved')
                            {
                                 echo '<a href="javascript:void(0)" class="btn btn-info" target="_blank"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>';
                            }
                            else
                              {
                                echo '<a href="javascript:void(0)" class="btn btn-info" target="_blank"><i class="fa fa-envelope faa-shake animated" aria-hidden="true"></i> Request Sent</a>';
                              }
                            }
                            else{?><a href="javascript:void(0)" onclick="send_request('<?php echo $set_id; ?>','<?php echo @$ice->user_plan_id; ?>')" class="btn btn-info" target="_blank"><i class="fa fa-paper-plane" aria-hidden="true"></i> Request</a><?php } ?></span></td>-->
                           </tr>

                           <?php


                            }


                          ?>
                           </tbody>
                            </table>
                           </div>
<?php } ?>


<!--End-->





<!--Practice Exam-->

<?php if(count(@$practice_exam)>0){?>
                           <p class="text-left" style="font-weight:bold;"><i class="fa fa-th-list" aria-hidden="true"></i> Practice Examination List</p>
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
                          <?php 

                            foreach($practice_exam as $ce)
                            {
                              $set_id=$ce->set_id;

                              $set_dtls= $this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('id'=>@$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                              $exam_type=$set_dtls[0]->exam_id;

                              $exam_type_dtls= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$exam_type), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


                              $marks=0;
                              $set_question=$this->join_model->get_set_question($set_id);
                              $pass_ids=array();
                              
                              for($m=0;$m<count($set_question);$m++)
                              {
                                $marks=$marks+$set_question[$m]->marks;
                                
                              }
                              $passage_question=$this->join_model->get_set_passage_question($set_id);
                               for($m=0;$m<count($passage_question);$m++)
                              {
                                $marks=$marks+$passage_question[$m]->marks;
                                
                              }
                                  ?>
                           
                           <tr>
                           <td><p><?php echo @$set_dtls[0]->set_name; ?></p></td>
                           <td><?php echo @$exam_type_dtls[0]->exam_name; ?></td>
                           <td><?php echo @$ce->end_time; ?></td>
                           <td><?php echo@$marks; ?></td>
                           <td><?php echo number_format((float)@$ce->obtained_marks, 2, '.', ''); ?></td>
                           <td><a href="javascript:void(0)" onclick="go_to_evaluation('<?php echo $ce->id; ?>','<?php echo @$set_id; ?>')" class="btn btn-warning" target="_blank"><i class="fa fa-book" aria-hidden="true"></i> Evaluation</a></td>
                           </tr>

                           <?php


                            }


                          ?>
                           </tbody>
                            </table>
                           </div>
<?php } ?>


<!--End-->
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

    <div class="col-md-3 col-sm-4 col-xs-12 bg-none" id="blog-sidebar">
    <div class="widget">
                      <h4 class="widget-title">My Stat</h4>
                      <hr>
                        <div class="post-list categories">
                          <ul>
                              <li><a href="#">Completed Examination<span class="pull-right"><b><?php $completed_paper=0;if(count(@$completed_exam)>0){ $completed_paper=count(@$completed_exam);} echo $completed_paper; ?></b></span></a></li> 
                              <li><a href="#">Incompleted Examination<span class="pull-right"><b><?php $incompleted_paper=0;if(count(@$incomplete_exam)>0){ $incompleted_paper=count(@$incomplete_exam);} echo $incompleted_paper; ?></b></span></a></li> 
                                <li><a href="#">Remaining Examination <span class="pull-right"><b><?php echo @$total_remaining_paper; ?></b></span></a></li>
                               
                              
                            
                            </ul>
                            <a href="#" class="readmore">My Exam Details</a>
                        </div>
                    </div>
    </div>
</div>
</div>
</div>

<?php
/*$set_ids=array();
for($i=0;$i<count($sets);$i++)
{
    $set_ids[$i]=@$sets[$i]->id;

}
shuffle($set_ids);
$set_qty=count($set_ids)-1;
$random=mt_rand(0, @$set_qty);*/



?>
<input type="hidden" name="hid_set" id="hid_set" value="">
<input type="hidden" name="hid_user_plan" id="hid_user_plan" value="">


<!-- Modal -->
<div id="instruction" class="modal fade instruction" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center"><b>Instruction</b></h4>
      </div>
      <div class="modal-body">
        <p><b>Duration:</b> <span id="duration">180</span> min <span class="pull-right"><b>Full Marks:</b> <span id="fm">30</span></span></p>
        <p><b>Read the following instruction carefully:</b></p>
        <div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1">Know more about the interface</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
      <p><b>General Instruction:</b></p>
<ol id="ins">
<?php foreach($instruct as $ins){?>
    <li><?php echo $ins->instruction_details; ?></li>

    <?php } ?>
    <!-- <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</li> -->
</ol>
      </div>
      
    </div>
  </div>
</div>
      </div>
      <div class="col-md-12">
     <input type="checkbox" name="agree" id="agree" value="1" class="form-control agreechk"><b class="agree_check">I understand all the rules and privacy policy of the examination.</b>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" onclick="window.location='testpage.html';" class="btn btn-primary btn-lg">Start Test</button> -->
        <!-- <a href=""  class="btn btn-primary btn-lg" id="ready_exam">I am ready to begin</a> -->
        <input type="hidden" name="hid_lnk" id="hid_lnk" value="">
         <a target="_parent" class="btn btn-primary btn-lg" href="javascript:void(0);" id="ready_exam1" class="popup" >I am ready to begin</a>  
      </div>
    </div>

  </div>
</div>







<!-- reason Modal -->
<div id="reasonmodal" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h3 class="modal-title text-center">Please Specify Reason of closing Your Examination</h3>
      </div>
      <div class="modal-body" id="reason_body" >

      <div class="form-group">
      <label for="comment" style="font-size:15px; color:red;">* Mandatory</label>
      <textarea class="form-control" rows="5" id="reason" name="reason"></textarea>

      <div id="req_loader" class="text-center" style="display:none;"><img src="<?php echo base_url();?>assets/images/reg_loader.gif" width="80px" height="80px"></div>

      <span style="font-size:15px; color:red;" id="error"></span>
      </div>
        <input type="hidden" name="hdn_u_plan" id="hdn_u_plan" value="">
        <input type="hidden" name="hdn_set" id="hdn_set" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning center-block" id="send_btn" >Send Now</button>
      </div>
    </div>

  </div>
</div>

<!--End -->

          <?php //include "footer.php"; ?>

          <script>
          function save_profile()
          {
            alert('ok');
            var name=$('#name').val();
            var email=$('#email').val();
            var phno=$('#phno').val();
            var dob=$('#dob').val();
            var education=$('#education').val();
            var category=$('#category').val();
            var location=$('#location').val();
            var base_url=$("#baseurl").val();
           


            $.ajax({
                          
                         url:base_url+'index.php/manage_user/profile_change',
                         data:{nm:name, eml:email, phn:phno, dtb:dob, edu:education, cat:category, loc:location},
                         dataType: "json",
                         type: "POST",
                         success: function(data){
                          var perform= data.workdone;
                          //alert(perform['status']);
                          
                          if(perform['status']==1)
                          {
                            
                            $("#suc_msg").css("display", "block");
                            $("#err_msg").css("display", "none");
                            $("#suc_msg").text('Your profile has been saved successfully.');
                            
                          }
                          
                          else 
                          {
                            
                            $("#err_msg").css("display", "block");
                            $("#suc_msg").css("display", "none");
                            $("#err_msg").text('Sorry!! profile can not be saved.');
                           
                          }
                        

                             
                            
                              }
                         });
          }
          </script>


          <script>
           function save_profile_pic()
           {
            var pic=$("#photo").val();
            if(pic!='')
            {
                $("#photo_loader").css("display","block");
                var base_url=$("#baseurl").val();
                //alert(base_url);
                var formData = new FormData($("#prfile_pic")[0]);


                $.ajax({
                url: base_url+'index.php/manage_user/profile_image_save', // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                dataType: "json",
                async: false,
                success: function(data)   // A function to be called if request succeeds
                { 
                    var perform= data.workdone;
                   // alert(perform['status']);
                    if(perform['status']==1)
                    {
                         setTimeout(function() 
                        {
                    //do something special
                            $("#s_msg").css("display", "block");
                            $("#e_msg").css("display", "none");
                            $("#photo_loader").css("display","none");
                            $("#img_profile").attr('src','<?php echo base_url();?>assets/uploads/user/'+perform['pro_pic']);
                            $("#img_show").attr('src','<?php echo base_url();?>assets/uploads/user/'+perform['pro_pic']);
                            $("#current_img").val(perform['pro_pic']);
                            $("#s_msg").text('Your profile picture has been saved successfully.');
                    
                        }, 3000);
                            
                    }
                    else
                    {
                            $("#e_msg").css("display", "block");
                            $("#s_msg").css("display", "none");
                            $("#e_msg").text('Sorry!! profile picture can not be saved.');

                        
                    }
                },

                cache: false,
                contentType: false,
                processData: false


                });

            }
            else
            {
                            $("#e_msg").css("display", "block");
                            $("#s_msg").css("display", "none");
                            $("#e_msg").text('Sorry!! please chose one photo.');

            }
            
           }


          </script>

          <script>
              function change_setting()
              {
                var ac_email=$("#ac_email").val();
                var new_pwd=$("#new_pwd").val();
                var con_pwd=$("#con_pwd").val();
                var base_url=$("#baseurl").val();
                if(ac_email!='' && new_pwd=='' || con_pwd=='')
                {

           


            $.ajax({
                          
                         url:base_url+'index.php/manage_user/setting_change',
                         data:{eml:ac_email},
                         dataType: "json",
                         type: "POST",
                         success: function(data){
                          var perform= data.workdone;
                          //alert(perform['status']);
                          
                          if(perform['status']==1)
                          {
                            
                            $("#true_msg").css("display", "block");
                            $("#false_msg").css("display", "none");
                            $("#true_msg").text('Your account email has been saved successfully.');
                            
                          }
                          
                          else 
                          {
                            
                            $("#false_msg").css("display", "block");
                            $("#true_msg").css("display", "none");
                            $("#false_msg").text('Sorry!! email account can not be saved.');
                           
                          }
                        

                             
                            
                              }
                         });

                }
                if(ac_email!='' && new_pwd!='' && con_pwd!='')
                {
                     $.ajax({
                          
                         url:base_url+'index.php/manage_user/password_change',
                         data:{eml:ac_email, np:new_pwd, cp:con_pwd},
                         dataType: "json",
                         type: "POST",
                         success: function(data){
                          var perform= data.workdone;
                          //alert(perform['status']);
                          
                          if(perform['status']==1)
                          {
                            
                            $("#true_msg").css("display", "block");
                            $("#false_msg").css("display", "none");
                            $("#true_msg").text('Your account email and password has been saved successfully.');
                            
                          }
                          
                          else 
                          {
                            
                            $("#false_msg").css("display", "block");
                            $("#true_msg").css("display", "none");
                            $("#false_msg").text('Sorry!! account email and password can not be saved.');
                           
                          }
                        

                             
                            
                              }
                         });

                }

              }
          </script>


          <script>
           function delete_profile_pic()
           {
            var current_pic=$("#current_img").val();
            //alert(current_pic);
            if(current_pic!='')
            {
                $("#photo_loader").css("display","block");
                var base_url=$("#baseurl").val();
                //alert(base_url);
               


                $.ajax({
                url: base_url+'index.php/manage_user/profile_image_delete', 
                type: "POST",             
                data: {c_pic:current_pic}, 
                dataType: "json",
                async: false,
                success: function(data)  
                { 
                    var perform= data.workdone;
                    //alert(perform['status']);
                    if(perform['status']==1)
                    {
                        $("#img_show").attr('src','<?php echo base_url();?>assets/uploads/user/no-img-profile.png');

                         setTimeout(function() 
                        {
                    //do something special
                            $("#s_msg").css("display", "block");
                            $("#e_msg").css("display", "none");
                            $("#photo_loader").css("display","none");
                            $("#img_profile").attr('src','<?php echo base_url();?>assets/uploads/user/no-img-profile.png');

                            $("#s_msg").text('Your profile picture has been Deleted successfully.');
                    
                        }, 3000);
                            
                    }
                    else
                    {
                            $("#e_msg").css("display", "block");
                            $("#s_msg").css("display", "none");
                            $("#e_msg").text('Sorry!! No profile photo found to delete');

                        
                    }
                }

                


                });

            }
            else
            {
                            $("#e_msg").css("display", "block");
                            $("#s_msg").css("display", "none");
                            $("#e_msg").text('Sorry!! No profile photo found to delete');

            }
            
           }


          </script>


         <!--  <script>
          function go_to_instruction_now()
          {

                var set_id=$("#hid_set").val();
                var base_url=$("#baseurl").val();
                //alert(set_id);
                //alert(set_id);
                $.ajax({
                          
                         url:base_url+'index.php/manage_exam/get_instruction_details',
                         data:{set:set_id},
                         dataType: "json",
                         type: "POST",
                         success: function(data){
                          var perform= data.workdone;
                          //alert(perform['status']);
                          
                          if(perform['status']==1)
                          {
                            
                            $("#duration").text(perform['dur']);
                            $("#fm").text(perform['qty']);
                            $("#instruction").modal('show');
                            /*$("#ready_exam").attr('href','<?php echo $this->url->link(27).'/';?>'+perform['exam_ready']);*/
                            $("#hid_lnk").val(perform['exam_ready']);
                            $("#ready_exam1").attr('onclick','get_exam()');

                            
                          }
                          
                         
                        

                             
                            
                              }
                         });


                        
          }
          </script> -->




          <script>
          function go_to_instruction_now(exam_id,user_plan_id)
          {
            


                //var set_id=$("#hid_set").val();
                var base_url=$("#baseurl").val();
                $("#hid_user_plan").val(user_plan_id);

                 $.ajax({
                          
                         url:base_url+'index.php/manage_exam/get_random_set',
                         data:{examid:exam_id,userplan:user_plan_id},
                         dataType: "json",
                         type: "POST",
                         success: function(data){
                          
                         var perform= data.workdone;
                          //alert(perform['status']);
                          
                          if(perform['status']==1)
                          {
                            var random_set=perform['r_set']
                            $("#hid_set").val(random_set);
                          //alert(random_set);

                                    $.ajax({
                                  
                                             url:base_url+'index.php/manage_exam/get_instruction_details',
                                             data:{set:random_set,userplan:user_plan_id},
                                             dataType: "json",
                                             type: "POST",
                                             success: function(data){
                                              var perform= data.workdone;
                                              //alert(perform['status']);
                                              
                                              if(perform['status']==1)
                                              {
                                      
                                                $("#duration").text(perform['dur']);
                                                $("#fm").text(perform['qty']);
                                                $("#instruction").modal('show');
                                                /*var node="";
                                               for(var i=0;i<count(perform['instruct']);i++)
                                               {
                                                node=node+'<li>'+perform['instruct'][i]['instruction_details']+'</li>';

                                               }
                                               $("#ins").html(node);*/
                                               $("#hid_lnk").val(perform['exam_ready']);
                                                $("#ready_exam1").attr('onclick','get_exam()');

                                      
                                              }
                                  
                                 
                                

                                     
                                    
                                        }
                                    });



                           

                            
                          }

                          else
                          {
                            var exam_d=perform['exam_d'];
                            var userplan_id=perform['userplan_id'];
                            go_to_instruction_now(exam_d,userplan_id);

                          }


                         
                        

                             
                            
                              }
                         });





              


                        
          }
          </script>

       <script>
     function get_exam() {
     	//alert('ok');
     	var lnk=$("#hid_lnk").val();
     	//alert(lnk);
    var curr_browser = navigator.appName;
    if (curr_browser == "Microsoft Internet Explorer") {
        window.opener = self;
    }
    var examwindow;
    examwindow=window.open('<?php echo $this->url->link(27);?>/'+lnk, 'MyTest', 'width=900,height=750,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no');
    window.moveTo(0, 0);
    window.resizeTo(screen.width, screen.height - 100);
     examwindow.document.title = 'testing';

       examwindow.onload = function() { this.document.title = "Wbcs Forum Online Examination"; }
     $("#instruction").modal('hide');

};
          </script>  


          <script>
          function go_to_resume_exam(user_exam_id,set_id)
          {


               var base_url=$("#baseurl").val();

            $.ajax({
                                  
                                             url:base_url+'index.php/manage_exam/get_resume_exam',
                                             data:{set:set_id,userexam:user_exam_id},
                                             dataType: "json",
                                             type: "POST",
                                             success: function(data){
                                              var perform= data.workdone;
                                              //alert(perform['status']);
                                              
                                              if(perform['status']==1)
                                              {


                                                  var examwindow;
                                                 examwindow=window.open('<?php echo $this->url->link(65);?>/'+perform['exam_ready'], 'MyTest', 'width=900,height=750,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no');
    

                                                 examwindow.onload = function() { this.document.title = "Wbcs Forum Online Examination";}
                                                /*$("#duration").text(perform['dur']);
                                                $("#fm").text(perform['qty']);
                                                $("#instruction").modal('show');
                                               
                                               $("#hid_lnk").val(perform['exam_ready']);
                                                $("#ready_exam1").attr('onclick','get_exam()');*/

                                      
                                              }
                                  
                                 
                                

                                     
                                    
                                        }
                                    });

          }
          </script>


<script>

          function go_to_evaluation(user_exam,set_id)
{
  //alert('ok');
  
  var base_url='<?php echo base_url(); ?>';
  $.ajax(

                        {

                        type: "POST",

                        dataType: 'json',

                        url:base_url+'index.php/manage_exam/get_evaluation_link',
                        data:{uexam:user_exam,set:set_id},
                        async: false,

                        success: function (data) {
                            
                            var perform= data.workdone;
                                    //alert(perform['status']);
                                    if(perform['status']==1)
                                    {
                                      //alert(perform['evaluation_ready']);
                                      var lnk=perform['evaluation_ready']
                      var scorewindow;
                      scorewindow=window.open('<?php echo $this->url->link(62);?>/'+lnk, 'MyEvaluation', 'width=900,height=750,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no');

                      var exam_name=perform['exam_name'];

                      scorewindow.onload = function() { this.document.title = exam_name+" Examination Result Evaluation"; }

                      /*closeDialog($('#content'));
                    close();*/
                                        
                                        

                                    }
                                   
                                    
                                      }
                        });


  
}
</script>

<script>
function send_request(set_id,user_plan_id)
{

   

   $("#reasonmodal").modal('show');

   $("#hdn_set").val(set_id);
   $("#hdn_u_plan").val(user_plan_id);
   $('#send_btn').attr('onclick', 'send_request_reason()');

  /*$.ajax(

                        {

                        type: "POST",

                        dataType: 'json',

                        url:base_url+'index.php/manage_exam/put_resume_request',
                        data:{set:set_id,userplan:user_plan_id},
                        async: false,

                        success: function (data) {
                            
                            var perform= data.workdone;
                                    //alert(perform['status']);
                                    if(perform['status']==1)
                                    {
                                      alert('Request Sent successfully');
                                      var node='<a href="javascript:void(0)" class="btn btn-info" target="_blank"><i class="fa fa-cog" aria-hidden="true"></i> Request Sent</a>';
                                      $("#req_"+set_id).html(node);

                                     
                                    }
                                   
                                    
                                      }
                        });
*/
}
</script>

<script>
function send_request_reason()
{
  alert('ok');
  
  var set_id=$("#hdn_set").val();
  var user_plan_id=$("#hdn_u_plan").val();
  var rsn=$("#reason").val();
  var base_url='<?php echo base_url(); ?>';

  if(rsn!='')
{ 

//$("#req_loader").show();
          $.ajax(

                        {

                        type: "POST",

                        dataType: 'json',

                        url:base_url+'index.php/manage_exam/put_resume_request',
                        data:{set:set_id, userplan:user_plan_id, reason:rsn},
                        async: false,

                        success: function (data) {
                            //$("#req_loader").hide();
                            var perform= data.workdone;
                                    //alert(perform['status']);
                                    if(perform['status']==1)
                                    {

                                      var node='<img class="img-responsive center-block" width="200px" height="200px" src='+base_url+'./assets/images/request.gif>'

                                      $("#reason_body").html(node);


                                            setTimeout(
                                                    function() 
                                                    {
                                                      $("#reasonmodal").modal('hide');
                                                    }, 3000);


                                      
                                      //alert('Request Sent successfully');

                                      var node='<a href="javascript:void(0)" class="btn btn-info" target="_blank"><i class="fa fa-cog" aria-hidden="true"></i> Request Sent</a>';
                                      $("#req_"+set_id).html(node);

                                     
                                    }
                                   
                                    
                                      }
                        });


}
else
{
     
  $("#error").text('Sorry!! without reason request can not be sent');

}

   

   

}
</script>

