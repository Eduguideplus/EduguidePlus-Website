<?php //print_r($user);?>
 <div class="col-md-3 col-sm-4 col-xs-12 res480-pl-0 res480-pr-0">
                        <div class="myaccount-sidebar">
        					<div class="profile-content">
        						<div class="profile-image">
        							<!-- <img src="<?php echo base_url(); ?>assets/images/job-admin.png" class="img-responsive" alt=""> -->

        							<?php if(@$user[0]->profile_photo!=''){?>
                                    <img src="<?php echo base_url(); ?>assets/uploads/profile_image/<?php echo @$user[0]->profile_photo; ?>" alt="" class="img-responsive">
                                    <?php }else{?>
                                      <img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="" class="img-responsive">
                                    <?php } ?>
        						</div>
        						<h4 class="my-name"><?php echo @$user[0]->user_name;?></h4>
        					</div>

                            <h4 class="as"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;ACCOUNT SETTINGS</h4>
        					<ul>

    						<!-- 	<li><a href="dashboard.php" class="active">Dashboard</a></li> -->
                            <li><a href="<?php echo $this->url->link(95);?>">Dashboard</a></li>
    							<li><a href="<?php echo $this->url->link(98);?>">My Profile</a></li>
                                <li><a href="<?php echo $this->url->link(100);?>">Change Password</a></li>
    							<li><a href="<?php echo $this->url->link(119);?>">Award Claim List<div id="timer" class="pull-right">
													  <div id="days"></div>
													</div></a></li>

								<li><a href="<?php echo $this->url->link(104);?>">Your Plan</a></li>					
                                <li><a href="<?php echo $this->url->link(26);?>">Log Out</a></li>
    						</ul>
        				</div>
                    </div>