<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            theme: "modern",
            menubar: "edit insert tools",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools"
            ],
            toolbar1: "undo redo | styleselect | bold italic| forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist | link preview",
            image_advtab: true,
            extended_valid_elements : "span[*],i[*]",
            relative_urls : false,
            remove_script_host : false,
            convert_urls : true
        });
    </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Video Tutorial
        
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
              <!-- <h3 class="box-title">TESTIMONIAL EDIT</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_video_tutorial/update" method="post" id="testiadd_form_validation" enctype="multipart/form-data" >
              <div class="box-body">

                

			          <!--  <div class="form-group">
                  <label for="gal_description" class="col-sm-2 control-label">Category Name</label>

                  <div class="col-sm-8">
                   <input type="text" name="testname" class="form-control" placeholder="Category Name" id="testname" value="<?php echo @$test_data[0]->category_name;?>">
                     
                  </div>
                 
                </div> -->
                <input type="hidden" name="testid" value="<?php echo @$test_data[0]->tutorial_id; ?>">


                <div class="form-group" >
                    <label for="" class="col-sm-2 control-label">Category Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                      <div class="col-sm-8">
                        <!-- <input type="text" name="testname" class="form-control"  placeholder="Title"  id="testname" > -->

                        <select name="category_id" class="form-control"  id="category_id" >

                          <option value="">Select Category</option>

                          <?php foreach($category_list as $row){ ?>

                          <option value="<?php echo @$row->category_id;?>" <?php if(@$test_data[0]->category_id==@$row->category_id){ echo 'selected'; } ?> ><?php echo @$row->category_name;?></option>

                        <?php } ?>

                          

                        </select>


                       
                      </div>
                 
                  </div>



                  <div class="form-group" >
                    <label for="" class="col-sm-2 control-label">Title<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                      <div class="col-sm-8">
                        <input type="text" name="testname" class="form-control"  placeholder="Title"  id="testname" value="<?php echo $test_data[0]->title; ?>" >
                       
                      </div>
                 
                  </div>

                  <div class="form-group" id="tutor" >
                    <label for="profession" class="col-sm-2 control-label">Video Link (Embed Link)<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                      <div class="col-sm-8">
                          <input type="text" name="video_link" class="form-control"  placeholder="Video Link"  id="video_link" value="<?php echo @$test_data[0]->video_link; ?>" ><br>

                          <iframe src="<?php echo @$test_data[0]->video_link; ?>" allowfullscreen></iframe>



                      </div>
                 
                  </div>



               
                

             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_video_tutorial/list_view" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return testi_add_validation()" >Update</button>
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
 <script type="text/javascript">
  /*function user_change(value)
  {
    //alert();
    if(value=='Tutor')
    {
      $('#tutor').show();
      
    }
    else
    {
      $('#tutor').hide();
      
    }
  }*/
 </script>


<script>
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


<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>


  <script>
  $(function() {
    $( "#datepicker" ).datepicker(
    {
    autoclose: true
    });
  } );

  /*function user_change(value)
  {
    if(value=='Tutor')
    {
      $('#tutor').show();
      
    }
    else
    {
      $('#tutor').hide();
      
    }
  }*/
  </script>

  <script type="text/javascript">
  function validation()
  {
     var category_id = $('#category_id').val();
      if (!isNull(category_id)) {
        $('#category_id').removeClass('black_border').addClass('red_border');
      } else {
        $('#category_id').removeClass('red_border').addClass('black_border');
      }

    var testname = $('#testname').val();
      if (!isNull(testname)) {
        $('#testname').removeClass('black_border').addClass('red_border');
      } else {
        $('#testname').removeClass('red_border').addClass('black_border');
      }
    

      var video_link = $('#video_link').val();
      if (!isNull(video_link)) {
        $('#video_link').removeClass('black_border').addClass('red_border');
      } else {
        $('#video_link').removeClass('red_border').addClass('black_border');
      }

     
      
  }
  function testi_add_validation()
  {
  
   
    $('#testiadd_form_validation').attr('onchange', 'validation()');
    $('#testiadd_form_validation').attr('onkeyup', 'validation()');

     validation();
    //alert($('#contact_form .red_border').size());

    if ($('#testiadd_form_validation .red_border').size() > 0)
    {
      $('#testiadd_form_validation .red_border:first').focus();
      $('#testiadd_form_validation .alert-error').show();
      return false;
    } else {

      $('#testiadd_form_validation').submit();
    }

  }
</script>
