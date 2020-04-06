

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
              <?php if(@$user[0]->profile_photo!=''){
                if(@$user[0]->user_type_id==3)
                {

                  ?>
                  <img src="<?php echo base_url(); ?>assets/uploads/principal/<?php echo @$user[0]->profile_photo; ?>" alt="" class="img-responsive">
                  <?php
                }
                else if(@$user[0]->user_type_id==4){
                  ?>
                    <img src="<?php echo base_url(); ?>assets/uploads/partner/<?php echo @$user[0]->profile_photo; ?>" alt="" class="img-responsive">
                  <?php

                }
                else{
                  ?>
                  <img src="<?php echo base_url(); ?>assets/uploads/student_pic/<?php echo @$user[0]->profile_photo; ?>" alt="" class="img-responsive">
                  <?php
                }
                }
                else
                  {
                    ?>
                                      <img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="" class="img-responsive">
                                    <?php
                                     } 
                                     ?>
                                    
                             
            </div>
          <div class="welcome_deshboard">
            <h3 class="title">Welcome <?php echo @$user[0]->user_name;?></h3>
            <?php if($user[0]->user_type_id==2) { ?>
            <a href="<?php echo $this->url->link(131); ?>" class="pull-right">Go For Test</a>
          <?php } ?>
            <a href="<?php echo $this->url->link(98);?>" class="pull-right">My Profile</a>


          </div>
          <form action="<?php echo base_url(); ?>dashboard" id="search_form">
          <select class="delect-block-box" id="batch_id" name="batch_id">
            <option value="">All Batch</option>
            <?php
            foreach($batch_list as $bl)
              {
                ?>
                 <option value="<?php echo $bl->batch_id; ?>" <?php if($get_branch_id==$bl->batch_id){ echo 'selected'; } ?>><?php echo $bl->batch_name; ?></option>
                 <?php
               }
               ?>
             
          </select>
        </form>
          <div class="apply-block-cus">
            <a href="javascript:void(0);" onclick="search_by_batch();">Apply</a>
            
          </div>

          <form action="<?php echo $this->url->link(158); ?>" id="export_form">
            <input type="hidden" value="<?php echo @$get_branch_id; ?>" name="excelbatch_id">
          </form>

            <div class="dashboard_button text-right">

           <!--  <button class="pdf" >PDF</button> -->
            <!-- <button class="pdf">JPG</button> -->
            <button class="excel" onclick="export_batch_repot_excel();">EXCEL</button>
          </div>
          <!-- <div class="dashboard_button text-right">
            <button class="pdf">PDF</button>
            <button class="pdf">JPG</button>
            <button class="excel">EXCEL</button>
          </div> -->
            <!-- candidate dashboard section -->
<div class="candidate-main">
    <div class="col-xs-12">
      
      <div class="table-responsive">
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
          <thead style="background-color: #2196f3;">
            <tr>
              <th>SL No.</th>
              <th>Batch</th>
              <th>Photo</th>
              <th style="display: table-cell; white-space: nowrap;vertical-align: inherit;">Candidate's Name</th>
              <th style="display: table-cell; white-space: nowrap; vertical-align: inherit;">User Code</th>
              <th>Email Id</th>
              <th>Contact No.</th>
             <!--  <th>Date of Birth</th> -->
              
             <!--<th>City</th>-->
             <!--  <th>Wrong Answer</th> -->
              <th>Test attempted</th>
              
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if(count($total_student_list)>0)
              {
                $cnt=0;
                foreach($total_student_list as $res)
                {
                  $cnt++;

                  $get_total_exam= $this->common_model->get_all_exam_details($res->id);

                    $get_batch_details= $this->common_model->common($table_name = 'tbl_batch', $field = array(), $where = array('batch_id'=>$res->batch_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                    $get_city_details= $this->common_model->common($table_name = 'cities', $field = array(), $where = array('id'=>$res->city), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                  


                ?>
            <tr>
              <td><?php echo $cnt; ?></td>
              <td><?php echo $get_batch_details[0]->batch_name; ?></td>
               <td>
             
                 <?php if(@$res->profile_photo!=''){ ?>
                <img src="<?php echo base_url(); ?>assets/uploads/student_pic/<?php echo @$res->profile_photo; ?>" alt="" class="img-responsive" style="width: 50%">
                                    <?php  }else{?>
                                      <img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="" class="img-responsive" style="width: 50%">
                                    <?php } ?>
                                    
                         
               </td>
              <td style="display: table-cell; white-space: nowrap;"><?php echo $res->user_name; ?></td>
             
              <td><?php echo $res->user_code; ?></td>
              <td><?php echo $res->login_email; ?></td>
              <td><?php echo $res->login_mob; ?></td>
            <!--   <td><?php echo date('jS M y', strtotime($res->dob));?></td> -->
              
             <!--  <td><?php echo $get_city_details[0]->name; ?></td> -->
              <td><?php echo count($get_total_exam); ?></td>
              <td>
                <button class="excel" onclick="get_student_exam('<?php echo $res->id; ?>')">View Tests</button></td>
              
            </tr>
           <?php
         }
       }
         else{
          ?>
          <tr>
              <td colspan="11">No Student Available</td>
              
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
  function get_student_exam(student_id)
  {
    window.location='<?php echo $this->url->link(146);?>/'+student_id;
  }

  function search_by_batch()
  {
    
      $("#search_form").submit();
    
    
  }
  function export_batch_repot_excel()
  {
    $("#export_form").submit();
  }
</script>

