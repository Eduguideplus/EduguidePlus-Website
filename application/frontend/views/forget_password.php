<!-- <section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
</section> -->
<div class="all_top">
</div>




<div class="login_back">
<div class="container-fluid login_register deximJobs_tabs practice" style="background-image: url(<?php echo base_url(); ?>assets/images/login_back.jpg);">
 <div class="row">
  <div class="container main-container-home">
    <div class="col-md-10 col-md-offset-1 text-center log-in">


      <h3>Forget Password</h3>

      <div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3">
        <div class="log-section">
          <!-- <h6>Login to Surajit Pramanick with</h6> -->

          <!-- <div class="col-md-6 col-sm-6 col-xs-12 res767-wid-50">
              <a href="#" class="social-btn fb"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
          </div> -->

          <!-- <div class="col-md-6 col-sm-6 col-xs-12 res767-wid-50">
              <a href="#" class="social-btn g-plus"><i class="fa fa-google-plus" aria-hidden="true"></i> Google</a>
          </div> -->
         <!--  <h5 class="or">OR</h5> -->

          <center><span style="margin-left: 20%"><h4><b>Enter your registererd mail id or mobile no below.</h4></span></center>

            <h6 class="text-center" style="color:red;"><strong><?php if($this->session->flashdata('error_massage')!=''){echo $this->session->flashdata('error_massage'); }?></strong></h6>

          <div class="clearfix"></div>

          <form method="post" action="<?php echo base_url();?>Sign_up/reset_pass_email_sent" class="login-form" id="manual_login">

            <p id="not_valid" style="font-weight:bold;font-size: 15px;color:red;display:none;">Sorry!! This is not a valid email id.</p>
            <?php if($this->session->flashdata('err_msg')!=''){?>
             <p id="not_valid" style="font-weight:bold;font-size: 15px;color:red;"><?php echo @$this->session->flashdata('err_msg'); ?></p>
            <?php } ?>
              <div class="form-group">
              <label>Email Or Mobile No:</label>
              <input type="text" class="form-control" placeholder="" name="email1" id="email1" required="">

              </div>

               

               <div class="form-group">
                 <button value="" type="submit" class="btn read-btn">SUBMIT</button> 

                

               </div>

               
          </form>

        </div>

      </div>

      
      

        <!-- <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="green">
    
        
          <div id="nt-example1-container">
           
                  
                      <ul id="nt-example1">
                <?php 


                foreach($area_details as $key=>$row)
                {

                
                ?>
                <li><a><i class="fa fa-angle-double-right " aria-hidden="true" ></i> <?php echo $row->area_content;?></a></li>
                <?php
              }
              ?>
         
                   
                </div>
      
        
      
      </div>
   </div> -->


      
      

    </div>
  </div>
</div>
</div>
</div>















