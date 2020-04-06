
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ADMIN PASSWORD CHANGE
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
              <h3 class="box-title">CHANGE PASSWORD<span style="padding-right: 30px;"></span> <?php
            $msg=$this->session->flashdata('succ_msg');
                  
            if($msg){
              ?>
              <small style="color:green">
                <?php echo $msg; ?>
              </small>
              <?php
              }
              ?>
               <?php
            $msg=$this->session->flashdata('err_msg');
            if($msg){
              ?>
              <small style="color:red">
                <?php echo $msg; ?>
              </small>
              <?php
              }
              ?></h3>
              <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/change_password/password_updated" method="post" id="changepwd_form_validation" >
                
              <div class="box-body">
              <div class="form-group">
                  <label for="oldpwd" class="col-sm-2 control-label">Old Password</label>

                  <div class="col-sm-10">
                    <input type="password" name="oldpasswd" class="form-control" id="oldpwd" placeholder="Old Password" value="" >
                     <span id="error_op" style="color:red"></span>
                  </div>
                 
                </div>
                <div class="form-group">
                  <label for="newpassword" class="col-sm-2 control-label">New Password</label>

                  <div class="col-sm-10">
                    <input type="password" name="newpasswd" class="form-control" id="newpassword" placeholder="New Password"  value="">
                    <span id="error_np" style="color:red"></span>
                  </div>
                  
                </div>
                <div class="form-group">
                  <label for="Confpassword" class="col-sm-2 control-label">Re-Password</label>

                  <div class="col-sm-10">
                    <input type="password" name="conpasswd" class="form-control" id="Confpassword" placeholder="Confirm Password"  value="">
                    <span id="error_cp" style="color:red"></span>

                  </div>
                  
                </div>
                
                
              </div>
             
              <div id="error"></div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url(); ?>" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return exequete_changepassword_form_validation()">Submit</button>
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

  /*function exequete_changepassword_form_validation()
  {
    
   
    var oldpwd = $("#oldpwd").val();
    var newpwd = $("#newpassword").val();
    var conpwd = $("#Confpassword").val();
    
    if(oldpwd=="")
    {
      document.getElementById("oldpwd").focus();
     
      document.getElementById("error_op").innerHTML = "Please input old password.";
      return false;
    }
    else
    {
      document.getElementById("error_op").innerHTML = "";
    }
    if(newpwd=="")
    {
      document.getElementById("newpassword").focus();
    
       document.getElementById("error_np").innerHTML = "Please input new password.";
       return false;

    }
    else
    {
       document.getElementById("error_np").innerHTML = "";
    }
    if(conpwd=="")
    {
      document.getElementById("Confpassword").focus();
      document.getElementById("error_cp").innerHTML = "Please input Re password.";
       return false;

    }
    else
    {
      document.getElementById("error_np").innerHTML = "";
    }
    if(newpwd!=conpwd)
    {
      document.getElementById("error_cp").innerHTML = "Please fill same as new password.";
      return false;
    }
    else
    {
      document.getElementById("error_cp").innerHTML = "";
    }
     if(oldpwd==newpwd)
    {
      document.getElementById("error_np").innerHTML = "New password can't be same as Old password.";
      return false;
    }
    else
    {
      document.getElementById("error_cp").innerHTML = "";
    }
    
    
    
  }
    */


  </script>


            