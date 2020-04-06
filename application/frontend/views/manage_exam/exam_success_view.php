
<!-- <section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
</section> -->

<?php
 $examchapter_id= $attempted_exam_list[0]->chap_id;

                  if($examchapter_id>0)
                  {
                    $chapter_details= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_id'=>$examchapter_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                    $chapterName= @$chapter_details[0]->chap_name;
                  }
                  else{
                    $chapterName='';
                  }


                  $set_id= @$attempted_exam_list[0]->set_id;

                  $set_details= $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                   $sub_details= $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>@$set_details[0]->subject_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                  ?>
<div class="sucess">
	<div class="container">
		<div class="col-md-12 p-no">
	         <div class="nopad test-app courses-area">
	            <h2 class="head-title text-center"> Your Examination Successfuly Submited</h2>
	        </div>
       
      </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="exam-success-main">
        <div class="col-md-7 col-sm-7 col-xs-12 no-padding">
          <div class="exam-success-lft">
            <div class="exam_sub"><h4>Registration Number</h4><span>:</span><p><?php echo $user[0]->user_code; ?></p></div>
            
            <div class="exam_sub"><h4>Candidate Name</h4><span>:</span><p><?php echo strtoupper($user[0]->user_name); ?></p></div>
           <!--  <div class="exam_sub"><h4>PAN</h4><span>:</span><p><?php echo strtoupper($user[0]->pan); ?></p></div> -->
            <div class="exam_sub"><h4>Examination Name</h4><span>:</span><p>Test for <?php echo @$sub_details[0]->section_name; ?></p></div>
            <div class="exam_sub"><h4>Language</h4><span>:</span><p>English</p></div>
           <!--  <div class="exam_sub"><h4>Testing Centre</h4><span>:</span><p>NA</p></div> -->
            <div class="exam_sub"><h4>Examination Date & Time</h4><span>:</span><p><?php echo date('jS M Y, H:i:s', strtotime($attempted_exam_list[0]->start_time)); ?></p></div>
            <!-- <div class="exam_sub"><h4>Examination Time</h4><span>:</span><p>NA</p></div> -->
          </div>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-12 no-padding">
            <div class="exam-success-rht">
               <?php if(@$user[0]->profile_photo!=''){ ?>
                <img src="<?php echo base_url(); ?>assets/uploads/student_pic/<?php echo @$user[0]->profile_photo; ?>" alt="" class="img-responsive" style="height:100px; width: 100px;">
                                    <?php  }else{?>
                                      <img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="" class="img-responsive" style="height:100px; width: 100px;">
                                    <?php } ?><p><?php echo strtoupper($user[0]->user_name); ?></p>
          </div>
        </div>
         <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
            <div class="table-responsive">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
          <thead style="background-color: #2196f3;">
            <tr>
              <th style="text-align: center;">Marks Scored</th>
              <th style="display: table-cell; white-space: nowrap;vertical-align: inherit;text-align: center">Out of Total Marks</th>
              <th style="display: table-cell; white-space: nowrap; vertical-align: inherit; text-align: center">Percentage</th>
              <th style="text-align: center;">Passing Percentage</th>
              <th style="text-align: center;">No. of Questions attempted</th>
              <th style="text-align: center;">Correct answers</th>
              <th style="text-align: center;">Wrong answers</th>   
              <!-- <th style="text-align: center;">Result</th> -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo round($attempted_exam_list[0]->obtained_marks); ?></td>
               <td><?php echo round($attempted_exam_list[0]->total_marks); ?></td>
              <td style="display: table-cell; white-space: nowrap;"><?php 
                $totalmarks= $attempted_exam_list[0]->total_marks; 
                $obtainedMarks= $attempted_exam_list[0]->obtained_marks;

                $percentage= round(($obtainedMarks/$totalmarks)*100);
                echo $percentage.'%';

              ?></td> 
              <td>50%</td>
              <td style="display: table-cell; white-space: nowrap;"><?php echo round($attempted_exam_list[0]->attempt_count); ?></td>
             
              <td><?php echo $attempted_exam_list[0]->curr_ans; ?></td>
              <td><?php echo $attempted_exam_list[0]->wrong_ans; ?></td>
             
              
              <!-- <td>
                <?php
              if($percentage<50){
                echo 'FAIL'; 
              }
              else{
                echo 'PASS';
              }
                ?>
                  
                </td> -->
              
            </tr>  
          </tbody>
        </table>
      </div>

 <div class="button_dash_ann">

   <ul>
        <li>
           <div class="test_btn">
            <!-- <button type="Submit" > </button> -->
            <!-- <a href="<?php echo $this->url->link(95);?>" class="btn_read_more">Go To Dashboard</a> -->
            <a href="javascript:void(0);" class="btn_read_more" onclick="close_win();"><i class="fa fa-cross" aria-hidden="true"></i>Close</a>
         </div>
        </li>
        <li>
           <div class="test_btn">
            <!-- <button type="Submit" > </button> -->
            <!-- <a href="<?php echo $this->url->link(159);?>/<?php echo $attempted_exam_list[0]->id; ?>" class="btn_read_more">Analysis</a> -->
            <a href="<?php echo $this->url->link(159);?>/<?php echo $attempted_exam_list[0]->id; ?>" class="btn_read_more"><i class="fa fa-search" aria-hidden="true"></i>Analysis</a>
         </div>
        </li>
      </ul>

 </div>

     

        

         
    </div>
      </div>
    </div>
   
	</div>
	</div>
  <script type="text/javascript">
    function close_win()
    {
      if(confirm('do you want to close the window?' ))
      {
        window.close();
      }
      
    }
  </script>