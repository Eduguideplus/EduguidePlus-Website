<style type="text/css">
  .sucess-text{      
    color: green;
    margin-left: 110px;
    font-size: 26px;
}
</style>


<div class="all_top">
</div>

<!-- about banner section stert here -->


<section id="about_banner_sec">
  <div class="about_banner_part">
    <div class="about_b_img">
      <img src="assets/images/about-b.jpg" alt="about-b">
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="about_b_cont">
          <h2>Contact Us</h2>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- about banner section end here -->

<section class="breadcumb-wrapper contact_sect" style="background-image: url(<?php echo base_url(); ?>assets/images/13.jpg);">
	<div class="overlay-color">

        <div class="container">
            <div class="row clearfix">
              <div class="contact_part">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <span style="color:green">
                        </span>
                    <div class="contact-form-wrapper">
                        <h3>Fill the Contact Form</h3>
                        <small >

                      <?php
                              $succ_add=$this->session->flashdata('msg');
                              if($succ_add){
                                ?>
                                <br><span  class="sucess-text">
                                  <?php echo $succ_add; ?>
                                </span>
                                <?php
                                  }
                        ?>
                                           </small>
                        <form class="" id="contact_us_form_id" action="<?php echo base_url();?>Contact_us/submitmailaction" method="post">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="fname" id="fname" value="" class="form-control" placeholder="Full Name :" required="" onkeypress='return event.charCode >= 65 && event.charCode <= 122 || event.charCode == 32'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="lname" id="lname" value="" class="form-control" placeholder="Mobile no. :" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" value="" class="form-control" placeholder="Email :" required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="subject" id="subject" value="" class="form-control" placeholder="Subject :" required="">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" rows="6" class="form-control" placeholder="Type Your Message :"></textarea>

                                    <input type="hidden" name="enqemailidforvalidationsurajit" value="1">
                                </div>
                            </div>
                             <!-- <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6LcbEM4UAAAAAIaUxJefmDAQj-OZ0JRa_l6kd5mg"></div>
                                </div>
                            </div> -->
                            <div class="col-sm-12">
                                <div class="form-group">
                            <button type="button" name="button" onclick="form_validation()" class="btn pull-right contact-btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                 <style type="text/css">
      #g-recaptcha-response{
        display: none !important;
      }
    </style>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-details-wrapper">
                        <h3>Get in Touch</h3>
                        <div class="contact-box">
                            <h4>Address: </h4>
                            <p><?php echo @$contact_details[0]->contact_address; ?></p>
                            <!-- <p>GSTIN: 19AJJPP9772G1ZG</p> -->
                        </div>
                        <div class="contact-box">
                            <h4>Contacts: </h4>
                            <ul class="contact-no">
                              <li><i class="fa fa-phone"></i><a href="#" class="phone"><?php echo @$contact_details[0]->contact_phno; ?> <!-- +91 98304 75818 --></a></li>
                              <li><i class="fa fa-envelope"></i><a href="#" class="phone"><?php echo @$contact_details[0]->contact_email; ?><!-- contact@surajitpramanick.com --></a></li>
                            </ul>
                        </div>
                        <div class="contact-box">
                            <h4>Social Links: </h4>
                            <ul class="social-hed list-inline">
                                <li class=""><a href="<?php echo @$social_details[0]->facebook_link;?>" target="_blank" class="facebook">
                                  <i class="fa fa-facebook" aria-hidden="true" style="color: #fff;"></i>
                                </a></li>
                                 <li class=""><a href="<?php echo @$social_details[0]->twitter_link;?>" target="_blank" class="twitter">
                                   <i class="fa fa-twitter" aria-hidden="true" style="color: #fff;"></i>
                                 </a></li>
                                 <li class=""><a href="<?php echo @$social_details[0]->youtube_link;?>" target="_blank" class="youtube">
                                   <i class="fa fa-youtube" aria-hidden="true" style="color: #fff;"></i>
                                 </a></li>
                                 <li class=""><a href="<?php echo @$social_details[0]->linkedin_link;?>" target="_blank" class="linkdin">
                                   <i class="fa fa-linkedin" aria-hidden="true" style="color: #fff;"></i>
                                 </a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
 
</div>
</section>


<section class="map_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 p-no">
                <div class="map_cnt">
                    <?php echo $contact_details[0]->map_link; ?>
                   
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function validation()
    {
        var fname = $('#fname').val();
      if (!isNull(fname)) {
        $('#fname').removeClass('black_border').addClass('red_border');
      } else {
        $('#fname').removeClass('red_border').addClass('black_border');
      }

       var lname = $('#lname').val();
      if (!isNull(lname)) {
        $('#lname').removeClass('black_border').addClass('red_border');
      } else {
        $('#lname').removeClass('red_border').addClass('black_border');
      }

      var email = $('#email').val();
      if (!isNull(email) || !isEmail(email)) {
        $('#email').removeClass('black_border').addClass('red_border');
      } else {
        $('#email').removeClass('red_border').addClass('black_border');
      }

      var subject = $('#subject').val();
      if (!isNull(subject)) {
        $('#subject').removeClass('black_border').addClass('red_border');
      } else {
        $('#subject').removeClass('red_border').addClass('black_border');
      }

      var message = $('#message').val();
      if (!isNull(message)) {
        $('#message').removeClass('black_border').addClass('red_border');
      } else {
        $('#message').removeClass('red_border').addClass('black_border');
      }


    }





    function form_validation()
    {
        $('#contact_us_form_id').attr('onchange', 'validation_student()');
        $('#contact_us_form_id').attr('onkeyup', 'validation_student()');
/* var v = grecaptcha.getResponse();*/
     validation();
    //alert($('#contact_form .red_border').size());
    if ($('#contact_us_form_id .red_border').size() > 0)
    {
      $('#contact_us_form_id .red_border:first').focus();
      $('#contact_us_form_id .alert-error').show();
      return false;
    } 
    /*else if(v.length == 0)
    {

       alert("Please verify Captcha.. ");
      return false;
    }*/else {

      $('#contact_us_form_id').submit();
    }

    }
</script>