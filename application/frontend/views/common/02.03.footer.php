<?php

$contact=$this->common_model->common($table_name = 'tbl_contact', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$about=$this->common_model->common($table_name = 'tbl_page_manage', $field = array(), $where = array('routes_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$social_link=$this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


$why_us=$this->common_model->common($table_name = 'tbl_why_us', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');




?>



<!--Footer Area-->
<div class="container-fluid footer">
 <div class="row">
  <div class="container main-container-home">

    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 res480-ft-height wid-33">
     <div class="footer_lg">
      <a href="<?php echo base_url(); ?>">
       <img src="<?php echo base_url(); ?>assets/images/footer-logo.png" alt="footer-logo">
     </a>
       <p><?php echo substr(@$why_us[1]->content, 0,100) ?>..... </p>
       <a href="<?php echo $this->url->link(127); ?>"><button type="button">Know More</button></a>
     </div>
  </div>


    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 res480-ft-height wid-33">
     <h3>Useful Links</h3>
     <ul class="list-group">
      <li><a target="_blank" href="<?php echo $this->url->link(149);?>"> Course & Colleges</a></li>
      <li><a target="_blank" href="<?php echo $this->url->link(131); ?>"> Online Exams</a></li>
      <li><a target="_blank" href="<?php echo $this->url->link(154);?>"> Services</a></li>
      <li><a target="_blank" href="<?php echo $this->url->link(155);?>"> Study Abroad</a></li>
       <li><a target="_blank" href="<?php echo $this->url->link(151);?>"> Video Tutorials</a></li>
      
      <!-- <li><a href="<?php echo $this->url->link(54); ?>">access Denied</a></li>
      <li><a href="<?php echo $this->url->link(38); ?>">404 Page</a></li> -->


    </ul>
  </div>
    <!---Footer Column 01-->
  <!---Footer Column 01-->
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 res-ft-height ">
   <h3>Contact Us</h3>
   <!-- <p class="location"><?php echo $contact[0]->contact_address; ?> </p> --> 
    <p class="contact-number">
      <i class="fa fa-phone" aria-hidden="true"></i><?php echo @$contact[0]->contact_phno; ?></p>
    <p class="contact-email"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo @$contact[0]->contact_email; ?></p>
    <p class="contact-address"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo @$contact[0]->contact_address; ?></p>
    
  </div>
  <!---Footer Column 01-->
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 res-ft-height txt-center">
    <h3>Social With Us</h3>

    <ul class="social-hed list-inline margin-top-20">
                              <?php if(@$social_link[0]->facebook_link!='') { ?>
                                <li class=""><a href="https://www.facebook.com/eduguideplus" target="_blank" class="facebook">
                                  <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a></li>

                                <?php } if(@$social_link[0]->twitter_link!='') { ?>
                                <li class=""><a href="#" target="_blank" class="twitter">
                                  <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a></li>

                               <!--  <?php } if(@$social_link[0]->googleplus_link!='') { ?>
                                <li class=""><a href="<?php echo @$social_link[0]->googleplus_link; ?>" target="_blank" class="gplus"></a></li> -->
                                <?php } if(@$social_link[0]->linkedin_link!='') { ?>
                                <li class=""><a href="#" target="_blank" class="linkdin">
                                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a></li>

                                <?php } if(@$social_link[0]->youtube_link!='') { ?>
                                  <li class=""><a href="#" target="_blank" class="youtube">
                                    <i class="fa fa-youtube" aria-hidden="true"></i>
                                  </a></li>
                                <?php }  ?>
    </ul>
       </div>


     </div>



     <div class="p-top-down-scrl">

      <div class="scrollup" href="#"><i class="fa fa-angle-double-up" aria-hidden="true"></i></div>
     </div>
   </div>
 </div>
 <!--Footer Area--> 
 <!--Last Footer Area---->
 <div class="container-fluid footer last-footer ">
   <div class="row">
    <div class="container main-container text-center">
     <div class="col-lg-12 col-md-12" >
       <p class="copyright">© <?php echo date('Y'); ?> | Eduguide All Rights Reserved. <!-- Designed By <a href="https://www.exprolab.com/" target="blank">Expro Lab</a> --></p>
     </div>


   </div>
 </div>
</div>
<!--Last Footer Area----> 





<!-- Popup Model-->
<!-- Scripts
  ================================================== -->
  <!--  jQuery 1.7+  -->
<!--  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.9.1.min.js"></script>
 -->  
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
  <!--Select 2-->
  <!-- jquery ui -->
   <!--  <script src="<?php echo base_url();?>assets/plugins/jquery-ui-1.12.0/jquery-ui.min.js"></script> -->
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

    <!-- Ignite UI Required Combined JavaScript Files -->

    
  <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/select2/select2.full.min.js"></script>
  <!-- Html Editor -->
  <script src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
  <!--  parallax.js-1.4.2  -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/parallax.js-1.4.2/parallax.js"></script>

  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  <!-- Include js plugin -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/owlslider/owl-carousel/owl.carousel.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/waypoints.min.js"></script>
  <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/register.js"></script> --> 
  <script type="text/javascript" src="<?php echo base_url();?>assets/counter/jquery.counterup.min.js"></script> 


  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/7.2.2/lazyload.transpiled.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.20/angular.min.js" type="text/javascript"></script>
<!-- <script src="<?php echo base_url();?>assets/js/common.6d54d21ce6ff0f1313f47a7988f46d52.js"></script> -->
<!-- <script src="<?php echo base_url();?>assets/js/homepage-concat.b9bdb08e15ccce9015ea03dd4a2dea4f.js"></script> -->



<script src="<?php echo base_url();?>assets/js/radial-progress-bar.js"></script>
        <!-- <script src="<?php echo base_url();?>assets/js/examples.js"></script> -->

        <script src="<?php echo base_url();?>assets/js/jquery.mCustomScrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.newsTicker.js"></script>

    

        <script src='https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js'></script>
 <script src="https://unpkg.com/sweetalert2@7.9.2/dist/sweetalert2.all.js"></script> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

    <script type="text/javascript">
              jQuery(document).ready(function($) {
  $('.slick.marquee').slick({
    speed: 8000,
    autoplay: true,
    autoplaySpeed: 0,
    centerMode: true,
    cssEase: 'linear',
    slidesToShow: 1,
    slidesToScroll: 1,
    variableWidth: true,
    infinite: true,
    initialSlide: 1,
    arrows: false,
    buttons: false
  });
});
        </script>













    <script>
    // scrolltop
$('.scrollup').click(function (){
$("html,body").animate({
scrollTop: 0
}, 1000);
return false;
});
</script>

















<script type="text/javascript">
  setTimeout(function() {
            $('body').addClass('loaded');
        }, 200);

</script>


<!-- <script>

        var colors = [
            { Name: "jQuery/HTML5/ASP.NET MVC Controls" },
            { Name: "ASP.NET Controls" },
            { Name: "Windows Forms Controls" },
            { Name: "WPF Controls" },
            { Name: "Android Native mobile controls" },
            { Name: "iOS Controls" },
            { Name: "SharePlus" },
            { Name: "ReportPlus" },
            { Name: "Indigo Studio" }
        ];

        $(function () {

           

            $("#checkboxSelectCombo").igCombo({
                width: 300,
                dataSource: colors,
                textKey: "Name",
                valueKey: "Name",
                multiSelection: {
                    enabled: true,
                    showCheckboxes: true
                },
                dropDownOrientation: "bottom"
            });

        });

    </script> -->

<!-- <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script type="text/javascript">
              var chart = AmCharts.makeChart( "chartdiv", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [ {
    "title": "",
    "value": 4852
  }, {
    "title": "",
    "value": 900
  } ],
  "titleField": "title",
  "valueField": "value",
  "labelRadius": 5,

  "radius": "42%",
  "innerRadius": "85%",
  "labelText": "[[title]]",
  "export": {
    "enabled": true
  }
} );
            </script>
<script type="text/javascript">
              var chart = AmCharts.makeChart( "chartdiv2", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [ {
    "title": "",
    "value": 4852
  }, {
    "title": "",
    "value": 9899
  } ],
  "titleField": "title",
  "valueField": "value",
  "labelRadius": 5,

  "radius": "42%",
  "innerRadius": "85%",
  "labelText": "[[title]]",
  "export": {
    "enabled": true
  }
} );
            </script>
            <script type="text/javascript">
              var chart = AmCharts.makeChart( "chartdiv3", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [ {
    "title": "",
    "value": 4852
  }, {
    "title": "",
    "value": 9899
  } ],
  "titleField": "title",
  "valueField": "value",
  "labelRadius": 5,

  "radius": "42%",
  "innerRadius": "85%",
  "labelText": "[[title]]",
  "export": {
    "enabled": true
  }
} );
            </script> -->





<!-- 
<script>
  $( function() {
    $( document ).tooltip();
  } );
  </script> -->



<script>
  //paste this code under head tag or in a seperate js file.
  // Wait for window load
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
</script>
<!-- <script type="text/javascript">
  $(document).ready(function() {
    $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});
</script> -->


  <!--Site JS-->
  <script src="<?php echo base_url();?>assets/js/webjs.js"></script>
  <script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });

  </script>

 <script type="text/javascript">
 $(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll >= 122) {
        $("#header").addClass("fixed-header");
    }
});
          </script>
  <script>
    $(window).load(function() {

     $("#loadessr").fadeOut();

   })
 </script>
 <script>
  $(document).ready(function(){
    $("#view-ans").hide();
    $("#open-ans").click(function(){
      $("#view-ans").toggle(1000);
    });
  });
</script>
<script>
  $(document).ready(function(){
    $("#Workspace").hide();
    $("#open-Workspace").click(function(){
      $("#Workspace").toggle(1000);
    });
  });
</script>
<script>
  $(document).ready(function(){
    $("#Report").hide();
    $("#open-Report").click(function(){
      $("#Report").toggle(1000);
    });
  });
</script>

<script>
  $(document).ready(function(){
    $("textarea").hide();
    $("#open-text").click(function(){
      $("textarea").toggle(1000);
    });
  });
</script>

<!-- <script type="text/javascript">
  function show() {
    // body...
    $('#signup').show();
    $('#login').hide();
  }
  function hide() {
    // body...
    $('#signup').hide();
    $('#login').show();
  }
</script> -->
<script type="text/javascript">
  $(document).ready(function() {
  $('.collapse.in').prev('.panel-heading').addClass('active');
  $('#accordion, #bs-collapse')
    .on('show.bs.collapse', function(a) {
      $(a.target).prev('.panel-heading').addClass('active');
    })
    .on('hide.bs.collapse', function(a) {
      $(a.target).prev('.panel-heading').removeClass('active');
    });
});
</script>

<script type="text/javascript">
  function show() {
    // body...
    $('#signup').show();
    $('#login').hide();
    $('#forget').hide();
  }
  function hide() {
    // body...
    $('#signup').hide();
    $('#login').show();
    $('#forget').hide();
  }
   function show_forget_password() {
    // body...
    $('#signup').hide();
    $('#login').hide();
    $('#forget').show();
  }
</script>



<div class="modal fade login-modal" id="myModal" role="dialog">
  <!-- Popup Model-->
  <div class="modal-dialog modal-md">

    <div class="modal-content" id="login">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">LOGIN<span>Please login to continue</span></h3>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <div class="col-md-6 col-xs-6 col-sm-6 pl-0 pr-10">
        <button type="button"  class="btn btn-lg btn-facebook btn-block" onclick="testsfb()">Facebook</button>
       </div>
      <div class="col-md-6 col-xs-6 col-sm-6 pr-0 pl-10">  
        <a href="<?php echo $authUrl1; ?>"  class="btn btn-lg btn-google btn-block">Google</a>
      </div> 
      <p class="text-center or1">OR</p> 
      </div>
      <span id="er_msg" style="display:none;color:red;"></span>
      <form method="post" id="log" action="">
      <input type="hidden" name="p_exam" id="p_exam" value="">
      <input type="hidden" name="c_slug" id="c_slug" value="">
      <input type="hidden" name="b_comment" id="b_comment" value="">
      <input type="hidden" name="b_id" id="b_id" value="">
      <input type="hidden" name="lt_exam" id="lt_exam" value="">
      <input type="hidden" name="forum" id="forum" value="">
      <input type="hidden" name="checkout" id="checkout" value="">
      <input type="hidden" name="d_comment" id="d_comment" value="">
      <input type="hidden" name="d_id" id="d_id" value="">
       <div class="form-group">
       
        <input type="email" name="email_log" id="email_log" placeholder="Email" />
      </div>
      <div class="form-group">
     
        <input type="password" name="password_log" id="password_log" placeholder="Password" />
      </div>
      
      <input type="hidden" name="hidden_exam" id="hidden_exam" value="" />
    </div>

    <div id="log_loader" class="text-center" style="display:none;"><img src="<?php echo base_url();?>assets/images/reg_loader.gif" width="80px" height="80px"></div>
    <div class="modal-footer">
      <button type="button" class="btn btn-lg btn-login btn-block" onclick="check_login()" >Login</button>
      
      <a onclick="show()">Not a User? REGISTER using Email</a>
       <a onclick="show_forget_password()" style="font-weight:bold; color:red;">Forgot Password</a>

    </div>
    </form>
  </div>




   <div class="modal-content" id="forget" style="display:none">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">FORGOT PASSWORD<span>Please enter Email or mobile no. to continue</span></h3>
      </div>
      <div class="modal-body">
    
      <span id="er_msg" style="display:none;color:red;"></span>
      <form method="post" id="f_pwd" action="">
       <div class="form-group">
       
        <input type="text" name="email_num_log" id="email_num_log" placeholder="Email/Mobile Number" />
      </div>
     <!--  <div class="form-group">
     
        <input type="password" name="password_log" id="password_log" placeholder="Password" />
      </div> -->
      
    <!--   <input type="hidden" name="hidden_exam" id="hidden_exam" value="" /> -->
     <!--  <input type="hidden" name="checkout" id="checkout" value=""> -->

      <div id="loader_otp_npwd" class="loader_overlay2" style="display:none;"></div>
        <img class="loader_img2" id="loader_img_npwd" style="display:none;" src="<?php echo base_url();?>assets/images/loader_otp.gif">
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-lg btn-login btn-block" onclick="send_password_notification()" >Continue</button>
      
      <a onclick="show()">Not a User? REGISTER using Email</a>

      

    </div>
    </form>
  </div>






  <div class="modal-content" style="display:none" id="signup">
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h3 class="modal-title">Sign Up<span>Create an account on WBCS Forum and start preparing</span></h3>
    </div>
    <div class="modal-body">

     <div class="form-group">
     <div class="col-md-6 col-sm-6 col-xs-6 pl-0 pr-10">
        <button type="button" ng-click="onFBBtnPress()" class="btn btn-lg btn-facebook btn-block">Facebook</button>
     </div>
     <div class="col-md-6 col-sm-6 col-xs-6 pl-10 pr-0">   
        <button type="button" ng-click="onGPlusBtnPress()" class="btn btn-lg btn-google btn-block">Google</button>
     </div>
     <p class="text-center or1">OR</p>   
      </div>
      <span id="suc_msg" style="display:none;color:green;"></span>
      <span id="err_msg" style="display:none;color:red;"></span>
       <form method="post" id="reg" action="<?php //echo $this->url->link(7); ?>">  

      <div class="form-group">
        
        <input type="text" name="name" id="name" placeholder="Name" />
      </div>
      
         
      <div class="form-group">
       
        <input type="text" name="email" id="email" placeholder="Email" />
      </div>
      
        
      <div class="form-group">
     
        <input type="text" name="reg_phn" id="reg_phn" placeholder="Phone No" />
      </div>
      
        
      <div class="form-group">
        
        <input type="password" name="password" id="password" placeholder="Password" />
      </div>
     

      <div class="form-group" id="ref_div" style="display:none">
        
        <input type="text" name="password" id="ref_code" placeholder="Referral Code" readonly="true"/>
      </div>
     
<div id="reg_loader" class="text-center" style="display:none;"><img src="<?php echo base_url();?>assets/images/reg_loader.gif" width="80px" height="80px"></div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-lg btn-login btn-block" onclick=" user_registration()">Sign Up</button>
      
     <a onclick="hide()">Already Registered? LOGIN</a>
    </div>
    </form>
  </div>
</div>
</div>
<!-- Popup Model-->


<!-- OTP Modal Password -->
<div id="pwdotpModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" href="#">
  <div class="modal-dialog">
<!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h3 class="modal-title text-center">Enter OTP to Reset Password</h3>
          <p id="pwdsucotp_msg" style="color:green;" class="text-center"></p> 
          <p id="errotp_msg" style="color:red;" class="text-center"></p> 

          
        </div>
        <div class="modal-body">
        
        <div class="col-md-12 col-sm-12 ">
      
        <form id="otp_check" name="otp_check" method="post" action="">
        <div class="col-md-2"></div>
        <div class="col-md-5"><input class="form-control" type="text" name="otp_pwd" id="otp_pwd" value="" placeholder="Enter 6 digit OTP" required></div>
        <div class="col-md-3"><a  href="javascript:void(0)" class="btn btn-success"  onclick="submit_pwd_otp()">Continue</a></div>
        <div class="col-md-2"></div>
        <input type="hidden" name="user_id" id="user_id" value="">
         <input type="hidden" name="medium" id="medium" value="">
        </form>
        </div>
        <div id="loader_otp_pwd" class="loader_overlay2" style="display:none;"></div>
        <img class="loader_img2" id="loader_img_pwd" style="display:none;" src="<?php echo base_url();?>assets/images/loader_otp.gif">
        <div class="clearfix"></div>
        
        </div>
        <div class="modal-footer">
         <div class="col-md-12 col-sm-12 text-center">
           <div class="col-md-2"></div>
           <div class="col-md-8">
             <a class="btn btn-info" id="resend" href="javascript:void(0)" onclick="resend_password_otp()"><b>Resend OTP</b></a>


           </div>
           <div class="col-md-2"></div>
         </div>
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
    </div>
  </div>


 <!-- Modal -->
<div id="email_verify" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header text-center">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title" style="color:red;font-weight:bold;font-size: 20px;">Please Verify Your email id to access your Account</h4>
      </div>
      <div class="modal-body">
        <p style="color:blue; font-weight:bold;font-size: 15px;">Email has been sent to your email address with verification link.Please check your Inbox or Spam and verify your email address.</p>
      </div>
      <div class="modal-footer">
       <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>

  </div>
</div>


  
</div>
<!--OTP modal end-->
  <!-- Scripts
  ================================================== -->

    <!-- Begin request quote modal -->
 <!-- <div class="request-quote">
    <button class="slide-toggle">
        <span class="quote-fixed">
            <p>E</p>
            <p>n</p>
            <p>q</p>
            <p>u</p>
            <p>i</p>
            <p>r</p>
            <p>y</p>
        </span>
    </button>
 </div> -->
   

    <style type="text/css">
    	#g-recaptcha-response{
    		display: none !important;
    	}
    </style>
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!--  <script type="text/javascript">
  var onloadCallback = function() {
    alert("grecaptcha is ready!");
  };
</script> -->

 <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script> 

<!-- <script src="https://www.google.com/recaptcha/api.js?render=reCAPTCHA_site_key"></script>
  <script>
  grecaptcha.ready(function() {
      grecaptcha.execute('reCAPTCHA_site_key', {action: 'homepage'}).then(function(token) {
         ...
      });
  });
  </script> -->

<!-- <script type="text/javascript">
  var CaptchaCallback = function() {
   
    var widgetId2;
   
    widgetId2 = grecaptcha.render('RecaptchaField2', {'sitekey' : '6Lc0UBsUAAAAAD4Ndqj5OdBwz1WH7n2ivTJCUS_9', 'callback' : correctCaptcha_contact});
};

var correctCaptcha_contact = function(response) {
    $("#ct_hiddenRecaptcha").val(response);
};
</script> -->

<!-- End request quote modal -->
<script>
// var abc = document.getElementById("demo");
// abc.display.style=="none";
//   $(document).ready(function(){
//   $(".slide-toggle").click(function(){
//     $(".box").hide();
//   });
 
// });

 $(document).ready(function(){

  $(".slide-toggle").click(function(){
    $(".box").animate({
      width: "toggle"
    });
  });
});
</script>
<!-- <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script> -->
  <script type="text/javascript">
    function validation_enquery()
    {
        var ename = $('#ename').val();
      if (!isNull(ename)) {
        $('#ename').removeClass('black_border').addClass('red_border');
      } else {
        $('#ename').removeClass('red_border').addClass('black_border');
      }

      

      var mail = $('#mail').val();
      if (!isNull(mail) || !isEmail(mail) ) {
        $('#mail').removeClass('black_border').addClass('red_border');
      } else {
        $('#mail').removeClass('red_border').addClass('black_border');
      }


       var ephone = $('#ephone').val();
      if(!isNull(ephone) || ephone.length<10 ) {
        $('#ephone').removeClass('black_border').addClass('red_border');
      } else {
        $('#ephone').removeClass('red_border').addClass('black_border');
      }


       var esubject = $('#esubject').val();
      if (!isNull(esubject)) {
        $('#esubject').removeClass('black_border').addClass('red_border');
      } else {
        $('#esubject').removeClass('red_border').addClass('black_border');
      }



     /* var subject = $('#subject').val();
      if (!isNull(subject)) {
        $('#subject').removeClass('black_border').addClass('red_border');
      } else {
        $('#subject').removeClass('red_border').addClass('black_border');
      }*/

      var emsg = $('#emsg').val();
      if (!isNull(emsg)) {
        $('#emsg').removeClass('black_border').addClass('red_border');
      } else {
        $('#emsg').removeClass('red_border').addClass('black_border');
      }


     /* if($('#ct_hiddenRecaptcha').val() == "")
             {
              $('#ct_hiddenRecaptcha').removeClass('black_border').addClass('red_border');
                $('#error').html("Please verify Captcha.. ");
                return false;
             }
             else{
              $('#ct_hiddenRecaptcha').removeClass('red_border').addClass('black_border');
               $('#error').html(" ");
             }*/


    }





    function enquery_form_validation()
    {

      var v = grecaptcha.getResponse();


        $('#enquery_form').attr('onchange', 'validation_enquery()');
        $('#enquery_form').attr('onkeyup', 'validation_enquery()');

     validation_enquery();
   // alert($('#enquery_form .red_border').size());
    if ($('#enquery_form .red_border').size() > 0)
    {
      $('#enquery_form .red_border:first').focus();
      $('#enquery_form .alert-error').show();
      return false;
    } else if(v.length == 0)
    {

       alert("Please verify Captcha.. ");
      return false;
    } else {

      $('#enquery_form').submit();
    }

    }
</script>










<!--User registration-->
<script>
  


function user_submit_fn()
{
  var name = $('#name').val();
  if (!isName(name)) {
    $('#name').removeClass('black_border').addClass('red_border');
   
  } else {
    $('#name').removeClass('red_border').addClass('black_border');
  }


  var phn = $('#reg_phn').val();
  
  if (!isNull(phn) || phn.length<10 || isNaN(phn)) {
    $('#reg_phn').removeClass('black_border').addClass('red_border');
    
  } else {
    $('#reg_phn').removeClass('red_border').addClass('black_border');
  }

  var password = $('#password').val();
  if (!isNull(password)) {
    $('#password').removeClass('black_border').addClass('red_border');
    
  } else {
    $('#password').removeClass('red_border').addClass('black_border');
  }


  var email = $('#email').val();
  if (!isEmail(email)) {
    $('#email').removeClass('black_border').addClass('red_border');
    return false;
  } 
  else {
    


         var base_url=$("#baseurl").val();
          $.ajax({
              
             url:base_url+'index.php/manage_login/check_email',
             data:{eml:email},
             dataType: "json",
             type: "POST",
             success: function(data){
              var perform= data.workdone;
              //alert(perform['status']);
              
              if(perform['status']==1)
              {
                $("#err_msg").css("display", "block");
                $("#err_msg").text('Sorry!! email id already exist');
                $("#suc_msg").css("display", "none");
                $('#email').removeClass('black_border').addClass('red_border');
                
              }
             
              else 

              {   $("#err_msg").css("display", "none");
                  $("#suc_msg").css("display", "none");
                  $('#email').removeClass('red_border').addClass('black_border');
                  
              }
            

                 
                
                  }
             });
       

   
  }

  


}
function user_registration()
{
 //var email=$("#usr_email").val();
      
    $('#reg').attr('onchange', 'user_submit_fn()');
    $('#reg').attr('onkeyup', 'user_submit_fn()');

  user_submit_fn();
  //alert($('#contact_form .red_border').size());

  if ($('#reg .red_border').size() > 0)
  {
    $('#reg .red_border:first').focus();
    $('#reg .alert-error').show();
    return false;
  }


  else {
    $("#reg_loader").show();
    //$('#reg').submit();
    var name = $('#name').val();
     var email = $('#email').val();
     var phno = $('#reg_phn').val();
     var password = $('#password').val();
     var ref_code = $('#ref_code').val();

    var base_url=$("#baseurl").val();
       $.ajax({
              
             url:base_url+'index.php/manage_login/registration',
             data:{nm:name,eml:email,phn:phno,pwd:password,ref_code:ref_code},
             dataType: "json",
             type: "POST",
             success: function(data){
              var perform= data.workdone;
              //alert(perform['status']);
              //$("#msg").css("display", "block");
              $("#reg_loader").hide();
              if(perform['status']==1)
              {
                $
                $("#suc_msg").css("display", "block");
                $("#suc_msg").text('You have registered successfuly. One email has been sent to your account.Check your email account and veify your email to log in.');
                $("#err_msg").css("display", "none");
                $("#name").val('');
                $("#email").val('');
                $("#reg_phn").val('');
                $("#password").val('');
                
              }
              else if(perform['status']==0)
              {

                $("#err_msg").css("display", "block");
                $("#err_msg").text('Sorry!! Please fill all the field.');
                $("#suc_msg").css("display", "none");
              }
              else if(perform['status']==2)
              {
                $("#err_msg").css("display", "block");
                $("#err_msg").text('Sorry!! This email id already exist.');
                $("#suc_msg").css("display", "none");
              }
              else if(perform['status']==3)
              {
                $("#err_msg").css("display", "block");
                $("#err_msg").text('Sorry!! This Phone number already exist. ');
                $("#suc_msg").css("display", "none");
              }
              else 
              {
                $("#err_msg").css("display", "block");
                $("#err_msg").text('You have registered successfuly.  email can not be sent to your account.');
                $("#suc_msg").css("display", "none");
              }
            

                 
                
                  }
             });
  }
}

</script>
<!-- ****************************************************************************************************************** -->
 <!-- <script>
      $(function () {

        $('#log').on('submit', function (e) {
          //alert();
          e.preventDefault();
          var email = $('#email_log').val();
          var password = $('#password_log').val();
         
          //alert(password);
          $.ajax(
          {
            type: "POST",
            dataType:'json',
            url:"<?php echo base_url(); ?>manage_login/login_action",
            data: {email: email,password: password},
            async: false,
            success: function(data)
            {
                
                //alert(data);
                
                   
            }
        });

        });

      });
</script> -->
<!-- ****************************************************************************************************************** -->


<!-- start a discussion -- post an MCQ -- ans Select -->

<script type="text/javascript">
   $(document).ready(function() {
    $('.select-exam a').on('click', function()
    {
      //alert();
      $('.select-exam a').removeClass('active');
      $(this).toggleClass('active');
    });
   });

</script>

<!-- <script type="text/javascript">
   $(document).ready(function() {
    $('.select-exam1 a').on('click', function()
    {
      //alert();
      $('.select-exam1 a').removeClass('active');
      $(this).toggleClass('active');
    });
   });

</script> -->


<!-- <script type="text/javascript">
   $(document).ready(function() {
    $('.stp3 a').on('click', function()
    {
      alert();
      /*$('.stp3 a').removeClass('active');
      $(this).toggleClass('active');*/
    });
   });

</script> -->

<!-- <script type="text/javascript">
   $(document).ready(function() {
    $('.select-exam a').on('click', function()
    {
      //alert();
      $('.select-exam a').removeClass('active');
      $(this).toggleClass('active');
    });
   });

</script> -->



<!-- <script type="text/javascript">
  
  $('[data-search]').on('keyup', function() {
  var searchVal = $(this).val();
  var filterItems = $('[data-filter-item]');

  if ( searchVal != '' ) {
    filterItems.addClass('hidden');
    $('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');
  } else {
    filterItems.removeClass('hidden');
  }
});
</script>
 -->


<script type="text/javascript">
   $(document).ready(function() {
    $('.ans-option a').on('click', function()
    {
      //alert();
      $('.ans-option a').removeClass('active');
      $(this).toggleClass('active');
    });
   });

</script>

<script>
            $(document).ready(function() {
              var customer = $('#customers-testimonials');
                customer.owlCarousel({
                items: 3,

                itemsDesktop : [1199,2],
                itemsDesktopSmall : [980,2],
                itemsTablet: [768,2],
                itemsTabletSmall: false,
                itemsMobile : [479,1],
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                navigation:false,
navigationText: [
   "<i class='fa fa-chevron-left'></i>",
   "<i class='fa fa-chevron-right'></i>"
]
              });
              $('.play').on('click', function() {
                customer.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                customer.trigger('stop.owl.autoplay')
              })
            })
          </script>
 <script>
            $(document).ready(function() {
              var basket = $('#basket-testimonials');
                basket.owlCarousel({
                items: 3,

                itemsDesktop : [1199,2],
                itemsDesktopSmall : [980,2],
                itemsTablet: [768,2],
                itemsTabletSmall: false,
                itemsMobile : [479,1],
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                navigation:false,
navigationText: [
   "<i class='fa fa-chevron-left'></i>",
   "<i class='fa fa-chevron-right'></i>"
]
              });
              $('.play').on('click', function() {
                basket.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                basket.trigger('stop.owl.autoplay')
              })
            })
          </script>





          <script>
            $(document).ready(function() {
              var owl1 = $('.blog-slider');
              owl1.owlCarousel({
                items: 3,
                 itemsDesktop : [1199,2],
                itemsDesktopSmall : [980,1],
                itemsTablet: [768,1],
                itemsTabletSmall: false,
                itemsMobile : [479,1],
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                navigation:false,
navigationText: [
   "<i class='fa fa-chevron-left'></i>",
   "<i class='fa fa-chevron-right'></i>"
]
              });
              $('.play').on('click', function() {
                owl1.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                owl1.trigger('stop.owl.autoplay')
              })
            })
          </script>


          <script>
            $(document).ready(function() {
              var owl1 = $('.blog-slider');
              owl1.owlCarousel({
                items: 3,
                 itemsDesktop : [1199,2],
                itemsDesktopSmall : [980,1],
                itemsTablet: [768,1],
                itemsTabletSmall: false,
                itemsMobile : [479,1],
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                navigation:false,
navigationText: [
   "<i class='fa fa-chevron-left'></i>",
   "<i class='fa fa-chevron-right'></i>"
]
              });
              $('.play').on('click', function() {
                owl1.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                owl1.trigger('stop.owl.autoplay')
              })
            })
          </script>  

          <script>
            $(document).ready(function() {
              var owl1 = $('.Partners_slider');
              owl1.owlCarousel({
                items: 4,
                 itemsDesktop : [1199,3],
                itemsDesktopSmall : [980,3],
                itemsTablet: [768,2],
                itemsTabletSmall: false,
                itemsMobile : [479,1],
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                navigation:false,
navigationText: [
   "<i class='fa fa-chevron-left'></i>",
   "<i class='fa fa-chevron-right'></i>"
]
              });
              $('.play').on('click', function() {
                owl1.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                owl1.trigger('stop.owl.autoplay')
              })
            })
          </script>  


          <script>
            $(document).ready(function() {
              var owl2 = $('#owl-one');
              owl2.owlCarousel({
                items: 5,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                navigation:true,

              });
              $('.play').on('click', function() {
                owl2.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                owl2.trigger('stop.owl.autoplay')
              })
            })
          </script>


         


<script type="text/javascript">
  function open_reg_modal()
  {
    var url = '<?php echo $this->uri->segment(1);?>';
    var from_user = '<?php echo $this->uri->segment(3);?>';
    var ref_code = '<?php echo $this->uri->segment(4);?>';
    if(url == "referral")
    {
       $.ajax({
                                        type: "POST",
                                        dataType: 'json',
                                        url:'<?php echo base_url();?>referral/check_referral_code',
                                        data:{ref_code:ref_code,from_user:from_user},
                                        sync: false,
                          
                        
                                 success: function(data)
                                 {
                                  if(data == 1)
                                  {
                                 $('#login').hide();
      $('#signup').show();
      $('#myModal').modal('show');
      $('#ref_code').val(ref_code);
      $('#ref_div').show();
    }
    else
    {
      alert('Check Referral Code');
    }
                                 }
                                });
      
    }

  }
</script>

<script>
function go_to_exam_detail()
{
  //alert('ok');
   var base_url=$("#baseurl").val();
    var session_exist='<?php echo $this->session->userdata('user_identity');?>';

    if(session_exist!='')
    {
     

      window.location.href=" <?php echo $this->url->link(33); ?>";
    }
    else
    {

      $.ajax({
                          
                         url:base_url+'index.php/manage_user/set_livetest_session',
                         data:{},
                         dataType: "json",
                         type: "POST",
                         success: function(data){
                          var perform= data.workdone;
                          //alert(perform['status']);
                          
                          if(perform['status']==1)
                          {
                           
                            $("#myModal").modal('show');

                           $("#lt_exam").val(perform['lt']);
                            /*$("#c_slug").val(perform['practicecat_slug']);*/
                            
                          }
                          
                         
                        

                             
                            
                              }
                         });

}

}
</script>


 <script>

          function email_mobile_submit_fn()
          {
            var eml_number=$("#email_num_log").val();

             if (isEmail(eml_number) || iMobile(eml_number)) {
                 $('#email_num_log').removeClass('red_border').addClass('black_border');
                
                
              } 
              
              else {
                
               $('#email_num_log').removeClass('black_border').addClass('red_border');
                return false;
                
              }

          }
          function send_password_notification()
          {

            $('#f_pwd').attr('onchange', 'email_mobile_submit_fn()');
              $('#f_pwd').attr('onkeyup', 'email_mobile_submit_fn()');

              email_mobile_submit_fn();

               if ($('#f_pwd .red_border').size() > 0)
              {
                $('#f_pwd .red_border:first').focus();
                $('#f_pwd .alert-error').show();
                return false;
              }


              else 
              {
                var base_url=$("#baseurl").val();
                var eml_number=$("#email_num_log").val();
                //alert(eml_number);
                $("#loader_otp_npwd").show();
                $("#loader_img_npwd").show();

                  $.ajax({
                          
                         url:base_url+'index.php/manage_login/send_password_otp',
                         data:{emln:eml_number},
                         dataType: "json",
                         type: "POST",
                         success: function(data){
                          var perform= data.workdone;
                          //alert(perform['status']);

                                if(perform['status']==1)
                                {
                                  $("#myModal").modal('hide');
                                  $("#loader_otp_npwd").hide();
                                  $("#loader_img_npwd").hide();
                                  $("#pwdotpModal").modal('show');
                                  $("#user_id").val(perform['user']);
                                  $("#medium").val(perform['medium']);

                                  $("#pwdsucotp_msg").text('OTP has been sent to your Email id or mobile number.');
                                  $("#errotp_msg").text('');
                                }
                                else
                                {
                                   $("#errotp_msg").text('Sorry!! No email address or mobile number found.');
                                }

                            }
                        });
                
              }

          }
          </script>


          <script>
function submit_pwd_otp()
{

  var usr=$("#user_id").val();
  var otp=$("#otp_pwd").val();

  if(otp!='' && usr!='')
  {
    $("#loader_img_pwd").show();
    $("#loader_otp_pwd").show();

    $.ajax({
                type: "POST",
                dataType: 'json',
                url:'<?php echo base_url();?>index.php/manage_login/otp_pwd_submit',
                data:{user_id:usr,code:otp},
                sync: false,
                          
                        
                 success: function(data){
                                          var perform= data.workdone;
                                          //alert(perform['status']);
                                          
                                          if(perform['status']==1)
                                          {
                                            $("#loader_img_pwd").hide();
                                            $("#loader_otp_pwd").hide();
                                            $("#pwdotpModal").modal('hide');
                                           
                                            window.location.href = '<?php echo $this->url->link(32); ?>';
                                            
                                          }
                                          else
                                          {
                                            $("#loader_img_pwd").hide();
                                            $("#loader_otp_pwd").hide();
                                            $("#otp_pwd").addClass('red_border');

                                          }
                                          
                                         
                                        

                                             
                                            
                                              }
                                         });
  }
  else
  {
    $("#loader_img_pwd").hide();
    $("#loader_otp_pwd").hide();
    $("#otp_pwd").addClass('red_border');
  }

   
      
}
</script>

<script>
function resend_password_otp()
{
  $("#loader_img_pwd").show();
  $("#loader_otp_pwd").show();
  var usr=$("#user_id").val();
  var med=$("#medium").val();


  $.ajax({
                type: "POST",
                dataType: 'json',
                url:'<?php echo base_url();?>index.php/manage_login/password_otp_resend',
                data:{user_id:usr,medium:med},
                sync: false,
                          
                        
                 success: function(data){
                                          var perform= data.workdone;
                                          //alert(perform['status']);
                                          
                                          if(perform['status']==1)
                                          {
                                            $("#loader_img_pwd").hide();
                                            $("#loader_otp_pwd").hide();
                                            $("#pwdsucotp_msg").text('Again OTP has been sent successfully.');
                                          }
                                          else
                                          {
                                            $("#errotp").text('OTP can not be sent.');

                                          }
                                          
                                         
                                        

                                             
                                            
                                              }
                                         });



}
</script>


<script type="text/javascript">
      $("#no").click(function(){
        $("#friend").hide();
    });
</script>

<script type="text/javascript">
      $("#yes").click(function(){
        $("#friend").show();
    });
</script>









<script type="text/javascript">
              
              $(document).ready(function() {
                    $('.answer li a').on('click', function()
                    {
                      //alert();
                      $('.answer li a').removeClass('active');
                      $(this).toggleClass('active');
                    });
                   });
          </script>








<!-- 
<script>
$( document ).ready(function() {
 

    $( "div.test-cnt > ul.answer >li > a#yes" ).click(function(){

      alert('ok');
      $("div.test-cnt > div.friend").show();
        
    });
    
});
</script> 



 -->









<!--   <script>
  $( function() {
    $( "#datepicker10" ).datepicker();
  } );
  </script> -->




  <script src="<?php echo base_url();?>assets/js/feedback.js"></script>
  <!--  <script src="<?php echo base_url();?>assets/js/calculate.js"></script> -->
     <script src="<?php echo base_url();?>assets/js/jchart.min.js"></script>
     <script type="text/javascript" src="https://isotope.metafizzy.co/v1/jquery.isotope.min.js"></script>



     


<script type="text/javascript">
    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
        $("#chkPassport1").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").hide();
            } 
        });

        $("#chkPassport1").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport1").show();
            } else {
                $("#dvPassport").hide();
            }
        });


         $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport1").hide();
            } 
        });
    });


</script>






<script type="text/javascript">
                
                                  //hide all tabs first
                $('.tab-content1').hide();
                //show the first tab content
                $('#tab-1').show();

                $('#select-box').change(function () {
                   dropdown = $('#select-box').val();
                  //first hide all tabs again when a new option is selected
                  $('.tab-content').hide();
                  //then show the tab content of whatever option value was selected
                  $('#' + "tab-" + dropdown).show();                                    
                });
            </script>

            <script type="text/javascript">
                
                          var selectIds = $('#panel1,#panel2,#panel3');
$(function ($) {
    selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
        $(this).prev().find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
    })
});
            </script>







 









 <script>
         $(function() {
           
            //$( "#datepicker-13" ).datepicker("show");

             $( "#datepicker_dob" ).datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
            dateFormat: 'dd-mm-yy'
           
            
        });
         });
      </script>

  
 <script>
    $(document).ready(function(){
      
   var usr='<?php echo $this->session->userdata('activeuser'); ?>';
   if(usr=='')
   {
      $(".notlogin").css('display','block');
      $("#phead").text('CART');
   }
   else
   {
    $(".notlogin").css('display','none');
    $("#phead").text('YOUR CART');
    $("#ptext").text('Please Select the Test Type');
   }

  });
  </script>

<?php 
$user_id=$this->session->userdata('activeuser');


if($user_id!='')
{
$user=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$slug=$this->uri->segment(1);
$slug_details=$this->common_model->common($table_name = 'app_routes', $field = array(), $where = array('slug'=>$slug), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$page_id=@$slug_details[0]->id;

?>

  <script>
  
  $( document ).ready(function() {
    var eml_verify='<?php echo @$user[0]->email_verify;?>';
    var p_id='<?php echo $page_id;?>';
    //alert(p_id);
//alert(eml_verify);
    if(eml_verify=='N' && p_id!='')
    {
      if(p_id==95 || p_id==91)
      {
          $("body").on("contextmenu",function(){
         return false;
        }); 


          $("#email_verify").modal('show');
      }
    

    }
  // Handler for .ready() called.
});
</script>

<?php } ?>

	

  <script>
 function validation_login1()
  {
    

      var email1 = $('#email1').val();
      if (!isNull(email1)) {
        $('#email1').removeClass('black_border').addClass('red_border');
      } else {
        if(!isEmail(email1))
        {
           $('#email1').removeClass('black_border').addClass('red_border');
        }
        else
        {
          $('#email1').removeClass('red_border').addClass('black_border');
        }
        
      }

      var pwd = $('#pwd').val();
      if (!isNull(pwd)) {
        $('#pwd').removeClass('black_border').addClass('red_border');
      } else {

        if(pwd.length<6)
        {
          $('#pwd').removeClass('black_border').addClass('red_border');
        }
        else
        {
          var letterNumber = /^[a-z0-9]+$/i;
          if((pwd.match(letterNumber))) 
       {
        $('#pwd').removeClass('red_border').addClass('black_border');
       }
       else
       {
        $('#pwd').removeClass('black_border').addClass('red_border');
       }
          
        }
        
      }

      
  }

   
    $("#manual_login").keypress(function(event){

    $('#manual_login').attr('onchange', 'validation_login()');
    $('#manual_login').attr('onkeyup', 'validation_login()');

    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        //alert('You pressed a "enter" key in somewhere'); 
         validation_login();
          if ($('#manual_login .red_border').size() > 0)
          {
            $('#manual_login .red_border:first').focus();
            $('#manual_login .alert-error').show();
            return false;
          } else {

            $('#manual_login').submit();
          }  
    }
});

    
  </script>

  

  



  <script>
      

        $(window).load(function(){
              $('code.language-javascript').mCustomScrollbar();
          });
          
            var nt_example1 = $('#nt-example1').newsTicker({
                row_height: 80,
                max_rows: 3,
                duration: 400000,
                prevButton: $('#nt-example1-prev'),
                nextButton: $('#nt-example1-next')
            });
        
       
            
            
        </script>
           <script>
        jQuery(document).ready(function($) {
            "use strict";
            $('.cutomertestimonial').owlCarousel({
                loop: true,
                center: true,
                margin: 20,
                autoplay: true,
                dots: true,
                nav: true,
                autoplayTimeout: 7500,
                items: 3,
                autoplayHoverPause: true,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    400: {
                        items: 1
                    },
                    768: {
                        items: 3
                    },
                    991: {
                        items: 3
                    },
                    1190: {
                        items: 3
                    }
                }
            });

            //  $('#partner-slider').owlCarousel({
            //     loop: true,
            //     center: true,
            //     margin: 20,
            //     autoplay: true,
            //     dots: true,
            //     nav: true,
            //     autoplayTimeout: 7500,
            //     items: 4,
            //     autoplayHoverPause: true,
            //     navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            //     responsive: {
            //         0: {
            //             items: 1
            //         },
            //         400: {
            //             items: 1
            //         },
            //         768: {
            //             items: 2
            //         },
            //         991: {
            //             items: 3
            //         },
            //         1190: {
            //             items: 4
            //         }
            //     }
            // });

           
        });

    </script>

<script>
   $(window).load(function(){
    var $container = $('.portfolioContainer');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });
 
    $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
         });
         return false;
    }); 
});
</script>


<script type="text/javascript">
  $(document).ready(function() {
  //carousel options
  $('#quote-carousel').carousel({
    pause: true, interval: 10000,
  });
});
</script>

<script type="text/javascript">
  
var inputs = document.querySelectorAll('.file-input')

for (var i = 0, len = inputs.length; i < len; i++) {
  customInput(inputs[i])
}

function customInput (el) {
  const fileInput = el.querySelector('[type="file"]')
  const label = el.querySelector('[data-js-label]')
  
  fileInput.onchange =
  fileInput.onmouseout = function () {
    if (!fileInput.value) return
    
    var value = fileInput.value.replace(/^.*[\\\/]/, '')
    el.className += ' -chosen'
    label.innerText = value
  }
}
</script>
  
</body>


</html>