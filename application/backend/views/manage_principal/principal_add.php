<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <!--<script>tinymce.init({ selector:'textarea' });</script>-->
  <script type="text/javascript">
    tinymce.init({
      selector: ".tinyarea",
      theme: "modern",
      menubar: "edit insert tools",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools"
      ],
      toolbar1: "undo redo | styleselect | bold italic| forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist | link preview",
      image_advtab: true
    });
  </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3>
         ADD PRINCIPAL
        
      </h3>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Principal Add</h3>
                    <div id="validation" style="color:red;"></div>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal m_changes" action="<?php echo base_url();?>index.php/manage_principal/insert" method="post" id="principal_form_validation" enctype="multipart/form-data" >

                    <div class="form-group">
                          <label for="First Name" class="col-sm-2 control-label"><center>Business / Organisation Name:<span style="color:#F00">*</span></center></label>
                            <div class="col-sm-10">
                                <input type="text" name="business_name" class="form-control"  placeholder="Business/Organisation Name"  id="business_name">
                                <span id="error_catname" style="color:red"></span>
                            </div>
                      </div>
                    
                    <div class="form-group">
                          <label for="First Name" class="col-sm-2 control-label"><center>Contact Person:<span style="color:#F00">*</span></center></label>
                            <div class="col-sm-10">
                                <input type="text" name="fname" class="form-control"  placeholder="Full Name"  id="fname">
                                <span id="error_catname" style="color:red"></span>
                            </div>
                      </div>
                  
                      

                       <div class="form-group">
                         <label for="Last Name" class="col-sm-2 control-label"><center>Email:<span style="color:#F00">*</span></center></label>

                            <div class="col-sm-10">
                              <input type="text" name="email" class="form-control"  placeholder="Email id"  id="email">
                              <span id="error_email" style="color:red"></span>
                            </div>
                      </div>

                       <div class="form-group">
                         <label for="Last Name" class="col-sm-2 control-label"><center>Mobile:<span style="color:#F00">*</span></center></label>

                            <div class="col-sm-10">
                              <input type="text" name="mobile" class="form-control"  placeholder="Mobile No."  id="mobile">
                              <span id="error_ph" style="color:red"></span>
                            </div>
                      </div>

                      <div class="form-group">
                         <label for="Last Name" class="col-sm-2 control-label"><center>Gender:<span style="color:#F00">*</span></center></label>

                            <div class="col-sm-10">
                              <input type="radio" name="gender" id="male" value="Male" checked>Male
                              <input type="radio" name="gender" id="female" value="Female">Female
                              
                            </div>
                            <span id="error_gender" style="color:red"></span>
                      </div>
                      
                      <div class="form-group">
                        <label for="Mobile No" class="col-sm-2 control-label"><center>Adhar(Optional):<span style="color:#F00"></span></center></label>
                          <div class="col-sm-10">
                            <input type="text" name="adhar" class="form-control" placeholder="Adhar Card Number" id="adhar">
                            <span id="error_catname" style="color:red"></span>
                          </div>
                      </div>

                       <div class="form-group">
                        <label for="Mobile No" class="col-sm-2 control-label"><center>PAN(Optional):<span style="color:#F00"></span></center></label>
                          <div class="col-sm-10">
                            <input type="text" name="pan" class="form-control" placeholder="PAN Card Number" id="pan">
                            <span id="error_catname" style="color:red"></span>
                          </div>
                      </div>
                     
                       <div class="form-group">
                        <label for="Email" class="col-sm-2 control-label"><center>Country:<span style="color:#F00">*</span></center></label>

                          <div class="col-sm-10">
                           
                            <select name="country" class="form-control" id="country" onchange="get_state(this.value)">
                              <option value="">Select Country</option>
                            <?php foreach ($country as $row) { ?>
                              <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                            <?php } ?>

                            </select>
                        </div>
                       
                      </div>
                      
                     <div class="form-group">
                        <label for=" Address" class="col-sm-2 control-label"><center>State:<span style="color:#F00">*</span></center> </label>
                        <div class="col-sm-10">
                             <select name="state" class="form-control" id="state" onchange="get_city(this.value)">
                              <option value="">Select State</option>
                              
                            </select>
                        </div>
                       
                      </div>

                       <div class="form-group">
                        <label for=" Address" class="col-sm-2 control-label"><center>City:<span style="color:#F00">*</span></center> </label>
                        <div class="col-sm-10">
                            <select name="city" class="form-control" id="city">
                              <option value="">Select City</option>
                              
                            </select> 
                        </div>
                       
                      </div>

                       
                    

                      <div class="form-group">
                        <label for="Mobile No" class="col-sm-2 control-label"><center>Password:<span style="color:#F00">*</span></center></label>
                          <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                            <span id="error_catname" style="color:red"></span>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="Mobile No" class="col-sm-2 control-label"><center>Confirm Password:<span style="color:#F00">*</span></center></label>
                          <div class="col-sm-10">
                            <input type="password" name="con_pass" class="form-control" placeholder="Confirm Password" id="con_pass">
                            <span id="error_catname" style="color:red"></span>
                          </div>
                      </div>
                      <div class="form-group address_cnt">
                        <label for=" Address" class="col-sm-2 control-label"><center>Address:<span style="color:#F00">*</span></center> </label>
                        <div class="col-sm-10">
                            <textarea name="address" class="form-control"  placeholder=" Address" rows="5" cols="96" id="address"></textarea>   
                        </div>
                       
                      </div>
                      <div class="form-group"  id="image">
                        <label for="pro_image" class="col-sm-2 control-label">Profile Photo(150x150px):</label>
                        <div class="col-sm-10">
                          <input type="file" name="pro_pic"  class="form-control" id="pro_pic" >
                           <span id="error_catname" style="color:red"></span>
                        </div>
                       
                      </div>
                    </div>
                   <span style="color:#F00">*Fields Are Required</span>
                   
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <a href="<?php echo base_url();?>index.php/manage_principal/list_view" class="btn btn-danger">Cancel</a>
                      <button type="button" class="btn btn-info pull-right" onclick="return form_validation()" >Submit</button>
                    </div>
                    <!-- /.box-footer -->
                  </form>
                </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
          
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  </div>
 
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
<script src="<?php echo base_url();?>custom_script/patient_validation.js"></script>

  <script type="text/javascript">
    function get_state(value)
    {
      var base_url="<?php echo base_url(); ?>";
      $.ajax({

        url:base_url+'index.php/manage_principal/get_state',
        data:{id:value},
        dataType:'html',
        type:'post',
        success: function(data)
        {
           $('#state').html(data);
        }
      });
    }
  </script>

   <script type="text/javascript">
    function get_city(value)
    {
      var base_url="<?php echo base_url(); ?>";
      $.ajax({

        url:base_url+'index.php/manage_principal/get_city',
        data:{id:value},
        dataType:'html',
        type:'post',
        success: function(data)
        {
          // alert(data);
           $('#city').html(data);

        }
      });
    }
    
  </script>

<script type="text/javascript">
   function validation()
     {
              var business_name =$('#business_name').val();
              if (business_name == "") 
              {
                $('#business_name').addClass('red_border');
              }
              else 
              {
                $('#business_name').removeClass('red_border');
              }

              var fname =$('#fname').val();
              if (fname == "") 
              {
                $('#fname').addClass('red_border');
              }
              else 
              {
                $('#fname').removeClass('red_border');
              }

              var email =$('#email').val();
              if (email == "" || !isEmail(email)) 
              {
                $('#email').addClass('red_border');
              }
              else 
              {
                $('#email').removeClass('red_border');
              } 
              
              var mobile =$('#mobile').val();
              if (mobile == "") 
              {
                $('#mobile').addClass('red_border');
              }
              else 
              {
                $('#mobile').removeClass('red_border');
              }

              var gender=$("input[name='gender']:checked").val();

              

              // var adhar =$('#adhar').val();
              // if (adhar == "") 
              // {
              //   $('#adhar').addClass('red_border');
              // }
              // else 
              // {
              //   $('#adhar').removeClass('red_border');
              // }

              // var pan =$('#pan').val();
              // if (pan == "") 
              // {
              //   $('#pan').addClass('red_border');
              // }
              // else 
              // {
              //   $('#pan').removeClass('red_border');
              // } 

              var country =$('#country').val();
              if (country == "") 
              {
                $('#country').addClass('red_border');
              }
              else 
              {
                $('#country').removeClass('red_border');
              } 

              var state =$('#state').val();
              if (state == "") 
              {
                $('#state').addClass('red_border');
              }
              else 
              {
                $('#state').removeClass('red_border');
              } 

              var city =$('#city').val();
              if (city == "") 
              {
                $('#city').addClass('red_border');
              }
              else 
              {
                $('#city').removeClass('red_border');
              } 

              var address =$('#address').val();
              if (address == "") 
              {
                $('#address').addClass('red_border');
              }
              else 
              {
                $('#address').removeClass('red_border');
              }

              var pro_pic =$('#pro_pic').val();
              if (pro_pic == "") 
              {
                $('#pro_pic').addClass('red_border');
              }
              else 
              {
                $('#pro_pic').removeClass('red_border');
              }

              var password =$('#password').val();
              if (password == "") 
              {
                $('#password').addClass('red_border');
              }
              else 
              {
                if(password.length < 6)
                {
                    $('#password').addClass('red_border');
                }
                else
                { 
                  $('#password').removeClass('red_border');
                }
              }

              var con_pass =$('#con_pass').val();
              if(con_pass == "") 
              {
                $('#con_pass').addClass('red_border');
              }
              else 
              {
                if(password!=con_pass)
                {
                   $('#con_pass').addClass('red_border');
                }
                else
                {
                  $('#con_pass').removeClass('red_border');
                } 
              } 
    }

    function form_validation()
    {
         $('#principal_form_validation').attr('onchange', 'validation()');
         $('#principal_form_validation').attr('onkeyup', 'validation()');
         $('#principal_form_validation').attr('onfocus', 'validation()');

              validation();

              if ($('#principal_form_validation .red_border').size() > 0)
              {
                $('#principal_form_validation .red_border:first').focus();
                return false;
              }
              else 
              {
                 var base_url="<?php echo base_url(); ?>";
                 var email =$('#email').val();
                 var mobile =$('#mobile').val();

                 $.ajax({
                   url:base_url+'index.php/manage_principal/check_exist_mail',
                   data:{email:email},
                   dataType:'json',
                   type:'post',
                   success: function(data)
                   {
                     if(data == "Y") 
                     {
                       $('#email').addClass('red_border');
                       $('#error_email').html('Email already exist');
                     }
                     else 
                     {
                       $('#email').removeClass('red_border');
                       $('#error_email').html('');
                       
                        $.ajax({
                           url:base_url+'index.php/manage_principal/check_exist_mobile',
                           data:{mobile:mobile},
                           dataType:'json',
                           type:'post',
                           success: function(data)
                           {
                             if(data == "Y") 
                             {
                               $('#mobile').addClass('red_border');
                               $('#error_ph').html('Phone number already exist');
                             }
                             else 
                             {
                               $('#mobile').removeClass('red_border');
                               $('#error_ph').html('');
                               $('#principal_form_validation').submit();
                             } 
                           }
                         });
                     } 
                   }
                 });
                
              }       
    }
 </script>
 





            