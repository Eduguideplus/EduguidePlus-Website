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
      <h1>
       ABOUT EXAMINATION EDIT
        
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
              <!-- <h3 class="box-title">EXAM-TYPE ADD</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/About_exam/update" method="post" id="add" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
                <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Exam Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" name="exam_name" id="exam_name" class="form-control" placeholder="" value="<?php echo $exam_details[0]->exam_name;?>" >
                    
                  </div>
                 
                  </div>
              


              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Eligibility<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" name="eligibility" id="eligibility" class="form-control" placeholder="" value="<?php echo $exam_details[0]->eligibility;?>" >
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Vacancy<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" name="vacancy" id="vacancy" class="form-control" placeholder="" value="<?php echo $exam_details[0]->vacancy;?>" >
                    
                  </div>
                 
              </div>

        

              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Seletion process<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <textarea type="text" name="selec_process" id="selec_process" class="form-control " ><?php echo $exam_details[0]->select_process;?></textarea>
                    
                  </div>
                 
              </div>
                 
              </div>

               <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">How To Apply<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <textarea type="text" name="hw_to_apply" id="hw_to_apply" class="form-control " ><?php echo $exam_details[0]->how_to_apply;?></textarea>
                    
                  </div>
                 
              </div>

             

              <div class="form-group">
                  <label for="meta_key" class="col-sm-2 control-label">Application Start Date<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="date" name="appl_start_date" id="appl_start_date" class="form-control" placeholder="" value="<?php echo $exam_details[0]->apply_start_date;?>">
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="meta_key" class="col-sm-2 control-label">Application Closing Date<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="date" name="appl_closing_date" id="appl_closing_date" class="form-control" placeholder="" value="<?php echo $exam_details[0]->apply_closing_date;?>">
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="meta_key" class="col-sm-2 control-label">For Preparation<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" name="preparation" id="preparation" class="form-control" placeholder="" value="<?php echo $exam_details[0]->preparation;?>">
                    <input type="hidden" name="about_exam_id" value="<?php echo $exam_details[0]->about_exam_id;?>">
                    
                  </div>
                 
              </div>

             

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/About_exam" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return form_validation()">Update</button>
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



  <script>
  function validation()
  {


    var exam_name = $('#exam_name').val();
      if (!isNull(exam_name)) {
        $('#exam_name').removeClass('black_border').addClass('red_border');
      } else {
        $('#exam_name').removeClass('red_border').addClass('black_border');
      }

    var eligibility = $('#eligibility').val();
      if (!isNull(eligibility)) {
        $('#eligibility').removeClass('black_border').addClass('red_border');
      } else {
        $('#eligibility').removeClass('red_border').addClass('black_border');
      }


    var vacancy = $('#vacancy').val();
      if (!isNull(vacancy)) {
        $('#vacancy').removeClass('black_border').addClass('red_border');
      } else {
        $('#vacancy').removeClass('red_border').addClass('black_border');
      }


       var selec_process= $('#selec_process').val();
       
      if (!isNull(selec_process)) {
        $('#selec_process').removeClass('black_border').addClass('red_border');
      } else {
        $('#selec_process').removeClass('red_border').addClass('black_border');
      }


       var hw_to_apply = $('#hw_to_apply').val();
      if (!isNull(hw_to_apply)) {
        $('#hw_to_apply').removeClass('black_border').addClass('red_border');
      } else {
        $('#hw_to_apply').removeClass('red_border').addClass('black_border');
      }

      var appl_start_date = $('#appl_start_date').val();
      if (!isNull(appl_start_date)) {
        $('#appl_start_date').removeClass('black_border').addClass('red_border');
      } else {
        $('#appl_start_date').removeClass('red_border').addClass('black_border');
      }

var appl_closing_date = $('#appl_closing_date').val();
      if (!isNull(appl_closing_date)) {
        $('#appl_closing_date').removeClass('black_border').addClass('red_border');
      } else {
        $('#appl_closing_date').removeClass('red_border').addClass('black_border');
      }

var preparation = $('#preparation').val();
      if (!isNull(preparation)) {
        $('#preparation').removeClass('black_border').addClass('red_border');
      } else {
        $('#preparation').removeClass('red_border').addClass('black_border');
      }


     

      
  }
  function form_validation()
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

            