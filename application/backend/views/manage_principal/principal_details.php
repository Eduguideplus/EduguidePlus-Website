

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
                  <?php if($user_details[0]->profile_photo!='') { ?>
                  <img src="<?php echo base_url()."../assets/uploads/principal/".@$user_details[0]->profile_photo;?>" style="height:90px;width:90px"></img> 
                  <?php } else { echo nl2br("No Image"); } ?> 
          
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">User Code</label>

                  <div class="col-sm-10">
                    <input type="text"  class="form-control" value="<?php echo @$user_details[0]->user_code;?>" readonly>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>
                 

                    <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Business / Organisation Name</label>

                  <div class="col-sm-10">
                   <input type="text"  class="form-control" value="<?php echo @$user_details[0]->business_name;?>" readonly>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Contact Person</label>

                  <div class="col-sm-10">
                   <input type="text"  class="form-control" value="<?php echo @$user_details[0]->user_name;?>" readonly>
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
                   
                   <input type="text" class="form-control" value="<?php echo strtoupper(@$country[0]->name);?>" readonly>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">State</label>

                  <div class="col-sm-10">
                
                    <input type="text" class="form-control" value="<?php echo strtoupper(@$state[0]->name);?>" readonly>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">City</label>

                  <div class="col-sm-10">
                 
                    <input type="text" class="form-control" value="<?php echo strtoupper(@$city[0]->name);?>" readonly>
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
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_principal/list_view" class="btn btn-danger">BACK</a>
                
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
 




            