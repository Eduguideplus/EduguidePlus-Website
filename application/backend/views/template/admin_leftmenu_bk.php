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

    

      <li class="treeview <?php if($controller=='manage_question' || $controller=='manage_category' || $controller=='manage_exam_type' || $controller=='manage_section' || $controller=='manage_passage'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-th" aria-hidden="true"></i>
            <span>MasterData Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          	<ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_category/view"><i class="fa fa-list"></i>Manage PRACTICE</a>
            	
                </li>
            </ul>

            <!-- <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_company/view"><i class="fa fa-list"></i>Manage COMPANY</a>
              
                </li>
            </ul> -->

            <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_question/view"><i class="fa fa-list"></i>Manage QUESTION</a>
              
                </li>
            </ul>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_exam_type/view"><i class="fa fa-list"></i>Manage EXAM-TYPE</a>
              
                </li>
            </ul>

             <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_section/view"><i class="fa fa-list"></i>Manage SECTION</a>
              
                </li>
            </ul>

            <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_passage/view"><i class="fa fa-list"></i>Manage PASSAGE</a>
              
                </li>
            </ul>

           


      </li>

        <li class="treeview <?php if($controller=='manage_set' || $controller=='manage_exam_time'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-question" aria-hidden="true"></i>
            <span>Question Set Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_set/view_pattern"><i class="fa fa-list"></i>EXAM SET PATTERN</a>
              
                </li>
            </ul>

            <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_exam_time/view"><i class="fa fa-list"></i>EXAM TIME / MARKS</a>
              
                </li>
            </ul>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_set/view"><i class="fa fa-list"></i>EXAM SET Quantity</a>
              
                </li>
            </ul>

            <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_set/set_view"><i class="fa fa-list"></i>EXAM SET VIEW</a>
              
                </li>
            </ul>

            </li>




              <li class="treeview <?php if($controller=='manage_resume'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-question" aria-hidden="true"></i>
            <span>Resume Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_resume"><i class="fa fa-list"></i>All Resume Request</a>
              
                </li>
            </ul>

           
            </li>


             <li class="treeview <?php if($controller=='manage_incomplete_test' ){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-hourglass-half" aria-hidden="true"></i>
            <span>Incompleted Test</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/manage_incomplete_test"><i class="fa fa-list"></i>All incompleted Test</a>
              
                </li>
            </ul>

           
            </li>





 		     <li class="treeview <?php if($controller=='manage_testimonials'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-commenting"></i>
            <span>Testimonial Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/manage_testimonials/list_view"><i class="fa fa-circle-o"></i>Manage Testimonial</a></li>
            
          </ul>
        </li>

         <li class="treeview <?php if($controller=='manage_career'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-briefcase"></i>
            <span>CAREER Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/manage_career/list_view"><i class="fa fa-circle-o"></i>Manage CAREER</a></li>
            
          </ul>
        </li>

        <li class="treeview <?php if($controller=='manage_plans'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-tint"></i>
            <span>PLAN Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/manage_plans/general_view"><i class="fa fa-circle-o"></i>GENERAL-PLAN</a></li>
            
          </ul>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/manage_plans/view"><i class="fa fa-circle-o"></i>CUSTOMARIZED-PLAN</a></li>
            
          </ul>
        </li>

         <li class="treeview <?php if($controller=="coupon") { echo "active";}?>">
            <a href="#">
              <i class="fa fa-cog"></i>
              <span>COUPON MANAGEMENT</span>

              <i class="fa fa-angle-right pull-right"></i>

            </a>

            <ul class="treeview-menu">
           
              <li class="<?php if($controller=="coupon") { echo "active";}?>"><a href="<?php echo base_url();?>index.php/coupon/coupon_view"><i class="fa fa-circle-o"></i>Coupon View</a></li>
             
             
                <li class="<?php if($controller=="coupon") { echo "active";}?>"><a href="<?php echo base_url();?>index.php/coupon/user_coupon_view"><i class="fa fa-circle-o"></i>Used Coupon View</a></li>
         
              


            </ul>

          </li>

           <li class="treeview <?php if($controller=='redeem'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-gift" aria-hidden="true"></i>
            <span>REDEEM Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/redeem/redeem_view"><i class="fa fa-circle-o"></i>Redeem view</a></li>
              <li><a href="<?php echo base_url();?>index.php/redeem/exam_redeem_list"><i class="fa fa-circle-o"></i>Exam Redeem List</a></li>
            
          </ul>
        </li>


         <li class="treeview <?php if($controller=='manage_blog'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-rss"></i>
            <span>BLOG Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/manage_blog/blog_cat_view"><i class="fa fa-circle-o"></i>BLOG Category</a></li>
            
          </ul>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/manage_blog/blog_list_view"><i class="fa fa-circle-o"></i>BLOG List</a></li>
            
          </ul>

           <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/manage_blog/comment_list_view"><i class="fa fa-circle-o"></i>BLOG COMMENT Management</a></li>
            
          </ul>
        </li>

        <li class="treeview <?php if($controller=='manage_faq'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-commenting"></i>
            <span>FAQ Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/manage_faq/list_view"><i class="fa fa-circle-o"></i>Manage FAQ</a></li>
            
          </ul>
        </li>

        <li class="treeview <?php if($controller=='manage_user'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-user"></i>
            <span>USER Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/manage_user/list_view"><i class="fa fa-circle-o"></i>Manage USER</a></li>
            
          </ul>
        </li>

         <li class="treeview <?php if($controller=='manage_media'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-picture-o"></i>
            <span>MEDIA Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/manage_media/get_media"><i class="fa fa-circle-o"></i>Manage MEDIA</a></li>
            
          </ul>
        </li> 

        <!-- <li class="treeview <?php if($controller=='manage_user'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-users"></i>
            <span>REGISTERED USER</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/manage_user/student_list_view"><i class="fa fa-circle-o"></i>Student Details</a></li>
            
          </ul>
        
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/manage_user/tutor_list_view"><i class="fa fa-circle-o"></i>Tutor Details</a></li>
            
          </ul>
        </li> -->





        <!-- <li class="treeview <?php if($controller=='manage_plans'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-commenting"></i>
            <span>SUBSCRIPTION PLANS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/manage_plans/view"><i class="fa fa-circle-o"></i>Manage Plans</a></li>
            
          </ul>
        </li> -->



       <li class="treeview <?php if($controller=='contact'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-map-marker" aria-hidden="true"></i>

            <span>CONTACT US</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>index.php/contact/contact_view"><i class="fa fa-circle-o"></i> Contact Details</a></li>
            
          </ul>
      </li>


      <li class="treeview <?php if($controller=='social_site'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-share-square-ofa fa-share-square-o" aria-hidden="true"></i>

            <span>Social Link</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>index.php/social_site/view"><i class="fa fa-circle-o"></i> Manage Links</a></li>
            
          </ul>
      </li>

      <!-- <li class="treeview <?php if($controller=='terms' || $controller=='policy'){ echo 'active'; } ?>" >
          <a href="#">
            <i class="fa fa-align-justify" aria-hidden="true"></i>

            <span>CONTENT PAGE</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>index.php/terms/terms_view"><i class="fa fa-circle-o"></i> Terms & Condition</a></li>
            
          </ul>

          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>index.php/policy/policy_view"><i class="fa fa-circle-o"></i> Privacy Policy</a></li>
            
          </ul>
      </li> -->

     <!--  <li class="treeview <?php if($controller=='manage_media'){ echo 'active'; } ?>" >
         <a href="#">
           <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
     
           <span>Media Management</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a href="<?php echo base_url()?>index.php/manage_media/get_media"><i class="fa fa-circle-o"></i> Manage Media </a></li>
           
         </ul>
     </li> -->

    

       <li class="treeview" >
          <a href="#">
            <i class="fa fa-file-text-o"></i>
            <span>Page Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
      <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/page_list_manage"><i class="fa fa-circle-o"></i>Manage Pages</a></li>
            
          </ul>
        </li>

		  </ul>
			
		
          
    </section>
    <!-- /.sidebar -->
  </aside>