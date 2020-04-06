<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
  <section class="content">
      <!-- Small boxes (Stat box) -->
   <div class="row">

    <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_exam_type/group_view',get_cookie('session_user_id'))=='Y' || $admin_details[0]->user_type_id==1)
    { ?>


      <div class="col-lg-3 col-xs-6">
        
          <div class="small-box bg-red">
            <div class="inner">
              <h4>Total Course</h4>

              
                <p>
                          <?php
                        $group= count($group);
                        if(strlen($group)<2) 
                        {
                            $group='0'.$group;
                        }
                        else{
                            $group=$group;
                        }


                             echo $group; 
                        ?>

                        </p>
            </div>
            <div class="icon">
              <i class="fa fa-cubes" aria-hidden="true"></i>
            </div>
             
            <a href="<?php echo base_url();?>index.php/manage_exam_type/course_view" class="small-box-footer">More info<i class="fa fa-arrow-circle-right"></i></a>

                
          </div>
      </div> 

       <?php } ?>


       <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_exam_type/view',get_cookie('session_user_id'))=='Y' || $admin_details[0]->user_type_id==1)
    { ?>


        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4>Total Examinations</h4>
                       <p>
                          <?php
                        $exam_type= count($exam_type);
                        if(strlen($exam_type)<2) 
                        {
                            $exam_type='0'.$exam_type;
                        }
                        else{
                            $exam_type=$exam_type;
                        }
                             echo $exam_type; 
                        ?>

                        </p>
             
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap" aria-hidden="true"></i>
            </div>
          

            <a href="<?php echo base_url();?>index.php/manage_exam_type/view" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

             
          </div>
      </div>

      <?php } ?>


      <?php 

      $admin_details=$this->session_check_and_session_data->admin_session_data();
       
     if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_section/view',get_cookie('session_user_id'))=='Y' || $admin_details[0]->user_type_id==1)
    { ?>

		  <div class="col-lg-3 col-xs-6">
         
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>Total Subject</h4>

                     <p>
                          <?php
                        $section= count($section);
                        if(strlen($section)<2) 
                        {
                            $section='0'.$section;
                        }
                        else{
                            $section=$section;
                        }
                             echo $section; 
                        ?>

                        </p>
            </div>
            <div class="icon">
              <i class="fa fa-book" aria-hidden="true"></i>
            </div>
            
            <a href="<?php echo base_url();?>index.php/manage_section/view" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

          
          </div>
      </div>
<?php } ?>

        
        <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_question/view',get_cookie('session_user_id'))=='Y' || $admin_details[0]->user_type_id==1)
    { ?>
      <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h4>Total Questions</h4>

                       <p>
                          <?php
                        $question= count($question);
                        if(strlen($question)<2) 
                        {
                            $question='0'.$question;
                        }
                        else{
                            $question=$question;
                        }
                             echo $question; 
                        ?>

                        </p>
            </div>
            <div class="icon">
             <i class="fa fa-question-circle" aria-hidden="true"></i>
            </div>

 
        
            <a href="<?php echo base_url();?>index.php/manage_question/view" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            
          </div>
      </div>

      <?php } ?>



       <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_user/list_view',get_cookie('session_user_id'))=='Y' || $admin_details[0]->user_type_id==1)
    { ?>

          <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-lime">
            <div class="inner">
              <h4>Total Student</h4>
 <p>
                     <?php
                        $user= count($user);
                        if(strlen($user)<2) 
                        {
                            $user='0'.$user;
                        }
                        else{
                            $user=$user;
                        }
                             echo $user; 
                        ?> 
                      
                        </p>
             
            </div>
            <div class="icon">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
          

            <a href="<?php echo base_url();?>index.php/manage_user/list_view" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            
          </div>
      </div>




      <?php } ?> 



       <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_knowledge/knowledge_view/',get_cookie('session_user_id'))=='Y' || $admin_details[0]->user_type_id==1)
    { ?>

          <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <h4>Total Test</h4>
 <p>
                     <?php
                        $user= count($test);
                        if(strlen($user)<2) 
                        {
                            $user='0'.$user;
                        }
                        else{
                            $user=$user;
                        }
                             echo $user; 
                        ?> 
                      
                        </p>
             
            </div>
            <div class="icon">
              <i class="fa fa-clipboard" aria-hidden="true"></i>
            </div>
          

            <a href="<?php echo base_url();?>index.php/manage_knowledge/knowledge_view/knowledge" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            
          </div>
      </div>




      <?php } ?> 


       <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_institution/inst_list',get_cookie('session_user_id'))=='Y' || $admin_details[0]->user_type_id==1)
    { ?>

          <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h4>Total Institutes</h4>
 <p>
                     <?php
                        $user= count($institute);
                        if(strlen($user)<2) 
                        {
                            $user='0'.$user;
                        }
                        else{
                            $user=$user;
                        }
                             echo $user; 
                        ?> 
                      
                        </p>
             
            </div>
            <div class="icon">
              <i class="fa fa-home" aria-hidden="true"></i>
            </div>
          

            <a href="<?php echo base_url();?>index.php/manage_institution/inst_list" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            
          </div>
      </div>




      <?php } ?> 


       <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_service/list_view',get_cookie('session_user_id'))=='Y' || $admin_details[0]->user_type_id==1)
    { ?>

          <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-orange">
            <div class="inner">
              <h4>Total Services</h4>
 <p>
                     <?php
                        $user= count($service);
                        if(strlen($user)<2) 
                        {
                            $user='0'.$user;
                        }
                        else{
                            $user=$user;
                        }
                             echo $user; 
                        ?> 
                      
                        </p>
             
            </div>
            <div class="icon">
              <i class="fa fa-database" aria-hidden="true"></i>
            </div>
          

            <a href="<?php echo base_url();?>index.php/manage_service/list_view" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            
          </div>
      </div>




      <?php } ?> 




		
		

         
        <!-- ./col -->
      </div>
                  
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>