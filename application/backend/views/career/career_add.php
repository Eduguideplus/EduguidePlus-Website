<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            theme: "modern",
            height:"300px",
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
      <h1>
        ADD REQUIRMENT
        
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
                <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
                  

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Job Title<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                   <input type="text" name="job_title" class="form-control" id="job_title" >
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Job Location<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                   <input type="text" name="job_location" class="form-control" id="job_location" >
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Job Qualification<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" name="job_qualification" class="form-control" id="job_qualification" >
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Job Experience<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                      <div class="col-sm-2">
                        <select name="min_exp" id="min_exp" class="form-control">
                          <option value="">Min</option>
                          <?php for($i=0;$i<=10;$i++){
                            ?>
                          <option value="<?php echo $i;?>"><?php echo $i;?></option>
                          <?php }?>
                        </select>
                         <span id="error_catname" style="color:red"></span>
                      </div>

                      <div class="col-sm-1">
                        
                        To
                      </div>

                      <div class="col-sm-2">
                        <select name="max_exp" id="max_exp" class="form-control">
                          <option value="">Max</option>
                          <?php for($i=0;$i<=10;$i++){
                            ?>
                          <option value="<?php echo $i;?>"><?php echo $i;?></option>
                          <?php }?>
                        </select>
                         <span id="error_catname" style="color:red"></span>
                      </div>

                      <div class="col-sm-2">
                        <select name="exp_yr_mn" id="exp_yr_mn" class="form-control">
                          <option value="">Select</option>
                          <option value="Years">Years</option>
                          <option value="Months">Months</option>
                        </select>
                         <span id="error_catname" style="color:red"></span>
                      </div>
                 
                  </div>

			           <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Job Skill<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                   <textarea type="text" name="job_skill" class="tinymce" id="job_skill" rows="4" cols="50" ></textarea>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_career/list_view" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return add_validation()" >Submit</button>
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



            