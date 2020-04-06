<?php

$contact=$this->common_model->common($table_name = 'tbl_contact', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$about=$this->common_model->common($table_name = 'tbl_page_manage', $field = array(), $where = array('routes_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
?>

<!--Footer Area-->
<div class="container-fluid footer">
 <div class="row">
  <div class="container main-container-home">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 res-ft-height wid-33">
     <h3>Useful Links</h3>
     <ul class="list-group">
      <li><a href="<?php echo $this->url->link(93); ?>">Mock Test</a></li>
      <li><a href="<?php echo $this->url->link(97);?>">Library</a></li>
      <li><a href="<?php echo $this->url->link(94);?>">Discussion</a></li>
      <li><a href="<?php echo $this->url->link(96);?>">About Examination</a></li>
       <li><a href="<?php echo @$this->url->link(90); ?>">Rank & Reward<?php /*$total_attm=@$total_attempt;
//echo @$total_attm.'abcd';
$corr_att=@$correct_attempt;
echo @$corr_att.'pq';
$incorr_att=@$incorrect_attempt;
echo @$incorr_att.'rs';
$not_ans=@$total_attm-(@$corr_att+@$incorr_att);
echo @$not_ans.'mn';

$corr_att_percent=@$corr_att/@$total_attm*100;
echo @$corr_att_percent.'xx';
$incorr_att_percent=@$incorr_att/@$total_attm*100;
echo @$incorr_att_percent.'yy';
$not_ans_percent=@$not_ans/@$total_attm*100;
echo @$not_ans_percent.'zz';*/ ?></a></li>
      <!-- <li><a href="<?php echo $this->url->link(54); ?>">access Denied</a></li>
      <li><a href="<?php echo $this->url->link(38); ?>">404 Page</a></li> -->


    </ul>
  </div>
    <!---Footer Column 01-->
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 res-ft-height wid-33">
     <h3>Legal Info</h3>
     <ul class="list-group">
      <!-- <li><a href="<?php echo $this->url->link(6);?>">About Us</a></li>
      <li><a href="<?php echo $this->url->link(5);?>">Contact Us</a></li>
      <li><a href="<?php echo $this->url->link(28);?>">Career</a></li>
      <li><a href="<?php echo $this->url->link(34);?>">FAQ</a></li>
      <li><a href="<?php echo $this->url->link(3); ?>">Blog</a></li>
      <li><a href="<?php echo $this->url->link(63);?>">Plan</a></li>
      <li><a href="<?php echo $this->url->link(54); ?>">access Denied</a></li>
      <li><a href="<?php echo $this->url->link(38); ?>">404 Page</a></li>
 -->
 <li><a href="#">Privacy Policy</a></li>
 <li><a href="#">Terms And Conditions</a></li>
 <li><a href="<?php echo $this->url->link(34);?>">FAQ</a></li>

    </ul>
  </div>
  <!---Footer Column 01-->
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 res-ft-height wid-33">
   <h3>Contact with us</h3>
   <!-- <p class="location"><?php echo $contact[0]->contact_address; ?> </p> --> 
    <p class="contact-number"><?php echo $contact[0]->contact_phno; ?></p>
    <p class="contact-email"><?php echo $contact[0]->contact_email; ?></p>
    
  </div>
  <!---Footer Column 01-->
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 res-ft-height txt-center">
    <h3>Social With Us</h3>
    <ul class="social-hed list-inline margin-top-20">
      <li class=""><a href="<?php echo $social[0]->facebook_link;?>" target="_blank" class="fb"></a></li>
      <li class=""><a href="<?php echo $social[0]->twitter_link;?>" target="_blank" class="tw"></a></li>
      <li class=""><a href="<?php echo $social[0]->youtube_link;?>" target="_blank" class="yt"></a></li>
      <li class=""><a href="<?php echo $social[0]->googleplus_link;?>" target="_blank" class="gp"></a></li>
           <!--  <li class=""><a href="#" target="_blank" class="link"></a></li>
           <li class=""><a href="#" target="_blank" class="prin"></a></li> -->
         </ul>
       </div>


     </div>
   </div>
 </div>
 <!--Footer Area--> 
 <!--Last Footer Area---->
 <div class="container-fluid footer last-footer ">
   <div class="row">
    <div class="container main-container text-center">
     <div class="col-lg-12 col-md-12" >
       <p class="copyright">©  <?php echo date('Y'); ?> | WBCS Forum All Rights Reserved.Designed By <a href="https://www.exprolab.com/" target="blank">Expro Lab</a></p>
     </div>


   </div>
 </div>
</div>
<!--Last Footer Area----> 





<!-- Popup Model-->
<!-- Scripts
  ================================================== -->
  <!--  jQuery 1.7+  -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.9.1.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
  <!--Select 2-->
  <!-- jquery ui -->
   <!--  <script src="<?php echo base_url();?>assets/plugins/jquery-ui-1.12.0/jquery-ui.min.js"></script> -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/select2/select2.full.min.js"></script>
  <!-- Html Editor -->
  <script src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
  <!--  parallax.js-1.4.2  -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/parallax.js-1.4.2/parallax.js"></script>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  <!-- Include js plugin -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/owlslider/owl-carousel/owl.carousel.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/waypoints.min.js"></script> 
  <script type="text/javascript" src="<?php echo base_url();?>assets/counter/jquery.counterup.min.js"></script> 


  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/7.2.2/lazyload.transpiled.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.20/angular.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/common.6d54d21ce6ff0f1313f47a7988f46d52.js"></script>
<script src="<?php echo base_url();?>assets/js/homepage-concat.b9bdb08e15ccce9015ea03dd4a2dea4f.js"></script>




<script src="<?php echo base_url();?>assets/js/radial-progress-bar.js"></script>
        <script src="<?php echo base_url();?>assets/js/examples.js"></script>


<script type="text/javascript">
  setTimeout(function() {
            $('body').addClass('loaded');
        }, 200);

</script>

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

<script type="text/javascript">
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
        <button type="button"  class="btn btn-lg btn-facebook btn-block">Facebook</button>
       </div>
      <div class="col-md-6 col-xs-6 col-sm-6 pr-0 pl-10">  
        <button type="button"  class="btn btn-lg btn-google btn-block">Google</button>
      </div> 
      <p class="text-center or">OR</p> 
      </div>
      <span id="er_msg" style="display:none;color:red;"></span>
      <form method="post" id="log" action="">
      <input type="hidden" name="p_exam" id="p_exam" value="">
      <input type="hidden" name="c_slug" id="c_slug" value="">
      <input type="hidden" name="b_comment" id="b_comment" value="">
      <input type="hidden" name="b_id" id="b_id" value="">
      <input type="hidden" name="lt_exam" id="lt_exam" value="">
       <div class="form-group">
       
        <input type="email" name="email_log" id="email_log" placeholder="Email" />
      </div>
      <div class="form-group">
     
        <input type="password" name="password_log" id="password_log" placeholder="Password" />
      </div>
      
      <input type="hidden" name="hidden_exam" id="hidden_exam" value="" />
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-lg btn-login btn-block" onclick="check_login()" >Login</button>
      
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
     <p class="text-center or">OR</p>   
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
  <!-- Scripts
  ================================================== -->

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
              if(perform['status']==1)
              {
                $("#suc_msg").css("display", "block");
                $("#suc_msg").text('You have registered successfuly. One email has been sent to your account.Check your email account');
                $("#err_msg").css("display", "none");
                
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

<script type="text/javascript">
  $(document).ready(function(e) {
        $(".showonhover").click(function(){
      $("#selectfile").trigger('click');
    });
    });


var input = document.querySelector('input[type=file]'); // see Example 4

input.onchange = function () {
  var file = input.files[0];

  drawOnCanvas(file);   // see Example 6
  displayAsImage(file); // see Example 7
};

function drawOnCanvas(file) {
  var reader = new FileReader();

  reader.onload = function (e) {
    var dataURL = e.target.result,
        c = document.querySelector('canvas'), // see Example 4
        ctx = c.getContext('2d'),
        img = new Image();

    img.onload = function() {
      c.width = img.width;
      c.height = img.height;
      ctx.drawImage(img, 0, 0);
    };

    img.src = dataURL;
  };

  reader.readAsDataURL(file);
}

function displayAsImage(file) {
  var imgURL = URL.createObjectURL(file),
      img = document.createElement('img');

  img.onload = function() {
    URL.revokeObjectURL(imgURL);
  };

  img.src = imgURL;
  document.body.appendChild(img);
}

$("#upfile1").click(function () {
    $("#file1").trigger('click');
});
$("#upfile2").click(function () {
    $("#file2").trigger('click');
});
$("#upfile3").click(function () {
    $("#file3").trigger('click');
});
</script>
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

<script type="text/javascript">
  
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
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                navigation:true,
navigationText: [
   "<i class='fa fa-chevron-left'></i>",
   "<i class='fa fa-chevron-right'></i>"
]
              });
              $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
              })
            })
          </script>

          <script>
            $(document).ready(function() {
              var owl = $('#owl-one');
              owl.owlCarousel({
                items: 5,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                navigation:true,
navigationText: [
   "<i class='fa fa-chevron-left'></i>",
   "<i class='fa fa-chevron-right'></i>"
]
              });
              $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
              })
            })
          </script>


          <script>

          function login_submit_fn()
          {
              var password = $('#password_log').val();
              if (!isNull(password)) {
                $('#password_log').removeClass('black_border').addClass('red_border');
                
              } else {
                $('#password_log').removeClass('red_border').addClass('black_border');
              }


              var email = $('#email_log').val();
              if (!isEmail(email)) {
                $('#email_log').removeClass('black_border').addClass('red_border');
                return false;
              } 
              else {
                
                $('#email_log').removeClass('red_border').addClass('black_border');
              }

          }

          function check_login()
          {
              $('#log').attr('onchange', 'login_submit_fn()');
              $('#log').attr('onkeyup', 'login_submit_fn()');

              login_submit_fn();
              //alert($('#contact_form .red_border').size());

              if ($('#log .red_border').size() > 0)
              {
                $('#log .red_border:first').focus();
                $('#log .alert-error').show();
                return false;
              }


              else 
              {

               
                    
                     var email = $('#email_log').val();
                    
                     var password = $('#password_log').val();

                     var exam_id=$("#hidden_exam").val();
                    
                     var p_exam=$("#p_exam").val();
                     var c_slug=$("#c_slug").val();

                      var b_comment=$("#b_comment").val();
                      var b_id=$("#b_id").val();
                      var lt=$("#lt_exam").val();

                    var base_url=$("#baseurl").val();
                    var cart_session = '<?php echo $this->session->userdata('cart_session_id');?>';
                    //var  practice_exam_session = '<?php echo $this->session->userdata('practiceexam_id');?>';
                    //var  practice_cat_session = '<?php echo $this->session->userdata('practicecat_slug');?>';
                    //alert(practice_exam_session);
                    var live_tst_ss='<?php echo $this->session->userdata('livetest');?>';
                   
                   $.ajax({
                          
                         url:base_url+'index.php/manage_login/login_action',
                         data:{eml:email,pwd:password},
                         dataType: "json",
                         type: "POST",
                         success: function(data){
                          var perform= data.workdone;
                          //alert(perform['status']);
                          
                          if(perform['status']==1)
                          {
                            
                            $("#er_msg").css("display", "none");
                            if(cart_session != "")
                            {
                               $.ajax({
                                        type: "POST",
                                        dataType: 'html',
                                        url:'<?php echo base_url();?>plan/update_cart',
                                        data:{cart_session:cart_session,email:email},
                                        sync: false,
                          
                        
                                 success: function(data)
                                 {
                                  window.location.href = '<?php echo base_url(); ?>plan/checkout';
                                 }
                                });
                            }


                            if(p_exam!='' && c_slug!='')
                            { 

                              window.location.href="<?php echo $this->url->link(64).'/'?>"+p_exam+'/'+c_slug;

                            }


                            if(b_comment!='' && b_id!='')
                            { 

                              window.location.href="<?php echo $this->url->link(66).'/'?>"+b_id;

                            }
                            if(lt=='proceed')
                            {
                              window.location.href="<?php echo $this->url->link(33);?>";
                            }
                            
                            else
                            {
                            window.location.href = '<?php echo $this->url->link(8); ?>';
                            }
                            
                          }
                          
                          else 
                          {
                            
                            $("#er_msg").css("display", "block");
                            $("#er_msg").text('Sorry!! wrong email id or password.');
                           
                          }
                        

                             
                            
                              }
                         });

              }


              }
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
  alert('ok');
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


<?php
$all=@$all_exams;
$comp=count(@$complete_exam);
$comp_percent=$comp/$all*100;
$remain=@$remain_exam;
$remain_percent=$remain/$all*100;
if(count(@$ongoing)>0){$ong= count(@$ongoing);}else{$ong=0; }
$ong_percent=$ong/$all*100;

$total_attm=@$total_attempt;

$corr_att=@$correct_attempt;
$incorr_att=@$incorrect_attempt;
//$not_ans=@$total_attm-(@$corr_att+@$incorr_att);

$not_answ=0;
$total_q_qty=0;
for($i=0;$i<count(@$pattern);$i++)
{
  $attempt_qstn=$this->join_model->get_question_of_section_attempted($user_exam,$pattern[$i]->section_id);
  $section_attempt=count($attempt_qstn);
  $section_not_ans=@$pattern[$i]->quantity-@$section_attempt;
  $not_answ=$not_answ+$section_not_ans;
  $total_q_qty=$total_q_qty+@$pattern[$i]->quantity;

 }
 $corr_att_percent=@$corr_att/@$total_q_qty*100;
$incorr_att_percent=@$incorr_att/@$total_q_qty*100;
$not_ans_percent=@$not_answ/@$total_q_qty*100;
?>
<script>
jQuery("#pie").radialPieChart("init", {
  'font-size': 0,
  'size': 150,
  'fill': 10,
  'data': [
    {'color': "#1fbad6", 'perc': <?php echo $comp_percent; ?>},
    {'color': "#78d7e9", 'perc': <?php echo $ong_percent; ?>},
    {'color': "orange", 'perc': <?php echo $remain_percent;?>}
  ]
});


jQuery("#pie2").radialPieChart("init", {
  'font-size': 0,
  'size': 150,
  'fill': 10,
  'data': [
    {'color': "#16b55e", 'perc': <?php echo $corr_att_percent; ?>},
    {'color': "#e54549", 'perc': <?php echo $incorr_att_percent; ?>},
    {'color': "orange", 'perc': <?php echo $not_ans_percent; ?>}
  ]
});

jQuery("#pie3").radialPieChart("init", {
  'font-size': 0,
  'size': 150,
  'fill': 10,
  'data': [
    {'color': "#16b55e", 'perc': 50},
    {'color': "#e54549", 'perc': 50},
    {'color': "#A4075E", 'perc': 0}
  ]
});
</script>

  
  
</body>


</html>