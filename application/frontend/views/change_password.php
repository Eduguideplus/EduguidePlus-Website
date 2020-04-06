
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
          <h2>Change Password</h2>
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

  		<div class="col-md-12 col-sm-12 col-xs-12 text-center log-in">

  			<!-- <h3>Change Password</h3> -->

  		</div>



  		<div class="col-md-12 col-sm-12 col-xs-12">

  			<div class="my-account-wrapper">

  			

  			<?php $this->load->view('account_sidebar',$user); ?>





  			    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 res480-pl-0 res480-pr-0">



                        <div class="myaccount-field myaccount-widget">



                          <h3 class="title">Change Password</h3>



                         









                          



                          <div class="col-md-12 col-sm-12 col-xs-12 res768-pl-0 res768-pr-0  res480-pl-0 res480-pr-0">

                              <div class="myprofile-field">



                                      <form action="<?php echo $this->url->link(106); ?>" method="post" class="profile-form" id="change_password">

                                         <div class="row">

                                           <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                              <div class="form-group">

                                             <label>Old Password<span>*</span></label>

                                                  <input type="text" name="oldp" id="oldp" class="form-control" placeholder="Enter Your Old Password">

                                              </div>

                                          </div>

                                          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                          <div class="form-group">

                                              <label>New Password<span>*</span></label>

                                                  <input type="email" name="newp" id="newp" class="form-control" placeholder="Enter Your New Password">

                                              </div>

                                          </div>

                                          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                          <div class="form-group">

                                              <label>Confirm Password<span>*</span></label>

                                                  <input type="text" name="cnewp" id="cnewp" class="form-control" placeholder="Enter Your Confirm Password">

                                              </div>

                                          </div>

                                         



                                          <div class="col-md-4 col-sm-12 col-xs-12 col-md-offset-4">

                                          <button type="button" value="" class="site-button hvr-sweep-to-right" onclick="form_validation_student()">Submit</button>

                                          </div>



                                         </div>

                                      </form>







                              </div>

                          </div>





                        </div>

                  </div>



  			</div>



  		</div>



  </div>

 </div>

</div>



<script>

  function validation_student()

  {

    var oldp = $('#oldp').val();

      if (!isNull(oldp)) {

        $('#oldp').removeClass('black_border').addClass('red_border');

      } else {

        $('#oldp').removeClass('red_border').addClass('black_border');

      }



      



      var newp = $('#newp').val();

      if (!isNull(newp)) {

        $('#newp').removeClass('black_border').addClass('red_border');

      } else {

        $('#newp').removeClass('red_border').addClass('black_border');

      }





        var cnewp = $('#cnewp').val();

      if (!isNull(cnewp)) {

        $('#cnewp').removeClass('black_border').addClass('red_border');

      } else {



        if(cnewp!=newp)

        {

          $('#cnewp').removeClass('black_border').addClass('red_border');

        }

        else

        {

          $('#cnewp').removeClass('red_border').addClass('black_border');

        }

        

      }





     

      

  }

  function form_validation_student()

  {

  

   

    $('#change_password').attr('onchange', 'validation_student()');

    $('#change_password').attr('onkeyup', 'validation_student()');



     validation_student();

    //alert($('#contact_form .red_border').size());



    if ($('#change_password .red_border').size() > 0)

    {

      $('#change_password .red_border:first').focus();

      $('#change_password .alert-error').show();

      return false;

    } else {



      $('#change_password').submit();

    }



  }



  </script>