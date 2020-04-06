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
  		<div class="col-md-12 col-sm-12 col-xs-12 text-center log-in">
  			<h3>Employment Examination</h3>
  		</div>

  		<div class="col-md-12 col-sm-12 col-xs-12">
  			<div class="rank-bx about-exam">
  				<!--<div class="col-md-5 col-sm-4 col-xs-12">
  					<div class="about-exam-bx">
  						<img src="<?php echo base_url(); ?>assets/images/ab-exam.jpg" alt="" class="img-responsive">

  					</div>
  					

  				</div>
  				<div class="col-md-7 col-xs-12 col-sm-8">
  						<div class="about-exam-text">
  							<h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
  							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  							consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>

  							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

  						</div>
  					
  				</div>-->

  				  <div class="exam-aboutus exam-abo">
       
			       







			       <div id="myCarousel1" class="carousel slide about-exam-slider" data-ride="carousel">
						  <!-- Indicators -->
						  

						  <!-- Wrapper for slides -->
						  <div class="carousel-inner">
						  	<?php
						  	foreach($exam_details as $key=>$row)
						  		{
						  			?>
						    <div class="item <?php if($key==0){ ?> active <?php } ?>">
						      <div class="col-md-12 col-sm-12 col-xs-12 bd-top">
							          <div class="col-md-6 col-sm-6 col-xs-12 exam-list">
							            <div class="exam-details">
							                <h4>Eligibility</h4>
							                <ul>
							           		<li><a><?php echo $row->eligibility; ?></a></li>
							                </ul>

							            </div>
							            <div class="exam-details">
							                <h4>Vacancy</h4>
							                <ul>
							                  
							                  <li><a><?php echo $row->vacancy; ?></a></li>
							                </ul>

							            </div>
							            <div class="exam-details">
							                <h4>Seletion process</h4>
							                <ul>
							                  
							                  <li><a><?php echo $row->select_process; ?></a></li>
							                </ul>

							            </div>

							          </div>


							           <div class="col-md-6 col-sm-6 col-xs-12 exam-list">
							                 <div class="exam-details">
							                <h4>How to Apply</h4>
							                <ul>
							                  <li><a href="<?php echo $row->how_to_apply; ?>" target="_blank" ><?php echo $row->how_to_apply; ?></a></li>
							                </ul>

							            </div>


							             <div class="exam-details list-bod">
							                <h4>Important Date</h4>
							                <ul>
							                  <li><a>Application Start Date: <?php echo $row->apply_start_date; ?></a></li>
							                  <li><a>Application Closing Date: <?php echo $row->apply_closing_date; ?></a></li>
							                </ul>

							            </div>


							            <div class="col-md-12 text-center">
							            <button class="btn read-btn"><a href="<?php echo $this->url->link(87);?>">For Preparation</a></button>
							          </div>



							          </div>

							          <div class="clearfix"></div>

				                      <h4 class="text-center ex-name"><strong><?php echo $row->exam_name;?></strong></h4>

							      </div>
						    </div>

						    <?php
						}
						?>


						
						
						</div>

						<ol class="carousel-indicators">
							<?php foreach($exam_details as $key=>$row)
							{
								?>
						    <li data-target="#myCarousel1" data-slide-to="<?php echo $key; ?>" class="<?php if($key==0){?> active <?php } ?>"></li>
						    <?php
						}
						?>
						    <!-- <li data-target="#myCarousel1" data-slide-to="1"></li>
						    <li data-target="#myCarousel1" data-slide-to="2"></li> -->
						  </ol>



			       </div>

			      

			      
			      
			      </div>

			        
			  			


			  			</div>




  		</div>

  </div>
 </div>
</div>