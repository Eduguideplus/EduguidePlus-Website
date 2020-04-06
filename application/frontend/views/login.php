<?php

include_once APPPATH."third_party/google-api-php-client/Google_Client.php";

include_once APPPATH."third_party/google-api-php-client/contrib/Google_Oauth2Service.php";



 // Google Project API Credentials

 $clientId = '788846769115-ea7o9q1qn5192amsrr204s4cqiftt360.apps.googleusercontent.com';

 $clientSecret = 'kkfJ_A8HAEpXz0DyFAGDRCus';



 

 $redirectUrl1 = base_url() . 'Social_login/google_login';



 // Google Client Configuration

 $gClient = new Google_Client();

 $gClient->setApplicationName('Login to Surajit Pramanick.com');

 $gClient->setClientId($clientId);

 

 $gClient->setClientSecret($clientSecret);

 $gClient->setRedirectUri($redirectUrl1);

 $google_oauthV2 = new Google_Oauth2Service($gClient);

 $authUrl1 = $gClient->createAuthUrl();

 ?>





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

<div class="container-fluid login_register deximJobs_tabs practice " style="background-image: url(<?php echo base_url(); ?>assets/images/11.jpg);">

 <div class="row">

  <div class="container main-container-home">

    <div class="col-md-10 col-md-offset-1 text-center log-in head_tex">





      <h3>Student login</h3>



      <div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3">

        <div class="log-section">

          <!-- <h6>Login to Surajit Pramanick with</h6> -->



          <div class="clearfix"></div>



          <form method="post" action="<?php echo $this->url->link(107);?>" class="login-form" id="manual_login">



            <p id="not_valid" style="font-weight:bold;font-size: 15px;color:red;display:none;">Sorry!! This email id is not registered with us.</p>

            <?php if($this->session->flashdata('err_msg')!=''){?>

             <p id="not_valid" style="font-weight:bold;font-size: 15px;color:red;"><?php echo @$this->session->flashdata('err_msg'); ?></p>

            <?php } ?>

            <?php if($this->session->flashdata('succ_msg')!=''){?>

             <p id="not_valid" style="font-weight:bold;font-size: 15px;color:green;"><?php echo @$this->session->flashdata('succ_msg'); ?></p>

            <?php } ?>

             <?php if($this->session->flashdata('errlog_msg')!=''){?>
             <p id="not_valid" style="font-weight:bold;font-size: 15px;color:red;"><?php echo @$this->session->flashdata('errlog_msg'); ?> <br><a href="<?php echo $this->url->link(160).'/'.$this->session->flashdata('error_logid'); ?>">Log Out from all devices</a></p>
            <?php } ?>

              <div class="form-group">
              <label>Email/Phone<span style="color: red">*</span> :</label>
              <input type="text" class="form-control" placeholder="Enter your registered Email-Id or Phone number" name="email1" id="email1" onblur="check_email(this.value)" required>
              </div>

              <!-- <div class="form-group">
              <label>Phone:</label>
              <input type="text" class="form-control" placeholder="" name="phone" id="phone" onblur="check_email(this.value)" required>
              </div>
 -->


              <div class="form-group">
              <label>Password<span style="color: red">*</span> :</label>
              <input type="password" class="form-control" placeholder="Enter your login password" name="pwd" id="pwd" required>
              </div>

              <div class="google_facebook">
                <p>Or ..</p>
                <ul>
                  <li><a href="#"><button type="button"><i class="fa fa-google" aria-hidden="true"></i>Google</button></a></li>
                  <li><a href="https://www.facebook.com/eduguideplus"><button type="button" class="facebook_ico"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</button></a></li>
                </ul>
              </div>



               <div class="form-group">

                <button value="" type="button" onclick="form_validation_login()" class="btn read-btn" >SUBMIT</button>



               </div>



               

          </form>

            <div class="form-group">

              

              <a href="<?php echo base_url();?>index.php/Sign_up/forget_password_page/" class="btn btn-info btn-action" title="Forget Password">Forget Password</a>

            </div>

          





          <p>Don't have an account yet?<a href="<?php echo $this->url->link(87); ?>"> Register Now</a></p>



        </div>



      </div>





      

      



    </div>

  </div>

</div>

</div>

</div>









<script>

  function check_email(value)

  {

    //alert();

    

          if(value!='')

          {

            $.ajax(

                {

                    type: "POST",

                    dataType:'json',

                    url:"<?php echo base_url();?>index.php/Login/check_email_exist",

                    data: {category_id: value},

                    async: false,

                    success: function(data)

                    {

                      //console.log(data);

                        var len=data.length;

                        //alert(len);

                        if(len==0)

                        {

                          $("#not_valid").css('display','block');

                          $('#email1').removeClass('black_border').addClass('red_border');

                        }

                        else

                        {

                          $("#not_valid").css('display','none');

                          $('#email1').removeClass('red_border').addClass('black_border');

                        }

                        

                        /*for(var i=0; i<data.length; i++)

                        {

                            html+='<option value="'+data[i].id+'">'+data[i].name+'</option>';

                        }

                        //alert(html); 

                        $("#city").html(html);*/



                    }

                });

          }

          



  }

</script>





<script>

  function validation_login()

  {



   // alert('hello');

    



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



      /*var pwd = $('#pwd').val();

      if (!isNull(pwd)) {

        $('#pwd').removeClass('black_border').addClass('red_border');

      } else {

        $('#pwd').removeClass('red_border').addClass('black_border');

      }*/





      var pwd = $('#pwd').val();

      if (!isNull(pwd)) {

        $('#pwd').removeClass('black_border').addClass('red_border');

      } else {



        

          

        

       

        $('#pwd').removeClass('red_border').addClass('black_border');

       

          

        

        

      }





      

     















      

  }

  function form_validation_login(e)

  {

     /* if (e.keyCode == 13) {

        validation_login();

    }

   */

    $('#manual_login').attr('onchange', 'validation_login()');

    $('#manual_login').attr('onkeyup', 'validation_login()');

   



     validation_login();

    //alert($('#contact_form .red_border').size());



    if ($('#manual_login .red_border').size() > 0)

    {

      $('#manual_login .red_border:first').focus();

      $('#manual_login .alert-error').show();

      return false;

    } else {



      $('#manual_login').submit();

    }



  }



  </script>





















