  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <?php
        $controller= $this->uri->segment(1);
      ?>
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
         <!-- <img src="<?php echo base_url();?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
        </div>
        
      </div>
      <!-- search form -->
      <!--<form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">ADMINISTRATION</li>
        <li class="active treeview">
          <a href="<?php echo base_url();?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
         
        </li>

      
      
      </li>
      <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_rm/view_rm',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>

          <li class="treeview <?php if($controller=='manage_rm' || $controller=='admin_payment_history') { echo 'active'; } /*|| $controller=='manage_education' || $controller=='manage_document_type' || $controller=='manage_uni_colg' || $controller=='manage_job_type' || $controller=='manage_interview_type' || $controller=='manage_social_type')*/ ?>" >
          <a href="#">
           <i class="fa fa-th" aria-hidden="true"></i>

            <span>SUB ADMIN MANAGEMENT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

   <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_rm/view_rm',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>

          <ul class="treeview-menu">

        


            <li><a href="<?php echo base_url()?>index.php/manage_rm/view_rm"><i class="fa fa-user"></i> Manage Sub Admin</a></li>

          <!--    <li><a href="<?php echo base_url()?>index.php/admin_payment_history/payment_history_view"><i class="fa fa-money"></i> Sub Admin Payment History</a></li> -->

       
          
          </ul>

        <?php } ?>
      </li> 
 <?php } ?>


      <?php  

      $gallery_tag=$this->common->select($table_name = 'tbl_gallery_tag', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      $gallery_cat=$this->common->select($table_name = 'tbl_gallery_category', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); 

$gallery=$this->common->select($table_name = 'tbl_gallery', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


$testimonial_permission=$this->common->select($table_name = 'tbl_testimonial', $field = array(), $where = array('testimonial_status'=>'inactive'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');




  ?>

    

      <li class="treeview <?php if( $controller=='manage_category' || $controller=='manage_exam_type' || $controller=='manage_section' || $controller=='manage_passage' || $controller=='manage_chapters' || $controller=='manage_test_type' || $controller=='manage_free_paid' || $controller=='negative_mark' || $controller=='Subadmin_question_price' || $controller=='manage_course'   || $controller=='manage_exam_level' ){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-th" aria-hidden="true"></i>
            <span>MASTERDATA MGMT.</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>


 <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_exam_type/group_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>
           <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_exam_type/course_view"><i class="fa fa-list"></i>Manage Course </a>
              
                </li>
            </ul>

          <?php } ?>


   <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_exam_type/group_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>
           <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_exam_level/exam_level_view"><i class="fa fa-list"></i>Manage Exam Level </a>
              
                </li>
            </ul>

          <?php } ?>

 <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_exam_type/view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>
             <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_exam_type/view"><i class="fa fa-list"></i>Manage Examination</a>
              
                </li>
            </ul>

<?php } ?>


 


 <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_section/view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>

            <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_section/view"><i class="fa fa-list"></i>Manage SUBJECTS</a>
              
                </li>
            </ul>

<?php } ?>
  <?php 

 $admin_details=$this->session_check_and_session_data->admin_session_data();
       
    
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_chapters/view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>

            <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_chapters/view"><i class="fa fa-list"></i>Manage Chapters</a>
              
                </li>
            </ul>

<?php } ?>
 
<?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_section/view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>

           
<?php } ?>



 <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_section/view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>

           

<?php } ?>

 <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_test_type/view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>
        
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_test_type/view"><i class="fa fa-list"></i>Manage TEST TYPE</a>
              
                </li>
            </ul>

<?php } ?>
             

 <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_institution/inst_level',$this->session->userdata('session_user_id'))=='Y' || @$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_institution/inst_list',$this->session->userdata('session_user_id'))=='Y'|| @$admin_details[0]->user_type_id==1)
    { ?>

          <li class="treeview <?php if($controller=='home1' || $controller=='manage_institution'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-th-large"></i>
            <span> INSTITUTE MANAGEMENT </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_institution/inst_level',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>


       <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_institution/inst_level"><i class="fa fa-list"></i>Manage Institute Level</a>
              
                </li>
            </ul>
            <?php
          }
          ?>
           <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_institution/inst_list',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>

 <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_institution/inst_list"><i class="fa fa-list"></i>Manage Institute</a>
              
                </li>
            </ul>
          
          <?php } ?>    
        </li>
  <?php } ?> 



 

<?php

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_question/view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1 || @$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_media_question/get_media',$this->session->userdata('session_user_id'))=='Y')
    { ?>

       <li class="treeview <?php if($controller=='manage_question' || $controller=='manage_media_question' ){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-file"></i>
            <span>QUESTION MANAGEMENT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
 <?php }

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_question/view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>
        
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_question/view"><i class="fa fa-list"></i>Manage Question</a>
              
                </li>
            </ul>
<?php } ?>
<?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_media_question/get_media',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_media_question/get_media"><i class="fa fa-list"></i>Manage Question Images</a>
              
                </li>
            </ul>
<?php } ?>
</li>
<?php

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_knowledge/knowledge_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1 )
    { ?>
<li class="treeview <?php if(@$active=='knowledge'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-clipboard"></i>
            <span>TEST MANAGEMENT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li class="treeview <?php if(@$active=='knowledge'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>index.php/manage_knowledge/knowledge_view/knowledge"><i class="fa fa-circle-o"></i>Manage Test</a></li>

            <li class="treeview <?php if(@$active=='knowledge'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>index.php/manage_knowledge/add_manual_test/knowledge"><i class="fa fa-circle-o"></i>Create Test Manually</a></li>

        
            
          </ul>   
        </li>

<?php
}
?>
<?php

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_service/list_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1 )
    { ?>


            <li class="treeview <?php if($controller=='manage_service' ){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-tree"></i>
            <span>SERVICE MANAGEMENT </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_service/list_view"><i class="fa fa-list"></i>Manage Service</a>
              
                </li>
            </ul></li>
            <?php
          }
          ?>
<?php

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
    
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_study_abroad/list_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1 )
    { ?>
             <li class="treeview <?php if($controller=='manage_study_abroad' ){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-book"></i>
            <span>STUDY ABROAD MANAGEMENT </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_study_abroad/list_view"><i class="fa fa-list"></i>Manage Study Abroad</a>
              
                </li>
            </ul>

</li>
<?php
}
?>
<?php

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
    
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('  manage_schedule_to_meet/list_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1 )
    { ?>
            <li class="treeview <?php if($controller=='schedule_to_meet' ){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-book"></i>
            <span>MEETING SCHEDULE MANAGEMENT </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_schedule_to_meet/list_view"><i class="fa fa-list"></i>Manage Meeting Schedule</a>
              
                </li>
            </ul>

        </li>
        <?php
      }
      ?>    


 <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_user/list_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>

       <li class="treeview <?php if($controller=='manage_user' || $controller=='parent_list_managment'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-user"></i>
            <span>STUDENT MANAGEMENT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
 <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_user/list_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/manage_user/list_view"><i class="fa fa-circle-o"></i>Manage Student</a></li>
          </ul>
<?php } ?>    
        </li>
<?php } ?> 




   

<?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_testimonials/list_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>
     
            <li class="treeview <?php if($controller=='manage_testimonials'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-commenting"></i>
            <span>TESTIMONIAL MANAGEMENT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_testimonials/list_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/manage_testimonials/list_view"><i class="fa fa-circle-o"></i>Manage Testimonial </a></li>
            
          </ul>
            <?php } ?>  
        </li>
         <?php } ?> 





         <?php

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_video_tutorial_category/list_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1 || @$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_video_tutorial/list_view',$this->session->userdata('session_user_id'))=='Y' )
    { ?>

       <li class="treeview <?php if($controller=='manage_video_tutorial_category' || $controller=='manage_video_tutorial' ){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-file"></i>
            <span>VIDEO TUTORIAL MANAGEMENT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
 <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_video_tutorial_category/list_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>
        
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_video_tutorial_category/list_view"><i class="fa fa-list"></i>Video Tutorial Category</a>
              
                </li>
            </ul>
<?php } ?>

<?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_video_tutorial_category/list_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_video_tutorial/list_view"><i class="fa fa-list"></i>Video Tutorial</a>
              
                </li>
            </ul>
<?php } ?>



</li>
<?php
}
?>


    <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();

    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('welcome_content/content_view',$this->session->userdata('session_user_id'))=='Y' || 
      
      @$admin_details[0]->user_type_id==1 || 

      @$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_why_us/why_us_view',$this->session->userdata('session_user_id'))=='Y' ||

       @$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_new_notice/list_view',$this->session->userdata('session_user_id'))=='Y' || 

       @$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_event/list_view',$this->session->userdata('session_user_id'))=='Y' ||

        @$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('training_slider/view_training_slider',$this->session->userdata('session_user_id'))=='Y' || 

        @$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('home/index',$this->session->userdata('session_user_id'))=='Y' || 

        @$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('partner_management/view_partner',$this->session->userdata('session_user_id'))=='Y' ||

         @$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_our_experties/list_view',$this->session->userdata('session_user_id'))=='Y' || 

         @$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('social_site/view',$this->session->userdata('session_user_id'))=='Y' ||

         @$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('contact/contact_view',$this->session->userdata('session_user_id'))=='Y')
      { 
      ?>    

        <li class="treeview <?php if($controller=='training_slider' || $controller=='partner_management' || $controller=='manage_class_room' || $controller=='manage_service_basket' || $controller=='manage_documents' || $controller=='manage_faq' || $controller=='records' || $controller=='social_site' || $controller=='contact' || $controller=='welcome_content' || $controller=='manage_why_us' || $controller=='manage_new_notice' || $controller=='manage_event' || $controller=='manage_our_services_approach' || $controller=='financial_planning' || @$controller=='manage_our_experties' || @$controller=='home' ){ echo 'active'; } ?>" >
          <a href="#">
           <i class="fa fa-file-text-o" aria-hidden="true"></i>
            <span>CONTENT MANAGEMENT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
      
            <ul class="treeview-menu">
               

   <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('home/index',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { 
      ?>
                <li class="<?php if(@$controller=="home"){echo "active";}?>"><a href="<?php echo base_url();?>index.php/home"><i class="fa fa-list"></i>Manage Home Slider</a>
              
                </li>
                <?php
              }
              ?>
              <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_our_experties/list_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { 
      ?>

                <li class="<?php if(@$controller=="manage_our_experties"){echo "active";}?>"><a href="<?php echo base_url();?>index.php/manage_our_experties/list_view"><i class="fa fa-list"></i>Manage Our Expert</a>
              
                </li>

<?php
}
?>
<?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('partner_management/view_partner',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { 
      ?>

                <li class="<?php if(@$controller=="partner_management"){echo "active";}?>"><a href="<?php echo base_url();?>index.php/partner_management/view_partner"><i class="fa fa-list"></i>Manage Partner</a>
              
                </li>
                <?php
              }
              ?>

              <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('training_slider/view_training_slider',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { 
      ?>

            <li class="<?php if(@$controller=="training_slider"){echo "active";}?>"><a href="<?php echo base_url();?>index.php/training_slider/view_training_slider"><i class="fa fa-list"></i>Online Exam BG Image</a>
              
                </li>

                <?php
              }
              ?>

               <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('social_site/view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { 
      ?>

                <li class="<?php if(@$controller=="social_site"){echo "active";}?>"><a href="<?php echo base_url()?>index.php/social_site/view"><i class="fa fa-list"></i> Manage Social Links</a></li>

                <?php
              }
              ?>

              <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('contact/contact_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { 
      ?>

                <li class="<?php if(@$controller=="contact"){echo "active";}?>"><a href="<?php echo base_url()?>index.php/contact/contact_view"><i class="fa fa-list"></i>Manage Contact Details</a></li> 

                <?php
              }
              ?>

              <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('welcome_content/content_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { 
      ?>

                 <li class="<?php if(@$controller=="welcome_content"){echo "active";}?>"><a href="<?php echo base_url()?>index.php/welcome_content/content_view"><i class="fa fa-list"></i>Manage Welcome Content</a></li>

                 <?php
               }
               ?>


                <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_why_us/why_us_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { 
      ?>

                  <li class="<?php if(@$controller=="manage_why_us"){echo "active";}?>"><a href="<?php echo base_url()?>index.php/manage_why_us/why_us_view"><i class="fa fa-list"></i>Manage About Us</a></li>

                  <?php
                }
                ?>

                 <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_new_notice/list_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { 
      ?>


                  <li class="<?php if(@$controller=="manage_new_notice"){echo "active";}?>"><a href="<?php echo base_url()?>index.php/manage_new_notice/list_view"><i class="fa fa-list"></i>Manage News & Notice</a></li>

                  <?php
                }
                ?>

                 <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_event/list_view',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { 
      ?>


                   <li class="<?php if(@$controller=="manage_event"){echo "active";}?>"><a href="<?php echo base_url()?>index.php/manage_event/list_view"><i class="fa fa-list"></i>Manage Events</a></li>

                   <?php
                 }
                 ?>
                 

            </ul>
      
            
      
           
      
      
      </li>

<?php
}
?>

    
  <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();


    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('page_list_manage/index',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>    
       <li class="treeview <?php if($controller=='page_list_manage' || $controller=='page'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-file-text-o"></i>
            <span>PAGE MANAGEMENT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
       <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
      
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('page_list_manage/index',$this->session->userdata('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==1)
    { ?>
     
      <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/page_list_manage"><i class="fa fa-circle-o"></i>Manage Pages</a></li>
            
          </ul>

        <?php } ?>
        </li> 

<?php } ?>
		  </ul>
			
		
          
    </section>
    <!-- /.sidebar -->
  </aside>