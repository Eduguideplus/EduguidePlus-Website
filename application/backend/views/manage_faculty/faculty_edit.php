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
         EDIT FACULTY
        
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
                    <h3 class="box-title">Faculty Edit</h3>
                    <div id="validation" style="color:red;"></div>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal m_changes" action="<?php echo base_url();?>index.php/manage_faculty/update" method="post" id="faculty_form_validation" enctype="multipart/form-data" >

                     <div class="form-group">
                          <label for="First Name" class="col-sm-2 control-label"><center>User Code:<span style="color:#F00">*</span></center></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly value="<?php echo @$faculty_details[0]->user_code; ?>">
                                <span id="error_catname" style="color:red"></span>
                            </div>
                      </div>

                       <div class="form-group">
                        <label for="Email" class="col-sm-2 control-label"><center>Head Faculty:<span style="color:#F00">*</span></center></label>

                          <div class="col-sm-10">
                           
                            <select name="head_faculty_id" class="form-control" id="head_faculty_id">
                              <option value="">Select Head Faculty</option>
                            <?php foreach ($head_faculty_list as $row) { ?>
                              <option value="<?php echo $row->id; ?>" <?php if($row->id==@$faculty_details[0]->parent_id){ echo 'selected'; } ?>><?php echo $row->user_name; ?></option>
                            <?php } ?>

                            </select>
                        </div>
                       
                      </div>


                      <div class="form-group">
                          <label for="First Name" class="col-sm-2 control-label"><center>Business / Organisation Name:<span style="color:#F00">*</span></center></label>
                            <div class="col-sm-10">
                                <input type="text" name="business_name" class="form-control"  placeholder="Business/Organisation Name"  id="business_name" value="<?php echo @$faculty_details[0]->business_name; ?>">
                                <span id="error_catname" style="color:red"></span>
                            </div>
                      </div>

                      <div class="form-group">
                          <label for="First Name" class="col-sm-2 control-label"><center>Contact Person:<span style="color:#F00">*</span></center></label>
                            <div class="col-sm-10">
                                <input type="text" name="fname" class="form-control"  placeholder="Full Name"  id="fname" value="<?php echo @$faculty_details[0]->user_name; ?>">
                                <span id="error_catname" style="color:red"></span>
                            </div>
                      </div>
                      

                       <div class="form-group">
                         <label for="Last Name" class="col-sm-2 control-label"><center>Email:<span style="color:#F00">*</span></center></label>

                            <div class="col-sm-10">
                              <input type="text" name="email" class="form-control" readonly  placeholder="Email id"  id="email" value="<?php echo @$faculty_details[0]->login_email; ?>">
                              <span id="error_catname" style="color:red"></span>
                            </div>
                      </div>

                       <div class="form-group">
                         <label for="Last Name" class="col-sm-2 control-label"><center>Mobile:<span style="color:#F00">*</span></center></label>

                            <div class="col-sm-10">
                              <input type="text" name="mobile" class="form-control" readonly  placeholder="Mobile No."  id="mobile" value="<?php echo @$faculty_details[0]->login_mob; ?>">
                              <span id="error_catname" style="color:red"></span>
                            </div>
                      </div>

                      <div class="form-group">
                         <label for="Last Name" class="col-sm-2 control-label"><center>Gender:<span style="color:#F00">*</span></center></label>

                            <div class="col-sm-10">
                              <input type="radio" name="gender" id="male" value="Male" <?php if(@$faculty_details[0]->gender=='Male'){ echo 'checked'; } ?>>Male
                              <input type="radio" name="gender" id="female" value="Female" <?php if(@$faculty_details[0]->gender=='Female'){ echo 'checked'; } ?>>Female
                              
                            </div>
                            <span id="error_gender" style="color:red"></span>
                      </div>
                      
                      <div class="form-group">
                        <label for="Mobile No" class="col-sm-2 control-label"><center>Adhar:<span style="color:#F00">*</span></center></label>
                          <div class="col-sm-10">
                            <input type="text" name="adhar" class="form-control" placeholder="Adhar Card Number" id="adhar" value="<?php echo @$faculty_details[0]->adhar; ?>">
                            <span id="error_catname" style="color:red"></span>
                          </div>
                      </div>

                       <div class="form-group">
                        <label for="Mobile No" class="col-sm-2 control-label"><center>PAN:<span style="color:#F00">*</span></center></label>
                          <div class="col-sm-10">
                            <input type="text" name="pan" class="form-control" placeholder="PAN Card Number" id="pan" value="<?php echo @$faculty_details[0]->pan; ?>">
                            <span id="error_catname" style="color:red"></span>
                          </div>
                      </div>
                     
                       <div class="form-group">
                        <label for="Email" class="col-sm-2 control-label"><center>Country:<span style="color:#F00">*</span></center></label>

                          <div class="col-sm-10">
                           
                            <select name="country" class="form-control" id="country" onchange="get_state(this.value)">
                              <option value="">Select Country</option>
                            <?php foreach ($country_list as $row) { ?>
                              <option value="<?php echo $row->id; ?>" <?php if($row->id==@$faculty_details[0]->country){ echo 'selected'; } ?>><?php echo $row->name; ?></option>
                            <?php } ?>

                            </select>
                        </div>
                       
                      </div>
                      
                     <div class="form-group">
                        <label for=" Address" class="col-sm-2 control-label"><center>State:<span style="color:#F00">*</span></center> </label>
                        <div class="col-sm-10">
                             <select name="state" class="form-control" id="state" onchange="get_city(this.value)">
                              <?php foreach ($state_list as $row) { ?>
                              <option value="<?php echo $row->id; ?>" <?php if($row->id==@$faculty_details[0]->state){ echo 'selected'; } ?>><?php echo $row->name; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                       
                      </div>

                       <div class="form-group">
                        <label for=" Address" class="col-sm-2 control-label"><center>City:<span style="color:#F00">*</span></center> </label>
                        <div class="col-sm-10">
                            <select name="city" class="form-control" id="city">
                             <?php foreach ($city_list as $row) { ?>
                              <option value="<?php echo $row->id; ?>" <?php if($row->id==@$faculty_details[0]->city){ echo 'selected'; } ?>><?php echo $row->name; ?></option>
                            <?php } ?>
                            </select> 
                        </div>
                       
                      </div>

                       <div class="form-group address_cnt">
                        <label for=" Address" class="col-sm-2 control-label"><center>Address:<span style="color:#F00">*</span></center> </label>
                        <div class="col-sm-10">
                            <textarea name="address" class="form-control"  placeholder=" Address" rows="5" cols="96" id="address"><?php echo @$faculty_details[0]->user_address; ?></textarea>   
                        </div>
                       
                      </div>
                    <div class="form-group"  id="image">
                        <label for="pro_image" class="col-sm-2 control-label">Profile Photo(150x150px):</label>
                        <div class="col-sm-10">
                          <input type="file" name="pro_pic"  class="form-control" id="pro_pic" >
                           <span id="error_catname" style="color:red"></span>
                           <img src="<?php echo base_url(); ?>../assets/uploads/faculty/<?php echo @$faculty_details[0]->profile_photo; ?>">
                        </div>
                       
                      </div>

                  
                    </div>

                  <input type="hidden" name="hidden_image" value="<?php echo @$faculty_details[0]->profile_photo; ?>">
                  <input type="hidden" name="edit_id" value="<?php echo @$faculty_details[0]->id; ?>">
                   <span style="color:#F00">*Fields Are Required</span>
                   
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <a href="<?php echo base_url();?>index.php/manage_faculty/list_view" class="btn btn-danger">Cancel</a>
                      <button type="submit" class="btn btn-info pull-right" onclick="return form_validation()" >Update</button>
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

        url:base_url+'index.php/manage_faculty/get_state',
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

        url:base_url+'index.php/manage_faculty/get_city',
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
              if ($('#head_faculty_id').val()== "") 
              {
                $('#head_faculty_id').addClass('red_border');
              }
              else 
              {
                $('#head_faculty_id').removeClass('red_border');
              }

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

              var gender=$("input[name='gender']:checked").val();

              

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


    }

    function form_validation()
    {
         $('#faculty_form_validation').attr('onchange', 'validation()');
         $('#faculty_form_validation').attr('onkeyup', 'validation()');
         $('#faculty_form_validation').attr('onfocus', 'validation()');

              validation();

              if ($('#faculty_form_validation .red_border').size() > 0)
              {
                $('#faculty_form_validation .red_border:first').focus();
                return false;
              }
              else 
              {
                $('#faculty_form_validation').submit();
              }       
    }
 </script>
 





            