

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3>
         CHANGE PASSWORD
        
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
                    <h3 class="box-title">Change Password</h3>
                    <div id="validation" style="color:red;"></div>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_user/update_password" method="post" id="student_form_validation" enctype="multipart/form-data" >
                      <div class="box-body">

                     <div class="form-group">
                          <label for="First Name" class="col-sm-2 control-label"><center>New Password:<span style="color:#F00">*</span></center></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="np" id="np" placeholder="New Password" >
                                <span id="error_catname" style="color:red"></span>
                            </div>
                      </div>

                      <div class="form-group">
                          <label for="First Name" class="col-sm-2 control-label"><center>Confirm Password:<span style="color:#F00">*</span></center></label>
                            <div class="col-sm-10">
                                <input type="password" name="cp" class="form-control"  placeholder="Confirm Password"  id="cp">
                                <span id="error_conpass" style="color:red"></span>
                            </div>
                      </div>
                      

                       
                  <input type="hidden" name="edit_id" value="<?php echo @$student[0]->id; ?>">
                   <span style="color:#F00">*Fields Are Required</span>
                   
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <a href="<?php echo base_url();?>index.php/manage_user/list_view" class="btn btn-danger">Cancel</a>
                      <button type="submit" class="btn btn-info pull-right" onclick="return form_validation()" >Change</button>
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
   function validation()
     {
              var np =$('#np').val();
              if (np == "") 
              {
                $('#np').addClass('red_border');
              }
              else 
              {
                if(np.length < 6)
                {
                    $('#np').addClass('red_border');
                }
                else
                { 
                  $('#np').removeClass('red_border');
                }
              }

              var cp =$('#cp').val();
              if (cp == "") 
              {
                $('#cp').addClass('red_border');
              }
              else 
              {
                if(np!=cp)
                {
                  $('#cp').addClass('red_border');
                  $('#error_conpass').html('Confirm password does not match with new password');
                }
                else
                {
                  $('#cp').removeClass('red_border');
                  $('#error_conpass').html('');
                }
              }

             


    }

    function form_validation()
    {
         $('#student_form_validation').attr('onchange', 'validation()');
         $('#student_form_validation').attr('onkeyup', 'validation()');
         $('#student_form_validation').attr('onfocus', 'validation()');

              validation();

              if ($('#student_form_validation .red_border').size() > 0)
              {
                $('#student_form_validation .red_border:first').focus();
                return false;
              }
              else 
              {
                $('#student_form_validation').submit();
              }       
    }
 </script>
 





            