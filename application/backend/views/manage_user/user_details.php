

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo @$user_details[0]->user_name;?>
        
      </h1>
      
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
              <!-- <h3 class="box-title">FAQ  ADD</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_career/insert" method="post" id="add" enctype="multipart/form-data" >
              <div class="box-body">
               

                   <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Profile Photo</label>

                  <div class="col-sm-10">
                       <?php
                if($user_details[0]->profile_photo!='')
                {
                  ?><img src="<?php echo base_url()."../assets/uploads/student_pic/".@$user_details[0]->profile_photo;?>" style="height:90px;width:90px"></img> <?php
               }
             else
              {
            echo nl2br("No Image");
             }
          ?> 
          
          
                
                  </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">USC</label>

                  <div class="col-sm-10">
                    <input type="text"  class="form-control" value="<?php echo @$user_details[0]->user_code;?>" readonly>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>
                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Batch Name</label>

                  <div class="col-sm-10">
                   <input type="text"  class="form-control" value="<?php 
                   if(@$user_details[0]->batch_id>0)
                   {
                    echo @$batch[0]->batch_name;
                  }
                  else{
                    echo "No Batch Selected";
                  }
                  ?>" readonly>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Student Name</label>

                  <div class="col-sm-10">
                   <input type="text"  class="form-control" value="<?php echo @$user_details[0]->user_name;?>" readonly>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                   <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Date Of Birth</label>

                  <div class="col-sm-10">
                   <input type="text"  class="form-control" value="<?php echo @$user_details[0]->dob;?>" readonly>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Email Id.</label>

                  <div class="col-sm-10">
                   <input type="text" class="form-control" value="<?php echo @$user_details[0]->login_email;?>" readonly>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Phone No.</label>

                  <div class="col-sm-10">
                    <input type="text"  class="form-control" value="<?php echo @$user_details[0]->login_mob;?>" readonly>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Adhar Card</label>

                  <div class="col-sm-10">
                    <input type="text"  class="form-control" value="<?php echo @$user_details[0]->adhar;?>" readonly>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                   <div class="form-group">
                  <label for="" class="col-sm-2 control-label">PAN Card</label>

                  <div class="col-sm-10">
                    <input type="text"  class="form-control" value="<?php echo @$user_details[0]->pan;?>" readonly>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>
                               
                   
                  
                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Country</label>

                  <div class="col-sm-10">
                   
                   <input type="text"  class="form-control" value="<?php echo strtoupper(@$country[0]->name);?>" readonly>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">State</label>

                  <div class="col-sm-10">
                   
                   <input type="text"  class="form-control" value="<?php echo strtoupper(@$state[0]->name);?>" readonly>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">City</label>

                  <div class="col-sm-10">
                   
                   <input type="text"  class="form-control" value="<?php echo strtoupper(@$city[0]->name);?>" readonly>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

			           <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                   <textarea type="text" class="form-control"  rows="4" cols="50" readonly><?php echo @$user_details[0]->user_address;?></textarea>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Accnt. Expiry Date:</label>

                  <div class="col-sm-10">
                    <input type="text"  class="form-control" value="<?php echo @$user_details[0]->expiry_date;?>" readonly>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>


              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_user/edit_view/<?php echo  @$user_details[0]->id;  ?>" class="btn btn-success btn-action" ><i class="fa fa-edit"></i></a>
                
              </div>
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_user/list_view" class="btn btn-danger">BACK</a>
                
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
<script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>
<script type="text/javascript">
  function validation()
  {
    var job_title = $('#job_title').val();
      if (!isNull(job_title)) {
        $('#job_title').removeClass('black_border').addClass('red_border');
      } else {
        $('#job_title').removeClass('red_border').addClass('black_border');
      }
      var job_location = $('#job_location').val();
      if (!isNull(job_location)) {
        $('#job_location').removeClass('black_border').addClass('red_border');
      } else {
        $('#job_location').removeClass('red_border').addClass('black_border');
      }
      var job_qualification = $('#job_qualification').val();
      if (!isNull(job_qualification)) {
        $('#job_qualification').removeClass('black_border').addClass('red_border');
      } else {
        $('#job_qualification').removeClass('red_border').addClass('black_border');
      }
      var max_exp = $('#max_exp').val();
      if (!isNull(max_exp)) {
        $('#max_exp').removeClass('black_border').addClass('red_border');
      } else {
        $('#max_exp').removeClass('red_border').addClass('black_border');
      }
      var min_exp = $('#min_exp').val();
      if (!isNull(min_exp)) {
        $('#min_exp').removeClass('black_border').addClass('red_border');
      } else {
        $('#min_exp').removeClass('red_border').addClass('black_border');
      }
      var exp_yr_mn = $('#exp_yr_mn').val();
      if (!isNull(exp_yr_mn)) {
        $('#exp_yr_mn').removeClass('black_border').addClass('red_border');
      } else {
        $('#exp_yr_mn').removeClass('red_border').addClass('black_border');
      }

  }
  function add_validation()
  {
  
   
    $('#add').attr('onchange', 'validation()');
    $('#add').attr('onkeyup', 'validation()');

     validation();
    //alert($('#contact_form .red_border').size());

    if ($('#add .red_border').size() > 0)
    {
      $('#add .red_border:first').focus();
      $('#add .alert-error').show();
      return false;
    } else {

      $('#add').submit();
    }

  }
</script>



            