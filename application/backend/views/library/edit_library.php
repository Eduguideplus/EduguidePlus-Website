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
       EDIT LIBRARY
        
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/Library/update" method="post" id="add" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
              <div class="form-group">
                  <label for="parent_cat" class="col-sm-2 control-label">Library:<span style="color:#F00">*</span></label>

                <div class="col-sm-9">
                    <select name="Library" id="Library" class="form-control"  >
                    <option value="">Select</option>
                     <?php

                      foreach($parent_exam_type as $row){
                      ?>
                      <option value="<?php echo $row->id;?>"<?php if($library[0]->library_exam_id==$row->id) { echo "selected"; }?>><?php echo $row->exam_name; ?></option>
                      <?php
                        }
                      ?>

                    </select>
                    <input type="hidden" name="edit_id" value="<?php echo  $library[0]->library_id; ?>">
                    <input type="hidden" name="old_image" value="<?php echo  $library[0]->upload_file;?>">
                    
                </div>
                 
              </div> 


                            <div class="form-group" style="margin-top: 10px;">
                                    <label for="event_image" class="col-sm-2 control-label text-center">Upload file :</label>
                                    <div class="col-sm-7">
                                        <input type="file"  name="upload_pdf" id="upload_pdf" onchange="readURL(this);">

                                       <embed id="prof_pic" src="<?php echo base_url();?>../assets/uploads/library/<?php echo $library[0]->upload_file;?>" height="100px" width="100px"></embed> 
                                    </div>
                              </div>
                              <div class="clearfix"></div>
            <div class="form-group">
<label for="parent_cat" class="col-sm-2 control-label">File Information: <span style="color:#F00">*</span></label>

<div class="col-sm-9">
<input type="text"  name="file_info" id="file_info" class="form-control" value="<?php echo @$library[0]->file_information; ?>" >


</div>

</div> 



              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/Library" class="btn btn-danger">Cancel</a>
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

<script type="text/javascript">
    function readURL(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prof_pic')
                    .attr('src', e.target.result)
                    .width(90)
                    .height(90);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>



  <script>
  function validation()
  {

    var Library = $('#Library').val();
      if (!isNull(Library)) {
        $('#Library').removeClass('black_border').addClass('red_border');
      } else {
        $('#Library').removeClass('red_border').addClass('black_border');
      }


    


      //  var upload_pdf = $('#upload_pdf').val();
       
      // if (!isNull(upload_pdf)) {
      //   $('#upload_pdf').removeClass('black_border').addClass('red_border');
      // } else {
      //   $('#upload_pdf').removeClass('red_border').addClass('black_border');
      // }



 var file_infor = $('#file_infor').val();
       
      if (!isNull(file_infor)) {
        $('#file_infor').removeClass('black_border').addClass('red_border');
      } else {
        $('#file_infor').removeClass('red_border').addClass('black_border');
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

            