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
         EDIT STUDENT
        
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
                    <h3 class="box-title">Student Edit</h3>
                    <div id="validation" style="color:red;"></div>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal m_changes" action="<?php echo base_url();?>index.php/manage_user/update" method="post" id="studentadd_form_validation" enctype="multipart/form-data" >

                     

                      <div class="form-group">
                          <label for="First Name" class="col-sm-2 control-label"><center>Student Name:<span style="color:#F00">*</span></center></label>
                            <div class="col-sm-10">
                                <input type="text" name="fname" class="form-control"  placeholder="Student Name"  id="fname" value="<?php echo @$student[0]->user_name;?>">
                                <span id="error_catname" style="color:red"></span>
                            </div>
                      </div>
                      

                       <div class="form-group">
                         <label for="Last Name" class="col-sm-2 control-label"><center>Email:<span style="color:#F00">*</span></center></label>

                            <div class="col-sm-10">
                              <input type="text" name="email" class="form-control"  placeholder="Email id"  id="email" value="<?php echo @$student[0]->login_email;?>" readonly>
                              <span id="error_catname" style="color:red"></span>
                            </div>
                      </div>

                       <div class="form-group">
                         <label for="Last Name" class="col-sm-2 control-label"><center>Mobile:<span style="color:#F00">*</span></center></label>

                            <div class="col-sm-10">
                              <input type="text" name="mobile" class="form-control"  placeholder="Mobile No."  id="mobile" value="<?php echo @$student[0]->login_mob;?>" readonly>
                              <span id="error_catname" style="color:red"></span>
                            </div>
                      </div>
                      <div class="form-group">
                         <label for="Age" class="col-sm-2 control-label"><center>Date Of Birth:<span style="color:#F00">*</span></center></label>
                           <div class="col-sm-10">
                             <input type="text" name="dob" class="form-control"  placeholder="Date Of Birth"  id="dob" value="<?php echo @$student[0]->dob;?>">
                             <span id="error_catname" style="color:red"></span>
                           </div>
                      </div>
                      <div class="form-group">
                        <label for="Mobile No" class="col-sm-2 control-label"><center>Adhar Card Number:<span style="color:#F00">*</span></center></label>
                          <div class="col-sm-10">
                            <input type="text" name="adhar" class="form-control" placeholder="Adhar Card Number" id="adhar" value="<?php echo @$student[0]->adhar;?>">
                            <span id="error_catname" style="color:red"></span>
                          </div>
                      </div>

                       <div class="form-group">
                        <label for="Mobile No" class="col-sm-2 control-label"><center>PAN Card Number:<span style="color:#F00">*</span></center></label>
                          <div class="col-sm-10">
                            <input type="text" name="pan" class="form-control" placeholder="PAN Card Number" id="pan" value="<?php echo @$student[0]->pan;?>">
                            <span id="error_catname" style="color:red"></span>
                          </div>
                      </div>
                     
                       <div class="form-group">
                        <label for="Email" class="col-sm-2 control-label"><center>Country:<span style="color:#F00">*</span></center></label>

                          <div class="col-sm-10">
                           
                            <select name="country" class="form-control" id="country" onchange="get_state(this.value)">
                              <option value="">Select Country</option>
                            <?php foreach ($country as $row) { ?>
                              <option value="<?php echo $row->id; ?>" <?php if($row->id==@$student[0]->country){ echo 'selected'; } ?>><?php echo $row->name; ?></option>
                            <?php } ?>

                            </select>
                        </div>
                       
                      </div>
                      
                     <div class="form-group">
                        <label for=" Address" class="col-sm-2 control-label"><center>State:<span style="color:#F00">*</span></center> </label>
                        <div class="col-sm-10">
                             <select name="state" class="form-control" id="state" onchange="get_city(this.value)">
                             <?php foreach ($state as $row) { ?>
                              <option value="<?php echo $row->id; ?>" <?php if($row->id==@$student[0]->state){ echo 'selected'; } ?>><?php echo $row->name; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                       
                      </div>

                       <div class="form-group">
                        <label for=" Address" class="col-sm-2 control-label"><center>City:<span style="color:#F00">*</span></center> </label>
                        <div class="col-sm-10">
                            <select name="city" class="form-control" id="city">
                            <?php foreach ($city as $row) { ?>
                              <option value="<?php echo $row->id; ?>" <?php if($row->id==@$student[0]->city){ echo 'selected'; } ?>><?php echo $row->name; ?></option>
                            <?php } ?>
                            </select> 
                        </div>
                       
                      </div>

                                             <div class="form-group address_cnt">
                        <label for=" Address" class="col-sm-2 control-label"><center>Address:<span style="color:#F00">*</span></center> </label>
                        <div class="col-sm-10">
                            <textarea name="address" class="form-control"  placeholder=" Address" rows="5" cols="96" id="address"><?php echo @$student[0]->user_address; ?></textarea>   
                        </div>
                       
                      </div>
                    <div class="form-group"  id="image">
                        
                        <label for=" pro_image" class="col-sm-2 control-label"><center>Profile Photo(150x150px):<span style="color:#F00">*</span></center> </label>
                        <div class="col-sm-10">
                        <input class="form-control" type="file" name="pro_pic" id="pro_pic" style="margin-bottom:12px">
                        <img style="height: 60px;width: 80px" src="<?php echo base_url(); ?>../assets/uploads/student_pic/<?php echo $student[0]->profile_photo; ?>">

                        <input class="form-control" type="hidden" name="hidden_profile_pic" id="hidden_profile_pic" value="<?php echo $student[0]->profile_photo; ?>">
                           <span id="error_catname" style="color:red"></span>
                        </div>
                       
                      </div>

                     

                      <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @$student[0]->id;?>">

                      
                      
                    </div>
                   <span style="color:#F00">*Fields Are Required</span>
                   
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <a href="<?php echo base_url();?>index.php/manage_user/list_view" class="btn btn-danger">Cancel</a>
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

  <script>
  $(function() {
    $( "#datepicker" ).datepicker(
    {
    autoclose: true
    });
  } );
  </script>

  <script type="text/javascript">
    function get_state(value)
    {
      var base_url="<?php echo base_url(); ?>";
      $.ajax({

        url:base_url+'index.php/manage_user/get_state',
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

        url:base_url+'index.php/manage_user/get_city',
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
            

            
             
             var fname =$('#fname').val();


              if (fname == "") 
              {
                $('#fname').addClass('red_border');
              }
              else 
              {
                $('#fname').removeClass('red_border');
              } 

             
            
             var adhar =$('#adhar').val();


              if (adhar == "") 
              {
                $('#adhar').addClass('red_border');
              }
              else 
              {
                $('#adhar').removeClass('red_border');
              }

              var pan =$('#pan').val();


              if (pan == "") 
              {
                $('#pan').addClass('red_border');
              }
              else 
              {
                $('#pan').removeClass('red_border');
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
             

               var email =$('#email').val();


              if (email == "" || !isEmail(email)) 
              {
                $('#email').addClass('red_border');
              }
              else 
              {
                $('#email').removeClass('red_border');
              } 

                var dob =$('#dob').val();


              if (dob == "") 
              {
                $('#dob').addClass('red_border');
              }
              else 
              {
                $('#dob').removeClass('red_border');
              } 

                var qualification =$('#qualification').val();


              if (qualification == "") 
              {
                $('#qualification').addClass('red_border');
              }
              else 
              {
                $('#qualification').removeClass('red_border');
              } 

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

                

                var password =$('#password').val();


              if (password == "") 
              {
                $('#password').addClass('red_border');
              }
              else 
              {
                $('#password').removeClass('red_border');
              }


                var cp =$('#cp').val();


              if (cp == "") 
              {
                $('#cp').addClass('red_border');
              }
              else 
              {
                if(password!=cp)
                {
                   $('#cp').addClass('red_border');
                }
                else
                {
                  $('#cp').removeClass('red_border');
                }
                
              }








           

              
       
    }

    function form_validation()
    {
         $('#studentadd_form_validation').attr('onchange', 'validation()');
         $('#studentadd_form_validation').attr('onkeyup', 'validation()');
         $('#studentadd_form_validation').attr('onfocus', 'validation()');
         

              validation();

              if ($('#studentadd_form_validation .red_border').size() > 0)
              {
                $('#studentadd_form_validation .red_border:first').focus();
                return false;
              }
                else 
                {
                  $('#studentadd_form_validation').submit();
                
                } 

                
              
    }
 </script>
 <script type="text/javascript">
   $('#dob').datepicker(
                
                    );

 </script>





            