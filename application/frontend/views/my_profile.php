<div class="all_top">
</div>


<!-- about banner section stert here -->


<section id="about_banner_sec">
  <div class="about_banner_part">
    <div class="about_b_img">
      <img src="<?php echo base_url(); ?>assets/images/ins1.jpg" alt="about-b">
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="about_b_cont online_x">
          <h2>My Profile</h2>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- about banner section end here -->



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

  		<!-- 	<h3>My Profile</h3> -->

  		</div>



  		<div class="col-md-12 col-sm-12 col-xs-12">

  			<div class="my-account-wrapper">

  			

  			<?php $this->load->view('account_sidebar',$user); ?>





  			   <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 res480-pl-0 res480-pr-0 ">



                        <div class="myaccount-field myaccount-widget">



                          <h3 class="title">My Profile</h3>



                         









                          <div class="col-md-3 col-sm-12 col-xs-12 text-center">

                                <div class="profile-pic">



                                    <!-- <img src="<?php echo base_url(); ?>assets/images/pp.jpg" alt="" class="img-responsive"> -->



                                    <?php if(@$user[0]->profile_photo!=''){

                                      if(@$user[0]->user_type_id==3) { 
                                        ?> 

                             <img src="<?php echo base_url(); ?>assets/uploads/principal/<?php echo @$user[0]->profile_photo; ?>" alt="" class="img-responsive">  <?php 
                           } 
                           else if(@$user[0]->user_type_id==4)
                            {
                              ?>

                                    <img src="<?php echo base_url(); ?>assets/uploads/partner/<?php echo @$user[0]->profile_photo; ?>" alt="" class="img-responsive">

                                    <?php }
                                    else{
                                      ?>
                                       <img src="<?php echo base_url(); ?>assets/uploads/student_pic/<?php echo @$user[0]->profile_photo; ?>" alt="" class="img-responsive">
                                      <?php
                                    }
                                  }
                                    else{
                                      ?>

                                      <img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="" class="img-responsive">

                                    <?php } ?>



                                    





                                </div>



                                <?php  if(@$user[0]->user_type_id==2) { ?>

                                <a href="<?php echo $this->url->link(101); ?>" class="site-button hvr-sweep-to-right mt-20 dis-in">Edit</a>

                                <?php

                              }

                              ?>

                              



                          </div>



                          <div class="col-md-9 col-sm-12 col-xs-12 res480-pl-0 res480-pr-0">

                              <div class="myprofile-field">

                              <div class="information-bx">



                             				 <ul>

                                                <li>NAME<b> <?php echo @$user[0]->user_name; ?></b></li>

                                                <li>EMAIL<b> <?php echo @$user[0]->login_email; ?><span style="margin-left:10px;"><?php if(@$user[0]->email_verify=='Y'){echo '<small style="color:#09f509;">Verified</small>';}else{echo '<small style="color:red;">Not Verified</small>';} ?></span></b></li>

                                                <li>MOBILE <b> <?php echo @$user[0]->login_mob; ?><span style="margin-left:10px;"><?php if(@$user[0]->mob_verify=='Y'){echo '<small style="color:#09f509;">Verified</small>';}else{echo '<small style="color:red;">Not Verified</small>';} ?></span></b></li> 

                                                <li>CITY<b> <?php  

                                               

                                                $city_list= $this->common_model->common($table_name ='cities', $field = array(), $where = array('id'=>@$user[0]->city), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                                                echo  @$city_list[0]->name;

                                                ?></b></li> 

                                                <li>STATE<b> <?php  

                                               

                                                



                                                $state_list= $this->common_model->common($table_name ='states', $field = array(), $where = array('id'=>@$user[0]->state), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                                                echo  @$state_list[0]->name;

                                                ?></b></li>



                                                <li>COUNTRY<b> <?php  

                                                

                                                



                                                $country_list= $this->common_model->common($table_name ='countries', $field = array(), $where = array('id'=>@$user[0]->country), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                                                echo  @$country_list[0]->name;

                                                ?></b></li>



                                                <li>ADDRESS<b> <?php echo @$user[0]->user_address;?></b></li>



                                                 <!-- <li>POSTAL CODE<b> <?php echo @$address[0]->post_code;?></b></li> -->



                                              </ul>



                                </div>









                              </div>

                          </div>





                        </div>

                  </div>



  			</div>



  		</div>



  </div>

 </div>

</div>