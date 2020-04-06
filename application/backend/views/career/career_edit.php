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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_career/update" method="post" id="faqadd_form_validation" enctype="multipart/form-data" >
              <div class="box-body">
                <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
                  

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Job Title<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                   <input type="text" name="job_title" class="form-control" id="job_title" value="<?php echo @$career_list[0]->job_title;?>">
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Job Location<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                   <input type="text" name="job_location" class="form-control" id="job_location" value="<?php echo @$career_list[0]->job_location;?>">
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Job Qualification<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" name="job_qualification" class="form-control" id="job_qualification" value="<?php echo @$career_list[0]->job_qualification;?>">
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Job Experience<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                      <div class="col-sm-2">
                        <select name="min_exp" id="min_exp" class="form-control">
                          <option>Min</option>
                          <?php for($i=0;$i<=10;$i++){
                            ?>
                          <option value="<?php echo $i;?>" <?php if($min_exp==$i){ echo 'selected';} ?>><?php echo $i;?></option>
                          <?php }?>
                        </select>
                         <span id="error_catname" style="color:red"></span>
                      </div>

                      <div class="col-sm-1">
                        
                        To
                      </div>

                      <div class="col-sm-2">
                        <select name="max_exp" id="max_exp" class="form-control">
                          <option>Max</option>
                          <?php for($i=0;$i<=10;$i++){
                            ?>
                          <option value="<?php echo $i;?>" <?php if($max_exp==$i){ echo 'selected'; }?>><?php echo $i;?></option>
                          <?php }?>
                        </select>
                         <span id="error_catname" style="color:red"></span>
                      </div>

                      <div class="col-sm-2">
                        <select name="exp_yr_mn" id="exp_yr_mn" class="form-control">
                          <option>Select</option>
                          <option value="Years" <?php if($mn_yr_exp=='Years'){ echo 'selected'; }?>>Years</option>
                          <option value="Months" <?php if($mn_yr_exp=='Months'){ echo 'selected'; }?>>Months</option>
                        </select>
                         <span id="error_catname" style="color:red"></span>
                      </div>
                 
                  </div>

                 <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Job Skill<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                   <textarea type="text" name="job_skill" class="tinymce" id="job_skill" rows="4" cols="50" ><?php echo @$career_list[0]->job_skill;?></textarea>
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>
<input type="hidden" value="<?php echo @$career_list[0]->id;?>" name="edit_id" >
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_career/list_view" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return faq_add_validation()" >Submit</button>
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
    var question = $('#question').val();
      if (!isNull(question)) {
        $('#question').removeClass('black_border').addClass('red_border');
      } else {
        $('#question').removeClass('red_border').addClass('black_border');
      }
      var answer = $('#answer').val();
      if (!isNull(answer)) {
        $('#answer').removeClass('black_border').addClass('red_border');
      } else {
        $('#answer').removeClass('red_border').addClass('black_border');
      }
  }
  function faq_add_validation()
  {
  
   
    $('#faqadd_form_validation').attr('onchange', 'validation()');
    $('#faqadd_form_validation').attr('onkeyup', 'validation()');

     validation();
    //alert($('#contact_form .red_border').size());

    if ($('#faqadd_form_validation .red_border').size() > 0)
    {
      $('#faqadd_form_validation .red_border:first').focus();
      $('#faqadd_form_validation .alert-error').show();
      return false;
    } else {

      $('#faqadd_form_validation').submit();
    }

  }
</script>



            