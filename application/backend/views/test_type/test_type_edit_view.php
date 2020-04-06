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
        TEST EDIT
        
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
              <!-- <h3 class="box-title">COMPANY ADD</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_test_type/update" method="post" id="edit" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
             

            

              <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Test Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" name="sub_name" id="sub_name" class="form-control" placeholder="Input Subject Name" value="<?php echo $subjects[0]->test_name; ?>" >
                    
                  </div>
                 
              </div>


                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Test Description<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <textarea  name="sub_descpn" id="sub_descpn" class="form-control tinyarea" ><?php echo $subjects[0]->test_descpn; ?></textarea>
                    
                  </div>
                 
              </div>

              <input type="hidden" value="<?php echo @$subjects[0]->test_id;?>" name="edit_id" >


              <!-- <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Status</label>
              
                  <div class="col-sm-9">
                    <select class="form-control" name="status" id="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                    </select>
                    
                  </div>
                 
              </div> -->

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_test_type/view" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return form_validation()">Submit</button>
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
    var section_name = $('#section_name').val();
      if (!isNull(section_name)) {
        $('#section_name').removeClass('black_border').addClass('red_border');
      } else {
        $('#section_name').removeClass('red_border').addClass('black_border');
      }


      
  }
  function form_validation()
  {
  
   
    $('#edit').attr('onchange', 'validation()');
    $('#edit').attr('onkeyup', 'validation()');

     validation();
    //alert($('#contact_form .red_border').size());

    if ($('#edit .red_border').size() > 0)
    {
      $('#edit .red_border:first').focus();
      $('#edit .alert-error').show();
      return false;
    } else {

      $('#edit').submit();
    }

  }

  </script>

            