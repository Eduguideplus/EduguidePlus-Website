<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Email  
       
        
      </h1>
     <?php
            $succ_update=$this->session->flashdata('succ_update');
            if($succ_update){
              ?>
              <br><span style="color:green">
                <?php echo $succ_update; ?>
              </span>
              <?php
              }
              ?>
             
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url()?>index.php/email_settings/"">Email Settings</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Email Settings</h3>
            </div>
            <!-- /.box-header -->
            
            <!--<table width="100%">
            <tr>
              <td width="50%"><a href="<?php echo base_url();?>index.php/category/add_category" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add Category</a></td>

              <td width="50%">
              
             <!-- <a href="#" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="#" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>
            </td>
            </tr>
            </table>-->
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                
                <tbody>

                <?php
                
                foreach($emailsettings as $row)
                {
                ?>
               
                
                <tr>
                <td>From Email</td>
                <td><?php echo $row->from_email; ?></td>
                
                  <td> <a href="javascript:void(0)" class="btn btn-info btn-action" title="View & Edit" onclick="gotomodal('From Email','from_email','<?php echo $row->from_email;?>')"><i class="fa fa-pencil-square-o"></i></a>
                    </td>
                </tr>
                <?php
              
                }
                ?>



                 <?php
                
                foreach($emailsettings as $row)
                {
                ?>
               
                
                <tr>
                <td>Recieve Email</td>
                <td><?php echo $row->recieve_email; ?></td>
                
                  <td> <a href="javascript:void(0)" class="btn btn-info btn-action" title="View & Edit" onclick="gotomodal('Recieve Email','recieve_email','<?php echo $row->recieve_email;?>')" ><i class="fa fa-pencil-square-o"></i></a>
                    </td>
                </tr>
                <?php
              
                }
                ?>  

                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="email_title"></h4>
      </div>
      <div class="modal-body">
<form method="post" action="<?php echo base_url();?>index.php/email_settings/emailUpdate_post" id="email_setting_valid">
              <p><input type="email" class="form-control" name="email" id="email" value=""></p><input type="hidden" name="type" id="type" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="return execute_email_setting_edit_validation()">Save changes</button>
      </div>
    </div>

  </div>
</div>


      <!-- /.row -->
    </section>
    </div>
    </div>
    <script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
<script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>
    <script>
  function gotomodal(title,type,val)
  {
      var eml=val;
      var typ=type;
      $("#email_title").html(title);
      $("#email").val(eml);
      $("#type").val(typ);
      $("#myModal").modal('show');
       

    }



</script>
  


