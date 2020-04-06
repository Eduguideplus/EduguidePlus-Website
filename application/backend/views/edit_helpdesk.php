

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Edit Helpdesk</li>        
      </ol>
    </section>

  <!-- Main content -->
    <section class="content">
      <!-- ////////////////////////////////////////////////////////////////////////////////// -->
      <div class="row">
        
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Helpdesk</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
         <div style="padding-left: 12px;"><?php echo $this->session->flashdata('msg'); ?></div>
            
            <form id="form" name="form" class="form-horizontal" action="<?php echo base_url();?>index.php/helpdesk/edit_submit" method="post" enctype='multipart/form-data'>

            <input type="hidden" name="id" value="<?php echo $help[0]->id;?>">

              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tittle<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
                  <div class="col-sm-6">
                    <input type="name" class="form-control" id="tittle" name="tittle" value="<?php echo $help[0]->tittle;?>">
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">help file<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
                    <div class="col-sm-6">
                      <input type="file" class="form-control" name="help_file" id="help_file"><br>
                      <embed src="<?php echo base_url();?>uploads/helpdesk/<?php echo $help[0]->help_file;?>" alt="Photo" height="100px;" width="100px;"></embed></a>
                      </div>
                </div>

              <span style="color: rgb(255, 0, 0); padding-left: 2px;">* field are required</span>
              </div>
              <!-- /.box-body -->

<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
<script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>

              <div class="box-footer">
                <a href="<?php echo base_url();?>" class="btn btn-danger">Cancel</a>
                <button type="button" class="btn btn-info pull-right" onclick="return validation_action()" >Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (right) -->
      </div>
      <!-- ////////////////////////////////////////////////////////////////////////////////// -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <script type="text/javascript">

    function add_Submit()
    {
      // alert("ok");
      var tittle = $('#tittle').val()
    
      if(tittle=='')
      {
        
        $('#tittle').removeClass('black_border').addClass('red_border');
      }
      else
      {
        
        $('#tittle').removeClass('red_border').addClass('black_border');
      } 

      
    }
    
   function validation_action()
    {
      
      $('#form').attr('onchange', 'add_Submit()');
      $('#form').attr('onkeyup', 'add_Submit()');

      add_Submit();

      if ($('#form .red_border').size() > 0)
      {
        $('#form .red_border:first').focus();
        $('#form .alert-error').show();
        return false;
      } else {

        $("#form").submit();
      }
    }

  </script>      