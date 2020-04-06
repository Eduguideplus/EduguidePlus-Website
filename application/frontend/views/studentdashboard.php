



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

  			

  			





  			  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 res480-pl-0 res480-pr-0">



         <div class="myaccount-field myaccount-widget">

            <div class="my_profile_img">

              <?php if(@$studentdetails[0]->profile_photo!=''){ ?>

                <img src="<?php echo base_url(); ?>assets/uploads/student_pic/<?php echo @$studentdetails[0]->profile_photo; ?>" alt="" class="img-responsive">

                                    <?php  }else{?>

                                      <img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="" class="img-responsive">

                                    <?php } ?>

                                    

                               

            </div>

          <div class="welcome_deshboard">

            <h3 class="title">Dashboard of <?php echo @$studentdetails[0]->user_name;?></h3>

            <?php if($user[0]->user_type_id==2) { ?>

            <a href="<?php echo $this->url->link(131); ?>" class="pull-right">Go For Test</a>

          <?php } ?>



           <a href="<?php echo $this->url->link(95);?>" class="pull-right">Back to Dashboard</a>

            <a href="<?php echo $this->url->link(98);?>" class="pull-right">My Profile</a>





          </div>

          <div class="dashboard_button text-right">



            <button class="pdf" onclick="download_pdf('<?php echo $studentdetails[0]->id; ?>');">PDF</button>

            <!-- <button class="pdf">JPG</button> -->

            <button class="excel" onclick="download_csv('<?php echo $studentdetails[0]->id; ?>');" >EXCEL</button>

          </div>

            <!-- candidate dashboard section -->

<div class="candidate-main">

    <div class="col-xs-12">

      

      <div class="table-responsive">

        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">

          <thead style="background-color: #2196f3;">

            <tr>

              <th>SL No.</th>

              <th style="display: table-cell; white-space: nowrap;vertical-align: inherit;">Candidate's Name</th>

              <th style="display: table-cell; white-space: nowrap; vertical-align: inherit;">Date & Time</th>

              <th>Test Type</th>

              <th>Total Questions</th>

              <th>Time Allotted</th>

              <th>Question Attempted</th>

             <th>Right Answer</th>

             <!--  <th>Wrong Answer</th> -->

              <th>Score</th>

              <th>%</th>

            <!--   <th>Status</th> -->

            </tr>

          </thead>

          <tbody>

            <?php

            if(count($attempted_exam_list)>0)

              {

                $cnt=0;

                foreach($attempted_exam_list as $res)

                {

                  $get_userdetail= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$res->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



                  $get_setdetail= $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$res->set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



                  $setSlug= $get_setdetail[0]->set_slug;



                  $cnt++;



                  $examchapter_id= $res->chap_id;

                  $testselectType= $res->test_select_type;



                  if($examchapter_id>0)

                  {

                    $chapter_details= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_id'=>$examchapter_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                    $chapterName= @$chapter_details[0]->chap_name;

                  }

                  else{

                    $chapterName='';

                  }





                ?>

            <tr>

              <td><?php echo $cnt; ?></td>

              <td style="display: table-cell; white-space: nowrap;"><?php echo $get_userdetail[0]->user_name; ?></td>

              <td style="display: table-cell; white-space: nowrap;"><?php echo date('d/m/Y H:i:s', strtotime($res->start_time)); ?></td>

              <td><?php echo $res->test_select_type; if($chapterName!=''){ echo '( '. $chapterName.' )'; } ?></td>

              <td><?php echo round($res->q_qty); ?></td>

              <td><?php echo gmdate('H:i:s',$res->exam_duration ); ?></td>

              <td><?php echo round($res->attempt_count); ?></td>

              

              <td><?php echo round($res->obtained_marks); ?></td>

            <!--   <td><?php echo round(($res->attempt_count)-($res->obtained_marks)); ?></td> -->

              <td><?php echo round($res->obtained_marks); ?></td>

              <td>

                <?php 

                $totalmarks= $res->total_marks; 

                $obtainedMarks= $res->obtained_marks;



                $percentage= round(($obtainedMarks/$totalmarks)*100);

                echo $percentage.'%';



              ?></td>

              <!-- <td>

                <?php

                if($res->is_notify=='Yes')

                  {

                    ?>

                    <span style="color:green; font-weight: bold">Done</span>

                    <?php

                  }

                  else{

                        if($testselectType=='Chapterwise')

                        {





                    ?>

                         <a class="pdf" href="<?php echo  $this->url->link(117).'/'.$res->set_id.'/'.$setSlug; ?>">Re-attempt</a>

                    <?php

                  }

                  else{

                    ?>

                     <a class="pdf" href="<?php echo  $this->url->link(143).'/'.$res->set_id.'/'.$setSlug; ?>">Re-attempt</a>

                    <?php

                  }

                  }

                  ?>



              </td> -->

            </tr>

           <?php

         }

       }

         else{

          ?>

          <tr>

              <td colspan="11">Currently didn't appear any Test yet</td>

              

            </tr>

            <?php

          }

          ?>

           

             

             

             

          </tbody>

        </table>

      </div><!--end of .table-responsive-->

     <!--  <div class="note"><p>System will not save or store data if not 75% question attempted</p></div> -->

    </div>

    </div>

            <!-- end candidate section -->





        </div>

        </div>



  			</div>



  		</div>



  </div>

 </div>

</div>



<script type="text/javascript">

  function download_csv(student_id)

  {

      window.location='<?php echo $this->url->link(148);?>/'+student_id;

  }

</script>



<script type="text/javascript">

  function download_pdf(student_id)

  { // alert(student_id);

      window.location='<?php echo base_url();?>Dashboard/download_details_pdf/'+student_id;

  }

</script>











