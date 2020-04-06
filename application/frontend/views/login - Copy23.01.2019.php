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
    <div class="col-md-10 col-md-offset-1 text-center log-in">


      <h3>User login</h3>

      <div class="col-md-8 col-sm-6 col-xs-12">
        <div class="log-section">
          <h6>Login to Surajit Pramanick with</h6>

          <div class="col-md-6 col-sm-6 col-xs-12 res767-wid-50">
              <a href="#" class="social-btn fb"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12 res767-wid-50">
              <a href="#" class="social-btn g-plus"><i class="fa fa-google-plus" aria-hidden="true"></i> Google</a>
          </div>
          <h5 class="or">OR</h5>

          <h6>Login with your Surajit Pramanick account</h6>

          <div class="clearfix"></div>

          <form method="post" action="<?php echo $this->url->link(107);?>" class="login-form" id="manual_login">

            <p id="not_valid" style="font-weight:bold;font-size: 15px;color:red;display:none;">Sorry!! This is not a valid email id.</p>
            <?php if($this->session->flashdata('err_msg')!=''){?>
             <p id="not_valid" style="font-weight:bold;font-size: 15px;color:red;"><?php echo @$this->session->flashdata('err_msg'); ?></p>
            <?php } ?>
              <div class="form-group">
              <label>Email:</label>
              <input type="text" class="form-control" placeholder="" name="email1" id="email1" onblur="check_email(this.value)">

              </div>

               <div class="form-group">
              <label>Password:</label>
              <input type="password" class="form-control" placeholder="" name="pwd" id="pwd">

              </div>

               <div class="form-group">
                <button value="" type="button" class="btn read-btn" onclick="form_validation_login()">SUBMIT</button>

               </div>
          </form>


          <p>Don't have an account yet?<a href="<?php echo $this->url->link(87); ?>"> Register Now</a></p>

        </div>

      </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="log-section1 pp-cus-class">
              <h4>Highlight's Area:</h4>

              <ul>
                <?php 
                foreach($area_details as $row)
                {
                ?>
                <li><a><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo strip_tags($row->area_content) ;?></a></li>
                <?php
              }
              ?>
                <!--  <li><a><i class="fa fa-angle-double-right" aria-hidden="true"></i> Correct answer · Challenge</a></li> -->
              </ul>



              <!-- <p>------------so on</p> -->

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


