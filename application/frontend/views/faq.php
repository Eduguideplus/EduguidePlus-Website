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
  			<h3>Frequently Asked Question</h3>
  		</div>

  		<div class="col-md-12 col-sm-12 col-xs-12">
  			<div class="about-exam faq">


  					<div class="panel-group" id="accordion">

 <?php foreach ($faq as $key=> $faq_data ) {
           ?>

					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo @$faq_data->faq_id; ?>">
					        <?php echo @$faq_data->faq_question; ?></a>
					      </h4>
					    </div>
					    <div id="collapse<?php echo @$faq_data->faq_id; ?>" class="panel-collapse collapse <?php if($key==0){ echo 'in';} ?>">
					      <div class="panel-body">
<?php echo @$faq_data->faq_answer; ?>
					      <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit,
					      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
					      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
					      commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					      proident, sunt in culpa qui officia deserunt mollit anim id est laborum. --></div>
					    </div>
					  </div>

				   <?php } ?>	
					 <!--  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
					        Why should I enroll for the  Online Test Series on wbcsforum.com ?</a>
					      </h4>
					    </div>
					    <div id="collapse1" class="panel-collapse collapse in">
					      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
					      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
					      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
					      commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
					    </div>
					  </div> -->

					  
					<!--   <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
					        Do I need to pay for the test?</a>
					      </h4>
					    </div>
					    <div id="collapse2" class="panel-collapse collapse">
					      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
					      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
					      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
					      commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
					        Will the paper pattern be exactly like the West Bengal Civil Service Prelims paper?</a>
					      </h4>
					    </div>
					    <div id="collapse3" class="panel-collapse collapse">
					      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
					      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
					      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
					      commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
					    </div>
					  </div> -->
					</div>

  				
  			</div>




  		</div>

  </div>
 </div>
</div>
